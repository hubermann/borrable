<?php

if($nota){

  $titulo = $nota->titulo;
  $nombre_categoria = $this->categoria_nota->traer_nombre($nota->categoria_id);
  //main image
  $imagen_principal ="";

  if($nota->main_image !='0' || !empty($nota->main_image) ){

  $nombre_imagen = $this->imagenes_nota->traer_nombre($nota->main_image);
    $imagen_principal= '<img src="'.base_url('images-notas/'.$nombre_imagen).'" alt="Imagen" class="img-responsive"/>';
  }

  $descripcion = $nota->contenido;

  list($anio, $mes, $dia) = explode("-", $nota->fecha);
  $fecha = $dia."-".$mes."-".$anio;
  $fecha;
  $fuente = $nota->fuente_nombre;
  $fuente_url = $nota->fuente_url;


}


?>

	<article class="row clearfix nomargin">
		<div class="col-lg-9 col-md-9">
			<section class="nota">
				<header>
					<h1><?php echo $titulo; ?></h1>
				</header>
			<!--	<figure class="image">
					<?php echo $imagen_principal; ?>
				</figure>-->
				<footer>
					<figure class="profile">
					<!--	<img src="public_folder/img/guestIcon.jpg" alt="Profile"/> -->
					</figure>
					<div class="info">
						<!--<p>Matt Cynamon</p>-->
            <p>
              <?php echo $nombre_categoria; ?>
            </p>
						<i><?php echo $fecha; ?></i>
					</div>
				<!--	<ul class="share">
						<li><a href="#" class="btnSocial fb"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" class="btnSocial tw"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" class="btnSocial gplus"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#" class="btnSocial in"><i class="fa fa-linkedin"></i></a></li>
					</ul> -->
				</footer>
				<article class="cuerpo">
					<p>
					  <?php echo $descripcion; ?>
					</p>
          <p>
            <?php if(!empty($fuente_url)){
              echo ' Fuente: <a href="'.$fuente_url.'" target="_blank">'.$fuente.'</a>';
            } ?>
          </p>
				</article>

			</section>



  <?php


  //imagenes
  /*
  $query_imagenes = $this->imagenes_nota->imagenes_nota($nota->id);


  if($query_imagenes->result()!=""){
    echo '<section class="row clearfix nomargin" id="otrasNotas">
        <h3>Imagenes</h3>';
    foreach ($query_imagenes->result() as $imagen) {
        if($nota->main_image != $imagen->id){
        echo '<article class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
          <figure class="thumbnail">
            <a href="#"><img src="'.base_url('images-notas/'.$imagen->filename).'" alt="Imagen" class="img-responsive" /></a>
          </figure>
          <div class="desc">
            <p>Body language: 7 signs a job candidate’s lying to you</p>
          </div>
        </article>';
      }
    }

  echo '</section>';

  }
*/
  ?>



    <!-- notas del auto -->
    <!-- 	<section class="row clearfix nomargin" id="otrasNotas">
        <h3>Otras notas del autor</h3>
        <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
          <figure class="thumbnail">
            <a href="#"><img src="http://lorempixel.com/300/200/city/1" alt="Imagen" class="img-responsive" /></a>
          </figure>
          <div class="desc">
            <p>Body language: 7 signs a job candidate’s lying to you</p>
          </div>
        </article>
      </section>-->
      <!-- FIN notas del auto -->


		</div>
		<aside class="col-md-3 column clear">
			<section class="row nomargin no-gutters">
				<div id="sidebar_adv" class="col-lg-12 col-md-12 hidden-sm hidden-xs">
					<img src="public_folder/img/banner_ad_sidebar.jpg" alt="ad" class="img-responsive">
				</div>
			</section>
      <!--
			<h3>Encuestas</h3>
			<section class="encuestas" id="encuesta">
				<i>Teniendo en cuenta el contenido, te gustó la nota?</i>
				<form class="quiz">
				<div class="option clearfix">
					<span class="radioButton"><input type="radio" name="like" value="si"/></span>
					<span class="data">
						<p>Si</p>
						<small>(79.18% - 194 Votos)</small>
						<div class="graphicBar">
							<div class="bar" style="width:80%;"></div>
						</div>
					</span>
				</div>
				<div class="option clearfix">
					<span class="radioButton"><input type="radio" name="like" value="no"/></span>
					<span class="data">
						<p>No</p>
						<small>(20.82% - 51 Votos)</small>
						<div class="graphicBar">
							<div class="bar" style="width:20%;"></div>
						</div>
					</span>
				</div>
				</form>
			</section>
    -->

			<h3>Notas Relacionadas</h3>
			<section>
<?php
$excludes[]= $nota->id;
$notas_relacionadas = $this->nota->get_relacionadas($nota->categoria_id,$excludes, 5);

if(!empty($notas_relacionadas)){
  foreach($notas_relacionadas as $nota_relacionada){
    if($nota_relacionada->main_image !='0' || !empty($nota_relacionada->main_image) ){
      $img_relacionada = $this->imagenes_nota->traer_nombre($nota_relacionada->main_image);
      $img_relacionada = '<img src="'.base_url('images-notas/'.$img_relacionada).'" alt="" width="90"/>';
    }else{
      $img_relacionada ="";
    }
    echo '<div class="media">
      <!-- inicio box opinion -->
      <a class="pull-left" href="'.base_url('nota/'.$nota_relacionada->id.'/'.$nota_relacionada->slug).'">
        <div class="cube-img"> '.$img_relacionada.' </div>
      </a>
      <div class="media-body">
        <p>'.$nota_relacionada->titulo.'</p>
      </div>
    </div>';
  }
}

?>




			</section>
		</aside>
	</article>
