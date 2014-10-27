
<?php
$id_evento = $this->uri->segment(4);
if($id_evento==""){redirect("/control/eventos"); }
$evento = $this->evento->get_record($id_evento);
?>
<h3><?php echo ucfirst($title); ?></h3>


<ol class="breadcrumb">
	<li><a href="<?php echo base_url('control/eventos'); ?>">Encuentros</a></li>
  <li><a href="<?php echo base_url('control/eventos/detail/'.$id_evento); ?>"><?php echo $evento->titulo; ?></a></li>
  <li class="active">Speakers</li>
	<li><a href="<?php echo base_url('control/speakers/form_new/'.$id_evento); ?>">Agregar speaker</a></li>

</ol>

<?php
if(count($query->result())){
	echo '<table class="table table-striped">';
	$urldelete = base_url('control/speakers/soft_delete');
	foreach ($query->result() as $row):

		/* $nombre_categoria = $this->categoria->traer_nombre($row->categoria_id); */

		echo '<tr id="row'.$row->id.'">';
		echo '<td id="titulo'.$row->id.'">'.$row->nombre.' </td>';
		echo '<td>'.$row->cargo.' </td>';
		echo '<td>'.$row->empresa.' </td>';


		if($row->filename){
		echo '<td><img src="'.base_url('images-speakers/'.$row->filename).'" width="100" /></td>';
		}else{
			echo "<td></td>";
		}

		echo '</td>';

		echo '<td>
		<div class="btn-group">
		<a onclick="confirm_delete('.$row->id.', \'speakers\', \''.$urldelete.'\')" class="btn btn-small" ><i class="fa fa-trash-o"></i></a>
		<a class="btn btn-small" href="'.base_url('control/speakers/editar/'.$row->id.'').'"><i class="fa fa-edit"></i></a>
		<!--<a class="btn btn-small" href="'.base_url('control/speakers/detail/'.$row->id.'').'"><i class="fa fa-chain"></i></a>-->
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
