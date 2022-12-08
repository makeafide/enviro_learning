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
                <h1 class="page-title"><?php   
              require_once($_settings['system_base_path'].'bin/classes/courses/courses.php'); 
              $course = new coursesClass($_settings['db_host'],$_settings['db_name'],$_settings['db_username'],$_settings['db_password']);
              if($course->dbconnect()){
                print_r($course->getCourseName($_GET['id']));
              }
              ?></h1>
                <br>

                <?php 
          

            require_once($_settings['system_base_path'].'bin/classes/courses/modules/modules.php'); 
              $modules = new moduleClass($_settings['db_host'],$_settings['db_name'],$_settings['db_username'],$_settings['db_password']);
              if($modules->dbconnect()){
                foreach($modules->getCourseModules($_GET['id']) as $moduleValue){


            echo '
            <div class="row-fluid">
                <div class="block">
                    <p class="block-heading" data-toggle="collapse" data-target="#chart-container">'.$moduleValue['name'].'</p>
                    <div id="" class="block-body collapse in">
                    <h3 class="page-title">Assignments</h3>
                      <br>
                      <div class="well">
                          <table class="table table-hover" style="table-layout: fixed; text-align: center; width: 100%;">
                            <thead style="text-align: center; width: 100%;">
                              <tr>
                                <th>Name</th>
                                <th>Due Date</th>
                                <th style="width: 26px;"></th>
                              </tr>
                            </thead>
                            <tbody style="text-align: center; width: 100%;">';

                            require_once($_settings['system_base_path'].'bin/classes/courses/assignments/assignments.php'); 
                            $assignments = new assignmentsClass($_settings['db_host'],$_settings['db_name'],$_settings['db_username'],$_settings['db_password']);
                            if($assignments->dbconnect()){
                              foreach($assignments->getAssignments($moduleValue['module_id']) as $assignmentValue){
                              echo'
                              <tr onclick="openAssign('.$assignmentValue['assignment_id'].');">
                                <td>'.$assignmentValue['name'].'</td>
                                <td>'.$assignmentValue['due_date'].'</td>
                                <td>
                                  <!--
                                    <a href="user.html"><i class="icon-pencil"></i></a>
                                    <a href="#" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
                                    -->
                                </td>
                              </tr> ';
                              }
                            }

                             echo'
                            
                            </tbody>
                          </table>
                      </div>
                      <h3 class="page-title">Exams</h3>
                      
                      <div class="well">
                          <table class="table table-hover" style="table-layout: fixed; text-align: center; width: 100%;">
                            <thead style="text-align: center; width: 100%;">
                              <tr>
                                <th>Name</th>
                                <th>Due Date</th>
                                <th style="width: 26px;"></th>
                              </tr>
                            </thead>
                            <tbody style="text-align: center; width: 100%;">
                            ';

                            require_once($_settings['system_base_path'].'bin/classes/courses/exams/exams.php'); 
                            $exams = new examsClass($_settings['db_host'],$_settings['db_name'],$_settings['db_username'],$_settings['db_password']);
                            if($exams->dbconnect()){
                              foreach($exams->getExams($moduleValue['module_id']) as $examsValue){
                              echo'
                              <tr onclick="openExam('.$examsValue['exam_id'].');">
                                <td>'.$examsValue['name'].'</td>
                                <td>'.$examsValue['due_date'].'</td>
                                <td>
                                  <!--
                                    <a href="user.html"><i class="icon-pencil"></i></a>
                                    <a href="#" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
                                    -->
                                </td>
                              </tr> ';
                              }
                            }

                             echo'
                            
                            </tbody>
                          </table>
                      </div>
                      <h3 class="page-title">Quizes</h3>
                    
                      <div class="well">
                          <table class="table table-hover" style="table-layout: fixed; text-align: center; width: 100%;">
                            <thead>
                              <tr>
                                <th>Name</th>
                                <th>Due Date</th>
                                <th style="width: 26px;"></th>
                              </tr>
                            </thead>
                            <tbody>

                            ';

                            require_once($_settings['system_base_path'].'bin/classes/courses/quizes/quiz.php'); 
                            $quiz = new quizClass($_settings['db_host'],$_settings['db_name'],$_settings['db_username'],$_settings['db_password']);
                            if($quiz->dbconnect()){
                              foreach($quiz->getQuizs($moduleValue['module_id']) as $quizValue){
                              echo'
                              <tr onclick="openQuiz('.$quizValue['quiz_id'].');">
                                <td>'.$quizValue['name'].'</td>
                                <td>'.$quizValue['due_date'].'</td>
                                <td>
                                  <!--
                                    <a href="user.html"><i class="icon-pencil"></i></a>
                                    <a href="#" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
                                    -->
                                </td>
                              </tr> ';
                              }
                            }

                             echo'
                            
                            </tbody>
                          </table>
                      </div>
                    </div>
                </div>
            </div>
            ';
          }
        }
  
            ?>

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