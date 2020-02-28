<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GalleryYear extends CI_Controller {


	  
	  function __construct()
	{
		parent::__construct();
	}
	public $tbl='tbl_gallery';
	public function view($year){
		$aData['page_title'] ='Gallery '.$year;
		$aData['year'] =$year;
		$aData['data'] =$this->get($year);
		$this->load->view('gallery',$aData);
	}
	    public function get($year)

    {

        $this->db->select('*');
        $this->db->from($this->tbl);
$this->db->where(array('status'=>1,'year'=>$year));

        $data = $this->db->get();

        if ($data->num_rows() > 0) {

            return $data;

        } else {

            return 0;

        }

    }
}
