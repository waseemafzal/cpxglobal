<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  
	class E404 extends CI_Controller
	{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->output->set_status_header('404');
		$this->load->view('404.php');    }
	}