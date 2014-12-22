<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-8 col-xs-10 center-block">
	<div style="margin: 40px auto 30px auto;text-align: center;">
		<a href="http://comunidad-rh.com/"><img src="http://comunidad-rh.com/public_folder/img/logoCRH.png" width="140" height="115"></a>
	</div>
	<?php
	if($this->session->userdata('front_logged_in')){echo '<a href="'.base_url('desconectar').'">Salir</a>';}

	$attribute = array ("class"=>"form_login_front");
	echo form_open(base_url('suscripcion_newsletter'),$attribute); ?>

	<h3>Ingrese su email.</h3>
	<div class="row no-gutters no-margin form-group">
		<input type="text" class="col-lg-5 col-md-5 col-sm-6 col-xs-12 field" placeholder="Email" name="email" value="<?php echo set_value('email'); ?>">
		<p><?php echo form_error('email','<p class="error">', '</p>'); ?></p>
		<button class="btn btn-large" type="submit"><i class="icon-lock icon-large"></i> Suscribirme</button>

		
		
		
	
		<?php echo form_close(); ?>
		
	</div>
	</div>
</div>
