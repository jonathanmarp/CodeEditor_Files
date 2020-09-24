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
}