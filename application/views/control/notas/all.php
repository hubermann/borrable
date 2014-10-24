<div class="box">

<div class="box-header">
    <div class="box-title">
    </h3><?php echo ucfirst($title); ?></h3>
    </div>
</div><!-- /.box-header -->



<?php
if(count($query->result())){
	echo '
	<div class="box-body table-responsive no-padding">
	<table id="table_notas" class="table table-hover">';

	echo '
	<thead>
	<tr>
		<th>Titulo</th>
		<th>Extracto</th>
		<th>Fecha</th>
		<th>Categoria</th>
		<th>Imagen principal</th>
		<th>Opciones</th>
	</tr>
	</thead>
	<tbody>';

    $urldelete = base_url('control/notas/soft_delete');
	echo '<table class="table table-striped">';
	foreach ($query->result() as $row):

		$nombre_categoria = $this->categoria_nota->traer_nombre($row->categoria_id);
		//main image
		$imagen_principal ="";
		if($row->main_image!= 0 ||$row->main_image!=""){
			$nombre_imagen = $this->imagenes_nota->traer_nombre($row->main_image);

			$imagen_principal= '<img src="'.base_url('images-notas/'.$nombre_imagen).'" width="100"/>';
		}
		echo '<td id="titulo'.$row->id.'">'.$row->titulo.' </td>';
		echo '<td>'.$row->extracto.' </td>';
		echo '<td>'.$row->fecha.' </td>';
		echo '<td>'.$nombre_categoria.' </td>';

		echo '<td>'.$imagen_principal.' </td>';



		echo '<td>
		<div class="btn-group">
		<a class="btn btn-small" onclick="confirm_delete('.$row->id.', \'notas\', \''.$urldelete.'\')" ><i class="fa fa-trash-o"></i></a>
		<a class="btn btn-small" href="'.base_url('control/notas/editar/'.$row->id.'').'"><i class="fa fa-edit"></i></a><a class="btn btn-small" href="'.base_url('control/notas/imagenes/'.$row->id.'').'"><i class="fa fa-camera-retro"></i></a>
		<!--<a class="btn btn-small" href="'.base_url('control/notas/detail/'.$row->id.'').'"><i class="fa fa-chain"></i></a>-->
		</div>
		</td>';


		echo '</tr>';

	endforeach;
	echo '</tbody></table>';
}else{
	echo '<div class="box-body">No hay resultados.</div>';
}

if (isset($pagination_links)){
    echo '
    <div>
    <ul class="pagination pagination-small pagination-centered">
    '.$pagination_links.'
    </ul>
    </div><!-- end pagination-->
    ';
}

?>



</div><!-- /.box -->
