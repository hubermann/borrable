<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_Front extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->library('session');
    $this->load->library('form_validation');
    $this->load->model(array('evento',
    'destacados_nota',
    'destacados_evento',
    'nota',
    'imagenes_nota',
    'categoria_nota',
    'video','usuario'
    ));
    $this->load->model('pais');
    $this->load->model('categoria_evento');
    $this->load->model('speaker');
    $this->load->model('sponsor');
  }

/* LOGIN DEL USUARIO DESDE EL FRONT */
public function ingreso(){

  $this->form_validation->set_rules('email', 'Email', 'required|trim');
  $this->form_validation->set_rules('password', 'Contraseña', 'required|trim');

  $this->form_validation->set_message('required', "El campo %s es requerido");
    #Paso validacion
    if ($this->form_validation->run()){
  $access_granted = $this->usuario->check_credentials_front( $this->input->post('email'), $this->input->post('password') );
  if($access_granted===FALSE){
    $this->session->set_flashdata('error', 'No se encuentra usuario con esos datos.');
    redirect('ingreso', 'refresh');
  }else{
    redirect('/');
  }

}
//No paso la validacion
$data['content'] = 'ingreso';
$this->load->view('front_layout', $data);

}
/* LOGOUT */
public function desconectar(){
  $this->usuario->logout_front();
  $data['content'] = 'inicio';
  $this->load->view('front_layout', $data);
}


public function perfil(){
  if(!$this->session->userdata('front_logged_in')){
    $this->session->set_flashdata('error', 'Necesitas ingresar con tu email y contraseña.');
     redirect('ingreso');}
  $data['content'] = 'perfil';
  $this->load->view('front_layout', $data);
}



//create
public function registro(){
  $this->load->helper('form');
  $this->load->library('form_validation');
  $this->form_validation->set_rules('nombre', 'Nombre', 'required');
  $this->form_validation->set_rules('apellido', 'Apellido', 'required');
  $this->form_validation->set_rules('email', 'Email', 'required|is_unique[usuarios.email]|xss_clean|valid_email');
  $this->form_validation->set_rules('password', 'Password', 'required');
  $this->form_validation->set_rules('password_conf', 'Confirmacion password', 'required|min_length[3]|max_length[20]|xss_clean|matches[password]');


  $this->form_validation->set_message('required','El campo %s es requerido.');
  $this->form_validation->set_message('is_unique', 'Ya existe otro usuario registrado con ese E-mail');
  $this->form_validation->set_message('valid_email', "La direccion de email no tiene un formato valido.");
  $this->form_validation->set_message('password_conf', "La direccion de email no coincide con la confirmacion.");
  $this->form_validation->set_message('min_length', "Ingrese un minimo de 3 caracteres y 20 como maximo para password.");
  $this->form_validation->set_message('matches', 'No coincide el campo "Password" con "Confirmacion password".');
if ($this->form_validation->run() === FALSE){

    $this->load->helper('form');
    $data['title'] = '';
    $data['content'] = 'registro';
    $this->load->view('front_layout', $data);

  }else{


    // set default time zone if not set at php.ini
    if (!date_default_timezone_get('date.timezone'))
    {
    date_default_timezone_set('America/Buenos_Aires');
    }
    $ahora = date("Y-m-d H:i:s");


    //encrypto

    $salt = md5(uniqid(rand(), true));
    $hash = hash('sha512', $salt.$this->input->post('password'));

    $newusuario = array(
      'nombre' => $this->input->post('nombre'),
      'apellido' => $this->input->post('apellido'),
      'email' => $this->input->post('email'),
      'password' => $hash,
      'salt' => $salt,
      'role_id' => 4,
      'created_at' => $ahora,
      'updated_at' => $ahora,
    );
    #save
    $this->usuario->add_record($newusuario);
    $this->session->set_flashdata('success', 'Tu cuenta ha sido creada, ya puedes acceder con tu direccion de email y contraseña.');
    redirect('ingreso', 'refresh');

  }

}


