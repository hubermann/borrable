<?php if($this->session->userdata('front_logged_in')){
  $usuario_logged = $this->usuario->get_record($this->session->userdata('front_logged_in')['id']);
  echo "<h2>".$usuario_logged->nombre." ".$usuario_logged->apellido."</h2>";

  if(empty($usuario_logged->filename)){
    echo '<p>No tienes imagen aun.</p>';

    $attributes = array('class' => 'form-horizontal', 'id' => 'new_usuario');
    echo form_open_multipart(base_url('perfil-cargar-imagen'),$attributes);
    ?>
    <!-- Text input-->
  <div class="control-group">
    <label class="control-label">Imagen</label>
    <div class="controls">
    <input value="<?php echo set_value('filename'); ?>" type="file" class="form-control" name="filename" onchange="show_preview(this)"/>
    <?php echo form_error('filename','<p class="error">', '</p>'); ?>
    </div>
  </div>


  <div class="control-group">
  <label class="control-label"></label>
    <div class="controls">
      <button class="btn" type="submit">Crear</button>
    </div>
  </div>


  <?php
  echo form_close();

  }else{

    if(strlen($usuario_logged->filename) > 6 ){
      echo '<div class="thumbnail">
        <img src="images-usuarios/'.$usuario_logged->filename.'" alt="" />
      </div>';
    }



    $attributes = array('class' => 'form-horizontal', 'id' => 'new_usuario');
    echo form_open_multipart(base_url('perfil-cargar-imagen'),$attributes);
    ?>
    <!-- Text input-->
  <div class="control-group">
    <label class="control-label">Imagen</label>
    <div class="controls">
    <input value="<?php echo set_value('filename'); ?>" type="file" class="form-control" name="filename" onchange="show_preview(this)"/>
    <?php echo form_error('filename','<p class="error">', '</p>'); ?>
    </div>
  </div>


  <div class="control-group">
  <label class="control-label"></label>
    <div class="controls">
      <button class="btn" type="submit">Crear</button>
    </div>
  </div>


  <?php
  echo form_close();

  }


}
?>
