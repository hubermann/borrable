<?php

class videos extends CI_Controller{


public function __construct(){

parent::__construct();
$this->load->model('permiso');
$this->load->model('video');
$this->load->helper('url');
$this->load->library('session');

//Si no hay session redirige a Login
if(! $this->session->userdata('logged_in')){
redirect('dashboard');
}



}

public function index(){
	$this->permiso->verify_access( 'videos', 'view');
	//Pagination
	$per_page = 4;
	$page = $this->uri->segment(3);
	if(!$page){ $start =0; $page =1; }else{ $start = ($page -1 ) * $per_page; }
		$data['pagination_links'] = "";
		$total_pages = ceil($this->video->count_rows() / $per_page);

		if ($total_pages > 1){
			for ($i=1;$i<=$total_pages;$i++){
			if ($page == $i)
				//si muestro el índice de la página actual, no coloco enlace
				$data['pagination_links'] .=  '<li class="active"><a>'.$i.'</a></li>';
			else
				//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa pagina
				$data['pagination_links']  .= '<li><a href="'.base_url().'control/videos/'.$i.'" > '. $i .'</a></li>';
		}
	}
	//End Pagination

	$data['title'] = 'videos';
	$data['menu'] = 'control/videos/menu_video';
	$data['content'] = 'control/videos/all';
	$data['query'] = $this->video->get_records($per_page,$start);

	$this->load->view('control/control_layout', $data);

}

//detail
public function detail(){
	$this->permiso->verify_access( 'videos', 'view');
	$data['title'] = 'video';
	$data['content'] = 'control/videos/detail';
	$data['menu'] = 'control/videos/menu_video';
	$data['query'] = $this->video->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}


//new
public function form_new(){
	$this->permiso->verify_access( 'videos', 'create');
	$this->load->helper('form');
	$data['title'] = 'Nuevo video';
	$data['content'] = 'control/videos/new_video';
	$data['menu'] = 'control/videos/menu_video';
	$this->load->view('control/control_layout', $data);
}

//create
public function create(){
	$this->permiso->verify_access( 'videos', 'create');
	$this->load->helper('form');
	$this->load->library('form_validation');
$this->form_validation->set_rules('titulo', 'Titulo', 'required');


$this->form_validation->set_rules('url_video', 'Url_video', 'required');

	$this->form_validation->set_message('required','El campo %s es requerido.');

if ($this->form_validation->run() === FALSE){

		$this->load->helper('form');
		$data['title'] = 'Nuevo videos';
		$data['content'] = 'control/videos/new_video';
		$data['menu'] = 'control/videos/menu_video';
		$this->load->view('control/control_layout', $data);

	}else{
		/*
		$this->load->helper('url');
		$slug = url_title($this->input->post('titulo'), 'dash', TRUE);
		*/
		$file  = $this->upload_file();
		if($_FILES['filename']['size'] > 0){
			if ( $file['status'] == 0 ){
				$this->session->set_flashdata('error', $file['msg']);
			}
		}else{
			$file['filename'] = '';
		}
		$newvideo = array( 'titulo' => $this->input->post('titulo'),
 'fecha' => $this->input->post('fecha'),
 'url_video' => $this->input->post('url_video'),
'filename' => $file['filename'],
);
		#save
		$this->video->add_record($newvideo);
		$this->session->set_flashdata('success', 'video creado. <a href="videos/detail/'.$this->db->insert_id().'">Ver</a>');
		redirect('control/videos', 'refresh');

	}



}

//edit
public function editar(){
	$this->permiso->verify_access( 'videos', 'edit');
	$this->load->helper('form');
	$data['title']= 'Editar video';
	$data['content'] = 'control/videos/edit_video';
	$data['menu'] = 'control/videos/menu_video';
	$data['query'] = $this->video->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}

//update
public function update(){
	$this->load->helper('form');
	$this->load->library('form_validation');
$this->form_validation->set_rules('titulo', 'Titulo', 'required');


$this->form_validation->set_rules('url_video', 'Url_video', 'required');


	$this->form_validation->set_message('required','El campo %s es requerido.');

	if ($this->form_validation->run() === FALSE){
		$this->load->helper('form');

		$data['title'] = 'Nuevo video';
		$data['content'] = 'control/videos/edit_video';
		$data['menu'] = 'control/videos/menu_video';
		$data['query'] = $this->video->get_record($this->input->post('id'));
		$this->load->view('control/control_layout', $data);
	}else{
		if($_FILES['filename']['size'] > 0){

			$file  = $this->upload_file();

			if ( $file['status'] != 0 )
				{
				//guardo
				$video = $this->video->get_record($this->input->post('id'));
					 $path = 'images-videos/'.$video->filename;
					 if(is_link($path)){
						unlink($path);
					 }


				$data = array('filename' => $file['filename']);
				$this->video->update_record($this->input->post('id'), $data);
				}


}
		$id=  $this->input->post('id');

		$editedvideo = array(
'titulo' => $this->input->post('titulo'),

'fecha' => $this->input->post('fecha'),

'url_video' => $this->input->post('url_video'),
);
		#save
		$this->session->set_flashdata('success', 'video Actualizado!');
		$this->video->update_record($id, $editedvideo);
		if($this->input->post('id')!=""){
			redirect('control/videos', 'refresh');
		}else{
			redirect('control/videos', 'refresh');
		}



	}



}


public function soft_delete(){
	$permiso = $this->permiso->verify_access_ajax( 'videos', 'delete');
	if(!$permiso){
		$retorno = array('status' => 3);
		echo json_encode($retorno);
		exit;
	}
	// 0 Active
	// 1 Deleted
	// 2 Draft

	$id_video = $this->input->post('iditem');
	if($id_video > 0 && $id_video != ""){

		$editedvideo = array(
		'status' => 1,
		);
		$this->video->update_record($id_video, $editedvideo);
		$retorno = array('status' => 1);
		echo json_encode($retorno);
	}else{
		$retorno = array('status' => 0);
		echo json_encode($retorno);
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
		$yukle->set_directory('./images-videos');
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
