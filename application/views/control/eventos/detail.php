<h2><?php echo $title ?></h2>
<div class="well well-large well-transparent">
<?php

if(!empty($query->coordenadas)){
?>
<!-- API from google -->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
<style media="screen">
  #mapa_draw{ width: 250px; height: 250px; margin :1em 0;}
</style>

<script type="text/javascript">
  //Auto complete function for address input
  function initialize() {
  var address = (document.getElementById('input_direccion'));
  var autocomplete = new google.maps.places.Autocomplete(address);
  autocomplete.setTypes(['geocode']);
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
  var place = autocomplete.getPlace();
  if (!place.geometry) {
  return;
  }

  var address = '';
  if (place.address_components) {
  address = [
  (place.address_components[0] && place.address_components[0].short_name || ''),
  (place.address_components[1] && place.address_components[1].short_name || ''),
  (place.address_components[2] && place.address_components[2].short_name || '')
  ].join(' ');
  }
  });
  }
  function codeAddress() {
  geocoder = new google.maps.Geocoder();
  var address = document.getElementById("input_direccion").value;
  geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {


      latitud = results[0].geometry.location.lat();
      longitud = results[0].geometry.location.lng();

      var myLatlng = new google.maps.LatLng(parseFloat(latitud),parseFloat(longitud));
      ubicarMarcador(myLatlng);
      document.getElementById("latFld").value = parseFloat(latitud);
      document.getElementById("lngFld").value = parseFloat(longitud);
    }

    else {
      document.getElementById("input_direccion").value = "No se encuentra direccion";
    }
  });
  }
  google.maps.event.addDomListener(window, 'load', initialize);

  //draw map
  var map;
  var arrayMarcadores = [];

  function initMap(){
  var latlng = new google.maps.LatLng<?php echo $query->coordenadas;?>;
  var myOptions = {
  zoom: 13,
  center: latlng,
  mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById("mapa_draw"), myOptions);


  /* marcador actual al momento de editar */
  var myLatlng = new google.maps.LatLng<?php echo $query->coordenadas;?>;
  var marker = new google.maps.Marker({
  position: myLatlng,
  map: map,
  //title: 'Hello World!'
  });
  arrayMarcadores.push(marker);

  //agrego evento para manejar clicks sobre el mapa
  google.maps.event.addListener(map, "click", function(event)

  {

  // agrego marcador
  ubicarMarcador(event.latLng);

  // Muestro coordenadas en inputs de solo lectura.
  document.getElementById("latFld").value = event.latLng.lat();
  document.getElementById("lngFld").value = event.latLng.lng();
  });




}



//Agrego marcador al hacer click sobre el mapa
function ubicarMarcador(location) {

  // Remuevo marcadores
  limpiarMarcadores();

  var marker = new google.maps.Marker({
  position: location,
  map: map
  });


  // Mostrar direccion en el input, al hacer click en mapa.
  var geocoder = new google.maps.Geocoder();
  geocoder.geocode({"latLng":location}, function (results, status) {

  if (status == google.maps.GeocoderStatus.OK) {

    var lat = results[0].geometry.location.lat(),lng = results[0].geometry.location.lng(),placeName = results[0].address_components[0].long_name,latlng = new google.maps.LatLng(lat, lng);


    document.getElementById("input_direccion").value = results[0].formatted_address;

  }
  });

  // add marker in markers array
  arrayMarcadores.push(marker);

  // Muestro coordenas en inputs
  document.getElementById("latFld").value = location.lat();
  document.getElementById("lngFld").value = location.lng();
  document.getElementById("coordenadas").value = location;

  //muevo centro del mapa
  map.panTo(location);
}


// limpio marcadores
function limpiarMarcadores() {
  if (arrayMarcadores) {
  for (i in arrayMarcadores) {
  arrayMarcadores[i].setMap(null);
  }
  arrayMarcadores.length = 0;
  }
}


</script>


<?php
}//fin if mapa

