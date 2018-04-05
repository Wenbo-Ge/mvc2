<?php

if ($_POST['submitInfo']) {
	$response = array(
		'res'=>'Purchase successful!'
	);
}else{
	$response = array(
		'res'=>'Please add some items!'
	);
}


echo json_encode($response);


?>