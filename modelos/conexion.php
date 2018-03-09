<?php
class Conexion{
	static public function conectar(){
		$link = new PDO("mysql:host=localhost;dbname=sistema","sistema","sistema");
		$link->exec("set names utf8");
		return $link;
	}//function
}//class