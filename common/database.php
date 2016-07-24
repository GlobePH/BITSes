<?php

class database{
	public $mysql;

	function __construct(){
		$this->mysql = new mysqli("localhost","root","","efare") ;
	}

	function query($sql){
		$result = mysqli_query($this->mysql,$sql);
		return $result;
	}


	function __destruct(){
	}
}
?>