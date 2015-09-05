<?php
include_once('./class/conectar.php');

class Usuario extends Conectar{
	protected $nick, $pass;

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
			$this->password = $row["password"];
		}			
		return $this;
	}
	public function buscarUsuario($nick,$pass){
		$query = $this->db->prepare("SELECT nick FROM usuarios WHERE nick = :nick AND password = :pass");
//http://stackoverflow.com/questions/11575432/having-trouble-executing-a-select-query-in-a-prepared-statement
		$query->execute(array(':nick'=> $nick, ':pass'=>$pass));
		$result=($query->fetchAll());
		var_dump($result);

		$result = count($query->fetchAll());
		var_dump($result);
		die();

	}

	public function agregar($nick, $pass){
		$query = $this->db->prepare("INSERT INTO usuarios (nick,password) VALUES (:nick, :pass)");
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
		return $this->nick;
	}

}