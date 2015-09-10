<?php
include_once('./class/conectar.php');

class Noticia extends Conectar{
    public $id, $titulo, $texto, $fecha;

    public function __construct() {

        $pdo = new Conectar();
        $this->db = $pdo->db;
    }

    public function buscarPorId($id){
        $query = $this->db->prepare("SELECT * FROM noticias WHERE id = :id");
        $query->execute(array(':id' => $id));
        foreach ($query->fetchAll() as $row){
            $this->id = $row["id"];
            $this->titulo = $row["titulo"];
            $this->texto =  $row["texto"];
            $this->fecha =  $row["fecha"];
        }           
        return $this;
    }

    public function agregar($titulo, $texto, $fecha, $userId){
        $query = $this->db->prepare("INSERT INTO noticias (titulo, texto, fecha, userId) VALUES (:titulo, :texto, :fecha, :userId)");
        $query->execute(array(':titulo'=>$titulo, ':texto'=>$texto, ':fecha'=>$fecha, ':userId'=>$userId));     
        $this->id = $this->db->lastInsertId();
        $this->titulo = $titulo;
        $this->texto = $texto;
        $this->fecha = $fecha;
        $this->userId= $userId;
        return $this;
    }

    public function eliminar(){
        $this->db->exec("DELETE FROM noticias WHERE id = '$this->id'"); 
    }

    public function listar(){
        $noticias = null;
        $query = $this->db->prepare("SELECT * FROM noticias ORDER by id DESC");
        $query->execute(array());
        foreach ($query->fetchAll() as $row){
            $noticias[] = $row;
        }           
        return $noticias;
    }

}
?>