<?php
if($nota){
$titulo = $nota->titulo;
$nombre_categoria = $this->categoria_nota->traer_nombre($nota->categoria_id);
$categoria_nota = $this->categoria_nota->get_record($nota->categoria_id);
//main image
$imagen_principal ="";
if($nota->main_image !='0' || !empty($nota->main_image) ){
$nombre_imagen = $this->imagenes_nota->traer_nombre($nota->main_image);
$imagen_principal= '<img src="'.base_url('images-notas/'.$nombre_imagen).'" alt="Imagen" class="img-responsive"/>';
}
$descripcion = $nota->contenido;
list($anio, $mes, $dia) = explode("-", $nota->fecha);
$fecha = $dia."-".$mes."-".$anio;
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
$fecha = strftime("%d de %B de %Y", strtotime($nota->fecha));
$meses_EN =array(
'January',
'February',
'March',
'April',
'May',
'June',
'July ',
'August',
'September',
'October',
'November',
'December',
);
$meses_ES   = array(
'Enero',
'Febrero',
'Marzo',
'Abril',
'Mayo',
'Junio',
'Julio ',
'Agosto',
'Septiembre',
'Octubre',
'Noviembre',
'Diciembre',
);
$fecha = str_replace($meses_EN, $meses_ES, $fecha);
$fuente = $nota->fuente_nombre;
$fuente_url = $nota->fuente_url;
}
?>

<article class="row clearfix nomargin">
<div class="col-lg-9 col-md-9">
<section class="nota">
<header>
<h1><?php echo $titulo; ?></h1>
</header>
<figure class="image">
<?php echo $imagen_principal; ?>
</figure>
<footer>
<figure class="profile">
<?php
/* DATOS AUTOR */
$autor = $this->usuario->get_record($nota->autor_id);
if(!empty($autor->filename)){
  echo '<img src="'.base_url('images_usuarios/'.$autor->filename).'" alt="Profile"/>';
}else{
  echo '<img src="'.base_url('public_folder/img/guestIcon.jpg').'" alt="Profile"/>';
}
?>


</figure>
<div class="info">
<!--<p>Matt Cynamon</p>-->
<p>
  <a href="<?php echo base_url($categoria_nota->slug); ?>"><?php echo $nombre_categoria; ?></a>
</p>
<i><?php echo $fecha; ?></i>
</div>
<ul class="share">
<?php
?>

<li>
<!-- FACEBOOK -->
<div class="fb-share-button btnSocial tw" data-href="<?php echo base_url('nota/'.$nota->id.'/'.$nota->slug); ?>" data-layout="icon"></div>
</li>
<li>
<!-- TWITTER -->  
<!--<a href="#" class="btnSocial tw"><i class="fa fa-twitter"></i></a> -->
<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo base_url('nota/'.$nota->id.'/'.$nota->slug); ?>" data-via="Hubermann" data-lang="es" data-size="large" data-count="none" data-hashtags="ComunidadRH">Twittear</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
</li>
<li>
<!-- GOOGLE PLUS -->
<a href="https://plus.google.com/share?url=<?php echo base_url('nota/'.$nota->id.'/'.$nota->slug); ?>" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img
  src="https://www.gstatic.com/images/icons/gplus-32.png" alt="Share on Google+"/></a>

<!--<a href="#" class="btnSocial gplus"><i class="fa fa-google-plus"></i></a> --> </li>
<li>
<!-- LINKEDIN -->
<script src="//platform.linkedin.com/in.js" type="text/javascript">
  lang: es_ES
</script>
<script type="IN/Share" data-url="<?php echo base_url('nota/'.$nota->id.'/'.$nota->slug); ?>"></script><!--<a href="#" class="btnSocial in"><i class="fa fa-linkedin"></i></a> --></li>
</ul>
</footer>
<article class="cuerpo">
<p>
<?php echo $descripcion; ?>
</p>
<p>
<?php if(!empty($fuente_url)){
  echo ' Fuente: <a href="'.$fuente_url.'" target="_blank">'.$fuente.'</a>';
} ?>
</p>
</article>

