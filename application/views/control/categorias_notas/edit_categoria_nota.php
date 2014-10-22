<?php  
$attributes = array('class' => 'form-horizontal', 'id' => 'edit_categoria_nota');
echo form_open_multipart(base_url('control/categorias_notas/update/'),$attributes);

echo form_hidden('id', $query->id); 
?>
<legend><?php echo $title ?></legend>
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
<label class="control-label">Slug</label>
<div class="controls">
<input value="<?php echo $query->slug; ?>" type="text" class="form-control" name="slug" />
<?php echo form_error('slug','<p class="error">', '</p>'); ?>
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
