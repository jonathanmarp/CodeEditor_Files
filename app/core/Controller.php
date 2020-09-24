<?php

class Controller {
    public function view($view, $data = []) {
        require_once '../app/views/' . $view . '.php';
    }
    public function model($model) {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }
    public function encrypt($string) {
    	// Store a string into the variable which 
		// need to be Encrypted 
		$simple_string = $string;
		  
		// Store the cipher method 
		$ciphering = "AES-128-CTR"; 
		  
		// Use OpenSSl Encryption method 
		$iv_length = openssl_cipher_iv_length($ciphering); 
		$options = 0; 
		  
		// Non-NULL Initialization Vector for encryption 
		$encryption_iv = '1234567891011121'; 
		  
		// Store the encryption key 
		$encryption_key = "sqjcfwdlfnldwnvwjldbsf"; 
		  
		// Use openssl_encrypt() function to encrypt the data 
		$encryption = openssl_encrypt($simple_string, $ciphering, 
		            $encryption_key, $options, $encryption_iv);

		return $encryption;
    }
    public function dencrypt($encryption) {
    	// Non-NULL Initialization Vector for decryption 
		$decryption_iv = '1234567891011121';
		$ciphering = "AES-128-CTR";
		$options = 0;
		  
		// Store the decryption key 
		$decryption_key = "sqjcfwdlfnldwnvwjldbsf"; 
		  
		// Use openssl_decrypt() function to decrypt the data 
		$decryption=openssl_decrypt ($encryption, $ciphering,  
		        $decryption_key, $options, $decryption_iv);

		return $decryption;
    }
    public function get_client_ip() {
	    $ipaddress = '';
	    if (getenv('HTTP_CLIENT_IP'))
	        $ipaddress = getenv('HTTP_CLIENT_IP');
	    else if(getenv('HTTP_X_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	    else if(getenv('HTTP_X_FORWARDED'))
	        $ipaddress = getenv('HTTP_X_FORWARDED');
	    else if(getenv('HTTP_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_FORWARDED_FOR');
	    else if(getenv('HTTP_FORWARDED'))
	      $ipaddress = getenv('HTTP_FORWARDED');
	    else if(getenv('REMOTE_ADDR'))
	        $ipaddress = getenv('REMOTE_ADDR');
	    else
	        $ipaddress = 'UNKNOWN';
	    return $ipaddress;
	}
	public function pingDomain(){
	    $status = "";
	    $domain = "";
	    if(config['localhost'] == true) {
	    	$domain = "localhost";
	    } else {
	    	$domain = base_url;
	    }
	    try {
	    	$starttime = microtime(true);
		    $file      = fsockopen ($domain, 80, $errno, $errstr, 10);
		    $stoptime  = microtime(true);
		    $status    = 0;

		    if (!$file) {
		    	$status = false;  
		    	// Site is down
		    }
		    else {
		        fclose($file);
		        $status = ($stoptime - $starttime) * 1000;
		        $status = floor($status);
		    }
	    } catch(Exception $e) {
	    	$status = "localhost";
	    }
	    return $status;
	}
	public function setInterval($func = null, $interval = 0, $times = 0){
	  if( ($func == null) || (!function_exists($func)) ){
	    throw new Exception('We need a valid function.');
	  }

	  /*
	  usleep delays execution by the given number of microseconds.
	  JavaScript setInterval uses milliseconds. microsecond = one 
	  millionth of a second. millisecond = 1/1000 of a second.
	  Multiplying $interval by 1000 to mimic JS.
	  */


	  $seconds = $interval * 1000;

	  /*
	  If $times > 0, we will execute the number of times specified.
	  Otherwise, we will execute until the client aborts the script.
	  */

	  if($times > 0){
	    
	    $i = 0;
	    
	    while($i < $times){
	        call_user_func($func);
	        $i++;
	        usleep( $seconds );
	    }
	  } else {
	    
	    while(true){
	        call_user_func($func); // Call the function you've defined.
	        usleep( $seconds );
	    }
	  }
	}
}