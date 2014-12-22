<?php

class Evento extends CI_Model{

	public function __construct(){

	$this->load->database();

	}
	//all
	public function get_records($num,$start){
		$this->db->select()->from('eventos')->where('status', 0)->order_by('id','DESC')->limit($num,$start);
		return $this->db->get();

	}

	//all
	public function get_records_with_exclude($excludes, $num,$start){
		$this->db->select()
		->from('eventos')
		->where_not_in('id', $excludes)
		->where('status', 0)
		->order_by('id','ASC')
		->limit($num,$start);
		$query = $this->db->get();
		return $query->result();

	}

	//detail
	public function get_record($id){
		$this->db->where('id' ,$id);
		$this->db->limit(1);
		$c = $this->db->get('eventos');

		return $c->row();
	}

	//total rows
	public function count_rows(){
		$this->db->select('id')->from('eventos')->where('status', 0);
		$query = $this->db->get();
		return $query->num_rows();
	}

	//total rows
	public function count_rows_por_categoria($categoria){
		$this->db->select('id')->from('eventos')->where('status', 0)->where('categoria_id', $categoria);
		$query = $this->db->get();
		return $query->num_rows();
	}



	//add new
	public function add_record($data){
			$this->db->insert('eventos', $data);
	}


		//update
		public function update_record($id, $data){

			$this->db->where('id', $id);
			$this->db->update('eventos', $data);

		}

		//destroy
		public function delete_record(){

			$this->db->where('id', $this->uri->segment(4));
			$this->db->delete('eventos');
		}


		/*
		public function traer_nombre($id){
					$this->db->where('eventos_categoria_id' ,$id);
					$this->db->limit(1);
					$c = $this->db->get('eventos');

					return $c->row('nombre');
				}

		*/

}

?>
