<?php  

class Speaker extends CI_Model{

	public function __construct(){

	$this->load->database();

	}
	//all
	//all
	public function get_records($id_evento){
		$this->db->select()->from('speakers')
		->where('status',0)
		->where('evento_id', $id_evento)
		->order_by('id','ASC');
		return $this->db->get();

	}

	//detail
	public function get_record($id){
		$this->db->where('id' ,$id);
		$this->db->limit(1);
		$c = $this->db->get('speakers');

		return $c->row(); 
	}
	
	//total rows
	public function count_rows(){ 
		$this->db->select('id')->from('speakers');
		$query = $this->db->get();
		return $query->num_rows();
	}



		//add new
		public function add_record($data){ $this->db->insert('speakers', $data);
				

	}


		//update
		public function update_record($id, $data){

			$this->db->where('id', $id);
			$this->db->update('speakers', $data);

		}

		//destroy
		public function delete_record(){

			$this->db->where('id', $this->uri->segment(4));
			$this->db->delete('speakers');
		}


		/*
		public function traer_nombre($id){
					$this->db->where('speakers_categoria_id' ,$id);
					$this->db->limit(1);
					$c = $this->db->get('speakers');

					return $c->row('nombre'); 
				}
		
		*/

}

?>