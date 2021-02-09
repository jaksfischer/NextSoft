<?php

namespace HTR\DAO;

use HTR\Model\UserModel;
use HTR\Model\AddressModel;

class DatabaseModel
{
	protected $mysqli;

	public function __construct()
	{
		$this->conexao();
	}

	private function conexao()
	{
		$this->mysqli = new \mysqli("localhost", "root", "", "nextsoft");
	}

	public function addCadastro($dados)
	{

		$cpf = $dados['cpf'];
		$verifica = $this->mysqli->query("SELECT * FROM users WHERE cpf = '$cpf'");
		if(mysqli_num_rows($verifica) > 0)
		{
			$reg = mysqli_fetch_object($verifica);

			$select = $this->mysqli->query("SELECT idUser, tipo FROM address WHERE idUser = '$reg->idUser'");

			$userData = mysqli_fetch_all($select);

			if(count($userData) <= 3) {
				foreach ($userData as $one) {
					if($one[1] == $dados['tipo']) {
						$return["status"] = 400;
						$return["message"] =  "Já existe um cadastro para o tipo <strong>" . $dados['tipo']. "</strong>.";
						return $return;
						break;
					} else {
						$newReg = true;
					}
				}
			}

		}

		if($newReg == true) {


			$address = new AddressModel();

			$address->setId($userData[0][0]);
			$address->setCep($dados['cep']);
			$address->setLogradouro($dados['logradouro']);
			$address->setNumero($dados['numero']);
			$address->setComplemento($dados['complemento']);
			$address->setCidade($dados['cidade']);
			$address->setBairro($dados['bairro']);
			$address->setUf($dados['uf']);
			$address->setTipo($dados['tipo']);


			$stmt2 = $this->mysqli->prepare("INSERT INTO address (`idUser`, `logradouro`, `cep`,`numero`, `complemento`, `bairro`, `cidade`, `estado`, `tipo`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
			$stmt2->bind_param("sssssssss", $address->getId(), $address->getLogradouro(), $address->getCep(), $address->getNumero(), $address->getComplemento(), $address->getBairro(), $address->getCidade(), $address->getUf(), $address->getTipo());

			if($stmt2->execute() == TRUE)
			{
				$return["status"]= 200;
				$return["message"] = "Seu cadastro foi adicionado em nossa base, com sucesso!";
				return $return;
			} else {
				$return["status"]= 400;
				$return["message"] = "Erro no SQL!";
				$return["erro"] = "Erro: " . mysqli_error();
				return $return;
			}
		}

		$searchLastId = $this->mysqli->query("SELECT MAX(id) as id FROM users");
		$lastIdSearched = mysqli_fetch_object($searchLastId);

		$newId = $this->mysqli->query("SELECT idUser FROM users WHERE id = '$lastIdSearched->id'");

		$maxIdUser = mysqli_fetch_object($newId);

		$user = new UserModel();

		$user->setIdUser($maxIdUser->idUser + 1);
		$user->setNome($dados['nome']);
		$user->setCpf($dados['cpf']);
		$user->setTelefone($dados['telefone']);
		$user->setEmail($dados['email']);

		$stmt = $this->mysqli->prepare("INSERT INTO users (`idUser`, `nome`, `cpf`, `email`, `telefone`) VALUES (?, ?, ?, ?, ?)");
		$stmt->bind_param("sssss", $user->getIdUser() ,$user->getNome(), $user->getCpf(), $user->getEmail(), $user->getTelefone());

		if($stmt->execute() == TRUE)
		{
			$lastId = $stmt->insert_id;
		} else {
			$return["status"]= 400;
			$return["message"] = "Erro no SQL!";
			return $return;
		}

		$address = new AddressModel();

		$address->setCep($dados['cep']);
		$address->setLogradouro($dados['logradouro']);
		$address->setNumero($dados['numero']);
		$address->setComplemento($dados['complemento']);
		$address->setCidade($dados['cidade']);
		$address->setBairro($dados['bairro']);
		$address->setUf($dados['uf']);
		$address->setTipo($dados['tipo']);


		$stmt2 = $this->mysqli->prepare("INSERT INTO address (`idUser`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `tipo`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt2->bind_param("ssssssss", $lastId, $address->getLogradouro(), $address->getNumero(), $address->getComplemento(), $address->getBairro(), $address->getCidade(), $address->getUf(), $address->getTipo());

		if($stmt2->execute() == TRUE)
		{
			$return["status"]= 200;
			$return["message"] = "Seu cadastro foi adicionado em nossa base, com sucesso!";
			return $return;
		} else {
			$return["status"]= 400;
			$return["message"] = "Erro no SQL!";
			$return["erro"] = "Erro: " . mysqli_error();
			return $return;
		}
	}

	public function buscaCadastro($cpf) {
		$buscaCad = $this->mysqli->query("SELECT idUser FROM users WHERE cpf = '$cpf'");
		$idUser = mysqli_fetch_object($buscaCad);

		$buscaCad = $this->mysqli->query("SELECT * FROM users INNER JOIN address ON users.idUser = address.idUser WHERE address.idUser = '$idUser->idUser'");

		if(mysqli_num_rows($buscaCad) == 0) {
			$return['status'] = 400;
			$return['message'] = "Este CPF não está cadastrado em nossa base.";

			return $return;
		}

		foreach ($buscaCad as $key=>$one) {

			$user['Id'] = $one['id'];
			$user['IdUser'] = $one['idUser'];
			$user['Nome'] = $one['nome'];
			$user['Cpf'] = $one['cpf'];
			$user['Email'] = $one['email'];
			$user['Telefone'] = $one['telefone'];

			$address['idUser'] = $one['idUser'];
			$address['Logradouro'] = $one['logradouro'];
			$address['Cep'] = $one['cep'];
			$address['Numero'] = $one['numero'];
			$address['Complemento'] = $one['complemento'];
			$address['Bairro'] = $one['bairro'];
			$address['Cidade'] = $one['cidade'];
			$address['Uf'] = $one['estado'];
			$address['Tipo'] = $one['tipo'];

			$cadastro['status'] = 200;
			$cadastro['qtdreg'] = $buscaCad->num_rows;
			$cadastro['user'] = $user;
			$cadastro['address'][$key] = $address;
		}

		return $cadastro;
	}

	public function procurarCadastro($id, $tipo) {
		if(!$id || !$tipo) {
			return "Ocorreu um erro, tente novamente.";
		}

		$retornoDados = $this->mysqli->query("SELECT * FROM address WHERE id = '$id' AND tipo = '$tipo'");

		return mysqli_fetch_object($retornoDados);

	}

	public function editarCadastro($dados) {

		$address = new AddressModel();

		$id = $dados['id'];
		$cep = $dados['cep'];
		$logradouro = $dados['logradouro'];
		$numero = $dados['numero'];
		$complemento = $dados['complemento'];
		$bairro = $dados['bairro'];
		$cidade = $dados['cidade'];
		$estado = $dados['estado'];
		$tipo = $dados['tipo'];

		$teste = $this->mysqli->query("UPDATE `address` SET `logradouro`='$logradouro',`cep`='$cep',`numero`='$numero',`complemento`='$complemento',`bairro`='$bairro',`cidade`='$cidade',`estado`='$estado',`tipo`='$tipo' WHERE `idUser` = '$id'");

		if(!$teste) {
			$return['status'] = 400;
			$return['message'] = "Ocorreu um erro durante a tentativa de salvar os dados.";

			return $return;
		} else {
			$return['status'] = 200;
			$return['message'] = "Dados gravados com sucesso.";

			return $return;
		}
	}

	public function deletarCad($id, $tipo) {

		$deleta = $this->mysqli->query("DELETE FROM address WHERE idUser = '$id' AND tipo = '$tipo'");

		if(!$deleta) {
			$return['status'] = 400;
			$return['message'] = "Ocorreu um erro, tente novamente.";

			return $return;
		} else {
			$return['status'] = 200;
			$return['message'] = "Dado deletado com sucesso.";

			return $return;
		}
	}
}