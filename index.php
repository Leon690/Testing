<?php
	session_start();
	ini_set('display_errors', true);
	error_reporting(E_ALL);

	require_once './vendor/autoload.php';
	Twig_Autoloader::register();
	
	$loader = new Twig_Loader_Filesystem('./templates');
	$twig = new Twig_Environment($loader, array(
	    //'cache' => './cache',
	    'cache' => false,
	));

	include_once('./class/usuario.php');
	$html[] = null;
	if (isset($_SESSION['admin'])){
		$html['admin'] = (new Usuario)->buscarPorId($_SESSION['admin']);
	}
	switch(isset($_GET["seccion"]) ? $_GET["seccion"] : ''){
		case 'login':
			include('./login.php');
			echo $twig->render('login.html.twig', $html);
			break;
		case 'noticias':
			include('./noticias.php');
			echo $twig->render('noticias.html', $html);			
			break;
		case 'enviar':
			echo $twig->render('enviar.html', $html);			
			break;
		case 'usuarios':
			include('./usuarios.php');
			echo $twig->render('usuarios.html.twig', $html);
			break;
		case 'register':
			include('./register.php');
			echo $twig->render('register.html', $html);
			break;
		default:
			echo $twig->render('home.html', $html);
	}
?>