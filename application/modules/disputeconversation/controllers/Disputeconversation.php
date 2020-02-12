<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disputeconversation extends MX_Controller {
	
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('login')==true){
			redirect('auth/login', 'refresh');
		}
	}
	
	public $view = "disputeconversationpage";
	public $tbl = 'cms';
	public $tbl_dispute_conversation = 'tbl_dispute_conversation';
	public $order = 'order';
	public $tbl_dispute = 'tbl_dispute';
	
	
	public function index($id){ 
	
	
		$aData  = array();
		$aData['orderdispute']   = $orderdispute = $this->crud->getorderdispute( $id);
		if($orderdispute==0)
		{
		  redirect(base_url().'disputedorder');
		  exit;	
		}
		
		$aData['disputechatdata'] =$this->crud->disputechatdata( (object) array('order_id'=>$orderdispute->id ,
		'order_type'=>$orderdispute->order_type,'custom_order_id'=>$orderdispute->custom_order_id,'seller_offer_request_id'=> $orderdispute->seller_offer_request_id,'buyer_id'=> $orderdispute->buyer_id,'dispute_id'=> $orderdispute->dispute_id)    ); 
		
		
		$this->load->view($this->view,$aData);
	}
	
	
	
	public function sendreplybyadmin()
	  {
		
		if(!$this->session->userdata('login')==true){
			$arr = array("status"=>"validation_error" ,"message"=> 'You are not logedIn');
			echo json_encode($arr);exit;
		}
		
		extract($_POST);
		$PrimaryID = $_POST['id'];
		unset($_POST['action'],$_POST['id']);
		$this->load->library('form_validation');
	    
		$this->form_validation->set_rules('admin_messge', 'Message', 'trim|required');
		
		if ($this->form_validation->run()==false)
		{
			$arr = array("status"=>"validation_error" ,"message"=> validation_errors());
			echo json_encode($arr);
		}
		else
		{      
		
		
		
		$aDisputeconversation = array(
			'dispute_id'=>$disputed_id,
			'from_id '=>$from_id,
			'to_id'=>$to_id,
			'message'=> trim($admin_messge),
			'created_date'=>NOW,
		);
		
		$result = $this->crud->saveRecord('',$aDisputeconversation,$this->tbl_dispute_conversation);	
			if($result)
			{
				$htmlMessage = '<li><p class="adminp"><a href="#" class="admin_c">admin: </a>'.trim($admin_messge).'</p></li> <li>&nbsp;</li>';	
			}
			   
			
		switch($result){
			case 1:
			$arr = array('status' => 1,'message' => $htmlMessage);
			echo json_encode($arr);
			break;
			case 2:
			$arr = array('status' => 2,'message' => "Your work has been delivered again");
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

	} 
   
   public function deletedisputeconversation_and_reset_order()
   {
	   extract($_POST);
	   
		$this->db->where('id',$orderid )->update($this->order,array('status'=>ACTIVE));
		$this->db->where('id', $disputeid);
		$this->db->delete($this->tbl_dispute) ;
		
		$this->db->where('dispute_id', $disputeid);
		$this->db->delete($this->tbl_dispute_conversation) ; 
		
		
		$arr = array("status"=>1 ,"message"=>'This order has been reset now.');
		echo json_encode($arr);
		exit;
	}
	
	public function refund_payment_to_paypal()
	{

       extract($_POST);
	   if(isset($paymentto) AND !empty($paymentto))
	   {
	   $orderPrice = get_id_by_key('amount','id',$order_id_hidden,$this->order );
	   $pricewithoutservicecharges  = calculateprocessingformula($orderPrice ,true);
	   if((int)$payal_amount > (int)$pricewithoutservicecharges)
	   {
			$arr = array('status' => 0,'message' => 'Entered amount cannot greater then Order amount.');
			echo json_encode($arr); 
			die();  
	   }
	   
		//update order status to refund
		$this->db->where('id', $order_id_hidden);
		$this->db->update('order', array('refund_to_id'=>$paymentto,'status'=>REFUNDED));
		//update order status to refund
	   
	  
	   
	   
	    $sender_item_id = rand();
		$this->load->library('paypal/paypalpayout','paypalpayout');
		$receiverList  ='';
			$rPayout[]  = array(
				'recipient_type'=>"EMAIL",
				"amount"=>array
			(
				"value"=>$payal_amount,
				'currency'=>'USD'
			),
				"receiver"=>$payal_email,
				"note"=>"Payouts sample transaction",
				"sender_item_id"=>$sender_item_id,
			);
				
			$jsdataWrapper =  json_encode($rPayout);
			$result = $this->paypalpayout->PayoutProceedureRequest( $jsdataWrapper );
			$this->session->set_userdata('payout_paymentresponse_refund', $result);
			$this->session->set_userdata('payout_paymentresponse_email', $result);
			$this->session->set_userdata('payout_paymentresponse_amount', $result);
			echo 1;
			die();
	    }
		else
		{
		  echo 0;
		  die();	
			
	    }
			
	  }
	
	
	
	  public function refund_payment_via_paystack()
	  {
	    	$this->load->library('paystack/paystackapis','paystackapis');
			
			
			
			extract($_POST);
			$aPaystackqueue  = array();
			if (! empty($order_id_hidden)) 
			{
				
				if(!empty($paymentto) AND ($paymentto!='|'))
				{
				    
					$apaymentto = explode("|",$paymentto);
					$userid = $apaymentto[0];
					$recepientNo = $apaymentto[1];

					//update order status to refund
					$this->db->where('id', $order_id_hidden);
					$this->db->update('order', array('refund_to_id'=>$userid,'status'=>REFUNDED));
					//update order status to refund
					
					$receiver = array();
					$exchangerate  = getcurrencyrate('USD','NGN');  
					$aTransferqueue = array('currency'=>'NGN','source'=>'balance');
					$convertertedamount = $paystack_amount * $exchangerate;
					$aPaystackqueue  = array( "amount"=>($convertertedamount * 100),"recipient"=>$recepientNo);
					$aTransferqueue = array_merge($aTransferqueue,array('transfers'=>$aPaystackqueue));
				 
					$jsTaTransferqueue =  json_encode($aTransferqueue);
					$result = $this->paystackapis->PaystackTransfer( $jsTaTransferqueue ); 
					$this->session->set_userdata('paystack_paymentresponse_refund', $result);
					$this->session->set_userdata('paystack_paymentresponse_refund_email', $paystack_email);
					$this->session->set_userdata('paystack_paymentresponse_refund_amount', $convertertedamount);
					
					echo 1;
					die();
				}
				else
				{
					echo 0;
					die();
					
				}
		      }
			
		
	}
	
	
	   
	   // paypal
	    public function processsuccesspaypal()
		{
			$this->load->view('successpaypal');
		}
		// paystack
		public function processsuccesspaystack()
		{
			$this->load->view('successpaystack');
		}

	

	
	
}
