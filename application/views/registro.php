<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-8 col-xs-10 center-block">
		<div style="margin: 40px auto 30px auto;text-align: center;">
			<a href="http://comunidad-rh.com/"><img src="http://comunidad-rh.com/public_folder/img/logoCRH.png" width="140" height="115"></a>
		</div>

			<?php

			$attributes = array('class' => 'form_login_front', 'id' => 'new_usuario');
			echo form_open_multipart(base_url('registro'),$attributes);

			echo form_hidden('usuario[id]');
			
			?>
			<h3>Crear mi cuenta en Comunidad-rh.com</h3>
			<!--<legend><?php //echo $title ?></legend>-->
			
			<div class="row no-gutters no-margin form-group">
				<!-- Text input-->
				<!-- Text input-->
				  <div class="control-group">
					  <label class="control-label">Nombre</label>
					  <div class="controls">
					  <input value="<?php echo set_value('nombre'); ?>" class="field" placeholder="Nombre" type="text" name="nombre" />
					  <?php echo form_error('nombre','<p class="error">', '</p>'); ?>
					  </div>
				  </div>
				  <!-- Text input-->
				  <div class="control-group">
					  <label class="control-label">Apellido</label>
					  <div class="controls">
					  <input value="<?php echo set_value('apellido'); ?>" class="field" placeholder="Apellido" type="text" name="apellido" />
					  <?php echo form_error('apellido','<p class="error">', '</p>'); ?>
					  </div>
				  </div>
				  <!-- Text input-->
				  <div class="control-group">
						<label class="control-label">Email</label>
					  <div class="controls">
						<input value="<?php echo set_value('email'); ?>" class="field" placeholder="Email" type="text" name="email" />
						<?php echo form_error('email','<p class="error">', '</p>'); ?>
					  </div>
				  </div>
				  <!-- Text input-->
				  <div class="control-group">
					  <label class="control-label">Password</label>
					  <div class="controls">
						<input value="<?php echo set_value('password'); ?>" class="field" placeholder="Password" type="password" name="password" />
						<?php echo form_error('password','<p class="error">', '</p>'); ?>
					  </div>
				  </div>

				  <!-- Text input-->
				  <div class="control-group">
					  <label class="control-label">Confirmación Password</label>
					  <div class="controls">
						<input value="<?php echo set_value('password_conf'); ?>" class="field" placeholder="Confirmación Password" type="password" name="password_conf" />
						<?php echo form_error('password_conf','<p class="error">', '</p>'); ?>
					  </div>
				  </div>
					
					<hr style="margin-bottom:15px;"/>
					<div class="control-group">
					<label class="control-label"></label>
						<div class="controls">
							<button style="width:100%;"class="btn" type="submit">Registrar</button>
						</div>
					</div>

			<?php echo form_close(); ?>
			</div>
	</div>


</div>