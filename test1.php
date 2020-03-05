<?php
$method = $_SERVER['REQUEST_METHOD'];

if ($method== "POST"){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);
	
	$text = $json->result->parameters->text;
	
	switch($text){
		case 'hi':
			$speech = "Hi, Nice to meet you";
			break;
		case 'bye':
			$speech = "Bye, Good night";
			break;
		case 'anything':
			$speech = "Yes, you can type anything here";
			break;
		default:
			$speech = "Sorry, I didn't get you. Please ask me something else";
			break;	
	}
	
	$response = new \stdClass();
	$response -> speech= "";
	$response -> displayText = "";
	$response -> source = "webhook";
	echo json_encode($response);
}
else{
	echo "Method is invalid";
}
?>