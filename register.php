<?php
include_once('./class/usuario.php');
$html["msg"] = "";
if (isset($_GET["agregar"])){
    $html["agregar"]=True;
}

if(isset($_POST["submit"])){
    if ((new Usuario)->buscarUsuario($_POST['nick'])->id == NULL){
        (new Usuario)->agregar($_POST['nick'],md5($_POST['pass']),false);
        $html["msg"] = "The User has been created.";
    }else{
        $html['error']= "THIS NAME IS ALREADY IN USE";

    }
}
