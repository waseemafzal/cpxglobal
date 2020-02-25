<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membership extends CI_Controller {


	private  $tbl_membershippackage ='tbl_membershippackage';
	private  $tbl_personal_detail ='tbl_personal_detail';
	private  $tbl_company_detail ='tbl_company_detail';
	private  $tbl_professional_education_detail ='tbl_professional_education_detail';
	private  $tbl_reffered_by ='tbl_reffered_by';
	public $tbl_order_payments  = 'tbl_order_payments';
	public $order  = 'order';
	
	
	  
	  function __construct()
	{
		parent::__construct();
			 define('IMG', base_url() . 'uploads/');
	}
	
	public function form(){
			$aData['page_title'] ='Form membership';

		$this->load->view('membership_form');
	
	}
public function why_membership(){
	$aData['page_title'] ='why membership';
		$this->load->view('why_membership',$aData);	
	}
public function membership_categories(){
	$aData['page_title'] ='membership categories';
		$this->load->view('membership_categories',$aData);	
	}
public function membership_benefits(){
	$aData['page_title'] ='membership benefits';
		$this->load->view('membership_benefits',$aData);	
	}
public function membership_List(){
	$aData['page_title'] ='membership_List';
		$this->load->view('membership_List',$aData);	
	}
public function membership_Associate(){
	$aData['page_title'] =' Associate Membership';
		$this->load->view('membership_Associate',$aData);	
	}
public function membership_corporate(){
	$aData['page_title'] ='corporate membership ';
		$this->load->view('membership_corporate',$aData);	
	}
public function membership_individual(){
	$aData['page_title'] ='individual membership';
		$this->load->view('membership_individual',$aData);	
	}
public function student_membership(){
	$aData['page_title'] ='student membership';
		$this->load->view('membership_student',$aData);	
	}

     public   function Membership_create()
	 { 
		extract($_POST);
	
		$result=0;
	    $PrimaryID = base64_decode($_POST['id']);
		unset($_POST['action'],$_POST['id']);
		/*$this->load->library('form_validation');
		$this->form_validation->set_rules('service_title', '<i class="glyphicon glyphicon-arrow-right"></i> Service Title', 'trim|required|min_length[10]|max_length[60]');
		 
		$this->form_validation->set_rules('category_id', '<i class="glyphicon glyphicon-arrow-right"></i> Service category', 'trim|required');
		$this->form_validation->set_rules('description', '<i class="glyphicon glyphicon-arrow-right"></i> description', 'trim|required');
		$this->form_validation->set_rules('price', '<i class="glyphicon glyphicon-arrow-right"></i> Price', 'trim|required|max_length[7]');
		$this->form_validation->set_rules('delivery_time', '<i class="glyphicon glyphicon-arrow-right"></i> Delivery Time', 'trim|required'); */
		

		//price
		
		/*if ($this->form_validation->run()==false)
		{
			$arr = array("status"=>"validation_error" ,"message"=> validation_errors());
			echo json_encode($arr);
		}*/
		//else
		//{   
		    $adata = array(
				'user_id'=>$this->session->userdata('user_id'),
				'hear_about'=>json_encode($hear_about),
				'membership_type'=>$membership_type,
				'hear_about'=>json_encode($hear_about),
				'created_date'=>NOW
			);
			
	        $result = $this->crud->saveRecord( '',$adata,$this->tbl_membershippackage );
			$memship_id  = $this->db->insert_id();
			
			if(!empty($memship_id))
			{
				$aPdata = array(
					'memship_id'=>$memship_id,
					'name'=>$name,
					'middle_name'=>$middle_name,
					'last_name'=>$last_name,
					'email'=>$email,
					'mobile'=>$mobile,
					'fax'=>$fax,
				);  	
			   $result = $this->crud->saveRecord( '',$aPdata,$this->tbl_personal_detail );
			   
				$aCompnaydata = array(
					'memship_id'=>$memship_id,
					'company_name'=>$company_name,
					'principle_bussniss'=>$principle_bussniss,
					'number_of_employees'=>$number_of_employees,
					'address'=>$address,
					'country'=>$country,
					'zip'=>$zip,
				);  	
				$this->crud->saveRecord( '',$aCompnaydata,$this->tbl_company_detail );
				
				
				$aEducationProfessionalddata = array(
					'memship_id'=>$memship_id,
					'university'=>$university,
					'degree'=>$degree,
					'diploma'=>$diploma,
					'other'=>$other,
					'job_detail'=>json_encode($job_detail),
				);  
				
				$this->crud->saveRecord( '',$aEducationProfessionalddata,$this->tbl_professional_education_detail );
				
				
				$aReffereddata = array(
					'memship_id'=>$memship_id,
					'refferby_detail'=>json_encode($refferby_detail),
				);  	
				$result = $this->crud->saveRecord( '',$aReffereddata,$this->tbl_reffered_by );
				
			}
			
			switch($result){
			case 1:


			$arr = array('status' => 1,'message' => "Your information have been submit to us, Continue to complete Purchase.".'=='.$memship_id);
			echo json_encode($arr);
			break;
			case 2:
			$arr = array('status' => 2,'message' => "Your services has been  Updated Succefully !");
			echo json_encode($arr);
			break;
			case 0:
			$arr = array('status' => 0,'message' => "Not Saved!");
			echo json_encode($arr);
			break;
			default:
			$arr = array('status' => 0,'message' => "Not Saved!");
			echo json_encode($arr);
			break;	
		}
	 }
	 
	 // 
	 
	 
	 	public function paymentprocessing()
		{
		
		  
		  
		    if(is_array($this->input->get())  and count($this->input->get()) > 0)
			{
				
			
				$aSellerbalanceaccount = array();
				$this->load->library('paypal/paypalexpress','paypalexpress');
				$paymentresult = $this->paypalexpress->paymentprocess( $this->input->get() );
				$redirectStr = ''; 
				
				if($paymentresult && $paymentresult->state == 'approved')
				{
					
					$id = $paymentresult->id;
					$state = $paymentresult->state;
					$payerFirstName = $paymentresult->payer->payer_info->first_name;
					$payerLastName = $paymentresult->payer->payer_info->last_name;
					$payerName = $payerFirstName.' '.$payerLastName;
					$payerEmail = $paymentresult->payer->payer_info->email;
					$payerID = $paymentresult->payer->payer_info->payer_id;
					$payerCountryCode = $paymentresult->payer->payer_info->country_code;
					$paidAmount = $paymentresult->transactions[0]->amount->details->subtotal;
					$currency = $paymentresult->transactions[0]->amount->currency;
				    $create_time = str_replace('T',' ', str_replace('Z',' ',$paymentresult->create_time));
					
					    $membershipID_43782_noncceekey = $this->input->get('membershipID_43782_noncceekey');
						$membership_type = get_id_by_key('membership_type','id',
						$this->input->get('membershipID_43782_noncceekey'),$this->tbl_membershippackage );
						
						$data_array = array('payment_status'=>1);
						$this->db->where('id', $membershipID_43782_noncceekey);
						$this->db->update($this->tbl_membershippackage, $data_array);
						// update payment status 
						
						if($membership_type==1)
						{
							$packageprice = PACKAGE_1;  	
						}
						else
						if($membership_type==2)
						{
							$packageprice = PACKAGE_2;  	
						}
						else
						if($membership_type==3)
						{
							$packageprice = PACKAGE_3;  	
						}
						else
						if($membership_type==4)
						{
							$packageprice = PACKAGE_4;  	
						}
				
					if((int)$packageprice >= (int)$paidAmount)
					{
					
						$data = array(
							'txn_id' => $id,
							'payment_gross' => $paidAmount,
							'currency_code' => $currency,
							'payer_id' => $payerID,
							'payer_name' => $payerName,
							'payer_email' => $payerEmail,
							'payer_country' => $payerCountryCode,
							'payment_status' => $state,
							'created' => $create_time
						);
						
						
						if(!empty($membershipID_43782_noncceekey))
						{
						  $data =  array_merge(array('memship_id'=>$membershipID_43782_noncceekey),$data);	
						}
						
						// customorderid
						
						$dbExi = $this->db->insert($this->tbl_order_payments,$data);
						$insert =  $this->db->insert_id(); // get inserted id
						//order 
						if(! empty($insert))
						{
						    
							$orderdata  = array (
									'user_id'=>$this->session->userdata('user_id'),
									'created_on'=>$create_time,
									'amount'=> $paidAmount,
									'status'=>1,
									'orderNo'=>uniqid(),
									'payment_id'=>$insert,
									'payment_method'=>'paypal',
									'memship_id'=> $membershipID_43782_noncceekey
								);
							 
							// $orderdata =  array_merge(array('seller_offer_request_id'=>$requestid),$orderdata);	
							 $aSellerbalanceaccount =  array_merge(array('payment_method'=>PAYPAL),$aSellerbalanceaccount);	 // arslan
						     $orderinserted  = $this->db->insert($this->order,$orderdata); // order has been inseted... 
							 $orderid =  $this->db->insert_id(); // get inserted id	 // arslan
							 $aSellerbalanceaccount =  array_merge(array('order_id'=>$orderid),$aSellerbalanceaccount);	 // arslan
						}
						
						$redirectStr = $insert;
					}
					
					
					 redirect(base_url().'membership/orderstatus/'.$redirectStr); 
		    }
			redirect( base_url()); 
		 }
		 
	  else
	  exit('Not Valid...!');
			
   }
  
	 
	  public function orderstatus($orderid)
	{
	     uriv($orderid,'Not received any order...!'); // offerservicedetail	
		 
		 $data['orderdata'] = $this->db->select('*')->from($this->tbl_order_payments )->where('id',$orderid)->get()->row();
		 $this->load->view('payment-status',$data);
		
	}
	 
	
	
}
