<?php
include_once('./class/usuario.php');



if(isset($_POST["submit"])){
	$user=$_POST["nick"];
	$pass=$_POST["pass"];
	(new Usuario)->agregar($user,$pass);
}
$html["usuarios"]=(new Usuario)->listar();
