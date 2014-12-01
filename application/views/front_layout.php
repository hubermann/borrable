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
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <?php
        // veo el pais del visitante para coloca rle fondo del body (imagen laterales)

      $this->load->library('geoip_lib');

      $this->geoip_lib->InfoIP($_SERVER['REMOTE_ADDR']); //For the "XXX.XXX.XXX.XXX" ip address
      #$this->geoip_lib->InfoIP(); //For the current ip address

      $array_all_data = $this->geoip_lib->result_array();
      #var_dump($array_all_data);
      $city           = $this->geoip_lib->result_city();          // Return Syracuse
      $area_code      = $this->geoip_lib->result_area_code();     // Return 315
      $country_code   = $this->geoip_lib->result_country_code();  // Return US
      $country_code3  = $this->geoip_lib->result_country_code3(); // Return USA
      $country_name   = $this->geoip_lib->result_country_name();  // Return United States
      $metro_code     = $this->geoip_lib->result_metro_code();    // Return 555
      $postal_code    = $this->geoip_lib->result_postal_code();   // Return
      $latitude       = $this->geoip_lib->result_latitude();      // Return 43.0514
      $longitude      = $this->geoip_lib->result_longitude();     // Return -76.1495
      $region         = $this->geoip_lib->result_region();        // Return NY
      $region_name    = $this->geoip_lib->result_region_name();   // Return New York


?>
<body>


    <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

  <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '726910917392094',
      xfbml      : true,
      version    : 'v2.2'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>



<div class="full-container aqua">
		<div class="row clearfix nomargin">

			<div class="container" id="topheader">
				<ul id="tabs">
					<li class="active" id="tab1"><a href="<?php echo base_url('notas'); ?>">Notas</a></li>
					<li  id="tab2"><a href="<?php echo base_url('encuentros'); ?>">Encuentros</a></li>
          <!-- -->
				 </ul>

         <!-- opciones login -->
         <div id="opciones_login" >
<?php

//Si hay login de user muestro opciones de perfil y salir o sino muestro para loguearse o crear cuenta.

if($this->session->userdata('front_logged_in')){
  $usuario_logged = $this->usuario->get_record($this->session->userdata('front_logged_in')['id']);

  echo '<a href="'.base_url('perfil').'" style=" color:#fff;">Hola, '.$usuario_logged->nombre.'</a>|<a style=" color:#fff;" href="'.base_url('desconectar').'">Finalizar</a>';
}else{
  echo '<a href="'.base_url('ingreso').'" style="color:#fff;">Ingresar</a>|<a href="'.base_url('registro').'" style="color:#fff;">Registrarme</a>';
}
?>
         </div>
			</div>

		</div>
	</div>

	<!-- HEADER -->
	<header class="container">
		<div class="row clearfix nomargin">
			<!-- LOGO -->
			<div class="col-md-4 col-xs-12 column">
				<div id="logo"><a href="<?php echo base_url('/'); ?>"><img src="<?php echo base_url('public_folder/img/logoCRH.png'); ?>" width="140" height="115"></a></div>
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
			<div class="col-md-3 col-xs-12 column">
				<form method="post"action="<?php echo base_url('busqueda'); ?>" role="search">
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
<script src="http://comunidadrh.dev/public_folder/js/bootstrap.js"></script>
<script>

  window.setTimeout(function() { $(".alert-success").alert('close'); }, 4000);
  window.setTimeout(function() { $(".alert-warning").alert('close'); }, 4000);
  window.setTimeout(function() { $(".alert-danger").alert('close'); }, 4000);


</script>
</html>
