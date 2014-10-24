<?php

class Imagenes_nota extends CI_Model{

	public function __construct(){

	$this->load->database();

	}
	//all
	public function get_records($num,$start){
		$this->db->select()->from('imagenes_notas')->where('status', 0)->limit($num,$start);
		return $this->db->get();

	}



	function view_all($id){
		$this->db->where('nota_id', $id);
		return  $this->db->get('imagenes_notas');


		}

	//all by publiccacion
	public function imagenes_nota($id_nota){
		$this->db->select()->from('imagenes_notas')->where('nota_id',$id_nota);
		return $this->db->get();

	}

	//detail
	public function get_record($id){
		$this->db->where('id' ,$id);
		$this->db->limit(1);
		$c = $this->db->get('imagenes_notas');

		return $c->row();
	}

	public function get_records_menu(){
			$this->db->select()->from('imagenes_notas')->order_by('id','ASC');
			return $this->db->get();

		}

	//total rows
	public function count_rows(){
		$this->db->select('id')->where('status', 0)->from('imagenes_notas');
		$query = $this->db->get();
		return $query->num_rows();
	}



		//add new
		public function add_record($data){
		$this->db->insert('imagenes_notas', $data);
		}


		//update
		public function update_record($id, $data){

			$this->db->where('id', $id);
			$this->db->update('imagenes_notas', $data);

		}

		//destroy
		public function delete_record($id_imagen){

			$this->db->where('id', $id_imagen);
			$this->db->delete('imagenes_notas');
		}


		public function traer_nombre($id){
			$this->db->where('id' ,$id);
			$this->db->limit(1);
			$c = $this->db->get('imagenes_notas');
			return $c->row('filename');
		}



}


?>
