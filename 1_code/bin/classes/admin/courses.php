<?php
if(!isset($_settings)){require_once('../../settings/settings.php');}
require_once($_settings['system_base_path'].'bin/classes/db/mysql/mysql.php');

class courseAdminClass extends mysqlDBClass {
    
    function getCourses(){
        $results = $this->query("select * FROM vle_classes",null);
        return $results;
    }

};