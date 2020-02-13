<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Home extends CI_Controller {

public $tbl_user ="users";
public $tbl_notify ="tbl_notify";









    function __construct()

	{

		

		parent::__construct();

		define('IMG',base_url().'uploads/');

	}

        

        function sendemail(){

             $this->load->library('email');

             $to="ceo.cyphersol@gmail.com";

             $from="noreply@skillsquared.com";

             $from_heading="skillsquared";

             $subject="SMTP EMAIL";

             $htmlContent='<p>Hello there, this is a test email from skillsquared</p>';

        //SMTP & mail configuration

        $config = array(

            'protocol' => 'smtp',

            'smtp_host' => 'ssl://skillsquared.com',

            'smtp_port' => 465,

            'smtp_user' => 'noreply@skillsquared.com',

            'smtp_pass' => 'P@ssword123',

            'mailtype' => 'html',

            'charset' => 'iso-8859-1'

        );

        $this->email->initialize($config);

        

        //Email content

        $this->email->to($to);

        $this->email->from($from, $from_heading);

        $this->email->subject($subject);

        $this->email->message($htmlContent);

        //Send email

        if ($this->email->send()) {

            echo 'sent';

        } else {

          // $this->crud->send_smtp_email($to, $from, $from_heading, 'BC Subject with simple mail', $htmlContent);

        echo $this->email->print_debugger();

        }

        }

        

        

		public function index()

		{
			$aData['page_title'] = 'Home';
			$this->load->view('index',$aData);    
		}			



		

	

	

		public function profile()

		{

			$res = $this->db->query("select * from setting where id =1");

			$this->session->set_userdata('shop_status',$res->row()->status);

			$this->session->set_userdata('shop_timing',$res->row()->description);

			

			

			$aData['menu_categories']=$this->db->get('categories');

			$aData['user']=$this->db->where('id',get_session('user_id'))->get('users')->row();

			$this->load->view('profile',$aData);

		

		}

	

	

	

		public function search($keyword)

		{

			$keyword =  $_GET['q'] ;

			$res = $this->db->query("select * from setting where id =1");

			$this->session->set_userdata('shop_status',$res->row()->status);

			$this->session->set_userdata('shop_timing',$res->row()->description);

			

			

			$aData['menu_categories']=$this->db->get('categories');

			$aData['keyword']=$keyword;

			$this->load->view('search',$aData);

		

		}

	

	

		public function userorder()

		{

			$res = $this->db->query("select * from setting where id =1");

			$this->session->set_userdata('shop_status',$res->row()->status);

			$this->session->set_userdata('shop_timing',$res->row()->description);

			 

			

			$aData['menu_categories']=$this->db->get('categories');

			$aData['products']=$this->db->get('product');

			//$_COOKIE['c_user_id']

			//$data = get_by_where_array(array('user_id'=>$_COOKIE['c_user_id']),'order');

			if(get_session('user_login')==true && get_session('user_type')==USER)

			{

				$data =get_by_where_array(array('user_id'=>get_session('user_id')),'order');

			}else{

			redirect('/');

			}

			

			$aData['ordersData']=$data;

			$this->load->view('myorder',$aData);

		

		}

   

          public function resetnotification()
			{
				extract($_POST);
				$this->db->where('id', $key);
				$this->db->delete($this->tbl_notify);
			
			}
			

  

   

   

   

   

   

   

}

