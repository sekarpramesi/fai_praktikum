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
            <?php echo form_open('Home/login');
              echo '<h1>Login Form</h1>
              <div>';
                echo '<input type="text" name="txtUsername" class="form-control"  placeholder="Username" autocomplete="off">

              </div>
              <div>
                 <input type="password" name="txtPassword" class="form-control"  placeholder="Password" autocomplete="off">
              </div>
              <div>
                <input type ="submit" name ="btnLogin" class="btn btn-default submit" value = "Login"/>
                <p class="change_link">Don\'t have an account?
                  <a href="http://localhost/6478/index.php/Home/register" class="to_register"> Create Account </a>
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
             if($this->session->flashdata('msg') != ""){
               echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>';
                      echo $this->session->flashdata('msg');
              echo '</div>';
            }else
             if($this->session->flashdata('msgSuccess') != ""){
               echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>';
                      echo $this->session->flashdata('msgSuccess');
              }
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
