<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Withdrawlrequest extends MX_Controller {
	
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('login')==true){
			redirect('auth/login', 'refresh');
		}
	}
	public $view = "view";
	public $tbl = 'cms';
	public $payment_requests = 'payment_requests';
	
	
	public function index(){  

		$aData['data'] =$this->db->query("SELECT p.* FROM cms as p");
		$this->load->view($this->view,$aData);
	}
	
	
	public function process()
	{
		$ids  = '';
		if(is_array($_POST['ids']) AND count ($_POST['ids']) > 0 )
		{
		  $ids = implode(',',$_POST['ids']); 
		}
		
		if( empty ($ids))
		{
			$arr = array('status' => 0,'error' => 'No selection has been made yet.');
			echo json_encode($arr);
			exit;	
		}
		

		$data =$this->db->query("SELECT DISTINCT email,SUM(amount) AS amount FROM ".$this->payment_requests." WHERE id IN (".$ids.") AND status=".PENDING." GROUP BY email");
		
		

		$requestuseremails = array(); 
		$requestuseramount = array(); 
		if($data->num_rows() > 0){
			foreach ($data->result() as $row){
				$requestuseremails[] = $row->email;
				$requestuseramount[] = $row->amount;
			}
		
		}

		$this->session->unset_userdata('pay_key'); // unset pay_key
		require_once APPPATH."third_party/paypalwithdrawalprocess/PPBootStrap.php";
		define('PAYPAL_REDIRECT_URL', 'https://www.sandbox.paypal.com/webscr&cmd=');
		define('DEVELOPER_PORTAL', 'https://developer.paypal.com');
		$returnUrl = base_url()."withdrawlrequest/processsuccess";
		$cancelUrl = base_url()."/paypal_payment_requests"; // on cancel
		
		$memo = "Skillsquared freelancers platform-Withdraw Handler";
		$actionType = "PAY"; // action type 
		$currencyCode = "USD";  // currency code
		
		$receiverEmail = $requestuseremails;
		$receiverAmount = $requestuseramount;
		
		
			$receiverList  ='';
			if (isset($receiverEmail)) 
			{
				
				$receiver = array();
				for ($i = 0; $i < count($receiverEmail); $i++) 
				{
					$receiver[$i] = new Receiver();
					$receiver[$i]->email = $receiverEmail[$i];
					$receiver[$i]->amount = $receiverAmount[$i];
				}
				 $receiverList = new ReceiverList($receiver);
			}
		
		  
		
		    $payRequest = new PayRequest( new RequestEnvelope("en_US"), $actionType, $cancelUrl, $currencyCode, $receiverList, $returnUrl);
			$payRequest->memo = $memo;
			$service = new AdaptivePaymentsService(Configuration::getAcctAndConfig());
			
			try 
			{
				/* wrap API method calls on the service object with a try catch */
				$response = $service->Pay($payRequest);
				$ack = strtoupper($response->responseEnvelope->ack);
				if ($ack == "SUCCESS") 
				{
					$payKey = $response->payKey;
					$this->session->set_userdata('pay_key', $payKey);
					$payPalURL = PAYPAL_REDIRECT_URL . '_ap-payment&paykey=' . $payKey;
					//redirect($payPalURL); 
				  
				   $arr = array('status' => 1,'redirection' => $payPalURL);
				   echo json_encode($arr);
				   exit;
				}
			}  
			catch (Exception $ex) 
			{
			 require_once APPPATH."third_party/paypalwithdrawalprocess/Common/Error.php";
			 exit;
			}

	}
	
	   // success url
	
		public function processsuccess()
		{
			$this->load->view('success');
		}
		
		
	
	
	
	
  }
