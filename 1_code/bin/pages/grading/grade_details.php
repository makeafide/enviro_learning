<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global Header Import -->
    <?php
        require_once($_settings['system_base_path'].'bin/body/header/globalHeader.php'); 
        ?>
    <!-- Global Header Import -->

</head>


<body>


    <!-- Global Navbar Import -->
    <?php
        require_once($_settings['system_base_path'].'bin/body/menu/navbar.php'); 
        ?>
    <!-- Global Navbar Import -->


    <div class="container-fluid">

        <div class="row-fluid">


            <!-- Global Sidebar Import -->
            <?php
        require_once($_settings['system_base_path'].'bin/body/menu/sidebar.php'); 
        ?>
            <!-- Global Sidebar Import -->


            <div class="span9">
                <h1 class="page-title">
                    <?php
            require_once($_settings['system_base_path'].'bin/classes/courses/courses.php'); 
              $course = new coursesClass($_settings['db_host'],$_settings['db_name'],$_settings['db_username'],$_settings['db_password']);
              if($course->dbconnect()){
                echo 'Course Grades: '.$course->getCourseName($_GET['id']);
              }
            ?></h1>
                <br>
                <div class="well">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Name</th>
                                <th>Grade</th>
                                <th style="width: 26px;"></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
            require_once($_settings['system_base_path'].'bin/classes/courses/modules/modules.php'); 
            $modules = new moduleClass($_settings['db_host'],$_settings['db_name'],$_settings['db_username'],$_settings['db_password']);
            if($modules->dbconnect()){
                $totalScore = 0;
                $totalValue = 0;
              foreach($modules->getCourseModules($_GET['id']) as $moduleValue){


                require_once($_settings['system_base_path'].'bin/classes/courses/quizes/quiz.php'); 
                $quiz = new quizClass($_settings['db_host'],$_settings['db_name'],$_settings['db_username'],$_settings['db_password']);
                if($quiz->dbconnect()){
                  foreach($quiz->getQuizs($moduleValue['module_id']) as $quizValue){
                   
                            foreach($quiz->getQuizGrades($quizValue['quiz_id']) as $value){
                                $totalScore = $totalScore + $value['grade'];
                                $totalValue++;
                                echo '<tr onclick="">
                                <td>Quiz</td>
                                <td>'.$value['name'].'</td>
                                <td>'.round($value['grade'], 2).'%</td>
                                <td>
                                <!--
                                    <a href="user.html"><i class="icon-pencil"></i></a>
                                    <a href="# " role="button" data-toggle="modal"><i class="icon-remove"></i></a>
                                    -->
                                </td>
                            </tr>';
                            }
                        



                    }
                }


                require_once($_settings['system_base_path'].'bin/classes/courses/exams/exams.php'); 
                $exams = new examsClass($_settings['db_host'],$_settings['db_name'],$_settings['db_username'],$_settings['db_password']);
                if($exams->dbconnect()){
                  foreach($exams->getExams($moduleValue['module_id']) as $examsValue){
                    
                    foreach($exams->getExamGrades($quizValue['quiz_id']) as $value){
                        $totalScore = $totalScore + $value['grade'];
                        $totalValue++;
                        echo '<tr onclick="">
                        <td>Exam</td>
                        <td>'.$value['name'].'</td>
                        <td>'.round($value['grade'], 2).'%</td>
                        <td>
                        <!--
                            <a href="user.html"><i class="icon-pencil"></i></a>
                            <a href="# " role="button" data-toggle="modal"><i class="icon-remove"></i></a>
                            -->
                        </td>
                    </tr>';
                    }
                  }

                }



              }
              echo '<tr onclick="">
              <td colspan="2"><b>Total Score</b></td>
              <td><b>'.round(($totalScore/$totalValue), 2).'%</b></td>
              <td>
              </td>
          </tr>';
            }

        ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>



        <footer>
            <!-- Global Header Import -->
            <?php
        require_once($_settings['system_base_path'].'bin/body/footer/globalFooter.php'); 
        ?>
            <!-- Global Header Import -->
        </footer>

        <script src="lib/bootstrap/js/bootstrap.js"></script>
        <script src="js/auth/global.js"></script>
        <script src="js/course/courses.js"></script>
</body>

</html>