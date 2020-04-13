<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
    
    public $tbl_feedback='tbl_feedback';
	public $tbl_contacts='tbl_contacts';
	public $tbl_complaints='tbl_complaints';
	public $tbl_registration='tbl_registration';
	public $tbl_order_payments  = 'tbl_order_payments';
	public $order  = 'order';
	
	
	
   
    function __construct() {
        parent::__construct();
        
        // Load form validation library
        $this->load->library('form_validation');
    }
    
    public function index(){
		
			
		
        $data = $formData = array();
         // pre($this->input->post());
        // If contact request is submitted
        if(isset($_POST['contactsubmit'])){
          extract($_POST);
            // Form field validation rules
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('subject', 'Subject', 'required');
            $this->form_validation->set_rules('phone', 'phone', 'required');
            $this->form_validation->set_rules('message', 'Message', 'required');
            
            // Validate submitted form data
            if($this->form_validation->run() == true){
             
                // Send an email to the site admin
                $send = $this->sendEmail($_POST);
                
                // Check email sending status
                if($send){
                    // Unset form data
                    $formData = array();
                    
                    $data['status'] = array(
                         'type' => 'success',
                         'msg' => 'Your contact request has been submitted successfully.'
                    );
                }else{
                    $data['status'] = array(
                        'type' => 'error',
                        'msg' => 'Some problems occured, please try again.'
                    );
                }
            }
        }
        
        // Pass POST data to view
        $data['postData'] = $formData;
        $data['page_title'] = 'contact us';
        // Pass the data to view
        $this->load->view('contact', $data);
    }
    
	
	public function feedback(){
		$this->load->view('feedback', $data);
    }
  public function complaint(){
		$this->load->view('complaint', $data);
    }
  public function registration(){
		$this->load->view('registration', $data);
    }
    
	  public   function saveFeedback()
	  { 
		//pre($_POST);
		
		extract($_POST);
		$result=0;
	    $PrimaryID = base64_decode($_POST['id']);
		unset($_POST['action'],$_POST['id']);
		

		
				$aFeedBack = array(
					//'user_id'=>$this->session->userdata('user_id'),
					'particpient_detail'=>json_encode($particpient_detail),
					'product_detail'=>json_encode($product_detail), 
					'instruction_training'=>json_encode($instruction_training),
					'instruction_department'=>json_encode($instruction_department),
					'instruction_venue_procedure'=>json_encode($instruction_venue_procedure),
					'like_and_suggestion'=>json_encode($like_and_suggestion),
				);
				if( $this->crud->saveRecord( '',$aFeedBack,$this->tbl_feedback ))
				{
				 $result=1;	
				}
			switch($result){
			case 1:
			$name=$_POST['particpient_detail']['employee_name'];
			$email=$_POST['particpient_detail']['email'];
			$htmlMessage.='<p>Thanks for the feedback on your experience with our customer based services. Our goal is to improve our service any way we can, and we appreciate your taking the time to fill out our feedback form. 

</p>
<p>Feedback like this helps us constantly improve our customer experiences by knowing what we are doing right and what we can work on. We sincerely appreciate your insight because it helps us build a better customer experience.
</p><p>If you have any more questions, comments, or concerns or compliments, please feel welcome to reach back out as we would be more than happy to assist.
</p>
';
$htmlMessage.='<p>We look forward to getting to know you!
<p>';$htmlMessage.='<p>Kind regards,
<p>';
			$htmlMessage.='<br><br>';
			$this->sendEmail(array('to'=>$email,'name'=>$name,'html'=>$htmlMessage));
		
			$arr = array('status' => 1,'message' => "<h4>Thank you!!! Your Form has been successfully submitted!</h4><p>If you have any other other questions, feel free to call us during normal business hours: 9am to 5pm</p>");
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
	 
	
	 
	 public   function registration_create()
	 { 
		
		extract($_POST);
		//pre($personal_detail);
		$result=0;
	    $PrimaryID = base64_decode($_POST['id']);
		unset($_POST['action'],$_POST['id']);
		
		
		$courseAmount  = COURSE_PRICE;
		$no_of_persons = count($_POST['personal_detail']['name']); // no of detail
		$totalPrice = ((int)$no_of_persons * (int)COURSE_PRICE);
		//no_of_persons 	payment_total 	discounted_price 	personal_detail 	company_detail 	finanace_detail 	created_on
           
			$discounted_price  =  0;	
			if($no_of_persons>=2 and $no_of_persons<=4)
			{
				$discounted_price  =  (($totalPrice * 15)/100);
			}
			else
			if($no_of_persons>=5 and $no_of_persons<=10)
			{
				$discounted_price  =  (($totalPrice * 25)/100);
			}
		
	
		   $price_now = ($totalPrice - $discounted_price);	
		   	   
		   $adata = array(
				'no_of_persons'=>$no_of_persons,
				'payment_total'=>$totalPrice,
				'discounted_price'=>$discounted_price,
				'price_now'=>$price_now,
				'personal_detail'=>json_encode($personal_detail),
				'company_detail'=>json_encode($company_detail),
				'finanace_detail'=>json_encode($finanace_detail),
				'created_on'=>NOW
			);
			
			$result = $this->crud->saveRecord( '',$adata,$this->tbl_registration );
			$register_id  = $this->db->insert_id();
			$price_now  = $price_now;
			
				 
				
			
			
			switch($result){
			case 1:


			//$arr = array('status' => 1,'message' => "Your information have been submit to us, Continue to complete Purchase.".'=='.$price_now);
			$arr = array(
			'status' => 1,
			'message' => "<h4>Thank you!!! Your Form has been successfully submitted!</h4><p>If you have any other other questions, feel free to call us during normal business hours: 9am to 5pm</p>",
			'bag' => array('register_id'=>$register_id,'price_now'=>$price_now)
			);
			/********************************/
			$emailArr= $personal_detail['email'];
			$nameArr= $personal_detail['name'];
			$count=count($emailArr);
			for ($i = 0; $i <= $count; $i++) {
			$name=$nameArr[$i] ;
			$email=$emailArr[$i];
			$htmlMessage='<p>Thanks for registering your complaint with our customer services team and we are sorry that you are unhappy with our products or services. Letting us know means we can record your complaint and work with you to understand what’s happened and how we can put things right.
</p>
<p>We will acknowledge in writing, your complaint within maximum 5 days of receipt. If a complaint is missing any necessary information, you will be informed and allowed an additional 15 days to supply the missing information. If the required information is not submitted within that time, the request shall be closed.</p>
<p>Your all information pertaining to the complaint will remain confidential!
</p>
<p>We look forward to getting to know you!
</p><p>Kind regards,
</p>
';
$this->sendEmail(array('to'=>$email,'name'=>$name,'html'=>$htmlMessage));
			
			}
			
			/***********************************/
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
	 
	 
	 
	 
	
	  
	  public   function saveContactForm()
	  { 
		extract($_POST);
		$result=0;
	    $PrimaryID = base64_decode($_POST['id']);
		unset($_POST['action'],$_POST['id']);
		


		$aContactUs['firstname'] =$_POST['firstname'];
		$aContactUs['lastname'] =$_POST['lastname'];
		$aContactUs['email'] =$_POST['email'];
		$aContactUs['otherinfo'] =json_encode($_POST['otherinfo']);
		$aContactUs['message'] =$_POST['message'];
				
				if (isset($_FILES['image']['name']) and !empty($_FILES['image']['name'])) 
				{
				$imgcheck = true;
				$info = pathinfo($_FILES['image']['name']);
				$ext = $info['extension']; // get the extension of the file
				if(in_array($ext,array('pdf','docs','rtf','jpg','png')))
					{
						$newname = rand(5, 3456) * date(time()) . "." . $ext;
						$target = 'uploads/' . $newname;
						if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) 
						{
							$image = $newname;
						}
						$aContactUs = array_merge(array('userfile'=>$image),$aContactUs);
					
					}
					else
					{
					
						$arr = array("status"=>'0' ,"message"=> 'Invaild file type');
						echo json_encode($arr); 
						exit; 
					
					}
				}
				
				
				  	
				if( $this->crud->saveRecord( '',$aContactUs,$this->tbl_contacts ))
				{
				 $result=1;	
				}
				
				
			
			
			switch($result){
			case 1:
			$name=$_POST['firstname']. ' '.$_POST['lastname'];
			$email=$_POST['email'];
			$htmlMessage.='<p>We have received your message and would like to thank you for writing to us. If your inquiry is urgent, please use the telephone number listed on our website to talk to one of our staff members. Otherwise, we will reply by email as soon as possible.
<p>';
$htmlMessage.='<p>We look forward to getting to know you!
<p>';$htmlMessage.='<p>Kind regards,
<p>';
			
			$this->sendEmail(array('to'=>$email,'name'=>$name,'html'=>$htmlMessage));
		
			$arr = array('status' => 1,'message' => "<h4>Thank you!!! Your Form has been successfully submitted!</h4><p>If you have any other other questions, feel free to call us during normal business hours: 9am to 5pm</p>");
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
	 
	  
	  
	   public   function saveComplaintForm()
	   { 
	   
	    
		extract($_POST);
		$result=0;
	    $PrimaryID = base64_decode($_POST['id']);
		unset($_POST['action'],$_POST['id']);
		



				$_POST['other_address'] =  json_encode($_POST['other_address']);
				if (isset($_FILES['image']['name']) and !empty($_FILES['image']['name'])) 
				{
				$imgcheck = true;
				$info = pathinfo($_FILES['image']['name']);
				$ext = $info['extension']; // get the extension of the file
				if(in_array($ext,array('pdf','docs','rtf','jpg','png')))
					{
						$newname = rand(5, 3456) * date(time()) . "." . $ext;
						$target = 'uploads/' . $newname;
						if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) 
						{
							$image = $newname;
						}
						$_POST = array_merge(array('userfile'=>$image),$_POST);
					
					}
					else
					{
					
						$arr = array("status"=>'0' ,"message"=> 'Invaild file type');
						echo json_encode($arr); 
						exit; 
					
					}
				}
				
				
				  	
				if( $this->crud->saveRecord( '',$_POST,$this->tbl_complaints ))
				{
				 $result=1;	
				}
				
				
			
			
			switch($result){
			case 1:
			$name=$_POST['first_name']. ' '.$_POST['last_name'] ;
			$email=$_POST['email'];
			$htmlMessage='<p>Thanks for registering your complaint with our customer services team and we are sorry that you are unhappy with our products or services. Letting us know means we can record your complaint and work with you to understand what’s happened and how we can put things right.
</p>
<p>We will acknowledge in writing, your complaint within maximum 5 days of receipt. If a complaint is missing any necessary information, you will be informed and allowed an additional 15 days to supply the missing information. If the required information is not submitted within that time, the request shall be closed.</p>
<p>Your all information pertaining to the complaint will remain confidential!
</p>
<p>We look forward to getting to know you!
</p><p>Kind regards,
</p>
';

			
			$this->sendEmail(array('to'=>$email,'name'=>$name,'html'=>$htmlMessage));
			$arr = array('status' => 1,'message' => "<h4>Thank you!!! Your Form has been successfully submitted!</h4><p>If you have any other other questions, feel free to call us during normal business hours: 9am to 5pm</p>");
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
					
					   $RegisetrKey_43782_noncceekey = $this->input->get('RegisetrKey_43782_noncceekey');
						$price_now = get_id_by_key('price_now','id',
						$this->input->get('RegisetrKey_43782_noncceekey'),$this->tbl_registration );
						
						$data_array = array('payment_status'=>1);
						$this->db->where('id', $RegisetrKey_43782_noncceekey);
						$this->db->update($this->tbl_registration, $data_array);
						// update payment status 
						
						
				
					if((int)$price_now >= (int)$paidAmount)
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
						  $data =  array_merge(array('memship_id'=>$RegisetrKey_43782_noncceekey),$data);	
						}
						
						// customorderid
						
						$dbExi = $this->db->insert($this->tbl_order_payments,$data);
						$insert =  $this->db->insert_id(); // get inserted id
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
									'payment_type'=>2, // for resgitration
									'memship_id'=> $RegisetrKey_43782_noncceekey
								);
							 
							// $orderdata =  array_merge(array('seller_offer_request_id'=>$requestid),$orderdata);	
							 $aSellerbalanceaccount =  array_merge(array('payment_method'=>PAYPAL),$aSellerbalanceaccount);	 // arslan
						     $orderinserted  = $this->db->insert($this->order,$orderdata); // order has been inseted... 
							 $orderid =  $this->db->insert_id(); // get inserted id	 // arslan
							 $aSellerbalanceaccount =  array_merge(array('order_id'=>$orderid),$aSellerbalanceaccount);	 // arslan
						}
						
						$redirectStr = $insert;
					}
					
					
					 redirect(base_url().'contact/orderstatus/'.$redirectStr); 
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