<?php

class speakers extends CI_Controller{


public function __construct(){

	parent::__construct();
	$this->load->model('speaker');
	$this->load->model('evento');
	$this->load->model('pais');
	$this->load->model('permiso');
	$this->load->helper('url');
	$this->load->library('session');

	//Si no hay session redirige a Login
	if(! $this->session->userdata('logged_in')){
	redirect('dashboard');
	}



}

public function index(){
	$this->permiso->verify_access( 'speakers', 'view');
	$id_evento = $this->uri->segment(4);

	$data['pagination_links'] ="";
	$data['title'] = 'speakers';
	$data['menu'] = 'control/speakers/menu_speaker';

	$data['content'] = 'control/speakers/all';
	$data['query'] = $this->speaker->get_records($id_evento);

	$this->load->view('control/control_layout', $data);

}

//detail
public function detail(){
	$this->permiso->verify_access( 'speakers', 'view');
	$data['title'] = 'speaker';
	$data['content'] = 'control/speakers/detail';
	$data['menu'] = 'control/speakers/menu_speaker';
	$data['query'] = $this->speaker->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}


//new
public function form_new(){
	$this->permiso->verify_access( 'speakers', 'create');
	$this->load->helper('form');
	$data['title'] = 'Nuevo speaker';
	$data['content'] = 'control/speakers/new_speaker';
	$data['menu'] = 'control/speakers/menu_speaker';
	$this->load->view('control/control_layout', $data);
}

//create
public function create(){
	$this->permiso->verify_access( 'speakers', 'create');
	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->form_validation->set_rules('evento_id', 'Evento_id', 'required');

	$this->form_validation->set_rules('nombre', 'Nombre', 'required');

	$this->form_validation->set_rules('pais', 'Pais', 'required');

	$this->form_validation->set_rules('bio', 'Bio', 'required');


	if ($this->form_validation->run() === FALSE){

		$this->load->helper('form');
		$data['title'] = 'Nuevo speakers';
		$data['content'] = 'control/speakers/new_speaker';
		$data['id_evento'] = $this->input->post('evento_id');
		$data['menu'] = 'control/speakers/menu_speaker';
		$this->load->view('control/control_layout', $data);

	}else{

		$this->load->helper('url');
		$slug = url_title($this->input->post('nombre'), 'dash', TRUE);

		$file  = $this->upload_file();
		if($_FILES['filename']['size'] > 0){
			if ( $file['status'] == 0 ){
				$this->session->set_flashdata('error', $file['msg']);
			}
		}else{
			$file['filename'] = '';
		}
		$newspeaker = array( 'evento_id' => $this->input->post('evento_id'),
							 'nombre' => $this->input->post('nombre'),
							 'slug' => $slug,
							 'cargo' => $this->input->post('cargo'),
							 'empresa' => $this->input->post('empresa'),
							 'pais' => $this->input->post('pais'),
							 'bio' => $this->input->post('bio'),
							 'cv' => $this->input->post('cv'),
							'filename' => $file['filename'],
							'status' => 0,
							);
		#save
		$this->speaker->add_record($newspeaker);
		$this->session->set_flashdata('success', 'speaker creado. <a href="speakers/detail/'.$this->db->insert_id().'">Ver</a>');
		redirect('control/speakers/evento/'.$this->input->post('evento_id'), 'refresh');

	}



}

//edit
public function editar(){
	$this->permiso->verify_access( 'speakers', 'edit');
	$this->load->helper('form');
	$data['title']= 'Editar speaker';
	$data['content'] = 'control/speakers/edit_speaker';
	$data['menu'] = 'control/speakers/menu_speaker';
	$data['query'] = $this->speaker->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}

//update
public function update(){
	$this->permiso->verify_access( 'speakers', 'edit');
	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->form_validation->set_rules('evento_id', 'Evento_id', 'required');

	$this->form_validation->set_rules('nombre', 'Nombre', 'required');

	$this->form_validation->set_rules('pais', 'Pais', 'required');

	$this->form_validation->set_rules('bio', 'Bio', 'required');


	$this->form_validation->set_message('required','El campo %s es requerido.');

	if ($this->form_validation->run() === FALSE){
		$this->load->helper('form');

		$data['title'] = 'Nuevo speaker';
		$data['content'] = 'control/speakers/edit_speaker';
		$data['menu'] = 'control/speakers/menu_speaker';
		$data['query'] = $this->speaker->get_record($this->input->post('id'));
		$this->load->view('control/control_layout', $data);
	}else{
		if($_FILES['filename']['size'] > 0){

			$file  = $this->upload_file();

			if ( $file['status'] != 0 )
				{
				//guardo
				$speaker = $this->speaker->get_record($this->input->post('id'));
					 $path = 'images-speakers/'.$speaker->filename;
					 if(is_link($path)){
						unlink($path);
					 }


				$data = array('filename' => $file['filename']);
				$this->speaker->update_record($this->input->post('id'), $data);
				}


}
if($this->input->post('slug') == ""){

	$this->load->helper('url');
	$slug = url_title($this->input->post('nombre'), 'dash', TRUE);
}else{
	$slug = $this->input->post('slug');
}


		$id=  $this->input->post('id');

		$editedspeaker = array(
		'evento_id' => $this->input->post('evento_id'),

		'nombre' => $this->input->post('nombre'),

		'slug' => $slug,

		'cargo' => $this->input->post('cargo'),

		'empresa' => $this->input->post('empresa'),

		'pais' => $this->input->post('pais'),

		'bio' => $this->input->post('bio'),

		'cv' => $this->input->post('cv'),
		);
		#save
		$this->session->set_flashdata('success', 'speaker Actualizado!');
		$this->speaker->update_record($id, $editedspeaker);
		if($this->input->post('id')!=""){
			redirect('control/speakers/evento/'.$this->input->post('evento_id'), 'refresh');
		}else{
			redirect('control/speakers/evento/'.$this->input->post('evento_id'), 'refresh');
		}

	}

}


public function soft_delete(){
	$permiso = $this->permiso->verify_access_ajax( 'speakers', 'delete');
	if(!$permiso){
		$retorno = array('status' => 3);
		echo json_encode($retorno);
		exit;
	}
	// 0 Active
	// 1 Deleted
	// 2 Draft
	$id_speaker = $this->input->post('iditem');

	if($id_speaker > 0 && $id_speaker != ""){
		$editedspeaker = array(
		'status' => 1,
		);
		$this->speaker->update_record($id_speaker, $editedspeaker);
		$retorno = array('status' => 1);
		echo json_encode($retorno);
	}else{
		echo "Nada para eliminar";
	}
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
		$yukle->set_directory('./images-speakers');
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


} //end class

?>
