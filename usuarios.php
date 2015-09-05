<?php
include_once('./class/usuario.php');
$html["msg"] = "";
if (isset($_GET["agregar"])){
    $html["agregar"]=True;

}
if(isset($_POST["submit"])){
	$nick=$_POST["nick"];
	$pass=$_POST["pass"];
    $role=$_POST["role"];
    $options = [
    'cost' => 10,
    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
    ];
    
    $pass=password_hash($pass, PASSWORD_BCRYPT, $options);

    //$html["user"]= ["nick"=>$nick,"pass"=>$pass,"role"=>$role ];
    
	(new Usuario)->agregar($nick,$pass,$role);
    $html["user"] = NULL;
}


elseif (isset($_GET["eliminar"])){
    $user = (new Usuario)->buscarPorId($_GET["eliminar"]);
    $nick = $user->eliminar();
    $html["msg"] = "El usuario '$nick' ha sido eliminado."; 
}

$html["users"]=(new Usuario)->listar();