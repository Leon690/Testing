<?php
include_once('./class/conectar.php');

class Usuario extends Conectar{
	public $id, $nick, $pass, $role;

	public function __construct(){
			$pdo = new Conectar();
			$this->db = $pdo->db;
	}

	public function buscarPorId($id){
		$query = $this->db->prepare("SELECT * FROM usuarios WHERE id = :id");		
		$query->execute(array(':id' => $id));
		foreach ($query->fetchAll() as $row){
			$this->id = $row["id"];
			$this->nick = $row["nick"];
			$this->password = $row["pass"];
		}			
		return $this;
	}
	public function buscarUsuario($nick){
		$query = $this->db->prepare("SELECT * FROM usuarios WHERE nick = :nick");
		$query->execute(array(':nick'=> $nick));
		foreach ($query->fetchAll() as $row){
			$this->id = $row["id"];
			$this->nick = $row["nick"];
			$this->pass = $row["pass"];
			$this->role = $row['role'];
		}	
		return $this;
	}

	public function agregar($nick, $pass, $role){
		$query = $this->db->prepare("INSERT INTO usuarios (nick,pass,role) VALUES (:nick, :pass, :role)");
		$query->execute(array( ':nick'=>$nick, ':pass'=>$pass, ':role'=>$role ));
		$this->id = $this->db->lastInsertId();
		$this->nick = $nick;
		$this->pass = $pass;
		$this->role = $role;
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
		return $this->nick;
	}

}