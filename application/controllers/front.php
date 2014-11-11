<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Front extends CI_Controller {

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

	public function notas_por_slug($slug){
		if(!$slug){redirect('/');}
		$categoria = $this->categoria_nota->get_by_slug(strtolower($slug));

		if(empty($categoria)){redirect('/');}

		//Pagination
		$per_page = 12;
		$page = $this->uri->segment(2);
		if(!$page){ $start =0; $page =1; }else{ $start = ($page -1 ) * $per_page; }
			$data['pagination_links'] = "";
			$total_pages = ceil($this->nota->count_rows_by_cat($categoria) / $per_page);

			if ($total_pages > 1){
				for ($i=1;$i<=$total_pages;$i++){
				if ($page == $i)
					//si muestro el índice de la página actual, no coloco enlace
					$data['pagination_links'] .=  '<li class="active"><a>'.$i.'</a></li>';
				else
					//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa pagina
					$data['pagination_links']  .= '<li><a href="'.base_url().'/'.$slug.'/'.$i.'" > '. $i .'</a></li>';
			}
		}
		//End Pagination

		$data['title'] = $slug;

		$data['notas'] = $this->nota->get_records_by_cat($categoria, $per_page,$start);
		$data['content'] = "notas";
		$this->load->view('front_layout', $data);
	}// END function by slug

	public function busqueda(){
		$busqueda =$this->searchterm_handler($this->input->get_post('srch-term', TRUE));

		//Pagination
		$per_page = 12;
		$page = $this->uri->segment(2);
		if(!$page){ $start =0; $page =1; }else{ $start = ($page -1 ) * $per_page; }
			$data['pagination_links'] = "";
			$total_pages = ceil($this->nota->count_rows_busqueda($busqueda) / $per_page);

			if ($total_pages > 1){
				for ($i=1;$i<=$total_pages;$i++){
				if ($page == $i)
					//si muestro el índice de la página actual, no coloco enlace
					$data['pagination_links'] .=  '<li class="active"><a>'.$i.'</a></li>';
				else
					//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa pagina
					$data['pagination_links']  .= '<li><a href="'.base_url('busqueda/'.$i).'" > '. $i .'</a></li>';
			}
		}
		//End Pagination

		$data['title'] = 'Busqueda:'.$busqueda;

		$data['notas'] = $this->nota->get_records_busqueda($busqueda, $per_page,$start);
		$data['content'] = "resultados_busqueda";
		$this->load->view('front_layout', $data);
	}// fin busuqeda


public function searchterm_handler($searchterm)
{
    if($searchterm)
    {
        $this->session->set_userdata('searchterm', $searchterm);
        return $searchterm;
    }
    elseif($this->session->userdata('searchterm'))
    {
        $searchterm = $this->session->userdata('searchterm');
        return $searchterm;
    }
    else
    {
        $searchterm ="";
        return $searchterm;
    }
}


	public function index()
	{
		$data['content'] = "inicio";
		$this->load->view('front_layout', $data);
	}

	public function inicio()
	{
		$data['content'] = "inicio";
		$this->load->view('front_layout', $data);
	}

	public function encuentros(){
		$data['title'] = "ALgun titulo";
		$data['smalltitle'] = "agregado de titulo small";
		$data['content'] = "encuentros";
		$this->load->view('front_layout', $data);
	}

	public function notas(){
		$data['title'] = "ALgun titulo";
		$data['smalltitle'] = "agregado de titulo small";
		$data['content'] = "notas";
		$this->load->view('front_layout', $data);
	}

	public function videos(){
		$per_page = 12;
		$page = $this->uri->segment(2);
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
					$data['pagination_links']  .= '<li><a href="'.base_url().'videos/'.$i.'" > '. $i .'</a></li>';
			}
		}
		//End Pagination
		$data['title'] = "Videos";
		$data['smalltitle'] = "videos";
		$data['content'] = "videos";
		$data['videos'] = $this->video->get_records($per_page,$start);
		$this->load->view('front_layout', $data);
	}


	public function detalle_nota(){
		$id_nota = $this->uri->segment(2);
		if(empty($id_nota)){redirect('notas');}

		$data['nota'] = $this->nota->get_record($id_nota);

		$data['content'] = "detalle_nota";
		$this->load->view('front_layout', $data);


	}

	/* LOGIN */
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

	public function perfil_modificar(){
		if(empty($this->session->userdata('front_logged_in')['id'])){ redirect('/');}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nombre', 'Nombre', 'required');
		$this->form_validation->set_rules('apellido', 'Apellido', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');

		$this->form_validation->set_message('required','El campo %s es requerido.');

		if ($this->form_validation->run() === FALSE){
			$this->load->helper('form');

			$data['title'] = 'Modificar mis datos';
			$data['content'] = 'perfil_editar';
			$data['query'] = $this->usuario->get_record($this->session->userdata('front_logged_in')['id']);
			var_dump($data['query']);
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
				'role_id' => $this->input->post('role_id'),
				'updated_at' => $ahora,
			);

			#save
			$this->session->set_flashdata('success', 'usuario Actualizado!');
			$this->usuario->update_record($id, $editedusuario);
			if($this->input->post('id')!=""){
				redirect('control/usuarios', 'refresh');
			}else{
				redirect('control/usuarios', 'refresh');
			}



		}



	}

	public function perfil_modificar_imagen(){
		echo 'Perfil modificar avatar';
	}

	public function perfil_modificar_password(){
		echo 'Perfil modificar pass';
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
