<?php
include_once('./class/admin.php');
$html["msg"] = "";
if (isset($_GET["agregaradmin"])){
    $html["agregaradmin"]=True;

}
if(isset($_POST["submit"])){
	$nick=$_POST["nick"];
	$pass=$_POST["pass"];
    $options = [
    'cost' => 10,
    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
    ];
    
    $pass=password_hash($pass, PASSWORD_BCRYPT, $options);

    //$html["user"]= ["nick"=>$nick,"pass"=>$pass,"role"=>$role ];
    
	(new Admin)->agregar($nick,$pass);
    $html["user"] = NULL;
}


elseif (isset($_GET["eliminar"])){
    $user = (new Admin)->buscarPorId($_GET["eliminar"])->eliminar();
    //$nick = $user->eliminar();
    $html["msg"] = "The User '$user' has been deleted."; 
}

$html["users"]=(new Admin)->listar();