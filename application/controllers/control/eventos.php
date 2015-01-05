<?php

class eventos extends CI_Controller{


public function __construct(){

	parent::__construct();
	$this->load->model('evento');
	$this->load->model('speaker');
	$this->load->model('sponsor');
	$this->load->model('pais');
	$this->load->model('categoria_evento');
	$this->load->model('destacados_evento');
	$this->load->model('permiso');
	$this->load->helper('url');
	$this->load->library('session');

	//Si no hay session redirige a Login
	if(! $this->session->userdata('logged_in')){
	redirect('dashboard');
	}



}

public function index(){
	$this->permiso->verify_access( 'eventos', 'view');
	//Pagination
	$per_page = 10;
	$page = $this->uri->segment(3);
	if(!$page){ $start =0; $page =1; }else{ $start = ($page -1 ) * $per_page; }
		$data['pagination_links'] = "";
		$total_pages = ceil($this->evento->count_rows() / $per_page);

		if ($total_pages > 1){
			for ($i=1;$i<=$total_pages;$i++){
			if ($page == $i)
				//si muestro el índice de la página actual, no coloco enlace
				$data['pagination_links'] .=  '<li class="active"><a>'.$i.'</a></li>';
			else
				//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa pagina
				$data['pagination_links']  .= '<li><a href="'.base_url().'control/eventos/'.$i.'" > '. $i .'</a></li>';
		}
	}
	//End Pagination

	$data['title'] = 'Encuentros';
	$data['menu'] = 'control/eventos/menu_evento';
	$data['content'] = 'control/eventos/all';
	$data['query'] = $this->evento->get_records($per_page,$start);

	$this->load->view('control/control_layout', $data);

}

//detail
public function detail(){
	$this->permiso->verify_access( 'eventos', 'view');
	$data['title'] = 'Encuentro';
	$data['content'] = 'control/eventos/detail';
	$data['menu'] = 'control/eventos/menu_evento';
	$data['query'] = $this->evento->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}


//new
public function form_new(){
	$this->permiso->verify_access( 'eventos', 'create');
	$this->load->helper('form');
	$data['title'] = 'Nuevo encuentro';
	$data['content'] = 'control/eventos/new_evento';
	$data['menu'] = 'control/eventos/menu_evento';
	$this->load->view('control/control_layout', $data);
}


function check_date($str){
        $three = explode("-",$str);
        if(count($three) <= 2)
        {
            $this->form_validation->set_message('check_date','Ingrese fecha con formato dd-mm-yyyy.');
            return false;
        }
        else
        {
            if(!checkdate((int)$three[1],(int)$three[0],(int)$three[2]))
            {
                $this->form_validation->set_message('check_date','Date must be valid.');
                return false;
            }
            else{ return true; }
        }
    }



//create
public function create(){
	$this->permiso->verify_access( 'eventos', 'create');
	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->form_validation->set_rules('categoria_id', 'Categoria_id', 'required');
	$this->form_validation->set_rules('titulo', 'Titulo', 'required');
	$this->form_validation->set_rules('descripcion', 'Descripcion', 'required');
	$this->form_validation->set_rules('fecha_desde', 'Fecha desde', 'required|callback_check_date');
	$this->form_validation->set_rules('fecha_hasta', 'Fecha hasta', 'required|callback_check_date');
	$this->form_validation->set_message('required','El campo %s es requerido.');

	#$this->form_validation->set_message('date_valid', 'No tiene formato de fecha');

	if ($this->form_validation->run() === FALSE){

		$this->load->helper('form');
		$data['title'] = 'Nuevo encuentro';
		$data['content'] = 'control/eventos/new_evento';
		$data['menu'] = 'control/eventos/menu_evento';
		$this->load->view('control/control_layout', $data);

	}else{

		$this->load->helper('url');
		$slug = url_title($this->input->post('titulo'), 'dash', TRUE);

		$file  = $this->upload_file();
		if($_FILES['filename']['size'] > 0){
			if ( $file['status'] == 0 ){
				$this->session->set_flashdata('error', $file['msg']);
			}
		}else{
			$file['filename'] = '';
		}

		list($dia, $mes, $anio) = explode("-", $this->input->post('fecha_desde'));
		list($diah, $mesh, $anioh) = explode("-", $this->input->post('fecha_hasta'));
		$fecha_desde = $anio."-".$mes."-".$dia;
		$fecha_hasta = $anioh."-".$mesh."-".$diah;

		$newevento = array(
			'categoria_id' => $this->input->post('categoria_id'),
			'titulo' => $this->input->post('titulo'),
			'slug' => $slug,
			'descripcion' => $this->input->post('descripcion'),
			'fecha_desde' => $fecha_desde,
			'fecha_hasta' => $fecha_hasta,
			'lugar' => $this->input->post('lugar'),
			'horario' => $this->input->post('horario'),
			'pais' => $this->input->post('pais'),
			'ciudad' => $this->input->post('ciudad'),
			'coordenadas' => $this->input->post('coordenadas'),
			'tags' => $this->input->post('tags'),
			'precio' => $this->input->post('precio'),
			'filename' => $file['filename'],
			'status' => 0,
			);
		#save
		$this->evento->add_record($newevento);
		$this->session->set_flashdata('success', 'Encuentros creado!');
		redirect('control/eventos', 'refresh');

	}



}

//edit
public function editar(){
	$this->permiso->verify_access( 'eventos', 'edit');
	$this->load->helper('form');
	$data['title']= 'Editar evento';
	$data['content'] = 'control/eventos/edit_evento';
	$data['menu'] = 'control/eventos/menu_evento';
	$data['query'] = $this->evento->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}




//update
public function update(){
	$this->permiso->verify_access( 'eventos', 'edit');
	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->form_validation->set_rules('categoria_id', 'Categoria_id', 'required');

	$this->form_validation->set_rules('titulo', 'Titulo', 'required');

	$this->form_validation->set_rules('descripcion', 'Descripcion', 'required');

	$this->form_validation->set_rules('fecha_desde', 'Fecha_desde', 'required');

	$this->form_validation->set_message('required','El campo %s es requerido.');

	if ($this->form_validation->run() === FALSE){
		$this->load->helper('form');

		$data['title'] = 'Nuevo encuentro';
		$data['content'] = 'control/eventos/edit_evento';
		$data['menu'] = 'control/eventos/menu_evento';
		$data['query'] = $this->evento->get_record($this->input->post('id'));
		$this->load->view('control/control_layout', $data);
	}else{
		if($_FILES['filename']['size'] > 0){

			$file  = $this->upload_file();

			if ( $file['status'] != 0 )
				{
				//guardo
				$evento = $this->evento->get_record($this->input->post('id'));
					 $path = 'images-eventos/'.$evento->filename;

					 if(is_link($path)){
						unlink($path);
					 }


				$data = array('filename' => $file['filename']);
				$this->evento->update_record($this->input->post('id'), $data);
				}


}
		$id=  $this->input->post('id');


		list($dia, $mes, $anio) = explode("-", $this->input->post('fecha_desde'));
		list($diah, $mesh, $anioh) = explode("-", $this->input->post('fecha_hasta'));
		$fecha_desde = $anio."-".$mes."-".$dia;
		$fecha_hasta = $anioh."-".$mesh."-".$diah;


		$editedevento = array(
		'categoria_id' => $this->input->post('categoria_id'),

		'titulo' => $this->input->post('titulo'),

		'slug' => $this->input->post('slug'),

		'descripcion' => $this->input->post('descripcion'),

		'fecha_desde' => $fecha_desde,

		'fecha_hasta' => $fecha_hasta,

		'lugar' => $this->input->post('lugar'),

		'horario' => $this->input->post('horario'),

		'pais' => $this->input->post('pais'),

		'ciudad' => $this->input->post('ciudad'),

		'coordenadas' => $this->input->post('coordenadas'),

		'tags' => $this->input->post('tags'),

		'precio' => $this->input->post('precio'),
		);
		#save
		$this->session->set_flashdata('success', 'evento Actualizado!');
		$this->evento->update_record($id, $editedevento);


		#si viene destacado actualizo
		if( $this->input->post('destacado') ){

				#nota destacada
				switch ($this->input->post('destacado')) {
					case "destacado_principal":
						$this->destacados_evento->update_destacado_principal($id);
						break;
					case "destacado_secundario_1":
						$this->destacados_evento->update_destacado_secundario_1($id);
						break;
					case "destacado_secundario_2":
						$this->destacados_evento->update_destacado_secundario_2($id);
						break;
					case "destacado_secundario_3":
						$this->destacados_evento->update_destacado_secundario_3($id);
						break;
					case "destacado_secundario_4":
						$this->destacados_evento->update_destacado_secundario_4($id);
						break;

				}
		}


		if($this->input->post('id')!=""){
			redirect('control/eventos', 'refresh');
		}else{
			redirect('control/eventos', 'refresh');
		}




	}



}


public function soft_delete(){
	$permiso = $this->permiso->verify_access_ajax( 'eventos', 'delete');
	if(!$permiso){
		$retorno = array('status' => 3);
		echo json_encode($retorno);
		exit;
	}
	// 0 Active
	// 1 Deleted
	// 2 Draft
	$id_evento = $this->input->post('iditem');
	if($id_evento > 0 && $id_evento != ""){
		$editedevento = array(
		'status' => 1,
		);
		$this->evento->update_record($id_evento, $editedevento);
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
		$yukle->set_directory('./images-eventos');
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
			$yukle->resize(640,0);
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
