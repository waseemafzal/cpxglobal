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
	
	public function membership_List()
	{
		$aData['page_title'] ='membership_List';
		$aData['membershipList'] = $this->crud->getMembershipData( );
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
				'membership_id'=>rand(),
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

$name=$name. ' '.$middle_name. ' '.$last_name ;
			
			$htmlMessage='<p>Thank you very much for your application to join CPPEx GLOBAL membership platform. Your membership application will be reviewed by our membership executive team within 7 working days and will inform you the status within due processing time.
</p>
<p>In case of application approval, you will be eligible to enjoy our membership related benefits, monthly subscription to newsletter, access to member directly and online library of resources. 
</p>
<p>If you have any questions, comments, concerns, compliments or inquiries you may send an email to membership@cppexglobal.org or approach to our corporate membership office.

</p>
<p>We look forward to getting to know you!
</p><p>Kind regards,
</p>
';

			
			$this->sendEmail(array('to'=>$email,'name'=>$name,'html'=>$htmlMessage));
			$arr = array('status' => 1,'message' => "<h4>Thank you!!! Your Form has been successfully submitted!</h4><p>If you have any other other questions, feel free to call us during normal business hours: 9am to 5pm</p>".'=='.$memship_id);
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
	 	  private function sendEmail($mailData){
        $this->load->library('email');
		$subject='Reply from CPPEx Global';
		 if(isset($mailData['subject']) and $mailData['subject']!=''){
			$subject=$mailData['subject'];
		}
        $to = $mailData['to'];
        $from = 'info@cppexglobal.com';
        $fromName = 'CPPEx Global';
        $htmlContent =$this->setEmailTemplate($mailData);      
  		if($this->crud->send_mail($to,$from,$fromName,$subject,$htmlContent)){
			return true;
		}
    }
    
	
		public function setEmailTemplate($mail){
			$userName='user';
			$footerMessage='CPPEx GLOBAL</p>';
		
		$html='<p>Thanks for the feedback on your experience with our customer based services</p>';
		 /* if(isset($mail['footerMessage']) and $mail['footerMessage']!=''){
			$footerMessage=$mail['footerMessage'];
			}*/
       if(isset($mail['html']) and $mail['html']!=''){
			$html=$mail['html'];
				$html.='<p>Customer Service @ CPPEx GLOBAL</p>';
			}
	 if(isset($mail['name']) and $mail['name']!=''){
			$userName=$mail['name'];
				
			}
		$template='<table bgcolor="#f2f2f2" border="0" cellpadding="0" cellspacing="0" width="100%">
   <tbody>
      <tr>
         <td>
            <div style="max-width:600px;margin:0 auto;font-size:16px;line-height:24px">
               <table border="0" cellpadding="0" cellspacing="0" width="100%">
                  <tbody>
                     <tr>
                        <td>
                           <table border="0" cellpadding="0" cellspacing="0"  width="100%">
                              <tbody>
                                 <tr>
                                    <td>
                                       <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                          <tbody>
                                             <tr>
                                                <td style="background-color:white;padding-top:30px;padding-bottom:30px">
                                                   <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                      <tbody>
                                                         <tr>
                                                            <td align="center" style="padding-top:0;padding-bottom:20px"> <a > <img src="'.base_url().'frontend/images/logo.png" alt="" width="104" height="30" style="vertical-align:middle" class="CToWUd"> </a> </td>
                                                         </tr>
                                                         <tr>
                                                            <td  style="font-family:Helvetica,Arial,sans-serif!important;font-size:16px;line-height:24px;word-break:break-word;padding-left:20px;padding-right:20px;padding-top:20px;padding-bottom:20px">
                                                               <h3 style="margin-top:0;margin-bottom:0;font-family:"Montserrat",Helvetica,Arial,sans-serif!important;font-weight:700;font-size:20px;line-height:30px;color:#222"></h3>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td   style="font-family:Helvetica,Arial,sans-serif!important;font-size:16px;line-height:24px;word-break:break-word;padding-left:20px;padding-right:20px;padding-top:20px"> Dear '.$userName.', </td>
                                                         </tr>
                                                         
                                                         <tr>
                                                            <td   style="font-family:Helvetica,Arial,sans-serif!important;font-size:16px;line-height:24px;word-break:break-word;padding-left:20px;padding-right:20px;padding-top:20px"> '.$html.'</td>
                                                         </tr>
                                                        
                                                         
                                                      </tbody>
                                                   </table>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                  </tbody>
               </table>
               <table border="0" cellpadding="0" cellspacing="0" width="100%">
                  <tbody>
                     <tr>
                        <td align="center" width="100%" style="color:#656565;font-size:12px;line-height:24px;padding-bottom:30px;padding-top:30px">
                           <div style="font-family:Helvetica,Arial,sans-serif!important;word-break:break-all" >
                              '.$footerMessage.'
                           </div>
                           
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </td>
      </tr>
   </tbody>
</table>';
		return $template;
		}

}
