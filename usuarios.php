<?php
include_once('./class/usuario.php');
$html["msg"] = "";

if (isset($_GET["eliminar"])){
    $user = (new Usuario)->buscarPorId($_GET["eliminar"])->eliminar();

    $html["msg"] = "The User '$user' has been deleted."; 
}

$html["users"]=(new Usuario)->listar();