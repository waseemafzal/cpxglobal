<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buyerquick extends MX_Controller {
	
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('login')==true){
			redirect('auth/login', 'refresh');
		}
	}
	public $view = "view";
	public $tbl = 'tbl_buyer_quick_service';
	public $users = 'users';
	public $tbl_childmenu = 'tbl_childmenu';
	public $tbl_services = 'tbl_services';
	public $controller_name = 'buyerquick';
	public $heading = 'Buyer Quick Request';
	public $freelancers = 'freelancers';
	public $tbl_buyrer_assigned_services = 'tbl_buyrer_assigned_services';
	public $tbl_admin_buyer_messages = 'tbl_admin_buyer_messages';
	public $tbl_buyer_request = 'tbl_buyer_request';
	public $tbl_seller_offer_to_request = 'tbl_seller_offer_to_request';
	
	
	
	
	
	
	
	public function index(){  
		
		$aData['data'] =$this->db->query("SELECT (SELECT name FROM ".$this->users." AS U WHERE U.id = TBQS.buyer_id ) AS buyer_name,
 (SELECT title FROM ".$this->tbl_childmenu." AS CM WHERE CM.id =TBQS.category_id ) AS category_name,
		 TBQS.description, CONCAT('$ ',TBQS.budget) AS price,TBQS.delievry,TBQS.created_date,TBQS.status,TBQS.id,TBQS.category_id,TBQS.buyer_id
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
	
	function getfeaturedservices()
	{
	   
  	  extract($_POST);
	  if(empty($buyerid) or empty($categoryid) or empty($qreqid))
	  {
		exit;    
	  }  
	  
	 
	    $userids  =  $this->getusersidrelavettocategory($categoryid);
	    $servicelist = array();
		$awhere = array('buyer_id'=>$buyerid ,'quick_request_id'=>$qreqid);
		//'buyer_id',$buyerid
	    $serviceids  = get_row_all('service_id','','',$this->tbl_buyrer_assigned_services ,$awhere);
		
		
		if (count($serviceids) >0 and is_array($serviceids) )
		{
			
			for($index = 0; $index < count($serviceids); $index++)
			{
			  $servicelist[]  =  $serviceids[$index]->service_id;	
			}
		}
		
		
	    $data = $this->db->query("SELECT TS.id as service_id,TS.user_id AS seller_id,
		(SELECT title from ".$this->tbl_childmenu." AS TC where TC.id  = TS.category_id) as category_name,TS.title, 
		CONCAT('$ ',TS.price) AS service_price,
		(SELECT username from ".$this->freelancers." AS F where F.user_id  = TS.user_id) as user_name FROM `".$this->tbl_services."` AS TS
		WHERE   TS.category_id = ".$categoryid." AND TS.user_id !=".$buyerid." AND  TS.user_id IN (".$userids.")  GROUP BY TS.user_id ");
		
		
		//lq();
		
		$html ='<p>No services found against this category...!</p>';  
		if ($data->num_rows()>0)
		{
			$html =''; 
			$html .='<div class="col-md-12">';
			
				foreach($data->result() as $row)
				{
					$html .='<div class="checkbox">';
						$html .='<label for="checkboxes-0">'; 
							$html .='<input type="checkbox" name="service_id[]" 
							'.(in_array($row->service_id,$servicelist) ? 'checked="checked"' : '').'  id="checkboxes-0" value="'.$row->service_id.'">';
							$html .= $row->user_name.' <i class="fa fa-arrow-right"></i> '.$row->title.' <i class="fa fa-arrow-right"></i> '.$row->service_price;  
 							
						$html .='</label>';
					$html .='</div>';
				}
			  $html .= '<input type="hidden" name="buyer_id" value="'.$buyerid.'">';
			  $html .='</div>';
		}
	
		echo $html;
	 }
	
	 function getusersidrelavettocategory($catgory_id)
	 {  
	 
		$data = $this->db->select('user_id')->from( $this->tbl_services)->where(array('category_id'=>$catgory_id))->get(); 
		$userids = array();
		if ($data->num_rows()>0)
		{
		  foreach($data->result() as $userid)
		  {
			 $userids[] =  $userid->user_id;
		  }
			
		}
		return implode(',',array_unique($userids ));
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
	
	function assignservice(){
		   
		
		extract($_POST);
		$PrimaryID = $_POST['id'];
		unset($_POST['action'],$_POST['id']);
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('buyer_id', 'Buyer ', 'trim|required');
		if ($this->form_validation->run()==false)
		{
			$arr = array("status"=>"validation_error" ,"message"=> validation_errors());
			echo json_encode($arr);
		}
		else
		{
		$requestda	= $this->getrequestdats($buyer_request_quick_id);
		$forbuyerrequestarray = array(
				'buyer_id'=>$requestda->buyer_id,
				'category_id'=>$requestda->category_id,
				'description'=>$requestda->description,
				'budget'=>$requestda->budget,
				'delievry'=>$requestda->delievry,
				'assigned_by_admin'=>ACTIVE,
			    'created_date'=>NOW,
				'status'=>ACTIVE,
				
		);
			if($this->db->insert($this->tbl_buyer_request,$forbuyerrequestarray) > 0 )
			{   
			   $request_id = $this->db->insert_id();
				if(is_array($_POST['service_id']) and count($_POST['service_id']) > 0 )
				{
				    
					$aserviceinfo = implode(',',$_POST['service_id']);
					$aservicesrow = $this->getservicedata( $aserviceinfo ,$request_id);
					if($this->db->insert_batch($this->tbl_seller_offer_to_request,$aservicesrow) >0)
					{
					
						$result =1;
					}
				}
			}
		
		  if(is_array($_POST['service_id']) and count($_POST['service_id']) > 0 )
			{
			    $aserviceid = $_POST['service_id'];
				for($index = 0 ; $index < count($aserviceid); $index++)
				{
					if(!empty($aserviceid[$index]))
					{
						$aserviceids[] = array('buyer_id'=> $_POST['buyer_id'] ,'service_id '=>$aserviceid[$index],'created_date'=>NOW,'quick_request_id'=>$buyer_request_quick_id);
					}
					
					
				}  
				
				if(count($aserviceids))
				{
					//$this->db->where('buyer_id', $_POST['buyer_id']);
					//$result= $this->db->delete($this->tbl_buyrer_assigned_services);
					
					if($result)
					{
						if($this->db->insert_batch($this->tbl_buyrer_assigned_services,$aserviceids) >0){
						
							$result =1;
						}
					}
				}
			}
			
		 
		 switch($result){
			case 1:
			$arr = array('status' => 1,'message' => "Services assign succesfully to Buyer !");
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
	
	
	 function getrequestdats($quickrequestid)
	 {  
	 
		return $this->db->select('*')->from( $this->tbl)->where( array('id'=>$quickrequestid) )->get()->row(); 
	
	 }
	
	 function getservicedata($serviceid,$resuestid)
	 {  
	     
		$data = $this->db->query(" SELECT  id,user_id,description,price,delivery_time FROM ".$this->tbl_services." AS TS WHERE TS.id IN (".$serviceid.") ");
		$asellerrequestid = array();
		if ($data->num_rows()>0)
		{
			 
			foreach($data->result() as $row)
				{
		       $asellerrequestid[] = array(
						'seller_id'=>$row->user_id,
						'service_id'=>$row->id,
						'request_id'=>$resuestid,
						'description'=>$row->description,
						'price'=>$row->price,
						'duration'=>$row->delivery_time,
						'status'=>ACTIVE,
						'created_date'=>NOW,
					);
			   }
		}
		
		return $asellerrequestid;
		 
		 // seller_id 	service_id 	request_id 	description 	price 	duration 	status 	created_date 
		 
		//return $this->db->select('*')->from( $this->tbl_services)->where( array('id'=>$serviceid) )->get()->row(); 
	
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


	
	
}
