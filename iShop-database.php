<?php

require_once('iShop-items.php');

class DBConnection{
	private $conn;

	private function getConnInstance(){
		if (!$this->conn) {
				$this->conn = new PDO('mysql:host=localhost;dbname=Shop;charset=utf8mb4',"root","root");
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

		// 这的row可不可以改成任意？可以，但必须和方法里的变量一致
		foreach ($result as $value) {
			$item=new Items();
			$items[]=$item->arrayAdapter($value);
		}
		return $items;
	}
}

?>