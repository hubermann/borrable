<div class="row clearfix nomargin"><!-- titulo -->

		<div class="col-lg-7"><!-- columna uno / principal -->
			<!-- col container comes from inicio.php -->

<?php
###### DESTACADO PRINCIPAL ######

$destacado_principal = $this->destacados_nota->get_destacado_principal();

$destacado_secundario_1 = $this->destacados_nota->get_destacado_secundario_1();
$destacado_secundario_2 = $this->destacados_nota->get_destacado_secundario_2();
$destacado_secundario_3 = $this->destacados_nota->get_destacado_secundario_3();
$destacado_secundario_4 = $this->destacados_nota->get_destacado_secundario_4();



if($destacado_principal != 0){
//Destacado princiapl es dif a cero
$destacada_principal = $this->nota->get_record($destacado_principal);
	if($destacada_principal->main_image !='0' || !empty($destacada_principal->main_image) ){
	$img_dest_principal = $this->imagenes_nota->traer_nombre($destacada_principal->main_image);
		$imagen_principal= '<img src="'.base_url('images-notas/'.$img_dest_principal).'" class="img-responsive"/>';

		echo '<div class="media" id="main_destacado_home"><!-- inicio box destacado -->
			<div class="imagen">
				<a href="'.base_url('nota/'.$destacada_principal->id.'/'.$destacada_principal->slug).'">
					'.$imagen_principal.'
				</a>
			</div>
			<h1 class="media-heading">'.$destacada_principal->titulo.'</h1>
		</div><!-- fin box destacado -->';
	}


}

// DESTACADA SECUNDARIO 1
if($destacado_secundario_1 != 0 || !empty($destacado_secundario_1)){
	$dest_secundario_1 = $this->nota->get_record($destacado_secundario_1);
	//imagen
	if($dest_secundario_1->main_image !='0' || !empty($dest_secundario_1->main_image) ){
		$img_sec_uno = $this->imagenes_nota->traer_nombre($dest_secundario_1->main_image);
		$img_secundario_uno = '<img src="'.base_url('images-notas/'.$img_sec_uno).'" alt="" class="img-responsive">';
	}else{
		$img_secundario_uno ="";
	}
	$destacado_chico_uno = '
	<div class="col-xs-12 col-lg-3 col-md-6 col-sm-6">
	<div class="media destacado-chico"><!-- inicio destacado chico -->
		<a href="'.base_url('nota/'.$dest_secundario_1->id.'/'.$dest_secundario_1->slug).'">
			'.$img_secundario_uno.'
		</a>
		<div class="media-body">
		<h4 class="titulo-destacado-chico">Media heading</h4>
		<p>'.$dest_secundario_1->titulo.'</p>
		</div>
	</div><!-- fin destacado chico -->
	</div>';
}else{$destacado_chico_uno="";}

// DESTACADA SECUNDARIO 2
if($destacado_secundario_2 != 0 || !empty($destacado_secundario_2)){
	$dest_secundario_2 = $this->nota->get_record($destacado_secundario_2);
	//imagen
	if($dest_secundario_2->main_image !='0' || !empty($dest_secundario_2->main_image) ){
		$img_sec_dos = $this->imagenes_nota->traer_nombre($dest_secundario_2->main_image);
		$img_secundario_dos = '<img src="'.base_url('images-notas/'.$img_sec_dos).'" alt="" class="img-responsive">';
	}else{
		$img_secundario_dos ="";
	}
	$destacado_chico_dos = '
	<div class="col-xs-12 col-lg-3 col-md-6 col-sm-6">
	<div class="media destacado-chico"><!-- inicio destacado chico -->
		<a href="'.base_url('nota/'.$dest_secundario_2->id.'/'.$dest_secundario_2->slug).'">
			'.$img_secundario_dos.'
		</a>
		<div class="media-body">
		<h4 class="titulo-destacado-chico">Media heading</h4>
		<p>'.$dest_secundario_2->titulo.'</p>
		</div>
	</div><!-- fin destacado chico -->
	</div>';
}else{$destacado_chico_dos="";}

