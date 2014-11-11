<h2>Crear mi cuenta en Comunidad-rh.com</h2>

<?php

$attributes = array('class' => 'form-horizontal', 'id' => 'new_usuario');
echo form_open_multipart(base_url('registro'),$attributes);

echo form_hidden('usuario[id]');

?>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">


<!-- Text input-->



      <!-- Text input-->
      <div class="control-group">
      <label class="control-label">Nombre</label>
      <div class="controls">
      <input value="<?php echo set_value('nombre'); ?>" class="form-control" type="text" name="nombre" />
      <?php echo form_error('nombre','<p class="error">', '</p>'); ?>
      </div>
      </div>
      <!-- Text input-->
      <div class="control-group">
      <label class="control-label">Apellido</label>
      <div class="controls">
      <input value="<?php echo set_value('apellido'); ?>" class="form-control" type="text" name="apellido" />
      <?php echo form_error('apellido','<p class="error">', '</p>'); ?>
      </div>
      </div>
      <!-- Text input-->
      <div class="control-group">
      <label class="control-label">Email</label>
      <div class="controls">
      <input value="<?php echo set_value('email'); ?>" class="form-control" type="text" name="email" />
      <?php echo form_error('email','<p class="error">', '</p>'); ?>
      </div>
      </div>
      <!-- Text input-->
      <div class="control-group">
      <label class="control-label">Password</label>
      <div class="controls">
      <input value="<?php echo set_value('password'); ?>" class="form-control" type="text" name="password" />
      <?php echo form_error('password','<p class="error">', '</p>'); ?>
      </div>
      </div>

      <!-- Text input-->
      <div class="control-group">
      <label class="control-label">Confirmacion Password</label>
      <div class="controls">
      <input value="<?php echo set_value('password_conf'); ?>" class="form-control" type="text" name="password_conf" />
      <?php echo form_error('password_conf','<p class="error">', '</p>'); ?>
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
