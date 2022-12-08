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
            require_once($_settings['system_base_path'].'bin/classes/courses/assignments/assignments.php'); 
            $assignments = new assignmentsClass($_settings['db_host'],$_settings['db_name'],$_settings['db_username'],$_settings['db_password']);
                    if($assignments->dbconnect()){
                        echo $assignments->getAssignmentName($_GET['assignment_id']);
                    }
        ?>
                </h1>
                <form>
                    <div class="btn-toolbar">
                        <button type="submit" class="btn btn-primary"><i class="icon-save"></i> Complete</button>
                        <div class="btn-group">
                        </div>
                    </div>


                    <div class="well">

                        <?php

if($assignments->dbconnect()){
    echo $assignments->getAssignmentValue($_GET['assignment_id']);
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