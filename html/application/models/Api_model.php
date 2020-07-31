<?php
class Api_model extends CI_Model
{
	function __construct(){
		//Carrega o banco de dados
	    parent::__construct();
	    $this->load->database();
	}

	//retorna todos os cursos
	function fetchAll(){
		$this->db->select("c.*, ci.src as imagem_principal");
		$this->db->from("tbl_cursos as c");
		$this->db->join('tbl_curso_imagens as ci', 'ci.id_curso = c.id AND ci.principal = 1', 'LEFT');
		$this->db->order_by('c.id', 'DESC');
		return $this->db->get();
	}

	//retorna um curso pelo id
	function getCursoById($user_id){

		$this->db->select("c.*, ci.src as imagem_principal, ci.id as id_imagem_principal");
		$this->db->from("tbl_cursos as c");
		$this->db->join('tbl_curso_imagens as ci', 'ci.id_curso = c.id AND ci.principal = 1', 'LEFT');
		$this->db->where('c.id', $user_id);
		$query = $this->db->get('tbl_cursos');
		if($this->db->affected_rows()>0){
			$curso = $query->result_array()[0];	

			//Capturando as imagens desse curso 
			$this->db->select("src as imagem, principal, id");
			$this->db->where('id_curso', $curso["id"]);
			$imgs = $this->db->get('tbl_curso_imagens');
			$curso["imagens"] = $imgs->result_array();
			return $curso;
		}
	
		return [];
	}

}

?>