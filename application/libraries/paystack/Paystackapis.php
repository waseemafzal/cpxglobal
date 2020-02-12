<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*

 * PaypalExpress Class

 * This class is used to handle PayPal API related operations

 */

 class Paystackapis
 {

	private $paystacktURL = 'https://api.paystack.co/';
	private $paystack_secret = 'sk_test_134e540ef7235e81d9982f5c4a15334d09758eea';
	//private $paystack_secret = 'sk_live_568498e0ff439f1a51106007f5424309116bec7a';
	
	

	
	public function __construct($params)
	{

		// Do something with $params
		//$this->CI =& get_instance();
	}

   /*****************Paystack Methods****************************/
    public function PaystackTransfer($ajsdata) // get  access token first to use Payout
	 {
	
	 
	  $curl = curl_init();
	  curl_setopt_array($curl, array(
	  CURLOPT_URL => $this->paystacktURL.'transfer/bulk', 
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => ''.$ajsdata.'',
							
		  CURLOPT_HTTPHEADER => array(
			"Authorization: Bearer ".$this->paystack_secret."",
			"Content-Type: application/json",
		  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);
	
	curl_close($curl);
	
	if ($err) 
	{
	  $result =  "cURL Error #:" . $err;
	} 
	else 
	{
	  $result =  $response;
	}
	return $result;
 }

   
   
    public function AvilableBalance()
	{
		
		$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => $this->paystacktURL.'balance',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
			"Authorization: Bearer ".$this->paystack_secret."",
			"Cache-Control: no-cache",
			),
		));

	$response = curl_exec($curl);
	$err = curl_error($curl);
	
	curl_close($curl);
	
	if ($err) 
	{
	  $result =  "cURL Error #:" . $err;
	} 
	else 
	{
	  $result =  $response;
	}
		return $result;
	
	}

    
	 public function PaystackBanklistings()
	 {
		
		$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => $this->paystacktURL.'bank',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
			"Authorization: Bearer ".$this->paystack_secret."",
			
			),
		));

	   $response = curl_exec($curl);
	   $err = curl_error($curl);
	
		curl_close($curl);
		
		if ($err) 
		{
		  $result =  "cURL Error #:" . $err;
		} 
		else 
		{
		  $result =  json_decode($response);
		}
		
		return $result;
	
	}
	
	
	
	public function BankAccountValidation($aBankinfo)
	{
		 if(is_array($aBankinfo) AND count($aBankinfo)>0)
		 {
			
		    $curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => $this->paystacktURL.'bank/resolve?account_number='.$aBankinfo['bank-account'].'&bank_code='.$aBankinfo['bank-code'].'',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
			"Authorization: Bearer ".$this->paystack_secret."",
			
			),
		));

			$response = curl_exec($curl);
			$err = curl_error($curl);
			
			curl_close($curl);
			
			if ($err) 
			{
				$result =  "cURL Error #:" . $err;
			} 
			else 
			{
				$result =  json_decode($response);
			}
			
			
			
			$response = 0;		
			if(isset($result->status) AND ($result->status==1))
			{
				
			   $agenereteRecepientCode = array();
				if(isset($result->data))
				{
					
					$agenereteRecepientCode = array(
						'type'=>'nuban',
						'name'=>$result->data->account_name,
						'description'=>$result->data->account_name,
						'account_number'=>$result->data->account_number,
						'bank_code'=>$aBankinfo['bank-code'],
						'currency'=>'NGN',
					);
					
					$jSagenereteRecepientCode = json_encode($agenereteRecepientCode);
					$response = $this->GenereteRecepientKEY($jSagenereteRecepientCode,$aBankinfo['bank-code']);	
					
					
					
				}
			}
		 	else
			if(isset($result->status) AND ($result->status==false))
			   
			   $response = 0;		
			}
			
		    return $response;
	}

/*{
    "status": false,
    "message": "Could not resolve account name. Check parameters or try again."
}
*/
	
/*{
    "status": true,
    "message": "Account number resolved",
    "data": {
        "account_number": "0024954456",
        "account_name": "KAYODE BENJAMIN OLANREWAJU",
        "bank_id": 14
    }
}*/

    
	
	 public function GenereteRecepientKEY($jSagenereteRecepientCode,$bankcode)
	 {
		 if(! empty($jSagenereteRecepientCode))
		 {
			
				$curl = curl_init();
				curl_setopt_array($curl, array(
				CURLOPT_URL => $this->paystacktURL.'transferrecipient',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => ''.$jSagenereteRecepientCode.'',	
				CURLOPT_HTTPHEADER => array(
					"Authorization: Bearer ".$this->paystack_secret."",
					"Content-Type: application/json",
					),
				));


			$response = curl_exec($curl);
			$err = curl_error($curl);
			
			curl_close($curl);
			
			if ($err) 
			{
				$result =  "cURL Error #:" . $err;
			} 
			else 
			{
				$result =  json_decode($response);
			}
			 //return $result;
			    $response = 0;
		        $aPaystackApiResponse = array();
				if(isset($result->status) AND ($result->status==1))
				{
					$agenereteRecepientCode = array();
					if(isset($result->data))
					{ 
					$aPaystackApiResponse = array(
						'active'=>(($result->data->active==true) ? 1 : 0),
						'recipient_code'=>$result->data->recipient_code,
						'account_number'=>$result->data->details->account_number,
						'bank_code'=>$result->data->details->bank_code,
					);
				  }
				  
				   $response = (object)$aPaystackApiResponse;
				}
				
				
				
				return $response;
		     }
	}

   
   /*****************Paystack Methods****************************/
   






	

	    

   

	

}