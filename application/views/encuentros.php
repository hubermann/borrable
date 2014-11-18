<div class="row clearfix nomargin">
		<div class="col-md-12">
			<h1>Encuentros</h1>
		</div>
		<div class="row clearfix nomargin">
			<div class="col-md-7 column">
				<!-- destacado principal -->
<?php
// $excludes recolecta los que se sacan del query general
$destacado_principal = $this->destacados_evento->get_destacado_principal();

if($destacado_principal != 0){
$excludes[] = $destacado_principal;
//Destacado princiapl es dif a cero
$destacada_principal = $this->evento->get_record($destacado_principal);

if($destacada_principal->filename !=""){
  $background_principal = 'style="max-height: 322px; background-size: 100%; background-repeat:no-repeat; background-image: url('.base_url('images-eventos/'.$destacada_principal->filename).') "';
}else{
  $background_principal = "";
}
// extracto sacado de descrip
if($destacada_principal->descripcion)
    echo '<div class="jumbotron destacado clearfix" '.$background_principal.'>
      <div class="col-md-7 sm-12"></div>
      <div class="col-md-5 sm-12 column">
        <h2>'.$destacada_principal->titulo.'</h1>
        <br><br><br>
        <!-- <p>This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.</p>-->
      </div>

    </div>';

}

//destacados secundario
$dest_sec_uno = $this->destacados_evento->get_destacado_secundario_1();
$dest_sec_dos = $this->destacados_evento->get_destacado_secundario_2();
$dest_sec_tres = $this->destacados_evento->get_destacado_secundario_3();




?>


      <!-- fin destacado principal -->
			</div>
			<div class="col-md-5 column ">
			<!-- 3 destacados secundarios -->

        <?php
        //uno
        if($dest_sec_uno!= 0){
          $excludes[] = $dest_sec_uno;
          $dest_sec_1= $this->evento->get_record($dest_sec_uno);
          if($dest_sec_1->filename !=""){
            $imagen_dest_1 = '<img src="'.base_url('images-eventos/'.$dest_sec_1->filename).'" alt="" class="img-responsive">';
          }else{
            $imagen_dest_1 = "";
          }
          echo '<div class="row box-evento no-margin no-gutters">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 thumb">
              <a href="'.base_url('encuentro/'.$dest_sec_1->id).'"> '.$imagen_dest_1.'
              </a>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 excerpt">
              <h4><a href="'.base_url('encuentro/'.$dest_sec_1->id).'">'.$dest_sec_1->titulo.'</a></h4>
              <p>'.$dest_sec_1->descripcion.'</p>
            </div>
          </div>';
        }

        //dos
        if($dest_sec_dos!= 0){
          $excludes[] = $dest_sec_dos;
          $dest_sec_2= $this->evento->get_record($dest_sec_dos);
          if($dest_sec_2->filename !=""){
            $imagen_dest_2 = '<img src="'.base_url('images-eventos/'.$dest_sec_2->filename).'" alt="" class="img-responsive">';
          }else{
            $imagen_dest_2 = "";
          }
          echo '<div class="row box-evento no-margin no-gutters">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 thumb">
              <a href="#"> '.$imagen_dest_2.'
              </a>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 excerpt">
              <h4><a href="'.base_url('encuentro/'.$dest_sec_2->id).'">'.$dest_sec_2->titulo.'</a></h4>
              <p>'.$dest_sec_2->descripcion.'</p>
            </div>
          </div>';
        }

        //tres
        if($dest_sec_tres!= 0){
          $excludes[] = $dest_sec_tres;
          $dest_sec_3= $this->evento->get_record($dest_sec_tres);
          if($dest_sec_3->filename !=""){
            $imagen_dest_3 = '<img src="'.base_url('images-eventos/'.$dest_sec_3->filename).'" alt="" class="img-responsive">';
          }else{
            $imagen_dest_3 = "";
          }
          echo '<div class="row box-evento no-margin no-gutters">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 thumb">
              <a href="'.base_url('encuentro/'.$dest_sec_3->id).'"> '.$imagen_dest_3.'
              </a>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 excerpt">
              <h4><a href="'.base_url('encuentro/'.$dest_sec_3->id).'">'.$dest_sec_3->titulo.'</a></h4>
              <p>'.$dest_sec_3->descripcion.'</p>
            </div>
          </div>';

        }

        ?>

			</div>
		</div>
	</div>
	<div class="row clearfix nomargin">
		<div class="col-md-2 column">
			<div class="list-group">
				<h3 style="margin-bottom:0px;">Filtrar por:</h3>

				<?php
				$categorias = $this->categoria_evento->get_records_menu();

				if(!empty($categorias)){
					foreach ($categorias->result() as  $categoria) {
						$cant_por_categoria = $this->evento->count_rows_por_categoria($categoria->id);
						echo '	<a href="#" class="list-group-item"><span class="badge">'.$cant_por_categoria.'</span>'.$categoria->nombre.'</a>';
					}
				}

				?>

			</div>
		</div>
		<div class="col-md-10 column listadoEventos">
			<div class="row">

<?php

//Pagination
$per_page = 10;
$page = $this->uri->segment(3);
if(!$page){ $start =0; $page =1; }else{ $start = ($page -1 ) * $per_page; }
  $data['pagination_links'] = "";
  $total_pages = ceil($this->evento->count_rows() / $per_page);

  if ($total_pages > 1){
    for ($i=1;$i<=$total_pages;$i++){
    if ($page == $i)
      //si muestro el índice de la página actual, no coloco enlace
      $data['pagination_links'] .=  '<li class="active"><a>'.$i.'</a></li>';
    else
      //si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa pagina
      $data['pagination_links']  .= '<li><a href="'.base_url('encuentros/'.$i).'" > '. $i .'</a></li>';
  }
}
//End Pagination

$query_eventos = $this->evento->get_records_with_exclude($excludes, $per_page,$start);

$count = 0;
foreach($query_eventos as $evento){

	 $evento->filename == '' ? $imagen_evento = "" : $imagen_evento = '<img src="images-eventos/'.$evento->filename.'" alt="" />';
	echo '<!-- thumbnail -->
	<div class="col-md-3 col-sm-4 col-xs-6 evento">
		<div class="thumbnail">
			<a href="'.base_url('encuentro/'.$evento->id).'">'.$imagen_evento.'</a>
		</div>
		<h4>Recruiting: '.$evento->titulo.'</h4>
		<span class="place"><i class="fa fa-map-marker"></i>'.$evento->lugar.'</span>
		<span class="date"><i class="fa fa-calendar"></i> '.$evento->fecha_desde.'</span>
		<hr/>
	</div>';
	if($count==4){echo '<div style="width:100%; float:left; background:red;" class="clearfix"></div>'; $count=1;}
	$count++;
}

?>




			</div><!-- end row -->
		</div>
	</div>
