<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FINDOCT</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('assets/vendors/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('assets/vendors/nprogress/nprogress.css" rel="stylesheet'); ?>" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="<?php echo base_url('assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css'); ?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('assets/css/custom.css'); ?>" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">

        <div class="animate form login_form">
          <section class="login_content">
            <div style="padding-top:30px" class="panel-body">
              <?php if(validation_errors()) {?>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="alert alert-danger alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h4><i class="fa fa-warning"></i> Warning!</h4>
                      <?php echo validation_errors()?>
                    </div>
                  </div>
                </div>
                <?php }?>
                <?php echo form_open(base_url('login')) ?>
                <form id="loginform" method="post">
                  <img width="100px" height="100px" src="<?php echo base_url('uploads/Findoct-red.png'); ?>" style="text-align:center"><h2></h2>
                <br />
                <div>
                  <input type="text" name="username" class="form-control" placeholder="Username" required="" />
                </div>
                <div>
                  <input type="password" name="password" class="form-control" placeholder="Password" required="" />
                </div>
                <div>
                    <button class="btn btn-default submit" value="Login" type="submit" name="button">LOGIN</button>
                </div>

                <div class="clearfix"></div>

                <div class="separator">
                  <div class="clearfix"></div>
                  <br />

                  <div>

                    <h6 style="color:white;">©2016 All Rights Reserved</h6>
                  </div>
                </div>
              </form>
            </div>
          </section>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('assets/vendors/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('assets/vendors/fastclick/lib/fastclick.js'); ?>"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url('assets/vendors/nprogress/nprogress.js'); ?>"></script>
    <!-- jQuery custom content scroller -->
    <script src="<?php echo base_url('assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js'); ?>"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>

  </body>
</html>
