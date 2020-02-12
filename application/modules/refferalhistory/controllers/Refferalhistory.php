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
		(SELECT CONCAT(U.email) from ".$this->users." AS U WHERE U.id = TR.refferal_id ) AS reffered_by
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
      $data =$this->db->query("SELECT TR.refferal_id, TR.reffered_id AS reffered_person_id,
		(SELECT U.name from ".$this->users." AS U WHERE U.id = TR.reffered_id ) AS reffered_to ,
		(SELECT count(tbr.id) from tbl_buyer_request AS tbr WHERE tbr.buyer_id = TR.reffered_id ) AS posted_request_counts,
		(SELECT count(ts.id) From tbl_services AS ts WHERE ts.user_id = TR.reffered_id ) AS posted_services_counts,
	 (SELECT count(F.id) FROM `freelancers` AS F Where F.user_id = TR.reffered_id AND  F.type ='normal' AND F.freelancer_title !='') AS is_freelancers
	
	
	FROM `".$this->tbl."` AS TR WHERE TR.refferal_id =".$id."");
	
	 $list = '';
		if($data->num_rows() > 0)
		{  
		    $list .='<tr class="thbg"><th>Reffered Name</th><th>Posted Services</th><th>Posted Requests</th><th>Freelancer?</th></tr>';
			$service= 'service';
			$post= 'post';
				
			foreach ($data->result() as $row)
			{
				$span = 'No';
				if($row->is_freelancers==1)
				{
					$span = '<span class="yesf">Yes</span>';
				}
			  $list .='<tr class="trc"><td>'.$row->reffered_to.'</td>
			  			<td><a href="javascript:void(0);" onclick="showdata(\''.$row->reffered_person_id.'\',\''.$service.'\');">'.$row->posted_services_counts.'</a></td>
						<td>
						
						<a href="javascript:void(0);"  onclick="showdata(\''.$row->reffered_person_id.'\',\''.$post.'\');">'.$row->posted_request_counts.'</a></td>
						<td>'.$span.'</td>
					 </tr>';	
			}
		}
		echo $list;
		
	}
	
	
	
	
 function getrefferaldetaillistings()
	{
	   
	 
	  extract($_POST);
	  if(!empty($type) AND $type =='service')
	  {
		   
		$data = $this->db->query("SELECT  TS.title,TS.price,
					(SELECT  TSM.media FROM tbl_services_media AS TSM WHERE TSM.service_id = TS.id LIMIT 0,1) AS services_image,
					(SELECT  TCM.title FROM tbl_childmenu AS TCM WHERE TCM.id = TS.category_id ) AS category_name FROM `tbl_services` AS TS 
				WHERE  TS.user_id = '".$id."'");
	 
	    $list = '';
				if($data->num_rows() > 0)
				{  
					$list .='<tr class="thbg"><th> Image </th><th>Services Title </th><th>Category Name</th><th>Price</th></tr>';
					$service= 'service';
					$post= 'post';
					
					foreach ($data->result() as $row)
					{
						$image = base_url().'uploads/services/media/service-default.jpg';  
						if( !empty($row->services_image))
						{
							$image = base_url().'uploads/services/media/'.$row->services_image;  
						}
						$list .='<tr class="trc"><td><img src='.$image.' width="50" height="50"  style="border:1px solid #ddd;"></td>
						<td>'.$row->title.'</a></td>
						<td>'.$row->category_name.'</a></td>
						<td>'.$row->price.'</a></td>
						</tr><tr><td  colspan="4">&nbsp;</td></tr>';	
					}
				}
				else
				{
					$list .='<tr><td  colspan="4">No Date Available!</td></tr>';		
				}
				
		
		
	  }
	  else
	  if(!empty($type) AND $type =='post')
	  {
		  
		  $data = $this->db->query("SELECT TBR.description,TBR.budget,TBR.delievry,
		  (SELECT  TCM.title FROM tbl_childmenu AS TCM WHERE TCM.id = TBR.category_id ) AS category_name  
		  FROM `tbl_buyer_request` AS TBR
			WHERE TBR.buyer_id = '".$id."'");
		    
			$list = '';
			if($data->num_rows() > 0)
			{  
				$list .='<tr class="thbg"><th> Category</th><th>Budget </th><th>Delievry</th><th>Description</th></tr>';
				$service= 'service';
				$post= 'post';
					
				foreach ($data->result() as $row)
				{
				  
				  $list .='<tr class="trc"><td>'.$row->category_name.'</td>
							<td>'.$row->budget.'</a></td>
							<td>'.$row->delievry.'</a></td>
							<td>'.$row->description.'</a></td>
						 </tr><tr><td  colspan="4">&nbsp;</td></tr>';	
				}
			}
			else
			{
			   $list .='<tr><td  colspan="4">No Date Available!</td></tr>';		
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
		if(isset($_FILES['image']['name']))
		{                
			$info = pathinfo($_FILES['image']['name']);
			$ext = $info['extension']; // get the extension of the file
			$newname = rand(5,3456)*date(time()).".".$ext; 
			$target = 'uploads/'.$newname;
				if(move_uploaded_file( $_FILES['image']['tmp_name'], $target))
				{
				 $_POST['post_banner'] = $newname ;
				}
		}
		/********************upload image end***********************/
		$result = $this->crud->saveRecord($PrimaryID,$_POST,$this->tbl);
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
