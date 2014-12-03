<?php
$imagen = '';
if(!empty($encuentro->filename)){
  $imagen = '<img src="'.base_url('images-eventos/'.$encuentro->filename).'" alt="Imagen" class="img-responsive"/>';
}

?>


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
        var_dump($speakers->result());
        ?>
        <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 speaker">
          <figure class="thumbnail">
            <a href="#"><img src="http://lorempixel.com/300/300/people/1" alt="Imagen" class="img-responsive" /></a>
          </figure>
          <div class="desc">
            <h4>Speaker 01</h4>
            <b>Cargo del Speaker</b>
            <p>Talking desciopcion topic</p>
          </div>
        </article>

        <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 speaker">
          <figure class="thumbnail">
            <a href="#"><img src="http://lorempixel.com/300/300/people/1" alt="Imagen" class="img-responsive"/></a>
          </figure>
          <div class="desc">
            <h4>Speaker 01</h4>
            <b>Cargo del Speaker</b>
            <p>Talking desciopcion topic</p>
          </div>
        </article>

        <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 speaker">
          <figure class="thumbnail">
            <a href="#"><img src="http://lorempixel.com/300/300/people/1" alt="Imagen" class="img-responsive"/></a>
          </figure>
          <div class="desc">
            <h4>Speaker 01</h4>
            <b>Cargo del Speaker</b>
            <p>Talking desciopcion topic</p>
          </div>
        </article>

        <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 speaker">
          <figure class="thumbnail">
            <a href="#"><img src="http://lorempixel.com/300/300/people/1" alt="Imagen" class="img-responsive"/></a>
          </figure>
          <div class="desc">
            <h4>Speaker 01</h4>
            <b>Cargo del Speaker</b>
            <p>Talking desciopcion topic</p>
          </div>
        </article>
      </section>

      <section class="row clearfix nomargin" id="sponsors">
        <h3>Sponsors</h3>
        <?php
        // SPONSORS
        $sponsors = $this->sponsor->get_records($encuentro->id);
        var_dump($sponsors->result());

        ?>
        <section class="row clearfix nomargin">
          <h4>Sponsors Gold</h4>
          <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 sponsor">
            <figure class="logo">
              <a href="#" style="background-image:url(public_folder/img/sponsors/adidas.jpg);"><img src="public_folder/img/sponsors/adidas.jpg" alt="Imagen" class="img-responsive" /></a>
            </figure>
            <div class="desc">
              <b>Empresa</b>
              <p>Descripcion de la empresa</p>
            </div>
          </article>

          <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 sponsor">
            <figure class="logo">
              <a href="#" style="background-image:url(public_folder/img/sponsors/burguer.jpg);"><img src="public_folder/img/sponsors/burguer.jpg" alt="Imagen" class="img-responsive" /></a>
            </figure>
            <div class="desc">
              <b>Empresa</b>
              <p>Descripcion de la empresa</p>
            </div>
          </article>

          <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 sponsor">
            <figure class="logo">
              <a href="#" style="background-image:url(public_folder/img/sponsors/starbucks.jpg);"><img src="public_folder/img/sponsors/starbucks.jpg" alt="Imagen" class="img-responsive" /></a>
            </figure>
            <div class="desc">
              <b>Empresa</b>
              <p>Descripcion de la empresa</p>
            </div>
          </article>

          <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 sponsor">
            <figure class="logo">
              <a href="#" style="background-image:url(public_folder/img/sponsors/leapfrog.jpg);"><img src="public_folder/img/sponsors/leapfrog.jpg" alt="Imagen" class="img-responsive" /></a>
            </figure>
            <div class="desc">
              <b>Empresa</b>
              <p>Descripcion de la empresa</p>
            </div>
          </article>

        </section>
        <section class="row clearfix nomargin">
          <h4>Sponsors Silver</h4>
          <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 sponsor">
            <figure class="logo">
              <a href="#" style="background-image:url(public_folder/img/sponsors/adidas.jpg);"><img src="public_folder/img/sponsors/adidas.jpg" alt="Imagen" class="img-responsive" /></a>
            </figure>
            <div class="desc">
              <b>Cargo del Speaker</b>
              <p>Talking desciopcion topic</p>
            </div>
          </article>
          <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 sponsor">
            <figure class="logo">
              <a href="#" style="background-image:url(public_folder/img/sponsors/adidas.jpg);"><img src="public_folder/img/sponsors/adidas.jpg" alt="Imagen" class="img-responsive" /></a>
            </figure>
            <div class="desc">
              <b>Cargo del Speaker</b>
              <p>Talking desciopcion topic</p>
            </div>
          </article>
          <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 sponsor">
            <figure class="logo">
              <a href="#" style="background-image:url(public_folder/img/sponsors/adidas.jpg);"><img src="public_folder/img/sponsors/adidas.jpg" alt="Imagen" class="img-responsive" /></a>
            </figure>
            <div class="desc">
              <b>Cargo del Speaker</b>
              <p>Talking desciopcion topic</p>
            </div>
          </article>
          <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 sponsor">
            <figure class="logo">
              <a href="#" style="background-image:url(public_folder/img/sponsors/adidas.jpg);"><img src="public_folder/img/sponsors/adidas.jpg" alt="Imagen" class="img-responsive" /></a>
            </figure>
            <div class="desc">
              <b>Cargo del Speaker</b>
              <p>Talking desciopcion topic</p>
            </div>
          </article>
        </section>
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
      </section>
    </div>
    <aside class="col-md-4 column">
      <section class="grey">
        <div class="mapa">
          <address>

              <?php echo ($encuentro->fecha_desde != "0000-00-00") ? '<span class="date">'.$encuentro->fecha_desde.'</span>':"" ; ?>

            <span class="place"><b>Hotel Sheraton</b>(Bs.As.- Argentina)</span>
            <hr/>
            <i>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</i>
          </address>
          <figure class="mapa">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13145.755171542582!2d-58.46580559999999!3d-34.542443899999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzTCsDMyJzMyLjgiUyA1OMKwMjcnNTYuOSJX!5e0!3m2!1ses!2sar!4v1414792288514" width="100%" height="300" frameborder="0" style="border:0"></iframe>
          </figure>
          <div class="price">AR$699,00</div>
        </div>
      </section>
      <h3>Registrarse</h3>
      <section class="grey">
        <div class="row no-gutters form">
          <form class="suscribe">
            <fieldset>

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

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-12 control-label" for="direccion">Direccion de contacto</label>
              <div class="col-md-12">
              <input id="direccion" name="direccion" type="text" placeholder="" class="form-control input-md">

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
