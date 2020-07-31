<?php

class Home extends CI_Controller {

	public function __construct(){
		//Carrega os models
		parent::__construct();
		$this->load->model('api_model');
	}

	public function index(){

		$data = $this->api_model->fetchAll();

		$this->load->view('home', [
			"cursos" => $data->result_array()
		]);
	}

	public function curso($id){
		$data = $this->api_model->getCursoById($id);

		if(!empty($data)){
			$this->load->view('ver_curso', [
				"curso" => $data
			]);
		}else{
			$this->load->view('not_found', [
				"idCurso" => $id
			]);
		}
	}

}


?>