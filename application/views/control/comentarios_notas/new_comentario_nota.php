<?php  

$attributes = array('class' => 'form-horizontal', 'id' => 'new_comentario_nota');
echo form_open_multipart(base_url('control/comentarios_notas/create/'),$attributes);

echo form_hidden('comentario_nota[id]');

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
			<label class="control-label">Usuario_id</label>
			<div class="controls">
			<input value="<?php echo set_value('usuario_id'); ?>" class="form-control" type="text" name="usuario_id" />
			<?php echo form_error('usuario_id','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Body</label>
			<div class="controls">
			<textarea name="body" id="body" class="form-control"><?php echo set_value('body'); ?></textarea>
			<?php echo form_error('body','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Nota_id</label>
			<div class="controls">
			<input value="<?php echo set_value('nota_id'); ?>" class="form-control" type="text" name="nota_id" />
			<?php echo form_error('nota_id','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Fecha</label>
			<div class="controls">
			<input value="<?php echo set_value('fecha'); ?>" class="form-control" type="text" name="fecha" />
			<?php echo form_error('fecha','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Status</label>
			<div class="controls">
			<input value="<?php echo set_value('status'); ?>" class="form-control" type="text" name="status" />
			<?php echo form_error('status','<p class="error">', '</p>'); ?>
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