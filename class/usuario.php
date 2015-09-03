<?php
include_once('./class/conectar.php');

class Usuario extends Conectar{
	protected $nick, $pass;

	public function __construct(){
			$pdo = new Conectar();
			$this->db = $pdo->db;
	}

	public function agregar($nick, $pass){
		$query = $this->db->prepare("INSERT INTO usuarios (nick,pass) VALUES (:nick, :pass)");
		$query->execute(array( ':nick'=>$nick, ':pass'=>$pass ));
		$this->id = $this->db->lastInsertId();
		$this->nick = $nick;
		$this->pass = $pass;
		return $this;
	}

	public function listar(){
		$usuarios=null;
		$query = $this->db->prepare("SELECT * FROM usuarios");
		$query->execute(array());
		$usuarios = $query->fetchAll();
		return $usuarios;
	}

	public function eliminar(){
		$this->db->exec("DELETE FROM usuarios WHERE id='$this->id'");
	}

	public function buscarPorID($id){
		
	}
}