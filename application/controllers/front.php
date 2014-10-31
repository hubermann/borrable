<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Front extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model(array('evento','destacados_nota','destacados_evento', 'nota','imagenes_nota','categoria_nota'));
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
		$per_page = 1;
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
	}


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
