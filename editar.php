<?php
require "vendor/autoload.php";

use HTR\DAO\DatabaseModel;

$id = $_GET['id'];
$tipo = $_GET['tipo'];

$procurarCadastro = new DatabaseModel();

$data = $procurarCadastro->procurarCadastro($id, $tipo);

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Edição de cadastro</title>
    <link rel="shortcut icon" href="img/favicon.png"/>

    <!--    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"/>
</head>
<body>
<div class="container">
    <div class="nav">
        <h3>Edição de tipo de cadastro</h3>
    </div>
    <div class="row">
        <div class="col-md-5">
        <form method="post">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-cep">CEP</span>
                </div>
                <input type="text" class="form-control" aria-label="CEP"
                       aria-describedby="inputGroup-sizing-cep" name="cep" value="<?php echo $data->cep; ?>">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-bairro">Bairro</span>
                </div>
                <input type="text" class="form-control" aria-label="Bairro"
                       aria-describedby="inputGroup-sizing-bairro" name="bairro" value="<?php echo $data->bairro; ?>">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-complemento">Complemento</span>
                </div>
                <input type="text" class="form-control" aria-label="Complemento"
                       aria-describedby="inputGroup-sizing-complemento" name="complemento" value="<?php echo $data->complemento; ?>">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-logradouro">Logradouro</span>
                </div>
                <input type="text" class="form-control" aria-label="Logradouro"
                       aria-describedby="inputGroup-sizing-logradouro" name="logradouro" value="<?php echo $data->logradouro; ?>">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-numero">Numero</span>
                </div>
                <input type="text" class="form-control" aria-label="Numero"
                       aria-describedby="inputGroup-sizing-logradouro" name="numero" value="<?php echo $data->numero; ?>">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-cidade">Cidade</span>
                </div>
                <input type="text" class="form-control" aria-label="Cidade"
                       aria-describedby="inputGroup-sizing-logradouro" name="cidade" value="<?php echo $data->cidade; ?>">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-estado">Estado</span>
                </div>
                <input type="text" class="form-control" aria-label="Estado"
                       aria-describedby="inputGroup-sizing-logradouro" name="estado" value="<?php echo $data->estado; ?>">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-tipo">Tipo</span>
                </div>
                <input type="text" class="form-control" aria-label="Tipo"
                       aria-describedby="inputGroup-sizing-logradouro" name="tipo" value="<?php echo $data->tipo; ?>">
            </div>
            <br/>
            <input type="hidden" name="id" value="<?php echo $data->id ?>">
            <button type="button" class="edit-reg btn btn-primary">Editar</button>
        </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 msg">

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- JS Cadastro -->
<script src="assets/js/deleta.js"></script>
</body>
</html>