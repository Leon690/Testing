<?php
    include_once('./class/admin.php');

    if (isset($_SESSION['login_admin'])){
        session_unset();
        session_destroy();
        $html['logged']=False;
    }
    if (isset($_POST["login"])){
        $nick=$_POST["nick"];
        $pass=$_POST["pass"];
        $user = (new Admin)->buscaradmin($nick);
        if (password_verify($pass, $user['password'])){
            $_SESSION['userId']=$user['id'];
        	$_SESSION['login_admin']= $nick;
        	$html['user']=$nick;
            $html['logged']=True;
        }
        else{
        	$html["msg"]="INVALID USER OR PASSWORD";
        	}
	}