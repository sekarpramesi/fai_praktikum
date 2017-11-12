<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Login| OLShop </title>

<!-- Bootstrap -->
<link href="http://localhost/6478/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="http://localhost/6478/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- NProgress -->
<link href="http://localhost/6478/vendors/nprogress/nprogress.css" rel="stylesheet">
<!-- Animate.css -->
<link href="http://localhost/6478/vendors/animate.css/animate.min.css" rel="stylesheet">

<!-- Custom Theme Style -->
<link href="http://localhost/6478/build/css/custom.css" rel="stylesheet">

</head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
       <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <?php
            echo form_open('Home/register');
              echo '<h1>Create Account</h1>
              <div>
              <input type="text" name="txtName" class="form-control"  placeholder="Name" autocomplete="off">'.
              form_error('txtName','<span class="help-block">','</span>').'
              </div>
              <div>
              <input type="text" name="txtUsername" class="form-control"  placeholder="Username" autocomplete="off">'.
              form_error('txtUsername','<span class="help-block">','</span>').'
              </div>
              <div>
                <input type="email" name="txtEmail" class="form-control" placeholder="Email" autocomplete="off"/>'.
                form_error('txtEmail','<span class="help-block">','</span>').'
              </div>
              <div>
                <input type="password" name="txtPassword" class="form-control" placeholder="Password" autocomplete="off"/>'.
                form_error('txtPassword','<span class="help-block">','</span>').'
              </div>
              <div>
                <input type="password" name="txtConfPassword" class="form-control" placeholder="Confirm Password" autocomplete="off"/>'.
                form_error('txtConfPassword','<span class="help-block">','</span>').'
              </div>
              <div>
                <input type ="submit" name ="btnSendRegistration" class="btn btn-default submit" value = "Register"/>
                <p class="change_link">Already have an account?
                  <a href="http://localhost/6478/index.php/Home/login" class="to_register"> Log in </a>
                </p>
              </div>

              <div class="clearfix"></div>

              <div class="separator">

              <a href="http://localhost/6478/index.php/Home/index" class="to_register"> Back to Home</a>

                <div class="clearfix"></div>
                <br />

                <div>
                  <p>©2017 By Niya 215116478</p>
                </div>
              </div>';
            echo form_close();
              echo '</div>';
            ?>
          </section>
        </div>
       </div>
     </div>
     <script src="http://localhost/6478/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="http://localhost/6478/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- PNotify -->
    <script src="http://localhost/6478/vendors/pnotify/dist/pnotify.js"></script>
    <script src="http://localhost/6478/vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="http://localhost/6478/vendors/pnotify/dist/pnotify.nonblock.js"></script>
  </body>
</html>