// DESTACADA SECUNDARIO 3
if($destacado_secundario_3 != 0 || !empty($destacado_secundario_3)){
	$dest_secundario_3 = $this->nota->get_record($destacado_secundario_3);
	//imagen
	if($dest_secundario_3->main_image !='0' || !empty($dest_secundario_3->main_image) ){
		$img_sec_tres = $this->imagenes_nota->traer_nombre($dest_secundario_3->main_image);
		$img_secundario_tres = '<img src="'.base_url('images-notas/'.$img_sec_tres).'" alt="" class="img-responsive">';
	}else{
		$img_secundario_tres ="";
	}
	$destacado_chico_tres = '
	<div class="col-xs-12 col-lg-3 col-md-6 col-sm-6">
	<div class="media destacado-chico"><!-- inicio destacado chico -->
		<a href="'.base_url('nota/'.$dest_secundario_3->id.'/'.$dest_secundario_3->slug).'">
			'.$img_secundario_tres.'
		</a>
		<div class="media-body">
		<h4 class="titulo-destacado-chico">Media heading</h4>
		<p>'.$dest_secundario_3->titulo.'</p>
		</div>
	</div><!-- fin destacado chico -->
	</div>';
}else{$destacado_chico_tres="";}

// DESTACADA SECUNDARIO 4
if($destacado_secundario_4 != 0 || !empty($destacado_secundario_4)){
	$dest_secundario_4 = $this->nota->get_record($destacado_secundario_4);
	//imagen
	if($dest_secundario_4->main_image !='0' || !empty($dest_secundario_4->main_image) ){
		$img_sec_cuatro = $this->imagenes_nota->traer_nombre($dest_secundario_4->main_image);
		$img_secundario_cuatro = '<img src="'.base_url('images-notas/'.$img_sec_cuatro).'" alt="" class="img-responsive">';
	}else{
		$img_secundario_cuatro ="";
	}
	$destacado_chico_cuatro = '
	<div class="col-xs-12 col-lg-3 col-md-6 col-sm-6">
	<div class="media destacado-chico"><!-- inicio destacado chico -->
		<a href="'.base_url('nota/'.$dest_secundario_4->id.'/'.$dest_secundario_4->slug).'">
			'.$img_secundario_cuatro.'
		</a>
		<div class="media-body">
		<h4 class="titulo-destacado-chico">Media heading</h4>
		<p>'.$dest_secundario_4->titulo.'</p>
		</div>
	</div><!-- fin destacado chico -->
	</div>';
}else{$destacado_chico_cuatro="";}
?>






	<div class="row no-gutters">


			<?php echo $destacado_chico_uno; ?>



		<?php echo $destacado_chico_dos; ?>

		<?php echo $destacado_chico_tres; ?>

		<?php echo $destacado_chico_cuatro; ?>

	</div>


	<div class="row no-gutters">
		<h3>Lo más reciente</h3>
		<div class="col-lg-4" >
		<div class="imagen">
			<img src="public_folder/img/img_photo_placeholder_5.jpg" alt="placeholder" height="300"/>
		</div>
		<h4>Top 8 ways managers drive good employees out the door.</h4>
		<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit. Maecenas aliquet, elit vitae egestas lacinia, nibh purus accumsan metus, ut mollis est eros tempus sem</p>
		</div>
		<div class="col-lg-1"style="max-width: 30px;"></div>
		<div class="col-lg-7">
			<div class="row box-reciente">
				<div class="col-lg-4 thumb"><img src="public_folder/img/img_thumb_placeholder_1.png" alt="" class="img-responsive"></div>
				<div class="col-lg-8 info">
				<h4>NLRB: Employees can have their protest – and free BBQ, too</h4>
					<p>Suplemento:</p><a href="#">Selección</a><span class="dot">•</span><p class="vistas">12</p><span class="dot">•</span><p>Jul 06</p>
				</div>
			</div>
			<div class="row box-reciente">
				<div class="col-lg-4 thumb"><img src="public_folder/img/img_thumb_placeholder_2.png" alt="" class="img-responsive"></div>
				<div class="col-lg-8 info">
				<h4>NLRB: Employees can have their protest – and free BBQ, too</h4>
					<p>Suplemento:</p><a href="#">Selección</a><span class="dot">•</span><p class="vistas">12</p><span class="dot">•</span><p>Jul 06</p>
				</div>
			</div>
			<div class="row box-reciente">
				<div class="col-lg-4 thumb"><img src="public_folder/img/img_thumb_placeholder_3.png" alt="" class="img-responsive"></div>
				<div class="col-lg-8 info">
				<h4>NLRB: Employees can have their protest – and free BBQ, too</h4>
					<p>Suplemento:</p><a href="#">Selección</a><span class="dot">•</span><p class="vistas">12</p><span class="dot">•</span><p>Jul 06</p>
				</div>
			</div>
			<div class="row box-reciente">
				<div class="col-lg-4 thumb"><img src="public_folder/img/img_thumb_placeholder_4.png" alt="" class="img-responsive"></div>
				<div class="col-lg-8 info">
				<h4>NLRB: Employees can have their protest – and free BBQ, too</h4>
					<p>Suplemento:</p><a href="#">Selección</a><span class="dot">•</span><p class="vistas">12</p><span class="dot">•</span><p>Jul 06</p>
				</div>
			</div>
			<div class="row box-reciente">
				<div class="col-lg-4 thumb"><img src="public_folder/img/img_thumb_placeholder_1.png" alt="" class="img-responsive"></div>
				<div class="col-lg-8 info">
				<h4>NLRB: Employees can have their protest – and free BBQ, too</h4>
					<p>Suplemento:</p><a href="#">Selección</a><span class="dot">•</span><p class="vistas">12</p><span class="dot">•</span><p>Jul 06</p>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="col-lg-3"> <!-- columna dos / centro -->
