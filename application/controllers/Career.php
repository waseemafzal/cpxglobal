<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Career extends CI_Controller {
	
	function __construct(){
	parent::__construct();
	}
	
	
	public 	function email($a)
		{
			$where=array('activation_code'=>$a);
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($where);
		$data = $this->db->get();
	
		if ($data->num_rows()>0){
			$dbExi=$this->db->where(array('activation_code'=>$a))->update('users', array('active'=>1)); 
					if($dbExi){
						$aData['status']=1;
						$aData['alertClass']='alert-success';
						$aData['message']="Success: Your Acount Has Been Activated";
					
			}
		}
			else{
			$aData['status']=0;
			$aData['alertClass']='alert-danger';
			$aData['message']="Error: Something went wrong";		
			}
			$this->load->view('verified_message',$aData);
		}
	public function index(){
		$aData['data'] =get_by_where_array(array('status'=>1),'tbl_jobs');
		
		$this->load->view('career',$aData);
	
	}
public function detail($id){ 
		$query =$this->crud->edit($id,'tbl_jobs');
		$aData['row']=$query;
		$aData['meta_title']='Career';
		$aData['meta_description']='CPPEx Global hire the experienced, best and brightest printing &amp; packaging and associated industrial specialists';
		$aData['meta_keyword']='CPPEx Global,jobs,hiring,printing jobs';
		$this->load->view('career_detail',$aData);
	}
/*******end of api ***********/	
}
