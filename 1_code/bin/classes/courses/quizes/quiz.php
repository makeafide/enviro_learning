<?php
if(!isset($_settings)){require_once('../../settings/settings.php');}
require_once($_settings['system_base_path'].'bin/classes/db/mysql/mysql.php');

class quizClass extends mysqlDBClass {
    
    function getQuizs($module_id){
        $results = $this->query("select * FROM vle_course_quizes where module_id = :moduleid",['moduleid' => $module_id]);
        return $results;
    }

        
    function getQuiz($quiz_id){
        $results = $this->query("select * FROM vle_course_quizes where quiz_id = :quizid",['quizid' => $quiz_id]);
        return $results;
    }

    function getQuizName($quiz_id){
        $results = $this->query("select * FROM vle_course_quizes where quiz_id = :quizid",['quizid' => $quiz_id]);
        return $results[0]['name'];
    }

    function getQuizQuestions($quiz_id){
        $results = $this->query("select * FROM vle_course_quiz_questions where quiz_id = :quizid",['quizid' => $quiz_id]);
        return $results;
    }

    function getQuizGrades($quiz_id){
        $results = $this->query("select (select vle_course_quizes.name from vle_course_quizes WHERE vle_course_quizes.quiz_id = vle_course_quizes_grades.quiz_id) as name,vle_course_quizes_grades.grade FROM vle_course_quizes_grades where quiz_id = :quizid AND user_id = (select id FROM vle_users WHERE u_hash = '".hash('sha256',$_COOKIE['u-token'])."' LIMIT 1)",['quizid' => $quiz_id]);
        return $results;
    }

    function submitQuizScore($quiz_id, $score){
        $results = $this->insert("INSERT INTO vle_course_quizes_grades (quiz_id, user_id, grade) VALUES ('".$quiz_id."', (select id FROM vle_users WHERE u_hash = '".hash('sha256',$_COOKIE['u-token'])."' LIMIT 1), '".$score."');",null);
        return $results;
    }

};

?>