/* MODIFICAR PASSWORD */
public function perfil_modificar_password(){
  if(empty($this->session->userdata('front_logged_in')['id'])){ redirect('/');}

  $this->load->helper('form');
  $this->load->library('form_validation');
  $this->form_validation->set_rules('pass_actual', 'Contraseña actual', 'required');
  $this->form_validation->set_rules('nuevo_pass', 'Nueva contraseña', 'required|min_length[3]|max_length[20]|xss_clean');
  $this->form_validation->set_rules('repeat_nuevo_pass', 'Nueva contraseña', 'required|min_length[3]|max_length[20]|xss_clean|matches[nuevo_pass]');

  if ($this->form_validation->run() === FALSE){
    $this->load->helper('form');

    $data['title'] = '';
    $data['content'] = 'perfil_modificar_password';
    $this->load->view('front_layout', $data);
  }else{
    $usuario_logged = $this->usuario->get_record($this->session->userdata('front_logged_in')['id']);
    $access_granted = $this->usuario->check_credentials_front($usuario_logged->email, $this->input->post('pass_actual') );
    //Si no coincide su password actual
    $this->session->set_flashdata('error', 'No coincide su password actual!');
    if(!$access_granted){ redirect('perfil-modificar-acceso');}

    // ALL OK PROCEDO A ACTUALIZAR
    $salt = md5(uniqid(rand(), true));
    $hash = hash('sha512', $salt.$this->input->post('nuevo_pass'));

    // set default time zone if not set at php.ini
    if (!date_default_timezone_get('date.timezone'))
    {
    date_default_timezone_set('America/Buenos_Aires');
    }
    $ahora = date("Y-m-d H:i:s");

    $updated_password = array(
      'password' => $hash,
      'salt' => $salt,
      'updated_at' => $ahora,
    );

    $this->session->set_flashdata('success', 'Password Actualizado!');
    $this->usuario->update_record($id, $updated_password);
    redirect('perfil', 'refresh');


  }//fin (else) paso validacion

}
/* EDITAR DATOS DEL PERFIL */
public function perfil_modificar(){
  if(empty($this->session->userdata('front_logged_in')['id'])){ redirect('/');}
  $this->load->helper('form');
  $this->load->library('form_validation');
  $this->form_validation->set_rules('nombre', 'Nombre', 'required');
  $this->form_validation->set_rules('apellido', 'Apellido', 'required');

  // para evitar que de error de que el mail no es unique
  $info_user = $this->usuario->get_record($this->session->userdata('front_logged_in')['id']);
  if($this->input->post('email') != $original_email = $info_user->email) {
     $is_unique =  '|is_unique[usuarios.email]';
  } else {
     $is_unique =  '';
  }

  $this->form_validation->set_rules('email', 'Email', 'required|xss_clean|valid_email|'.$is_unique);

  $this->form_validation->set_message('required','El campo %s es requerido.');

  if ($this->form_validation->run() === FALSE){
    $this->load->helper('form');

    $data['title'] = 'Modificar mis datos';
    $data['content'] = 'perfil_editar';
    $data['query'] = $this->usuario->get_record($this->session->userdata('front_logged_in')['id']);

    $this->load->view('front_layout', $data);
  }else{

    $id=  $this->input->post('id');

    // set default time zone if not set at php.ini
    if (!date_default_timezone_get('date.timezone'))
    {
    date_default_timezone_set('America/Buenos_Aires');
    }
    $ahora = date("Y-m-d H:i:s");


    //encrypto

    $salt = md5(uniqid(rand(), true));
    $hash = hash('sha512', $salt.$this->input->post('password'));

    $editedusuario = array(
      'nombre' => $this->input->post('nombre'),
      'apellido' => $this->input->post('apellido'),
      'email' => $this->input->post('email'),
      'password' => $hash,
      'salt' => $salt,
      'updated_at' => $ahora,
    );

    #save
    $this->session->set_flashdata('success', 'usuario Actualizado!');
    $this->usuario->update_record($id, $editedusuario);
    if($this->input->post('id')!=""){
      redirect('perfil', 'refresh');
    }else{
      redirect('perfil', 'refresh');
    }



  }



}

public function upload_imagen(){
if($_FILES['filename']['size'] > 0){

    $file  = $this->upload_file();

    if ( $file['status'] != 0 )
      {
      //guardo
      $usuario = $this->usuario->get_record($this->session->userdata('front_logged_in')['id']);
        $path = 'images-usuarios/'.$usuario->filename;

        if(is_link($path)){
          unlink($path);
        }


      $data = array('filename' => $file['filename']);
      $this->usuario->update_record($this->session->userdata('front_logged_in')['id'], $data);
      $this->session->set_flashdata('success', 'Imagen actualizada!');
      }

  }

  redirect('perfil-imagen', 'refresh');
}

public function perfil_modificar_imagen(){
  $data['title'] = '';
  $data['content'] = 'perfil_editar_imagen';
  $this->load->view('front_layout', $data);
}



public function upload_file(){

  //1 = OK - 0 = Failure
  $file = array('status' => '', 'filename' => '', 'msg' => '' );


  //check ext.
  $file_extensions_allowed = array('image/gif', 'image/png', 'image/jpeg', 'image/jpg');
  $exts_humano = array('gif', 'png', 'jpeg', 'jpg');
  $exts_humano = implode(', ',$exts_humano);
  $ext = $_FILES['filename']['type'];
  #$ext = strtolower($ext);
  if(!in_array($ext, $file_extensions_allowed)){
    $exts = implode(', ',$file_extensions_allowed);

    $file['msg'] .="<p>".$_FILES['filename']['name']." <br />Puede subir archivos que tengan alguna de estas extenciones: ".$exts_humano."</p>";

  }else{
    include(APPPATH.'libraries/class.upload.php');
    $yukle = new upload;
    $yukle->set_max_size(1900000);
    $yukle->set_directory('./images-usuarios');
    $yukle->set_tmp_name($_FILES['filename']['tmp_name']);
    $yukle->set_file_size($_FILES['filename']['size']);
    $yukle->set_file_type($_FILES['filename']['type']);
    $random = substr(md5(rand()),0,6);
    $name_whitout_whitespaces = str_replace(" ","-",$_FILES['filename']['name']);
    $imagname=''.$random.'_'.$name_whitout_whitespaces;
    #$thumbname='tn_'.$imagname;
    $yukle->set_file_name($imagname);


    $yukle->start_copy();


    if($yukle->is_ok()){
      #$yukle->resize(600,0);
      #$yukle->set_thumbnail_name('tn_'.$random.'_'.$name_whitout_whitespaces);
      #$yukle->create_thumbnail();
      #$yukle->set_thumbnail_size(180, 0);

      //UPLOAD ok
      $file['filename'] = $imagname;
      $file['status'] = 1;
    }
    else{
      $file['status'] = 0 ;
      $file['msg'] = 'Error al subir archivo';
    }

    //clean
    $yukle->set_tmp_name('');
    $yukle->set_file_size('');
    $yukle->set_file_type('');
    $imagname='';
  }//fin if(extencion)


  return $file;
}


}//END CLASS
