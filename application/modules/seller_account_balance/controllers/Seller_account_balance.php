<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller_account_balance extends MX_Controller {



	public $users = 'users';
	public $tbl_seller_balance = 'tbl_seller_balance';
	



	public function __construct(){



		parent::__construct();



		if(!$this->session->userdata('login')==true){



			redirect('auth/login', 'refresh');



		}



	}



	public $view = "view";
	public function index()
	{  
		$aData['data'] = $this->db->query("SELECT TSB.*,(SELECT U.name FROM ".$this->users." AS U WHERE U.id =TSB.seller_id ) AS seller_name FROM 
		`".$this->tbl_seller_balance."` AS TSB"); 
		$this->load->view($this->view,$aData); 
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



			$arr = array("status"=>0 ,"message"=> validation_errors());



			echo json_encode($arr);



		}else{



			$result = $this->crud->saveRecord($PrimaryID,$_POST,'payment_requests');



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



