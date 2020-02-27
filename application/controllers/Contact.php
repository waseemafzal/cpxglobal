<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
    
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