<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Front extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('evento');
		$this->load->model('pais');
		$this->load->model('categoria_evento');
		$this->load->model('speaker');
		$this->load->model('sponsor');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */