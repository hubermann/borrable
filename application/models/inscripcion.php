<?php

class Inscripcion extends CI_Model{

  public function __construct(){

  $this->load->database();
  $this->load->model('evento');
  $this->load->model('modulo');


  }
  //all
  public function get_records($num,$start){
    $this->db->select()->from('inscripciones')
    ->where('status', 0)->group_by('id','ASC')
    ->limit($num,$start);
    return $this->db->get();

  }


  //detail
  public function get_record($id){
    $this->db->where('id' ,$id);
    $this->db->limit(1);
    $c = $this->db->get('inscripciones');

    return $c->row();
  }

  //total rows
  public function count_rows(){
    $this->db->select('id')->where('status', 0)->from('inscripciones');
    $query = $this->db->get();
    return $query->num_rows();
  }



    //add new
    public function add_record($data){
      $this->db->insert('inscripciones', $data);
  }


    //update
    public function update_record($id, $data){

      $this->db->where('id', $id);
      $this->db->update('inscripciones', $data);

    }

    //destroy
    public function delete_record(){

      $this->db->where('id', $this->uri->segment(4));
      $this->db->delete('inscripciones');
    }


    /*
    public function traer_nombre($id){
          $this->db->where('inscripciones_categoria_id' ,$id);
          $this->db->limit(1);
          $c = $this->db->get('inscripciones');

          return $c->row('nombre');
        }

    */

}

?>
