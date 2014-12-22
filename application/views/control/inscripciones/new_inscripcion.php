<?php  

$attributes = array('class' => 'form-horizontal', 'id' => 'new_inscripcion');
echo form_open_multipart(base_url('control/inscripciones/create/'),$attributes);

echo form_hidden('inscripcion[id]');

?>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">


<!-- Text input-->
<!--
<div class="control-group">
<label class="control-label">Categoria</label>
	<div class="controls">
		
		<select name="categoria_id" id="categoria_id">
		<?php  
		/*
		$categorias = $this->Categoria->get_records_menu();
		if($categorias){

			foreach ($categorias->result() as $value) {
				echo '<option value="'.$value->id.'">'.$value->nombre.'</option>';
			}
		}
		*/
		?>
		</select>

		<?php echo form_error('categoria_id','<p class="error">', '</p>'); ?>
	</div>
</div>
-->
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Evento_id</label>
			<div class="controls">
			<input value="<?php echo set_value('evento_id'); ?>" class="form-control" type="text" name="evento_id" />
			<?php echo form_error('evento_id','<p class="error">', '</p>'); ?>
			</div>
			</div>
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
			<label class="control-label">Telefono</label>
			<div class="controls">
			<input value="<?php echo set_value('telefono'); ?>" class="form-control" type="text" name="telefono" />
			<?php echo form_error('telefono','<p class="error">', '</p>'); ?>
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
			<label class="control-label">Created_at</label>
			<div class="controls">
			<input value="<?php echo set_value('created_at'); ?>" class="form-control" type="text" name="created_at" />
			<?php echo form_error('created_at','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Documento</label>
			<div class="controls">
			<input value="<?php echo set_value('documento'); ?>" class="form-control" type="text" name="documento" />
			<?php echo form_error('documento','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Procesado</label>
			<div class="controls">
			<input value="<?php echo set_value('procesado'); ?>" class="form-control" type="text" name="procesado" />
			<?php echo form_error('procesado','<p class="error">', '</p>'); ?>
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