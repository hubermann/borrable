<?php

if(!isset($id_evento)){
	$id_evento = $this->uri->segment(4);
}
if($id_evento==""){redirect("/control/eventos"); }
$evento = $this->evento->get_record($id_evento);
?>

<ol class="breadcrumb">
	<li><a href="<?php echo base_url('control/eventos'); ?>">Encuentros</a></li>
	<li><a href="<?php echo base_url('control/eventos/detail/'.$id_evento); ?>"><?php echo $evento->titulo; ?></a></li>
	<li><a href="<?php echo base_url('control/sponsors/evento/'.$id_evento); ?>">Sponsors</a></li>
	<li class="active">Nuevo sponsor</li>
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
</script>

<?php

$attributes = array('class' => 'form-horizontal', 'id' => 'new_sponsor');
echo form_open_multipart(base_url('control/sponsors/create/'),$attributes);

echo form_hidden('sponsor[id]');
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
			<input value="<?php echo set_value('nombre'); ?>" type="text" name="nombre" class="form-control" />
			<?php echo form_error('nombre','<p class="error">', '</p>'); ?>
			</div>
			</div>


			<!-- Text input-->
			<div class="checkbox">
		    <label>
		      <input type="checkbox" name="destacado" > Sponsor Destacado
		    </label>
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
