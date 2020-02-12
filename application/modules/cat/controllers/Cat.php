<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cat extends MX_Controller {
	
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('login')==true){
			redirect('auth/login', 'refresh');
		}
	}
	public $view = "view";
	public $tbl = 'categories';
	
	public function index(){  

		$aData['data'] =$this->db->select('*')->from($this->tbl)->order_by("id","desc")->get();
		$this->load->view($this->view,$aData);
	}
	
	public function getCat()
	{  
			extract($_POST);
			$where=array('type_id'=>$type_id,'parent_id'=>0);
			
			$data =$this->db->select('*')->from($this->tbl)->where($where)->get();
			
			$html .='<div class="col-xs-12 col-md-6"><select onChange="getsubCat(this.value)"  name="parent_id" class="form-control" >';
			$html .='<option value="0">Parent Cat</option>';
			foreach($data->result() as $option)
			{
			
			 $html .='<option value="'.$option->id.'">'.$option->cat_name.'</option>';
			}
			$html .='</select></div>';
			
			
			$arr = array('status' => 1,'options' => $html);
			echo json_encode($arr);
	}
	
		public function getsubCat()
		{  
			extract($_POST);
			$html ='';
			$data =$this->db->select('*')->from($this->tbl)->where("parent_id",$parent_id)->get();
			
			if ($data->num_rows()>0)
			{
				$html .='<div class="clearfix">&nbsp;</div>';
				$html .='<div class="col-xs-12 col-md-6"><select  name="parent_id_level_2" class="form-control" >';
				foreach($data->result() as $option)
				{
				
					$html .='<option value="'.$option->id.'">'.$option->cat_name.'</option>';
				}
					$html .='</select></div>';
			
			}
			$arr = array('status' => 1,'options' => $html);
			echo json_encode($arr);
	  }
	
	
	public function add()
	{  
		$this->load->view('save');
	}
	
	public function edit($id)
	{
		$query =$this->crud->edit($id,$this->tbl);
		$aData['row']=$query;
		$this->load->view('save',$aData);
	}
	
	public function delete()
	{ 
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
		if ($this->form_validation->run()==false)
		{
			$arr = array("status"=>"validation_error" ,"message"=> validation_errors());
			echo json_encode($arr);
		}
		else
		{
			/*--------------------------------------------------
			|Image uploading add/update
			---------------------------------------------------*/
				if (!empty($_FILES))
				{ 
					$config['upload_path']          = './uploads/';
					$config['allowed_types']        = ALLOWED_TYPES;
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload');
					$this->upload->initialize($config);
					if (!$this->upload->do_upload('image'))
					{
						$arr = array('status' => 0,'message' => "Error ".$this->upload->display_errors());
						echo json_encode($arr);exit;
					}
					else
					{
						$upload_data = $this->upload->data();
						$_POST['image']= $upload_data['file_name'];
					}
					
					
				}
				else
				{
					unset($_POST['image']);
				}
			
			/*===============================================*/
	    //	parent_id_level_2
		$parent_id = $_POST['parent_id'];
		if(! empty($_POST['parent_id_level_2']))
		{
		
			$parent_id = $_POST['parent_id_level_2'];
		
		}
		
		$apost = array('type_id'=>$_POST['type_id'],'parent_id'=>$parent_id ,'cat_name'=>$_POST['cat_name']);
		$result = $this->crud->saveRecord($PrimaryID,$apost,$this->tbl);
			
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
		if (!empty($_FILES))
		{ 
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
