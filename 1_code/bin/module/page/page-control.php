<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    if(isset($_GET['p'])){
        require_once($_settings['system_base_path'].'bin/classes/auth/auth.php');
        $pageAuth = new authClass("localhost","vle","admin","Will2789$");
        if($pageAuth->dbconnect()){
        if($pageAuth->logonVerify()){
                $pageLocation = explode('-',$_GET['p']);
                if (file_exists('bin/pages/'.$pageLocation[0].'/'.$pageLocation[1].'.php')) {
                    require_once('bin/pages/'.$pageLocation[0].'/'.$pageLocation[1].'.php');
                }
            }
            else if($_GET['p'] == 'auth-login'){
                require_once('bin/pages/auth/login.php');
            }
            else{
                header("Location: ?p=auth-login"); 
            }
        }
        else{
            header("Location: ?p=auth-login"); 
        }
//print_r($testing->login("osouf","Will2789"));
}
?>