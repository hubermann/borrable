<?php  

$attributes = array('class' => 'form-horizontal', 'id' => 'new_nota');
echo form_open_multipart(base_url('control/notas/create/'),$attributes);

echo form_hidden('nota[id]');

?>
<fieldset>
	<legend><?php echo $title ?></legend>
	<div class="well well-large well-transparent">


	<!-- Text input-->

	<div class="control-group">
	<label class="control-label">Categoria</label>
	<div class="controls">

	<select name="categoria_id" id="categoria_id">
	<?php  

	$categorias = $this->categoria_nota->get_records_menu();
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
	<label class="control-label">Extracto</label>
	<div class="controls">
	<textarea name="extracto" id="extracto" cols="30" class="form-control" rows="6"><?php echo set_value('extracto'); ?></textarea>
	<?php echo form_error('extracto','<p class="error">', '</p>'); ?>
	</div>
	</div>


	<!-- Text input-->
	<div class="control-group">
	<label class="control-label">Contenido</label>
	<div class="controls">
	<textarea name="contenido" id="contenido" cols="30" rows="10" class="form-control widgEditor" ><?php echo set_value('contenido'); ?></textarea>

	<?php echo form_error('contenido','<p class="error">', '</p>'); ?>
	</div>
	</div>
	<!-- Text input-->
	<div class="control-group">
	<label class="control-label">Fecha</label>
	<div class="controls">
	<input value="<?php echo set_value('fecha'); ?>" class="form-control" type="text" name="fecha" id="fecha"/>
	<?php echo form_error('fecha','<p class="error">', '</p>'); ?>
	</div>
	</div>

	<!-- Text input-->
	<div class="control-group">
	<label class="control-label">Autor_id</label>
	<div class="controls">
	<input value="<?php echo set_value('autor_id'); ?>" class="form-control" type="text" name="autor_id" />
	<?php echo form_error('autor_id','<p class="error">', '</p>'); ?>
	</div>
	</div>
	<!-- Text input-->
	<div class="control-group">
	<label class="control-label">Fuente_nombre</label>
	<div class="controls">
	<input value="<?php echo set_value('fuente_nombre'); ?>" class="form-control" type="text" name="fuente_nombre" />
	<?php echo form_error('fuente_nombre','<p class="error">', '</p>'); ?>
	</div>
	</div>
	<!-- Text input-->
	<div class="control-group">
	<label class="control-label">Fuente_url</label>
	<div class="controls">
	<input value="<?php echo set_value('fuente_url'); ?>" class="form-control" type="text" name="fuente_url" />
	<?php echo form_error('fuente_url','<p class="error">', '</p>'); ?>
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


<!-- Date Picker -->
<script type="text/javascript" src="<?php echo base_url('public_folder/js/bootstrap-datepicker.js'); ?>"></script>

<script type="text/javascript">
$(function() {
// Replace the <textarea id="editor1"> with a CKEditor
// instance, using default configuration.
CKEDITOR.replace('contenido');
//bootstrap WYSIHTML5 - text editor
});


// fecha nota
$('#fecha').datepicker({
format: 'dd-mm-yyyy',
});
</script> 