<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Mobileservices extends MX_Controller {
	/*
	|---------------------------------------------
	|Database tables define public 
	|Created by waseem afzal:
    |website:cyphersol.com: Mail: ceo.cyphersol@gmail.com  
	 dec 4 2019
	|---------------------------------------------
	*/
		public $tbl_user ="users";
		public $tbl_session='app_user_session';		
		public $freelancers = 'freelancers';
		public $tbl_countries = 'tbl_countries';
		public $tbl_wishlist = 'tbl_wishlist';
		public $tbl_services_media ='tbl_services_media';
		public $tbl_services ='tbl_services';
		public $tbl_childmenu ='tbl_childmenu';
		public $tbl_submenu ='tbl_submenu';
		public $tbl_buyer_request ='tbl_buyer_request';
		public $tbl_seller_offer_to_request ='tbl_seller_offer_to_request';
		public $setting  = 'setting';
		public $order_files  = 'order_files';
		public $order  = 'order';
		public $tbl_review_rating  = 'tbl_review_rating';
		public $tbl_seller_payment_account  = 'tbl_seller_payment_account';	
		public $tbl_removed_request_by_sellers ='tbl_removed_request_by_sellers';
	
		function __construct(){
		parent::__construct();
		//error_reporting(1);
		header('Content-type: application/json');
		$this->load->model('MobileServices_model','AM');
		$this->load->model('FreelanceServices_model','FM');
		$this->load->library(array('auth/ion_auth','ion_auth'));
		$this->load->library("braintree_lib");
		 define('IMG', base_url() . 'uploads/');
		 define('APPKEY','imrankhan');
		 /*
		request status 0=pending,1=accepted,2=complete,3=canceled by driver,4= cancelled by customer
		 */
		
		$header=$this->input->request_headers();
		/*if($header['Appkey']!=APPKEY){
			 $this->error('Invalid request');exit;
			 }*/
		if(isset($header['Accesstoken'])){
		   			$uid = $this->validateAccessToken($header['Accesstoken']);
			define('USER_ID',(int)$uid);
			define('ACCESSTOKEN',$header['Accesstoken']);
			
			}
			
	}
        
    public function index()
	{
            echo 'Skill squared apis for android and ios';
	}
	
	
	private function printJSON($var){
				echo json_encode($var);
		}

    public function get_token()
    {
        $token = $this->braintree_lib->create_client_token();
        $this->printJSON($token);
    }
	/********BRAIN TREE*********/
	function payBraintree(){
extract($_POST);
 /*$result = $this->braintree_lib->sale([
  'amount' => $amount,
  'paymentMethodNonce' => $nonce,
  'options' => [ 'submitForSettlement' => true ]
]);*/
       
echo json_encode($result);

}// function end
	/*************************/
	
	
	/*****************************************
	| BUYER APIS START 
	*******************************************/
	public function proceedPayment()
		{
			$response=array();
			extract($_POST);
			$response['status']=200;
			if($this->verifyRequiredParams(array("request_id"))){
			$aData['customorderid'] = '';
			$this->load->library('paypal/paypalexpress','paypalexpress');
			$response['paypalEnv'] = $this->paypalexpress->paypalEnv;
			$response['paypalClientID'] = $this->paypalexpress->paypalClientID;
			$response['paypalSecret'] = $this->paypalexpress->paypalSecret;
			$response['requestid'] = $request_id;
			$offerrequestdetail = $this->FM->offerrequestdetail($request_id);
			$price = $offerrequestdetail['offerrequestdetail']->request_price;
			
			$response['totalToPay'] = calculateprocessingformula($price) ;
			$arr = explode('==>',$offerrequestdetail['offerrequestdetail']->service_title_image);
			$response['serviceTitle']=$arr[0];
			$response['serviceImage']=setServiceMedia('services/media/'.$arr[1]);
			
			$this->response($response);
			}
		}
	
	
	public function offerReceived()	{ 	
		if($this->verifyRequiredParams(array("request_id"))){
		$this->response($this->FM->buyerrecivedoffer(USER_ID,$_REQUEST['request_id']));
		}
	}
	public function sellerInfoByFreelancerID()	{ 	
		if($this->verifyRequiredParams(array("freelancer_id"))){
		$this->response($this->FM->sellerInfoByFreelancerID($_REQUEST['freelancer_id']));
		}
	}
	
		 function removesellerrequest(){ 
		extract($_POST);
		extract($_POST);
			$response=array();
			$response['status']=204;
			$response['message']='Error: Unable to delete!';
		$this->db->where('id', $offer_id);
		if( $this->db->delete($this->tbl_seller_offer_to_request)){
			$response['status']=200;
			$response['message']='Success: Deleted!';
			}
$this->response($response);
	 }
	 
	  public function getFavouriteServices()
	{ 
		$response=array();
		$response['status']=200;
		$response['favouriteServices']=	$this->FM->getFavouriteServices(USER_ID);
		$this->response($response);	
   }
	 
	 function makeFavouriteService(){ 
		extract($_POST);
		extract($_POST);
			$response=array();
			$response['status']=204;
			$response['message']='Error: something wrong!';
		$arr=array('user_id'=>USER_ID,'service_id'=>$service_id);
		if(checkExist('tbl_favourite_services',$arr))	{
			// if already exist delete it
		$this->db->where($arr);
			if( $this->db->delete('tbl_favourite_services')){
				$response['status']=200;
				$response['message']='Success: Unliked!';
			}else{
				$response['status']=204;
				$response['message']='Error: cannot unlike!';
				}
		}else{
			// inserting 
			if( $this->db->insert('tbl_favourite_services',$arr)){
				$response['status']=200;
				$response['message']='Success: Liked!';
			}
			}
			
		$this->response($response);
	 }

	function postBuyerRequest(){
			extract($_POST);
			$response=array();
			$response['status']=204;
			$response['message']='Error: Unable to save!';
			if($this->verifyRequiredParams(array("category_id","description","budget","delivery_time"))){
			$data['buyer_id'] = USER_ID;
			$data['created_date'] = NOW;
			$data['category_id'] = $_POST['category_id'];
			$data['description'] = $_POST['description'];
			$data['budget'] = (int)$_POST['budget'];
			$data['delievry'] = $_POST['delivery_time'];
			$data['status'] = 1;
			  if (isset($_FILES['require_doc']['name']) and !empty($_FILES['require_doc']['name'])) { 
				$imgcheck = true;
				$info = pathinfo($_FILES['require_doc']['name']);
				$ext = $info['extension']; // get the extension of the file
				$newname = rand(5, 3456) * date(time()) . "." . $ext;
				$target = 'uploads/buyer/' . $newname;
					if (move_uploaded_file($_FILES['require_doc']['tmp_name'], $target)) {
					$image = $newname;
					}
				$data = array_merge(array('require_doc'=>$image),$data);
			}
			if($this->db->insert($this->tbl_buyer_request,$data)){
					$response['status']=200;
			$response['message']='Your request has been received, you will received offers from qualified freelnacers.';
					}

			}
			$this->response($response);	
	 }

	public function buyerManageRequest(){ 
	$aData['buyerrequests'] = $this->FM->buyerrequests(USER_ID);
	$this->response($aData);
	//
	}
	 public   function removesBuyerPostedRequest(){ 
	 $response=array();
			$response['status']=204;
			$response['message']='Error: Unable to delete!';
			
		if($this->verifyRequiredParams(array("id"))){
		
		$this->db->where('id', $_REQUEST['id']);
		if($this->db->delete($this->tbl_buyer_request) )
        {
			if($this->FM->remove_allrequest_except_order_seller_requestid($_REQUEST['id'])){
				$response['status']=200;
			$response['message']='Success: deleted!';
				}
		}
		}
$this->response($response);
	 }

	public function buyerPlacedOrders(){  
	$response=array();
	$response['status']=200;
	$response['buyerordersmanagement'] = $this->FM->buyerordersmanagement(USER_ID);
	$response['buyerordersmanagement_custom'] = $this->FM->buyerordersmanagement(USER_ID, 'custom' );
	$this->response($response);
	}	 

/************************
| Buyer apis end
*************************/


	public function userSessions(){
		header('Content-type: text/html');
		$arr= $this->db->query(' select u.email,s.access_token,s.user_id from app_user_session as s join users as u on u.id=s.user_id')->result_array();
		echo '<table border="1">';
		echo '<tr><th>Email</th><td>USER_ID</th><th>access_token</th></tr>';
			
		foreach($arr as $row){
			echo '<tr><td>'.$row['email'].'</td><td>'.$row['user_id'].'</td><td>'.$row['access_token'].'</td></tr>';
			
			}
			echo '</table>';	
		}
	
	public function orders()
	{ 	
	
	    $aData['sellerordersfrombuyers'] = $this->FM->sellerordersfrombuyers(USER_ID);
		$aData['sellerordersfrombuyers_custom'] = $this->FM->sellerordersfrombuyers(USER_ID,'custom' );
		$this->response($aData);
	
	}
	
	public function removebuyerrequest()
   {
	extract($_POST);
	$response=array();
			$response['status']=204;
			$response['message']='Error: Unable to delete!';
	if($this->verifyRequiredParams(array("request_id"))){
		
if($this->db->insert($this->tbl_removed_request_by_sellers,array('request_id'=>$request_id,'seller_id'=>USER_ID))){
	$response['status']=200;
			$response['message']='Removed Successfully!';
	}
	}
	$this->response($response);
 }
	
	function checkLogin(){
		$header=$this->input->request_headers();
		$this->validateAccessToken($header['Accesstoken']);
	}
	 function createService()
	 { 
	 $this->checkLogin();
		extract($_POST);
		 $response=array();
		 
		$PrimaryID = base64_decode($_POST['id']);
		if($this->verifyRequiredParams(array("service_title","category_id","description","price","delivery_time"))){
			   $amedia = array('type'=>1);
				  
				if (!empty($_FILES['service_banner']['name']))
				{ 
					$config['upload_path']          = './uploads/services/media';
					$config['allowed_types']        = ALLOWED_TYPES_SERVICES;
					$config['encrypt_name'] = TRUE;
					$config['max_size']      = '1000'; // 1mb
					$this->load->library('upload');
					$this->upload->initialize($config);
					if (!$this->upload->do_upload('service_banner'))
					{
						$this->error($this->upload->display_errors());
					}
					else
					{
						$upload_data = $this->upload->data();
						$_POST['service_banner'] = $upload_data['file_name'];
					}
				}
				else
				{
					unset($_POST['service_banner']);
				}
			
			$servicekeyword   = ltrim(str_replace(',','-',str_replace('!','-',str_replace('/','-',str_replace(')','-',str_replace('(','-',str_replace(' ','-',str_replace('i will','',strtolower($service_title)))))))),'-');
			
			$servicekeyword  = preg_replace('/[^A-Za-z0-9\-]/', '', $servicekeyword);
			$adata = array(
				'user_id'=>USER_ID,
				'title'=>$service_title,
				'service_keyword'=>$servicekeyword,
				'category_id'=>$category_id, 
				'description'=>$description,
				'delivery_time'=>$delivery_time,
				'status'=>1,
				'price'=>(int)$price,
				'additional_info'=>$additional_info,
				'created_on'=>NOW
			);
			
		
			$media_video='';
			if(!empty($_POST['service_video']))
			{
				$media_video = $_POST['service_video'];
				$amedia = array_merge(array('media_video'=>$media_video),$amedia); 
			
			}
			
			$media ='';
			if(!empty($_POST['service_banner']))
			{
				$media = $_POST['service_banner'];
				$amedia = array_merge(array('media'=>$media),$amedia); 
			}
			
			if(empty($PrimaryID))
			{
				$adata = array_merge(array('cat_level'=>$cat_level,'unique_id'=>uniqid()),$adata);  // arslan
				//$media_video = '';
			}
			
			$result = $this->crud->saveRecord( $PrimaryID,$adata,$this->tbl_services );
			$insrtID = $this->db->insert_id();
			if(!empty($PrimaryID))
			{
				$adata = $amedia;
			 
			}
			else
			{
			  
			  $adata = array('service_id'=>$insrtID,'type'=>1,'media'=>$media,
			  'media_video'=>$media_video,'created_on'=>NOW);
			}
			
			if($result)
			{   
				$result = $this->crud->saveRecord( $PrimaryID,$adata,$this->tbl_services_media,'service_id' );
			}
			
			
		switch($result){
			case 1:


			$arr = array('status' => 200,'message' => "Congrats,Your service has been received and published Succefully.You can start receiving job offers.");
			$this->response($arr);
			break;
			case 2:
			$arr = array('status' => 200,'message' => "Your services has been  Updated Succefully !");
			$this->response($arr);
			break;
			case 0:
			$this->error("Not Saved!");
			break;
			default:
			$this->error("Not Saved!");
			break;	
		}
	 }

	}

	
	 public function getservicesTest()
	{ 
        $response=array();
		$response['services'] = $this->FM->getservicesTest($_REQUEST['cat_id']);
		
		$response['category_filters']=getcategoriesforfilter();
		$response['price_filters']=array(0,100,300,500,1200);
		
		
	$this->response($response);	
   }
   ///
   public function getServices()
	{ 
        $response=array();
	//	$response['services'] = $this->FM->getservices($_REQUEST['cat_id']);
		$response['services'] = $this->FM->getservicesTest($_REQUEST['cat_id']);
		
		$response['category_filters']=getcategoriesforfilter();
		$response['price_filters']=array('0-100','101-200','201-300','301-500','501-800');
		
		
	$this->response($response);	
   }
   
    public function homeData()
	{ 
        $response=array();
		$category=15;// slider id of freelancers landing page
		$banners =$this->db->select("image")->from('banners')->where('cat_id >',0)->order_by("id","desc")->get();
		$response['banners']=array();
		$aBanners=array();
		if (count($banners->result() > 0)) {
			foreach($banners->result() as $banner){
				
				$file=FCPATH.'uploads/banner/'.$banner->image;
						if(is_file($file)){
							$aBanners[]=base_url().'uploads/banner/'.$banner->image;
							}else{
								$aBanners[]=base_url().'assets/img/banner-9.jpg';
								}
			}
			
			$response['banners']=$aBanners;
			}
		$response['categories'] = $this->FM->getCategories();
		$response['featured_services'] = $this->db->query("select  * , CONCAT('".base_url()."uploads/services/media/',media) as media from featuredservices")->result_array();
		
		
	$this->response($response);	
   }
   
   
   
    public function manageServices()
	{ 
        $response=array();
		
		//CONCAT('".IMG."',image) as image
		//$FreelancerID=$this->getFreelancerID();
		
	$response=	$this->FM->getsellerservice(USER_ID);
	//	$response['user_id']=USER_ID;
	$this->response($response);	
   }
   
   
   
    function removeSellerService(){
			extract($_POST);
			$response=array();
			$response['status']=204;
			$response['message']='Error: Unable to delete!';
			$this->db->select('media');
			$this->db->from($this->tbl_services_media);
			$this->db->where("service_id",$service_id);
			$data = $this->db->get();
			if ($data->num_rows()>0)
			{
				$row = $data->row();
				unlink("./uploads/services/media".$row->media);  
				
				if($this->db->where('id', $service_id)->delete('tbl_services')){
					$response['status']=200;
			$response['message']='Succes:  deleted successfully!';
					}
			}
			$this->response($response);	
	 }


   
   
   
     function sendOffer()
	 {
		extract($_POST);
		$PrimaryID='';
	 if($this->verifyRequiredParams(array("service_id","buyer_request_id","description","price","duration"))){
		
		     
			$checkstatus =  get_id_by_key('status','id',$service_id,$this->tbl); // check the service status
			if($checkstatus!=1)
			{
				$arr = array('status' =>204,'message' => "Seems something wrong or this service has been deactivate.");
				echo json_encode($arr);	
				exit;
			}
			
			/// check avoid duplication
			 $checkExist = checkExist($this->tbl_seller_offer_to_request,
			 					array('seller_id'=>USER_ID,'service_id'=>$service_id,'request_id'=>$buyer_request_id));
			
			if($checkExist==1)
			{
				$arr = array('status' => 204,'message' => "You have already applied for this service");
				echo json_encode($arr);	
				exit;
			}
			
			if($checkExist==0)
			{	 	 	
			
			$data['status'] = 1;
			$data['created_date'] = NOW;
			$data['description'] = $_POST['offer']['custom_offer']['description'];
			$data['price'] = $_POST['offer']['custom_offer']['price'];
			$data['duration'] =  $_POST['offer']['custom_offer']['duration'];
			$data['service_id'] = $service_id;
			$data['seller_id'] = USER_ID;
			$data['request_id'] = $buyer_request_id;
		    
			$result = $this->crud->saveRecord( $PrimaryID,$data ,$this->tbl_seller_offer_to_request );
			switch($result)

			{

				case 1:
				$arr = array('status' => 200,'message' => "Your offer has been sent succesfully to this buyer.");
				break;
				case 2:
				$arr = array('status' => 204,'message' => "Your request has been Updated Succefully !");
				break;
				case 0:
				$arr = array('status' => 204,'message' => "Not Saved!");
				break;
				default:
				$arr = array('status' => 204,'message' => "Not Saved!");
				break;	

				

			}
           
		   }
	 }
$this->response($arr);
	}

   
   public function analytics()
	{ 	 
		
		$data['seller_complted_orders_count'] = $this->crud->sellercompltedorderscount(USER_ID);
		$data['seller_earnings_current_month'] = $this->crud->sellerearningscurrentmonth(USER_ID);
		$data['seller_earnings'] = $this->crud->sellerearnings(USER_ID);
		$data['seller_analytics'] = $this->crud->selleranalytics(USER_ID);
		$data['avgSellingPrice'] = $this->FM->avgSellingPrice(USER_ID);
		
		
		$this->response($data);
	}
	public function earnings()
	{ 	
	
	
		$data['seller_earnings'] =(float) $this->crud->sellerearnings(USER_ID);
		$data['avgSellingPrice'] = (float)$this->FM->avgSellingPrice(USER_ID);
		$data['seller_earnings_current_month'] =(float) $this->crud->sellerearningscurrentmonth(USER_ID);
		$data['total_completed_orders'] =(float) $this->crud->sellercompltedorderscount(USER_ID);
		
		$this->response($data);
	}	
   
    public function getCategories()
	{ 
        $response=array();
		$response['object'] = $this->FM->getCategories();
	$this->response($response);	
   }
   
    public function getBuyerRequests()
	{ 
        $response=array();
		//$response['object'] = $this->FM->getCategories();
		$response['buyer_requests'] = $this->FM->buyerrequestforseller(USER_ID);
		$response['sent_offers'] = $this->FM->sllersentoffers(USER_ID);	
	$this->response($response);	
   }
   
   
 
   
   
    public function getCatOptions()
	{ 
	$query=$this->db->query("SELECT id as cat_id,title FROM tbl_menu WHERE status=1 ");
        $response=array();
		foreach($query->result_array() as $row){
			//$row->subcats=$this->getsubcats($row->cat_id);
			$subQuery=$this->db->select('id,title')->from($this->tbl_submenu )->where('menu_id',$row['cat_id'])->get();
				if ($subQuery->num_rows()>0){
				foreach($subQuery->result_array() as $row2){
					$subCHildQuery =$this->db->select('id,title')->from($this->tbl_childmenu )->where('sub_menu_id',$row2['id'])->get();
					foreach($subCHildQuery->result_array() as $row3){
					$row2['subcat_child'][]=$row3;
					}
					$row['subcat'][]=$row2;
					}
				}else{
					$subQueryFor =$this->db->select('id,title')->from($this->tbl_childmenu )->where('menu_id',$row['cat_id'])->get();
					foreach($subQueryFor->result_array() as $row4){
					$row['subcat'][]=$row4;
					}
			
					}
			$response[]=$row;
			}
		
	$this->response($response);	
   }
	   public function getsubcats($category_id)
		{  
	
			   $query =$this->db->select('id,title')->from($this->tbl_submenu )->where('menu_id',$category_id)->get();
			$subcatsArr=array();
				if ($query->num_rows()>0)
{
foreach($query->result() as $subcat){
	$childs =$this->db->select('id,title')->from($this->tbl_childmenu)->where('sub_menu_id',$subcat->id)->get();

			if ($childs->num_rows()>0)
			{
			
			$subcat->subcatchilds=$childs->result_array();
			}else{
				$subcat->subcatchilds=array();
				}
	$subcatsArr[]=$subcat;
}
}  
				return $subcatsArr;
	  }
	  
	  public function getsubcat()
		{  
		if($this->verifyRequiredParams(array("category_id")))
		
			extract($_POST); 
			$response=array();
			$response['status']=204;
			$response['message']='No subcategories found!';
			$response['object']=array();
			   $data =$this->db->select('id,title')->from($this->tbl_submenu )->where('menu_id',$category_id)->get();
			
				if ($data->num_rows()>0)
				{
					$response['status']=200;
			$response['message']=$data->num_rows(). '  subcategories found!';
					$response['object']=$data->result_array();
				}  
			$this->response($response);	
	  }
	  public function getsubcatChild()
		{  
		if($this->verifyRequiredParams(array("subcat_id")))
		
			extract($_POST); 
			$response=array();
			$response['status']=204;
			$response['message']='No subcat child found!';
			$response['object']=array();
			   $data =$this->db->select('id,title')->from($this->tbl_childmenu )->where('sub_menu_id',$subcat_id)->get();
			
				if ($data->num_rows()>0)
				{
					$response['status']=200;
			$response['message']=$data->num_rows(). '  subcategories  child found!';
					$response['object']=$data->result_array();
				}  
			$this->response($response);	
	  }

	
	
	
function trueMail($email){
	$result=0;
	/*$service_url = 'https://api.trumail.io/v2/lookups/json?email='.$email;
       $curl = curl_init($service_url);
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($curl, CURLOPT_POST, false);
       curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
       $curl_response = curl_exec($curl);
       curl_close($curl);
	  // echo '==>'.$curl_response;exit;
	  $json_objekat=json_decode($curl_response, true);
	  if($json_objekat['deliverable']){
	 $result=1;
	 }  
	 return $result;*/
	 
$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://community-neutrino-email-validate.p.rapidapi.com/email-validate",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => "email=".$email,
	CURLOPT_HTTPHEADER => array(
		"content-type: application/x-www-form-urlencoded",
		"x-rapidapi-host: community-neutrino-email-validate.p.rapidapi.com",
		"x-rapidapi-key: a135d6527emsh015bb48ad33caf4p1302a3jsncc77f5948472"
	),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	
	$response["status"] = 204;
            $response["error"] = 1;
            $response["message"] ="cURL Error #:" . $err;;
            echo json_encode($response);
            exit;
} else {
	 json_encode($response);exit;
}
	 
	}	
	
	
    ////////////////////////////// USER APIS START///////////////////////////////////    
		
