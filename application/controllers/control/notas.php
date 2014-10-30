<?php

class notas extends CI_Controller{


public function __construct(){

	parent::__construct();
	$this->load->model('nota');
	$this->load->model('imagenes_nota');
	$this->load->model('categoria_nota');
	$this->load->model('destacados_nota');
	$this->load->model('permiso');
	$this->load->helper('url');
	$this->load->library('session');

	//Si no hay session redirige a Login
	if(! $this->session->userdata('logged_in')){
	redirect('dashboard');
	}



}


public function index(){
	$this->permiso->verify_access( 'notas', 'view');
	//Pagination
	$per_page = 10;
	$page = $this->uri->segment(3);
	if(!$page){ $start =0; $page =1; }else{ $start = ($page -1 ) * $per_page; }
		$data['pagination_links'] = "";
		$total_pages = ceil($this->nota->count_rows() / $per_page);

		if ($total_pages > 1){
			for ($i=1;$i<=$total_pages;$i++){
			if ($page == $i)
				//si muestro el índice de la página actual, no coloco enlace
				$data['pagination_links'] .=  '<li class="active"><a>'.$i.'</a></li>';
			else
				//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa pagina
				$data['pagination_links']  .= '<li><a href="'.base_url().'control/notas/'.$i.'" > '. $i .'</a></li>';
		}
	}
	//End Pagination

	$data['title'] = 'notas';
	$data['menu'] = 'control/notas/menu_nota';
	$data['content'] = 'control/notas/all';
	$data['query'] = $this->nota->get_records($per_page,$start);

	$this->load->view('control/control_layout', $data);

}

//detail
public function detail(){
$this->permiso->verify_access( 'notas', 'view');
$data['title'] = 'nota';
$data['content'] = 'control/notas/detail';
$data['menu'] = 'control/notas/menu_nota';
$data['query'] = $this->nota->get_record($this->uri->segment(4));
$this->load->view('control/control_layout', $data);
}


//new
public function form_new(){
	$this->permiso->verify_access( 'notas', 'create');
$this->load->helper('form');
$data['title'] = 'Nuevo nota';
$data['content'] = 'control/notas/new_nota';
$data['menu'] = 'control/notas/menu_nota';
$this->load->view('control/control_layout', $data);
}



//create
public function create(){
$this->permiso->verify_access( 'notas', 'create');
	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->form_validation->set_rules('titulo', 'Titulo', 'required');
	$this->form_validation->set_rules('extracto', 'Extracto', 'required');
	$this->form_validation->set_rules('contenido', 'Contenido', 'required');
	$this->form_validation->set_message('required','El campo %s es requerido.');

if ($this->form_validation->run() === FALSE){

		$this->load->helper('form');
		$data['title'] = 'Nuevo notas';
		$data['content'] = 'control/notas/new_nota';
		$data['menu'] = 'control/notas/menu_nota';
		$this->load->view('control/control_layout', $data);

	}else{
		list($dia, $mes, $anio) = explode("-", $this->input->post('fecha'));
		$fecha = "$anio-$mes-$dia";

		$this->load->helper('url');
		$slug = url_title($this->input->post('titulo'), 'dash', TRUE);

		#autor
		$logueado = $this->session->userdata('logged_in');


		$newnota = array( 'titulo' => $this->input->post('titulo'),
		 'extracto' => $this->input->post('extracto'),
		 'slug' => $slug,
		 'contenido' => $this->input->post('contenido'),
		 'fecha' => $fecha,
		 'categoria_id' => $this->input->post('categoria_id'),
		 'autor_id' => $logueado['role_id'],
		 'fuente_nombre' => $this->input->post('fuente_nombre'),
		 'fuente_url' => $this->input->post('fuente_url'),
		 'main_image' => 0,
		 'status' => 0,
		);
		#save
		$this->nota->add_record($newnota);
		$this->session->set_flashdata('success', 'nota creado. <a href="notas/detail/'.$this->db->insert_id().'">Ver</a>');
		redirect('control/notas', 'refresh');

	}



}

//edit
public function editar(){
	$this->permiso->verify_access( 'notas', 'edit');
	$this->load->helper('form');
	$data['title']= 'Editar nota';
	$data['content'] = 'control/notas/edit_nota';
	$data['menu'] = 'control/notas/menu_nota';
	$data['query'] = $this->nota->get_record($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}

//update
public function update(){
	$this->permiso->verify_access( 'notas', 'edit');
	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->form_validation->set_rules('titulo', 'Titulo', 'required');
	$this->form_validation->set_rules('extracto', 'Extracto', 'required');
	$this->form_validation->set_rules('contenido', 'Contenido', 'required');



	$this->form_validation->set_message('required','El campo %s es requerido.');

	if ($this->form_validation->run() === FALSE){
		$this->load->helper('form');

		$data['title'] = 'Nuevo nota';
		$data['content'] = 'control/notas/edit_nota';
		$data['menu'] = 'control/notas/menu_nota';
		$data['query'] = $this->nota->get_record($this->input->post('id'));
		$this->load->view('control/control_layout', $data);
	}else{
	//fecha
	list($dia, $mes, $anio) = explode("-", $this->input->post('fecha'));
		$fecha = "$anio-$mes-$dia";
		//slug

		$slug = $this->input->post('slug');
		if( $this->input->post('slug') == "" ){
			$this->load->helper('url');
			$slug = url_title($this->input->post('titulo'), 'dash', TRUE);
		}



		$id=  $this->input->post('id');


		#autor no se actualiza, se guarda quie la creo a la nota
		$editednota = array(
			'titulo' => $this->input->post('titulo'),
			'extracto' => $this->input->post('extracto'),
			'slug' => $slug,
			'contenido' => $this->input->post('contenido'),
			'fecha' => $fecha,
			'categoria_id' => $this->input->post('categoria_id'),
			'fuente_nombre' => $this->input->post('fuente_nombre'),
			'fuente_url' => $this->input->post('fuente_url'),
			);
		#save
		$this->session->set_flashdata('success', 'nota Actualizado!');
		$this->nota->update_record($id, $editednota);

		#si viene destacado actualizo
		if( $this->input->post('destacado') ){
 		$this->input->post('destacado');
				#nota destacada
				switch ($this->input->post('destacado')) {
					case "destacado_principal":
						$this->destacados_nota->update_destacado_principal($id);
						break;
					case "destacado_secundario_1":
						$this->destacados_nota->update_destacado_secundario_1($id);
						break;
					case "destacado_secundario_2":
						$this->destacados_nota->update_destacado_secundario_2($id);
						break;
					case "destacado_secundario_3":
						$this->destacados_nota->update_destacado_secundario_3($id);
						break;
					case "destacado_secundario_4":
						$this->destacados_nota->update_destacado_secundario_4($id);
						break;
						#La opcion de actualizar "Sin destacar" solo esta disponible en update
					case "sin_destacar":
						$this->destacados_nota->update_destacado_sin_destacar($id);
						break;

				}
		}


		if($this->input->post('id')!=""){
			redirect('control/notas', 'refresh');
		}else{
			redirect('control/notas', 'refresh');
		}



	}



}


public function soft_delete(){
	$permiso = $this->permiso->verify_access_ajax( 'notas', 'delete');
	if(!$permiso){
		$retorno = array('status' => 3);
		echo json_encode($retorno);
		exit;
	}
	// 0 Active
	// 1 Deleted
	// 2 Draft
	$id_nota = $this->input->post('iditem');
	if($id_nota > 0 && $id_nota != ""){
		$editednota = array(
		'status' => 1,
		);
		$this->nota->update_record($id_nota, $editednota);
		$retorno = array('status' => 1);
		echo json_encode($retorno);
	}else{
		$retorno = array('status' => 0);
		echo json_encode($retorno);
	}
}





	public function imagenes(){
		$this->permiso->verify_access( 'notas', 'view');
	$this->load->helper('form');
	$data['content'] = 'control/notas/imagenes';
	$data['title'] = 'Imagenes ';
	$data['menu'] = 'control/notas/menu_nota';
	$data['query_imagenes'] = $this->imagenes_nota->imagenes_nota($this->uri->segment(4));
	$this->load->view('control/control_layout', $data);
}


	public function add_imagen(){
$permiso = $this->permiso->verify_access_ajax( 'notas', 'edit');
	//adjunto
	if($_FILES['adjunto']['size'] > 0){

	$file  = $this->upload_file();

	if ( $file['status'] != 0 ){
		//guardo
		$nueva_imagen = array(
			'nota_id' => $this->input->post('id'),
			'filename' => $file['filename'],
			'status' => 0,
		);
		#save
		$this->session->set_flashdata('success', 'Imagen cargada!');
		$this->imagenes_nota->add_record($nueva_imagen);
		redirect('control/notas/imagenes/'.$this->input->post('id'));
	}


	}
	$this->session->set_flashdata('error', $file['msg']);
	redirect('control/notas/imagenes/'.$this->input->post('id'));
}

public function delete_imagen(){
	$id_imagen = $this->uri->segment(4);

	$imagen = $this->imagenes_nota->get_record($id_imagen);
	$path = 'images-notas/'.$imagen->filename;
	unlink($path);

	$this->imagenes_nota->delete_record($id_imagen);
	#echo "Eliminada : ".$imagen->filename;
}


function main_imagen_update(){
	$idimagen = $this->input->post('idimagen');
	$idnota = $this->input->post('idnota');
	$data_update = array('main_image' => $idimagen);
	$this->nota->update_main($idnota, $data_update);
	$arr = array('status' => "OK");
	echo json_encode($arr);
	exit();
}


/*******  FILE ADJUNTO  ********/
public function upload_file(){

	//1 = OK - 0 = Failure
	$file = array('status' => '', 'filename' => '', 'msg' => '' );

	array('image/jpeg','image/pjpeg', 'image/jpg', 'image/png', 'image/gif','image/bmp');
	//check extencion
	/*
	$file_extensions_allowed = array('application/pdf', 'application/msword', 'application/rtf', 'application/vnd.ms-excel','application/vnd.ms-powerpoint','application/zip','application/x-rar-compressed', 'text/plain');
	$exts_humano = array('PDF', 'WORD', 'RTF', 'EXCEL', 'PowerPoint', 'ZIP', 'RAR');
	*/
	$file_extensions_allowed = array('image/jpeg','image/pjpeg', 'image/jpg', 'image/png', 'image/gif','image/bmp');
	$exts_humano = array('JPG', 'JPEG', 'PNG', 'GIF');


	$exts_humano = implode(', ',$exts_humano);
	$ext = $_FILES['adjunto']['type'];
	#$ext = strtolower($ext);
	if(!in_array($ext, $file_extensions_allowed)){
		$exts = implode(', ',$file_extensions_allowed);

	$file['msg'] .="<p>".$_FILES['adjunto']['name']." <br />Puede subir archivos que tengan alguna de estas extenciones: ".$exts_humano."</p>";
	$file['status'] = 0 ;
	}else{
		include(APPPATH.'libraries/class.upload.php');
		$yukle = new upload;
		$yukle->set_max_size(1900000);
		$yukle->set_directory('./images-notas');
		$yukle->set_tmp_name($_FILES['adjunto']['tmp_name']);
		$yukle->set_file_size($_FILES['adjunto']['size']);
		$yukle->set_file_type($_FILES['adjunto']['type']);
		$random = substr(md5(rand()),0,6);
		$name_whitout_whitespaces = str_replace(" ","-",$_FILES['adjunto']['name']);
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
