<?php

require "../config.php";
require "../libs/manager.php";

$controller = filter_input(INPUT_GET, "page") ?? "home";
$url = "../controllers/{$controller}Controller.php";

if(! file_exists($url)){
    $errorMessage = "Ce Contrôleur est introuvable";
    $url = "../controllers/404.php";
}
require $url;