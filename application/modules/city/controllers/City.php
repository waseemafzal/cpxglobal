<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City extends MX_Controller {
	
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('login')==true){
			redirect('auth/login', 'refresh');
		}
	}
	public $view = "view";
	public $tbl = 'City';
	
	public function index(){  

		$aData['data'] =$this->db->select('*')->from($this->tbl)->order_by("id","desc")->get();
		$this->load->view($this->view,$aData);
	}
	
	function dumP(){
		$data =$this->db->select('*')->from('parents')->order_by("id","desc")->get();
		$exit=0;
		$inserted=0;
		$response=array();
		
		foreach($data->result() as $childs){
			$dataRow=array('child_fname'=>$childs->child_fname,'child_lname'=>$childs->child_lname,'class_session'=>$childs->class_session,'parent_id'=>$childs->id);
		$query = $this->db->select('*')->from('childs')->where($dataRow)->get();
			
			
			if ($query->num_rows()>0)
			{  
			$response['Total exist']=$exit++;
			}else{
				if($this->db->insert('childs',$dataRow)){
					$response['Total inserted']=$inserted++;
				}	
			}
		}
		$response['Total exist']=$exit;
		$response['Total inserted']=$inserted;
	echo json_encode($response);
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
			$catt_id=$id;
			// get product ids
			$this->db->select('id as product_id');
		$this->db->from('product');
		$this->db->where('cat_id', $catt_id);
		$data = $this->db->get();
		if ($data->num_rows()>0){
			foreach($data->result() as $pro){
				// delete from contest
				$this->db->where('product_id', $pro->product_id)->delete('contest');
			
			}
		}
			//delete from products
			$this->db->where('cat_id', $id)->delete('product');
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
		$this->form_validation->set_rules('cat_name', 'cat name', 'trim|required');
		if ($this->form_validation->run()==false){
			$arr = array("status"=>"validation_error" ,"message"=> validation_errors());
			echo json_encode($arr);
		}else{
			
			$result = $this->crud->saveRecord($PrimaryID,$_POST,$this->tbl);
			
			if(empty($PrimaryID)){
				$insrtID = $this->db->insert_id();
			}else{
				$insrtID =$PrimaryID;
				}
			
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
		$result =$this->crud->update_where($edit_img_id,'post_images',$data);
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
