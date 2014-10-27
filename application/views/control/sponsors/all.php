<div class="box">
	<div class="boxheader"><h2><?php echo ucfirst($title); ?></h2></div>



<div class="box-body table-responsive">
<?php
$id_evento = $this->uri->segment(4);
if($id_evento==""){redirect("/control/eventos"); }
$evento = $this->evento->get_record($id_evento);

?>
<ol class="breadcrumb">
	<li><a href="<?php echo base_url('control/eventos'); ?>">Encuentros</a></li>
	<li><a href="<?php echo base_url('control/eventos/detail/'.$id_evento); ?>"><?php echo $evento->titulo; ?></a></li>
	<li class="active">Sponsors</li>
	<li><a href="<?php echo base_url('control/sponsors/form_new/'.$id_evento); ?>">Agregar sponsor</a></li>
</ol>

<?php
if(count($query->result())){
	$urldelete = base_url('control/sponsors/soft_delete');
	echo '<table class="table table-striped">

		<thead>
		<tr>
			<td>Nombre</td>
			<td>Destacados</td>
			<td>Img</td>
			<td>Opciones</td>

		</tr>
		</thead>
';
	foreach ($query->result() as $row):

		/* $nombre_categoria = $this->categoria->traer_nombre($row->categoria_id); */
		if($row->destacado==1){$destacado = "Si";}else{$destacado = "No";}
		echo '<tr id=row'.$row->id.'>';
		echo '<td id="titulo'.$row->id.'">'.$row->nombre.' </td>';
		echo '<td>'.$destacado.' </td>';


		if($row->filename){
		echo '<td><img src="'.base_url('images-sponsors/'.$row->filename).'" width="100" /></td>';
		}else{
			echo "<td></td>";
		}

		echo '</td>';

		echo '<td>
		<div class="btn-group">
		<a class="btn btn-small" onclick="confirm_delete('.$row->id.', \'sponsors\', \''.$urldelete.'\')"><i class="fa fa-trash-o"></i></a>
		<a class="btn btn-small" href="'.base_url('control/sponsors/editar/'.$row->id.'').'"><i class="fa fa-edit"></i></a>
		<!--<a class="btn btn-small" href="'.base_url('control/sponsors/detail/'.$row->id.'').'">detalle</a>-->
		</div>
		</td>';


		echo '</tr>';

	endforeach;
	echo '</table>';
}else{
	echo 'No hay resultados.';
}
?>
<div>
<ul class="pagination pagination-small pagination-centered">
<?php echo $pagination_links;  ?>
</ul>
</div>

</div><!-- box header -->
</div>
