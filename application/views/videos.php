<div class="row clearfix nomargin"><!-- titulo -->
	<div class="col-lg-12">
		<?php if(!empty($title)){
		echo "<h1>".ucfirst($title)."</h1>";

		}
		?>

		<hr>
	</div>
</div>


<div class="row clearfix nomargin" id="boxes_videos"><!-- boxes -->

<?php
if($videos){
	foreach($videos->result() as $video){

		//main image
		$imagen_principal ="";
		if($video->filename !='0' || !empty($video->filename) ){

			$imagen_principal= '<img src="'.base_url('images-videos/'.$video->filename).'" />';
		}


		//fecha
		#list($anio, $mes, $dia) = explode("-", $video->created_at);
		#$fecha = $dia."-".$mes."-".$anio;
		// Categoria

		echo '<!-- INICIO BOX video -->
		<div class="col-md-3 col-sm-6 col-xs-12 box_video">

			<div class="efecto-hulk"><!-- efecto-hulk -->
			<a class="hover-wrap" href="#">
					<span class="overlay-img"></span>
						<span class="overlay-img-thumb font-icon-plus"></span>
				</a>
			<div class="thumbnail">
			'.$video->code_youtube.'
				<div class="wrapp_thumbnail">
					<a href="#">'.$imagen_principal.'</a>
				</div>
			</div>
			<div class="caption">
			<p><span class="categoria_video_box"></span> <span class="fecha_video_box"></span></p>
				<h4>'.$video->titulo.'</h4>

				<hr>
			</div>
			</div><!-- fin efecto-hulk -->

		</div><!-- fin box_video -->
		<!-- FIN BOX video -->';

	}


}else{
	echo '<div class="col-md-3 col-sm-6 col-xs-12 box_video">No hay contenido para esta seccion.</div>';
}

?>





</div>
