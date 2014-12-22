<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?php echo base_url('public_folder/css/normalize.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('public_folder/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('public_folder/css/font-awesome.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('public_folder/css/main.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('public_folder/css/front.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('public_folder/css/fonts.css'); ?>">
        <link href='http://fonts.googleapis.com/css?family=Maven+Pro:400,500,700,900' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

        <script src="<?php echo base_url('public_folder/js/vendor/modernizr-2.6.2.min.js'); ?>"></script>
        <!-- jQuery 2.0.2
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>-->
        <script charset="utf-8" src="<?php echo base_url('public_folder/js/vendor/jquery-1.11.0.min.js'); ?>">
        </script>

    </head>
<body>
    <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

<div class="full-container aqua">
		<div class="row clearfix nomargin">

			<div class="container" id="topheader">
				<ul id="tabs">
<?php $active_notas = 'class="active"'; if($this->uri->segment(1)== "notas" || $this->uri->segment(1) ==""){$active_notas = 'class="active"';} ?>
				<?php $active_encuentros= ""; if($this->uri->segment(1)== "encuentros"){$active_encuentros = 'class="active"'; $active_notas = '';} ?>
				
					<li <?php echo $active_notas; ?> id="tab1"><a href="<?php echo base_url('notas'); ?>">Notas</a></li>
					<li <?php echo $active_encuentros; ?> id="tab2"><a href="<?php echo base_url('encuentros'); ?>">Encuentros</a></li>
          <!-- -->
				</ul>

         <!-- opciones login -->
		<div id="opciones_login">
			<?php

			//Si hay login de user muestro opciones de perfil y salir o sino muestro para loguearse o crear cuenta.

			if($this->session->userdata('front_logged_in')){
			  $usuario_logged = $this->usuario->get_record($this->session->userdata('front_logged_in')['id']);

			  echo '<a href="'.base_url('perfil-editar').'" style=" color:#fff;">Hola, '.$usuario_logged->nombre.'</a>|<a style=" color:#fff;" href="'.base_url('desconectar').'">Finalizar</a>';
			}else{
			  echo '<a href="'.base_url('ingreso').'"><i class="fa fa-user"></i>Ingresar</a>|<a href="'.base_url('registro').'"><i class="fa fa-sign-in"></i>Registrarme</a>';
			}
			?>
		</div>
			</div>

		</div>
	</div>

	<!-- //////////////////HEADER FINAL//////////////// -->

	<header class="container">
		<div class="row clearfix nomargin" id="wrapp_pre_menu">
			<!-- LOGO -->
			<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 column">
				<div id="logo"><a href="<?php echo base_url('/'); ?>"><img src="<?php echo base_url('public_folder/img/logoCRH.png'); ?>" width="140" height="115"></a></div>
			</div>

			<!-- BANNER HEADER -->
			<div class="col-lg-10 col-md-10 hidden-sm hidden-xs column">
				<div id="header_adv"><img src="public_folder/img/banner_ad_728x90.jpg" alt="ad" class="img-responsive"></div>
			</div>
			<div class="navbar hidden-lg hidden-md col-sm-12 xs-12 column">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
					<i class="fa fa-chevron-down"></i>
				</button>
			</div>
		</div>
		<div class="row clearfix nomargin" id="wrapp_main_menu">
			<div class="row no-gutters navbar-header">

				<div id="mainmenu" class="navbar-collapse collapse navbar-responsive-collapse" style="margin: 0px;padding: 0px;">
					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 column" id="mainmenu">
						<ul>
						<li><a href="<?php echo base_url('/'); ?>" <?php if(count($this->uri->segment(1))==0 || $this->uri->segment(1)=="" ){echo 'class="active"';} ?> >inicio</a></li>
						<li><a href="<?php echo base_url('informes'); ?>" <?php if($this->uri->segment(1)=="informes" ){echo 'class="active"';} ?>>informes</a></li>
						<li><a href="<?php echo base_url('casos'); ?>" <?php if($this->uri->segment(1)=="casos" ){echo 'class="active"';} ?>>casos</a></li>
						<li><a href="<?php echo base_url('negocios'); ?>" <?php if($this->uri->segment(1)=="negocios" ){echo 'class="active"';} ?>>negocios</a></li>
						<li><a href="<?php echo base_url('tendencias'); ?>" <?php if($this->uri->segment(1)=="tendencias" ){echo 'class="active"';} ?>>tendencias</a></li>
						<li><a href="<?php echo base_url('suplementos'); ?>" <?php if($this->uri->segment(1)=="suplementos" ){echo 'class="active"';} ?>>suplementos</a></li>
						<li><a href="<?php echo base_url('tecnologia'); ?>" <?php if($this->uri->segment(1)=="tecnologia" ){echo 'class="active"';} ?>>tecnologia</a></li>
						<li><a href="<?php echo base_url('tv'); ?>" <?php if($this->uri->segment(1)=="tv" ){echo 'class="active"';} ?>>tv</a></li>
						</ul>
					</div>
					<!-- SEARCH HEADER -->
					<div class="col-lg-3 col-md-3 col-xs-12 column">
						<form method="post"action="<?php echo base_url('busqueda'); ?>" role="search">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Buscar" name="srch-term" id="srch-term">
								<div class="input-group-btn">
									<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
								</div>
							</div>
						</form>
					</div>
					<div id="border_main_menu" class="hidden-sm hidden-xs"></div>
				</div>
			</div>
		</div>
		<!-- end wrapp_main_menu -->
	</header>
<!-- //////////////////fin HEADER FINAL//////////////// -->





<!-- MAIN CONTENT -->
<section class="container" id="fondoblanco">

  <!-- MENSAJES -->
    <div class="row">
      <div id="avisos" class="col-lg-12">

      <?php
      /* SI existe login*/


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
    </div>
  <!-- FIN MENSAJES -->


	<?php if(isset($content)){$this->load->view($content);} ?>
</section>
<!-- END MAIN SECTION -->


<?php include_once('includes_front/footer.php'); ?>

</body>
<script src="http://comunidad-rh.com/public_folder/js/bootstrap.js"></script>
<script>

  window.setTimeout(function() { $(".alert-success").alert('close'); }, 4000);
  window.setTimeout(function() { $(".alert-warning").alert('close'); }, 4000);
  window.setTimeout(function() { $(".alert-danger").alert('close'); }, 4000);


</script>
</html>
