<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Awards extends CI_Controller {


	  
	  function __construct()
	{
		parent::__construct();
	}
	
	public function index(){
		$aData['page_title'] ='BEST MACHINE';
		$this->load->view('BEST_MACHINE',$aData);
	}
	
	public function application(){
		$aData['page_title'] ='Application Process';
		$this->load->view('APPLICATION_PROCESS',$aData);
	}
	public function eligibility(){
		$aData['page_title'] ='Awards Eligibility';
		$this->load->view('ELIGIBILITY',$aData);
	}
	public function selection(){
		$aData['page_title'] ='SELECTION CRITERIA';
		$this->load->view('SELECTION_CRITERIA',$aData);
	}
	public function benefits(){
		$aData['page_title'] ='BENEFITS OF AWARDS';
		$this->load->view('BENEFITS',$aData);
	}
	
	
}
