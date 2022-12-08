<?php
if(isset($_GET['action'])){
    switch($_GET['action']){
        // Get Classes Switch
        case 'getuserclasses':
            loginAction($_settings,$_POST['username'],$_POST['password']);
            break;

        case 'gradequiz':
            quizGradeAction($_settings,$_GET['id'],$_POST);
            break;

        case 'gradeexam':
            examGradeAction($_settings,$_GET['id'],$_POST);
            break;
        // Logout Switch
        //case 'logout':
        //    logoutAction($_settings);
        //    break;


    }
}



//Grade Quiz Function
function quizGradeAction($_settings,$id,$post){
    require_once($_settings['system_base_path'].'bin/classes/courses/quizes/quiz.php');
    $quiz = new quizClass($_settings['db_host'],$_settings['db_name'],$_settings['db_username'],$_settings['db_password']);
    $score = 0;
    if($quiz->dbconnect()){
        foreach($quiz->getQuizQuestions($id) as $question){
            if($question['answer'] == $post['q-'.$question['id'].'']){
                $score++;  
            }
        }

    $quiz->submitQuizScore($id,($score/sizeof($quiz->getQuizQuestions($id)))*100);
    header('Location: ?p=course-courses');
    }
    else{
        //print_r(json_encode((object) array('error' => true,'message'=> 'Database Error','location'=>'?p=auth-login')));
    }
}


//Grade Quiz Function
function examGradeAction($_settings,$id,$post){
    require_once($_settings['system_base_path'].'bin/classes/courses/exams/exams.php');
    $exams = new examsClass($_settings['db_host'],$_settings['db_name'],$_settings['db_username'],$_settings['db_password']);
    $score = 0;
    if($exams->dbconnect()){
        foreach($exams->getExamQuestions($id) as $question){
            if($question['answer'] == $post['q-'.$question['id'].'']){
                $score++;  
            }
        }

    $exams->submitExamScore($id,($score/sizeof($exams->getExamQuestions($id)))*100);
    header('Location: ?p=course-courses');

    }
    else{
        //print_r(json_encode((object) array('error' => true,'message'=> 'Database Error','location'=>'?p=auth-login')));
    }
}


?>