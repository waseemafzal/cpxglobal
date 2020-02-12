<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submenu extends MX_Controller {
	
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('login')==true){
			redirect('auth/login', 'refresh');
		}
	}
	public $view = "view";
	public $tbl = 'tbl_submenu';
	public $tblparent = 'tbl_menu';
	public $controller_name = 'submenu';
	public $heading = 'Sub Menu Management';
	
	
	public function index(){  

		$aData['data'] =$this->db->query("SELECT p.*,(SELECT title FROM ".$this->tblparent." AS PM WHERE p.menu_id = PM.id ) AS parent_name FROM ".$this->tbl." as p");
		$this->load->view($this->view,$aData);
	}
	public function add(){  
		$aData['menu'] =$this->db->query("SELECT P.title,P.id FROM ".$this->tblparent." as P");
		$this->load->view('save',$aData);
	}
	public function edit($id)
	{
		$aData['menu'] =$this->db->query("SELECT P.title,P.id FROM ".$this->tblparent." as P");
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
		$PrimaryID = $_POST['id'];
		unset($_POST['action'],$_POST['id']);
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('menu_id', 'Choose menu', 'trim|required');
		$this->form_validation->set_rules('title', 'page Title', 'trim|required'); 
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
			$target = 'uploads/banner/'.$newname;
			if(move_uploaded_file( $_FILES['image']['tmp_name'], $target)){
				$_POST['page_banner'] =$newname ;
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
