<div class="row clearfix nomargin"><!-- titulo -->
	<div class="col-lg-12">
		<?php if(!empty($title)){
		echo "<h1>".ucfirst($title)."</h1>";

		}
		?>

		<hr>
	</div>
</div>


<div class="row clearfix nomargin" id="boxes_notas"><!-- boxes -->


<?php

if($notas){
	foreach($notas as $nota){

		//main image
		$imagen_principal ="";
		if($nota->main_image !='0' || !empty($nota->main_image) ){
			$nombre_imagen = $this->imagenes_nota->traer_nombre($nota->main_image);
			if(!empty($nombre_imagen)){
				$imagen_principal= '<img src="'.base_url('images-notas/'.$nombre_imagen).'" />';
			}

		}

		//extracto
		if(strlen($nota->extracto) > 200){
			$extracto = substr($nota->extracto, 0, 200);
		}else{
			$extracto = $nota->extracto;
		}
		//fecha
		list($anio, $mes, $dia) = explode("-", $nota->fecha);
		$fecha = $dia."-".$mes."-".$anio;
		// Categoria
		$nombre_categoria = $this->categoria_nota->traer_nombre($nota->categoria_id);
		echo '<!-- INICIO BOX NOTA -->
		<div class="col-md-3 col-sm-6 col-xs-12 box_nota">

			<div class="efecto-hulk"><!-- efecto-hulk -->
			<a class="hover-wrap" href="'.base_url('nota/'.$nota->id.'/'.$nota->slug).'">
					<span class="overlay-img"></span>
						<span class="overlay-img-thumb font-icon-plus"></span>
				</a>
			<div class="thumbnail">
				<div class="wrapp_thumbnail">
					<a href="'.base_url('nota/'.$nota->id.'/'.$nota->slug).'">'.$imagen_principal.'</a>
				</div>
			</div>
			<div class="caption">
			<p><span class="categoria_nota_box">'.$nombre_categoria.'</span> - <span class="fecha_nota_box">'.$fecha.'</span></p>
				<h4>'.$nota->titulo.'</h4>
				<p>'.$extracto.'</p>
				<hr>
			</div>
			</div><!-- fin efecto-hulk -->

		</div><!-- fin box_nota -->
		<!-- FIN BOX NOTA -->';

	}


}else{
	echo '<div class="col-md-3 col-sm-6 col-xs-12 box_nota">No hay contenido para esta seccion.</div>';
}

?>

<ul class="pagination pagination-small pagination-centered">
	<?php echo $pagination_links;  ?>
</ul>

</div>
