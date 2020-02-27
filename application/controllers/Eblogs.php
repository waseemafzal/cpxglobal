<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eblogs extends CI_Controller {


	  
	  function __construct()
	{
		parent::__construct();
	}
	
	public function index(){
		$aData['page_title'] ='blogs';
		$aData['data'] =get_table('blogpost');
		$this->load->view('blogs',$aData);
	}
	public function detail(){
		$aData['page_title'] ='blog detail';
		$this->load->view('blog-detail',$aData);
	}
	
}
