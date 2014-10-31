<?php

class Nota extends CI_Model{

	public function __construct(){

	$this->load->database();

	}
	//all
	public function get_records($num,$start){
		$this->db->select()->from('notas')->where('status', 0)->order_by('id','ASC')->limit($num,$start);
		return $this->db->get();

	}

//all
public function get_records_by_cat($category, $num,$start){
	$this->db->select()->from('notas')->where('categoria_id', $category)->where('status', 0)->order_by('id','ASC')->limit($num,$start);
	$query = $this->db->get();
	return $query->result();
}

	//detail
	public function get_record($id){
		$this->db->where('id' ,$id);
		$this->db->limit(1);
		$c = $this->db->get('notas');

		return $c->row();
	}

	//total rows
	public function count_rows(){
		$this->db->select('id')->where('status', 0)->from('notas');
		$query = $this->db->get();
		return $query->num_rows();
	}

	//total rows by category
	public function count_rows_by_cat($category){
		$this->db->select('id')->where('status', 0)->where('categoria_id', $category)->from('notas');
		$query = $this->db->get();
		return $query->num_rows();
	}



		//add new
		public function add_record($data){ $this->db->insert('notas', $data);


	}


		//update
		public function update_record($id, $data){

			$this->db->where('id', $id);
			$this->db->update('notas', $data);

		}

		//destroy
		public function delete_record(){

			$this->db->where('id', $this->uri->segment(4));
			$this->db->delete('notas');
		}



	//update
	public function update_main($id, $data){

		$this->db->where('id', $id);
		$this->db->update('notas', $data);

	}

		/*
		public function traer_nombre($id){
					$this->db->where('notas_categoria_id' ,$id);
					$this->db->limit(1);
					$c = $this->db->get('notas');

					return $c->row('nombre');
				}

		*/

}

?>
