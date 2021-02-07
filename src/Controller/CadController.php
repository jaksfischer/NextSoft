<?php

	namespace HTR\Controller;

	use HTR\DAO\DatabaseModel;

	class CadController
	{
		public function __construct()
		{
		}

		public function cadastraDados($dados)
		{
			header('Content-Type: application/json');
			$dataBase = new DatabaseModel();

			$validate = $this->validaDados($dados);

			if($validate == false)
			{
				$return["status"]= 400;
				$return["message"]= "Os campos marcados com * deverão ser preenchidos.";
				return $return;
			}

			$include = $dataBase->addCadastro($dados);

			return $include;
		}

		public function validaDados($dados)
		{
			$valida = [];
			if($dados['cpf'] == "")
			{
				return false;
			}
			if($dados['telefone'] == "")
			{
				return false;
			}
			if($dados['email'] == "")
			{
				return false;
			}
			if($dados['cep'] == "")
			{
				return false;
			}
			if($dados['numero'] == "")
			{
				return false;
			}
			if($dados['cidade'] == "")
			{
				return false;
			}
			if($dados['uf'] == "")
			{
				return false;
			}
			if($dados['tipo'] == "")
			{
				return false;
			}

			return true;
		}

		public function consultaDados($cpf) {
			if(!$cpf) {
				$return['status'] = 400;
				$return['message'] = "É necessário digitar um CPF para poder continuar.";
				return $return;
			}

			$database = new DatabaseModel();

			$cadastro = $database->buscaCadastro($cpf);

			return $cadastro;
		}

		public function editaCad($dados) {
			if(!$dados) {
				$return['status'] = 400;
				$return['message'] = "Ocorreu um erro, tente novamente.";

				return $return;
			}

			$edita = new DatabaseModel();

			$query = $edita->editarCadastro($dados);

			return $query;

		}

		public function deletaCad($dados) {
			if(!$dados) {
				$return['status'] = 400;
				$return['message'] = "Ocorreu um erro, tente novamente.";

				return $return;
			}

			$bd = new DatabaseModel();

			$excluir = $bd->deletarCad();

			return $excluir;
		}
	}