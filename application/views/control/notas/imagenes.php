
<script type="text/javascript">
function confirma_eliminar(idvar, urldel) {
    var result = confirm("Confirma eliminar esta imagen?");
    if (result==true) {
        //Confirmada la eliminacion de la img
        $.ajax({
            url: "/control/notas/delete_imagen/"+idvar,
            context: document.body,
            success: function(data){
              //wrapper del thumbnail
              $(".wrapp_thumb"+idvar).remove();
              $("#"+idvar).remove();

            }
        }); 
    }
}

/*FUNCION CAMBIAR PRINCIPAL */
function update_main(idimagen,idpreview){
    $('#imagenes img').css('border', 'none');
    //Logic to delete the item
    var idnota = document.getElementById('idnota').value;
    var formData = new FormData();
    formData.append('idimagen', idimagen);
    formData.append('idnota', idnota);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/control/notas/main_imagen_update/', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
                var output = JSON.parse(xhr.responseText);
    
    
                if (typeof output == "object") {
    
                    if (output.status === "OK") {
                                       
                        //Eliminar box
                        $("#wrapp_thumb"+idimagen+"  img").css("border", "2px solid green");
    
                        //divpreview.parentNode.removeChild(divpreview);
    
                    } else {
                        // Response is HTML
                        notificar("error", "Error al modificar! ");
                    }
    

    
                } else {
                    //si recibo error, aqui lo notifico.
                    notificar_main("error", "Error! " + output.status);
                }
    
    
        } else {
          alert('An error occurred!');
        }
      };
      
      // Send the Data.
      xhr.send(formData);


}//end cambiar principal
</script>


<style>
    .container_img{height: 140px;  overflow: hidden;}
    .seleccionado img{border:2px solid green;}
</style>



<div class="panel panel-default">
    <div class="panel-body">
    <?php 

    $atts = array('id' => 'form_imagenes', 'class' => "navbar-form navbar-left", 'role'=> 'search');
    echo form_open_multipart(base_url('control/notas/add_imagen'), $atts);
    echo form_hidden('id', $this->uri->segment(4)); 
    echo '<input type="file" class="form-control" name="adjunto" id="adjunto" />
    <input type="hidden" id="idnota" value="'.$this->uri->segment(4).'" />
    <button onclick="validateImage();" class="btn btn-default"><span class="glyphicon glyphicon-camera"></span> Agregar Imagen</button>
    ';
    echo form_close();
    ?>
    </div>
</div>

<?php


if($query_imagenes->result()!=""){
    echo "<div id='imagenes'>";
    $nota = $this->nota->get_record($this->uri->segment(4));

        $actual_principal = $nota->main_image;

    $count = 1;
    foreach ($query_imagenes->result() as $imagen) {
        if($actual_principal==$imagen->id){$clase_selected="seleccionado";}else{$clase_selected="";}
        echo '
        <div id="wrapp_thumb'.$imagen->id.'" class="'.$clase_selected.'">
        <div class="thumbnail_delete thumbnail" id="'.$imagen->id.'" style="float:left; margin: 1em; padding:.8em; text-align:center;">
        <div class="container_img">
        <img src="'.base_url('images-notas/'.$imagen->filename).'" width="120" alt="" /></div>
        <p onclick="confirma_eliminar('.$imagen->id.')" class="btn btn-default" role="button">Quitar imagen</p>
        <p onclick="update_main('.$imagen->id.','.$imagen->id.')" class="btn btn-default" role="button">Principal</p>
        
        </div>
        </div>';
    } 
    echo '</div>';  
}#fin if

?>
