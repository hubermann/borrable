<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-8 col-xs-10 center-block">
	<div style="margin: 40px auto 30px auto;text-align: center;">
		<a href="http://comunidad-rh.com/"><img src="http://comunidad-rh.com/public_folder/img/logoCRH.png" width="140" height="115"></a>
	</div>
	<?php
	if($this->session->userdata('front_logged_in')){echo '<a href="'.base_url('desconectar').'">Salir</a>';}

	$attribute = array ("class"=>"form_login_front");
	echo form_open(base_url('ingreso'),$attribute); ?>

	<h3>Ingrese su email y contraseña!</h3>
	<div class="row no-gutters no-margin form-group">
		<input type="text" class="col-lg-5 col-md-5 col-sm-6 col-xs-12 field" placeholder="Email" name="email" value="<?php echo set_value('email'); ?>">
		<input type="password" class="col-lg-5 col-md-5 col-sm-6 col-xs-12 field" placeholder="Contraseña" name="password">
		<button class="btn col-lg-2 col-md-2 col-sm-12 col-xs-12" type="submit"><i class="icon-lock icon-large"></i> Acceder</button>

		<?php echo form_error('email','<p class="error">', '</p>'); ?>
		<?php echo form_error('password','<p class="error">', '</p>'); ?>
		
		<label class="checkbox"><input type="checkbox" value="remember-me"> Recordarme</label>
		<hr/>
		<?php echo form_close(); ?>
		<p class="help">No tiene usuario? <a href="http://comunidad-rh.com/registro">Regístrese</a> | <a href="<?php echo base_url('reset_password'); ?>"> Se olvidó su contraseña?</a></p>
	</div>
	</div>
</div>
