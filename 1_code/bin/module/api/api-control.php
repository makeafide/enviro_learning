<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_GET['api'])){
    require_once($_settings['system_base_path'].'bin/classes/auth/auth.php');
    $pageAuth = new authClass("localhost","vle","admin","Will2789$");
    if($pageAuth->dbconnect()){
    if($pageAuth->logonVerify()){
            $pageLocation = explode('-',$_GET['api']);
            if (file_exists($_settings['system_base_path'].'bin/api/'.$pageLocation[0].'/'.$pageLocation[1].'.php')) {
                require_once($_settings['system_base_path'].'bin/api/'.$pageLocation[0].'/'.$pageLocation[1].'.php');
            }
        }
        else if($_GET['api'] == 'auth-auth'){
           
            require_once('bin/api/auth/auth.php');
        }
        else{
           // header("Location: ?p=auth-login"); 
        }
    }
    else{
       // header("Location: ?p=auth-login"); 
    }
}
else{
  
}
?>