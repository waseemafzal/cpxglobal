<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {


	  
	  function __construct()
	{
		parent::__construct();
	}
	public $tbl = 'tbl_training';
	
	public function view($year){
		$aData['page_title'] ='Events '.$year;
		$aData['year'] =$year;
		$aData['data'] =$this->db->query("SELECT p.* FROM ".$this->tbl." as p where on_date like '%".$year."%' ");
		
		$this->load->view('events',$aData);
	}
	public function detail($id){
		$aData['page_title'] ='Events ';
		
		$query =$this->crud->edit($id,$this->tbl);
		$aData['row']=$query;
		$this->load->view('event-detail',$aData);
	}
	
}
