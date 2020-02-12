<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Product extends MX_Controller {

	

	public function __construct(){

		parent::__construct();

		if(!$this->session->userdata('login')==true){

			redirect('auth/login', 'refresh');

		}

	}

	public $view = "view";

	public $tbl = 'product';

	//0345-5822298

	// 0345 - 8522298 ramzan 88

	//0300-2218436 imram 31

	public function index(){  


$this->db->select('p.*');
$this->db->from('product as p');
$query = $this->db->get();
		$aData['data'] =$query;
		$this->load->view($this->view,$aData);

	}

	public function add(){  
//$aData['groups'] =$this->db->select('*')->from('extras_group')->get();
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

public function saveGroupItem($product_id,$group_id){
	$data_array = array('product_id'=>$product_id,'group_id'=>$group_id);
		$ql = $this->db->select('*')->from('product_extra_group')->where($data_array)->get();
		if( $ql->num_rows() > 0 ) {
			//
		} 
		else {
		$this->db->insert('product_extra_group',$data_array); 
		}	
		
	}


	function save(){ 

		
		extract($_POST);
		extract($_POST);

		$PrimaryID = $_POST['id'];

		unset($_POST['action'],$_POST['id']);

		$this->load->library('form_validation');

		$this->form_validation->set_rules('product_name', 'Product Name', 'trim|required');

		$this->form_validation->set_rules('product_price', 'Product Price', 'trim|required');

		if ($this->form_validation->run()==false){

			$arr = array("status"=>"validation_error" ,"message"=> validation_errors());

			echo json_encode($arr);

		}else{
$grids = $group_ids;
unset($_POST['group_ids']);
			$result = $this->crud->saveRecord($PrimaryID,$_POST,$this->tbl);

			if(empty($PrimaryID)){

				$insrtID = $this->db->insert_id();
			}else{

				$insrtID =$PrimaryID;

				}
if(!empty($grids)){
				foreach($grids as $key=>$val){
					$this->saveGroupItem($insrtID,$val);
				}
				}
			/*--------------------------------------------------

			|File uploading either single or multiple add/update

			---------------------------------------------------*/

			if (!empty($_FILES)){ 

			$nameArray = $this->crud->upload_files($_FILES);

			$nameData = explode(',',$nameArray);

			foreach($nameData as $file){

				$file_data = array(

				'image' => $file,

				'product_id' => $insrtID

				);

				$this->db->insert('product_images', $file_data);

				}

			  }

			/*===============================================*/

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

		$data['image'] =$image;

		}

		else{

			$data['image'] =$edit_image_hidden;

			$image =$edit_image_hidden;

			}	

		

		//	pre($data);	

		$result =$this->crud->update_where($edit_img_id,'product_images',$data);

		/*===============================================*/

		

		switch($result){

		case 1:

			$arr = array('status' => 1,'image' => $image,'src' =>base_url().'uploads/'.$image,'id' => $edit_img_id,'message' => "Updated Succefully !");

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

