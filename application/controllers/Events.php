<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {


	  
	  function __construct()
	{
		parent::__construct();
	}
	
	public function view($year){
		$aData['page_title'] ='Events '.$year;
		$aData['year'] =$year;
		$this->load->view('gallery',$aData);
	}
	
}
