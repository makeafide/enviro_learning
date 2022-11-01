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
                    <p class="block-heading" data-toggle="collapse" data-target="#chart-container">Course Performance</p>
                    <div id="" class="block-body collapse in">
                      
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


