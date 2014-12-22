<?php  
$attributes = array('class' => 'form-horizontal', 'id' => 'delete_inscripcion');
echo form_open(base_url('control/inscripciones/delete/'.$query->id), $attributes);
echo '<fieldset>'.form_hidden('id', $query->id); 

?>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">
 <!-- <p>Categoria id: <?php #echo $nombre_categoria = $this->categoria->traer_nombre($query->categoria_id); ?></p> -->

 <p>Evento_id: <?php echo $query->evento_id; ?></p>
 <p>Nombre: <?php echo $query->nombre; ?></p>
 <p>Apellido: <?php echo $query->apellido; ?></p>
 <p>Telefono: <?php echo $query->telefono; ?></p>
 <p>Email: <?php echo $query->email; ?></p>
 <p>Created_at: <?php echo $query->created_at; ?></p>
 <p>Documento: <?php echo $query->documento; ?></p>
 <p>Procesado: <?php echo $query->procesado; ?></p>

<!--  -->
<div class="control-group">

<label class="checkbox inline">

<input type="checkbox" name="comfirm" id="comfirm" />
<p>Confirma eliminar?</p>
<?php echo form_error('comfirm','<p class="error">', '</p>'); ?>
 </label>
</div>
<!--  -->
<div class="control-group">
<button class="btn btn-danger" type="submit"><i class="icon-trash icon-large"></i> Eliminar</button>
</div>


</fieldset>

<?php echo form_close(); ?>