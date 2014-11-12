
<?php
$attributes = array('class' => 'form-horizontal', 'id' => 'edit_usuario');
echo form_open_multipart(base_url('perfil-modificar-acceso'),$attributes);

?>
<legend><?php if($title!=""){echo $title;} ?></legend>
<div class="well well-large well-transparent">



      <!-- Text input-->
      <div class="control-group">
      <label class="control-label">Contraseña actual</label>
      <div class="controls">
      <input value="<?php echo set_value('pass_actual'); ?>" type="text" class="form-control" name="pass_actual" />
      <?php echo form_error('pass_actual','<p class="error">', '</p>'); ?>
      </div>
      </div>

      <!-- Text input-->
      <div class="control-group">
      <label class="control-label">Nueva contraseña</label>
      <div class="controls">
      <input value="<?php echo set_value('nuevo_pass'); ?>" type="text" class="form-control" name="nuevo_pass" />
      <?php echo form_error('nuevo_pass','<p class="error">', '</p>'); ?>
      </div>
      </div>


      <!-- Text input-->
      <div class="control-group">
      <label class="control-label">Repetir Nueva contraseña</label>
      <div class="controls">
      <input value="<?php echo set_value('repeat_nuevo_pass'); ?>" type="text" class="form-control" name="repeat_nuevo_pass" />
      <?php echo form_error('repeat_nuevo_pass','<p class="error">', '</p>'); ?>
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
