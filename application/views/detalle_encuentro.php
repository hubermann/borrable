<?php
$imagen = '';
if(!empty($encuentro->filename)){
  $imagen = '<img src="'.base_url('images-eventos/'.$encuentro->filename).'" alt="" width="400"/>';
}

?>
<h1> <?php echo $encuentro->titulo; ?></h1>

<?php echo $imagen; ?>

<p><?php echo $encuentro->descripcion; ?></p>
<?php

$sponsors = $this->sponsor->get_records($encuentro->id);
var_dump($sponsors->result());
echo '<hr>';
$speakers = $this->speaker->get_records($encuentro->id);
var_dump($speakers->result());
?>
