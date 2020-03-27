<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Memberships extends MX_Controller {

	

	public function __construct(){

		parent::__construct();

		if(!$this->session->userdata('login')==true){

			redirect('auth/login', 'refresh');

		}

	}

	public $view = "view";

	public $tbl = 'order';
	public $tbl_personal_detail = 'tbl_personal_detail';
	public $tbl_company_detail = 'tbl_company_detail';
	public $tbl_reffered_by = 'tbl_reffered_by';
	public $tbl_professional_education_detail = 'tbl_professional_education_detail';
	
	
	
	

	public function index(){  
	
	
	$where  =  'WHERE  1=1  ';
	 
		
			
			if(isset($_POST['filterbtn']))
				{
				if(isset($_POST['paymentstatus']) and !empty($_POST['paymentstatus']))
				{
					$sts =0;
					if($_POST['paymentstatus']==1)
					{
						$sts = 1;	
					}
						$where .=' AND (TBMP.payment_status='.$sts.')';
				}
				
				if(isset($_POST['yearwise']) and !empty($_POST['yearwise']))
				{
					$yearwise = $_POST['yearwise']; 
					$where .=' AND (YEAR(TBMP.created_date)='.$yearwise.')';
				}
				
				if(isset($_POST['monthwise']) and !empty($_POST['monthwise']))
				{
					$monthwise = $_POST['monthwise']; 
					$where .=' AND (MONTH(TBMP.created_date)='.$monthwise.')';
				}
				$clause ='';
				if(isset($_POST['searchbynamecounrty']) and !empty($_POST['searchbynamecounrty']))
				{
					$searchbynamecounrty = $_POST['searchbynamecounrty']; 
					$clause .=' AND (((SELECT name FROM users AS u WHERE u.id = TBMP.user_id)='.'"'.trim($searchbynamecounrty).'" )';
					$clause .=' OR ';
					$clause .='  ((SELECT country FROM '.$this->tbl_company_detail.' AS f WHERE TBMP.id = f.memship_id)='.'"'.trim($searchbynamecounrty).'" ))';
					$where .= $clause;
				}
			}
		$aData['data'] =$this->db->query('SELECT *,
		(SELECT name FROM users AS u WHERE u.id = TBMP.user_id) as username,
		(SELECT country FROM '.$this->tbl_company_detail.' AS f WHERE TBMP.id = f.memship_id) as country  
		FROM `tbl_membershippackage` as TBMP  '.$where.' ORDER BY id DESC ');
		
		$this->load->view($this->view,$aData);
	}
	
	  
	
	public function addNote()
	{
	 
	  extract($_POST);
	  $data = array('id'=>$id,'package_info_admin'=>$note);
	  	echo $result =$this->crud->update_where($id,'tbl_membershippackage',$data);
	}

  public function getPackageDetail()
  {
	
	
	
	$response=array();
	$response['status']=0;
	$html='';
	$query = $this->db->query("SELECT * FROM ".$this->tbl_personal_detail." AS TPD   WHERE  TPD.id = '".$_POST['id']."'");
	$response = array('status' => 0,'data' => 'No info');
	if($query->num_rows()>0)
	{
		$status = 1;
		$user = $query->row();
		$Name =  $user->name.' '.$user->middle_name.' '.$user->last_name;
		$mobile =$user->mobile;
		$fax =$user->fax;
	 
	
		
		$userHtml.='<div id="inner">';
		$userHtml.='<p style="margin: 0;"   align="center"><b style="font-size:17px;">Personal Detail</b></p>';
		$userHtml.='<div style="margin: 0;"> <strong>Name:</strong> '.$Name.'</div>';
		$userHtml.='<div style="margin: 0;"> <strong>Mobile:</strong> '.$mobile.'</div>';
		$userHtml.='<div style="margin: 0;"> <strong>Fax:</strong> '.$fax.'</div>';
		$userHtml.='<hr/>';
		$query = $this->db->query("SELECT * FROM ".$this->tbl_company_detail." AS TPD   WHERE  TPD.id = '".$_POST['id']."'");
		$user = $query->row();
		$userHtml.='<p style="margin: 0;"  align="center"><b style="font-size:17px;">Company Detail</b></p>';
		$userHtml.='<div style="margin: 0;"> <strong>Company Name:</strong> '.$user->company_name.'</div>';
		$userHtml.='<div style="margin: 0;"> <strong>Principle Bussniss:</strong> '.$user->principle_bussniss.'</div>';
		$userHtml.='<div style="margin: 0;"> <strong>Number Of Employees:</strong> '.$user->number_of_employees.'</div>';
		$userHtml.='<div style="margin: 0;"> <strong>Address:</strong> '.$user->address.'</div>';
		$userHtml.='<div style="margin: 0;"> <strong>Country:</strong> '.$user->country.'</div>';
		$userHtml.='<div style="margin: 0;"> <strong>Zip:</strong> '.$user->zip.'</div>';
		$userHtml.='<hr/>';
		
		
		
		
		$query = $this->db->query("SELECT * FROM ".$this->tbl_professional_education_detail." AS TPD   WHERE  TPD.id = '".$_POST['id']."'");
		$user = $query->row();
		$userHtml.='<p style="margin: 0;"  align="center"><b style="font-size:17px;">Professional Education Detail</b></p>';
		$userHtml.='<div style="margin: 0;"> <strong>University:</strong> '.$user->university.'</div>';
		$userHtml.='<div style="margin: 0;"> <strong>Degree:</strong> '.$user->degree.'</div>';
		$userHtml.='<div style="margin: 0;"> <strong>Diploma:</strong> '.$user->diploma.'</div>';
		$userHtml.='<div style="margin: 0;"> <strong>Other:</strong> '.$user->other.'</div>';
		
		$adata = json_decode($user->job_detail);
		$userHtml.='<table border="1"  bordercolor="#ddd" width="100%">
					<tr>
					   <th>Company Name</th>
					   <th>Position</th>
					   <th>Month & Year</th>
					</tr>';
					
			for($i=0;$i<count($adata->cname);$i++)
			{
			$userHtml.='<tr>
						   <td>'.$adata->cname[$i].'</td>
						   <td>'.$adata->position[$i].'</td>
						   <td>'.$adata->period[$i].'</td>
						</tr>';
	         }
			$userHtml.='</table>';
		
		
		
		$userHtml.='<hr/>';
		$query = $this->db->query("SELECT * FROM ".$this->tbl_reffered_by." AS TPD   WHERE  TPD.id = '".$_POST['id']."'");
		$user = $query->row();
		$adata = json_decode($user->refferby_detail);
		
		$userHtml.='<p style="margin: 0;"  align="center"><b style="font-size:17px;">Reffered By</b></p>';
		$userHtml.='<div style="margin: 0;"> <strong>Reffred Name:</strong> '.$adata->reffredName.'</div>';
		$userHtml.='<div style="margin: 0;"> <strong>Reffred Company Name:</strong> '.$adata->reffredCompanyName.'</div>';
		$userHtml.='<div style="margin: 0;"> <strong>Reffred Address:</strong> '.$adata->reffredaddress.'</div>';
		$userHtml.='<div style="margin: 0;"> <strong>Suburb:</strong> '.$adata->Suburb.'</div>';
		$userHtml.='<div style="margin: 0;"> <strong>Reffred Phone:</strong> '.$adata->reffredPhone.'</div>';
		$userHtml.='<div style="margin: 0;"> <strong>Reffred Email:</strong> '.$adata->reffredEmail.'</div>';
		$userHtml.='<div style="margin: 0;"> <strong>State:</strong> '.$adata->State.'</div>';
		$userHtml.='<div style="margin: 0;"> <strong>Reffred Zip:</strong> '.$adata->reffredZip.'</div>';
		$userHtml.='<div style="margin: 0;"> <strong>Reffred Website:</strong> '.$adata->reffredWebsite.'</div>';
		
		
		
		$html.=$userHtml;
	//	$html.='<p>DELIVERY TIME :'.$user->delivery_time.' </p>';
		
		
		$c=1;
			$html.='<table>';
			$html.='<tfoot></tfoot>';
			
			$html.='<tfoot></tfoot>';
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

