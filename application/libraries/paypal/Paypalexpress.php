<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * PaypalExpress Class
 * This class is used to handle PayPal API related operations
 */
 class Paypalexpress{
	
	public $paypalEnv       = 'sandbox'; // Or 'live'
    public $paypalURL       = 'https://api.sandbox.paypal.com/v1/'; // //https://api.sandbox.paypal.com/v1/
    public $paypalClientID  = 'AdQJBq4-Cq74TG1-2kIOsfGRNY3DhCo8VHSRc_-qMEnjCmbbKttcVdUuDYn-hoRk0CJoB9_SDAQpNdUo';
    public $paypalSecret   = 'EMF9Tbm8aGZ-bvWvBCrYXAXXwaXVZaV_h2cRXN5yTbqubIBKrFp9Mqi7lld5MoTonUbk9vvFKlJmUre-';
	
		 
	
//	public $paypalEnv       = 'production'; // Or 'production sandbox'
  //  public $paypalURL       = 'https://api.paypal.com/v1/';
//    public $paypalClientID  = 'AbBKttvvya07luPDphvzLncn72NBSTE274lw9Mu8rvx_2I9piBluk51SzBjiU8f5q2_TxVN1WNIIJBgc';
  //  public $paypalSecret    = 'EFQk-xCidhIUmPkii_3rKdsTwRU5y06XU51etiuQmrK_l65ojT8sR6kATkLfOYtBgNflg6_PESUqSsQg';
	
	
	
	
    
	public function __construct($params)
	{
	// Do something with $params
		//$this->CI =& get_instance();
	}
    
	
	
	public function validate($paymentID, $paymentToken, $payerID, $productID){
        
		$ppal = paypalsetting('front');
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $ppal['paypalbaseURL'].'oauth2/token');
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $ppal['paypalclientID'].":".$ppal['paypalSecret']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
		$response = curl_exec($ch);
		curl_close($ch);
        
        if(empty($response))
		{
            return false;
        }
		else
		{
            $jsonData = json_decode($response);
			$curl = curl_init($ppal['paypalbaseURL'].'payments/payment/'.$paymentID);
            curl_setopt($curl, CURLOPT_POST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer ' . $jsonData->access_token,
                'Accept: application/json',
                'Content-Type: application/xml'
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            
            // Transaction data
            $result = json_decode($response);
            
            return $result;
        }
    
    }
	
	public function paymentprocess($querystr){
	   
	   $redirectStr = '';
	   if(!empty($querystr['paymentID']) && !empty($querystr['token']) && !empty($querystr['payerID']))
		{
		
			$paymentID = $querystr['paymentID'];
			$token = $querystr['token'];
			$payerID = $querystr['payerID'];
			if(isset($_querystr['customorderid']) AND !empty($_querystr['customorderid']))
			{
				 $productID = $querystr['customorderid'];	
			}
			else
			if(isset($_querystr['pid']) AND !empty($_querystr['pid']))
			{
				$productID = $querystr['pid'];	
			}
			
			$paymentCheck = $this->validate( $paymentID, $token, $payerID, $productID);
			return $paymentCheck;
		
		}
		else
		{
		// Redirect to the home page
			redirect( base_url()); 
		}
	   
	   
	   	
	}
	
	
}