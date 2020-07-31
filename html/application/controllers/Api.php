<?php
//Controller para gerenciamento da api

class Api extends CI_Controller {

	//hash para validar as requisições da api
	private $hashToken = "0ecaeb07630103cbcd204a3f962b493f";

	public function __construct(){
		//Carrega os models
		parent::__construct();
		$this->load->model('api_model');
	}

	//valida o token enviado do client
	private function validateToken(){
		$headers = $this->input->request_headers();

		if(!isset($headers["token"])){
			echo "Missing token";
			exit;
		}

		if($headers["token"] != $this->hashToken){
			echo "Invalid token";
			exit;
		}
	}

	//retorna todos os cursos para a saida json
	function getCursos(){
 		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: *");
		header('Content-Type: application/json');

		$this->validateToken();

		$data = $this->api_model->fetchAll();
		$data = $data->result_array();
		for($i=0;$i<count($data);$i++){
			$data[$i]["imagem_principal"] = base_url("images/".$data[$i]["imagem_principal"]);
		}
		echo json_encode($data);
	}
	
	//retorna um curso pelo id para a saida json
	function getCursoById($id){

 		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: *");
		header('Content-Type: application/json');
		$this->validateToken();
		if($id){
			$data = $this->api_model->getCursoById($id);
			$data["imagem_principal"] = base_url("images/".$data["imagem_principal"]);
			for($i=0;$i<count($data["imagens"]);$i++){
				$data["imagens"][$i]["imagem"] = base_url("images/".$data["imagens"][$i]["imagem"]);
			}
			echo json_encode($data);
		}
	}

}


?>