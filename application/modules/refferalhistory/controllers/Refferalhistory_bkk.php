<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Refferalhistory extends MX_Controller {
	
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('login')==true){
			redirect('auth/login', 'refresh');
		}
	}
	public $view = "view";
	public $tbl = 'tbl_referals';
	public $users = 'users';
	
	public function index(){  

		$aData['data'] =$this->db->query("SELECT TR.refferal_id,count(TR.refferal_id) AS total_referal,
		(SELECT CONCAT(U.username) from ".$this->users." AS U WHERE U.id = TR.refferal_id ) AS reffered_by
FROM `".$this->tbl."` AS TR GROUP BY TR.refferal_id ORDER BY  TR.created_date DESC");



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
	
	function getrefferallist()
	{
	   
	   extract($_POST);
	   $data =$this->db->query("SELECT TR.refferal_id,
		(SELECT U.name from ".$this->users." AS U WHERE U.id = TR.reffered_id ) AS reffered_to
FROM `".$this->tbl."` AS TR WHERE TR.refferal_id =".$id." ");

	    $list = '';
		if($data->num_rows() > 0)
		{  
		
			foreach ($data->result() as $row)
			{
			  $list .='<li>'.$row->reffered_to.'</li>';	
			}
		}
		echo $list;
		
	}
	
	
	
	function save(){ 
		extract($_POST);
		$PrimaryID = $_POST['id'];
		unset($_POST['action'],$_POST['id']);
		//$_POST['user_id'] =get_session('user_id');
		//`post_title`, `post_date`, `post_type`, `video_url`, `posted_by`
		$this->load->library('form_validation');
		$this->form_validation->set_rules('post_title', 'page content', 'trim|required');
		if ($this->form_validation->run()==false){
			$arr = array("status"=>"validation_error" ,"message"=> validation_errors());
			echo json_encode($arr);
		}else{
			
			
			//pre($_POST);
			/********************upload image start***********************/
		$imageName='';
		$error='';
		if(isset($_FILES['image']['name'])){                
		$info = pathinfo($_FILES['image']['name']);
		$ext = $info['extension']; // get the extension of the file
		$newname = rand(5,3456)*date(time()).".".$ext; 
		$target = 'uploads/'.$newname;
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
