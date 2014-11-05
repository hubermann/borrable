<?php

if($nota){

  echo $titulo = $nota->titulo;
  echo $nombre_categoria = $this->categoria_nota->traer_nombre($nota->categoria_id);
  //main image
  $imagen_principal ="";

  if($nota->main_image !='0' || !empty($nota->main_image) ){

  $nombre_imagen = $this->imagenes_nota->traer_nombre($nota->main_image);
    echo  $imagen_principal= '<img src="'.base_url('images-notas/'.$nombre_imagen).'" width="100"/>';
  }

  echo $descripcion = $nota->contenido;

  list($anio, $mes, $dia) = explode("-", $nota->fecha);
  $fecha = $dia."-".$mes."-".$anio;
  echo $fecha;
  echo $fuente = $nota->fuente_nombre;
  echo $fuente_url = $nota->fuente_url;

  //imagenes
  $query_imagenes = $this->imagenes_nota->imagenes_nota($nota->id);


  if($query_imagenes->result()!=""){
    foreach ($query_imagenes->result() as $imagen) {
      echo $imagen->filename ;
    }
  }
}


?>
