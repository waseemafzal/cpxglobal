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
			$aData['page_title'] = 'Home';
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
			$aData['page_title'] = 'press_release';
			$this->load->view('press_release',$aData);    
		}			

public function team()

		{
			$aData['page_title'] = 'team';
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

