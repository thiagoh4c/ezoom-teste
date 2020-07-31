<?php

class Painel extends CI_Controller {

	public function __construct(){
		//Carrega os models
		parent::__construct();
		$this->load->model('painel_model');
        $this->load->library('session');
        $this->load->helper('url');
	}

	//retorna todos os cursos para a saida json
	public function index(){
 		$returnData = [];

 		if($this->input->get('error')){
 			$returnData["error"] = true;
 		}

 		//verifica se usuario esta logado
 		if($this->session->has_userdata("user_id")){

 			//se for deletar algum curso, na home
 			if($idDel = $this->input->get("deletar")){
 				$this->painel_model->deleteCurso($idDel);
 				$returnData["deleted"] = true;
 			}

 			$cursos = $this->painel_model->fetchAll();
 			$returnData["cursos"] = $cursos->result_array();

			$this->load->view('painel/home', $returnData);
 		}else{
			$this->load->view('painel/login', $returnData);
 		}
	}

	//editar curso
	public function editar($id){
		$returnData = [];

		if($this->input->post('titulo')){
			$titulo = $this->input->post('titulo');
			$descricao = $this->input->post('descricao');

			//faz upload das imagens, caso houver
		    $count = count($_FILES['imagens']['name']);
		    $images = [];

		    for($i=0;$i<$count;$i++){
		        if(!empty($_FILES['imagens']['name'][$i])){
					$_FILES['file']['name'] = $_FILES['imagens']['name'][$i];
					$_FILES['file']['type'] = $_FILES['imagens']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['imagens']['tmp_name'][$i];
					$_FILES['file']['error'] = $_FILES['imagens']['error'][$i];
					$_FILES['file']['size'] = $_FILES['imagens']['size'][$i];

					$config['upload_path'] = 'images/'; 
					$config['allowed_types'] = 'jpg|jpeg|png|gif';
					$config['max_size'] = '50000';
					$config['file_name'] = $_FILES['imagens']['name'][$i];

					$this->load->library('upload',$config); 

					if($this->upload->do_upload('file')){
						$uploadData = $this->upload->data();
						$filename = $uploadData['file_name'];
						$images[] = [
							"src" => $filename,
							"principal" => $i == 0 ? 1 : 0
						];
		            }else{
		            	$data['imageError'] =  $this->upload->display_errors();
		            }
		        }
		    }

			//redefine imagem principal do curso
			if($idImgPrincipal = $this->input->post('imagem_principal')){
				$this->painel_model->setImagemPrincipal($id, $idImgPrincipal);
			}

			//salva tudo
			$this->painel_model->editarCurso([
				"id"		=> $id,	
				"titulo" 	=> $titulo,
				"descricao" => nl2br($descricao),
				"imagens"	=> $images
			], true);
			$returnData["editado"] = true;
		}

		$curso = $this->painel_model->getCursoById($id);
		
		$returnData["editar"] = true; //para identificafr qual acao fazer na view
		$returnData["curso"]  = !empty($curso) ? $curso : false;
		
		$this->load->view('painel/editar-inserir', $returnData);
	}

	//inserir curso
	public function inserir(){
		$returnData = [];

		if($this->input->post('titulo')){
			$titulo = $this->input->post('titulo');
			$descricao = $this->input->post('descricao');


			//faz upload das imagens, caso houver
		    $count = count($_FILES['imagens']['name']);
		    $images = [];

		    for($i=0;$i<$count;$i++){
		        if(!empty($_FILES['imagens']['name'][$i])){
					$_FILES['file']['name'] = $_FILES['imagens']['name'][$i];
					$_FILES['file']['type'] = $_FILES['imagens']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['imagens']['tmp_name'][$i];
					$_FILES['file']['error'] = $_FILES['imagens']['error'][$i];
					$_FILES['file']['size'] = $_FILES['imagens']['size'][$i];

					$config['upload_path'] = 'images/'; 
					$config['allowed_types'] = 'jpg|jpeg|png|gif';
					$config['max_size'] = '50000';
					$config['file_name'] = $_FILES['imagens']['name'][$i];

					$this->load->library('upload',$config); 

					if($this->upload->do_upload('file')){
						$uploadData = $this->upload->data();
						$filename = $uploadData['file_name'];
						$images[] = [
							"src" => $filename,
							"principal" => $i == 0 ? 1 : 0
						];
		            }else{
		            	$data['imageError'] =  $this->upload->display_errors();
		            }
		        }
		    }

			//salva tudo
			$this->painel_model->editarCurso([
				"titulo" 	=> $titulo,
				"descricao" => nl2br($descricao),
				"imagens"	=> $images
			]);
			$returnData["editado"] = true;
		}

		$returnData["editar"] = false; //para identificafr qual acao fazer na view

		$this->load->view('painel/editar-inserir', $returnData);
	}
	
	//verifica os dados do login
	public function check(){
		$error = true;
		if(($username = $this->input->post('username')) && ($password = $this->input->post('password'))){
			if($user = $this->painel_model->getUser($username)){
				if($user["senha"] == $password){
					//usuário encontrado, registrando em sessão
					$this->session->set_userdata("user_id", $user["id"]);
					$error = false;
				}
			}
		}
		redirect("painel".($error ? '?error=incorrect' : ''));
	}


}


?>