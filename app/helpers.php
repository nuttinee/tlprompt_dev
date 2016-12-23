<?php

function getIPAddress(){
	return "dev.thailife.com";
}


function getDNSapi(){
	return "http://".getIPAddress().":9999";
}

function getDataAPI($path, $method, $query="", $body=""){

  $dns = getDNSapi();
	
  $url = $dns.$path."/".$method."/";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);   

	if(!empty($body)){
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json; charset=utf-8'));
	}
	// execute the request
	$response = curl_exec($ch);
	$httpcode = curl_getinfo($ch);

	// Check for errors
	if($response === FALSE){
	    die(curl_error($ch));
	}
	// close curl resource to free up system resources
	curl_close($ch);
	$object = json_decode($response);

  return($object);

}

function AuthCheck($accessTokenExpired){
	if(!empty($accessTokenExpired)){
		if((strtotime(date("Y-m-d H:i:s"))*1000) < $accessTokenExpired){
			return true;
		}else{
			return false;	
		}
	}else{
		return false;	
	}
}


function checkPhone($phone_number){
	$phone_number = trim($phone_number);
	$check_phone = (substr($phone_number,0,1) == 0) ? substr($phone_number,1) : $phone_number;
	return $check_phone;
}

?>