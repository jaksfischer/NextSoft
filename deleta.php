<?php
require "vendor/autoload.php";
$post = $_POST;
$id = $_GET['id'];
$tipo = $_GET['tipo'];

$db = new \HTR\DAO\DatabaseModel();

$deleta = $db->deletarCad($id, $tipo);

if($deleta['status'] == 400) {
	echo "<script>
			alert('Ocorreu um erro, tente novamente.')
			window.location.href = 'consultar.html'
			</script>";
} else {
	echo "<script>
			alert('Dado deletado com sucesso.')
			window.location.href = 'consultar.html'
			</script>";
}

?>