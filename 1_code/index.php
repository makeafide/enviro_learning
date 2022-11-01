<?php
//Globle Settings Params
require_once('bin/settings/settings.php');

// API Control
require_once('bin/module/api/api-control.php');

// Page Control
require_once('bin/module/page/page-control.php');

// Default Redirect
if(!isset($_GET['p']) && !isset($_GET['api'])){
    header("Location: ?p=splash-home"); 
}

?>