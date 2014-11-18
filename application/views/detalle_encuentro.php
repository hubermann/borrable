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
<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">texto uno</div>
    <div role="tabpanel" class="tab-pane" id="profile">contenido 2</div>
    <div role="tabpanel" class="tab-pane" id="messages">here number 3</div>
    <div role="tabpanel" class="tab-pane" id="settings">y cuatro</div>
  </div>

</div>
