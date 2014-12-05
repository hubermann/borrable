<?php
$imagen = '';
if(!empty($encuentro->filename)){
  $imagen = '<img src="'.base_url('images-eventos/'.$encuentro->filename).'" alt="Imagen" class="img-responsive"/>';
}

?>


<!-- API from google -->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

<article class="row clearfix nomargin">
  <header class="col-md-12">
    <h1><?php echo $encuentro->titulo; ?></h1>
  </header>
  <div class="row clearfix nomargin">
    <div class="col-lg-8 col-md-8">
      <section class="detalle">
        <figure class="imagenEncuentro">
          <?php echo $imagen; ?>
        </figure>
        <?php echo $encuentro->descripcion; ?>
      </section>


      <section class="row clearfix nomargin" id="speakers">
        <h3>Speakers</h3>


        <?php
        //SPEAKERS
        $speakers = $this->speaker->get_records($encuentro->id);

        if(!empty($speakers)){
          foreach ($speakers->result() as $speaker) {
            $imagen="";
            if($speaker->filename!=""){
              $imagen='<a href="#"><img src="'.base_url('images-speakers/'.$speaker->filename).'" alt="Imagen" class="img-responsive" /></a>';
              }
            $cargo_speaker="";
            if($speaker->cargo!=""){$cargo_speaker = $speaker->cargo;}
            # code...
            echo '
            <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 speaker">
              <figure class="thumbnail">
              '.$imagen.'
              </figure>
              <div class="desc">
                <h4>'.$speaker->nombre.'</h4>
                <b>'.$cargo_speaker.'</b>
                <!--<p>Talking desciopcion topic</p>-->
              </div>
            </article>

          ';
        }
      }
        ?>


      </section>

      <section class="row clearfix nomargin" id="sponsors">
        <h3>Sponsors</h3>

        <section class="row clearfix nomargin">
          <h4>Sponsors Gold</h4>

          <?php
          // SPONSORS
          $sponsors_destacados = $this->sponsor->get_diferenciados($encuentro->id, 1);

          if(!empty($sponsors_destacados)){
            foreach ($sponsors_destacados->result() as $sponsor) {
              $imagen="";
              if($sponsor->filename!=""){
                $imagen='<a href="#" style="background-image:url('.base_url('images-sponsors/'.$sponsor->filename).');"><img src="'.base_url('images-sponsors/'.$sponsor->filename).'" alt="Imagen" class="img-responsive" /></a>';
                }
              # code...
              echo '
              <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 sponsor">
              <figure class="logo">
                '.$imagen.'
              </figure>
              <div class="desc">
                <b>'.$sponsor->nombre.'</b>
                <p>Descripcion de la empresa</p>
              </div>
            </article>

            ';
          }
        }



        ?>






        </section>
        <section class="row clearfix nomargin">
          <h4>Sponsors Silver</h4>
          <?php
          // SPONSORS
          $sponsors_destacados = $this->sponsor->get_diferenciados($encuentro->id, 0);

          if(!empty($sponsors_destacados)){
            foreach ($sponsors_destacados->result() as $sponsor) {
              $imagen="";
              if($sponsor->filename!=""){
                $imagen='<a href="#" style="background-image:url('.base_url('images-sponsors/'.$sponsor->filename).');"><img src="'.base_url('images-sponsors/'.$sponsor->filename).'" alt="Imagen" class="img-responsive" /></a>';}
              # code...
              echo '
              <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 sponsor">
              <figure class="logo">
                '.$imagen.'
              </figure>
              <div class="desc">
                <b>'.$sponsor->nombre.'</b>
                <p>Descripcion de la empresa</p>
              </div>
            </article>

            ';
          }
        }



        ?>

        </section>
        <!-- partners -->
        <!--
        <section class="row clearfix nomargin">
          <h4>Media partners</h4>
          <article class="col-lg-2 col-md-2 col-sm-2 col-xs-4 sponsor mediapartner">
            <figure class="logo">
              <a href="#" style="background-image:url(public_folder/img/sponsors/taringa.jpg);"><img src="public_folder/img/sponsors/taringa.jpg" alt="Imagen" class="img-responsive" /></a>
            </figure>
            <div class="desc">
              <b>Media partner</b>
              <p>Ciudad internet Descripcion de la empresa</p>
            </div>
          </article>
          <article class="col-lg-2 col-md-2 col-sm-2 col-xs-4 sponsor mediapartner">
            <figure class="logo">
              <a href="#" style="background-image:url(public_folder/img/sponsors/ciudad.jpg);"><img src="public_folder/img/sponsors/ciudad.jpg" alt="Imagen" class="img-responsive" /></a>
            </figure>
            <div class="desc">
              <b>Media partner</b>
              <p>Ciudad internet Descripcion de la empresa</p>
            </div>
          </article>
          <article class="col-lg-2 col-md-2 col-sm-2 col-xs-4 sponsor mediapartner">
            <figure class="logo">
              <a href="#" style="background-image:url(public_folder/img/sponsors/yahoo.jpg);"><img src="public_folder/img/sponsors/yahoo.jpg" alt="Imagen" class="img-responsive" /></a>
            </figure>
            <div class="desc">
              <b>Media partner</b>
              <p>Ciudad internet Descripcion de la empresa</p>
            </div>
          </article>
          <article class="col-lg-2 col-md-2 col-sm-2 col-xs-4 sponsor mediapartner">
            <figure class="logo">
              <a href="#" style="background-image:url(public_folder/img/sponsors/taringa.jpg);"><img src="public_folder/img/sponsors/taringa.jpg" alt="Imagen" class="img-responsive" /></a>
            </figure>
            <div class="desc">
              <b>Media partner</b>
              <p>Ciudad internet Descripcion de la empresa</p>
            </div>
          </article>
          <article class="col-lg-2 col-md-2 col-sm-2 col-xs-4 sponsor mediapartner">
            <figure class="logo">
              <a href="#" style="background-image:url(public_folder/img/sponsors/ciudad.jpg);"><img src="public_folder/img/sponsors/ciudad.jpg" alt="Imagen" class="img-responsive" /></a>
            </figure>
            <div class="desc">
              <b>Media partner</b>
              <p>Ciudad internet Descripcion de la empresa</p>
            </div>
          </article>
          <article class="col-lg-2 col-md-2 col-sm-2 col-xs-4 sponsor mediapartner">
            <figure class="logo">
              <a href="#" style="background-image:url(public_folder/img/sponsors/yahoo.jpg);"><img src="public_folder/img/sponsors/yahoo.jpg" alt="Imagen" class="img-responsive" /></a>
            </figure>
            <div class="desc">
              <b>Media partner</b>
              <p>Ciudad internet Descripcion de la empresa</p>
            </div>
          </article>

        </section>
      -->
        <!-- fin partners -->

      </section>
    </div>
    <aside class="col-md-4 column">
      <section class="grey">
        <div class="mapa">
          <address>

            <?php
            //fecha desde
            echo ($encuentro->fecha_desde != "0000-00-00") ? '<span class="date">'.$encuentro->fecha_desde.'</span>':"" ;


            //Lugar
            $ciudad = "";
            if($encuentro->ciudad !=""){$ciudad = '<strong> - '.$encuentro->ciudad.'</strong>';}
            $pais="";
            if($encuentro->pais > 0){
            $pais = $this->pais->get_record($encuentro->pais);
            $pais = $pais = '<strong>'.$pais->nombre.'</strong>';;
            }
            echo ($encuentro->lugar != "") ? '<span class="place">'.$encuentro->lugar.' '.$ciudad.' '.$pais.'</span>':"" ;

            $informacion="";
            if($encuentro->fecha_hasta != '0000-00-00' && $encuentro->fecha_hasta != $encuentro->fecha_desde){
              $informacion = '<i>Desde: '.$encuentro->fecha_desde.' Hasta: '.$encuentro->fecha_hasta.'
              Horario: '.$encuentro->horario.'
              </i>';
            }

            ?>


            <hr/>
            <?php echo $informacion; ?>
          </address>
          <figure class="mapa">
          <div id="mapa_draw" style="width:300px; height:300px;">

          </div>
          <?php
          //mapa
          if($encuentro->coordenadas != ""){


            ?>
            <script type="text/javascript">
            function initMap(){
              var latlng = new google.maps.LatLng<?php echo $encuentro->coordenadas;?>;
              var myOptions = {
              zoom: 13,
              center: latlng,
              mapTypeId: google.maps.MapTypeId.ROADMAP
              };
              map = new google.maps.Map(document.getElementById("mapa_draw"), myOptions);

              /* marcador actual al momento de editar */
              var myLatlng = new google.maps.LatLng<?php echo $encuentro->coordenadas;?>;
              var marker = new google.maps.Marker({
              position: myLatlng,
              map: map,
              //title: 'Hello World!'
              });
              arrayMarcadores.push(marker);
              }
              window.onload = initMap();


            </script>

            <?php

          }

          ?>
           </figure>
           <?php
           //PRECIO ???
           echo ($encuentro->precio > 0) ? '<div class="price">'.$encuentro->precio.'</div>':"" ;

          ?>
        </div>
      </section>
      <h3>Registrarse</h3>
      <section class="grey">
        <div class="row no-gutters form">
          <form class="suscribe" action="<?php echo base_url('inscripcion_encuentro'); ?>" method="post">
            <fieldset>
              <input type="hidden" name="evento_id" value="<?php echo $encuentro->id; ?>">
            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-12 control-label" for="apellido">Nombre</label>
              <div class="col-md-12">
              <input id="apellido" name="apellido" type="text" placeholder="" class="form-control input-md" required="">

              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-12 control-label" for="apellido">Apellido</label>
              <div class="col-md-12">
              <input id="apellido" name="apellido" type="text" placeholder="" class="form-control input-md" required="">

              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-12 control-label" for="dni">Documento</label>
              <div class="col-md-12">
              <input id="dni" name="dni" type="text" placeholder="xx.xxxx.xx" class="form-control input-md">

              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-12 control-label" for="telefono">Telefono de contacto</label>
              <div class="col-md-12">
              <input id="telefono" name="telefono" type="text" placeholder="" class="form-control input-md" required="">

              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-12 control-label" for="mail">Direccion de mail</label>
              <div class="col-md-12">
              <input id="mail" name="mail" type="text" placeholder="@" class="form-control input-md">

              </div>
            </div>

          
            <button id="send" name="send" class="btn btn-primary fullWidth">Enviar</button>

            </fieldset>
          </form>

        </div>
      </section>
    </aside>
  </div>
</article>
