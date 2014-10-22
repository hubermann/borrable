
<h2><?php echo $title; ?></h2>

<?php  
$id_evento = $this->uri->segment(4);
if($id_evento==""){redirect("/control/eventos"); }
?>
<p><a href="<?php echo base_url('control/speakers/form_new/'.$id_evento); ?>" class="btn">Crear nuevo</a></p>
<?php 
if(count($query->result())){
	echo '<table class="table table-striped">';
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
		<a  onclick="confirm_delete('.$row->id.')" class="btn btn-small" ><i class="fa fa-trash-o"></i></a>
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

<script type="text/javascript">
	function confirm_delete(id){
		var titulo = $('#titulo'+id).html();
            bootbox.confirm("<h4 >Seguro desea eliminar el spaker: "+titulo+"</h4>", function(result) {
                if(result==true){
                    //soft delete
                    console.log(titulo);
					var datos = {idevento:id}
					console.log(datos);
                    $.ajax({
                        url: "<?php echo base_url('control/speakers/soft_delete'); ?>",
                        type: "post",
                        dataType: "json",
                        data: datos,
                        success: function(data){
                            //alert("success"+data);

                            if(data["status"] == 1){
                            	
                            	//$('#avisos').html('<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>Evento eliminado!</div>');
                            	$('#row'+id).hide('slow');
                            }
  
                        },
                        error:function(){
                            alert("failure");
                           
                        }
                    });
                }
                window.setTimeout(function() { $(".alert-success").alert('close'); }, 4000);
        });
        }
</script>