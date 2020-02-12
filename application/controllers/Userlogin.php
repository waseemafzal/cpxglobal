<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Userlogin extends CI_Controller {

	

	

   public $tbl_currency = 'tbl_currency'; 



   function __construct()

	{

		

		 parent::__construct();

		 if(!empty($this->session->userdata('userlogin')) and  !empty($this->session->userdata('user_id')))

            {

				 redirect('/', 'refresh');

			}

		

	}

        

        

        // login page

		public function index()

		{

			

			$referal ='';

			

			if(!$this->session->userdata('login')==true)

			{  

				

				if (!empty(trim($this->input->get('referal'))))

				{

					$referal  = $this->input->get('referal');  

				}
           }
		   
		   // echo $referal;
			//die();

			$aData['countries'] = $this->db->select('country AS name,currency_id AS id')->from($this->tbl_currency)->order_by("id","desc")->get(); 

			$aData['page_title'] = 'Home';

			$aData['referal'] = $referal;

			$this->load->view('login-page',$aData);    

		}			



	

   

}

