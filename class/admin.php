<?php
include_once('./class/conectar.php');

class Admin extends Conectar{
	protected $id, $nick, $pass;

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
		public function buscarPorIda($id){
		$query = $this->db->prepare("SELECT * FROM admin WHERE id = :id");		
		$query->execute(array(':id' => $id));
		foreach ($query->fetchAll() as $row){
			$this->id = $row["id"];
			$this->nick = $row["nick"];
			$this->password = $row["password"];
		}	
		return $this;		
	}
	public function buscarUsuario($nick){
		$query = $this->db->prepare("SELECT id, nick, password FROM usuarios WHERE nick = :nick");
		$query->execute(array(':nick'=> $nick));
		$result = $query->fetchAll();
		if (count($result)>0){
			return $result[0];}
	}
		public function buscaradmin($nick){
		$query = $this->db->prepare("SELECT id, nick, password FROM admin WHERE nick = :nick");
		$query->execute(array(':nick'=> $nick));
		$result = $query->fetchAll();
		if (count($result)>0){
			return $result[0];}
	}

	public function agregar($nick, $pass, $role){
		$query = $this->db->prepare("INSERT INTO usuarios (nick,password,role) VALUES (:nick, :pass, :role)");
		$query->execute(array( ':nick'=>$nick, ':pass'=>$pass, 'role'=>$role));
		$this->id = $this->db->lastInsertId();
		$this->nick = $nick;
		$this->pass = $pass;
		$this->role = $role;
		return $this;
	}

		public function agregaradmin($nick, $pass){
		$query = $this->db->prepare("INSERT INTO admin (nick,password) VALUES (:nick, :pass)");
		$query->execute(array( ':nick'=>$nick, ':pass'=>$pass));
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
		public function listaradmin(){
		$usuarios=null;
		$query = $this->db->prepare("SELECT * FROM admin");
		$query->execute(array());
		$usuarios = $query->fetchAll();
		return $usuarios;
	}

	public function eliminar(){
		$this->db->exec("DELETE FROM usuarios WHERE id='$this->id'");
		return $this->nick;
	}

}