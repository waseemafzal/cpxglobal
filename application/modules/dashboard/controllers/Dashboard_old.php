<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Dashboard extends MX_Controller {



	public function __construct(){

		parent::__construct();

		if(!$this->session->userdata('login')==true ){

			redirect('auth/login', 'refresh');

		}
		if($this->session->userdata('user_type')!=1){

			redirect('auth/login', 'refresh');

		}

	}

	

	public function index()

	{ 

	//$this->crud->set_language($this->session->userdata('lang_code'));
// check shop is closed or not
	 $id = get_session('user_type');
$res = $this->db->query("select * from setting where id =1");
$this->session->set_userdata('shop_status',$res->row()->status);
	//$this->crud->set_permission($id);
	$aData['buyer_count'] = $this->db->query("SELECT  count((SELECT F.type FROM `freelancers` AS F WHERE U.id = F.user_id and F.type = 'buyer')) 
	As count_user_buyer_type FROM `users` AS U WHERE U.`user_type` = 2")->row()->count_user_buyer_type;
	
	$aData['freelancer_count'] = $this->db->query("SELECT  count((SELECT F.type FROM `freelancers` AS F WHERE U.id = F.user_id and F.type = 'normal')) As count_user_freelancer_type FROM `users` AS U WHERE U.`user_type` = 2")->row()->count_user_freelancer_type;
	
		$aData['total_active_service'] = $this->db->query("SELECT count(id) as total_active_service FROM `tbl_services` WHERE status =".ACTIVE."")->row()->total_active_service;
		
		
		
	
  //$array  = 
		$this->load->view('index',$aData);

	}

}

