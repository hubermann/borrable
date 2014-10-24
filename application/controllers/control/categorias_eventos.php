<?php

class categorias_eventos extends CI_Controller{


public function __construct(){

	parent::__construct();
	$this->load->model('categoria_evento');
	$this->load->model('permiso');
	$this->load->helper('url');
	$this->load->library('session');

	//Si no hay session redirige a Login
	if(! $this->session->userdata('logged_in')){
	redirect('dashboard');
	}



}

public function index(){
	$this->permiso->verify_access( 'categorias_eventos', 'view');
	//Pagination
	$per_page = 4;
	$page = $this->uri->segment(3);
	if(!$page){ $start =0; $page =1; }else{ $start = ($page -1 ) * $per_page; }
		$data['pagination_links'] = "";
		$total_pages = ceil($this->categoria_evento->count_rows() / $per_page);

		if ($total_pages > 1){
			for ($i=1;$i<=$total_pages;$i++){
			if ($page == $i)
				//si muestro el índice de la página actual, no coloco enlace
				$data['pagination_links'] .=  '<li class="active"><a>'.$i.'</a></li>';
			else
				//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa pagina
				$data['pagination_links']  .= '<li><a href="'.base_url().'control/categorias_eventos/'.$i.'" > '. $i .'</a></li>';
		}
	}
	//End Pagination

	$data['title'] = 'Categorias para encuentros';
	$data['menu'] = 'control/categorias_eventos/menu_categoria_evento';
	$data['content'] = 'control/categorias_eventos/all';
	$data['query'] = $this->categoria_evento->get_records($per_page,$start);

	$this->load->view('control/control_layout', $data);

}

//detail
public function detail(){
	$this->permiso->verify_access( 'categorias_eventos', 'view');
	$data['title'] = 'Categorias para encuentros';
	$data['content'] = 'control/categorias_eventos/detail';
	$data['menu'] = 'control/categorias_eventos/menu_categoria_evento';
	$data['query'] = $this->categoria_evento->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}


//new
public function form_new(){
	$this->permiso->verify_access( 'categorias_eventos', 'create');
	$this->load->helper('form');
	$data['title'] = 'Nueva categoria para encuentros';
	$data['content'] = 'control/categorias_eventos/new_categoria_evento';
	$data['menu'] = 'control/categorias_eventos/menu_categoria_evento';
	$this->load->view('control/control_layout', $data);
}

//create
public function create(){
	$this->permiso->verify_access( 'categorias_eventos', 'create');
	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->form_validation->set_rules('nombre', 'Nombre', 'required');

	$this->form_validation->set_message('required','El campo %s es requerido.');


	if ($this->form_validation->run() === FALSE){

		$this->load->helper('form');
		$data['title'] = 'Nueva categoria de encuentros';
		$data['content'] = 'control/categorias_eventos/new_categoria_evento';
		$data['menu'] = 'control/categorias_eventos/menu_categoria_evento';
		$this->load->view('control/control_layout', $data);

	}else{

		$this->load->helper('url');
		$slug = url_title($this->input->post('nombre'), 'dash', TRUE);
		$newcategoria_evento = array(
			'nombre' => $this->input->post('nombre'),
			'slug' => $slug,
			'status' => 0,
			);
		#save
		$this->categoria_evento->add_record($newcategoria_evento);
		$this->session->set_flashdata('success', 'categoria de encuentros, creada!');
		redirect('control/categorias_eventos', 'refresh');

	}



}

//edit
public function editar(){
	$this->permiso->verify_access( 'categorias_eventos', 'edit');
	$this->load->helper('form');
	$data['title']= 'Editar categoria de encuentros';
	$data['content'] = 'control/categorias_eventos/edit_categoria_evento';
	$data['menu'] = 'control/categorias_eventos/menu_categoria_evento';
	$data['query'] = $this->categoria_evento->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}

//update
public function update(){
	$this->permiso->verify_access('categorias_eventos', 'edit');
	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->form_validation->set_rules('nombre', 'Nombre', 'required');



	$this->form_validation->set_message('required','El campo %s es requerido.');

	if ($this->form_validation->run() === FALSE){
		$this->load->helper('form');

		$data['title'] = 'Nueva categoria de encuentros';
		$data['content'] = 'control/categorias_eventos/edit_categoria_evento';
		$data['menu'] = 'control/categorias_eventos/menu_categoria_evento';
		$data['query'] = $this->categoria_evento->get_record($this->input->post('id'));
		$this->load->view('control/control_layout', $data);
	}else{
		$id=  $this->input->post('id');

		$this->load->helper('url');
		$slug = url_title($this->input->post('nombre'), 'dash', TRUE);

		$editedcategoria_evento = array(
		'nombre' => $this->input->post('nombre'),
		'slug' => $slug,
		);
		#save
		$this->session->set_flashdata('success', 'Categoria de encuentros, actualizada!');
		$this->categoria_evento->update_record($id, $editedcategoria_evento);
		if($this->input->post('id')!=""){
			redirect('control/categorias_eventos', 'refresh');
		}else{
			redirect('control/categorias_eventos', 'refresh');
		}



	}



}



//delete comfirm
public function delete_comfirm(){
	$this->permiso->verify_access( 'categorias_eventos', 'delete');
	$this->load->helper('form');
	$data['content'] = 'control/categorias_eventos/comfirm_delete';
	$data['title'] = 'Eliminar categoria encuentros';
	$data['menu'] = 'control/categorias_eventos/menu_categoria_evento';
	$data['query'] = $data['query'] = $this->categoria_evento->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);


}

//delete
public function delete(){
	$this->permiso->verify_access( 'categorias_eventos', 'delete');
	$this->load->helper('form');
	$this->load->library('form_validation');

	$this->form_validation->set_rules('comfirm', 'comfirm', 'required');
	$this->form_validation->set_message('required','Por favor, confirme para eliminar.');


	if ($this->form_validation->run() === FALSE){
		#validation failed
		$this->load->helper('form');

		$data['content'] = 'control/categorias_eventos/comfirm_delete';
		$data['title'] = 'Eliminar categoria_evento';
		$data['menu'] = 'control/categorias_eventos/menu_categoria_evento';
		$data['query'] = $this->categoria_evento->get_record($this->input->post('id'));
		$this->load->view('control/control_layout', $data);
	}else{
		#validation passed
		$this->session->set_flashdata('success', 'categoria_evento eliminado!');

		$prod = $this->categoria_evento->get_record($this->input->post('id'));
			$path = 'images-categorias_eventos/'.$prod->filename;
			if(is_link($path)){
				unlink($path);
			}


		$this->categoria_evento->delete_record();
		redirect('control/categorias_eventos', 'refresh');


	}
}


public function soft_delete(){
	$permiso = $this->permiso->verify_access_ajax( 'categorias_eventos', 'delete');
	if(!$permiso){
		$retorno = array('status' => 3);
		echo json_encode($retorno);
		exit;
	}
	// 0 Active
	// 1 Deleted
	// 2 Draft?
	$id_categoria_evento = $this->input->post('iditem');
	if($id_categoria_evento > 0 && $id_categoria_evento != ""){
		$editedcategoriaevento = array(
		'status' => 1,
		);
		$this->categoria_evento->update_record($id_categoria_evento, $editedcategoriaevento);
		$retorno = array('status' => 1);
		echo json_encode($retorno);
	}else{
		$retorno = array('status' => 0);
		echo json_encode($retorno);
	}
}

} //end class

?>
