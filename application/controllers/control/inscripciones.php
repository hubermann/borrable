<?php 

class inscripciones extends CI_Controller{


public function __construct(){

parent::__construct();
$this->load->model('permiso');
$this->load->model('inscripcion');
$this->load->helper('url');
$this->load->library('session');

//Si no hay session redirige a Login
if(! $this->session->userdata('logged_in')){
redirect('dashboard');
}



}

public function index(){
	$this->permiso->verify_access( 'inscripciones', 'view');
	//Pagination
	$per_page = 4;
	$page = $this->uri->segment(3);
	if(!$page){ $start =0; $page =1; }else{ $start = ($page -1 ) * $per_page; }
		$data['pagination_links'] = "";
		$total_pages = ceil($this->inscripcion->count_rows() / $per_page);

		if ($total_pages > 1){ 
			for ($i=1;$i<=$total_pages;$i++){ 
			if ($page == $i) 
				//si muestro el índice de la página actual, no coloco enlace 
				$data['pagination_links'] .=  '<li class="active"><a>'.$i.'</a></li>'; 
			else 
				//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa pagina 
				$data['pagination_links']  .= '<li><a href="'.base_url().'control/inscripciones/'.$i.'" > '. $i .'</a></li>'; 
		} 
	}
	//End Pagination

	$data['title'] = 'inscripciones';
	$data['menu'] = 'control/inscripciones/menu_inscripcion';
	$data['content'] = 'control/inscripciones/all';
	$data['query'] = $this->inscripcion->get_records($per_page,$start);

	$this->load->view('control/control_layout', $data);

}

//detail
public function detail(){
	$this->permiso->verify_access( 'inscripciones', 'view');
	$data['title'] = 'inscripcion';
	$data['content'] = 'control/inscripciones/detail';
	$data['menu'] = 'control/inscripciones/menu_inscripcion';
	$data['query'] = $this->inscripcion->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}


//new
public function form_new(){
	$this->permiso->verify_access( 'inscripciones', 'create');
	$this->load->helper('form');
	$data['title'] = 'Nuevo inscripcion';
	$data['content'] = 'control/inscripciones/new_inscripcion';
	$data['menu'] = 'control/inscripciones/menu_inscripcion';
	$this->load->view('control/control_layout', $data);
}

//create
public function create(){
	$this->permiso->verify_access( 'inscripciones', 'create');
	$this->load->helper('form');
	$this->load->library('form_validation');
$this->form_validation->set_rules('evento_id', 'Evento_id', 'required');

$this->form_validation->set_rules('nombre', 'Nombre', 'required');

$this->form_validation->set_rules('apellido', 'Apellido', 'required');

$this->form_validation->set_rules('telefono', 'Telefono', 'required');

$this->form_validation->set_rules('email', 'Email', 'required');

$this->form_validation->set_rules('created_at', 'Created_at', 'required');

$this->form_validation->set_rules('documento', 'Documento', 'required');

$this->form_validation->set_rules('procesado', 'Procesado', 'required');

	$this->form_validation->set_message('required','El campo %s es requerido.');

if ($this->form_validation->run() === FALSE){

		$this->load->helper('form');
		$data['title'] = 'Nuevo inscripciones';
		$data['content'] = 'control/inscripciones/new_inscripcion';
		$data['menu'] = 'control/inscripciones/menu_inscripcion';
		$this->load->view('control/control_layout', $data);

	}else{
		/*
		$this->load->helper('url');
		$slug = url_title($this->input->post('titulo'), 'dash', TRUE);
		*/$newinscripcion = array( 'evento_id' => $this->input->post('evento_id'), 
 'nombre' => $this->input->post('nombre'), 
 'apellido' => $this->input->post('apellido'), 
 'telefono' => $this->input->post('telefono'), 
 'email' => $this->input->post('email'), 
 'created_at' => $this->input->post('created_at'), 
 'documento' => $this->input->post('documento'), 
 'procesado' => $this->input->post('procesado'), 
);
		#save
		$this->inscripcion->add_record($newinscripcion);
		$this->session->set_flashdata('success', 'inscripcion creado. <a href="inscripciones/detail/'.$this->db->insert_id().'">Ver</a>');
		redirect('control/inscripciones', 'refresh');

	}



}

//edit
public function editar(){
	$this->permiso->verify_access( 'inscripciones', 'edit');
	$this->load->helper('form');
	$data['title']= 'Editar inscripcion';	
	$data['content'] = 'control/inscripciones/edit_inscripcion';
	$data['menu'] = 'control/inscripciones/menu_inscripcion';
	$data['query'] = $this->inscripcion->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}

//update
public function update(){
	$this->load->helper('form');
	$this->load->library('form_validation'); 
$this->form_validation->set_rules('evento_id', 'Evento_id', 'required');

$this->form_validation->set_rules('nombre', 'Nombre', 'required');

$this->form_validation->set_rules('apellido', 'Apellido', 'required');

$this->form_validation->set_rules('telefono', 'Telefono', 'required');

$this->form_validation->set_rules('email', 'Email', 'required');

$this->form_validation->set_rules('created_at', 'Created_at', 'required');

$this->form_validation->set_rules('documento', 'Documento', 'required');

$this->form_validation->set_rules('procesado', 'Procesado', 'required');


	$this->form_validation->set_message('required','El campo %s es requerido.');

	if ($this->form_validation->run() === FALSE){
		$this->load->helper('form');

		$data['title'] = 'Nuevo inscripcion';
		$data['content'] = 'control/inscripciones/edit_inscripcion';
		$data['menu'] = 'control/inscripciones/menu_inscripcion';
		$data['query'] = $this->inscripcion->get_record($this->input->post('id'));
		$this->load->view('control/control_layout', $data);
	}else{		
		$id=  $this->input->post('id');

		$editedinscripcion = array(  
'evento_id' => $this->input->post('evento_id'),

'nombre' => $this->input->post('nombre'),

'apellido' => $this->input->post('apellido'),

'telefono' => $this->input->post('telefono'),

'email' => $this->input->post('email'),

'created_at' => $this->input->post('created_at'),

'documento' => $this->input->post('documento'),

'procesado' => $this->input->post('procesado'),
);
		#save
		$this->session->set_flashdata('success', 'inscripcion Actualizado!');
		$this->inscripcion->update_record($id, $editedinscripcion);
		if($this->input->post('id')!=""){
			redirect('control/inscripciones', 'refresh');
		}else{
			redirect('control/inscripciones', 'refresh');
		}



	}



}


public function soft_delete(){
	$permiso = $this->permiso->verify_access_ajax( 'inscripciones', 'delete');
	if(!$permiso){
		$retorno = array('status' => 3);
		echo json_encode($retorno);
		exit;
	}
	// 0 Active
	// 1 Deleted
	// 2 Draft

	$id_inscripcion = $this->input->post('iditem');
	if($id_inscripcion > 0 && $id_inscripcion != ""){

		$editedinscripcion = array(
		'status' => 1,
		);
		$this->inscripcion->update_record($id_inscripcion, $editedinscripcion);
		$retorno = array('status' => 1);
		echo json_encode($retorno);
	}else{
		$retorno = array('status' => 0);
		echo json_encode($retorno);
	}
}






} //end class

?>