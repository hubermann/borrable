
<?php if($this->session->userdata('front_logged_in')){
  $usuario_logged = $this->usuario->get_record($this->session->userdata('front_logged_in')['id']);
  echo "<h2>".$usuario_logged->nombre." ".$usuario_logged->apellido."</h2>";
  echo '<p>
    <a href="'.base_url('perfil-editar').'">Editar mis datos</a>
  </p>';
  echo '<p>
    <a href="'.base_url('perfil-imagen').'">Imagen</a>
  </p>';
  echo '<p>
    <a href="'.base_url('perfil-modificar-acceso').'">Cambiar mi contraseña</a>
  </p>';
  if(empty($usuario_logged->filename)){

    echo "No tiene imagen cargada";

  }


}
?>
