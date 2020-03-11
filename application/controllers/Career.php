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
		}
		
		
		
		/********************upload image end***********************/
	    $result = $this->crud->saveRecord('',$_POST,'tbl_jobs_applicant');
		//	lq();
			
		switch($result){
			case 1:
			$arr = array('status' => 1,'message' => "Congrats: Applied  Succefully!");
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

}
