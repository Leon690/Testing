<?php
	include_once('./class/noticia.php');

	if (isset($_GET["agregar"])){
		(new Noticia)->agregar($_POST["titulo"], $_POST["texto"], time(), $_SESSION['userId']);
	}

	if (isset($_GET["eliminar"])){
		(new Noticia)->buscarPorId($_GET["eliminar"])->eliminar();	
	}

	$html["noticias"] = (new Noticia)->listar();
?>