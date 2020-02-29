<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eblogs extends CI_Controller {


	  
	  function __construct()
	{
		parent::__construct();
	}
	
	public function index(){
		$aData['page_title'] ='blogs';
		$aData['data'] =$this->db->query("select b.*,f.file as image from blogpost as b left join post_images as f on f.post_id=b.id ");
		$aData['recentPost'] =$this->db->query("select b.post_title,b.created_on,b.id from blogpost as b order by id desc limit 0,3");
		$this->load->view('blogs',$aData);
	}
	public function detail($id){
		$aData['page_title'] ='blog detail';
		$q =$this->db->query("select b.*,f.file as image from blogpost as b left join post_images as f on f.post_id=b.id  where b.id='".$id."'");
		$aData['row'] =$q->row();
		$aData['recentPost'] =$this->db->query("select b.post_title,b.created_on,b.id from blogpost as b order by id desc limit 0,3");
		$this->load->view('blogs-detail',$aData);
	}
	
}
