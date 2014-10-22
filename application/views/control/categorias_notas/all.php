<div class="box">

<div class="box-header">
    <div class="box-title">
    </h3><?php echo ucfirst($title); ?></h3>
    </div>
</div><!-- /.box-header -->

<?php 
if(count($query->result())){
	echo '<table class="table table-striped">';
    $urldelete = base_url('control/categorias_notas/soft_delete');
	foreach ($query->result() as $row):

		echo '<tr id="row'.$row->id.'">';
        echo '<td id="titulo'.$row->id.'">'.$row->nombre.' </td>';
        echo '<td>'.$row->slug.' </td>';

		echo '</td>';

		echo '<td> 
		<div class="btn-group">
		<a class="btn btn-small" onclick="confirm_delete('.$row->id.', \'categorias_notas\', \''.$urldelete.'\')" ><i class="fa fa-trash-o"></i></a>
		<a class="btn btn-small" href="'.base_url('control/categorias_notas/editar/'.$row->id.'').'"><i class="fa fa-edit"></i></a>		
		<!--<a class="btn btn-small" href="'.base_url('control/categorias_notas/detail/'.$row->id.'').'"><i class="fa fa-chain"></i></a>-->
		</div>
		</td>';


		echo '</tr>';

	endforeach; 
	echo '</table>';
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

</div>


