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
                <h1 class="page-title">Splash Dashboard</h1>

                <div class="row-fluid">
                    <div class="block">
                        <p class="block-heading" data-toggle="collapse" data-target="#chart-container">Course
                            Performance</p>
                        <div id="" class="block-body collapse in">
                            <div id="dp"></div>

                            <script type="text/javascript">
                            var dp = new DayPilot.Month("dp");

                            // view
                            dp.startDate = "<?php echo date("Y-m-d");?>";

                            dp.events.list = [
                                <?php
           

            require_once($_settings['system_base_path'].'bin/classes/courses/courses.php'); 
              $courses = new coursesClass($_settings['db_host'],$_settings['db_name'],$_settings['db_username'],$_settings['db_password']);
              if($courses->dbconnect()){
                foreach($courses->getUserCourses() as $courseValue){

                    require_once($_settings['system_base_path'].'bin/classes/courses/modules/modules.php'); 
                    $modules = new moduleClass($_settings['db_host'],$_settings['db_name'],$_settings['db_username'],$_settings['db_password']);
                    if($modules->dbconnect()){
                      foreach($modules->getCourseModules($courseValue['course_id']) as $moduleValue){
                 

                    require_once($_settings['system_base_path'].'bin/classes/courses/assignments/assignments.php'); 
                    $assignments = new assignmentsClass($_settings['db_host'],$_settings['db_name'],$_settings['db_username'],$_settings['db_password']);
                    if($assignments->dbconnect()){
                      foreach($assignments->getAssignments($moduleValue['module_id']) as $assignmentValue){

                        echo'{
                            "start": "'.$assignmentValue['due_date'].'",
                            "end": "'.$assignmentValue['due_date'].'",
                            "id": "'.$assignmentValue['assignment_id'].'",
                            "text": "'.$assignmentValue['name'].'",
                            "type":"assignment",
                            "tags": {
                                "type": "assign"
                            }
                        },';

                      }
                    }





                    require_once($_settings['system_base_path'].'bin/classes/courses/exams/exams.php'); 
                    $exams = new examsClass($_settings['db_host'],$_settings['db_name'],$_settings['db_username'],$_settings['db_password']);
                    if($exams->dbconnect()){
                      foreach($exams->getExams($moduleValue['module_id']) as $examsValue){
                        echo'{
                            "start": "'.$examsValue['due_date'].'",
                            "end": "'.$examsValue['due_date'].'",
                            "id": "'.$examsValue['exam_id'].'",
                            "text": "'.$examsValue['name'].'",
                            "type":"exam",
                            "tags": {
                                "type": "exam"
                            }
                        },';
                      }
                    }
                    


                    
                    require_once($_settings['system_base_path'].'bin/classes/courses/quizes/quiz.php'); 
                    $quiz = new quizClass($_settings['db_host'],$_settings['db_name'],$_settings['db_username'],$_settings['db_password']);
                    if($quiz->dbconnect()){
                      foreach($quiz->getQuizs($moduleValue['module_id']) as $quizValue){
                        echo'{
                            "start": "'.$quizValue['due_date'].'",
                            "end": "'.$quizValue['due_date'].'",
                            "id": "'.$quizValue['quiz_id'].'",
                            "text": "'.$quizValue['name'].'",
                            "type":"quiz",
                            "tags": {
                                "type": "quiz"
                            }
                        },';
                      }
                    }





                }
            }

            }
        }
      ?>

                            ];



                            dp.onEventClicked = function(args) {
                                console.log(args);

                                switch (args.e.data.type) {
                                    case "exam":
                                        window.location.href = '?p=course-exam_unit&exam_id=' + args.e.id();
                                        break;
                                    case "quiz":
                                        window.location.href = '?p=course-quiz_unit&quiz_id=' + args.e.id();
                                        break;
                                }
                            };

                            dp.onBeforeEventRender = function(args) {
                                var type = args.data.tags && args.data.tags.type;
                                switch (type) {
                                    case "exam":
                                        args.data.fontColor = "#fff";
                                        args.data.backColor = "#E06666";
                                        args.data.borderColor = "#E06666";
                                        args.data.barHidden = true;
                                        break;
                                    case "assign":
                                        args.data.fontColor = "#000";
                                        args.data.backColor = "#9FC5E8";
                                        args.data.borderColor = "#3D85C6";
                                        break;
                                    case "quiz":
                                        args.data.fontColor = "#000";
                                        args.data.backColor = "#FFE599";
                                        args.data.borderColor = "#F1C232";
                                        args.data.barColor = "#F1C232";
                                        break;
                                    case "complete":
                                        args.data.fontColor = "#000";
                                        args.data.backColor = "#B6D7A8";
                                        args.data.borderColor = "#6AA84F";
                                        args.data.barColor = "#6AA84F";
                                        break;
                                }
                            };

                            dp.init();
                            </script>
                        </div>
                    </div>
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
</body>

</html>