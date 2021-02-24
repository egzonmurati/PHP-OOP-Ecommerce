<?php 
include "class.php";
session_start();
$forgotPassword = new Crud();

if (isset($_POST['submit'])) {
  $forgotPassword->forgotPassword($_POST);
  $get_errors_login = $forgotPassword->get_errors_login_all();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forger Password</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 <style>
     .form-gap {
    padding-top: 70px;
}
 </style>
</head>
<body>
<div class="form-gap"></div>
<div class="container mt-5">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 ">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>You can reset your password here.</p>
                  <?php
                            if (isset($get_errors_login)) {
                                foreach ($get_errors_login as $e) { ?>
                                    <div class='alert alert-danger alert-dismissible col-md-10 ml-4 mt-1'>
                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                        <?php echo $e; ?>
                                    </div>
                            <?php }
                            } ?>
                               <?php
                            if (!empty($_SESSION['info'])) {
                            ?>
                         
                                <div class='alert alert-success alert-dismissible col-md-12'>
                                    <button class='close' type="submit" name="unset_session" data-dismiss='alert'>&times;</button>
                                    <?php echo $_SESSION['info']; ?>
                                </div>
                            <?php
                            }
                            ?>
                  <div class="panel-body">
    
                    <form id="register-form" role="form" autocomplete="off" class="form"method="POST"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <input  name="submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                      </div>
                      
                     
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
</body>
</html>