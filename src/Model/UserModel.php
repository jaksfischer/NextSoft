<?php

namespace HTR\Model;

class UserModel
{
	private $id;
    private $idUser;
    private $nome;
    private $cpf;
    private $email;
    private $telefone;

//    SETTERS
	public function setId($id) {
		$this->id = $id;
	}
	public function setIdUser($idUser) {
		$this->idUser = $idUser;
	}
	public function setNome($nome) {
		$this->nome = $nome;
	}
	public function setCpf($cpf) {
		$this->cpf = $cpf;
	}
	public function setEmail($email) {
		$this->email = $email;
	}
	public function setTelefone($telefone) {
		$this->telefone = $telefone;
	}

//	GETTERS
	public function getId() {
		return $this->id;
	}
	public function getIdUser() {
		return $this->idUser;
	}
	public function getNome() {
		return $this->nome;
	}
	public function getCpf() {
		return $this->cpf;
	}
	public function getEmail() {
		return $this->email;
	}
	public function getTelefone() {
		return $this->telefone;
	}

	public function setUser() {
		return $this->setUser($this->getIdUser(), $this->getNome(), $this->getCpf(), $this->getEmail(), $this->getTelefone());
	}
}
