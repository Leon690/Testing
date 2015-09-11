<?php
    include_once('./class/noticia.php');
    include_once('./class/usuario.php');

    if (isset($_SESSION['admin'])){

        if (isset($_GET["agregar"])){
            (new Noticia)->agregar($_POST["titulo"], $_POST["texto"], time(), $_SESSION['admin']);
        }

        if (isset($_GET["eliminar"])){
            if((new Usuario)->buscarPorId($_SESSION['admin'])->role == true){
                (new Noticia)->buscarPorId($_GET["eliminar"])->eliminar();
            }
        }
    }
    else{
        
        $html["error"] = "YOU MUST BE REGISTERED TO VIEW THE COMMENTS AND EDIT THEM.";
    }

    $html["noticias"] = (new Noticia)->listar();
?>