$nombre_categoria = $this->categoria_evento->traer_nombre($query->categoria_id);
$nombre_pais = $this->pais->traer_nombre($query->pais);
echo "<h3>".$query->titulo." - <i>".$nombre_categoria."</i></h3>

<p>$query->descripcion</p>

<p>Fecha inicio: <strong>$query->fecha_desde</strong> | Fecha finalizacion: <strong>$query->fecha_hasta</strong> </p>

<p>Horario: <strong>$query->horario</strong> </p>

<p>Pais: <strong>$nombre_pais</strong> | Ciudad: <strong>$query->ciudad</strong> </p>

";

if(!empty($query->coordenadas)){
  echo '<div id="mapa_draw">Aca va el mapa</div>';
}

 if($query->filename){
	 echo '<p><img src="'.base_url('images-eventos/'.$query->filename).'" width="140" /></p>';
	}
?>
<div class="btn-group">
<a class="btn btn-small" href="<?php echo base_url('control/eventos/editar/'.$query->id.''); ?>">Modificar evento</a>
</div>


<!-- Speakers -->
<h3>Speakers <a href="<?php echo base_url('control/speakers/form_new/'.$query->id); ?>"> <i class="fa fa-plus-square-o"></i></a></h3>
<?php
$speakers = $this->speaker->get_records($query->id);

if(!empty($speakers->result())){
  echo '<table class="table table-striped">';
  echo '<thead>

  <th>Nombre</th>
  <th>Cargo</th>
  <th>Empresa</th>
  <th>Imagen</th>
  <thead>';
  $urldelete = base_url('control/speakers/soft_delete');
  foreach ($speakers->result() as $row):

    /* $nombre_categoria = $this->categoria->traer_nombre($row->categoria_id); */

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
    <a onclick="confirm_delete('.$row->id.', \'speakers\', \''.$urldelete.'\')" class="btn btn-small" ><i class="fa fa-trash-o"></i></a>
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
<!-- fin speakers -->


<!-- sponsors -->
<h3>Sponsors <a href="<?php echo base_url('control/sponsors/form_new/'.$query->id); ?>"> <i class="fa fa-plus-square-o"></i></a></h3>
<?php
$sponsors = $this->sponsor->get_records($query->id);

if(!empty($sponsors->result())){
  echo '<table class="table table-striped">';
  echo '<thead>
  <th>Nombre</th>
  <th>Destacado</th>
  <th>Imagen</th>
  <thead>';
  $urldelete = base_url('control/sponsors/soft_delete');
  foreach ($sponsors->result() as $row_sponsor):

    /* $nombre_categoria = $this->categoria->traer_nombre($row_sponsor->categoria_id); */
    $destacado = ($row_sponsor->destacado == 1 ? "Si" : "No");
    echo '<tr id="row'.$row_sponsor->id.'">';
    echo '<td id="titulo'.$row_sponsor->id.'">'.$row_sponsor->nombre.' </td>';
    echo '<td>'.$destacado.' </td>';



    if($row_sponsor->filename){
    echo '<td><img src="'.base_url('images-sponsors/'.$row_sponsor->filename).'" width="100" /></td>';
    }else{
      echo "<td></td>";
    }

    echo '</td>';

    echo '<td>
    <div class="btn-group">
    <a onclick="confirm_delete('.$row_sponsor->id.', \'sponsors\', \''.$urldelete.'\')" class="btn btn-small" ><i class="fa fa-trash-o"></i></a>
    <a class="btn btn-small" href="'.base_url('control/sponsors/editar/'.$row_sponsor->id.'').'"><i class="fa fa-edit"></i></a>
    <!--<a class="btn btn-small" href="'.base_url('control/sponsors/detail/'.$row_sponsor->id.'').'"><i class="fa fa-chain"></i></a>-->
    </div>
    </td>';


    echo '</tr>';

  endforeach;
  echo '</table>';
}else{
  echo 'No hay resultados.';
}
?>
<!-- fin sponsors -->
</div>
<script type="text/javascript">
  window.onload = initMap();
</script>
