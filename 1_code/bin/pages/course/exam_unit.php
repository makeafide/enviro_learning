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
        require_once($_settings['system_base_path'].'bin/classes/courses/exams/exams.php'); 
        $exams = new examsClass($_settings['db_host'],$_settings['db_name'],$_settings['db_username'],$_settings['db_password']);
          if($exams->dbconnect()){
            echo 'Exam: '.$exams->getExamName($_GET['exam_id']);
          }
        
  ?>

                </h1>
                <form method="post" action="?api=classes-class&action=gradeexam&id=<?php echo $_GET['exam_id']; ?>">
                    <div class="btn-toolbar">
                        <button type="submit" class="btn btn-primary"><i class="icon-save"></i> Save</button>
                        <div class="btn-group">
                        </div>
                    </div>


                    <div class="well">

                        <?php

if($exams->dbconnect()){
  foreach($exams->getExamQuestions($_GET['exam_id']) as $examsValue){

    echo '<label>'.$examsValue['question'].'</label>
        <select name="q-'.$examsValue['id'].'" id="q-'.$examsValue['id'].'" class="input-xlarge">';
        foreach(json_decode($examsValue['options'])->{"options"} as $option){
          echo '<option value="'.$option.'">'.$option.'</option>';
        }
    echo '</select>';

    
  }
}
?>

                    </div>
                </form>
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