<?php 
//// SEND SMS SCRIPT
$phone_number = "$pono";
	$senderid = "$titmet";
	$message = "$memet";
	$token = 's4fMKjpuLSqG6ymbqXpOJzCxtxWFjJeYjyUL8NNJeUDsR6x3pesDC5G3ZQlLEC8K33edE0nKR5pmJOmaJ8xlXvyugAzQE34foYqn';		

    $url = 'https://smartsmssolutions.com/api/';
    
    $sms_array = array (
                'sender'=>$senderid,
                'to' => $phone_number,
                'message'   => $message,
                'type'  => '0',          //This can be set as desired. 0 = Plain text ie the normal SMS
                'routing' => '3',         //This can be set as desired. 3 = Deliver message to DND phone numbers via the corporate route
                'token' => $token
            );
            
    $params = http_build_query($sms_array);
    $ch = curl_init(); 
    
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);   
 
    $output=curl_exec($ch);
    curl_close($ch);
//// END    
?>