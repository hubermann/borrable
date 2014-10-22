<?php 

class categorias_notas extends CI_Controller{


public function __construct(){

	parent::__construct();
	$this->load->model('categoria_nota');
	$this->load->model('permiso');
	$this->load->helper('url');
	$this->load->library('session');

	//Si no hay session redirige a Login
	if(! $this->session->userdata('logged_in')){
	redirect('dashboard');
	}



}

public function index(){
	$this->permiso->verify_access( 'categorias_notas', 'view');
	//Pagination
	$per_page = 4;
	$page = $this->uri->segment(3);
	if(!$page){ $start =0; $page =1; }else{ $start = ($page -1 ) * $per_page; }
		$data['pagination_links'] = "";
		$total_pages = ceil($this->categoria_nota->count_rows() / $per_page);

		if ($total_pages > 1){ 
			for ($i=1;$i<=$total_pages;$i++){ 
			if ($page == $i) 
				//si muestro el índice de la página actual, no coloco enlace 
				$data['pagination_links'] .=  '<li class="active"><a>'.$i.'</a></li>'; 
			else 
				//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa pagina 
				$data['pagination_links']  .= '<li><a href="'.base_url().'control/categorias_notas/'.$i.'" > '. $i .'</a></li>'; 
		} 
	}
	//End Pagination

	$data['title'] = 'Categorias para notas';
	$data['menu'] = 'control/categorias_notas/menu_categoria_nota';
	$data['content'] = 'control/categorias_notas/all';
	$data['query'] = $this->categoria_nota->get_records($per_page,$start);

	$this->load->view('control/control_layout', $data);

}

//detail
public function detail(){
	$this->permiso->verify_access( 'categorias_notas', 'view');

$data['title'] = 'Categoria para notas';
$data['content'] = 'control/categorias_notas/detail';
$data['menu'] = 'control/categorias_notas/menu_categoria_nota';
$data['query'] = $this->categoria_nota->get_record($this->uri->segment(4));
$this->load->view('control/control_layout', $data);
}


//new
public function form_new(){
	$this->permiso->verify_access( 'categorias_notas', 'create');
$this->load->helper('form');
$data['title'] = 'Nueva categoria para notas';
$data['content'] = 'control/categorias_notas/new_categoria_nota';
$data['menu'] = 'control/categorias_notas/menu_categoria_nota';
$this->load->view('control/control_layout', $data);
}

//create
public function create(){
	$this->permiso->verify_access( 'categorias_notas', 'create');
	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->form_validation->set_rules('nombre', 'Nombre', 'required');
	$this->form_validation->set_message('required','El campo %s es requerido.');

if ($this->form_validation->run() === FALSE){

		$this->load->helper('form');
		$data['title'] = 'Nueva categoria para notas';
		$data['content'] = 'control/categorias_notas/new_categoria_nota';
		$data['menu'] = 'control/categorias_notas/menu_categoria_nota';
		$this->load->view('control/control_layout', $data);

	}else{
		
		$this->load->helper('url');
		$slug = url_title($this->input->post('nombre'), 'dash', TRUE);
		$newcategoria_nota = array( 'nombre' => $this->input->post('nombre'), 
 'slug' => $slug, 
 'status' => 0, 
);
		#save
		$this->categoria_nota->add_record($newcategoria_nota);
		$this->session->set_flashdata('success', 'categoria_nota creado. <a href="categorias_notas/detail/'.$this->db->insert_id().'">Ver</a>');
		redirect('control/categorias_notas', 'refresh');

	}



}

//edit
public function editar(){
	$this->permiso->verify_access( 'categorias_notas', 'edit');
	$this->load->helper('form');
	$data['title']= 'Editar categoria para notas';	
	$data['content'] = 'control/categorias_notas/edit_categoria_nota';
	$data['menu'] = 'control/categorias_notas/menu_categoria_nota';
	$data['query'] = $this->categoria_nota->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}

//update
public function update(){
	$this->permiso->verify_access( 'categorias_notas', 'edit');
	$this->load->helper('form');
	$this->load->library('form_validation'); 
	$this->form_validation->set_rules('nombre', 'Nombre', 'required');
	$this->form_validation->set_message('required','El campo %s es requerido.');

	if ($this->form_validation->run() === FALSE){
		$this->load->helper('form');

		$data['title'] = 'Nueva categoria para nota';
		$data['content'] = 'control/categorias_notas/edit_categoria_nota';
		$data['menu'] = 'control/categorias_notas/menu_categoria_nota';
		$data['query'] = $this->categoria_nota->get_record($this->input->post('id'));
		$this->load->view('control/control_layout', $data);
	}else{		
		$id=  $this->input->post('id');

		$slug = $this->input->post('slug');
		
		if($this->input->post('slug') == ""){
			$this->load->helper('url');
			$slug = url_title($this->input->post('nombre'), 'dash', TRUE);
		}else{
			$this->load->helper('url');
			$slug = url_title($this->input->post('slug'), 'dash', TRUE);
		}

		$editedcategoria_nota = array(  
		'nombre' => $this->input->post('nombre'),
		'slug' => $slug,
		);
		#save
		$this->session->set_flashdata('success', 'categoria para notas, actualizada!');
		$this->categoria_nota->update_record($id, $editedcategoria_nota);
		if($this->input->post('id')!=""){
			redirect('control/categorias_notas', 'refresh');
		}else{
			redirect('control/categorias_notas', 'refresh');
		}



	}



}


public function soft_delete(){
	$permiso = $this->permiso->verify_access_ajax( 'categorias_notas', 'delete');
	if(!$permiso){
		$retorno = array('status' => 3);
		echo json_encode($retorno);
		exit;
	}
	// 0 Active
	// 1 Deleted
	// 2 Draft
	$id_categoria_nota = $this->input->post('iditem');
	if($id_categoria_nota > 0 && $id_categoria_nota != ""){
		$editedcategoria_nota = array(  
		'status' => 1,
		);
		$this->categoria_nota->update_record($id_categoria_nota, $editedcategoria_nota);
		$retorno = array('status' => 1);
		echo json_encode($retorno);
	}else{
		$retorno = array('status' => 0);
		echo json_encode($retorno);
	}
}



} //end class

?>