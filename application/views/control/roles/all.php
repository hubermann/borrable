
<h2><?php echo $title; ?></h2>

<?php 
if(count($query->result())){
    $urldelete = base_url('control/roles/soft_delete');
	echo '<table class="table table-striped">';
	foreach ($query->result() as $row):

		/* $nombre_categoria = $this->categoria->traer_nombre($row->categoria_id); */

		echo '<tr id="row'.$row->id.'">';
        echo '<td id="titulo'.$row->id.'">'.$row->nombre.' </td>';

		echo '</td>';

		echo '<td> 
		<div class="btn-group">
		<a class="btn btn-small" onclick="confirm_delete('.$row->id.', \'roles\', \''.$urldelete.'\')"><i class="fa fa-trash-o"></i></a>
		<a class="btn btn-small" href="'.base_url('control/roles/editar/'.$row->id.'').'"><i class="fa fa-edit"></i></a>		
		<!--<a class="btn btn-small" href="'.base_url('control/roles/detail/'.$row->id.'').'"><i class="fa fa-chain"></i></a>-->
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

