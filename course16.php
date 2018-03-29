<?php


require_once('course16-database.php');

// var_dump($_POST);
if ($_POST) {
	$name = $_POST['productName'];
	$price=$_POST['price'];
	$db = new Database();
	$db->insertAItem($name,$price);
}

$db = new Database();
$all_items = $db->getAllItems();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Our MVC Project 1</title>
</head>
<body>

	<h1>This is a Shopping Cart Using DB</h1>
	<ul>
		<?php
			foreach ($all_items as $item) {
				echo '<li id="'.$item['id'].'">Name: ' . $item['name'];
				echo '<br>';
				echo 'Price: ' . $item['price'];
				echo '<br>';
				echo '<button onclick="deleteItem(\''.$item['id'].'\')">DELETE</button>';
				echo '</li>';
			}


		?>
	</ul>
	<div class="info"></div>
	<form action="" method="POST">
		<label>Name:</label>
		<input type="text" name="productName">
		<label>Price:</label>
		<input type="text" name="price">
		<input type="submit" name="">
	</form>
<!-- 	如果用ajax就这样引用bootstrap -->
<!-- js一般放在后面，css放在前面 -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script type="text/javascript">
	function deleteItem(id){
		//ajax to connnet back-end
		$.post(
			//发件发到哪
			"delete.php",
			{
				//发什么，必要的数据集
				'delete_id': id
			},
			//回调，回来后干什么
			function(data){
				// console.log(data.message);
				$(".info").html(data.message);
				$('#' + id).hide();
			},
			'json'
			);
	}
</script>
	
</body>
</html>



