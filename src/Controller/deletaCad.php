<?php
header("Content-Type: application/json; charset=utf-8;");
require_once "../../vendor/autoload.php";

$cadController = new \HTR\Controller\CadController();

$edita = $cadController->deletaCad($_POST);

print_r(json_encode($edita, JSON_UNESCAPED_UNICODE));

return json_encode($edita, JSON_UNESCAPED_UNICODE);
?>
