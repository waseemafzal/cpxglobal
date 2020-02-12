<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*

 * PaypalExpress Class

 * This class is used to handle PayPal API related operations

 */

 class Paypalpayout
 {

	private $env       = 'sandbox'; // Or 'live'
	//private $env       = 'live'; // Or 'live'
	private $paypalbaseURL  ='https://api.sandbox.paypal.com/v1/'; // 
	//private $paypalbaseURL  ='https://api.paypal.com/v1/';
	
	// live
	//private $paypalclientID = 'AbBKttvvya07luPDphvzLncn72NBSTE274lw9Mu8rvx_2I9piBluk51SzBjiU8f5q2_TxVN1WNIIJBgc';
	//private $paypalSecret   = 'EFQk-xCidhIUmPkii_3rKdsTwRU5y06XU51etiuQmrK_l65ojT8sR6kATkLfOYtBgNflg6_PESUqSsQg';
	// sanbox
	private $paypalclientID = 'AUSKO18cTv1h3Sf8ls3gAD_sQeJIvbz7_LGx8fXeSsK-oSodbqiAi0lfTy2OAY_PzHT1wyRCeb16HJM2';
	private $paypalSecret   = 'EGD8oO_9YG5oNmUO4iPaUp0GECeAA2balbVFv1wTKLjr3yBLXVN6UkCIU_0AotUYFNDMWcWn3exlWvMX';

	
	public function __construct($params)
	{

		// Do something with $params
		//$this->CI =& get_instance();
	}

   
	public function ValidateAuthorization() // get  access token first to use Payout
	 {
        $papp = paypalsetting('admin');
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $papp['paypalbaseURL'].'oauth2/token');
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_USERPWD, $papp['paypalclientID'].":".$papp['paypalSecret']);
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
			return $jsonData;
		}
   }

	

	    public function PayoutProceedureRequest(  $jsdataWrapper )
        {
               $papp = paypalsetting('admin');
			 	
				$accessToken = $this->ValidateAuthorization();
			    if(empty($accessToken->access_token))
				{
					return false;	
				}
				
				$sender_batch_id = rand()+100;
				$curl = curl_init();		   
				curl_setopt_array($curl, 

				array(

					CURLOPT_URL => $papp['paypalbaseURL']."payments/payouts",
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_ENCODING => "",
					CURLOPT_MAXREDIRS => 10,
					CURLOPT_TIMEOUT => 30,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST => "POST",
					CURLOPT_POSTFIELDS => '{
					 "sender_batch_header": {
						"email_subject": "You have payment in your Paypal account in response of your withdrawl request ",

						"sender_batch_id": '.$sender_batch_id.'

					},
					  "items": '.$jsdataWrapper.'
					}', 

					CURLOPT_HTTPHEADER => array(
						'accept: application/json',
						'authorization: Bearer '.$accessToken->access_token,
						'content-type: application/json'
					),
				  )
			 );
            
			$response = curl_exec($curl);
			$payoutresponse = json_decode($response);
			
			
			if(isset($payoutresponse->name) AND $payoutresponse->name=='INSUFFICIENT_FUNDS')
			{
			  return $payoutresponse;	
				
			}
			
			if(isset($payoutresponse->error) AND $payoutresponse->error=='invalid_token')
			{
			  return $payoutresponse;	
				
			}
			
			//VALIDATION_ERROR
			if(isset($payoutresponse->name) AND $payoutresponse->name=='VALIDATION_ERROR')
			{
			  return $payoutresponse;	
				
			}
			
			$payout_batch_id = 0 ;
			//if(isset($payoutresponse->batch_header->batch_status) AND ($payoutresponse->batch_header->batch_status=='PENDING'))
			//{
			 if(! empty ($payoutresponse->batch_header->batch_status))
			  {
				$payout_batch_id = $payoutresponse->batch_header->payout_batch_id;   
			  }	

			//}
		   sleep(9);
		   $result =  $this->GetPayoutPaymentBatchDetail( $payout_batch_id , $accessToken->access_token );
		   return  $result;
		   
		}

 

		public function GetPayoutPaymentBatchDetail($payout_batch_id,$accessToken)
			{
				$papp = paypalsetting('admin');
			    $curl = curl_init();		   
				curl_setopt_array($curl, 
				array( 
					CURLOPT_URL =>  $papp['paypalbaseURL']."payments/payouts/".$payout_batch_id."",
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_ENCODING => "",
					CURLOPT_MAXREDIRS => 10,
					CURLOPT_TIMEOUT => 30,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST => "GET",
					CURLOPT_HTTPHEADER => array(
						'accept: application/json',
						'authorization: Bearer '.$accessToken,
					),
				  )
				);

				$response = curl_exec($curl);
				$err = curl_error($curl);
				curl_close($curl);
				$payoutpaymentresponse = json_decode($response);
				return $payoutpaymentresponse;

			}

   

	

}