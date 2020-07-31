<?php

class Curso extends CI_Controller {

	public function __construct(){
		//Carrega os models
		parent::__construct();
		$this->load->model('api_model');
	}

	//exibir curso
	public function exibir($id){
		$data = $this->api_model->getCursoById($id);

		//mostra detalhes do curso caso exista
		if(!empty($data)){
			$this->load->view('ver_curso', [
				"curso" => $data
			]);
		}else{
			//carrega pagina de curso nao encontrado
			$this->load->view('not_found', [
				"idCurso" => $id
			]);
		}
	}

}


?>