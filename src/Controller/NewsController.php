<?php

namespace HTR\Controller;

use HTR\DAO\DatabaseModel;

class NewsController
{
	public function __construct()
	{
	}

	public function cadastraDados($email)
	{
		$dataBase = new DatabaseModel();

		$include = $dataBase->addNews($email);

		return $include;
	}
}