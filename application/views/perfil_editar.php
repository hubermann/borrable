
<?php
$attributes = array('class' => 'form-horizontal', 'id' => 'edit_usuario');
echo form_open_multipart(base_url('perfil-editar'),$attributes);

echo form_hidden('id', $query->id);
?>
<legend><?php if($title!=""){echo $title;} ?></legend>
<div class="well well-large well-transparent">

      <!-- Text input-->
      <div class="control-group">
      <label class="control-label">Nombre</label>
      <div class="controls">
      <input value="<?php echo $query->nombre; ?>" type="text" class="form-control" name="nombre" />
      <?php echo form_error('nombre','<p class="error">', '</p>'); ?>
      </div>
      </div>
      <!-- Text input-->
      <div class="control-group">
      <label class="control-label">Apellido</label>
      <div class="controls">
      <input value="<?php echo $query->apellido; ?>" type="text" class="form-control" name="apellido" />
      <?php echo form_error('apellido','<p class="error">', '</p>'); ?>
      </div>
      </div>
      <!-- Text input-->
      <div class="control-group">
      <label class="control-label">Email</label>
      <div class="controls">
      <input value="<?php echo $query->email; ?>" type="text" class="form-control" name="email" />
      <?php echo form_error('email','<p class="error">', '</p>'); ?>
      </div>
      </div>


      <div class="control-group">
      <label class="control-label"></label>
        <div class="controls">
          <button class="btn" type="submit">Actualizar</button>
        </div>
      </div>

</fieldset>

<?php echo form_close(); ?>

</div>
