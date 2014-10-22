<style type="text/css">

#mapa_draw{ height: 300px;}
#getCords{padding: .4em 1em .4em 1em; background: #999; float: left;margin: 0 0 0 .3em; color: #fff;}
#maininput{float: left; width: 100%;}
#maininput input[type="text"] {width: 80%;padding-right: 50px; float: left;}			  	
#maininput span {width: 50px;}
#mapa_draw{ height: 400px; width: 90%; margin-top: .5em}
#coordenadas_mapa #coordenadas{width: 310px; float: left; margin: .3em;}		
#latFld{visibility: hidden;}
#lngFld{visibility: hidden;}	
#coordenadas{width: 500px; padding: .1em; color: #ccc; font-size: 11px}
</style>



<!-- API from google -->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

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

function initMap()
{
    var latlng = new google.maps.LatLng(-34.604603,-58.45852);
    var myOptions = {
        zoom: 11,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("mapa_draw"), myOptions);

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

$attributes = array('class' => 'form-horizontal', 'id' => 'new_evento');
echo form_open_multipart(base_url('control/eventos/create/'),$attributes);

echo form_hidden('evento[id]');

?>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">


<!-- Text input-->

<div class="control-group">
<label class="control-label">Categoria</label>
	<div class="controls">
		
		<select name="categoria_id" id="categoria_id">
		<?php  
		
		$categorias = $this->categoria_evento->get_records_menu();
		if($categorias){

			foreach ($categorias->result() as $value) {
				echo '<option value="'.$value->id.'">'.$value->nombre.'</option>';
			}
		}
		
		?>
		</select>

		<?php echo form_error('categoria_id','<p class="error">', '</p>'); ?>
	</div>
</div>

			
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Titulo</label>
			<div class="controls">
			<input value="<?php echo set_value('titulo'); ?>" class="form-control" type="text" name="titulo" />
			<?php echo form_error('titulo','<p class="error">', '</p>'); ?>
			</div>
			</div>


			
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Descripcion</label>
			<div class="controls">
			<textarea name="descripcion" id="descripcion" class="form-control"><?php echo set_value('descripcion'); ?></textarea>
			<?php echo form_error('descripcion','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Fecha Desde</label>
			<div class="controls">
			<input value="<?php echo set_value('fecha_desde'); ?>" type="text" class="form-control" name="fecha_desde" id="fecha_desde" />
			<?php echo form_error('fecha_desde','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Fecha Hasta</label>
			<div class="controls">
			<input value="<?php echo set_value('fecha_hasta'); ?>" type="text"   class="form-control" name="fecha_hasta" id="fecha_hasta" />
			<?php echo form_error('fecha_hasta','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Lugar</label>
			<div class="controls">
			<input value="<?php echo set_value('lugar'); ?>" type="text" class="form-control"  name="lugar" />
			<?php echo form_error('lugar','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Horario</label>
			<div class="controls">
			<input value="<?php echo set_value('horario'); ?>" type="text" class="form-control"  name="horario" />
			<?php echo form_error('horario','<p class="error">', '</p>'); ?>
			</div>
			</div>

			<div class="control-group">
				<label class="control-label">pais</label>
				<div class="controls">

				<select name="pais" id="pais" >
				<?php  

				$pais = $this->pais->get_records_menu();
				if($pais){

				foreach ($pais->result() as $value) {
					echo '<option value="'.$value->id.'">'.$value->nombre.'</option>';
				}
				}

				?>
				</select>

				<?php echo form_error('pais_id','<p class="error">', '</p>'); ?>
				</div>
			</div>




			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Ciudad</label>
			<div class="controls">
			<input value="<?php echo set_value('ciudad'); ?>" type="text" class="form-control"  name="ciudad" />
			<?php echo form_error('ciudad','<p class="error">', '</p>'); ?>
			</div>
			</div>


			<!-- Text input-->
			<div class="control-group">
				<label class="control-label">Coordenadas</label>
				<div id="maininput">
					<input type="text" id="input_direccion" class="form-control"  placeholder="Ingrese direccion a buscar.">
					<p id="getCords" onClick="codeAddress();" class="btn">>></p>
				</div>
							
				<!-- MAPA -->
				<div id="mapa_draw"></div>

				<!-- COORDENADAS -->
				<div id="coordenadas_mapa">

				<input type="text" id="coordenadas" name="coordenadas" class="form-control"  readonly="true" value="<?php echo set_value('coordenadas'); ?>">
				<input type="text" id="latFld" readonly="true">
				<input type="text" id="lngFld" readonly="true">
				</div>
				
				<?php echo form_error('mapa','<p class="error">', '</p>'); ?>
    <br />
  </div>



			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Tags <small>separados por coma. (Ej: uno, dos, tres)</small></label>
			<div class="controls">
			<input value="<?php echo set_value('tags'); ?>" type="text" class="form-control"  name="tags" />
			<?php echo form_error('tags','<p class="error">', '</p>'); ?>
			</div>
			</div>


			<!-- Text input-->
			<div class="control-group">
				<label class="control-label">Imagen</label>
				<div class="controls">
				<div id="previewImg"></div>
				<input value="<?php echo set_value('filename'); ?>" type="file" name="filename" onchange="show_preview(this)"/>
				<?php echo form_error('filename','<p class="error">', '</p>'); ?>
				</div>
			</div>


			<div class="control-group">
			<label class="control-label"></label>
				<div class="controls">
					<button class="btn" type="submit">Crear</button>
				</div>
			</div>



</fieldset>

<?php echo form_close(); ?>

</div>


<script type="text/javascript">
	window.onload = initMap();
</script>

