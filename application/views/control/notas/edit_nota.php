<?php
$attributes = array('class' => 'form-horizontal', 'id' => 'edit_nota');
echo form_open_multipart(base_url('control/notas/update/'),$attributes);

echo form_hidden('id', $query->id);
?>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">




	<!-- Text input-->

	<div class="control-group">
	<label class="control-label">Categoria</label>
	<div class="controls">
	<select name="categoria_id" id="categoria_id">
		<?php

		$categorias = $this->categoria_nota->get_records_menu();
		var_dump($categorias);
		if($categorias){

			foreach ($categorias->result() as $value) {
				if($query->categoria_id == $value->id){$sel= "selected";}else{$sel="";}
				echo '<option value="'.$value->id.'" '.$sel.'>'.$value->nombre.'</option>';
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
	<input value="<?php echo $query->titulo; ?>" type="text" class="form-control" name="titulo" />
	<?php echo form_error('titulo','<p class="error">', '</p>'); ?>
	</div>
	</div>
	<!-- Text input-->
	<div class="control-group">
	<label class="control-label">Extracto</label>
	<div class="controls">
	<input value="<?php echo $query->extracto; ?>" type="text" class="form-control" name="extracto" />
	<?php echo form_error('extracto','<p class="error">', '</p>'); ?>
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

	<!-- Text input-->
	<div class="control-group">
	<label class="control-label">Contenido</label>
	<div class="controls">

	<textarea name="contenido" rows="8" class="form-control" cols="40"><?php echo $query->contenido; ?></textarea>
	<?php echo form_error('contenido','<p class="error">', '</p>'); ?>
	</div>
	</div>
	<!-- Text input-->
	<div class="control-group">
	<label class="control-label">Fecha</label>
	<div class="controls">
	<?php

	list($anio, $mes, $dia) = explode("-", $query->fecha);
	$fecha = $dia."-".$mes."-".$anio;
	?>
	<input value="<?php echo $fecha; ?>" type="text" class="form-control" name="fecha" id="fecha" />
	<?php echo form_error('fecha','<p class="error">', '</p>'); ?>
	</div>
	</div>

<?php
$destacado_principal = $this->destacados_nota->get_destacado_principal();

?>

	<!-- Text input -->
	<div class="control-group">
	<label class="control-label">Destacado</label>
	<div class="controls">

	<select name="destacado" id="destacado">
		<option value="sin_destacar">Sin destacar</option>
		<option value="destacado_principal" <?php if($query->id == $destacado_principal){echo "selected";} ?>>Destacado principal</option>
		<option value="destacado_secundario_1">Destacado secundario 1</option>
		<option value="destacado_secundario_2">Destacado secundario 2</option>
		<option value="destacado_secundario_3">Destacado secundario 3</option>
		<option value="destacado_secundario_4">Destacado secundario 4</option>
	</select>

	</div>
	</div>


	<!-- Text input-->
	<div class="control-group">
	<label class="control-label">Fuente_nombre</label>
	<div class="controls">
	<input value="<?php echo $query->fuente_nombre; ?>" type="text" class="form-control" name="fuente_nombre" />
	<?php echo form_error('fuente_nombre','<p class="error">', '</p>'); ?>
	</div>
	</div>
	<!-- Text input-->
	<div class="control-group">
	<label class="control-label">Fuente_url</label>
	<div class="controls">
	<input value="<?php echo $query->fuente_url; ?>" type="text" class="form-control" name="fuente_url" />
	<?php echo form_error('fuente_url','<p class="error">', '</p>'); ?>
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
