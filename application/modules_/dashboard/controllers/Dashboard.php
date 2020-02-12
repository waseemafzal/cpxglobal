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

	
	 $id = get_session('user_type');

	
	$aData['buyer_count'] = $this->db->query("SELECT count(F.id) AS count_user_buyer_type FROM `freelancers` AS F INNER JOIN users AS U on U.id = F.user_id WHERE F.type = 'buyer' AND U.user_type = 2")->row()->count_user_buyer_type;
	
	$aData['freelancer_count'] = $this->db->query("SELECT count(F.id)  as count_user_freelancer_type FROM `freelancers` AS F INNER JOIN users AS U on U.id = F.user_id
WHERE F.type = 'normal' AND U.user_type = 2")->row()->count_user_freelancer_type;
	 
		$aData['total_active_service'] = $this->db->query("SELECT count(id) as total_active_service FROM `tbl_services` WHERE status =".ACTIVE."")->row()->total_active_service;
		
		$this->load->view('index',$aData);

	}

}

