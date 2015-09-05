<?php
    include_once('./class/usuario.php');

    if (isset($_SESSION['login_user'])){
        session_unset();
        session_destroy();
        $html['logged']=False;
    }
    if (isset($_POST["login"])){
        $nick=$_POST["nick"];
        $pass=$_POST["pass"];
        $user = (new Usuario)->buscarUsuario($nick);
        if (password_verify($pass, $user['password'])){
            $_SESSION['userId']=$user['id'];
            $_SESSION['role']=$user['rol'];
        	$_SESSION['login_user']= $nick;
        	$html['user']=$nick;
            $html['logged']=True;


        }
        else{
        	$html["msg"]="Usuario o contraseña invalidos";
        	}
	}

	function validarPassword($pass){
		if (password_verify($pass, $result['password'])) 
    		echo 'Password is valid!';
    	else
    		echo 'pass not valid';
	}

