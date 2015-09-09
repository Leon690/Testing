<?php
    include_once('./class/usuario.php');

    if (isset($_SESSION['admin'])){
        $_SESSION['admin'] = NULL;
        $html['admin'] = NULL;
    }
    if (isset($_POST["login"])){
        $admin = (new Usuario)->buscarUsuario($_POST['nick']);
                    var_dump($admin);
        if ($admin != NULL AND md5($_POST['pass']) == $admin->pass){
            $_SESSION['admin'] = $admin->id;
            $html['admin']=$admin;
        }else{
        	$html["msg"]="INVALID USER OR PASSWORD";
        }
	}