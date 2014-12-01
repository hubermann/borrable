<?php

class comentarios_notas extends CI_Controller{


public function __construct(){

parent::__construct();
$this->load->model('permiso');
$this->load->model('comentario_nota');
$this->load->helper('url');
$this->load->library('session');

//Si no hay session redirige a Login
if(! $this->session->userdata('logged_in')){
redirect('dashboard');
}



}

public function index(){
	$this->permiso->verify_access( 'comentarios_notas', 'view');
	//Pagination
	$per_page = 4;
	$page = $this->uri->segment(3);
	if(!$page){ $start =0; $page =1; }else{ $start = ($page -1 ) * $per_page; }
		$data['pagination_links'] = "";
		$total_pages = ceil($this->comentario_nota->count_rows() / $per_page);

		if ($total_pages > 1){
			for ($i=1;$i<=$total_pages;$i++){
			if ($page == $i)
				//si muestro el índice de la página actual, no coloco enlace
				$data['pagination_links'] .=  '<li class="active"><a>'.$i.'</a></li>';
			else
				//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa pagina
				$data['pagination_links']  .= '<li><a href="'.base_url().'control/comentarios_notas/'.$i.'" > '. $i .'</a></li>';
		}
	}
	//End Pagination

	$data['title'] = 'comentarios_notas';
	$data['menu'] = 'control/comentarios_notas/menu_comentario_nota';
	$data['content'] = 'control/comentarios_notas/all';
	$data['query'] = $this->comentario_nota->get_records($per_page,$start);

	$this->load->view('control/control_layout', $data);

}

//detail
public function detail(){
	$this->permiso->verify_access( 'comentarios_notas', 'view');
	$data['title'] = 'comentario_nota';
	$data['content'] = 'control/comentarios_notas/detail';
	$data['menu'] = 'control/comentarios_notas/menu_comentario_nota';
	$data['query'] = $this->comentario_nota->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}


//new
public function form_new(){
	$this->permiso->verify_access( 'comentarios_notas', 'create');
	$this->load->helper('form');
	$data['title'] = 'Nuevo comentario_nota';
	$data['content'] = 'control/comentarios_notas/new_comentario_nota';
	$data['menu'] = 'control/comentarios_notas/menu_comentario_nota';
	$this->load->view('control/control_layout', $data);
}

//create
public function create(){
	$this->permiso->verify_access( 'comentarios_notas', 'create');
	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->form_validation->set_rules('usuario_id', 'Usuario_id', 'required');

	$this->form_validation->set_rules('body', 'Body', 'required');

	$this->form_validation->set_rules('nota_id', 'Nota_id', 'required');

	$this->form_validation->set_rules('fecha', 'Fecha', 'required');

	$this->form_validation->set_rules('status', 'Status', 'required');

	$this->form_validation->set_message('required','El campo %s es requerido.');

if ($this->form_validation->run() === FALSE){

		$this->load->helper('form');
		$data['title'] = 'Nuevo comentarios_notas';
		$data['content'] = 'control/comentarios_notas/new_comentario_nota';
		$data['menu'] = 'control/comentarios_notas/menu_comentario_nota';
		$this->load->view('control/control_layout', $data);

	}else{
		/*
		$this->load->helper('url');
		$slug = url_title($this->input->post('titulo'), 'dash', TRUE);
		*/$newcomentario_nota = array( 'usuario_id' => $this->input->post('usuario_id'),
	 'body' => $this->input->post('body'),
	 'nota_id' => $this->input->post('nota_id'),
	 'fecha' => $this->input->post('fecha'),
	 'status' => $this->input->post('status'),
	);
		#save
		$this->comentario_nota->add_record($newcomentario_nota);
		$this->session->set_flashdata('success', 'comentario_nota creado. <a href="comentarios_notas/detail/'.$this->db->insert_id().'">Ver</a>');
		redirect('control/comentarios_notas', 'refresh');

	}



}

//edit
public function editar(){
	$this->permiso->verify_access( 'comentarios_notas', 'edit');
	$this->load->helper('form');
	$data['title']= 'Editar comentario_nota';
	$data['content'] = 'control/comentarios_notas/edit_comentario_nota';
	$data['menu'] = 'control/comentarios_notas/menu_comentario_nota';
	$data['query'] = $this->comentario_nota->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}

//update
public function update(){
	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->form_validation->set_rules('usuario_id', 'Usuario_id', 'required');

	$this->form_validation->set_rules('body', 'Body', 'required');

	$this->form_validation->set_rules('nota_id', 'Nota_id', 'required');

	$this->form_validation->set_rules('fecha', 'Fecha', 'required');

	$this->form_validation->set_rules('status', 'Status', 'required');


	$this->form_validation->set_message('required','El campo %s es requerido.');

	if ($this->form_validation->run() === FALSE){
		$this->load->helper('form');

		$data['title'] = 'Nuevo comentario_nota';
		$data['content'] = 'control/comentarios_notas/edit_comentario_nota';
		$data['menu'] = 'control/comentarios_notas/menu_comentario_nota';
		$data['query'] = $this->comentario_nota->get_record($this->input->post('id'));
		$this->load->view('control/control_layout', $data);
	}else{
		$id=  $this->input->post('id');

		$editedcomentario_nota = array(
		'usuario_id' => $this->input->post('usuario_id'),

		'body' => $this->input->post('body'),

		'nota_id' => $this->input->post('nota_id'),

		'fecha' => $this->input->post('fecha'),

		'status' => $this->input->post('status'),
		);
		#save
		$this->session->set_flashdata('success', 'comentario_nota Actualizado!');
		$this->comentario_nota->update_record($id, $editedcomentario_nota);
		if($this->input->post('id')!=""){
			redirect('control/comentarios_notas', 'refresh');
		}else{
			redirect('control/comentarios_notas', 'refresh');
		}



	}



}


public function soft_delete(){
	$permiso = $this->permiso->verify_access_ajax( 'comentarios_notas', 'delete');
	if(!$permiso){
		$retorno = array('status' => 3);
		echo json_encode($retorno);
		exit;
	}
	// 0 Active
	// 1 Deleted
	// 2 Draft

	$id_comentario_nota = $this->input->post('iditem');
	if($id_comentario_nota > 0 && $id_comentario_nota != ""){

		$editedcomentario_nota = array(
		'status' => 1,
		);
		$this->comentario_nota->update_record($id_comentario_nota, $editedcomentario_nota);
		$retorno = array('status' => 1);
		echo json_encode($retorno);
	}else{
		$retorno = array('status' => 0);
		echo json_encode($retorno);
	}
}






} //end class

?>
