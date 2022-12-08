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

          require_once($_settings['system_base_path'].'bin/classes/courses/quizes/quiz.php'); 
          $quiz = new quizClass($_settings['db_host'],$_settings['db_name'],$_settings['db_username'],$_settings['db_password']);
          if($quiz->dbconnect()){
            echo 'Quiz: '.$quiz->getQuizName($_GET['quiz_id']);
          }
        
  ?>

                </h1>
                <form method="post" action="?api=classes-class&action=gradequiz&id=<?php echo $_GET['quiz_id']; ?>">
                    <div class="btn-toolbar">
                        <button type="submit" class="btn btn-primary"><i class="icon-save"></i> Save</button>
                        <div class="btn-group">
                        </div>
                    </div>


                    <div class="well">

                        <?php

if($quiz->dbconnect()){
  foreach($quiz->getQuizQuestions($_GET['quiz_id']) as $quizValue){

    echo '<label>'.$quizValue['question'].'</label>
        <select name="q-'.$quizValue['id'].'" id="q-'.$quizValue['id'].'" class="input-xlarge">';
        foreach(json_decode($quizValue['options'])->{"options"} as $option){
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