<?php
    include_once('./class/usuario.php');

    if (isset($_POST["login"])){
        $nick=$_POST["nick"];
        $pass=$_POST["pass"];
        $ok = (new Usuario)->buscarUsuario($nick,$pass);
        var_dump($ok);
        die();
}
