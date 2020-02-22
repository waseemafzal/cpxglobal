<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GalleryYear extends CI_Controller {


	  
	  function __construct()
	{
		parent::__construct();
	}
	
	public function view($year){
		$aData['page_title'] ='Gallery '.$year;
		$aData['year'] =$year;
		$this->load->view('gallery',$aData);
	}
	
}
