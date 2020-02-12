<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Services extends MX_Controller {

	

	public function __construct(){

		parent::__construct();

		if(!$this->session->userdata('login')==true){

			redirect('auth/login', 'refresh');

		}

	}

	public $view = "view";

	public $tbl = 'tbl_services';

	public $users = 'users';

	public $controller_name = 'services';

	public $heading = 'User Services Management';

	

	

	public function index(){  



		$WHERE =' WHERE 1=1';
		if(isset($_GET['id']) AND !empty($_GET['id']))
		{
			
		 $WHERE .= ' AND  user_id =' .$_GET['id'];
		 $aData['backlink'] = true;	
		}
		
		$this->load->library('pagination');
		$this->load->helper('url');
		
		
		$params = array();
		$limit_per_page = 50;
		
		$start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;	
		$uri='';
		$searchby = '';
		if(isset($_POST['usersearch']) AND !empty($_POST['usersearch']))
		{
		$searchby = " AND  ((U.email like '%".trim($_POST['usersearch'])."%')
		OR (U.name like '%".trim($_POST['usersearch'])."%'))";
		
		}
		
		$countnumber =$this->db->query("SELECT TS.id  FROM `".$this->tbl."` AS TS INNER JOIN users AS U ON U.id =TS.user_id   ".$WHERE." ".$searchby."");
		$total_records = $countnumber->num_rows();//
		
		
		if(isset($_POST['usersearch']) AND !empty($_POST['usersearch']))
			  {
				
				$aData["searchmessage"] = '<span style="font-size: 13px;">Total Result for your keyword ::<strong>"'.$_POST['usersearch'].'"</strong> are '.$total_records.'</span>';
			  }
		
		$aData['data'] =$this->db->query("SELECT U.email,U.name,
		
		 TS.title, CONCAT('$ ',TS.price) AS price,TS.created_on,TS.status,TS.id
FROM `".$this->tbl."` AS TS 

INNER JOIN users AS U ON U.id =TS.user_id 
 ".$WHERE."  ".$searchby." ORDER BY TS.id DESC  LIMIT ".$start_index." ,".$limit_per_page." ");





		$config['base_url'] = base_url() . 'services/index/'.$uri;
		$config['total_rows'] = $total_records;
		$config['per_page'] = $limit_per_page;
		//$config["uri_segment"] = 3;
		$this->pagination->initialize($config);
		$aData["links"] = $this->pagination->create_links();
	 



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

    

	 function setrequeststatus()

	 {

		extract($_POST);

		$data_array = array('status'=>$status);

		$this->db->where('id', $id);

		$result=$this->db->update($this->tbl,$data_array); 

		if($result)

		{   

			

			$class="label-danger";

			if($status==2 )

            {

			   $text='Pending';

			}

			else

			if($status==0 )

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

		 



	

	

}

