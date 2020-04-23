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

	$link_address="https://github.com/";

	$echo_var="<a href='".$link_address."'>CLICK HERE</a>";
	
	
	
    $response = array(
        
        'fulfillmentText' => $echo_var
       
    );
	echo json_encode($response);
	//echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>
