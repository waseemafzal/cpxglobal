<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Registrationdata extends MX_Controller {

	

	public function __construct(){

		parent::__construct();

		if(!$this->session->userdata('login')==true){

			redirect('auth/login', 'refresh');

		}

	}

	public $view = "view";

	public $tbl = 'tbl_registration';
	public $tbl_personal_detail = 'tbl_personal_detail';
	public $tbl_company_detail = 'tbl_company_detail';
	public $tbl_reffered_by = 'tbl_reffered_by';
	public $tbl_professional_education_detail = 'tbl_professional_education_detail';
	
	
	
	

	public function index()
	{  
	
		$aData['data'] = $this->db->query('SELECT * FROM `'.$this->tbl.'` as TBMP ORDER BY id DESC ');
		$this->load->view($this->view,$aData);
	}
	
	
	


 public  function getRegistrationDetail()
  {
	
	
	
	$response=array();
	$response['status']=0;
	$html='';
	$query = $this->db->query("SELECT * FROM ".$this->tbl." AS TPD   WHERE  TPD.id = '".$_POST['id']."'");
	$response = array('status' => 0,'data' => 'No info');
	if($query->num_rows()>0)
	{
		$status = 1;
		$user = $query->row();
		
		  $adata = json_decode($user->personal_detail);
		   $userHtml.='<h3 style="font-size:17px;font-weight:bold;">Personal Detail:</h3>';
		  
		   $userHtml.='<table border="1"  bordercolor="#ddd" width="100%">
		   
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Job Title</th>
					<th>Phone</th>
					<th>ID No</th>
					<th>Nationaliiy</th>
				</tr>';
			
				for($i=0;$i<count($adata->name);$i++)
				{
					$userHtml.='
					<tr>
						<td>'.$adata->name[$i].'</td>
						<td>'.$adata->email[$i].'</td>
						<td>'.$adata->job_title[$i].'</td>
						<td>'.$adata->phone[$i].'</td>
						<td>'.$adata->id_no[$i].'</td>
						<td>'.$adata->nationality[$i].'</td>
					</tr>
					';
				}
				$userHtml.='</table>';
				
				$acompany_detail = json_decode($user->company_detail);
					$userHtml.='</br><h3 style="font-size:17px; font-weight:bold;">Company Detail:</h3>';
				$userHtml.='<div id="inner">';
				//$userHtml.='<p style="margin: 0;"  align="center"><b style="font-size:17px;">Company Detail</b></p>';
				$userHtml.='<hr/>';
				$userHtml.='<div style="margin: 0;"> <strong>Name:</strong> '.$acompany_detail->name.'</div>';
				$userHtml.='<div style="margin: 0;"> <strong>Phone:</strong> '.$acompany_detail->phone.'</div>';
				$userHtml.='<div style="margin: 0;"> <strong>Address:</strong> '.$acompany_detail->address.'</div>';
				$userHtml.='<div style="margin: 0;"> <strong>Country:</strong> '.$acompany_detail->country.'</div>';
				
				
				
				
				$afinanace_detail = json_decode($user->finanace_detail);
					
				$userHtml.='</br><h3 style="font-size:17px;font-weight:bold;">Finanace Detail:</h3>';
				$userHtml.='<div id="inner">';
			
				$userHtml.='<hr/>';
				$userHtml.='<div style="margin: 0;"> <strong>Name:</strong> '.$afinanace_detail->name.'</div>';
				$userHtml.='<div style="margin: 0;"> <strong>Phone:</strong> '.$afinanace_detail->phone.'</div>';
				$userHtml.='<div style="margin: 0;"> <strong>Address:</strong> '.$afinanace_detail->email.'</div>';
				$userHtml.='<div style="margin: 0;"> <strong>Country:</strong> '.$afinanace_detail->position.'</div>';
				$userHtml.='<hr/>';
				
		
		
			$html.=$userHtml;
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

