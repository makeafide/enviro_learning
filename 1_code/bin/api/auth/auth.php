<?php
if(isset($_GET['action'])){
    switch($_GET['action']){
        // Login Switch
        case 'login':
            loginAction($_settings,$_POST['username'],$_POST['password']);
            break;
        // Logout Switch
        case 'logout':
            logoutAction($_settings);
            break;


    }
}


//Login function
function loginAction($_settings,$user,$password){
    require_once($_settings['system_base_path'].'bin/classes/auth/auth.php');
    $loginAuth = new authClass($_settings['db_host'],$_settings['db_name'],$_settings['db_username'],$_settings['db_password']);

    if($loginAuth->dbconnect()){
    if($loginAuth->login($user,$password)){
        print_r(json_encode((object) array('error' => false,'location'=>'?p=splash-home')));
    }else{
        print_r(json_encode((object) array('error' => true,'location'=>'?p=auth-login')));
    }
    }
    else{
        print_r(json_encode((object) array('error' => true,'location'=>'?p=auth-login')));
    }
}

//logout function
function logoutAction($_settings){
    require_once($_settings['system_base_path'].'bin/classes/auth/auth.php');
    $loginAuth = new authClass($_settings['db_host'],$_settings['db_name'],$_settings['db_username'],$_settings['db_password']);

    if($loginAuth->dbconnect()){
    if($loginAuth->logout()){
        print_r(json_encode((object) array('error' => false,'location'=>'?p=auth-login')));
    }else{
        print_r(json_encode((object) array('error' => true,'location'=>'?p=auth-login')));
    }
    }
    else{
        print_r(json_encode((object) array('error' => true,'location'=>'?p=auth-login')));
    }
}
?>