<?php
if(!isset($_settings)){require_once('../../settings/settings.php');}
require_once($_settings['system_base_path'].'bin/classes/db/mysql/mysql.php');

class coursesClass extends mysqlDBClass {
    
function getCourseModules($course_id){
    $results = $this->query("select * FROM vle_course_modules where course_id = :courseid",['courseid' => $course_id]);
}

};

?>