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
                <h1 class="page-title">Your Grades</h1>
                <br>
                <div class="well">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Course ID</th>
                                <th>Course Name</th>
                                <th style="width: 26px;"></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

              require_once($_settings['system_base_path'].'bin/classes/courses/courses.php'); 
                $courses = new coursesClass($_settings['db_host'],$_settings['db_name'],$_settings['db_username'],$_settings['db_password']);
                if($courses->dbconnect()){
                  foreach($courses->getUserCourses() as $value){
                    echo '<tr onclick="openGradeDetails('.$value['course_id'].')">
                    <td>'.$value['course_code'].'</td>
                    <td>'.$value['class_name'].'</td>
                    <td>
                      <!--
                        <a href=""><i class="icon-pencil"></i></a>
                        <a href="# " role="button"><i class="icon-remove"></i></a>
                        -->
                    </td>
                  </tr>';
                  }
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