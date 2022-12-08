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
                <h1 class="page-title">Users</h1>
                <div class="btn-toolbar">
                    <button class="btn btn-primary"><i class="icon-plus"></i> New Course</button>
                    <div class="btn-group">
                    </div>
                </div>
                <br>
                <div class="well">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Email</th>
                                <th style="width: 26px;"></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

              require_once($_settings['system_base_path'].'bin/classes/admin/users.php'); 
                $users = new userAdminClass($_settings['db_host'],$_settings['db_name'],$_settings['db_username'],$_settings['db_password']);
                if($users->dbconnect()){
                  foreach($users->getUsers() as $value){
                    echo '<tr onclick="">
                    <td>'.$value['username'].'</td>
                    <td>'.$value['email'].'</td>
                    <td>
                    
                        <a href=""><i class="icon-pencil"></i></a>
                        <a href="# " role="button"><i class="icon-remove"></i></a>
                   
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