function  validateAccessToken($access_token) {
	$data = $this->db->query("SELECT user_id from ".$this->tbl_session." where access_token='".$access_token."'");
	if($data->num_rows() > 0 ){
		return  $data->row()->user_id;
	}else{
		$this->error("You need to login to proceed");
		}
} 

function randomKey($length) {
   // $pool = array_merge(range(0,9), range('a', 'z'),range('A', 'Z'));
  $pool = array_merge(range(0,9));
$key='';
    for($i=0; $i < $length; $i++) {
        $key .= $pool[mt_rand(0, count($pool) - 1)];
    }
    return $key;
}
public function error($message){
            $response["status"] = 204;
            $response["error"] = 1;
            $response["message"] = strip_tags($message);
            echo json_encode($response);
            exit;
    }
    function verifyRequiredParams($required_fields) {
            $error = false;
            $error_fields = "";
            $request_params = array();
            $request_params = $_POST;
            // Handling PUT request params
            foreach ($required_fields as $field) {
                if (!isset($request_params[$field]) || strlen(trim($request_params[$field])) <= 0) {
                    $error = true;
                    $error_fields .= $field . ', ';
                }
            }
            if ($error) {
                // Required field(s) are missing or empty
                // echo error json and stop the app
                $response = array();
                $response["status"] = 204;
                $response["message"] = 'Required field(s) ' . substr($error_fields, 0, -2) . ' is missing or empty';
                echo json_encode($response);exit;
                return false;
            } else {
                return true;
            }
    }
        
    /****************** SIGNUP OR REGISTER **************************/
	//ALTER TABLE `users`  ADD `timezone` VARCHAR(255) NOT NULL  AFTER `password`;
	function response($responseArr){
	echo json_encode($responseArr); exit;
	}
	
	function hashPassword($pass){
		
		return $this->ion_auth->hash_password($pass);
		}
	function checkPass($id,$pass){
		$this->load->library(array('auth/ion_auth','ion_auth'));
		return $this->ion_auth->hash_password_db($id,$pass);
		
		}
		
		
		
    public function signup() {
		extract($_POST);
		
		$response=array();
             /*  if($this->trueMail($_POST['email'])==0){
			$response['status']=204;
                        $response['message']="Email is not valid and host not exists!";
                        $this->response($response);
			}*/
                //Validating Required Params
                if($this->verifyRequiredParams(array("name","email","password","phone","timezone","devicetype","device_id"))){
                    //Checking Email already exists
                    $emailExist = $this->AM->mail_exists($email);
                    if($emailExist){
                        $response['status']=204;
                        $response['message']="Email exist already";
                        $this->response($response);
                        
                    }
		$this->form_validation->set_rules('password', 'password', 'required|min_length[8]|max_length[12]');
		if ($this->form_validation->run()==false){
			$this->response(array("status"=>204 ,"message"=> strip_tags(validation_errors())));
		}
                    
//$password = $this->hashPassword($_POST["password"]);
			$activation_code = uniqid();
			$additional_data = array(
				'email' => $email,
				'user_type' =>2,
				'name'=>$name,
				'phone'=>$phone, // arslan
				'activation_code' => $activation_code,
				'password' => $password,
				'timezone' => $timezone,
				'active' => 0,
				'referal_code'=>time().str_replace('=',rand(),base64_encode(time())).uniqid()
				
			);
                 //  $id=$this->AM->insert($this->tbl_user, $additional_data);
				
                   if($this->ion_auth->register($email, $password, $email, $additional_data)){	
                        $user = $this->AM->getUserByEmail($email);
						$href = base_url().'verify/email/'.$activation_code;
				
				$htmlContent=$this->crud->setEmailTemplate($name,$href);
				$to=$email;
				$from='noreply@skillsquared.com';
				$from_heading='SkillSquared';
				$subject='EMAIL VERIFICATION';
				if($this->input->ip_address()!='127.0.0.1')
				{
					$this->crud->send_mail($to,$from,$from_heading,$subject,$htmlContent);
				}
                        //removing password from response
                        if ($user != NULL) {
                            $response["status"] = 200;
                            $response['message'] = "Successfully Signup";
                           // $response['user'] = $user;
                            echo json_encode($response);
                            exit;
                        }
                    }
                }//validation of required fields
               
    }
	
	
	

    public function login() {
		extract($_POST);
		$response=array();
                
                //Validating Required Params
                if($this->verifyRequiredParams(array("email","password","devicetype","device_id"))){
                    
                     // check for correct email and password
					$row= $this->db->select('id')->where('email',$email)->get($this->tbl_user);
					if($row->num_rows()>0){
					
                    if ($this->ion_auth->login($email, $password))

			{    
			$user=$row->row();
			$user_id=$user->id;
                        //update device_type and device_id
                        $userUpdateDevices = $this->AM->updateDevice($user_id,$devicetype,$device_id);
                       
                        
                        // get the user by email
                        $user = $this->AM->getUserObject($user_id);
						
                        $user['access_token']=$this->createSession($user_id);
						$referal_code = get_id_by_key('referal_code','id',$user_id,'users');
				 $user['referal_url'] = base_url().'Userlogin/?referal='.$referal_code;
				 unset($user['referal_code']);
                        $user['image']=setUserImage($user['image']);
                        if ($user != NULL) {
							$response["freelancer"] = false;
							$response["freelancer_id"] = NULL;
							$FreelancerID=$this->db->select('id')->where('user_id',$user_id)->get($this->freelancers)->row()->id;;
							if($FreelancerID!=NULL and $FreelancerID!='' and $FreelancerID>0){
								$response["freelancer"] = true;
								$response["freelancer_id"] = (int) $FreelancerID;
								}
								
                            $response["status"] = 200;
                            $response['message'] = "Successfully Login";
                            $response['skillSquaredUser'] = $user;
                            echo json_encode($response);
                            exit;
                        }
                    } else {
                        // user credentials are wrong
                        $response['status'] = 204;
                        $response['message'] = 'Login failed. Incorrect credentials';
                        echo json_encode($response);
                        exit;
                    }
					}
					else {
                        // user credentials are wrong
                        $response['status'] = 204;
                        $response['message'] = 'Login failed. Incorrect credentials';
                        echo json_encode($response);
                        exit;
                    }
                }//validation of required fields
				
                
    }
	
	function createSession($user_id){
	$data=array();
	//$this->db->where(array('user_id'=>$user_id))->delete($this->tbl_session);
		
	$token = $this->randomKey(5).time();
	$data['access_token']= $token;
	
	$data['user_id']=$user_id;
	if($this->db->insert($this->tbl_session,$data)){
		return $token;
		}else{
			return false;
			}		
}

	
	
    public function profile(){
        extract($_POST);
		$response=array();
                
                //Validating Required Params
                if($this->verifyRequiredParams(array("user_id"))){
                    
                        // get the user by id
                        $user = $this->AM->getUserById($user_id);
                        //removing password from response
                                               
                        if ($user != NULL) {
                            unset($user['password']);
                            $response["status"] = 200;
                            $response['message'] = "User Profile";
                            $response['user'] = $user;
                            $response['user']['stats']=$this->AM->getUsersStatsByUserId($user_id);
                            echo json_encode($response);
                            exit;
                        } else {
                        // user credentials are wrong
                        $response['status'] = 204;
                        $response['message'] = 'User does not exists';
                        echo json_encode($response);
                        exit;
                    }
                }
    }
    public function getSellerProfile(){
        extract($_POST);
		$response=array();
      $freelancer_user_id =$this->getFreelancerID();
	  
		$aData['page_title'] ='Freelancer Profile';
		$aData['freelancer_user_id'] = $freelancer_user_id;
		$aData['avgRating'] = floatval($this->FM->avgRatingByFreelance(USER_ID));
		$aData['profileinfo'] = $this->FM->getprofileinfo($freelancer_user_id);		
		$aData['skills'] = array("PHP","javascript","Jquery");		
		$aData['SellerReviews'] = $this->getReviews(); 		
		$this->response($aData);
	 
    }
	
	
	function terms(){
		 $response['status']=200;
	$termsData= $this->db->select('post_description')->where('id',3)->get('cms')->row()->post_description;
	$response['data']=$termsData;
	echo json_encode($response); exit;
 }
