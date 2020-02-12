<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Childmenu extends MX_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('login')==true){
			redirect('auth/login', 'refresh');
		}
	}
	
	public $view = "view";
	public $tbl = 'tbl_childmenu';
	public $tbl_menu = 'tbl_menu';
	public $tbl_submenu = 'tbl_submenu';
	public $controller_name = 'childmenu';
	public $heading = 'Child Menu Management';
	public $skills = 'skills';
	
	
	
	public function index()
	{  

		$aData['data'] =$this->db->query("SELECT p.*,
		(SELECT title FROM ".$this->tbl_menu." AS PM WHERE p.menu_id = PM.id ) AS parent_name,
		(SELECT SM.title FROM ".$this->tbl_submenu." AS SM WHERE p.sub_menu_id = SM.id ) AS subparent_name
		 FROM ".$this->tbl." as p");
		$this->load->view($this->view,$aData);
	}
	
	public function add()
	{  
		$aData['menu'] =$this->db->query("SELECT P.title,P.id FROM ".$this->tbl_menu." as P");
		//$aData['submenu'] =$this->db->query("SELECT SM.title,SM.id FROM ".$this->tblsubparent." as SM");
		$this->load->view('save',$aData);
	}
	
	public function edit($id)
	{
		$aData['menu'] =$this->db->query("SELECT P.title,P.id FROM ".$this->tbl_menu." as P");
		$query = $this->crud->edit($id,$this->tbl);
		$rows = $query;
		$aData['submenu'] = $this->db->select('title,id')->from($this->tbl_submenu)->where('menu_id', $rows->menu_id )->order_by("id","desc")->get();
		$aData['row']= $query;
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
		$this->form_validation->set_rules('skills[]', 'Skills at least 1', 'trim|required');
		if ($this->form_validation->run()==false)
		{
			$arr = array("status"=>"validation_error" ,"message"=> validation_errors());
			echo json_encode($arr);
		}
		else
		{
		$imageName='';
		$error='';
		if(isset($_FILES['image']['name'])){                
			$info = pathinfo($_FILES['image']['name']);
			$ext = $info['extension']; // get the extension of the file
			$newname = rand(5,3456)*date(time()).".".$ext; 
			$target = 'uploads/banner/'.$newname;
			if(move_uploaded_file( $_FILES['image']['tmp_name'], $target))
			{
				$_POST['page_banner'] = $newname ;
			}
		}
		
			
	  
	    $data = array();
		$data['menu_id'] = $_POST['menu_id'];
		$data['sub_menu_id']= (! empty ($_POST['sub_menu_id']) ? $_POST['sub_menu_id']  : 0);
		$data['title'] =  $_POST['title'] ;
		$data['created_on'] =  NOW;
		$result = $this->crud->saveRecord($PrimaryID,$data,$this->tbl);
		if(empty($PrimaryID))
		{
		  $categoryid = $this->db->insert_id();	
		}
		else
		if(! empty($PrimaryID))
		{
		  $categoryid = $PrimaryID;	
		}
		
		
		
		
		if(is_array($_POST['skills']))
			{
				
				$this->db->where('category_id', $categoryid);
				$this->db->delete($this->skills);
				
				foreach ($_POST['skills'] as $key => $value) 
				{
					
					$arr[] = array('category_id'=>$categoryid,'title'=>$value);
				}
				if($this->db->insert_batch($this->skills,$arr)>0)
				{
					$result =1;
				}
			}
		
		
		switch($result)
		{
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
   
		public function getsubmenu()
		{  
			extract($_POST);
			$html ='';
			$data =$this->db->select('*')->from($this->tbl_submenu)->where("menu_id",$menu_id)->get();
			
			if ($data->num_rows()>0)
			{
				$html .='<div class="clearfix">&nbsp;</div>';
				//$html .='<label for="exampleInputEmail1"> Sub Menu</label>';
				$html .='<div class="col-xs-12 col-md-6"><select  name="sub_menu_id" class="form-control" >  <option value="">Sub Menu</option>';
				foreach($data->result() as $option)
				{
					$html .='<option value="'.$option->id.'">'.$option->title.'</option>';
				}
				$html .='</select></div>';
			
			}
			$arr = array('status' => 1,'options' => $html);
			echo json_encode($arr);
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


	/*SELECT TM.title as menu_title,TSM.title as sub_menu_title,TCM.title as child_menu_title FROM  `tbl_childmenu` AS TCM 
LEFT JOIN `tbl_submenu` AS TSM ON TCM.sub_menu_id = TSM.id
INNER JOIN `tbl_menu` AS TM ON TCM.menu_id = TM.id 

ORDER BY `sub_menu_id`  DESC*/
	
}
