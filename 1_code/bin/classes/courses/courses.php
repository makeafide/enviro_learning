<?php

if(!isset($_settings)){require_once('../../settings/settings.php');}
require_once($_settings['system_base_path'].'bin/classes/db/mysql/mysql.php');

class coursesClass extends mysqlDBClass {
    
    function getCourse(){
        $results = $this->query("select * FROM vle_classes",null);
        return $results;
    }

    function getUserCourses(){
        $results = $this->query("select * from vle_classes r WHERE r.course_id = (select course_id FROM vle_course_assignment s WHERE user_id = (select id FROM vle_users WHERE u_hash = '".hash('sha256',$_COOKIE['u-token'])."' LIMIT 1))",null);
        return $results;
    }

    function getCourseName($course_id){
        $results = $this->query("select class_name FROM vle_classes where course_id = :courseid",['courseid' => $course_id]);
        if(isset($results[0]['class_name'])){
            return $results[0]['class_name'];
        }
        else{
            return "Not Found!";
        }
    }
    
};

?>