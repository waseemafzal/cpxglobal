<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends MX_Controller {
	
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('login')==true){
			redirect('auth/login', 'refresh');
		}
	}
	public $view = "view";
	public $tbl = TBL_POST;
	
	public function index(){  

		$aData['data'] =$this->db->select('*')->from($this->tbl)->order_by("id","desc")->get();
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
		$_POST['posted_by'] =get_session('user_type');
		//`post_title`, `post_date`, `post_type`, `video_url`, `posted_by`
		$this->load->library('form_validation');
		$this->form_validation->set_rules('post_title', 'post content', 'trim|required');
		if ($this->form_validation->run()==false){
			$arr = array("status"=>"validation_error" ,"message"=> validation_errors());
			echo json_encode($arr);
		}else{
			/*--------------------------------------------------
			|Video uploading add/update
			---------------------------------------------------*/
			if($_POST['post_type']=='video'){ 
				if (!empty($_FILES['video_upload']['name'])){  
					$config['upload_path']          = './uploads/';
					$config['allowed_types']        = 'mp4|MP4|mkv|MKV';
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload');
					$this->upload->initialize($config);
					if (!$this->upload->do_upload('video_upload')){
					$arr = array('status' => 0,'message' => "Error ".$this->upload->display_errors());
					echo json_encode($arr);exit;
					
					}
					else{
					
					$upload_data = $this->upload->data();
					$_POST['video_url']= $upload_data['file_name'];
					}
					
				}else{
					unset($_POST['video_url']);
				}
				if (!empty($_FILES['thumbnail']['name'])){ 
					$config['upload_path']          = './uploads/';
					$config['allowed_types']        = ALLOWED_TYPES;
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload');
					$this->upload->initialize($config);
					if (!$this->upload->do_upload('thumbnail')){
					$arr = array('status' => 0,'message' => "Error ".$this->upload->display_errors());
					echo json_encode($arr);exit;
					}
					else{
					$upload_data = $this->upload->data();
					$_POST['thumbnail']= $upload_data['file_name'];
					}
					
					
				}else{
					unset($_POST['thumbnail']);
				}
			}
			/*===============================================*/
			if($_POST['post_type']=='embed url'){ 
			$_POST['thumbnail']=getYoutubeImage($video_url);
			}
			//pre($_POST);
			$result = $this->crud->saveRecord($PrimaryID,$_POST,$this->tbl);
			
			if(empty($PrimaryID)){
				$insrtID = $this->db->insert_id();
			}else{
				$insrtID =$PrimaryID;
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
				'image' => $file,
				'post_id' => $insrtID
				);
				$this->db->insert('post_images', $file_data);
				}
			  }
			}
			/*===============================================*/
		switch($result){
			case 1:

//send push notification 
$data= $this->db->query("SELECT device_id,devicetype FROM users where device_id !='' && devicetype !=''"); 
 	if($data->num_rows()>0){
$object = $this->crud->edit($insrtID,$this->tbl);
$post_id = $object->id;
$post_type = $object->post_type;
$Notifymessage=$object->post_title;


		foreach ($data->result()  as $res) {
			$message = $res->description; // notification message to send 
			if($res->devicetype=='ios'){
			
			}elseif($res->devicetype=='android'){

				$this->send_android_notification($res->device_id,$post_id,$post_type,$Notifymessage); // adnroid notification 
				
			}
		}
		

}
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
	
/************send android push notificattion**********************/

	function send_android_notification($push_id,$post_id,$post_type,$message){

$registrationIds = array($push_id);

// prep the bundle 
$msg = array
(	'title'		=> 'Haqkhateeb',
	'message'	=> $message,
	'vibrate'	=> 1,
'post_id'	=> $post_id,
'post_type'	=> $post_type,
	'sound'		=> 1
);

$fields = array
(
	'registration_ids' 	=> $registrationIds,
	'data'			=> $msg
);
 
$headers = array
(
	'Authorization: key=' . API_ACCESS_KEY,
	'Content-Type: application/json'
);
 
$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
$result = curl_exec($ch );
curl_close( $ch );


return $result;
	}


/******************************************************************/	





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
