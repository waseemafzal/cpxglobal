<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consultancy extends CI_Controller {


	  
	  function __construct()
	{
		parent::__construct();
			 define('IMG', base_url() . 'uploads/');
	}
	/*$route['buseiness_development'] = 'consultancy/buseiness_development';
$route['product_development'] = 'consultancy/product_development';
$route['business_innovation'] = 'consultancy/business_innovation';
$route['process_optimization'] = 'consultancy/process_optimization';
$route['markete_analysis'] = 'consultancy/markete_analysis';
*/
	public function buseiness_development(){
		$aData['page_title'] ='buseiness development';
		$this->load->view('buseiness_development',$aData);
	}
public function product_development(){
		$aData['page_title'] ='product development';
		$this->load->view('product_development',$aData);
	}
public function business_innovation(){
		$aData['page_title'] ='business innovation';
		$this->load->view('business_innovation',$aData);
	}
public function process_optimization(){
		$aData['page_title'] =' process optimization';
		$this->load->view('process_optimization');
	}
public function markete_analysis(){
		$aData['page_title'] =' markete analysis';
		$this->load->view('markete_analysis',$aData);
	}


	
	
}
