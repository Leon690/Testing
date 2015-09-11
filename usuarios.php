<?php
include_once('./class/usuario.php');
$html["msg"] = "";

if (isset($_GET["eliminar"])){
    if((new Usuario)->buscarPorId($_SESSION['admin'])->role == true){
        $user = (new Usuario)->buscarPorId($_GET["eliminar"])->eliminar();

        $html["msg"] = "The User $user has been deleted."; 
    }
}

$html["users"]=(new Usuario)->listar();