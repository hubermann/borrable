<?php  

$attributes = array('class' => 'form-horizontal', 'id' => 'new_categoria_evento');
echo form_open_multipart(base_url('control/categorias_eventos/create/'),$attributes);

echo form_hidden('categoria_evento[id]');

?>
<fieldset>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">

<!-- Text input-->
<div class="control-group">
<label class="control-label">Nombre</label>
<div class="controls">
<input value="<?php echo set_value('nombre'); ?>" class="form-control" type="text" name="nombre" />
<?php echo form_error('nombre','<p class="error">', '</p>'); ?>
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