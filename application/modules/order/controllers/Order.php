<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Order extends MX_Controller {

	

	public function __construct(){

		parent::__construct();

		if(!$this->session->userdata('login')==true){

			redirect('auth/login', 'refresh');

		}

	}

	public $view = "view";

	public $tbl = 'order';

	public function index(){  
	
		$aData['data'] =$this->db->query('SELECT o.*,s.title as status,s.id as status_id,u.name,u.email,u.phone FROM `order` as o 
		join users as u on u.id=o.user_id
		join orderstatustitles as s on s.id=o.status WHERE o.status !='.DISPUTED.' ORDER BY created_on DESC');
		$this->load->view($this->view,$aData);
	}
	
	
	


function getOrderDetail()
{
	$response=array();
	$response['status']=0;
	$html='';
	//$settingData =	get_by_where_array(array('id'=>1),'setting');
	//$setting = $settingData->row();
	//$banner = base_url().'uploads/'.$setting->banner;
	//$logo = base_url().'uploads/'.$setting->image;
	//$address = $setting->address;
	//$phone = $setting->phone;

  //pre($_POST);


    $this->db->where('id',$_POST['id'])->update('order',array('watched'=>1));
    $query = $this->db->query("SELECT O.amount as total_paid_amount_buyer,TSPC.amount as seller_earn_amount,O.status AS order_status,
				(SELECT CONCAT(U.name,'|',U.email,'|',U.phone,'|',U.address) FROM users as U WHERE TSPC.buyer_id = U.id) AS buyer_info,
				(SELECT CONCAT(U.name,'|',U.email,'|',U.phone,'|',U.address) FROM users as U WHERE TSPC.seller_id = U.id) AS seller_info 
		
			FROM `tbl_seller_payment_account` AS TSPC 
			INNER JOIN `order` AS O ON TSPC.order_id = O.id   
			WHERE  O.id = '".$_POST['id']."'");
	$response = array('status' => 0,'data' => 'No info');
	if($query->num_rows()>0)
	{
		$status = 1;
		$user = $query->row();
		$abuyer_info =  explode('|',$user->buyer_info);
		$buyername = $abuyer_info[0];
		$buyeremail = $abuyer_info[1];
		$buyerphone= $abuyer_info[2];
		$buyeraddress = $abuyer_info[3];
		
		$aseller_info =  explode('|',$user->seller_info);
		$sellername = $aseller_info[0];
		$selleremail = $aseller_info[1];
		$sellerphone= $aseller_info[2];
		$selleraddress = $aseller_info[3];
	 
	
		
		$userHtml.='<div id="inner">';
	//	$userHtml.='<img width="50" src="'.$logo.'">';
	//	$userHtml.='<p style="font-sive: 10px;margin: 0;">'.$address.'</p>';
		//$userHtml.='<p style="font-sive: 10px;margin: 0;">'.$phone.'</p>';
		$userHtml.='<p style="margin: 0;"><b>Buyer Detail :</b></p>';
		$userHtml.='<div style="margin: 0;"><i class="fa fa-user"></i> '.$buyername.'</div>';
		$userHtml.='<div style="margin: 0;"><i class="fa fa-envelope-square"></i> '.$buyeremail.'</div>';
		$userHtml.='<div style="margin: 0;"><i class="fa fa-phone"></i> '.$buyerphone.'</div>';
		$userHtml.='<div style="margin: 0;"><i class="fa fa-map-marker"></i> '.$buyeraddress.'</div>';
		$userHtml.='<hr><p style="margin: 0;"><b>Seller Detail </b>:</p>';
		$userHtml.='<div style="margin: 0;"><i class="fa fa-user"></i>  '.$sellername.'</div>';
		$userHtml.='<div style="margin: 0;"><i class="fa fa-envelope-square"></i> '.$selleremail.'</div>';
		$userHtml.='<div style="margin: 0;"><i class="fa fa-phone"></i>  '.$sellerphone.'</div>';
		$userHtml.='<div style="margin: 0;"><i class="fa fa-map-marker"></i> '.$selleraddress.'</div><hr>';
		
		$html.=$userHtml;
	//	$html.='<p>DELIVERY TIME :'.$user->delivery_time.' </p>';
		
		
		$c=1;
			$html.='<table>';
			$html.='<tfoot><tr ><td></td><td></td><th  align="right"> Paid by Buyer Total: '.nmf($user->total_paid_amount_buyer).' USD</th></tr></tfoot>';
			
			$html.='<tfoot><tr ><td></td><td></td><th  align="right"> Seller earned amount after deduction: '.nmf($user->seller_earn_amount).' USD</th></tr></tfoot>';
			$html.='</table>'; 
			
			
			$html.='</div>';
			$response = array('status' => 1,'data' => $html);
       }
	
		 $response['unreadCounter'] = count_tbl_where('order','watched',0);
		 echo json_encode($response);
  }

function getProductExtras($opd_id){
	$row = array('item_detail'=>'-','extra_price_total'=>0);
$data = $this->db->query("SELECT e.title as extra_item,e.price FROM `order_product_extras` as ope
join extras as e on e.id=ope.extra_item_id and ope.opd_id= ".$opd_id);
if($data->num_rows()>0){
	$html=array();
	$extra_price_total=0;
foreach($data->result() as $row){

$html[]=$row->extra_item;
$extra_price_total=$extra_price_total+$row->price;
}
$html = implode(',',$html);
$row = array('item_detail'=>$html,'extra_price_total'=>$extra_price_total);
}

return $row;
}

	public function completed(){  



		$aData['data'] =$this->db->select('*')->query("SELECT u.name as user_name, o.* FROM `order` as o
join users as u on u.id=o.user_id where status=1;

");

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
public function deleteGetCash(){ 
		extract($_POST);
		$result =$this->crud->delete($id,'order');
		$data = get_by_where_array(array('order_id'=>$id),'order_product_detail');
		if($data->num_rows() > 0 ){
		foreach($data->result() as $row){
		$this->db->where('opd_id',$row->id)->delete('order_product_extras');
		}
		}
		$this->db->where('order_id', $id);
		$this->db->delete('order_product_detail');
		
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

		$this->form_validation->set_rules('status', 'status', 'trim|required');

		if ($this->form_validation->run()==false){

			$arr = array("status"=>"validation_error" ,"message"=> validation_errors());

			echo json_encode($arr);

		}else{

			$result = $this->crud->saveRecord($PrimaryID,$_POST,'order');

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

		$result =$this->crud->update_where($edit_img_id,'product_images',$data);

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


public function getNewOrderCount(){
	$arr = array('status' => 1,'unreadCounter' => count_tbl_where('order','watched',0));
			echo json_encode($arr);
	}


	

	

}

