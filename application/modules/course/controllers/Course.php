<?php
 
 defined('BASEPATH') OR exit('No direct script access allowed');

 class Course extends MX_Controller {
	
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('login')==true){
			redirect('auth/login', 'refresh');
		}
	}
	public $view = "view";
	public $tbl = 'course';
	public $course_lectures_detail = 'course_lectures_detail';
	public $course_lectures = 'course_lectures';
	public $tbl_course_include = 'tbl_course_include';
	public $course_category = 'course_category';
	
	
	
	public function index(){  

		$aData['data'] = $this->db->query("SELECT p.* FROM ".$this->tbl." p ");
		$this->load->view($this->view,$aData);
	}
	public function add(){  
	    $aData['course_catogories'] = $this->db->select('id,title ')->from($this->course_category)->order_by("id","asc")->get(); 
		$this->load->view('save',$aData); 
	}
	public function edit($id){
		$query = $this->crud->edit($id,$this->tbl);
		$rows = $query;
		$aData['course_catogories'] = $this->db->select('id,title ')->from($this->course_category)->order_by("id","asc")->get(); 
		$aData['includes'] = $this->db->select('included_list,id')->from($this->tbl_course_include)->where('course_id ',$rows->id )->order_by("id","asc")->get();
		
		$aData['row'] = $query;
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
	
	function save()
	{ 
		extract($_POST);
		
		/*echo "<pre>";
		 print_r($_POST);
		echo "</pre>";
		
		echo "</br>";
		echo "<pre>";
		 print_r($_FILES);
		echo "</pre>";
		die();
		*/
		
		$PrimaryID = $_POST['id'];
		$include_list = $_POST['include_list'];
		
		unset($_POST['action'],$_POST['id'],$_POST['include_list']);
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('course_category_id', 'Course Category', 'trim|required');
		$this->form_validation->set_rules('post_title', 'post title', 'trim|required');
		$this->form_validation->set_rules('short_description', 'Short Description', 'trim|required');
		$this->form_validation->set_rules('price', 'Price', 'trim|required');
		
		if ($this->form_validation->run()==false)
		{
			$arr = array("status"=>"validation_error" ,"message"=> validation_errors());
			echo json_encode($arr);
		}
		else
		{
			/*--------------------------------------------------
			|Video uploading add/update
			---------------------------------------------------*/
			if($_POST['post_type']=='video')
			{ 
			  
			   if (!empty($_FILES['upload_video']['name'])){  

					$config['upload_path']          = './uploads/';
					$config['allowed_types']        = 'mp4|MP4|mkv|MKV';
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload');
					$this->upload->initialize($config);
					if (!$this->upload->do_upload('upload_video'))
					{
						$arr = array('status' => 0,'message' => "Error ".$this->upload->display_errors());
						echo json_encode($arr);exit;
					
					}
					else
					{
					
						$upload_data = $this->upload->data();
						$_POST['video_url']= $upload_data['file_name'];

					}
					
				}
				else
				{
					unset($_POST['video_url']);
				}
				
				if (!empty($_FILES['thumbnail']['name']))
				{ 
					$config['upload_path']          = './uploads/';
					$config['allowed_types']        = ALLOWED_TYPES;
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload');
					$this->upload->initialize($config);
					if (!$this->upload->do_upload('thumbnail'))
					{
						$arr = array('status' => 0,'message' => "Error ".$this->upload->display_errors());
						echo json_encode($arr);exit;
					}
					else
					{
						$upload_data = $this->upload->data();
						$_POST['thumbnail']= $upload_data['file_name'];
					}
					
					
				}
				else
				{
					unset($_POST['thumbnail']);
				}
			}
			/*===============================================*/
			if($_POST['post_type']=='embed url')
			{ 
				$_POST['thumbnail'] = getYoutubeImage($video_url);
			}
			
			
			$result = $this->crud->saveRecord( $PrimaryID,$_POST,$this->tbl );
			
			if(empty($PrimaryID))
			{
				$insrtID = $this->db->insert_id();
				
				if(!empty($post_title))
				 {
					if(count($include_list) > 0)
					{
						foreach ($include_list as $key => $value) 
						{
							$aincludes[] = array('course_id'=> $insrtID,'included_list'=>$value);
						}
					
					if($this->db->insert_batch($this->tbl_course_include,$aincludes) >0)
					{
						$result =1;
					}
				  }
				}
			 }
			 else
			 {
			    
				$this->db->where('course_id', $PrimaryID);
				if($this->db->delete($this->tbl_course_include))
				{
				
				
					if(!empty($post_title))
					 {
						if(count($include_list) > 0)
						{
							foreach ($include_list as $key => $value) 
							{
								
									if(!empty($value))
									{
									  $aincludes[] = array('course_id'=> $PrimaryID,'included_list'=>$value);
									}
							}
						
							if($this->db->insert_batch($this->tbl_course_include,$aincludes) >0)
							{
								$result =1;
							}
						
					   }
					
					}
					
				  }
				 $insrtID = $PrimaryID;
			 }
			/*--------------------------------------------------
			|File uploading either single or multiple add/update
			---------------------------------------------------*/
			if($_POST['post_type']=='image'){
			if (!empty($_FILES)){ 
			$nameArray = $this->crud->upload_files($_FILES);
			$nameData = explode(',',$nameArray);
			foreach($nameData as $file){
				$file_data = array(
				'file' => $file,
				'post_id' => $insrtID
				);
				 $this->db->insert('post_images', $file_data);
				}
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
	  
		// save lecture
		
		public function savelecture()
		{
		   
				extract($_POST);
				
				if($this->input->post('process')=='edit')
				 {
					 
					
					$data = array('title'=>$lec_title ,'updated_on'=>NOW);
					$this->db->where('id', $course_lecture_id);
					if ($this->db->update($this->course_lectures , $data))
					{
						$result = 1;
					}
					
					
					if(isset($_POST['title']))
					{
						for($index = 0 ; $index < count($_POST['title']); $index ++)
						{
							if(!empty($_POST['title'] ))
							{
								$updateData = array(
								'course_lectures_id'=>$course_lecture_id ,
								'title'=>$_POST['title'][$index] ,
								'duration'=>$_POST['duration'][$index] ,
								);
								$this->db->where('unique_id', $_POST['unique_id'][$index]);
								$this->db->update('course_lectures_detail', $updateData); 
							}
						}
					}
						
					if($result)
					{
					  $arr = array('status' => true,'message' => "Lecture detail has been updated successfully..!");
					  echo json_encode($arr);
					  exit;  	
					}
						
				 
				 }
				 else
				 {
				 if($this->input->post('process')=='done')
				  {
					
					$data = array('course_id'=>$course_id ,'title'=>$lec_title ,'added_on'=>NOW);
					
					if ($this->db->insert('course_lectures', $data))
					{  
						$lecture_id =  $this->db->insert_id();
						$result = 1;
					}
					
					if(isset($_POST['title']))
					{
						for($index = 0 ; $index < count($_POST['title']); $index ++)
						{
							if(!empty($_POST['title'] ))
							{
								$updateData = array(
									'course_lectures_id'=>$lecture_id ,
									'title'=>$_POST['title'][$index] ,
									'duration'=>$_POST['duration'][$index] ,
								);
								$this->db->where('unique_id', $_POST['unique_id'][$index]);
								$this->db->update('course_lectures_detail', $updateData); 
							}
						}
					}
					
					if($result)
					{
					$arr = array('status' => true,'message' => "Lecture detail has been saved..!");
					echo json_encode($arr);
					exit;  	
					}
					
				 }
				 else
				 {
				
					$targetDir = "./uploads/lectures/";
					$makeindex = 0;
					if($_POST['unique_id'])
					{
						$aUniquecount  = count($_POST['unique_id']);
						$makeindex = $aUniquecount -1;   	
					}
					
					$fileName = $_POST['unique_id'][$makeindex].'_'.$_FILES['file']['name'];
					$targetFilePath = $targetDir.$fileName;
					if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath))
					{
					
						$data = array( 'unique_id'=>$_POST['unique_id'][$makeindex] ,'title'=>$_POST['title'][$makeindex] ,'duration'=>$_POST['duration'][$makeindex] , 
						'video'=>$fileName ,
						'added_on'=>NOW
						);
						if ($this->db->insert('course_lectures_detail', $data))
						{  
							echo 'data saved...!';
							exit;
						}
					}
				}
			  }
			exit;
		}
	     
		 
		 public function  getsavedlectures()
	        {
			    extract($_POST);
				
				$data =   $this->db->query(
				"SELECT cl.id as course_lecture_id,cl.title as course_lecture_title,cld.title as lecture_video_title,cld.duration as lecture_video_duration,cld.video as lecture_video,
				cld.id as course_lectures_detail_id  
				FROM `course_lectures` AS cl
				INNER JOIN `course_lectures_detail` AS cld
				ON  cl.id = cld.course_lectures_id
				WHERE cl.course_id = ".$course_id."");
				if(!empty($data->result()))
				{
					$alist = array();
					foreach ($data->result() as $row)
					{
					    $course_lecture_title_and_id  =  $row->course_lecture_title.'=>'.$row->course_lecture_id;
						$alist[ $course_lecture_title_and_id ]['title'][] = $row->lecture_video_title;
						$alist[ $course_lecture_title_and_id ]['duration'][] = $row->lecture_video_duration;
						$alist[ $course_lecture_title_and_id ]['video'][] = $row->lecture_video;
						$alist[ $course_lecture_title_and_id ]['id'][] = $row->course_lectures_detail_id;
						
					
					}
				
				if(count($alist) > 0)
				{	
					$courselecturelist = '';
					$courselecturelist .='<ul class="accordion">';
						
					 foreach($alist as $coursetitle =>$coursedetail):
					   	
						if(!empty($coursetitle)):
						   
						  $acourselecturedata = explode('=>',$coursetitle);
						     $courselecturetitle  = $acourselecturedata [0];
							  $courselectureid  = $acourselecturedata [1];
						   $courselecturelist .='<li id="lec_wrap_'.$courselectureid.'">';
						    $courselecturelist .='<span id="on_edit_lec_title_'.$courselectureid.'" style="display:none;">'.$courselecturetitle.'</span>'; 
							$courselecturelist .='<a class="toggle" href="javascript:void(0);"><strong>'.$courselecturetitle.'</strong></a> 
							<a class="toggle" href="javascript:void(0);"  onclick="edit_lecture(\'' . $courselectureid . '\')">
							  <img src="'.base_url().'assets/edit_icon.png" title="edit">
							</a>
							
							 <a class="toggle" href="javascript:void(0);"  onclick="delete_lecture(\'' . $courselectureid . '\')">
							   <img src="'.base_url().'assets/delete_icon.png" title="delete">
							 </a>
							';
							
							
							$courselecturelist .='<ul class="inner">';
							for($index = 0 ; $index < count($coursedetail['title']); $index ++):
							    $id  = $coursedetail['id'][$index];
								$courselecturelist .='<li style="margin-left:5px;color:#000;" id="list_'.$id.'">
								   <a href="javascript:void(0)">'.$coursedetail['title'][$index].'</a>&nbsp;
								    <a href="javascript:void(0);"  onclick="removelecture('.$id.')">
									 <img src="'.base_url().'assets/delete_icon.png" title="delete">
									</a>
									<span class="pull-right">
										<a href="javascript:void(0);"  onclick="preview_video(\'' . $id . '\')" title="Play"> 
										<span class="fa  fa-play-circle"></span></a></span>
								  
								  </li>';
								  $courselecturelist .='<span id="cvideo_'.$id.'" style="display:none;">'.$coursedetail['video'][$index].'</span>';
							endfor;
							$courselecturelist .='</ul>';
						$courselecturelist .='</li><div>&nbsp;</div>';
						endif;
					endforeach;	
					$courselecturelist .='</ul>';
				}
			  echo $courselecturelist;	
			  exit;
			}
			else
			{
			 echo "<p>currently no Lectures are availalble.</p>";	
			}
		}
	
	// remove course lecture	
	 public function courselecturerelecturevideo()
	 {
		extract($_POST);
		if(!empty($lecture_detail_id))
		{
			    $this->db->select('video');
				$this->db->from($this->course_lectures_detail);
				$this->db->where("id",$lecture_detail_id);
				$data = $this->db->get();
				
			    if ($data->num_rows()>0){
					$row = $data->row();
					unlink("./uploads/lectures/".$row->video);  
				   
					$this->db->where('id', $lecture_detail_id);
					echo  $this->db->delete($this->course_lectures_detail);
				}
			
		  }
	}
	
	
	 public function courselectureremove()
	  {
		extract($_POST);
		if(!empty($lectureid))
		{
		      
				$this->db->where('id', $lectureid);
				if($this->db->delete($this->course_lectures))
				{
		        
					$this->db->select('video');
					$this->db->from($this->course_lectures_detail);
					$data = $this->db->where("course_lectures_id",$lectureid)->get();
					
					if ($data->num_rows()>0)
					{
					
						$alist = array();
						foreach ($data->result() as $row)
						{
							unlink("./uploads/lectures/".$row->video);  
							$this->db->where('course_lectures_id', $lectureid);
							$this->db->delete($this->course_lectures_detail);
						}
					}
					 
					$arr = array('status' => true,'message' => "Lecture has been Deleted..!");
					echo json_encode($arr);
					exit;  	 
				  }
				  else
				  {
					 $arr = array('status' => 0,'message' => "There is something wrong. cannot deleted at the moment.");
					 echo json_encode($arr);
					 exit;    
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
