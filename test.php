<?php

/*
// sender id can be your company name, keep it short, long sender id will lead to sms failing
// for users in Canada, USA or Puerto Rico, you will use a custom sender id provided by SMSto Support
// after submiting the TFN document

// make sure the country code contains plus sign plus country code

// How to use this class, just say: 


$sms = new Wpccb_sms(array(
	"country_code" => "+1",
	"phone" => "+1(123)123-1234",
	"message" => "This is a test message", 
	"sender_id"=> "YOUR COMPANY NAME",
	"api_key"=>'',

));

$send = $sms->send();
print_r($send);
it will return a json string
*/

class Wpccb_sms{

	private $_options;


	function __construct( array $options ){
		$this->_options = $options;
	}

	// this fucntion checks if string is contained in a nother string
	// meaning string_in_string
	// returns true if string is contained in the $heystack
	function s_in_s( $heystack, $needle ){
		return strpos( $heystack , $needle ) !== false; 
	}


	function remove_spaces($text, $replacement = "") {
	    // Remove all extra spaces, tabs, and newlines
	    $text = preg_replace('/\s+/', $replacement, $text);
	    
	    // Trim any leading or trailing spaces
	    return trim($text);
	}


	function get_phone($phone, $defaultCountryCode = '+1') {
	    // Remove all non-numeric characters except '+'
	    if( ! $this->s_in_s( $defaultCountryCode, "+" ) ){
	    	$defaultCountryCode = "+$defaultCountryCode";
	    }

	    $phone = preg_replace('/[^\d+]/', '', $phone);

	    // If the number starts with '+', assume it already has a country code
	    if (strpos($phone, '+') === 0) {
	        return $phone; // Already formatted
	    }

	    // If the number starts with '0', remove it and add the country code
	    if (strpos($phone, '0') === 0) {
	        $phone = substr($phone, 1); // Remove leading zero
	    }

	    // Prepend the default country code
	    return $defaultCountryCode . $phone;
	}



	function send(){
		if (!array_key_exists('phone', $this->_options)) {
			// show an error, phone is required
			echo "Phone is required to send an sms";
			return;
		}
		if (!array_key_exists('message', $this->_options)) {
			// show an error, phone is required
			echo "message is required to send an sms";
			return;
		}

		if (!array_key_exists('api_key', $this->_options)) {
			// show an error, phone is required
			echo "api key is required is required to send an sms";
			return;
		}

		if (!array_key_exists('sender_id', $this->_options)) {
			// show an error, phone is required
			echo "Sender id required is required to send an sms";
			return;
		}

		if( ! array_key_exists( "country_code", $this->_options ) ){
			echo "Country code is required!";
			return;
		}

		if( $this->remove_spaces( $this->_options['message'] ) == ""){
			echo "You cannot send an empty sms";
			return;
		}



		$the_phone = $this->get_phone( $this->_options['phone'], $this->_options['country_code'] );

		// remove extra spaces, next lines, and tabs and replace them with a single space for message
		$message = $this->remove_spaces($this->_options['message'], " ");
		$to = $the_phone;
		$api_key = $this->_options['api_key'];
		$sender_id = $this->_options['sender_id'];

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://api.sms.to/sms/send',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS =>'{
			  "message": "' . $message . '",
			  "to": "' . $to . '",
			  "bypass_optout": true,
			  "sender_id": "' . $sender_id . '",
			  "callback_url": "https://example.com/callback/handler"
			}',
			CURLOPT_HTTPHEADER => array(
			  'Authorization: Bearer ' . $api_key,
			  'Content-Type: application/json'
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		//$response is a json = {"message":"Message is queued for sending! Please check report for update","success":true,"message_id":"473590-1741446-80d0-6ff4-bf329a12-e8"}

		return $response;
	}
}

