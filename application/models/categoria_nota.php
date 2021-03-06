<?php

class Categoria_nota extends CI_Model{

	public function __construct(){

	$this->load->database();

	}
	//all
	public function get_records($num,$start){
		$this->db->select()->from('categorias_notas')->where('status', 0)->order_by('id','ASC')->limit($num,$start);
		return $this->db->get();

	}

	//all
	public function get_records_menu(){
		$this->db->select()->from('categorias_notas')->where('status', 0)->order_by('nombre','ASC');
		return $this->db->get();

	}

	//detail
	public function get_record($id){
		$this->db->where('id' ,$id);
		$this->db->limit(1);
		$c = $this->db->get('categorias_notas');

		return $c->row();
	}

	//detail
	public function get_by_slug($slug){
		$this->db->where('slug' ,$slug);
		$this->db->limit(1);
		$c = $this->db->get('categorias_notas');

		return $c->row('id'); 
	}

	//total rows
	public function count_rows(){
		$this->db->select('id')->where('status', 0)->from('categorias_notas');
		$query = $this->db->get();
		return $query->num_rows();
	}



		//add new
		public function add_record($data){ $this->db->insert('categorias_notas', $data);


	}


		//update
		public function update_record($id, $data){

			$this->db->where('id', $id);
			$this->db->update('categorias_notas', $data);

		}

		//destroy
		public function delete_record(){

			$this->db->where('id', $this->uri->segment(4));
			$this->db->delete('categorias_notas');
		}



		public function traer_nombre($id){
			$this->db->where('id' ,$id);
			$this->db->limit(1);
			$c = $this->db->get('categorias_notas');

			return $c->row('nombre');
		}



}

?>
