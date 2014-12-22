<h1>Recuperar contraseña</h1>

<?php
if($this->session->userdata('front_logged_in')){echo '<a href="'.base_url('desconectar').'">Salir</a>';}

$attribute = array ("class"=>"form_login_front");
echo form_open(base_url('solicitud_reset_password'),$attribute); ?>

<h4 class="form-signin-heading">Ingrese su direccion de email asociada a Comunidad-RH.com</h4>
<input type="text" class="input-block-level" placeholder="Email" name="email" value="<?php echo set_value('email'); ?>">

<?php echo form_error('email','<p class="error">', '</p>'); ?>

<button class="btn btn-large " type="submit"><i class="icon-lock icon-large"></i> Acceder</button>
<?php echo form_close(); ?>
