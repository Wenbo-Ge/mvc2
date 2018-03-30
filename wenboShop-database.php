<?php

class DBconnection {
	private $conn;

	private function getConnInstance(){
		if (!$conn) {
			$this->conn=new PDO('mysql:host=localhost;dbname=Shop;charset=utf8mb4','root','root');
		}
		return $this->conn;
	}

	public function getAllItemsReturnArr(){
		$this->getConnInstance();
		$stmt=$this->conn->query('SELECT * FROM item');
		$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	public function getAllItemsReturnObj(){
		
	}
}






?>