<div class="box">

<div class="box-header">
	<div class="box-title">
	</h3><?php echo $title; ?></h3>
	</div>
</div>
<style type="text/css">
	a.btn{text-decoration: none; border-bottom: none;}
</style>
<?php 
if(count($query->result())){
	$urldelete = base_url('control/categorias_eventos/soft_delete');
	echo '<div class="box-body table-responsive no-padding">
		<table class="table table-hover">
		<thead>
		<tr>
			<th>Nombre</th>
			<th></th>
			<th></th>
			<th></th>
			<th>Opciones</th>

		</tr>
		</thead>
		<tbody>';
	foreach ($query->result() as $row):

		/* $nombre_categoria = $this->categoria->traer_nombre($row->categoria_id); */

		echo '<tr id="row'.$row->id.'">';
		echo '<td id="titulo'.$row->id.'">'.$row->nombre.' </td>
			  <td></td>
			  <td></td>
			  <td></td>';


		echo '</td>';

		echo '<td> 
		<div class="btn-group">
		<a onclick="confirm_delete('.$row->id.', \'categorias_eventos\', \''.$urldelete.'\')" class="btn btn-small"><i class="fa fa-trash-o"></i></a>
		<a class="btn btn-small" href="'.base_url('control/categorias_eventos/editar/'.$row->id.'').'"><i class="fa fa-edit"></i></a>		
		<!--<a class="btn btn-small" href="'.base_url('control/categorias_eventos/detail/'.$row->id.'').'">detalle</a>-->
		</div>
		</td>';


		echo '</tr>';

	endforeach; 
	echo '<tbody>
		  </table>
		  </div>';
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

</div><!-- end box -->


