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
		$result = false;
		
		if($result == false)
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
		

		$data =$this->db->query("SELECT DISTINCT email,SUM(amount) AS amount FROM ".$this->payment_requests." 
		WHERE id IN (".$ids.") AND status=".PENDING." GROUP BY email");
		
		

		$requestuseremails = array(); 
		$requestuseramount = array(); 
		if($data->num_rows() > 0)
		{
			foreach ($data->result() as $row)
			{
				$requestuseremails[] = $row->email;
				$requestuseramount[] = $row->amount;
			}
		
		}
       
		
  

		$sender_item_id = rand().rand();
		$this->load->library('paypal/paypalpayout','paypalpayout');
		$receiverEmail = $requestuseremails;
		$receiverAmount = $requestuseramount;
		
		
			$receiverList  ='';
			if (isset($receiverEmail) AND count($receiverEmail) > 0) 
			{
				
				$receiver = array();
				for ($i = 0; $i < count($receiverEmail); $i++) 
				{
						$rPayout[]  = array(
						'recipient_type'=>"EMAIL",
							"amount"=>array
							(
								"value"=>$receiverAmount[$i],
								'currency'=>'USD'
							),
							"receiver"=>$receiverEmail[$i],
							"note"=>"Payouts sample transaction",
							"sender_item_id"=>$sender_item_id,
						);
					
					
					
					$sender_item_id++;
				}
			}
		     $jsdataWrapper =  json_encode($rPayout);
			 $this->paypalpayout->PayoutProceedureRequest( $jsdataWrapper );
			
		  }
		 $GLOBALS['hotel_amenities'] = 'hotel_amenitieshotel_amenitieshotel_amenities'; 
		 		
				// $this->session->userdata('itemm') =  'gfdgdfgdfgd444----';
				 $this->session->set_userdata('itemm', 'some_value');
		  echo 1;
		  
		 // redirect( base_url()); 
		  //exit;
		 // $arr = array('status' 'Withdrawlrequest/processsuccess/'=> 1,'data' => $this->load->view('success'));
			//echo json_encode($arr);
			
			
			
	  }
	
	   // success url
	
		public function processsuccess()
		{
			$this->load->view('success');
		}
		
		
	
	
	
	
  }
