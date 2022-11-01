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

    
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container-fluid">
                <ul class="nav pull-right">    
                </ul>
                <a class="brand" href="index.html"><span class="second">Enviro Learning</span></a>
            </div>
        </div>
    </div>
    

    <div class="container-fluid">
        
        <div class="row-fluid">
    <div class="dialog span4">
        <div class="block">
            <div class="block-heading">Sign In</div>
            <div class="block-body">
                <form>
                    <label>Username</label>
                    <input type="text" id="username" class="span12">
                    <label>Password</label>
                    <input type="password" id="password" class="span12">
                    <input type="submit" class="btn btn-primary pull-right" value="Sign in">
                    <label class="remember-me"><input type="checkbox"> Remember me</label>
                    <div class="clearfix"></div>
                </form>
            </div>
            
            <p><a href="">Forgot your password?</a></p>
        </div>
    </div>

    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script src="js/auth/global.js"></script>
  </body>
</html>

