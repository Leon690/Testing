<?php
class Conectar{
	protected $db;
	public function __construct() {
    	$this->db = new PDO('mysql:host=localhost;dbname=noticias;charset=utf8', 'noticias', 'noticias');
    }	
    public function getConnection(){
    	return $this->db;
    }
}
?>