<?php
// The data to send to the API
$postData = array(
    'from' => 'individual',
    'relation' => 'be_in_state',
    'target' => ''
);

$ch = curl_init('http://localhost:8080/nlp/wordnet/pt/GetTargets');
curl_setopt_array($ch, array(
    CURLOPT_POST => TRUE,
    CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_HTTPHEADER => array(
        //'Authorization: '.$authToken,
        'Content-Type: application/json'
    ),
    CURLOPT_POSTFIELDS => json_encode($postData)
));

// Send the request
$response = curl_exec($ch);

//var_dump($response);
// Decode the response
$responseData = json_decode($response, TRUE);
var_dump($responseData);


// Check for errors
if($response === FALSE){
    die(curl_error($ch));
}


?>