<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);
	echo var_dump($json) . "<br>";
	//$text = $json->result->parameters->text;
	$text = $json->queryResult->queryText;

	switch ($text) {
		case 'hi':
			$fulfillmentText = "Hi, Nice to meet you";
			break;

		case 'What is fulfillment':
			$fulfillmentText = "Well done";
			break;

		case 'anything':
			$fulfillmentText = "Yes, you can type anything here.";
			break;
		
		default:
			$fulfillmentText = "Sorry, I didnt get that. Please ask me something else.";
			break;
	}

	//$response = new \stdClass();
	//$response->fulfillmentText = $fulfillmentText;
	//$response->displayText = $fulfillmentText;
	//$response->source = "webhook";
	echo json_encode($fulfillmentText);
}
else
{
	echo "Method not allowed";
}

?>
