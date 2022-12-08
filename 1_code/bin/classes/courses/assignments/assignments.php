<?php
if(!isset($_settings)){require_once('../../settings/settings.php');}
require_once($_settings['system_base_path'].'bin/classes/db/mysql/mysql.php');

class assignmentsClass extends mysqlDBClass {
    
    function getAssignments($module_id){
        $results = $this->query("select * FROM vle_course_assignments where module_id = :moduleid",['moduleid' => $module_id]);
        return $results;
    }

    function getAssignmentName($assignment_id){
        $results = $this->query("select * FROM vle_course_assignments where assignment_id = :assignmentid",['assignmentid' => $assignment_id]);
        return $results[0]['name'];
    }

    function getAssignmentValue($assignment_id){
        $results = $this->query("select * FROM vle_course_assignments where assignment_id = :assignmentid",['assignmentid' => $assignment_id]);
        return $results[0]['value'];
    }
};

?>