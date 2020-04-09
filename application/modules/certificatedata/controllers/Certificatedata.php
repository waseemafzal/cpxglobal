<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificatedata extends MX_Controller {
	
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('login')==true){
			redirect('auth/login', 'refresh');
		}
	}
	public $view = "view";
	public $tbl = 'tbl_certificate_data';
	public $tbl_customerdata = 'customerdata';
	public $controllerName = 'certificatedata';
	
	
	
	public function index(){  

		$aData['data'] =$this->db->query("SELECT p.* FROM ".$this->tbl." as p");
		$this->load->view($this->view,$aData);
	}
	public function add(){  
		$this->load->view('save');
	}
	public function edit($id){
		$query =$this->crud->edit($id,$this->tbl);
		$aData['row']=$query;
		$this->load->view('save',$aData);
	}
	public function delete(){ 
		extract($_POST);
		$result =$this->crud->delete($id,$this->tbl);
		switch($result){
			case 1:
			$arr = array('status' => 1,'message' => "Deleted Succefully !");
			echo json_encode($arr);
			break;
			case 0:
			$arr = array('status' => 0,'message' => "Not Deleted!");
			echo json_encode($arr);
			break;
			default:
			$arr = array('status' => 0,'message' => "Not Deleted!");
			echo json_encode($arr);
			break;	
		}
	}
	public function save(){ 
	
		
		
		extract($_POST);
		$PrimaryID = $_POST['id'];
		unset($_POST['action'],$_POST['id']);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('certificate_id', 'Certificate ID', 'trim|required');
		$this->form_validation->set_rules('certificate_name', 'Certificate Name', 'trim|required');
		$this->form_validation->set_rules('applicant_name', 'Applicant Name', 'trim|required');
		$this->form_validation->set_rules('customer_id', 'Customer ID', 'trim|required');
		$this->form_validation->set_rules('company_name', 'Customer Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('city', 'City', 'trim|required');
		$this->form_validation->set_rules('country', 'Country', 'trim|required');
		$this->form_validation->set_rules('trainer', 'Trainer', 'trim|required');
		$this->form_validation->set_rules('fees', 'Fees', 'trim|required');
		$this->form_validation->set_rules('duration', 'Duration', 'trim|required');
		$this->form_validation->set_rules('issuance_date', 'Issuance Date', 'trim|required');
		$this->form_validation->set_rules('expiration_date', 'Expiration Date', 'trim|required');
		
		
		if ($this->form_validation->run()==false)
		{
			$arr = array("status"=>"validation_error" ,"message"=> validation_errors());
			echo json_encode($arr);
		}
		else
		{
			
			$result = $this->crud->saveRecord($PrimaryID,$_POST,$this->tbl);
		//	lq();
			
		switch($result){
			case 1:
			$arr = array('status' => 1,'message' => "Inserted Succefully !");
			echo json_encode($arr);
			break;
			case 2:
			$arr = array('status' => 2,'message' => "Updated Succefully !");
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

				public function update_image(){ 
	
		extract($_POST);
		$data = array();
		if (!empty($_FILES)){ 
		/*--------------------------------------------------
		|File uploading either single or multiple
		---------------------------------------------------*/
		
		$image = $this->crud->upload_files($_FILES);
		$data['file'] =$image;
		}
		else{
			$data['file'] =$edit_image_hidden;
			$image =$edit_image_hidden;
			}	
		
		//	pre($data);	
		$result =$this->crud->update_where($edit_img_id,'blogpost_images',$data);
		/*===============================================*/
		
		switch($result){
		case 1:
			$arr = array('status' => 1,'image' => $image,'id' => $edit_img_id,'message' => "Updated Succefully !");
			echo json_encode($arr);
			break;
		case 0:
			$arr = array('status' => 0,'message' => "Not Updated!");
			echo json_encode($arr);
			break;
		default:
			$arr = array('status' => 0,'message' => "Not Updated!");
			echo json_encode($arr);
			break;	
		}
	}

    
	 public function getCustomerData()
     {
	
	
	
	$response=array();
	$response['status']=0;
	$html='';
	$query = $this->db->query("SELECT * FROM ".$this->tbl_customerdata." AS TPD   WHERE  TPD.id = '".$_POST['id']."'");
	$data = array();
	$dataA = (object)$data;
	$response = array('status' => 0,'data' => $this->getHTMLCustomer($dataA));
	if($query->num_rows()>0)
	{
		 $data  = $this->getHTMLCustomer($query->row());
		 $response = array('status' => 1,'data' => $data);
	}
	
		
		 echo json_encode($response);
  }
	
	  
	  
	  public function getHTMLCustomer($user)
	  {
	    
		   $userHtml.='<div id="inner">
		
				<div class="col-xs-12 col-md-6">
				<label for="exampleInputEmail1">Company Name</label>
				<input type="text" class="form-control" id="company_name"   name="company_name" 
				value="'.(!empty($user->company_name) ? $user->company_name:'').'">
				
				</div>
				
				<div class="col-xs-12 col-md-6">
				<label for="exampleInputEmail1">Mobile</label>
				<input type="text" class="form-control" id="mobile" name="mobile"  value="'.(!empty($user->mobile) ? $user->mobile:'').'">
				
				</div>
				
				<div class="col-xs-12 col-md-6">
				<label for="exampleInputEmail1">Email</label>
				<input type="text" class="form-control" id="email" name="email"  value="'.(!empty($user->email) ? $user->email:'').'">
				
				</div>
				
				
				<div class="col-xs-12 col-md-6">
				<label for="exampleInputEmail1">City</label>
				<input type="text" class="form-control" id="city" name="city"  value="'.(!empty($user->city) ? $user->city:'').'">
				
				</div>
				
				<div class="col-xs-12 col-md-6">
				<label for="exampleInputEmail1">Country</label>
				<input type="text" class="form-control" id="country" name="country"  value="'.(!empty($user->country) ? $user->country:'').'">
				
				</div>';
		
		 return $userHtml;
	  }
	  
	
	
}
