

<?php
if(!isset($_settings)){require_once('../../settings/settings.php');}
require_once($_settings['system_base_path'].'bin/classes/db/mysql/mysql.php');

class authClass extends mysqlDBClass {

    // handels the login process as well as createing a new user token on success auth
    function login($user,$pass){
        $results = $this->query("select * FROM vle_users where username = :username",['username' => $user]);

        if(count($results) > 0){
            //print_r($results[0]['pass_hash']);
            if (password_verify($pass, $results[0]['pass_hash'])) {
            //print_r($results);
            //password_hash('rasmuslerdorf', PASSWORD_DEFAULT);
                $uuid = uniqid();
                setcookie("u-token", $uuid, time() + (86400 * 30), "/");
                if($this->updateUHash($results[0]['id'],$uuid)){
                    return true;
                }
                else{
                    return false;
                }
            }
            else{
                echo "password Error";
                return false;
            }
        }
        else{
            echo "User Error";
            return false;
        }

    }

    //inserts the login has into the users record for login verification 
    function updateUHash($userId,$uuid){
        if($this->update("UPDATE vle_users SET u_hash= '".hash('sha256', $uuid)."' WHERE id= :id",['id'=>$userId])){
            return true;
        }
        else{
            return false;
        }
    }

    //Verifys current user token status for a vaild state
    function logonVerify(){
        if (isset($_COOKIE['u-token'])) {
            $results = $this->query("select acct_type FROM vle_users where u_hash = :uhash",['uhash' => hash('sha256',$_COOKIE["u-token"])]);
            if(count($results) > 0){
                return $results[0]['acct_type'];
            }
            else{
                unset($_COOKIE['u-token']); 
                setcookie('u-token', null, -1, '/'); 
                return false;
            }
        }
        else{
            return false;
        }
    }

    // User Data Method handels returnign small info array of user data
    function getUserInfo(){
        if (isset($_COOKIE['u-token'])) {
            $results = $this->query("select username,first_name,last_name FROM vle_users where u_hash = :uhash",['uhash' => hash('sha256',$_COOKIE["u-token"])]);
            if(count($results) > 0){
                return $results[0];
            }
            else{
                unset($_COOKIE['u-token']); 
                setcookie('u-token', null, -1, '/'); 
                return false;
            }
        }
        else{
            return false;
        }
    }

    //Logout Method of the Auth class handels removing auth token from users browser
    function logout(){
        unset($_COOKIE['u-token']); 
        setcookie('u-token', null, -1, '/'); 
        return true;
    }


};


?>