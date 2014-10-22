<?php  
$attributes = array('class' => 'form-horizontal', 'id' => 'edit_permiso');
echo form_open_multipart(base_url('control/permisos/update/'),$attributes);

echo form_hidden('id', $query->id); 
?>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">

 


<!-- Text input-->
<!--
<div class="control-group">
<label class="control-label">Categoria id</label>
	<div class="controls">
	<select name="categoria_id" id="categoria_id">
		<?php 
		/* 
		$categorias = $this->categoria->get_records_menu();
		if($categorias){

			foreach ($categorias as $value) {
				if($query->categoria_id == $value->id){$sel= "selected";}else{$sel="";}
				echo '<option value="'.$value->id.'" '.$sel.'>'.$value->nombre.'</option>';
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
			<input value="<?php echo $query->role_id; ?>" type="text" class="form-control" name="role_id" />
			<?php echo form_error('role_id','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Modulo</label>
			<div class="controls">
			<input value="<?php echo $query->modulo; ?>" type="text" class="form-control" name="modulo" />
			<?php echo form_error('modulo','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Url</label>
			<div class="controls">
			<input value="<?php echo $query->url; ?>" type="text" class="form-control" name="url" />
			<?php echo form_error('url','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Permiso</label>
			<div class="controls">
			<input value="<?php echo $query->permiso; ?>" type="text" class="form-control" name="permiso" />
			<?php echo form_error('permiso','<p class="error">', '</p>'); ?>
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
