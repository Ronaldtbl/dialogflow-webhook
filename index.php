<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);
	//echo var_dump($json) . "<br>";
	//$text = $json->result->parameters->text;
	$text = $json->queryResult->queryText;

	switch ($text) {
		case 'hi':
			$fulfillmentText = "Hi, Nice to meet you";
			break;

		case 'What is fulfillment':
			$fulfillmentText="https://github.com/";
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
	
/*$response = array(
        
        'fulfillmentText' => $fulfillmentText
       
    );*/
	$echo_var="<a href='".$fulfillmentText."'>LINK</a>";
	$response = array(
        
        'fulfillmentText' => $echo_var
       
    );
	//$link_address="www.google.com";
	//echo "<a href='".$link_address."'>Link</a>";
	echo json_encode($response);
	//echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>
