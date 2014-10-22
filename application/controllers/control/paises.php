<?php 

class paises extends CI_Controller{


public function __construct(){

parent::__construct();
$this->load->model('pais');
$this->load->helper('url');
$this->load->library('session');

//Si no hay session redirige a Login
if(! $this->session->userdata('logged_in')){
redirect('dashboard');
}



}

public function index(){
	//Pagination
	$per_page = 4;
	$page = $this->uri->segment(3);
	if(!$page){ $start =0; $page =1; }else{ $start = ($page -1 ) * $per_page; }
		$data['pagination_links'] = "";
		$total_pages = ceil($this->pais->count_rows() / $per_page);

		if ($total_pages > 1){ 
			for ($i=1;$i<=$total_pages;$i++){ 
			if ($page == $i) 
				//si muestro el índice de la página actual, no coloco enlace 
				$data['pagination_links'] .=  '<li class="active"><a>'.$i.'</a></li>'; 
			else 
				//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa pagina 
				$data['pagination_links']  .= '<li><a href="'.base_url().'control/paises/'.$i.'" > '. $i .'</a></li>'; 
		} 
	}
	//End Pagination

	$data['title'] = 'paises';
	$data['menu'] = 'control/paises/menu_pais';
	$data['content'] = 'control/paises/all';
	$data['query'] = $this->pais->get_records($per_page,$start);

	$this->load->view('control/control_layout', $data);

}

//detail
public function detail(){

$data['title'] = 'pais';
$data['content'] = 'control/paises/detail';
$data['menu'] = 'control/paises/menu_pais';
$data['query'] = $this->pais->get_record($this->uri->segment(4));
$this->load->view('control/control_layout', $data);
}


//new
public function form_new(){
$this->load->helper('form');
$data['title'] = 'Nuevo pais';
$data['content'] = 'control/paises/new_pais';
$data['menu'] = 'control/paises/menu_pais';
$this->load->view('control/control_layout', $data);
}

//create
public function create(){

	$this->load->helper('form');
	$this->load->library('form_validation');
    $this->form_validation->set_rules('nombre', 'Nombre', 'required');

	$this->form_validation->set_message('required','El campo %s es requerido.');
	if ($this->form_validation->run() === FALSE){

		$this->load->helper('form');
		$data['title'] = 'Nuevo paises';
		$data['content'] = 'control/paises/new_pais';
		$data['menu'] = 'control/paises/menu_pais';
		$this->load->view('control/control_layout', $data);

	}else{
		
		$this->load->helper('url');
		$slug = url_title($this->input->post('nombre'), 'dash', TRUE);

		$newpais = array( 'nombre' => $this->input->post('nombre'), 
 'slug' => $slug, 
 'status' => 0, 
);
		#save
		$this->pais->add_record($newpais);
		$this->session->set_flashdata('success', 'pais creado. <a href="paises/detail/'.$this->db->insert_id().'">Ver</a>');
		redirect('control/paises', 'refresh');

	}



}

//edit
public function editar(){
	$this->load->helper('form');
	$data['title']= 'Editar pais';	
	$data['content'] = 'control/paises/edit_pais';
	$data['menu'] = 'control/paises/menu_pais';
	$data['query'] = $this->pais->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}

//update
public function update(){
	$this->load->helper('form');
	$this->load->library('form_validation'); 
	$this->form_validation->set_rules('nombre', 'Nombre', 'required');



	$this->form_validation->set_message('required','El campo %s es requerido.');

	if ($this->form_validation->run() === FALSE){
		$this->load->helper('form');

		$data['title'] = 'Nuevo pais';
		$data['content'] = 'control/paises/edit_pais';
		$data['menu'] = 'control/paises/menu_pais';
		$data['query'] = $this->pais->get_record($this->input->post('id'));
		$this->load->view('control/control_layout', $data);
	}else{		
		$id=  $this->input->post('id');
		$this->load->helper('url');
		$slug = url_title($this->input->post('nombre'), 'dash', TRUE);

		$editedpais = array(  
		'nombre' => $this->input->post('nombre'),

		'slug' => $slug,
		);
		#save
		$this->session->set_flashdata('success', 'pais Actualizado!');
		$this->pais->update_record($id, $editedpais);
		if($this->input->post('id')!=""){
			redirect('control/paises', 'refresh');
		}else{
			redirect('control/paises', 'refresh');
		}



	}



}


//delete comfirm		
public function delete_comfirm(){
	$this->load->helper('form');
	$data['content'] = 'control/paises/comfirm_delete';
	$data['title'] = 'Eliminar pais';
	$data['menu'] = 'control/paises/menu_pais';
	$data['query'] = $data['query'] = $this->pais->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);


}

//delete
public function delete(){

	$this->load->helper('form');
	$this->load->library('form_validation');

	$this->form_validation->set_rules('comfirm', 'comfirm', 'required');
	$this->form_validation->set_message('required','Por favor, confirme para eliminar.');


	if ($this->form_validation->run() === FALSE){
		#validation failed
		$this->load->helper('form');

		$data['content'] = 'control/paises/comfirm_delete';
		$data['title'] = 'Eliminar pais';
		$data['menu'] = 'control/paises/menu_pais';
		$data['query'] = $this->pais->get_record($this->input->post('id'));
		$this->load->view('control/control_layout', $data);
	}else{
		#validation passed
		$this->session->set_flashdata('success', 'pais eliminado!');

		$prod = $this->pais->get_record($this->input->post('id'));
			$path = 'images-paises/'.$prod->filename;
			if(is_link($path)){
				unlink($path);
			}
		

		$this->pais->delete_record();
		redirect('control/paises', 'refresh');
		

	}
}


} //end class

?>