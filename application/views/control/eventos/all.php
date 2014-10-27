<div class="box">

<div class="box-header">
	<div class="box-title">
	</h3><?php echo ucfirst($title); ?></h3>
	</div>
</div><!-- /.box-header -->





<?php
if(count($query->result())){
	$urldelete = base_url('control/eventos/soft_delete');
	echo '
	<div class="box-body table-responsive no-padding">
	<table id="table_eventos" class="table table-hover">';


	echo '
	<thead>
	<tr>
		<th>Categoria</th>
		<th>Titulo</th>
		<th>Fecha inicio</th>


		<th>Sponsors</th>
		<th>Img</th>
		<th>Opciones</th>
	</tr>
	</thead>
	<tbody>';

	foreach ($query->result() as $row):

		$nombre_categoria = $this->categoria_evento->traer_nombre($row->categoria_id);

		list($anio, $mes, $dia) = explode("-", $row->fecha_desde);
		list($anioh, $mesh, $diah) = explode("-", $row->fecha_hasta);
		$fecha_desde = $dia."-".$mes."-".$anio;
		$fecha_hasta = $diah."-".$mesh."-".$anioh;

		echo '<tr id="row'.$row->id.'">';
		echo '<td>'.$nombre_categoria.' </td>';
		echo '<td id="titulo'.$row->id.'">'.$row->titulo.' </td>';

		echo '<td>'.$fecha_desde.' </td>';
		echo '<td>
					<a href="'.base_url('control/sponsors/evento/'.$row->id).'">Sponsors</a>
					<a href="'.base_url('control/speakers/evento/'.$row->id).'">Speakers</a>
			  </td>';


		if($row->filename){
		echo '<td><img src="'.base_url('images-eventos/'.$row->filename).'" width="100" /></td>';
		}else{
			echo "<td></td>";
		}

		echo '</td>';

		echo '<td>
		<div>
		<a onclick="confirm_delete('.$row->id.', \'eventos\', \''.$urldelete.'\')" class="btn btn-small" ><i class="fa fa-trash-o"></i></a>
		<a class="btn btn-small" href="'.base_url('control/eventos/editar/'.$row->id.'').'"><i class="fa fa-edit"></i></a>
		<a class="btn btn-small" href="'.base_url('control/eventos/detail/'.$row->id.'').'"><i class="fa fa-chain"></i></a>
		</div>
		</td>';


		echo '</tr>';

	endforeach;
	echo '	</tbody>
			</table>';
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

</div><!-- box -->


<!-- page script -->
        <script type="text/javascript">
            $(function() {
                $('#table_eventos').dataTable({
                    "bPaginate": false,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": false ,
                    "bAutoWidth": false
                });
            });
        </script>
