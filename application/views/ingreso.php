<?php
if($this->session->userdata('front_logged_in')){echo '<a href="'.base_url('desconectar').'">Salir</a>';}

$attribute = array ("class"=>"form_login_front");
echo form_open(base_url('ingreso'),$attribute); ?>

        <h4 class="form-signin-heading">INgrese su email y contraseña!</h4>
        <input type="text" class="input-block-level" placeholder="Email" name="email" value="<?php echo set_value('email'); ?>">

        <?php echo form_error('email','<p class="error">', '</p>'); ?>

        <input type="password" class="input-block-level" placeholder="Contraseña" name="password">
        <?php echo form_error('password','<p class="error">', '</p>'); ?>
        <label class="checkbox">
         <!-- <input type="checkbox" value="remember-me"> Remember me-->
        </label>
        <button class="btn btn-large " type="submit"><i class="icon-lock icon-large"></i> Acceder</button>
<?php echo form_close(); ?>
