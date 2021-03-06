<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class Trainings extends MX_Controller {
	
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('login')==true){
			redirect('auth/login', 'refresh');
		}
	}
	public $view = "view";
	public $tbl = 'tbl_training';
	public $controllerName = 'trainings';
	
	public function index(){  
	
			$where  =  'WHERE  1=1  ';
			
		if(isset($_POST['filterbtn']))
		 {
			if(isset($_POST['searchbyid']) and !empty($_POST['searchbyid']))
			{
				$searchbyid = $_POST['searchbyid']; 
				$where .=" AND course_id='".trim($searchbyid)."'";
			}
			
			if(isset($_POST['searchbytitle']) and !empty($_POST['searchbytitle']))
			{
				$searchbytitle = $_POST['searchbytitle']; 
				$where .=" AND title LIKE '%".trim($searchbytitle)."%'";
			}
			if(isset($_POST['searchbyondate']) and !empty($_POST['searchbyondate']))
			{
				$searchbyondate = $_POST['searchbyondate']; 
				//.date('Y-m-d,strtotime($searchbytitle))
				$where .=" AND on_date = '".date('Y-m-d',strtotime($searchbyondate))."'";
			}
			if(isset($_POST['searchbyenddate']) and !empty($_POST['searchbyenddate']))
			{
				$searchbyenddate = $_POST['searchbyenddate']; 
				//.date('Y-m-d,strtotime($searchbytitle))
				$where .=" AND end_date = '".date('Y-m-d',strtotime($searchbyenddate))."'";
			}
			
			
			
			
		}		
			$aData['data'] =$this->db->query("SELECT p.* FROM ".$this->tbl." as p  ".$where."  ORDER BY id DESC ");
			//lq();
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
	 
	 public function save()
	 { 
	
		extract($_POST);
		$PrimaryID = $_POST['id'];
		unset($_POST['action'],$_POST['id']);
		//$_POST['user_id'] = get_session('user_id');
		//`post_title`, `post_date`, `post_type`, `video_url`, `posted_by`
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'title', 'trim|required');
	//	$this->form_validation->set_rules('short_heading', 'Short Heading', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		//$this->form_validation->set_rules('start_at', 'Start At', 'trim|required');
		//$this->form_validation->set_rules('end_at', 'End At', 'trim|required');
		//$this->form_validation->set_rules('all_day', 'All Day', 'trim|required');
		$this->form_validation->set_rules('location', 'Location', 'trim|required');
		$this->form_validation->set_rules('on_date', 'ON Date', 'trim|required');
		if ($this->form_validation->run()==false){
			$arr = array("status"=>"validation_error" ,"message"=> validation_errors());
			echo json_encode($arr);
		}else{
			$_POST['created_on'] =NOW;
			
			//pre($_POST);
			/********************upload image start***********************/
		$imageName='';
		$error='';
		if(isset($_FILES['image']['name'])){                
		$info = pathinfo($_FILES['image']['name']);
		$ext = $info['extension']; // get the extension of the file
		$newname = rand(5,3456)*date(time()).".".$ext; 
		$target = 'uploads/event/'.$newname;
		if(move_uploaded_file( $_FILES['image']['tmp_name'], $target)){
		$_POST['post_banner'] =$newname ;
		}
		}
		/********************upload image end***********************/
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


	
	
}
