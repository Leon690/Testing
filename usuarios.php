<?php
include_once('./class/usuario.php');
$html["msg"] = "";
if (isset($_GET["agregar"])){
    $html["agregar"]=True;

}
if(isset($_POST["submit"])){
	$nick=$_POST["nick"];
	$pass=$_POST["pass"];
    $html["user"]= ["nick"=>$nick,"pass"=>$pass ];
    
	   (new Usuario)->agregar($nick,$pass);
       $html["user"] = NULL;
    }


elseif (isset($_GET["eliminar"])){
    $user = (new Usuario)->buscarPorId($_GET["eliminar"]);
    $nick = $user->eliminar();
    $html["msg"] = "El usuario '$nick' ha sido eliminado."; 
}

$html["users"]=(new Usuario)->listar();