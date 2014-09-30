
<h2><?php echo $title; ?></h2>

<?php 
if(count($query->result())){
	echo '<table class="table table-striped">';
	foreach ($query->result() as $row):

		$nombre_categoria = $this->categoria_evento->traer_nombre($row->categoria_id); 

		list($anio, $mes, $dia) = explode("-", $row->fecha_desde);
		list($anioh, $mesh, $diah) = explode("-", $row->fecha_hasta);
		$fecha_desde = $dia."-".$mes."-".$anio;
		$fecha_hasta = $diah."-".$mesh."-".$anioh;

		echo '<tr id="row'.$row->id.'">';
		echo '<td>'.$nombre_categoria.' </td>';
		echo '<td>'.$row->titulo.' </td>';

		echo '<td>'.$row->descripcion.' </td>';
		echo '<td>'.$fecha_desde.' </td>';
		echo '<td>'.$fecha_hasta.' </td>';
		echo '<td>'.$row->lugar.' </td>';
		echo '<td>'.$row->horario.' </td>';
		echo '<td>'.$row->pais.' </td>';
		echo '<td>'.$row->ciudad.' </td>';
		echo '<td>'.$row->tags.' </td>';


		if($row->filename){
		echo '<td><img src="'.base_url('images-eventos/'.$row->filename).'" width="100" /></td>';
		}else{
			echo "<td></td>";
		}

		echo '</td>';

		echo '<td> 
		<div>
		<a  onclick="confirm_delete('.$row->id.')" class="btn btn-small" ><i class="fa fa-trash-o"></i></a>
		<a class="btn btn-small" href="'.base_url('control/eventos/editar/'.$row->id.'').'"><i class="fa fa-edit"></i></a>		
		<a class="btn btn-small" href="'.base_url('control/eventos/detail/'.$row->id.'').'"><i class="fa fa-chain"></i></a>
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
<script type="text/javascript">
	function confirm_delete(id){
            bootbox.confirm("Are you sure?", function(result) {
                if(result==true){
                    //soft delete
					var datos = {idevento:id}
                    $.ajax({
                        url: "<?php echo base_url('control/eventos/soft_delete'); ?>",
                        type: "post",
                        data: datos,
                        success: function(data){
                            //alert("success"+data);
                            $('#row'+id).css('background', 'pink');
                            $('#row'+id).html(data);
                            
                        },
                        error:function(){
                            alert("failure");
                           
                        }
                    });
                }else{
                    console.log("No para el id"+id);
                }

        });
        }
</script>
