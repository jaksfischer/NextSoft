<?php

namespace HTR\Model;

class BancoDAO
{
	protected $mysqli;

	public function __construct(){
		$this->conexao();
	}

	private function conexao(){
		$this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO , BD_SENHA, BD_BANCO);
	}

	public function setEstadio($dados){
		$stmt = $this->mysqli->prepare("INSERT INTO estadio (`id_estadio`, `nome`, `pais`, `cidade`, `estado`) VALUES (?,?,?,?,?)");
		$stmt->bind_param("sssss",$dados->id,$dados->nome,$dados->pais,$dados->cidade,$dados->estado);
		if( $stmt->execute() == TRUE){
			return true ;
		}else{
			return false;
		}

	}
}
