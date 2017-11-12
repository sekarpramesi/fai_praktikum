
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home| OLShop </title>

    <!-- Bootstrap -->
    <link href="http://localhost/6478/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="http://localhost/6478/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="http://localhost/6478/vendors/nprogress/nprogress.css" rel="stylesheet">
      <!-- iCheck -->
    <link href="http://localhost/6478/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="http://localhost/6478/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="http://localhost/6478/build/css/custom.min.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="http://localhost/6478/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost/6478/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost/6478/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost/6478/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">


        <!-- top navigation -->
        <?php
        $this->load->view("template/profile_info");
        $this->load->view("template/sidebar");
        $this->load->view("template/nav");?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?php echo $templateData["title"].' <small>'.$templateData["description"].'</small></h3>';?>
              </div>
            </div>

            <div class="clearfix"></div>


            <?php foreach($container as $t){ 
                $this->load->view($t);
            }?>

          </div>
<?php if($this->session->flashdata('msgSuccess') != ""){
    echo '<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
    <div class="x_title">
        <div class="clearfix"></div>
    </div>
    <div class="x_content">

    <div class="alert alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>';
                      echo $this->session->flashdata('msgSuccess');
              }
        ?>
            </div>
    </div>

</div>  
        </div>

        </div>

        <!-- /page content -->

        <!-- footer content -->
        <?php $this->load->view("template/footer");?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="http://localhost/6478/vendors/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="http://localhost/6478/resources/jqueryui/jquery-ui.js"></script>
    <!-- Bootstrap -->
    <script src="http://localhost/6478/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="http://localhost/6478/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="http://localhost/6478/vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="http://localhost/6478/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="http://localhost/6478/build/js/custom.min.js"></script>
    <!-- iCheck -->
    <script src="http://localhost/6478/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="http://localhost/6478/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="http://localhost/6478/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="http://localhost/6478/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="http://localhost/6478/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="http://localhost/6478/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="http://localhost/6478/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="http://localhost/6478/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="http://localhost/6478/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="http://localhost/6478/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="http://localhost/6478/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="http://localhost/6478/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script type="text/javascript">
        var items =[];  
        items = <?php echo json_encode($this->session->userdata('searchItem'));?>;
        $(document).ready(function() {
            //autocomplete
            $("#search").autocomplete({
                source: items,
                minLength: 3,
                delay: 0,
            });            

        });
    </script>
  
  </body>
</html>
