
<h2><?php echo $title; ?></h2>

<?php 
if(count($query->result())){
	echo '<table class="table table-striped">';
	foreach ($query->result() as $row):

		/* $nombre_categoria = $this->categoria->traer_nombre($row->categoria_id); */

		echo '<tr>';
echo '<td>'.$row->evento_id.' </td>';
echo '<td>'.$row->nombre.' </td>';
echo '<td>'.$row->slug.' </td>';
echo '<td>'.$row->cargo.' </td>';
echo '<td>'.$row->empresa.' </td>';
echo '<td>'.$row->pais.' </td>';
echo '<td>'.$row->bio.' </td>';
echo '<td>'.$row->cv.' </td>';
echo '<td>'.$row->filename.' </td>';

		if($row->filename){
		echo '<td><img src="'.base_url('images-speakers/'.$row->filename).'" width="100" /></td>';
		}else{
			echo "<td></td>";
		}

		echo '</td>';

		echo '<td> 
		<div class="btn-group">
		<a class="btn btn-small" href="'.base_url('control/speakers/delete_comfirm/'.$row->id.'').'">Eliminar</a>
		<a class="btn btn-small" href="'.base_url('control/speakers/editar/'.$row->id.'').'">Editar</a>		
		<!--<a class="btn btn-small" href="'.base_url('control/speakers/detail/'.$row->id.'').'">detalle</a>-->
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