<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eventos extends CI_Controller {

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
    'video','usuario', 'inscripcion'
    ));
    $this->load->model('pais');
    $this->load->model('categoria_evento');
    $this->load->model('speaker');
    $this->load->model('sponsor');
  }


  public function inscripcion(){

    $inscripto = array(
      'nombre' => $this->input->post('nombre'),
     'apellido' => $this->input->post('apellido'),
     'documento' => $this->input->post('documento'),
     'telefono' => $this->input->post('telefono'),
     'mail' => $this->input->post('mail'),
    );
    #save
    $this->inscripto->add_record($inscripto);
    $this->session->set_flashdata('success', 'nota creado. <a href="notas/detail/'.$this->db->insert_id().'">Ver</a>');
    redirect('control/notas', 'refresh');


  }
}
