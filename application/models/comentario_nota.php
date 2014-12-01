<?php

class Comentario_nota extends CI_Model{

	public function __construct(){

	$this->load->database();

	}
	//all
	public function get_records($num,$start){
		$this->db->select()->from('comentarios_notas')->where('status', 0)->order_by('id','ASC')->limit($num,$start);
		return $this->db->get();

	}

	//all
	public function get_by_nota($nota_id,$limite){
		$this->db->select()->from('comentarios_notas')
		->where('status', 0)
		->where('nota_id', $nota_id)
		->order_by('id','ASC')
		->limit($limite);
		$x = $this->db->get();
		return $x->result();

	}

	//detail
	public function get_record($id){
		$this->db->where('id' ,$id);
		$this->db->limit(1);
		$c = $this->db->get('comentarios_notas');

		return $c->row();
	}

	//total rows
	public function count_rows(){
		$this->db->select('id')->where('status', 0)->from('comentarios_notas');
		$query = $this->db->get();
		return $query->num_rows();
	}



		//add new
		public function add_record($data){ $this->db->insert('comentarios_notas', $data);


	}


		//update
		public function update_record($id, $data){

			$this->db->where('id', $id);
			$this->db->update('comentarios_notas', $data);

		}

		//destroy
		public function delete_record(){

			$this->db->where('id', $this->uri->segment(4));
			$this->db->delete('comentarios_notas');
		}


		/*
		public function traer_nombre($id){
					$this->db->where('comentarios_notas_categoria_id' ,$id);
					$this->db->limit(1);
					$c = $this->db->get('comentarios_notas');

					return $c->row('nombre');
				}

		*/

}

?>