<!-- col container comes from inicio.php -->



	<div class="moduleHome" id="opinion">

	<h3>Opinion</h3>


	<div class="media"><!-- inicio box opinion -->
	  <a class="pull-left" href="#">
	  <div class="cube-img">
		 <img src="public_folder/img/opinion_1.jpg" alt="">
	  </div>
	  </a>
	  <div class="media-body">
		<h4 class="titulo-opinion-box">Ken Blachard</h4>
		<p>NLRB: Employees can have their protest – and free BBQ, too</p>
	  </div>
	</div><!-- fin box opinion -->


	<div class="media"><!-- inicio box opinion -->
	  <a class="pull-left" href="#">
	  <div class="cube-img">
		<img src="public_folder/img/opinion_2.jpg" alt="">
	  </div>
	  </a>
	  <div class="media-body">
		<h4 class="titulo-opinion-box">Philip Kottler</h4>
		<p>NLRB: Employees can have their protest – and free BBQ, too</p>
	  </div>
	</div><!-- fin box opinion -->

	<div class="media"><!-- inicio box opinion -->
	  <a class="pull-left" href="#">
	  <div class="cube-img">
		<img src="public_folder/img/opinion_3.jpg" alt="">
	  </div>
	  </a>
	  <div class="media-body">
		<h4 class="titulo-opinion-box">Ken Blachard</h4>
		<p>NLRB: Employees can have their protest – and free BBQ, too</p>
	  </div>
	</div><!-- fin box opinion -->



	</div><!-- fin id opinion -->




	<div class="moduleHome" id="informes">

		<h3>Informes</h3>
		<div class="box-informe"><!-- inicio box informe -->
			<a class="linkReciente" href="#">
				Recruiting: Take care not to overlook the quiet candidates
			</a>
		</div><!-- fin box informe -->

		<div class="box-informe"><!-- inicio box informe -->
			<a class="linkReciente" href="#">
				Does new NLRB ruling mean you can’t fire someone for insubordination?
			</a>
		</div><!-- fin box informe -->

		<div class="box-informe"><!-- inicio box informe -->
			<a class="linkReciente" href="#">
				Does new NLRB ruling mean you can’t fire someone for insubordination?
			</a>
		</div><!-- fin box informe -->

	</div>


	<div class="adv_columnas">
		<a href="#">
			<img src="public_folder/img/banner_ad_squared.jpg" class="img-responsive" alt="">
		</a>
	</div>	</div>

		<div class="col-lg-2"><!-- columna tres -->
			<!-- col container comes from inicio.php -->

	<div id="videos">

		<h3>Videos</h3>
		<div class="media"><!-- inicio box video -->
			<a href="#">
				<img src="http://hubermann.com/maca15/300/1-246.jpg" alt="" class="img-responsive">
			</a>
			<div class="media-body">
				<p class="fecha-video-box">12 de Diciembre de 2013</p>
				<h4 class="titulo-video-box">Media heading</h4>
			</div>
		</div><!-- fin box video -->


	<div class="media"><!-- inicio box video -->
		<a href="#">
			<img src="http://hubermann.com/maca15/300/1-246.jpg" alt="" class="img-responsive">
		</a>
		<div class="media-body">
			<p class="fecha-video-box">12 de Diciembre de 2013</p>
			<h4 class="titulo-video-box">Media heading</h4>
		</div>
	</div><!-- fin box video -->

	<div class="media"><!-- inicio box video -->
		<a href="#">
			<img src="http://hubermann.com/maca15/300/1-246.jpg" alt="" class="img-responsive">
		</a>
		<div class="media-body">
			<p class="fecha-video-box">12 de Diciembre de 2013</p>
			<h4 class="titulo-video-box">Media heading</h4>
		</div>
	</div><!-- fin box video -->


	</div>		<hr>
		</div>

	</div><!-- fin row clearfix -->
