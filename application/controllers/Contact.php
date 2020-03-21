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
				/*********Email tempalate***************/
				/*$aparticpient_detail = 	json_decode($particpient_detail);
				$aproduct_detail = 	json_decode($product_detail);
				$ainstruction_training = 	json_decode($instruction_training);
				$ainstruction_department = 	json_decode($instruction_department);
				$ainstruction_venue_procedure = 	json_decode($instruction_venue_procedure);
				$alike_and_suggestion = 	json_decode($like_and_suggestion);*/
				
				/*$htmlContent .= '
					<h2>Particpient Detail</h2>
					<p><b>Name: </b>'.$aparticpient_detail->name.'</p>
					<p><b>Start: </b>'.$aparticpient_detail->start.'</p>
					<p><b>end: </b>'.$aparticpient_detail->end.'</p>
					<p><b>Email: </b>'.$aparticpient_detail->email.'</p>
					<p><b>Employee Name: </b>'.$aparticpient_detail->employee_name.'</p>
					<p><b>Job Title: </b>'.$aparticpient_detail->job_title.'</p>
					<p><b>Mobile: </b>'.$aparticpient_detail->mobile.'</p>
					<p><b>Company Name: </b>'.$aparticpient_detail->company_name.'</p>
				';
				
				$htmlContent .= '</hr>
					<h2>Product Detail</h2>
					<p><b>Product Service: </b>'.$aparticpient_detail->product_service.'</p>
					<p><b>Trainer Name: </b>'.$aparticpient_detail->trainer_name.'</p>
					<p><b>Subject: </b>'.$aparticpient_detail->subject.'</p>
					
				';
				
				$htmlContent .= '</hr>
					<h2>Instruction Training</h2>
					<p><b>The training met my expectations: </b>'.$aparticpient_detail->product_service.'</p>
					<p><b>I will be able to apply the knowledge learned: </b>'.$aparticpient_detail->trainer_name.'</p>
					<p><b>The training objectives for each topic were identified and followed: </b>'.$aparticpient_detail->subject.'</p>
					<p><b>The curriculum content was organized and easy to follow: </b>'.$aparticpient_detail->subject.'</p>
					<p><b>The materials distributed were pertinent and useful. : </b>'.$aparticpient_detail->subject.'</p>*/
					
				/*********Email tempalate***************/
				
				
				
				  	
				if( $this->crud->saveRecord( '',$aFeedBack,$this->tbl_feedback ))
				{
				 $result=1;	
				}
				
				
			
			
			switch($result){
			case 1:
			$arr = array('status' => 1,'message' => "Your feedback have been received us successfully.");
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
			'message' => "Your information have been submit to us, Continue to complete Purchase.",
			'bag' => array('register_id'=>$register_id,'price_now'=>$price_now)
			);
			
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
			$arr = array('status' => 1,'message' => "Your information have been received us successfully.");
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
			$arr = array('status' => 1,'message' => "Your Complaint have been received us successfully.");
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
        
        
        // Load the email library
        $this->load->library('email');
        
        // Mail config
        $to = 'Olebint001@gmail.com';
        $from = 'support@skillsquared.com';
        $fromName = 'SkillSquared';
        $subject = 'Contact  by '.$mailData['name'];
        
        // Mail content
        $htmlContent = '
            <h2>Below is the detail of the Person who contacted!</h2>
            <p><b>Name: </b>'.$mailData['name'].'</p>
            <p><b>Email: </b>'.$mailData['email'].'</p>
            <p><b>Subject: </b>'.$mailData['subject'].'</p>
            <p><b>Message: </b>'.$mailData['message'].'</p>
        ';
            
  if($this->crud->send_smtp_email($to,$from,$fromName,$subject,$htmlContent)
			){
				return true;
				}
        // Send email & return status
        
    }
    
}