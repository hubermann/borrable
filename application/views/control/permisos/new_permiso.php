<?php  

$attributes = array('class' => 'form-horizontal', 'id' => 'new_permiso');
echo form_open_multipart(base_url('control/permisos/create/'),$attributes);

echo form_hidden('permiso[id]');

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
			<label class="control-label">Role_id</label>
			<div class="controls">
			<input value="<?php echo set_value('role_id'); ?>" class="form-control" type="text" name="role_id" />
			<?php echo form_error('role_id','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Modulo</label>
			<div class="controls">
			<input value="<?php echo set_value('modulo'); ?>" class="form-control" type="text" name="modulo" />
			<?php echo form_error('modulo','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Url</label>
			<div class="controls">
			<input value="<?php echo set_value('url'); ?>" class="form-control" type="text" name="url" />
			<?php echo form_error('url','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Permiso</label>
			<div class="controls">
			<input value="<?php echo set_value('permiso'); ?>" class="form-control" type="text" name="permiso" />
			<?php echo form_error('permiso','<p class="error">', '</p>'); ?>
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