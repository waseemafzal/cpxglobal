<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buyerrequest extends MX_Controller {
	
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('login')==true){
			redirect('auth/login', 'refresh');
		}
	}
	public $view = "view";
	public $tbl = 'tbl_buyer_request';
	public $users = 'users';
	public $tbl_childmenu = 'tbl_childmenu';
	public $controller_name = 'buyerrequest';
	public $heading = 'Buyer Request';
	public $tbl_admin_buyer_messages ='tbl_admin_buyer_messages';
	
	
	public function index(){  
		
		$aData['data'] =$this->db->query("SELECT (SELECT name FROM ".$this->users." AS U WHERE U.id = TBQS.buyer_id ) AS buyer_name,
 (SELECT title FROM ".$this->tbl_childmenu." AS CM WHERE CM.id =TBQS.category_id ) AS category_name,
		 TBQS.description, CONCAT('$ ',TBQS.budget) AS price,TBQS.delievry,TBQS.created_date,TBQS.status,TBQS.id,TBQS.require_doc
FROM `".$this->tbl."` AS TBQS ORDER BY TBQS.id DESC");


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
		$PrimaryID = $_POST['id'];
		unset($_POST['action'],$_POST['id']);
		
		$this->load->library('form_validation');
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
     
	 
	 
	 function setrequeststatus()
	 {
		extract($_POST);
		$data_array = array('status'=>$status);
		$this->db->where('id', $id);
		$result=$this->db->update($this->tbl,$data_array); 
		if($result)
		{   
			
			$class="label-danger";
			if($status==0 )
            {
			   $text='Pending';
			}
			else
			if($status==3 )
            {
			   $text='Cancel';
			}
			else
            {
           	 	$class="label-success";
            	$text='Active';
            } 
			
		   echo '<span class="label '. $class.'">'. $text.'</span> ';	
		}
		
		
	}
		 
	 
	 
	 
	 
	  function sendmessage()

		{

		    extract($_POST);

			if(!$this->session->userdata('login')==true){

				redirect('/', 'refresh');

				exit;

			}

		

		extract($_POST);

		$PrimaryID = base64_decode($_POST['nonouce___']);
		unset($_POST['action'], $_POST['nonouce___']);
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('message', '<i class="glyphicon glyphicon-arrow-right"></i>Message', 'trim|required');
		$this->form_validation->set_rules('to_buyer', '<i class="glyphicon glyphicon-arrow-right"></i>Buyer ', 'trim|required');

		if ($this->form_validation->run()==false)

		{

			$arr = array("status"=>"validation_error" ,"message"=> validation_errors());

			echo json_encode($arr);

		}

		else

		{    
			$data['buyer_id'] = $_POST['to_buyer'] ; 
			$data['created_date'] = NOW; 
			$data['admin_id'] = 1  ;
			$data['message'] = $_POST['message']   ;
			$result = $this->crud->saveRecord( $PrimaryID,$data,$this->tbl_admin_buyer_messages );
			switch($result)

			{

				case 1:
				$arr = array('status' => 1,'message' => "Quick request has been Saved Succefully !");
				echo json_encode($arr);
				break;

				

				case 2:
				$arr = array('status' => 2,'message' => "Certificate has been Updated Succefully !");
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
