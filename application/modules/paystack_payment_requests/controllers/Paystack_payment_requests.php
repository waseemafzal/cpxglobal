<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Paystack_payment_requests extends MX_Controller {

	

	public function __construct(){

		parent::__construct();

		if(!$this->session->userdata('login')==true){

			redirect('auth/login', 'refresh');

		}
		$this->load->library('paystack/paystackapis','paystackapis');

	}

	public $view = "view";

	public $payment_requests_paystack = 'payment_requests_paystack';
	public $users = 'users';
	public $tbl_paystack_user_info = 'tbl_paystack_user_info';
	

	public function index()
	{  
	    $aData['data'] = $this->db->query('SELECT O.*,U.name,U.phone,O.status 
		    FROM `'.$this->payment_requests_paystack.'` as O 
		    INNER JOIN '.$this->users.' as U on U.id = O.user_id'
		);
		
		$aData['avilablebalance'] = $this->paystackapis->AvilableBalance();
	    $this->load->view($this->view,$aData);
	}
	
	
	  public function payment_transfer_process()
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
		
		
		$data =$this->db->query("SELECT PRP.amount,TPUI.recepient_no FROM `".$this->payment_requests_paystack."` AS PRP 
				INNER JOIN ".$this->tbl_paystack_user_info." AS TPUI ON TPUI.user_id = PRP.user_id  
				WHERE PRP.id IN (".$ids.") AND PRP.status = ".PENDING."");
	
		$requestuseremails = array(); 
		$requestuseramount = array(); 
		if($data->num_rows() > 0)
		{
			foreach ($data->result() as $row)
			{
				$aRecepientno[] = $row->recepient_no;
				$aAmount[] = $row->amount;
			}
			 
			
			$aPaystackqueue  = array();
			if ((is_array($aRecepientno)) AND count($aRecepientno) > 0) 
			{
				$receiver = array();
				$exchangerate  = getcurrencyrate('USD','NGN');  
				$aTransferqueue = array('currency'=>'NGN','source'=>'balance');
				for ($index = 0; $index < count($aRecepientno); $index++) 
				{
                        $convertertedamount = $aAmount[$index] * $exchangerate;
						
						$aPaystackqueue[]  = array( "amount"=>($convertertedamount * 100),
						"recipient"=>$aRecepientno[$index]
							
						 );
				}
				
				$aTransferqueue = array_merge($aTransferqueue,array('transfers'=>$aPaystackqueue));
		     }
			    
				$jsTaTransferqueue =  json_encode($aTransferqueue);
				$result = $this->paystackapis->PaystackTransfer( $jsTaTransferqueue );
				$this->session->set_userdata('paystack_paymentresponse', $result);
				
				$arr = array('status' => 1,'message' => "Process completed");

				echo json_encode($arr);
				
				die();
		   }
	    }
         
		 
		   
		public function processsuccess()
		{
			$this->load->view('success');
		}
 
 
 
 
 
 
 }



