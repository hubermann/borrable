<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Front extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('geoip_lib');
		$this->load->model(array('evento',
		'destacados_nota',
		'destacados_evento',
		'nota',
		'imagenes_nota',
		'categoria_nota',
		'video','usuario',
		'comentario_nota'
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

// guarda en session la ultima busuqeda realizada para
// evitar paginado con 2 items numericos en la url.
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
		$data['title'] = "Encuentros";
		$data['smalltitle'] = "un titulo small";
		$data['content'] = "encuentros";
		$this->load->view('front_layout', $data);
	}

	public function notas(){
		$data['title'] = "Notas";
		$data['smalltitle'] = "un titulo small";
		$data['content'] = "notas";
		$this->load->view('front_layout', $data);
	}

	public function tv(){
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
					$data['pagination_links']  .= '<li><a href="'.base_url().'tv/'.$i.'" > '. $i .'</a></li>';
			}
		}
		//End Pagination
		$data['title'] = "TV";
		$data['smalltitle'] = "tv";
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



public function detalle_evento(){
	$id_encuentro = $this->uri->segment(2);
	if(empty($id_encuentro)){redirect('encuentros');}

	$data['encuentro'] = $this->evento->get_record($id_encuentro);

	$data['content'] = "detalle_encuentro";
	$this->load->view('front_layout', $data);


}








}//end class

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