</section>



<?php
//imagenes
$query_imagenes = $this->imagenes_nota->imagenes_nota($nota->id);
if(count($query_imagenes->result()) >= 2){
echo '<section class="row clearfix nomargin" id="otrasNotas">
<h3>Imagenes</h3>';
foreach ($query_imagenes->result() as $imagen) {
if($nota->main_image != $imagen->id){
echo '<article class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
<figure class="thumbnail">
<div id="pop'.$imagen->id.'"><img id="imageresource'.$imagen->id.'" src="'.base_url('images-notas/'.$imagen->filename).'" alt="Imagen" class="img-responsive" /></div>
</figure>
<!--  <div class="desc">
<p>Body language: 7 signs a job candidate’s lying to you</p>
</div> -->
</article>
';
echo '<!-- Modal for image -->
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <h4 class="modal-title" id="myModalLabel">'.$titulo.'</h4>
    </div>
    <div class="modal-body">
      <img src="" id="imagepreview" style="width:80%; " >
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar </button>
    </div>
  </div>
</div>
</div>
<script charset="utf-8">
$("#pop'.$imagen->id.'").on("click", function() {
 $(\'#imagepreview\').attr(\'src\', $(\'#imageresource'.$imagen->id.'\').attr(\'src\'));
 $(\'#imagemodal\').modal(\'show\');
});
</script>
';
}
}
echo '</section>';
}
?>



<section id="comentarios">
  <h3>Comentarios</h3>
  <?php
  //comentarios de la nota
  $comentarios = $this->comentario_nota->get_by_nota($nota->id, $limite=5);
  if( !empty($comentarios) ){
    foreach ($comentarios as $comentario) {
      setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
      $fecha_comentario = strftime("%d de %B de %Y", strtotime($comentario->created_at));
      $meses_EN =array(
      'January',
      'February',
      'March',
      'April',
      'May',
      'June',
      'July ',
      'August',
      'September',
      'October',
      'November',
      'December',
      );
      $meses_ES   = array(
      'Enero',
      'Febrero',
      'Marzo',
      'Abril',
      'Mayo',
      'Junio',
      'Julio ',
      'Agosto',
      'Septiembre',
      'Octubre',
      'Noviembre',
      'Diciembre',
      );
      $fecha_comentario = str_replace($meses_EN, $meses_ES, $fecha_comentario);
      $usuario = $this->usuario->get_record($comentario->usuario_id);
      echo '<div class=box_comentario>
      <p><strong>'.$usuario->nombre.'</strong></p>
      <p>
        '.$comentario->body.'
      </p><p>
        <small>'.$fecha_comentario.'</small>
      </p>
      <hr>
      </div>';
    }
  }
  /* SI existe mensaje al usuario*/
  if($this->session->flashdata('success_comentario')):
    echo '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>
    '.$this->session->flashdata('success_comentario').'</div>';
    endif;
if($this->session->userdata('front_logged_in')){
  #form nuevo comentario
  $attributes = array('class' => 'form-horizontal', 'id' => 'new_comentario_nota');
  echo form_open_multipart(base_url('comentarios_notas/nuevo/'),$attributes);
  ?>

  <!-- Text input-->
  <div class="control-group">
  <label class="control-label">Nuevo comentario</label>
  <div class="controls">
  <textarea name="body" id="body" class="form-control" required title="Complete este campo con su comentario."><?php echo set_value('body'); ?></textarea>
  <?php echo form_error('body','<p class="error">', '</p>'); ?>
  </div>
  </div>


  <div class="control-group">
  <label class="control-label"></label>
    <div class="controls">
      <button class="btn" type="submit">Comentar</button>
    </div>
  </div>

  <?php
  echo form_hidden('comentario_nota[id]');
  echo form_hidden('nota_id', $nota->id);
  echo form_close();
}else{
    //USUARIO SIN LOGIN
  echo '<p>
    Para realizar comentarios debe estar registrado.
  </p>
  <p><a href="'.base_url('ingreso').'" class="btn btn-primary">Ingresar</a>
  <a href="'.base_url('registro').'" class="btn btn-default">Registrarme</a></p><br/>';
}
?>



</section>


<!-- notas del autor -->

<?php
$notas_autor = $this->nota->notas_por_autor($nota->autor_id,$nota->id, 4);
if(!empty($notas_autor) ){
  echo '<section class="row clearfix nomargin" id="otrasNotas">
  <h3>Otras notas del autor</h3>';
}
foreach ($notas_autor as $nota_autor) {
  //main image
  $imagen_principal_rel ="";
  if($nota_autor->main_image !='0' || !empty($nota_autor->main_image) ){
  $nombre_imagen = $this->imagenes_nota->traer_nombre($nota_autor->main_image);
  $imagen_principal_rel= '<a href="'.base_url('nota/'.$nota_autor->id.'/'.$nota_autor->slug).'"><img src="'.base_url('images-notas/'.$nombre_imagen).'" alt="Imagen" class="img-responsive" /></a>
  ';
}
echo '<article class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
<figure class="thumbnail">
'.$imagen_principal_rel.'
</figure>
<div class="desc">
<p>'.substr($nota_autor->extracto,0, 120).'</p>
</div>
</article>';
$excludes[] =$nota_autor->id;
}
if($notas_autor){
  echo '</section>
  <!-- FIN notas del auto -->';
}
?>







</div>
<aside class="col-md-3 column clear">
<section class="row nomargin no-gutters">
<div id="sidebar_adv" class="col-lg-12 col-md-12 hidden-sm hidden-xs">
<img src="public_folder/img/banner_ad_sidebar.jpg" alt="ad" class="img-responsive">
</div>
</section>
<!--
<h3>Encuestas</h3>
<section class="encuestas" id="encuesta">
<i>Teniendo en cuenta el contenido, te gustó la nota?</i>
<form class="quiz">
<div class="option clearfix">
<span class="radioButton"><input type="radio" name="like" value="si"/></span>
<span class="data">
<p>Si</p>
<small>(79.18% - 194 Votos)</small>
<div class="graphicBar">
  <div class="bar" style="width:80%;"></div>
</div>
</span>
</div>
<div class="option clearfix">
<span class="radioButton"><input type="radio" name="like" value="no"/></span>
<span class="data">
<p>No</p>
<small>(20.82% - 51 Votos)</small>
<div class="graphicBar">
  <div class="bar" style="width:20%;"></div>
</div>
</span>
</div>
</form>
</section>
-->

<h3>Notas Relacionadas</h3>
<section>
<?php
$excludes[]= $nota->id;
$notas_relacionadas = $this->nota->get_relacionadas($nota->categoria_id,$excludes, 5);
if(!empty($notas_relacionadas)){
foreach($notas_relacionadas as $nota_relacionada){
if($nota_relacionada->main_image !='0' || !empty($nota_relacionada->main_image) ){
$img_relacionada = $this->imagenes_nota->traer_nombre($nota_relacionada->main_image);
$img_relacionada = '<img src="'.base_url('images-notas/'.$img_relacionada).'" alt="" width="90"/>';
}else{
$img_relacionada ="";
}
echo '<div class="media">
<!-- inicio box opinion -->
<a class="pull-left" href="'.base_url('nota/'.$nota_relacionada->id.'/'.$nota_relacionada->slug).'">
<div class="cube-img"> '.$img_relacionada.' </div>
</a>
<div class="media-body">
<p><a href="'.base_url('nota/'.$nota_relacionada->id.'/'.$nota_relacionada->slug).'">'.$nota_relacionada->titulo.'</a></p>
</div>
</div>';
}
}
?>




</section>
</aside>
</article>