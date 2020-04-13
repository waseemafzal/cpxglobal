<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Career extends CI_Controller {
	
	function __construct(){
	parent::__construct();
	}
	
	
	public 	function email($a)
		{
			$where=array('activation_code'=>$a);
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($where);
		$data = $this->db->get();
	
		if ($data->num_rows()>0){
			$dbExi=$this->db->where(array('activation_code'=>$a))->update('users', array('active'=>1)); 
					if($dbExi){
						$aData['status']=1;
						$aData['alertClass']='alert-success';
						$aData['message']="Success: Your Acount Has Been Activated";
					
			}
		}
			else{
			$aData['status']=0;
			$aData['alertClass']='alert-danger';
			$aData['message']="Error: Something went wrong";		
			}
			$this->load->view('verified_message',$aData);
		}
	public function index(){
		$aData['data'] =get_by_where_array(array('status'=>1),'tbl_jobs');
		
		$this->load->view('career',$aData);
	
	}
public function detail($id){ 
		$query =$this->crud->edit($id,'tbl_jobs');
		$aData['row']=$query;
		$aData['meta_title']='Career';
		$aData['meta_description']='CPPEx Global hire the experienced, best and brightest printing &amp; packaging and associated industrial specialists';
		$aData['meta_keyword']='CPPEx Global,jobs,hiring,printing jobs';
		$this->load->view('career_detail',$aData);
	}
/*******end of api ***********/	
	function saveApplication(){ 
		extract($_POST);
		if($this->session->userdata('login')==true){
			$_POST['user_id']=get_session('user_id');
		}
	//	pre($_POST);
		//$_POST['user_id'] =get_session('user_id');
		//`post_title`, `post_date`, `post_type`, `video_url`, `posted_by`
		$this->load->library('form_validation');
		$this->form_validation->set_rules('purposal', 'Purposal', 'trim|required');
		if ($this->form_validation->run()==false){
			$arr = array("status"=>0 ,"message"=> validation_errors());
			echo json_encode($arr);exit;
		}else{
			
			/*echo "<pre>";
			 print_r($_FILES);
			echo "</pre>";
			die();*/
			//pre($_POST);
			/********************upload image start***********************/
		$imageName='';
		$error='';
		if(isset($_FILES['file']['name']))
		{                
			$info = pathinfo($_FILES['file']['name']);
			$ext = $info['extension']; // get the extension of the file
			$newname = rand(5,3456)*date(time()).".".$ext; 
			$target = 'uploads/'.$newname;
			if(move_uploaded_file( $_FILES['file']['tmp_name'], $target))
			{
				$_POST['file'] =$newname ;
			}
		}else{
			$arr = array('status' => 0,'message' => "Please attach your cv!");
			echo json_encode($arr);exit;
			}
		
		
		
		/********************upload image end***********************/
	    $result = $this->crud->saveRecord('',$_POST,'tbl_jobs_applicant');
		//	lq();
			
		switch($result){
			case 1:
			$query =$this->crud->edit($_POST['job_id'],'tbl_jobs');
			$jobTitle=$query->post_title;
			$arr = array('status' => 1,'message' => "<h4>Thank you!!! Your application has been successfully submitted!</h4><p>If you have any other other questions, feel free to call us during normal business hours: 9am to 5pm</p>");
			$name=$_POST['name'] ;
			$email=$_POST['email'];
			$htmlMessage='<p>Regarding you application for '.$jobTitle.' .  We are very happy to hear that you want to join us at CPPEx Global!  Your application has been registered and we will get back to you soon.  Our recruitment team will be reviewing the applications and reach out to the shortlisted candidates.
</p>

<p>We look forward to getting to know you!
</p><p>Kind regards,
</p>
';

			
			$this->sendEmail(array('to'=>$email,'name'=>$name,'html'=>$htmlMessage));
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
				$html.='<p>Recruitment Team @ CPPEx GLOBAL</p>';
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
