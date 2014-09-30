<?php  
$attributes = array('class' => 'form-horizontal', 'id' => 'delete_speaker');
echo form_open(base_url('control/speakers/delete/'.$query->id), $attributes);
echo '<fieldset>'.form_hidden('id', $query->id); 

?>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">
 <!-- <p>Categoria id: <?php #echo $nombre_categoria = $this->categoria->traer_nombre($query->categoria_id); ?></p> -->

 <p>Evento_id: <?php echo $query->evento_id; ?></p>
 <p>Nombre: <?php echo $query->nombre; ?></p>
 <p>Slug: <?php echo $query->slug; ?></p>
 <p>Cargo: <?php echo $query->cargo; ?></p>
 <p>Empresa: <?php echo $query->empresa; ?></p>
 <p>Pais: <?php echo $query->pais; ?></p>
 <p>Bio: <?php echo $query->bio; ?></p>
 <p>Cv: <?php echo $query->cv; ?></p>
 <p>Filename: <?php echo $query->filename; ?></p>

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