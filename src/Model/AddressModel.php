<?php

namespace HTR\Model;

class AddressModel
{
	private $id;
	private $cep;
    private $logradouro;
    private $numero;
    private $complemento;
    private $bairro;
    private $cidade;
    private $uf;
    private $tipo;

//    SETTERS
	public function setId($id) {
		$this->id = $id;
	}
	public function setCep($cep) {
		$this->cep = $cep;
	}
	public function setLogradouro($logradouro) {
		$this->logradouro = $logradouro;
	}
	public function setNumero($numero) {
		$this->numero = $numero;
	}
	public function setComplemento($complemento) {
		$this->complemento = $complemento;
	}
	public function setBairro($bairro) {
		$this->bairro = $bairro;
	}
	public function setCidade($cidade) {
		$this->cidade = $cidade;
	}
	public function setUf($uf) {
		$this->uf = $uf;
	}
	public function setTipo($tipo) {
		$this->tipo = $tipo;
	}

//	GETTERS
	public function getId() {
		return $this->id;
	}
	public function getCep() {
		return $this->cep;
	}
	public function getLogradouro() {
		return $this->logradouro;
	}
	public function getNumero() {
		return $this->numero;
	}
	public function getComplemento() {
		return $this->complemento;
	}
	public function getBairro() {
		return $this->bairro;
	}
	public function getCidade() {
		return $this->cidade;
	}
	public function getUf() {
		return $this->uf;
	}
	public function getTipo() {
		return $this->tipo;
	}

	public function setAddress() {
		return $this->setAddress($this->getLogradouro(), $this->getCep(), $this->getNumero(), $this->getComplemento(), $this->getBairro(), $this->getCidade(), $this->getEstado(), $this->getTipo());
	}
}
