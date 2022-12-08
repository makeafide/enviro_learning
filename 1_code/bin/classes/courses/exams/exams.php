<?php
if(!isset($_settings)){require_once('../../settings/settings.php');}
require_once($_settings['system_base_path'].'bin/classes/db/mysql/mysql.php');

class examsClass extends mysqlDBClass {
    
    function getExams($module_id){
        $results = $this->query("select * FROM vle_course_exams where module_id = :moduleid",['moduleid' => $module_id]);
        return $results;
    }

    function getExamName($exam_id){
        $results = $this->query("select * FROM vle_course_exams where exam_id = :examid",['examid' => $exam_id]);
        return $results[0]['name'];
    }

    function getExamQuestions($exam_id){
        $results = $this->query("select * FROM vle_course_exam_questions where exam_id = :examid",['examid' => $exam_id]);
        return $results;
    }


    function getExamGrades($exam_id){
        $results = $this->query("select (select vle_course_exams.name from vle_course_exams WHERE vle_course_exams.exam_id = vle_course_exams_grades.exam_id) as name,vle_course_exams_grades.grade FROM vle_course_exams_grades where exam_id = :examid AND user_id = (select id FROM vle_users WHERE u_hash = '".hash('sha256',$_COOKIE['u-token'])."' LIMIT 1)",['examid' => $exam_id]);
        return $results;
    }

    function submitExamScore($exam_id, $score){
        $results = $this->insert("INSERT INTO vle_course_exams_grades (exam_id, user_id, grade) VALUES ('".$exam_id."', (select id FROM vle_users WHERE u_hash = '".hash('sha256',$_COOKIE['u-token'])."' LIMIT 1), '".$score."');",null);
        return $results;
    }

};

?>