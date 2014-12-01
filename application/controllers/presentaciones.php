<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Presentaciones extends CI_Controller {

    public function __construct(){
      parent::__construct();
      $this->load->helper('url');
      $this->load->helper('form');
      $this->load->library('session');
      $this->load->library('form_validation');

    }


  public function EncuentroHayGroup(){
    $data['presentacion_titulo'] = "Encuentro Hay Group";
    $data['presentacion_file'] = "Comunidad-RH_EncuentroHayGroup.pdf";
    $this->load->view('presentaciones', $data);
  }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
