<?php
include_once('./class/usuario.php');
$html["msg"] = "";
if (isset($_GET["agregar"])){
    $html["agregar"]=True;
}
(new Usuario)->buscarUsuario($_POST['nick']);
if(isset($_POST["submit"])){
    if ((new Usuario)->buscarUsuario($_POST['nick'])->id == NULL){
    	   (new Usuario)->agregar($_POST['nick'],md5($_POST['pass']),$_POST['role']);
    }else{
        $html['error']= "el usuario ya existe";

        }
}


elseif (isset($_GET["eliminar"])){
    $user = (new Usuario)->buscarPorId($_GET["eliminar"])->eliminar();
    //$nick = $user->eliminar();
    $html["msg"] = "The User '$user' has been deleted."; 
}

$html["users"]=(new Usuario)->listar();