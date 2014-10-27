<?php

if(!isset($id_evento)){
	$id_evento = $this->uri->segment(4);
	$evento = $this->evento->get_record($id_evento);
}
if($id_evento==""){redirect("/control/eventos"); }
?>
<ol class="breadcrumb">
  <li><a href="<?php echo base_url('control/eventos'); ?>">Encuentros</a></li>
	<li><a href="<?php echo base_url('control/eventos/detail/'.$id_evento); ?>"><?php echo $evento->titulo; ?></a></li>
  <li><a href="<?php echo base_url('control/speakers/evento/'.$id_evento); ?>">Speakers</a></li>
	<li class="active">Nuevo speaker</li>
</ol>

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

$attributes = array('class' => 'form-horizontal', 'id' => 'new_speaker');
echo form_open_multipart(base_url('control/speakers/create/'),$attributes);

echo form_hidden('speaker[id]');
echo form_hidden('evento_id',$id_evento);
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

			foreach ($categorias as $value) {
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
			<label class="control-label">Nombre</label>
			<div class="controls">
			<input value="<?php echo set_value('nombre'); ?>"  class="form-control" type="text" name="nombre" />
			<?php echo form_error('nombre','<p class="error">', '</p>'); ?>
			</div>
			</div>


			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Cargo</label>
			<div class="controls">
			<input value="<?php echo set_value('cargo'); ?>"  class="form-control" type="text" name="cargo" />
			<?php echo form_error('cargo','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Empresa</label>
			<div class="controls">
			<input value="<?php echo set_value('empresa'); ?>" class="form-control" type="text" name="empresa" />
			<?php echo form_error('empresa','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
				<label class="control-label">Pais</label>
				<div class="controls">

				<select name="pais" id="pais" >
				<?php

				$pais = $this->pais->get_records_menu();
				if($pais){

				foreach ($pais->result() as $value) {
					echo '<option value="'.$value->id.'">'.$value->nombre.'</option>';
				}
				}

				?>
				</select>

				<?php echo form_error('pais_id','<p class="error">', '</p>'); ?>
				</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Bio</label>
			<div class="controls">
			<textarea name="bio" class="form-control"><?php echo set_value('bio'); ?></textarea>
			<?php echo form_error('bio','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Cv</label>
			<div class="controls">
			<textarea name="cv" class="form-control"><?php echo set_value('cv'); ?></textarea>
			<?php echo form_error('cv','<p class="error">', '</p>'); ?>
			</div>
			</div>

		<!-- Text input-->
		<div class="control-group">
			<label class="control-label">Imagen</label>
			<div class="controls">
			<div id="previewImg"></div>
			<input value="<?php echo set_value('filename'); ?>" type="file" name="filename" onchange="show_preview(this)"/>
			<?php echo form_error('filename','<p class="error">', '</p>'); ?>
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
