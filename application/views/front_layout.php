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
        <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
        <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
        <style type="text/css">


        </style>
    </head>
<body>
    <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

<div class="full-container aqua">
		<div class="row clearfix nomargin">

			<div class="container" id="topheader">
				<ul id="tabs">
					<li class="active" id="tab1"><a href="<?php echo base_url('notas'); ?>">Notas</a></li>
					<li  id="tab2"><a href="#">Encuentros</a></li>
          <!-- <?php echo base_url('encuentros'); ?>-->
				 </ul>
			</div>

		</div>
	</div>

	<!-- HEADER -->
	<header class="container">
		<div class="row clearfix nomargin">
			<!-- LOGO -->
			<div class="col-md-4 col-xs-12 column">
				<div id="logo"><img src="<?php echo base_url('public_folder/img/logoCRH.png'); ?>" width="140" height="115"></div>
			</div>

			<!-- BANNER HEADER -->
			<div class="col-md-8 col-xs-12 column">
				<div id="header_adv"><img src="public_folder/img/banner_ad_728x90.jpg" alt="ad" class="img-responsive"></div>
			</div>

		</div>

		<div class="row clearfix nomargin" id="wrapp_main_menu">

			<!-- MAIN MENU -->
			<div class="col-md-9 col-xs-12 column" id="mainmenu">
				<ul>
				<li><a class="active" href="<?php echo base_url('/'); ?>">inicio</a></li>
				<li><a href="<?php echo base_url('informes'); ?>">informes</a></li>
				<li><a href="<?php echo base_url('casos'); ?>">casos</a></li>
				<li><a href="<?php echo base_url('negocios'); ?>">negocios</a></li>
				<li><a href="<?php echo base_url('tendencias'); ?>">tendencias</a></li>
				<li><a href="<?php echo base_url('suplementos'); ?>">suplementos</a></li>
				<li><a href="<?php echo base_url('tecnologia'); ?>">tecnologia</a></li>
				<li><a href="<?php echo base_url('videos'); ?>">videos</a></li>
				</ul>
			</div>

			<!-- SEARCH HEADER -->
			<div class="col-md-3 col-xs-12 column">
				<form  role="search">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Buscar" name="srch-term" id="srch-term">
				<div class="input-group-btn">
					<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
				</div>
			</div>
			</form>
			</div>
			<div class="col-md-12 column"><div id="border_main_menu"></div></div>


		</div><!-- end wrapp_main_menu -->
	</header>
<!-- END HEADER -->

<!-- MAIN CONTENT -->
<section class="container" id="fondoblanco">
	<?php if(isset($content)){$this->load->view($content);} ?>
</section>
<!-- END MAIN SECTION -->


<?php include_once('includes_front/footer.php'); ?>

</body>
</html>
