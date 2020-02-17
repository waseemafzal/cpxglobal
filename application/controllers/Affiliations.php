<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Affiliations extends CI_Controller {


	  
	  function __construct()
	{
		parent::__construct();
			 define('IMG', base_url() . 'uploads/');
	}
	/*$route['partners'] = 'affiliatioin/partners';
$route['customer'] = 'affiliatioin/customer';
*/
	public function customers(){
		$aData['page_title'] ='customers';
		$this->load->view('customers',$aData);
	}
public function partners(){
		$aData['page_title'] ='partners';
		$this->load->view('partners',$aData);
	}
	
	
}
