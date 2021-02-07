<?php
header("Content-Type: application/json; charset=utf-8;");
require_once "../../vendor/autoload.php";

$cadController = new \HTR\Controller\CadController();

$news = $cadController->cadastraDados($_POST);

print_r(json_encode($news, JSON_UNESCAPED_UNICODE));

return $news;