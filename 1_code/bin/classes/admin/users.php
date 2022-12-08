<?php
if(!isset($_settings)){require_once('../../settings/settings.php');}
require_once($_settings['system_base_path'].'bin/classes/db/mysql/mysql.php');

class userAdminClass extends mysqlDBClass {
    
    function getUsers(){
        $results = $this->query("select * FROM vle_users",null);
        return $results;
    }

};