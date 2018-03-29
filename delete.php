<?php

require_once('course16-database.php');
$name=$_POST['delete_id'];


$affect_row = deleteItem($name);
if ($affect_row==0) {
	$str = 'Delete failed';
}else {
	$str = 'Delete success';
}

//api 要加入这两个
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json;charset=UTF-8');

$result=array(
	'message'=>$str
);

echo json_encode($result);
?>