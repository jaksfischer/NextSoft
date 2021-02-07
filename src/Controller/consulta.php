<?php
header("Content-Type: application/json; charset=utf-8;");
require_once "../../vendor/autoload.php";

$cadController = new \HTR\Controller\CadController();

$search = $cadController->consultaDados($_POST['cpf']);

print_r(json_encode($search, JSON_UNESCAPED_UNICODE));

return json_encode($search, JSON_UNESCAPED_UNICODE);
?>
