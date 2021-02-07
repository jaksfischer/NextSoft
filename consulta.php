<?php
header("Content-Type: application/json; charset=utf-8;");
require_once "vendor/autoload.php";

$cadController = new \HTR\Controller\CadController();

$search = $cadController->consultaDados($_POST['cpf']);
$cad = $_POST;

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<title>Consulta - NextSoft</title>
	<link rel="shortcut icon" href="img/favicon.png"/>
	<link rel="stylesheet" href="css/style.css">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
	      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<!-- Font Awesome -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

</head>
</head>

<body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

<div class="container">
	<div class="nav">
		<div class="col-md-12">
			<h2 class="text-center">Consulta de cadastro</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">

		</div>
		<div class="col-md-8">
			<form method="POST">

				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="inputGroup-sizing-cpf">CPF</span>
					</div>
					<input type="text" class="form-control" aria-label="Insira seu CPF"
					       aria-describedby="inputGroup-sizing-cpf" name="cpf">
				</div>
				<button type="button" class="btn btn-primary cad-click" data-toggle="modal" name="envia" id="envia">
					Consultar
				</button>
			</form>
		</div>
	</div>
	<div class="container">
		<h3>Usuário</h3>
		<div class="row align-center">
			<div class="col-md-1 border">
				ID
			</div>
			<div class="col-md-1 border">
				User ID
			</div>
			<div class="col-md-2 border">
				Nome
			</div>
			<div class="col-md-2 border">
				Email
			</div>
			<div class="col-md-2 border">
				CPF
			</div>
			<div class="col-md-2 border">
				Telefone
			</div>
			<div class="col-md-2 border">
				Ação
			</div>
		</div>
		<div class="row modal-content">
			<div class="col-md-1 border">
				<?php echo $search['user']['Id']; ?>
			</div>
			<div class="col-md-1 border">
				<?php echo $search['user']['IdUser']; ?>
			</div>
			<div class="col-md-2 border">
				<?php echo $search['user']['Nome']; ?>
			</div>
			<div class="col-md-2 border">
				<?php echo $search['user']['Email']; ?>
			</div>
			<div class="col-md-2 border">
				<?php echo $search['user']['Cpf']; ?>
			</div>
			<div class="col-md-2 border">
				<?php echo $search['user']['Telefone']; ?>
			</div>
			<div class="col-md-2 border">
				<i class="fa fa-address-card icon-index" aria-hidden="true"></i> - <i class="fa fa-trash-alt"></i>
			</div>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>

<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

<!-- JS Cadastro -->
<script src="assets/js/consulta.js"></script>
</body>
</html>