<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends MX_Controller {
	
	
	public $view = "view";
	public $tbl = TBL_POST;
	
	
	
	public function __construct(){
		parent::__construct();
	}
	public function index(){  
		$aData['data'] =$this->db->select('*')->from($this->tbl)->get();
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
	function save(){ 
		extract($_POST);
	//	pre($_FILES);
		//`post_title`, `post_date`, `post_type`, `video_url`, `posted_by`
		$this->load->library('form_validation');
		$this->form_validation->set_rules('post_title', 'post content', 'trim|required');
		
		if ($this->form_validation->run()==false){
			
			$arr = array("status"=>"validation_error" ,"message"=> validation_errors());
			echo json_encode($arr);
		}else{
	 	$PrimaryID = $_POST['id'];
		unset($_POST['action'],$_POST['id']);
		$_POST['posted_by'] =get_session('user_type');
		if($_POST['post_type']=='image'){
			unset($_POST['video_url']);
			}
		
		$result = $this->crud->saveRecord($PrimaryID,$_POST,$this->tbl);
		switch($result){
			
			
			case 1:
			if(empty($PrimaryID)){
				$insrtID = $this->db->insert_id();
				}
				if (! empty($_FILES)){ 
			/*--------------------------------------------------
			|File uploading either single or multiple
			---------------------------------------------------*/
			$nameArray = $this->crud->upload_files($_FILES);
			$nameData = explode(',',$nameArray);
			foreach($nameData as $file){
				
				$file_data = array(
				'image' => $file,
				'post_id' => $insrtID
				);
				$this->db->insert('post_images', $file_data);
			
			}
			/*===============================================*/
			}
			
			
				
			
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
	
}
