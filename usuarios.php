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
    if (strlen($nick) < 5){
        $html["msg"] = "El usuario debe tener mas de 4 caracteres";
    }
    elseif ((strlen($pass) < 5 ) or  (ctype_alpha($pass))){
        // porque no me toma el salto de linea?
        $html["msg"] = $html["msg"] . "\r\n" .PHP_EOL. "El password debe tener mas de 4 caracteres y tener caracteres alfanumericos";
    }
    else{
	   (new Usuario)->agregar($nick,$pass);
       $html["user"] = NULL;
    }

}
elseif (isset($_GET["eliminar"])){
    $user = (new Usuario)->buscarPorId($_GET["eliminar"]);
    $nick = $user->eliminar();
    $html["msg"] = "El usuario '$nick' ha sido eliminado."; 
}

$html["users"]=(new Usuario)->listar();