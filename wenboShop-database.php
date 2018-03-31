<?php
require_once('wenboShop-item.php');

class DBConnection {
	private $conn;

	private function getConnInstance(){
		if (!$conn) {
			$this->conn = new PDO('mysql:host=localhost;dbname=Shop;charset=utf8mb4','root','root');
		}
		return $this->conn;
	}

	public function getAllItemsReturnArr(){
		$this->getConnInstance();
		$stmt=$this->conn->query('SELECT * FROM Item');
		$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	public function getAllItemsReturnObj(){
		$this->getConnInstance();
		$stmt=$this->conn->query('SELECT * FROM Item');
		$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
		$items=array();

		foreach ($result as $row) {
			
			$item= new Item();
			$items[]=$item->arrayAdapter($row);
		}
		return $items;
	}
}






?>