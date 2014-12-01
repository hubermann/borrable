<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link rel="stylesheet" href="<?php echo base_url('public_folder/css/bootstrap.min.css'); ?>">
        <!-- font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url('public_folder/css/font-awesome.min.css'); ?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo base_url('public_folder/css/ionicons.min.css'); ?>">
        <!-- DATA TABLES -->
        <link rel="stylesheet" href="<?php echo base_url('public_folder/css/datatables/dataTables.bootstrap.css'); ?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url('public_folder/css/AdminLTE.css'); ?>">
        <!-- Custom styles -->
        <link rel="stylesheet" href="<?php echo base_url('public_folder/css/backend.css'); ?>">
        <!-- Date picker CSS -->
        <link rel="stylesheet" href="<?php echo base_url('public_folder/css/datepicker.css'); ?>">

        <!-- WP admin menu style -->
        <link rel="stylesheet" href="<?php echo base_url('public_folder/css/admin-menu.css'); ?>">

        <link rel="stylesheet" href="<?php echo base_url('public_folder/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'); ?>">

        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>



<style type="text/css" media="all">
    <?php echo '@import '.base_url('public_folder/css_widg_editor/info.css'); ?>
    <?php echo '@import '.base_url('public_folder/css_widg_editor/main.css'); ?>
    <?php echo '@import '.base_url('public_folder/css_widg_editor/widgEditor.css'); ?>
</style>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
          <div id="logo" style="width:250px; float:left; display:block; margin-bottom:.9em; ">
            <a href="#" class="logo" >
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <img src="<?php echo base_url('public_folder/img/logo_backend.png');?>" width="120">
            </a>
          </div>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">

                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-warning"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-people info"></i> 5 new members joined today
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning danger"></i> Very long description here that may not fit into the page and may cause design problems
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users warning"></i> 5 new members joined
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-cart success"></i> 25 sales made
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-person danger"></i> You changed your username
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>
                        <!-- Tasks: style can be found in dropdown.less -->
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-tasks"></i>
                                <span class="label label-danger">9</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 9 tasks</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Design some buttons
                                                    <small class="pull-right">20%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Create a nice theme
                                                    <small class="pull-right">40%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">40% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Some task I need to do
                                                    <small class="pull-right">60%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">60% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Make beautiful transitions
                                                    <small class="pull-right">80%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">80% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all tasks</a>
                                </li>
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>Jane Doe <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                               <li><a href="#">Fin</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->

                <section class="sidebar">


                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->

                    <?php include_once('includes/menu_admin.php'); ?>




                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?php if(isset($main_title)){echo $main_title;} ?>
                        <!-- <small>advanced tables</small> -->
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Servicios/</a></li>
                        <li><a href="#"> </a></li>
                        <li class="active">Data tables</li>
                    </ol>
                </section>

    <div id="avisos">
    <?php

      if($this->session->flashdata('success')):
      echo '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>
      '.$this->session->flashdata('success').'</div>';
      endif;

      if($this->session->flashdata('warning')):
      echo '<div class="alert alert-warning"  role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>
      '.$this->session->flashdata('warning').'</div>';
      endif;

      if($this->session->flashdata('error')):
      echo '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>
      '.$this->session->flashdata('error').'</div>';
      endif;

    ?>

    </div>

                <!-- Main content -->
                <section class="content">
                <?php $this->load->view($content); ?>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <script src="<?php echo base_url('public_folder/js/bootstrap.js'); ?>"></script>


        <!-- jQuery 2.0.2 -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo base_url("public_folder/js/vendor/jquery-1.11.0.min.js"); ?>"><\/script>')</script>

       <script src="<?php echo base_url('public_folder/js/backend.js'); ?>"></script>
        <!-- Date Picker -->
        <script type="text/javascript" src="<?php echo base_url('public_folder/js/bootstrap-datepicker.js'); ?>"></script>

        <!-- Bootstrap -->
        <script src="<?php echo base_url('public_folder/js/bootstrap.js'); ?>"></script>

        <!-- editor -->
        <script src="<?php echo base_url('public_folder/js/plugins/ckeditor/ckeditor.js'); ?>"></script>

        <!-- modal confirm -->
        <script src="<?php echo base_url('public_folder/js/bootbox.min.js'); ?>"></script>

        <!-- DATA TABES SCRIPT -->
        <script src="<?php echo base_url('public_folder/js/plugins/datatables/jquery.dataTables.js'); ?>"></script>
        <script src="<?php echo base_url('public_folder/js/plugins/datatables/dataTables.bootstrap.js'); ?>"></script>
        <!-- AdminLTE App -->

        <script src="<?php echo base_url('public_folder/js/AdminLTE/app.js'); ?>"></script>




        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $('#table_servicios').dataTable({
                    "bPaginate": false,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": false ,
                    "bAutoWidth": false
                });
            });
        </script>
        <script>
        window.setTimeout(function() { $(".alert-success").alert('close'); }, 4000);
        window.setTimeout(function() { $(".alert-warning").alert('close'); }, 4000);
        window.setTimeout(function() { $(".alert-danger").alert('close'); }, 4000);
        $('#fecha_desde').datepicker({
          format: 'dd-mm-yyyy',
        });
        $('#fecha_hasta').datepicker({
          format: 'dd-mm-yyyy',
        });
        </script>

    </body>
</html>
