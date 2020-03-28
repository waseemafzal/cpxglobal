<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Home extends CI_Controller {

public $tbl_user ="users";
public $tbl_notify ="tbl_notify";

    function __construct()

	{
		parent::__construct();
		define('IMG',base_url().'uploads/');
	}

     	public function index()

		{
			$aData['recentNews'] =$this->db->query("select b.* from news  as b order by id desc limit 0,4");
			$data = $this->db->select('*')->from('slider')->where('status',1)->get();
		if($data->num_rows()>0){
$aData['slider'] = $data;
		}else{
			$aData['slider'] =0;
			}
			$testimonial = $this->db->select('*')->from('testimonial')->get();
		if($testimonial->num_rows()>0){
$aData['testimonial'] = $testimonial;
		}else{
			$aData['testimonial'] =0;
			}
			$aData['page_title'] = 'Home';
			$aData['partners'] = $this->db->select('*')->from('slider_images')->where('post_id',1)->get();
			$this->load->view('index',$aData);    
		}			
		
public function global_presence()

		{
			$aData['page_title'] = 'global presence';
			$this->load->view('global_presence',$aData);    
		}			
public function history()

		{
			$aData['page_title'] = 'history';
			$this->load->view('history',$aData);    
		}			
public function mission()

		{
			$aData['page_title'] = 'mission';
			$this->load->view('mission',$aData);    
		}			
public function press_release()

		{
			$aData['page_title'] = 'press release';
			$this->load->view('press_release',$aData);    
		}			
public function press_detail($id)

		{
			$aData['page_title'] = 'press_release';
			$this->load->view('news-detail',$aData);    
		}			

		public function team()
		
		{
			$aData['page_title'] = 'team';
			$aData['aTeams'] = $this->db->select('*')->from('tbl_team')->get();
			$this->load->view('team',$aData); 
		}			

public function training()

		{
			$aData['page_title'] = 'training';
			$this->load->view('training',$aData);    
		}			

public function why()

		{
			$aData['page_title'] = 'why';
			$this->load->view('why',$aData);    
		}			

public function certifications()

		{
			$aData['page_title'] = 'certifications';
			$this->load->view('certifications',$aData);    
		}			



   

}// end of class

