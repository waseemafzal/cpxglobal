<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {


	  
	  function __construct()
	{
		parent::__construct();
			 define('IMG', base_url() . 'uploads/');
	}
	
	public function services(){
		$q="SELECT s.*,im.image FROM `product` as s
join product_images as im on s.id=im.product_id
where s.status=1";
$aData['data']=$this->db->query($q);
$aData['page_title'] ='Services ';
		$this->load->view('manageServicves',$aData);
	}
	
	public function cms($id){ 
		$query =$this->crud->edit($id,'cms');
		$aData['imgdata'] =get_by_where_array(array('cms_id'=>$id),'tbl_sidebarcontent');
		$aData['row']=$query;
		$aData['meta_title']=$query->meta_title;
		$aData['meta_description']=$query->meta_description;
		$aData['meta_keyword']=$query->meta_keyword;
		$this->load->view('cms',$aData);
	}
	
public function profile(){
		$query =$this->crud->edit($this->session->userdata('user_id'),'users');
		//pre($query);
		$aData['row']=$query;
		$this->load->view('profile',$aData);
	}
public function history(){
		$aData['data'] =get_by_where_array(array('user_id'=>$this->session->userdata('user_id')),'order');
		
		$this->load->view('history',$aData);
	
	}
	public function checkstatus()
	{
	if(isset($_GET['orderNo'])){

		$data = $this->db->select('*')->from('order')->where('orderNo',$_GET['orderNo'])->get();
		if($data->num_rows()>0){
$row=$data->row();
$status = $row->status;
			if ($status==1) {
			$aData['orderstatus'] ='Order is in progress';
	
		}elseif ($status==0) {
			$aData['orderstatus'] ='Pending';
	
		}
		elseif ($status==2) {
			$aData['orderstatus'] ='Delivered';
	
		}
		elseif ($status==3) {
			$aData['orderstatus'] ='Completed';
	
		}elseif ($status==4) {
			$aData['orderstatus'] ='Canceled';
	
		}
		$aData['orderNo'] =$_GET['orderNo'];
		$aData['orderNoFound'] =true;
		$aData['row'] =$row;
		}
	}

	$aData['page_title'] ='Status of order | Findmaids';
		
	   $this->load->view('checkstatus',$aData);

	}
	
	public function login(){
		
$aData['page_title'] ='login';
		$this->load->view('login',$aData);
	}
	public function booking(){
		if(isset($_POST)){
			$aData['data'] =$this->db->select('*')->from('extras')->order_by("id","desc")->get();
			$this->session->set_userdata('initial_form',$_POST);
			}
$aData['page_title'] ='booking';
		$this->load->view('booking',$aData);
	}
	
	public function giftcard(){
		
$aData['page_title'] ='giftcard';
		$this->load->view('giftcard',$aData);
	}
	public function join(){
		
$aData['page_title'] ='Join Findmaids';
		$this->load->view('join',$aData);
	}
public function learn(){
		
$aData['page_title'] ='Learn Findmaids';
		$this->load->view('learn-more',$aData);
	}
	public function faq(){
		
$aData['page_title'] ='FAQ';
$aData['data'] =$this->db->query('SELECT f.*,fc.cat as category FROM `faqs` as f
join faq_cat as fc on fc.id=f.cat_id');
		$this->load->view('faq',$aData);
	}

	
	
	public function contact(){
		
		$this->load->view('contact');
	}
	
	public function packages(){
	$aData['PublishingPackages']=	$this->db->query("SELECT p.id as package_id,p.product_name as package,p.product_price as price,CONCAT(('".IMG."'),(''),(pi.image)) as image FROM `product` as p
join product_images as pi on pi.product_id=p.id and p.package_type='Publishing'  order by p.product_price ASC")->result_array();
	$aData['MarketingPackages']=	$this->db->query("SELECT p.id as package_id,p.product_name as package,p.product_price as price,CONCAT(('".IMG."'),(''),(pi.image)) as image FROM `product` as p
join product_images as pi on pi.product_id=p.id and p.package_type='Marketing' ")->result_array();
		$this->load->view('packages',$aData);
	}
	public function packageDetail($id){
	$aData['row']=	$this->db->query("SELECT p.id as package_id,p.product_name as package,p.product_description as description,p.product_price as price,CONCAT(('".IMG."'),(''),(pi.image)) as image FROM `product` as p
join product_images as pi on pi.product_id=p.id and p.id=".$id)->row();
	$aData['package_id']=$id;
		$this->load->view('packages-detail',$aData);
	}
	





	
	
}
