<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Postal_code extends MX_Controller {

	

	public function __construct(){

		parent::__construct();

		/*if(!$this->session->userdata('login')==true){

			redirect('auth/login', 'refresh');

		}*/

	}

	public $view = "view";

	public $tbl = 'postal_code';

	//0345-5822298

	// 0345 - 8522298 ramzan 88

	//0300-2218436 imram 31

	public function index(){  

$query = $this->db->query("SELECT pc.*,c.cat_name as city FROM `postal_code`as pc
join city as c on c.id=pc.city_id");
		$aData['data'] =$query;
		$this->load->view($this->view,$aData);

	}


function getPostalcodes(){
//	pre($_POST);
	$status=0;
$option='<option>No postal code found</option>';
$data = get_by_where_array(array('status'=>1,'city_id'=>$_POST['city_id']),$this->tbl);
//lq();
if($data->num_rows()>0){
	$option='';
	$status=1;
	foreach($data->result() as $row){
	$option.='<option value="'.$row->postal_code.'">'.$row->postal_code.'</option>';
	}
}
$arr = array('status' => $status,'option' => $option);
echo json_encode($arr);
}

	public function add(){  
//$aData['groups'] =$this->db->select('*')->from('extras_group')->get();
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
$this->load->library('form_validation');
$this->form_validation->set_rules('postal_code', 'postal code', 'trim|required');
$this->form_validation->set_rules('min_order', 'Min order', 'trim|required');
if ($this->form_validation->run()==false){
$arr = array("status"=>"validation_error" ,"message"=> validation_errors());
echo json_encode($arr);
}else{

			$result = $this->crud->saveRecord($PrimaryID,$_POST,$this->tbl);
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

	
	

}

