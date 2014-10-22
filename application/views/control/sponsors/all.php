<div class="box">
	<div class="boxheader"><h2><?php echo ucfirst($title); ?></h2></div>



<div class="box-body table-responsive">
<?php  
$id_evento = $this->uri->segment(4);
if($id_evento==""){redirect("/control/eventos"); }


?>
<!--
<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li>
  <li class="active">Data</li>
</ol>
 -->
<p><a href="<?php echo base_url('control/sponsors/form_new/'.$id_evento); ?>" class="btn">Crear nuevo</a></p>
<?php 
if(count($query->result())){
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
		<a class="btn btn-small"  onclick="confirm_delete('.$row->id.', '.$id_evento.')"><i class="fa fa-trash-o"></i></a>
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

<script type="text/javascript">
	function confirm_delete(id_sponsor, id_evento){
		var titulo = $('#titulo'+id_sponsor).html();
            bootbox.confirm("<h4 >Seguro desea eliminar el sponsors: "+titulo+"</h4>", function(result) {
                if(result==true){
                    //soft delete

					var datos = {idevento:id_evento, idsponsor:id_sponsor}
					console.log(datos);
                    $.ajax({
                        url: "<?php echo base_url('control/sponsors/soft_delete'); ?>",
                        type: "post",
                        dataType: "json",
                        data: datos,
                        success: function(data){
                            //alert("success"+data);

                            if(data["status"] == 1){
                            	
                            	//$('#avisos').html('<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>Evento eliminado!</div>');
                            	$('#row'+id_sponsor).hide('slow');
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