function privacyPolicy(){
		 $response['status']=200;
	$termsData= $this->db->select('post_description')->where('id',2)->get('cms')->row()->post_description;
	$response['data']=$termsData;
	echo json_encode($response); exit;
 }
		
	
	
	function getFreelancerID(){
	return  $this->db->select('id')->where('user_id',USER_ID)->get($this->freelancers)->row()->id;	
		}
	function getReviews(){
		$response=array();
		$Q = $this->db->select('id')->where('user_id',USER_ID)->get($this->tbl_services);
	  foreach($Q->result() as $service){
		  $d=$this->db->select("r.review ,r.rating,r.created_date,u.name as buyerName,CONCAT('".base_url()."uploads/users/',u.image) AS buyer_image")
		  ->join('users as u ','u.id=r.user_id')
		  ->where('r.service_id',$service->id)->get('tbl_review_rating as r');
		  if($d->num_rows()>0){
			  
			  $response=$d->result_array();
			  }
		  }
		return $response;
		}
////////////////////////////// USER APIS END///////////////////////////////////    
        
            function forgotPassword() {
        if ($this->verifyRequiredParams(array("email"))) {
            extract($_POST);
            $result = $this->db->select('id')->from($this->tbl_user)->where(array("email" => $email))->get();
            if ($result->num_rows() == 1) {
                $response['status'] = 200;
                $response['message'] = "New login details has been sent on your email.";
                $password = rand(1000000, 9999999);
                $this->sendPassordResetEmail($email, $password);
                $row = $result->row();
                //update password 
                $this->db->where("id", $row->id);
                $this->db->update($this->tbl_user, array("password" => md5($password)));
                echo json_encode($response);
                exit;
            } else {
                $this->print_error("Invalid Email");
            }
        }
    }


    function print_error($message) {
        $response['status'] = 204;
        $response['message'] = $message;
        echo json_encode($response);
        exit;
    }
      function updateProfilePicture() {
        if ($this->verifyRequiredParams(array("user_id"))) {

            if (isset($_FILES['image']['name'])) {
                $info = pathinfo($_FILES['image']['name']);
                $ext = $info['extension']; // get the extension of the file
                $newname = rand(5, 3456) * date(time()) . "." . $ext;
                $target = 'uploads/' . $newname;
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                    $image = 'uploads/'.$newname;
                }
            } else {
                $this->print_error("image is required!");
            }
            extract($_POST);
            $this->db->where('id', $user_id);
            $this->db->update($this->tbl_user, array('image' => $image));
            if ($this->db->affected_rows() == true) {

                $result = $this->db->select('image')->from($this->tbl_user)->where(array("id" => $user_id))->get();
                if ($result->num_rows() == 1) {
                    $row = $result->row();
                    $row->image = $row->image;
                    $response['status'] = 200;
                    $response['message'] = 'Profile Picture Successfully Updated!';
                    $response['object'] = $row;
                }
                echo json_encode($response);
                exit;
            } else {
                $response["status"] = 204;
                $response['message'] = 'No New values(changes) to update!';
                echo json_encode($response);
                exit;
            }
        }
    }   
      function updateProfileCover() {
        if ($this->verifyRequiredParams(array("user_id"))) {

            if (isset($_FILES['image']['name'])) {
                $info = pathinfo($_FILES['image']['name']);
                $ext = $info['extension']; // get the extension of the file
                $newname = rand(5, 3456) * date(time()) . "." . $ext;
                $target = 'uploads/' . $newname;
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                    $image = 'uploads/'.$newname;
                }
            } else {
                $this->print_error("image is required!");
            }
            extract($_POST);
            $this->db->where('id', $user_id);
            $this->db->update($this->tbl_user, array('cover' => $image));
            if ($this->db->affected_rows() == true) {

                $result = $this->db->select('cover')->from($this->tbl_user)->where(array("id" => $user_id))->get();
                if ($result->num_rows() == 1) {
                    $row = $result->row();
                    $row->cover = $row->cover;
                    $response['status'] = 200;
                    $response['message'] = 'Profile Cover Successfully Updated!';
                    $response['object'] = $row;
                }
                echo json_encode($response);
                exit;
            } else {
                $response["status"] = 204;
                $response['message'] = 'No New values(changes) to update!';
                echo json_encode($response);
                exit;
            }
        }
    }   
      
        
}
