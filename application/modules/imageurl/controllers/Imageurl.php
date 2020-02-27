<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Imageurl extends MX_Controller {
	
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('login')==true){
			redirect('auth/login', 'refresh');
		}
	}
	public $view = "view";
	public $tbl = 'tbl_team';
	
	public function index(){  

		//$aData['data'] =$this->db->query("SELECT p.* FROM ".$this->tbl." as p");
		$this->load->view('save',$aData);
	}
	public function add(){  
		$this->load->view('save');
	}
	public function edit($id){
		$query =$this->crud->edit($id,$this->tbl);
		$aData['slug']=$this->db->query("SELECT slug FROM app_routes where resource_id='".$id."'")->row()->slug;
		$aData['row']=$query;
		//pre($aData);
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
		$PrimaryID = $_POST['id'];
		//$slugs = $_POST['slug'];
		unset($_POST['action'],$_POST['id']);
		//$_POST['user_id'] =get_session('user_id');
		//`post_title`, `post_date`, `post_type`, `video_url`, `posted_by`
		$this->load->library('form_validation');
		
	
		if (empty($_FILES['image']['name']) and count($_FILES['image']['name'])== 0) { 
			$arr = array("status"=>"validation_error" ,"message"=>'File cannot be empty.');
			echo json_encode($arr);
			die();
		}
			/********************upload image start***********************/
		$imageName='';
		$error='';
		if(isset($_FILES['image']['name']))
		{                
			$info = pathinfo($_FILES['image']['name']);
			$ext = $info['extension']; // get the extension of the file
			$newname = rand(5,3456)*date(time()).".".$ext; 
			$target = 'uploads/cmsimage/'.$newname;
			if(move_uploaded_file( $_FILES['image']['tmp_name'], $target))
			{
				$_POST['post_banner'] =$newname ;
			}
		}
		
		
		
		/********************upload image end***********************/
	    $result =1;
		//	lq();
			
		switch($result){
			case 1:
			$arr = array('status' => 1,'message' => base_url()."uploads/cmsimage/".$newname);
			echo json_encode($arr);
			break;
			case 2:
			$this->db->where(array('resource_id'=>$PrimaryID))->update('app_routes',array('slug'=>$slugs));
			
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
	//}	
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
