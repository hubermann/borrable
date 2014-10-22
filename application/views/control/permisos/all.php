
<h2><?php echo $title; ?></h2>
<div id="notificacion_main"></div>
<?php 

$counter = 1;
foreach ($modulos->result() as $modulo) {
    $nombre_modulo = str_replace("_", " ", $modulo->nombre);
    echo '<h4> '.$modulo->id.'-'.ucfirst($nombre_modulo).'</h4>';
    
    foreach ($roles->result() as $rol) {

    #VER
    if( $this->permiso->show_permiso_rol( $rol->id, $modulo->id, 'view' ) === TRUE ){
        $opcion_ver = "<p onclick=\"update_permission('$rol->id','$modulo->id', 'view', '0', '".$counter."')\"><i class=\"fa fa-unlock fa-2\"></i></p>";
    }else{
        $opcion_ver = "<p onclick=\"update_permission('$rol->id','$modulo->id', 'view', '1', '".$counter."')\"><i class=\"fa fa-lock fa-2\"></i></p>";
    }
    
    #CREAR
    if( $this->permiso->show_permiso_rol( $rol->id, $modulo->id, 'create' ) === TRUE ){
        $opcion_crear = "<p onclick=\"update_permission('$rol->id','$modulo->id', 'create', '0', '".$counter."')\"><i class=\"fa fa-unlock fa-2\"></i></p>";
    }else{
        $opcion_crear = "<p onclick=\"update_permission('$rol->id','$modulo->id', 'create', '1', '".$counter."')\"><i class=\"fa fa-lock fa-2\"></i></p>";
    }

    #EDITAR
    if( $this->permiso->show_permiso_rol( $rol->id, $modulo->id, 'edit' ) === TRUE ){
        $opcion_editar = "<p onclick=\"update_permission('$rol->id','$modulo->id', 'edit', '0', '".$counter."')\"><i class=\"fa fa-unlock fa-2\"></i></p>";
    }else{
        $opcion_editar = "<p onclick=\"update_permission('$rol->id','$modulo->id', 'edit', '1', '".$counter."')\"><i class=\"fa fa-lock fa-2\"></i></p>";
    }

    #BORRAR
    if( $this->permiso->show_permiso_rol( $rol->id, $modulo->id, 'delete' ) === TRUE ){
        $opcion_borrar = "<p onclick=\"update_permission('$rol->id','$modulo->id', 'delete', '0', '".$counter."')\"><i class=\"fa fa-unlock fa-2\"></i></p>";
    }else{
        $opcion_borrar = "<p onclick=\"update_permission('$rol->id','$modulo->id', 'delete', '1', '".$counter."')\"><i class=\"fa fa-lock fa-2\"></i></p>";
    }
    
        echo '
        <table style="border:1px solid #ccc; text-align:center" width="100%" >
        <thead>
        <tr>
            <td width="20%">'.$rol->nombre.'</td><td>Ver</td><td>Crear</td><td>Editar</td><td>Borrar</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td></td>
            <td width="20%" id="tdview'.$counter.'">'.$opcion_ver.'</td>
            <td width="20%"  id="tdcreate'.$counter.'">'.$opcion_crear.'</td>
            <td  width="20%" id="tdedit'.$counter.'">'.$opcion_editar.'</td>
            <td width="20%"  id="tddelete'.$counter.'">'.$opcion_borrar.'</td>
        </tr>
        </tbody>
        </table>

        ';
        $counter++;
    }

}

?>




<script type="text/javascript">



function notificar(tipo, mensaje) {
    mensajes_div = document.getElementById("notificacion_main");
    mensajes_div.innerHTML = mensaje;
    mensajes_div.setAttribute("class", tipo);
    //hide msg
    setTimeout(function () {
        mensajes_div.innerHTML = "";
        mensajes_div.setAttribute("class", "none");
    }, 3000);
}


function update_permission( role_id, modulo, action, nuevo_permiso, tdseleccionado){

    var formData = new FormData();
    formData.append('roleid', role_id);
    formData.append('varmodulo', modulo);
    formData.append('varaction', action);
    formData.append('varnuevopermiso', nuevo_permiso);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', "<?php echo base_url('control/permisos/update_permiso'); ?>", true);
    xhr.onload = function () {
        if (xhr.status === 200) {
                var output = JSON.parse(xhr.responseText);
    
                if (typeof output == "object") {
    
                    if (output.status === "OK") {
                        
                        
                        //cambio el texto del TD y agrego la nueva opcion para modificar.
                        
                        //Futuro permiso
                        if( nuevo_permiso == 1){
                          
                         
                            nuevo_parrafo = "<p onclick=\"update_permission('"+role_id+"','"+modulo+"', '"+action+"', '0', "+tdseleccionado+")\"><i class=\"fa fa-unlock fa-2\"></i></p>";
                            tdinvolucrado = document.getElementById("td"+action+tdseleccionado);
                            tdinvolucrado.innerHTML = nuevo_parrafo;

                        }else{
                        
                            nuevo_parrafo = "<p onclick=\"update_permission('"+role_id+"','"+modulo+"', '"+action+"', '1', "+tdseleccionado+")\"><i class=\"fa fa-lock fa-2\"></i></p>";
                            tdinvolucrado = document.getElementById("td"+action+tdseleccionado);
                            tdinvolucrado.innerHTML = nuevo_parrafo;

                        }

                        
                        
                        //notifico con mensaje
                        //notificar("alert-success", "Permiso modificado a: "+nuevo_permiso+"  en td"+action+tdseleccionado);
                        nuevo_parrafo="";
    
                    } else {
                        // Response is HTML
                        //notificar("alert-danger", "Error al modificar! ");
                    }
    

    
                } else {
                    //si recibo error, aqui lo notifico.
                    notificar("alert-danger", "Error! " + output.status);
                }
    
    
        } else {
          alert('An error occurred!');
        }
      };
      
      // Send the Data.
      xhr.send(formData);


}//end cambiar principal
</script>