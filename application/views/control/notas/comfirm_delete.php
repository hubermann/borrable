<?php  
$attributes = array('class' => 'form-horizontal', 'id' => 'delete_nota');
echo form_open(base_url('control/notas/delete/'.$query->id), $attributes);
echo '<fieldset>'.form_hidden('id', $query->id); 

?>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">
 <!-- <p>Categoria id: <?php #echo $nombre_categoria = $this->categoria->traer_nombre($query->categoria_id); ?></p> -->

 <p>Titulo: <?php echo $query->titulo; ?></p>
 <p>Extracto: <?php echo $query->extracto; ?></p>
 <p>Slug: <?php echo $query->slug; ?></p>
 <p>Contenido: <?php echo $query->contenido; ?></p>
 <p>Fecha: <?php echo $query->fecha; ?></p>
 <p>Categoria_id: <?php echo $query->categoria_id; ?></p>
 <p>Autor_id: <?php echo $query->autor_id; ?></p>
 <p>Fuente_nombre: <?php echo $query->fuente_nombre; ?></p>
 <p>Fuente_url: <?php echo $query->fuente_url; ?></p>
 <p>Main_image: <?php echo $query->main_image; ?></p>

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