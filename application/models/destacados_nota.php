<?php

class Destacados_Nota extends CI_Model{

	public function __construct(){

	$this->load->database();

	}


	//detail
	public function get_destacado_principal(){
		$this->db->select('destacado_principal');
		$c = $this->db->get('destacados_notas');
		return $c->row('destacado_principal');
	}
	//detail
	public function get_destacado_secundario_1(){
		$this->db->select('destacado_secundario_1');
		$c = $this->db->get('destacados_notas');

		return $c->row('destacado_secundario_1');
	}

	public function get_destacado_secundario_2(){
		$this->db->select('destacado_secundario_2');
		$c = $this->db->get('destacados_notas');
		return $c->row();
	}

	public function get_destacado_secundario_3(){
		$this->db->select('destacado_secundario_3');
		$c = $this->db->get('destacados_notas');
		return $c->row();
	}

	public function get_destacado_secundario_4(){
		$this->db->select('destacado_secundario_4');
		$c = $this->db->get('destacados_notas');
		return $c->row();
	}

	//update
	public function update_destacado_principal($nuevo_destacado){
		if(!empty($nuevo_destacado)){
			$this->db->query("UPDATE destacados_notas SET destacado_principal = $nuevo_destacado");
		}

	}
	public function update_destacado_secundario_1($nuevo_destacado){
		if(!empty($nuevo_destacado)){
			$this->db->query("UPDATE destacados_notas SET destacado_secundario_1 = $nuevo_destacado");
		}

	}

	public function update_destacado_secundario_2($nuevo_destacado){
		if(!empty($nuevo_destacado)){
			$this->db->query("UPDATE destacados_notas SET destacado_secundario_2 = $nuevo_destacado");
		}

	}

	public function update_destacado_secundario_3($nuevo_destacado){
		if(!empty($nuevo_destacado)){
			$this->db->query("UPDATE destacados_notas SET destacado_secundario_3 = $nuevo_destacado");
		}

	}

	public function update_destacado_secundario_4($nuevo_destacado){
		if(!empty($nuevo_destacado)){
			$this->db->query("UPDATE destacados_notas SET destacado_secundario_4 = $nuevo_destacado");
		}

	}

	public function update_destacado_sin_destacar($id_nota){
		if(!empty($id_nota)){

			$destacado_principal = $this->get_destacado_principal();
			$destacado_secundario_1 = $this->get_destacado_secundario_1();
			$destacado_secundario_2 = $this->get_destacado_secundario_2();
			$destacado_secundario_3 = $this->get_destacado_secundario_3();
			$destacado_secundario_4 = $this->get_destacado_secundario_4();

			//si es destacada como principal
			if($destacado_principal == $id_nota){
				$this->db->query("UPDATE destacados_notas SET destacado_principal = 0");
			}

			//si es destacada como sec 1
			if($destacado_secundario_1 == $id_nota){
				$this->db->query("UPDATE destacados_notas SET destacado_secundario_1 = 0");
			}

			//si es destacada como sec 2
			if($destacado_secundario_2 == $id_nota){
				$this->db->query("UPDATE destacados_notas SET destacado_secundario_2 = 0");
			}

			//si es destacada como sec 3
			if($destacado_secundario_3 == $id_nota){
				$this->db->query("UPDATE destacados_notas SET destacado_secundario_3 = 0");
			}

			//si es destacada como sec 4
			if($destacado_secundario_4 == $id_nota){
				$this->db->query("UPDATE destacados_notas SET destacado_secundario_4 = 0");
			}


		}//end if $id_nota

	}


}

?>
