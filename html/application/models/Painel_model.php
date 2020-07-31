<?php
$obj = &get_instance();
$obj->load->model('Api_model');

class Painel_model extends Api_model
{
	function __construct(){
		//Carrega o banco de dados
	    parent::__construct();
	    $this->load->database();
	}

	//retorna um usuario pelo username
	function getUser($username){

		$this->db->where('username', $username);
		$query = $this->db->get('tbl_users');
		if($this->db->affected_rows()>0){
			$user = $query->result_array()[0];	
			return $user;
		}
	
		return false;
	}

	//retorna um usuario pelo username
	function deleteCurso($id){

		$this->db->where('id', $id);
		$query = $this->db->delete('tbl_cursos');
		if($this->db->affected_rows()>0){
			return true;
		}
	
		return false;
	}

	//edita ou insere um novo curso
	function editarCurso($data, $editar=false){

		$this->db->set("titulo", 	$data["titulo"]);
		$this->db->set("descricao", $data["descricao"]);
		if($editar){
			$this->db->where('id', 		$data["id"]);	
			$query = $this->db->update('tbl_cursos');
		}else{
			$query = $this->db->insert('tbl_cursos');
			$data["id"] = $this->db->insert_id(); //define o id do curso para as imagens
		}
		if($this->db->affected_rows()>0){
			if(!empty($data["imagens"])){
				foreach($data["imagens"] as $img){

					$this->db->set("src", 		$img["src"]);
					$this->db->set("principal", $img["principal"]);
					$this->db->set("id_curso", 	$data["id"]);

					if(!isset($img["id"])){
						$this->db->insert("tbl_curso_imagens");
					}else{
						$this->db->where("id", $img["id"]);
						$this->db->update("tbl_curso_imagens");
					}
				}
			}
		}
	
		return false;
	}

	public function setImagemPrincipal($id, $idImg){

		//remove a imagem principal anterior
		$this->db->where('id_curso', $id);
		$this->db->set("principal", 0);
		$this->db->update('tbl_curso_imagens');

		$this->db->where('id', $idImg);
		$this->db->set("principal", 1);
		$this->db->update('tbl_curso_imagens');

		if($this->db->affected_rows()>0){
			return true;
		}
	
		return false;
	}

}

?>