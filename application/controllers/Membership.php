<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membership extends CI_Controller {


	  
	  function __construct()
	{
		parent::__construct();
			 define('IMG', base_url() . 'uploads/');
	}
	
	public function form(){
			$aData['page_title'] ='Form membership';

		$this->load->view('membership_form');
	
	}
public function why_membership(){
	$aData['page_title'] ='why membership';
		$this->load->view('why_membership',$aData);	
	}
public function membership_categories(){
	$aData['page_title'] ='membership categories';
		$this->load->view('membership_categories',$aData);	
	}
public function membership_benefits(){
	$aData['page_title'] ='membership benefits';
		$this->load->view('membership_benefits',$aData);	
	}
public function membership_List(){
	$aData['page_title'] ='membership_List';
		$this->load->view('membership_List',$aData);	
	}
public function membership_Associate(){
	$aData['page_title'] =' Associate Membership';
		$this->load->view('membership_Associate',$aData);	
	}
public function membership_corporate(){
	$aData['page_title'] ='corporate membership ';
		$this->load->view('membership_corporate',$aData);	
	}
public function membership_individual(){
	$aData['page_title'] ='individual membership';
		$this->load->view('membership_individual',$aData);	
	}
public function student_membership(){
	$aData['page_title'] ='student membership';
		$this->load->view('membership_student',$aData);	
	}


	
	
}
