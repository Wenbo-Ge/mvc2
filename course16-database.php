
<?php

class Database {
	private $connection;
	// private function createConnection(){
	// 	$pdo = new PDO('mysql:host=localhost;dbname=shopping_cart;charset=utf8mb4', 'root', 'root');
	// 	$this->connection = $pdo;
	// }
	private function getInstantConnection(){
		if (!$this->connection) {
			$this->connection = new PDO('mysql:host=localhost;dbname=shopping_cart;charset=utf8mb4', 'root', 'root');
		}
		return $this->connection;
	}
	public function getAllItems(){
		$this->getInstantConnection();
		$sql = "SELECT * FROM items";
		$stmt = $this->connection->query($sql);
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $results;
	}
	public function insertAItem($name,$price){
		$this->getInstantConnection();
		$stmt = $this->connection->prepare('INSERT INTO items(name,price) VALUES (:name,:price)');
		$stmt->execute(
		array(
			':name' =>$name,
			':price'=>$price
		)
	);
	$affected_rows = $stmt->rowCount();
	return $affected_rows;
	}
}



//factory pattern
function createPDO(){
	$pdo = new PDO('mysql:host=localhost;dbname=shopping_cart;charset=utf8mb4', 'root', 'root');
	return $pdo;
}

// function getAllItems (){
// 	$pdo = createPDO();
// 	$sql = "SELECT * FROM items";
// 	$stmt = $pdo->query($sql);
// 	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
// 	return $results;
// }

// function insertAItem($name,$price){
// 	$pdo = createPDO();
// 	$stmt = $pdo->prepare('INSERT INTO items(name,price) VALUES (:name,:price)');
// 	//pdo 用：占位符检查
// 	//防止sql注入
// 	$stmt->execute(
// 		array(
// 			':name' =>$name,
// 			':price'=>$price
// 		)
// 	);
// 	$affected_rows = $stmt->rowCount();

// 	return $affected_rows;
// 	echo "Added ". $affected_rows .'item.';
// }

function deleteItem($id) {
	$pdo = createPDO();
	$stmt = $pdo->prepare('DELETE FROM items WHERE id = :id');
	$stmt->execute(
		array(
			':id' =>$id
		)
	);
	$affected_rows = $stmt->rowCount();

	return $affected_rows;
	
}

