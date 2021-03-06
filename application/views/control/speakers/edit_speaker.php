<script>
	function show_preview(input) {
	if (input.files && input.files[0]) {
	var reader = new FileReader();
	reader.onload = function (e) {
	$('#previewImg').html('<img src="'+e.target.result+'" width="140" />' );
	}
	reader.readAsDataURL(input.files[0]);
	}
}
</script><?php
$attributes = array('class' => 'form-horizontal', 'id' => 'edit_speaker');
echo form_open_multipart(base_url('control/speakers/update/'),$attributes);

echo form_hidden('id', $query->id);
echo form_hidden('evento_id', $query->evento_id);

$evento = $this->evento->get_record($query->evento_id);

?>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">

<ol class="breadcrumb">
	<li><a href="<?php echo base_url('control/eventos'); ?>">Encuentros</a></li>
	<li><a href="<?php echo base_url('control/eventos/detail/'.$query->evento_id); ?>"><?php echo $evento->titulo; ?></a></li>
	<li><a href="<?php echo base_url('control/speakers/evento/'.$query->evento_id); ?>">Speakers</a></li>
	<li class="active">Modificar speaker</li>
</ol>


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
			<label class="control-label">Nombre</label>
			<div class="controls">
			<input value="<?php echo $query->nombre; ?>" class="form-control" type="text" name="nombre" />
			<?php echo form_error('nombre','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Slug</label>
			<div class="controls">
			<input value="<?php echo $query->slug; ?>" class="form-control" type="text" name="slug" />
			<?php echo form_error('slug','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Cargo</label>
			<div class="controls">
			<input value="<?php echo $query->cargo; ?>" class="form-control" type="text" name="cargo" />
			<?php echo form_error('cargo','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Empresa</label>
			<div class="controls">
			<input value="<?php echo $query->empresa; ?>" class="form-control" type="text" name="empresa" />
			<?php echo form_error('empresa','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Pais</label>
			<div class="controls">
			<select name="pais" id="pais">
			<?php

			$paises = $this->pais->get_records_menu();
			if($paises){

			foreach ($paises->result() as $value) {
			if($query->pais == $value->id){$sel= "selected";}else{$sel="";}
			echo '<option value="'.$value->id.'" '.$sel.'>'.$value->nombre.'</option>';
			}
			}

			?>
			</select>

			<?php echo form_error('pais','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Bio</label>
			<div class="controls">
			<input value="<?php echo $query->bio; ?>"  class="form-control" type="text" name="bio" />
			<?php echo form_error('bio','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Cv</label>
			<div class="controls">
			<input value="<?php echo $query->cv; ?>"  class="form-control" type="text" name="cv" />
			<?php echo form_error('cv','<p class="error">', '</p>'); ?>
			</div>
			</div>
	<!-- Text input-->
<div class="control-group">
	<label class="control-label">Imagen</label>
	<div class="controls">
	<div id="previewImg">
	<?php if($query->filename){
	echo '<p><img src="'.base_url('images-speakers/'.$query->filename).'" width="140" /></p>';
	} ?>

</div>
	<input value="<?php echo set_value('filename'); ?>" type="file" name="filename" onchange="show_preview(this)"/>
	<?php echo form_error('filename','<p class="error">', '</p>'); ?>
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
