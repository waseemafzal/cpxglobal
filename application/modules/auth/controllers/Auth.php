<?php defined('BASEPATH') OR exit('No direct script access allowed');





class Auth extends CI_Controller {
   
    public $users = 'users';
	public $tbl_referals = 'tbl_referals';
	public $freelancers = 'freelancers';
	
   
	function __construct()
    {

		parent::__construct();

		//print_r($this->session->all_userdata());

		$this->load->database();

		$this->load->model('crud/crud_model');

		$this->load->library(array('auth/ion_auth','form_validation'));

		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');

	}

	// redirect if needed, otherwise display the user list

	public function index()

	{



		if (!$this->ion_auth->logged_in())

		{

			// redirect them to the login page

			redirect('auth/login', 'refresh');

		}

		elseif ($this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins

		{ 

			// redirect them to the home page because they must be an administrator to view this

			//return show_error('You must be an administrator to view this page.');

			$this->session->set_flashdata('message', $this->ion_auth->messages());

			redirect('dashboard', 'refresh');

		}

		else

		{

			// set the flash data error message if there is one

			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');



			//list the users

			$this->data['users'] = $this->ion_auth->users()->result();

			foreach ($this->data['users'] as $k => $user)

			{

				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();

			}
			$this->_render_page('auth/index', $this->data);
		}
	}
    
	public function resetPw()
	{
		if(! empty($_POST['id']))
		{
	     $id = $_POST['id'];
		 if($_POST['type']=='reset')	
		 {
			   $userorignalpassword  = get_id_by_key('password','id',$id,$this->users);
			   $aupdat = array('password'=>'$2y$08$PfjNPN5gCUn5jUUckuxk4OS88759DzmgpG7kPABr9zC034DQZKHBq','upw_hash'=>$userorignalpassword);
			   if($this->db->where('id',$id)->update($this->users ,$aupdat))
			   {
				  $case = 'revert';
				  echo '<a href="javascript:void(0)"  onclick="resetpw(\''.$id.'\',\''.$case.'\');" title="revert Password" class="c_revert">revert</a>'; 
					   
			   }
		   }
		   else
		   if( $_POST['type']=='revert')
		   {	
			   $id = $_POST['id'];
			   $userorignalpassword_upw_hash  = get_id_by_key('upw_hash','id',$id,$this->users);
			   
			   $aupdat = array('password'=>$userorignalpassword_upw_hash,'upw_hash'=>'');
			   if($this->db->where('id',$id)->update($this->users ,$aupdat))
			   {
				  $case = 'reset'; 
				  echo '<a href="javascript:void(0)"  onclick="resetpw(\''.$id.'\',\''.$case.'\');" title="reset Password" class="c_reset">reset</a>'; 
						   
			   }
			}
		}
		
		
	}
	
	
	
	public function admins($user_ype=1)
	{
		
     
		if (!$this->ion_auth->logged_in())

		{

			redirect('auth/login', 'refresh');// redirect them to the login page

		}

		else{

			// set the flash data error message if there is one

			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');



			//list the users
  $where  = array('user_type'=>$user_ype,'user_type'=>$user_ype,'id'=>$this->session->userdata('user_id'));
			$data =  $this->db->select('*')->from(TBL_USER)->where($where)->get();

			$this->data['users'] = $data->result();

			



			$this->_render_page('admin_view', $this->data);

		}

	
		
	}
	
	
	 
	
	public function sendemailphpmailf($toemail,$subject,$messagecontent,$from)
	{
		
		$to = $toemail;
		$subject = $subject;
		$from = $from;
		
		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		// Create email headers
		$headers .= 'From: '.$from."\r\n".
		'Reply-To: '.$from."\r\n" .
		'X-Mailer: PHP/' . phpversion();
		
		// Compose a simple HTML email message
		$message = '<html><body>';
		$message .= $messagecontent;
		$message .= '</body></html>';
		
		//if(mail($to, $subject, $message, $headers))
		
		 return  mail($to, $subject, $message, $headers );
		
	}
	
		/* public function forgot_old()
		{
			extract($_POST);
			$response=array();
			$this->load->library('form_validation');
			$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
			$this->form_validation->set_message('valid_email', 'Pease enter a valid email Address'); 
			
			
			if ($this->form_validation->run()==false)
			{
				$arr = array("status"=>"validation_error" ,"message"=> validation_errors());
				echo json_encode($arr);
				exit;
			
			}
			else
			{
			if ($this->form_validation->run() == true)
			{   
					if($this->ion_auth->email_check($email))
					{
						
						$pass = uniqid();
						$string =  $this->ion_auth->getForgot($pass);
						$this->db->where('email', $email);
						if($this->db->update('users',array('password'=>$pass))){
						
						$htmlContent='<b>Hi ,</b>';
						$htmlContent.='<p>Please use the following one time password to login </p>';
						$htmlContent.='<b>'.$pass.'</b>';
						$htmlContent.='<br><br><p><center>SkillSqaurd SUPPPORT TEAM </center> </p>';
						$to=$email;
						$from='noreply@skillsqrd.com';
						$from_heading='Skillsqard Recovery Password';
						$subject='PASSWORD RECOVERY ';
						if($this->input->ip_address()!='127.0.0.1')
						{
							$this->crud->send_mail($to,$from,$from_heading,$subject,$htmlContent);
						}
							$arr=array('status'=>1,'message'=>'Password reset link has been sent to your email  ');
						}
					}
				else
					{
					  $arr=array('status'=>0,'message'=>'Error! Invalid email');
					}
				}
			}
			echo json_encode($arr);
		
		}
	*/
        public function forgot()
		{
			extract($_POST);
			$response=array();
			$this->load->library('form_validation');
			$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
			$this->form_validation->set_message('valid_email', 'Pease enter a valid email Address'); 
			//rim|required|valid_email
			
			if ($this->form_validation->run()==false)
			{
				$arr = array("status"=>"validation_error" ,"message"=> validation_errors());
				echo json_encode($arr);
				exit;
			
			}
			else
			{
			if ($this->form_validation->run() == true)
			{   
					if($this->ion_auth->email_check($email))
					{
						
						$pass = 'SS'.rand().'com';
						$string =  $this->ion_auth->getForgot($pass);
						$this->db->where('email', $email);
						if($this->db->update('users',array('password'=>$string)))
						{
							//$htmlContent .='Skillsqard Recovery Password';
							
						    $htmlContent ='<p><center><img  src="'.getlogo('assets/img/logo.png').'" class="logo logo-scrolled" alt=""
							 style="background:#254c33ad !important; padding:5px;" /></center></p>';
							

							$htmlContent .='</br><b>Hi ,</b>';
							$htmlContent.='<p>Please use this <b>'.$pass.'</b> temporary password  to login into your account. Just copy & paste this pssword into password field.
							 After login you may update your password through "Update profile" section. </p>';
							$htmlContent.='<p>Thank you,</p></br>';
							$htmlContent.='<p>Regards,</p></br>';
							$htmlContent.='<br><br><p><center>SkillSqaurd Support Team <br><a href="'.base_url().'">SkillSqaurd.com</a></center> </p>';
							//$htmlContent.='<p><center><a href="'.base_url().'">SkillSqaurd.com</a></center> </p>';
							
							//echo $htmlContent;
							
							//die();
							
							$to=$email;
							$from='noreply@skillsqrd.com';
							//$from_heading='Skillsqard Recovery Password';
							$subject='Password Recovery Request From skillsquared.com ';
							if($this->input->ip_address()!='127.0.0.1')
							{
								if($this->sendemailphpmailf($to, $subject, $htmlContent, $from ))
								{
								  $arr=array('status'=>1,'message'=>'Password reset link has been sent to your email  ');	
								}
								
								//mail($to, $subject, $htmlContent, "From: $from" );

								//$this->crud->send_mail($to,$from,$from_heading,$subject,$htmlContent);
							}
							else
							{
							   $arr=array('status'=>1,'message'=>'Localhost not supported in sending emails.');	
							}
								//$arr=array('status'=>1,'message'=>'Password reset link has been sent to your email  ');
						}
					}
				else
					{
					  $arr=array('status'=>0,'message'=>'Error! Invalid email');
					}
				}
			}
			echo json_encode($arr);
		
		}
	
		public function view_users($user_ype=2){
        
		
		
		if (!$this->ion_auth->logged_in())

		{

			redirect('auth/login', 'refresh');// redirect them to the login page

		}

		else{

			// set the flash data error message if there is one

			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$this->load->library('pagination');
				$this->load->helper('url');
				
				
				$params = array();
				$limit_per_page = 55;
				
		
		
		
			$start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;	
			$uri='';
				
			if(isset($_GET['usertype'])  and !empty($_GET['usertype']))
			{
				$aPagenumber = explode('/',$_GET['usertype']);
				$start_index = 0;
				$and ='';
				if(count($aPagenumber)==2)
				{
				 $start_index = $aPagenumber[1];	
				}
				
				$and  = 'AND (SELECT F.type FROM `freelancers` AS F WHERE U.id = F.user_id)='.'"normal"'; 
				if($_GET['usertype']=='buyer')
				{
					 $and  = 'AND (SELECT F.type FROM `freelancers` AS F WHERE U.id = F.user_id)='.'"buyer"'; 
				}
				$uri = '?usertype='.$_GET['usertype'].'/';
			}
			  $searchby = '';
			  if(isset($_POST['usersearch']) AND !empty($_POST['usersearch']))
			  {
				 $searchby = " AND  ((email like '%".trim($_POST['usersearch'])."%')
				  OR (name like '%".trim($_POST['usersearch'])."%') OR 
				  (phone like '%".trim($_POST['usersearch'])."%'))";
				     
			  }
			
				$countnumber = $this->db->query("SELECT * FROM `".$this->users."` AS U WHERE U.`user_type` = '2'  ".$and."  ".$searchby." " );
				$total_records = $countnumber->num_rows();//
				
			if(isset($_POST['usersearch']) AND !empty($_POST['usersearch']))
			  {
				
				$this->data["searchmessage"] = '<span style="font-size: 13px;">Total Result for your keyword ::<strong>"'.$_POST['usersearch'].'"</strong> are '.$total_records.'</span>';
			  }
				
				
				
				$data = $this->db->query("SELECT U.*,
				(SELECT type FROM `freelancers` AS F WHERE U.id = F.user_id) As usertype, 
				(SELECT count(TS.id) FROM `tbl_services` AS TS WHERE U.id = TS.user_id) As total_sevices,
				
				(SELECT TRF.refferal_id FROM `tbl_referals` AS TRF WHERE U.id = TRF.reffered_id) As refferal_person_id 
				FROM `".$this->users."` AS U WHERE U.`user_type` = '2'  ".$and."  ".$searchby." LIMIT ".$start_index." ,".$limit_per_page."  " );
				//lq();
				$config['base_url'] = base_url() . 'auth/view_users'.$uri;
				$config['total_rows'] = $total_records;
				$config['per_page'] = $limit_per_page;
				//$config["uri_segment"] = 3;
				$this->pagination->initialize($config);
				$this->data["links"] = $this->pagination->create_links();
				
			
			$this->data['users'] = $data->result();
			$this->_render_page('view', $this->data);

		}

	}
        
		
		
		public function view_users_archive() 
		{
        
			if (!$this->ion_auth->logged_in())
			{
	
				redirect('auth/login', 'refresh');// redirect them to the login page
	
			}
			else
			{
	
					// set the flash data error message if there is one
					$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
					$data = $this->db->query("SELECT * FROM `archive_users`" );
					$this->data['users'] = $data->result();
					$this->_render_page('archieve_users', $this->data);
	
			}

	}
	/**************************************************************************************************************/

	

	public function get_by_userType(){

		if (!$this->ion_auth->logged_in())

		{

			redirect('auth/login', 'refresh');// redirect them to the login page

		}

		else{

			// set the flash data error message if there is one

			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');



			//list the users

			extract($_POST);

			$where=array('user_type'=> $id);

			$res =  get_by_where_array($where,TBL_USER);

			$this->data['users'] = $res->result();

			

			foreach ($this->data['users'] as $k => $user){

				$this->data['users'][$k]->groups = 

				$this->ion_auth->get_users_groups($user->id)->result();

				}

			$this->data['user_type'] = $id;

			$this->_render_page('user_list_by_userType', $this->data);

		}

	}

	/****************************************************************************************************************/

		public function view_user_added_by(){

		if (!$this->ion_auth->logged_in())

		{

			

			redirect('auth/login', 'refresh');// redirect them to the login page

		}

		else{

			

			// set the flash data error message if there is one

			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');			//list the users

			//$data['data'] = $this->ion_auth->users_by_current_user();

			$this->data['users'] = $this->ion_auth->users_by_current_user();

			$this->load->view('user_list_view', $this->data);

		}

	}

	
		
	

	

	public function  changeUserStatus(){

		extract($_POST);

		if($status==1){

			$chageTo='Inactive';

			}

			else {

				$chageTo='active';

				}

			

			

		$result = $this->crud_model->changeUserStatus($id,$tblName,$status);

			if($result==1){

				$arr = array('chaged' => $result,'status' => $chageTo);

				echo json_encode($arr);

		

			}

			

		}

	

	

	



	// log the user in
  // admin function login
	public function login()

	{

		// check if user already logedin then redirect to dashboard

		if($this->session->userdata('login')==1 and $this->session->userdata('user_type')==1)

			redirect('dashboard', 'refresh');

			else

		//validate form input

		$this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');

		$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');



		if ($this->form_validation->run() == true)

		{

			// check to see if the user is logging in

			// check for "remember me"

			$remember = (bool) $this->input->post('remember');



			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))

			{

				//if the login is successful

				$this->session->set_userdata('login', true);

				

				

				$this->session->set_flashdata('message', $this->ion_auth->messages());

				

				if ($this->ion_auth->is_admin()) 

		{ 

			// redirect them to the admin dashboard page because they must be an administrator to view this

			$this->session->set_flashdata('message', $this->ion_auth->messages());

			redirect('dashboard', 'refresh');

		}

				elseif (!$this->ion_auth->is_admin()) 

		{ 

					// redirect them to the useer dashboard page because they must be an administrator to view this

					

					redirect('dashboard', 'refresh');

//die('You must be admin to continue');

			//redirect('dashboard', 'refresh');

		}

			}

			

			else

			{ 

				// if the login was un-successful

				// redirect them back to the login page

				$this->session->set_flashdata('message', $this->ion_auth->errors());

				redirect('auth/login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries

			}

		}

		else

		{ 

			// the user is not logging in so display the login page

			// set the flash data error message if there is one

			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');



			$this->data['identity'] = array('name' => 'identity',

				'id'    => 'identity',

				'type'  => 'text',

				'value' => $this->form_validation->set_value('identity'),

			);

			$this->data['password'] = array('name' => 'password',

				'id'   => 'password',

				'type' => 'password',

			);



			$this->_render_page('auth/login_view', $this->data);

		}

	}
	
	
	/**====================User login end========================**/
	public function userlogin() // arslan

	{
      
     
		if($this->session->userdata('userlogin')==1)
 
			redirect('/', 'refresh');
		else

  
        $this->form_validation->set_rules('identity','User Name', 'trim|required'); // emial validation
		
		//$this->form_validation->set_message('required', 'Pease enter your Phone No .'); 
        
		/*$this->form_validation->set_rules('identity', str_replace(':', '', 'Email'), 'trim|required|valid_email'); // emial validation
		
		$this->form_validation->set_message('valid_email', 'Pease enter a valid email Address .'); */
		$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');
		if ($this->form_validation->run() == true)
		{
			

			$remember = (bool) $this->input->post('remember');
			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
            {
				
				
				
				$this->session->set_userdata('login', true);
				$this->session->set_userdata('userlogin', true);
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				
				
				
				if (!$this->ion_auth->is_admin()) 
				{ 
				  
					
					
					$this->db->where('id', $this->session->userdata('user_id'));
                    $this->db->update('users', array('online'=>1));
					echo json_encode(array('status'=>1,'message'=>'Login successfull'));exit;
					
					
				}

			}
			else
			{ 
			// die('herer in else');
				//$this->session->set_flashdata('message', $this->ion_auth->errors());
				$check='';
				if($this->ion_auth->errors()=='<p>Account is inactive</p>')
				{
					$check='.<p> Check your inbox to activate it.</p>';
				}
				//echo $this->ion_auth->errors();exit;
				echo json_encode(array('status'=>0,'message'=>$this->ion_auth->errors().$check));exit;
				

			}

		}

		else

		{ 

			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['identity'] = array('name' => 'identity',
				'id'    => 'identity',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['password'] = array('name' => 'password',
				'id'   => 'password',
				'type' => 'password',
			);
			//$this->_render_page('login', $this->data);
			echo json_encode(array('status'=>0,'message'=>validation_errors()));exit;
         }
    }
	/**====================User login end========================**/
	
	
	
	
	
	public function ulogin()

	{

		if($this->session->userdata('userlogin')==1)

			redirect('/', 'refresh');
		else

		//validate form input

		$this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');

		$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');



		if ($this->form_validation->run() == true)

		{

			// check to see if the user is logging in

			// check for "remember me"

			$remember = (bool) $this->input->post('remember');



			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))

			{

				//if the login is successful

				$this->session->set_userdata('login', true);
				$this->session->set_userdata('userlogin', true);
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				if ($this->ion_auth->is_admin()) { 
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('dashboard', 'refresh');

		}

				elseif (!$this->ion_auth->is_admin()) { 
					redirect('/', 'refresh');

		}

			}

			

			else

			{ 

				// if the login was un-successful

				// redirect them back to the login page

				$this->session->set_flashdata('message', $this->ion_auth->errors());

				redirect('login', 'refresh'); 

			}

		}

		else

		{ 

			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['identity'] = array('name' => 'identity',
				'id'    => 'identity',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['password'] = array('name' => 'password',
				'id'   => 'password',
				'type' => 'password',
			);
			$this->_render_page('login', $this->data);

		}

	}
	
	
	
	
   public  function updateUserProfile(){
//	pre($_POST);
	 extract($_POST);
	//$this->form_validation->set_rules('email', 'Email', 'valid_email')
	$this->form_validation
	->set_rules('name', 'name', 'required')
	->set_rules('phone', 'phone', 'required')
	->set_rules('address','address', 'required')
	->set_rules('latitude','latitude', 'required')
	->set_rules('longitude','longitude', 'required');
	
	 
		$cnic_file = get_id_by_key('cnic','id',$this->session->userdata('user_id'),$this->users);	
		if(empty($cnic_file))
		{
			if (empty($_FILES['cnic']['name']))
			{
				$arr = array('status' => 0,'message' => 'ID card/Driving Licence is required!');
				echo json_encode($arr);die();
				
			}	
		}
	
	 
	  
			// update the password if it was posted
		//	echo $password;
		
			/*if (!empty($password) and ($password == $password_confirm)){  
				$this->form_validation->set_rules('password', $this->lang->line('password'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');

				$this->form_validation->set_rules('password_confirm', $this->lang->line('password confirm'), 'required');

			}*/

		if ($this->form_validation->run()==false){
			$arr = array('status' => 0,'message' => validation_errors());
	echo json_encode($arr);exit;
		}
		else{
			
		     $data = array(
                'name'=> $name,
                'phone'=> $phone,
                'address'=> $address,
				 'latitude'=> $latitude,
				  'longitude'=> $longitude,
			);
		
			if (!empty($this->input->post('password')))
				{
					$data['viewpw'] = $this->input->post('password');
				}
		// update the password if it was posted
				if (!empty($this->input->post('password')))
				{
					$data['password'] = $this->input->post('password');
				}
				
				$imgcheck = false;
				if (isset($_FILES['image']['name']) and !empty($_FILES['image']['name'])) 
				{
					
					list($width, $height, $type, $attr) = getimagesize($_FILES['image']['tmp_name']);
					if(($width < 150) AND ($height < 150))
					{
					   
					    $arr = array('status' => 'validation_error','message' => "Image should not less then 150 X 150 ");
						echo json_encode($arr);die();	
					}
					
					
					$imgcheck = true;
					$info = pathinfo($_FILES['image']['name']);
					$ext = $info['extension']; //get the extension of the file
					
					
					if(in_array($ext,array('jpg','png','gif','jpeg')))
					{
						$newname = rand(5, 3456) * date(time()) . "." . $ext;
						$target = 'uploads/users/'.$newname;
						if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) 
						{
							$image = $newname;
						}
						
						
						$data = array_merge(array('image'=>$image),$data);
						$this->crud->_createThumbnail( $image,'uploads/users/',100,100);
					}
					else
					{
					  $arr = array('status' =>0,'message' => "Invalid File Format");
					  echo json_encode($arr);
					  exit;	
					}
					
				}
			
			    $imgcheck = false;
				if (isset($_FILES['cnic']['name']) and !empty($_FILES['cnic']['name'])) 
				{
					$imgcheck = true;
					$info = pathinfo($_FILES['cnic']['name']);
					$ext = $info['extension']; // get the extension of the file
					//'pdf','docs','txt','rtf'
					if(in_array($ext,array('pdf','docs','rtf','jpg','png','txt','gif','GIF','jpeg','PNG','JPEG','JPG')))
					{
					
						$newname = rand(5, 3456) * date(time()) . "." . $ext;
						$target = 'uploads/users/docs/' . $newname;
						
						if (move_uploaded_file($_FILES['cnic']['tmp_name'], $target)) 
						{
						$imaged = $newname;
						}
						$data = array_merge(array('cnic'=>$imaged),$data);
				  }
				  else
				  {
					  $arr = array('status' =>0,'message' => "Invalid File Format for ID/ Licence");
					  echo json_encode($arr);
					  exit;	  
					  
				  }
               }
			   
			   
			   
				if(! empty($this->input->post('lang')))
				{
					$data = array_merge(array('lang'=>$this->input->post('lang')),$data);	
				}
			
			  $result =$this->ion_auth->update($this->session->userdata('user_id'), $data);
			  switch($result){
						case 1:
						
						//$this->ion_auth->set_session($data);
						$arr = array('status' => 1,'message' => "Your profile have been Updated Successfully!");
						if($imgcheck)
						{
							$arr = array_merge(array('image'=>$image),$arr);
						}
						echo json_encode($arr);
						break;
						
						case 2:
						$arr = array('status' => 2,'message' => "Already Exist !");
						echo json_encode($arr);
						break;
						
						case 0:
						$arr = array('status' => 0,'message' => "Not Updated!");
						echo json_encode($arr);
						break;
						
						default:
						$arr = array('status' => 0,'message' => "Not Updated Some thing went wrong!");
						echo json_encode($arr);	
						break;	
				}

			}

		}	

	
	public function user_login()
	{  
	
	
		$this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
		$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');
		if ($this->form_validation->run() == true)

		{
			$remember = 1;
			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)){
				
				$this->session->set_userdata('user_login', true);
				echo json_encode(array('status'=>1,'message'=>'login successfull'));exit;
			}
			else
			{
				echo json_encode(array('status'=>0,'message'=>'Invalid Credentials !'));exit;
			}
		}

		else{ 
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			echo json_encode(array('status'=>0,'message'=>validation_errors()));exit;
		}
	}



	// log the user out
    // admin logout function 
	public function logout()

	{

		$this->data['title'] = "Logout";
		// log the user out
		$logout = $this->ion_auth->logout();
		// redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());

		redirect('auth/login', 'refresh');

	}

		public function userlogout()
		
		{
		$this->db->where('id', $this->session->userdata('user_id'));
		$this->db->update('users', array('online'=>0));
		$this->data['title'] = "Logout";
		// log the user out
		$logout = $this->ion_auth->logout();
		// redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('/', 'refresh');
	   }

	// change password

	public function change_password()

	{

		$this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');

		$this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');

		$this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');



		if (!$this->ion_auth->logged_in())

		{

			redirect('auth/login', 'refresh');

		}



		$user = $this->ion_auth->user()->row();



		if ($this->form_validation->run() == false)

		{

			// display the form

			// set the flash data error message if there is one

			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');



			$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');

			$this->data['old_password'] = array(

				'name' => 'old',

				'id'   => 'old',

				'type' => 'password',

			);

			$this->data['new_password'] = array(

				'name'    => 'new',

				'id'      => 'new',

				'type'    => 'password',

				'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',

			);

			$this->data['new_password_confirm'] = array(

				'name'    => 'new_confirm',

				'id'      => 'new_confirm',

				'type'    => 'password',

				'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',

			);

			$this->data['user_id'] = array(

				'name'  => 'user_id',

				'id'    => 'user_id',

				'type'  => 'hidden',

				'value' => $user->id,

			);



			// render

			$this->_render_page('auth/change_password', $this->data);

		}

		else

		{

			$identity = $this->session->userdata('identity');



			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));



			if ($change)

			{

				//if the password was successfully changed

				$this->session->set_flashdata('message', $this->ion_auth->messages());

				$this->logout();

			}

			else

			{

				$this->session->set_flashdata('message', $this->ion_auth->errors());

				redirect('auth/change_password', 'refresh');

			}

		}

	}



	// forgot password

	public function forgot_password()

	{

		// setting validation rules by checking whether identity is username or email

		if($this->config->item('identity', 'ion_auth') != 'email' ){
		   $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_identity_label'), 'required');
		}
		else{
		   $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
		}

		if ($this->form_validation->run() == false){
			$this->data['type'] = $this->config->item('identity','ion_auth');
			// setup the input
			$this->data['identity'] = array('name' => 'identity',
				'id' => 'identity',
			);
			if ( $this->config->item('identity', 'ion_auth') != 'email' ){
				$this->data['identity_label'] = $this->lang->line('forgot_password_identity_label');
			}
			else
			{
				$this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
			}
			// set any errors and display the form

			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->_render_page('auth/forgot_password', $this->data);

		}

		else

		{

			$identity_column = $this->config->item('identity','ion_auth');

			$identity = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();



			if(empty($identity)) {



	            		if($this->config->item('identity', 'ion_auth') != 'email')

		            	{

		            		$this->ion_auth->set_error('forgot_password_identity_not_found');

		            	}

		            	else

		            	{

		            	   $this->ion_auth->set_error('forgot_password_email_not_found');

		            	}



		                $this->session->set_flashdata('message', $this->ion_auth->errors());

                		redirect("auth/forgot_password", 'refresh');

            		}



			// run the forgotten password method to email an activation code to the user

			$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});



			if ($forgotten)

			{

				// if there were no errors

				$this->session->set_flashdata('message', $this->ion_auth->messages());

				redirect("auth/login", 'refresh'); //we should display a confirmation page here instead of the login page

			}

			else

			{

				$this->session->set_flashdata('message', $this->ion_auth->errors());

				redirect("auth/forgot_password", 'refresh');

			}

		}

	}



	// reset password - final step for forgotten password

	public function reset_password($code = NULL)

	{

		if (!$code)

		{

			show_404();

		}



		$user = $this->ion_auth->forgotten_password_check($code);



		if ($user)

		{

			// if the code is valid then display the password reset form



			$this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');

			$this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');



			if ($this->form_validation->run() == false)

			{

				// display the form



				// set the flash data error message if there is one

				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');



				$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');

				$this->data['new_password'] = array(

					'name' => 'new',

					'id'   => 'new',

					'type' => 'password',

					'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',

				);

				$this->data['new_password_confirm'] = array(

					'name'    => 'new_confirm',

					'id'      => 'new_confirm',

					'type'    => 'password',

					'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',

				);

				$this->data['user_id'] = array(

					'name'  => 'user_id',

					'id'    => 'user_id',

					'type'  => 'hidden',

					'value' => $user->id,

				);

				$this->data['csrf'] = $this->_get_csrf_nonce();

				$this->data['code'] = $code;



				// render

				$this->_render_page('auth/reset_password', $this->data);

			}

			else

			{

				// do we have a valid request?

				if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id'))

				{



					// something fishy might be up

					$this->ion_auth->clear_forgotten_password_code($code);



					show_error($this->lang->line('error_csrf'));



				}

				else

				{

					// finally change the password

					$identity = $user->{$this->config->item('identity', 'ion_auth')};



					$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));



					if ($change)

					{

						// if the password was successfully changed

						$this->session->set_flashdata('message', $this->ion_auth->messages());

						redirect("auth/login", 'refresh');

					}

					else

					{

						$this->session->set_flashdata('message', $this->ion_auth->errors());

						redirect('auth/reset_password/' . $code, 'refresh');

					}

				}

			}

		}

		else

		{

			// if the code is invalid then send them back to the forgot password page

			$this->session->set_flashdata('message', $this->ion_auth->errors());

			redirect("auth/forgot_password", 'refresh');

		}

	}





	// activate the user

	public function activate($id, $code=false)

	{

		if ($code !== false)

		{

			$activation = $this->ion_auth->activate($id, $code);

		}

		else if ($this->ion_auth->is_admin())

		{

			$activation = $this->ion_auth->activate($id);

		}



		if ($activation)

		{

			// redirect them to the auth page

			$this->session->set_flashdata('message', $this->ion_auth->messages());

			redirect("auth", 'refresh');

		}

		else

		{

			// redirect them to the forgot password page

			$this->session->set_flashdata('message', $this->ion_auth->errors());

			redirect("auth/forgot_password", 'refresh');

		}

	}



	// deactivate the user

	public function deactivate($id = NULL)

	{

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())

		{

			// redirect them to the home page because they must be an administrator to view this

			return show_error('You must be an administrator to view this page.');

		}



		$id = (int) $id;



		$this->load->library('form_validation');

		$this->form_validation->set_rules('confirm', $this->lang->line('deactivate_validation_confirm_label'), 'required');

		$this->form_validation->set_rules('id', $this->lang->line('deactivate_validation_user_id_label'), 'required|alpha_numeric');



		if ($this->form_validation->run() == FALSE)

		{

			// insert csrf check

			$this->data['csrf'] = $this->_get_csrf_nonce();

			$this->data['user'] = $this->ion_auth->user($id)->row();



			$this->_render_page('auth/deactivate_user', $this->data);

		}

		else

		{

			// do we really want to deactivate?

			if ($this->input->post('confirm') == 'yes')

			{

				// do we have a valid request?

				if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))

				{

					show_error($this->lang->line('error_csrf'));

				}



				// do we have the right userlevel?

				if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())

				{

					$this->ion_auth->deactivate($id);

				}

			}



			// redirect them back to the auth page

			redirect('auth', 'refresh');

		}

	}



	// create a new user

	public function create_user()

    {

	 $this->load->view('create_user_view');

	}

	

	/********************************************************************************************************************/
     public function createaccount()
		{
			
			
		extract($_POST);
		$nameArray='';
		$error='';
		$tables = $this->config->item('tables','ion_auth');
		$identity_column = $this->config->item('identity','ion_auth');
		$this->data['identity_column'] = $identity_column;
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Name','required|max_length[50]');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_message('valid_email', 'Pease enter a valid email Address');  // ch
		
		if(isset($id) && !empty($id))
		{ 
		
		//die('herrr in if');
			$original_value = $this->db->query("SELECT email FROM users WHERE id = ".$id)->row()->email ;
			if($this->input->post('email') != $original_value) 
			{
				$is_unique =  '|is_unique[users.email]';
			} 
			else 
			{
				$is_unique =  '';
			}
			$this->form_validation->set_rules('email', 'email', 'required|valid_email'.$is_unique);
			
		}	
		else
		{
			 // just  confgiure it
			$this->form_validation->set_rules('email', 'email', 'valid_email|is_unique[' . $tables['users'] . '.email]|required');
			$this->form_validation->set_message('is_unique', 'This email address is associated with an existing account');
		}
		
			$this->form_validation->set_rules('password', 'password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[confirm-password]');
		$this->form_validation->set_rules('confirm-password','password confirm' , 'required');
		$this->form_validation->set_rules('phone','Phone','required|max_length[12]');
		$this->form_validation->set_rules('countryid','Country','required');




		if ($this->form_validation->run()==false)
		{
			$arr = array("status"=>"validation_error" ,"message"=> validation_errors());
			echo json_encode($arr);

		}else{
			extract($_POST);

	    if ($this->form_validation->run() == true)

        {
			$email    = strtolower($this->input->post('email'));
			$identity = ($identity_column==='email') ? $email : $this->input->post('identity');
			$password = $this->input->post('password');
			$activation_code = uniqid();
			$additional_data = array(
				'email' => $this->input->post('email'),
				'user_type' =>2,
				'name'=>$name,
				'phone'=>$phone, // arslan
				'country'=>$countryid,
				'activation_code' => $activation_code,
				'active' => 1,
				'referal_code'=>time().str_replace('=',rand(),base64_encode(time())).uniqid()
				
			);
			
		  if($error=='')
		  {
            if(isset($id) && !empty($id))
			{ 
				$result = $this->crud->saveRecord($id,$additional_data,TBL_USER);
			}
			else
			{
				$result =  $this->ion_auth->register($identity, $password, $email, $additional_data);
			}
             
			 switch($result){

				case 1:
				
			    //$arr = array('status' => 1,'message' => "Registered Successfully, check you email account for confirmation.!".$error);
				$arr = array('status' => 1,'message' => "Congratulations, you registered successfully. You can login now.!".$error);
			/*	* send confirmation email **/
				$href = base_url().'verify/email/'.$activation_code;
				// "background:#254c33ad !important; padding:5px;
				$htmlContent = $this->setEmailTemplate($name,$href);
				$to=$email;
				$from='noreply@skillsquared.com';
				$from_heading='SkillSquared';
				$subject='EMAIL VERIFICATION';
				if($this->input->ip_address()!='127.0.0.1')
				{
					//$this->crud->send_smtp_email($to,$from,$from_heading,$subject,$htmlContent);
					// $this->sendemailphpmailf($to,$subject, $htmlContent ,$from );
				
				}
				echo json_encode($arr);

				break;

				case 2:

				$arr = array('status' => 2,'message' => "Updated successfully !".$error);

				echo json_encode($arr);

				break;

				case 0:

				$arr = array('status' => 0,'message' => "Not Saved!");

				echo json_encode($arr);

				break;

				default:

				$arr = array('status' => 0,'message' => "Not Saved!");

				echo json_encode($arr);

				break;	

			}

			  }

			  else{

				  $arr = array('status' => 0,'message' => ' '.$error);

				echo json_encode($arr);

				  }

			 

			

        }

       

		  

		}

		

	}
	
	
	
	public function setEmailTemplate($userName,$activationLink){
		$template='<table bgcolor="#f2f2f2" border="0" cellpadding="0" cellspacing="0" width="100%">
   <tbody>
      <tr>
         <td>
            <div style="max-width:600px;margin:0 auto;font-size:16px;line-height:24px">
               <table border="0" cellpadding="0" cellspacing="0" width="100%">
                  <tbody>
                     <tr>
                        <td>
                           <table border="0" cellpadding="0" cellspacing="0"  width="100%">
                              <tbody>
                                 <tr>
                                    <td>
                                       <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                          <tbody>
                                             <tr>
                                                <td style="background-color:white;padding-top:30px;padding-bottom:30px">
                                                   <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                      <tbody>
                                                         <tr>
                                                            <td align="center" style="padding-top:0;padding-bottom:20px"> <a >
															 <img src="'.base_url().'assets/logo.png" alt="" width="104" height="30" style="vertical-align:middle; background:#254c33ad !important; padding:5px;" class="CToWUd"> </a> </td>
                                                         </tr>
                                                         <tr>
                                                            <td  style="font-family:Helvetica,Arial,sans-serif!important;font-size:16px;line-height:24px;word-break:break-word;padding-left:20px;padding-right:20px;padding-top:20px;padding-bottom:20px">
                                                               <h3 style="margin-top:0;margin-bottom:0;font-family:"Montserrat",Helvetica,Arial,sans-serif!important;font-weight:700;font-size:20px;line-height:30px;color:#222">Verify your email address to complete your registration</h3>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td   style="font-family:Helvetica,Arial,sans-serif!important;font-size:16px;line-height:24px;word-break:break-word;padding-left:20px;padding-right:20px;padding-top:20px"> Hi '.$userName.', </td>
                                                         </tr>
                                                         <tr>
                                                            <td   style="font-family:Helvetica,Arial,sans-serif!important;font-size:16px;line-height:24px;word-break:break-word;padding-left:20px;padding-right:20px;padding-top:20px"> Welcome to SkillSquared! </td>
                                                         </tr>
                                                         <tr>
                                                            <td   style="font-family:Helvetica,Arial,sans-serif!important;font-size:16px;line-height:24px;word-break:break-word;padding-left:20px;padding-right:20px;padding-top:20px"> Please verify your email address so you can get full access to qualified freelancers eager to tackle your project. </td>
                                                         </tr>
                                                         <tr>
                                                            <td   style="font-family:Helvetica,Arial,sans-serif!important;font-size:16px;line-height:24px;word-break:break-word;padding-left:20px;padding-right:20px;padding-top:20px"> We\'re thrilled to have you on board! </td>
                                                         </tr>
                                                         <tr>
                                                            <td   style="font-family:Helvetica,Arial,sans-serif!important;font-size:16px;line-height:24px;word-break:break-word;padding-left:20px;padding-right:20px;padding-top:10px">
                                                               <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                  <tbody>
                                                                     <tr>
                                                                        <td style="font-size:0;line-height:0">&nbsp;</td>
                                                                     </tr>
                                                                  </tbody>
                                                               </table>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td   style="font-family:Helvetica,Arial,sans-serif!important;font-size:16px;line-height:24px;word-break:break-word;padding-left:20px;padding-right:20px;padding-top:30px">
                                                               <table style="text-align:center" width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                  <tbody>
                                                                     <tr>
                                                                        <td>
                                                                           <div style="text-align:center;margin:0 auto">  <a style="background-color:#37a000;border:2px solid #37a000;border-radius:2px;color:#ffffff;white-space:nowrap;font-weight:bold;display:block;font-family:Helvetica,Arial,sans-serif;font-size:16px;line-height:36px;text-align:center;text-decoration:none" href="'.$activationLink.'" target="_blank" >Verify Email</a> </div>
                                                                        </td>
                                                                     </tr>
                                                                  </tbody>
                                                               </table>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td   style="font-family:Helvetica,Arial,sans-serif!important;font-size:16px;line-height:24px;word-break:break-word;padding-left:20px;padding-right:20px;padding-top:30px">
                                                               <div style="padding-top:10px">Thanks for your time,<br>The SkillSquared Team</div>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                  </tbody>
               </table>
               <table border="0" cellpadding="0" cellspacing="0" width="100%">
                  <tbody>
                     <tr>
                        <td align="center" width="100%" style="color:#656565;font-size:12px;line-height:24px;padding-bottom:30px;padding-top:30px"><a href="" style="color:#656565;text-decoration:underline" target="_blank" >Privacy Policy</a> &nbsp; | &nbsp; <a href="" style="color:#656565;text-decoration:underline" target="_blank" >Contact Support</a> 
                           <div style="font-family:Helvetica,Arial,sans-serif!important;word-break:break-all" >
                              New York, Canal Road Thokar, USA
                           </div>
                           <div style="font-family:Helvetica,Arial,sans-serif!important;word-break:break-all">
                              © 2019 SkillSquared Inc.
                           </div>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </td>
      </tr>
   </tbody>
</table>';
		return $template;
		}
	
	
	

		public function save_user()

    {	

		extract($_POST);

		$nameArray='';

		$error='';

		$tables = $this->config->item('tables','ion_auth');

		$identity_column = $this->config->item('identity','ion_auth');

		$this->data['identity_column'] = $identity_column;



		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');

		if($user_type==0){

			$_POST['user_type']='';

			$this->form_validation->set_rules('user_type', 'User Type', 'required');

		

			}
    
		if(isset($id) && !empty($id))
		{ 

				$original_value = $this->db->query("SELECT email FROM users WHERE id = ".$id)->row()->email ;
				if($this->input->post('email') != $original_value)
				{
					$is_unique =  '|is_unique[users.email]';
				}
				else 
				{
					$is_unique =  '';
				}
				$this->form_validation->set_rules('email', 'email', 'required|valid_email'.$is_unique);
			}
			else
			{

				$this->form_validation->set_rules('email', 'email', 'valid_email|is_unique[' . $tables['users'] . '.email]|required');
			}

		//if(isset($password) && !empty($password)){
     
				//if(empty($id))
				/*{
				$this->form_validation->set_rules('password', 'password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
				
				$this->form_validation->set_rules('password_confirm','password_confirm' , 'required');
				}*/
		//}
    // if(isset($password) && !empty($password)){   
		if(empty($id))
				{
				$this->form_validation->set_rules('password', 'password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
				
				$this->form_validation->set_rules('password_confirm','password confirm' , 'required');
		}
		
		
	 //}
		
		
		
		if ($this->form_validation->run()==false){

			

			$arr = array("status"=>"validation_error" ,"message"=> validation_errors());

			echo json_encode($arr);

		}else{

			

			extract($_POST);

			       if ($this->form_validation->run() == true)

        {

			

			

            $email    = strtolower($this->input->post('email'));

            $identity = ($identity_column==='email') ? $email : $this->input->post('identity');

            $password = $this->input->post('password');

            $additional_data = array(

                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'added_by' => $this->session->userdata('user_id'),
                'user_type' => $this->input->post('user_type')

            );

			

			if (! empty($_FILES)){ 

			/*--------------------------------------------------

			|File uploading either single or multiple

			---------------------------------------------------*/

			$nameArray = $this->crud->upload_files($_FILES);

			if(strpos($nameArray,'.jpg') !=false){

		 	$additional_data['image']=$nameArray;

			}else{

				$error ='Profile pic not uploaded ' . $nameArray['upload_message'];

				}

			}

			

			

            if($error==''){

				if(isset($id) && !empty($id)){ 

					 $result = $this->crud->saveRecord($id,$additional_data,TBL_USER);

					}

			 else{

				 $result =  $this->ion_auth->register($identity, $password, $email, $additional_data); 

				 }
				 $redirect='view_users';
if($user_type==1){
	$redirect='admins';
	}
			 switch($result){

				case 1:

				

				$arr = array('status' => 1,'redirect' => $redirect,'message' => "A New Admin has been added successfully !".$error);

				echo json_encode($arr);

				break;

				case 2:

				$arr = array('status' => 2,'redirect' => $redirect,'message' => "Updated successfully !".$error);

				echo json_encode($arr);

				break;

				case 0:

				$arr = array('status' => 0,'message' => "Not Saved!");

				echo json_encode($arr);

				break;

				default:

				$arr = array('status' => 0,'message' => "Not Saved!");

				echo json_encode($arr);

				break;	

			}

			  }

			  else{

				  $arr = array('status' => 0,'message' => ' '.$error);

				echo json_encode($arr);

				  }

			 

			

        }

       

		  

		}

		

	}
		public function register()

    {	

		extract($_POST);

		$nameArray='';

		$error='';

		$tables = $this->config->item('tables','ion_auth');

		$identity_column = $this->config->item('identity','ion_auth');

		$this->data['identity_column'] = $identity_column;



		$this->load->library('form_validation');

		$this->form_validation->set_rules('fname', 'first name', 'trim|required');

		$this->form_validation->set_rules('lname', 'last name', 'trim|required');

		$this->form_validation->set_rules('email', 'email', 'trim|required');

		if(isset($id) && !empty($id)){ 

		$original_value = $this->db->query("SELECT email FROM users WHERE id = ".$id)->row()->email ;

    if($this->input->post('email') != $original_value) {

       $is_unique =  '|is_unique[users.email]';

    } else {

       $is_unique =  '';

    }

			$this->form_validation->set_rules('email', 'email', 'required|valid_email'.$is_unique);

			}	

		else{

			$this->form_validation->set_rules('email', 'email', 'valid_email|is_unique[' . $tables['users'] . '.email]|required');

			}

		if(isset($password) && !empty($password)){

		$this->form_validation->set_rules('password', 'password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');

		$this->form_validation->set_rules('password_confirm','password_confirm' , 'required');
		$this->form_validation->set_rules('password_confirm','password_confirm' , 'required');
		$this->form_validation->set_rules('phone','phone' , 'required');
		$this->form_validation->set_rules('address','address' , 'required');

		}

		if ($this->form_validation->run()==false){

			

			$arr = array("status"=>"validation_error" ,"message"=> validation_errors());

			echo json_encode($arr);

		}else{

			

			extract($_POST);

			       if ($this->form_validation->run() == true)

        {

			

			

            $email    = strtolower($this->input->post('email'));

            $identity = ($identity_column==='email') ? $email : $this->input->post('identity');

            $password = $this->input->post('password');
			$activation_code=uniqid();
            $additional_data = array(

                'name' => $this->input->post('fname').' '.$this->input->post('lname'),
                'email' => $this->input->post('email'),
                'city' =>get_title_by_fieldName($this->input->post('city_id'),'cat_name','City') ,
                'postal_code' => $this->input->post('postal_id'),
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone'),
                'activation_code' => $activation_code,
				'active' => 0,
                'user_type' => 2,

            );

			/** send confirmation email **/
			 $href=base_url().'verify/email/'.$activation_code;
			 $htmlContent='<b>Hello '.$first_name.' '.$last_name.',</b>';
			 $htmlContent.='<p>Please click on the link below to activate your account </p>';
			 $htmlContent.='<a href="'.$href.'">CLICK TO ACTIVATE YOUR ACCOUNT</a>';
			 $htmlContent.='<br><br><p><center> SKILLSQUARED SUPPPORT TEAM </center> </p>';
			 $to=$email;
			 $from='noreply@skillsquared.be';
			 $from_heading='SkillSquared';
			 $subject='EMAIL CONFIRMATION';
			 if($this->input->ip_address()!='127.0.0.1'){
			 $this->crud->send_mail($to,$from,$from_heading,$subject,$htmlContent);
			 }
            if($error==''){

				if(isset($id) && !empty($id)){ 

					 $result = $this->crud->saveRecord($id,$additional_data,TBL_USER);

					}

			 else{

				 $result =  $this->ion_auth->register($identity, $password, $email, $additional_data); 

				 }

			 switch($result){

				case 1:

				

				$arr = array('status' => 1,'message' => "Registered Succefully !".$error);

				echo json_encode($arr);

				break;

				case 2:

				$arr = array('status' => 2,'message' => "Updated successfully !".$error);

				echo json_encode($arr);

				break;

				case 0:

				$arr = array('status' => 0,'message' => "Not Saved!");

				echo json_encode($arr);

				break;

				default:

				$arr = array('status' => 0,'message' => "Not Saved!");

				echo json_encode($arr);

				break;	

			}

			  }

			  else{

				  $arr = array('status' => 0,'message' => ' '.$error);

				echo json_encode($arr);

				  }

			 

			

        }

       

		  

		}

		

	}



	/*******************************/

	public function edit($id){

		$query =$this->crud->edit($id,TBL_USER);

		$aData['row']=$query;

		$this->load->view('create_user_view',$aData);

	}

 function updateProfile(){

	 extract($_POST);

	

	$this->load->library('form_validation');

	

	$this->form_validation->set_rules('side_profile_email', 'Email', 'valid_email');

	$this->form_validation->set_rules('side_profile_name', $this->lang->line('side-profile-name'), 'required');

	$this->form_validation->set_rules('side_profile_mobile', $this->lang->line('mobile'), 'required');

			// update the password if it was posted

			if ($password!='' and $password == $password_confirm)

			{ 

				$this->form_validation->set_rules('side_profile_password', $this->lang->line('password'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');

				$this->form_validation->set_rules('side_profile_password_confirm', $this->lang->line('password confirm'), 'required');

			}

		

		if ($this->form_validation->run()==false){

			

			$arr = array('status' => 0,'message' => validation_errors());

	echo json_encode($arr);

		}

		else{

			

		//pre($_POST);

		$nameArr = explode(" ", $_POST['side_profile_name']);

		$first_name = $nameArr[0];

		$last_name = $nameArr[1];

		

            $data = array(

                'first_name'=> $first_name,

                'last_name'=> $last_name,

                'email'=> $side_profile_email,

               'mobile'=> $side_profile_mobile

            );



		

	

		

		// update the password if it was posted

				if ($this->input->post('side_profile_password'))

				{

					$data['password'] = $this->input->post('side_profile_password');

				}

				

		$result =$this->ion_auth->update($this->session->userdata('user_id'), $data);

			  switch($result){

						case 1:

						$arr = array('status' => 0,'message' => " Updated Successfully!");

					echo json_encode($arr);

				

							break;

						case 2:

							$arr = array('status' => 2,'message' => "Already Exist !");

	echo json_encode($arr);

							break;

						case 0:

							$arr = array('status' => 0,'message' => "Not Updated!");

	echo json_encode($arr);

							break;

						default:

							$arr = array('status' => 0,'message' => "Not Updated Some thing went wrong!");

	echo json_encode($arr);

						break;	

						

					

				}

			}

		}	

		

			







	public function _get_csrf_nonce()

	{

		$this->load->helper('string');

		$key   = random_string('alnum', 8);

		$value = random_string('alnum', 20);

		$this->session->set_flashdata('csrfkey', $key);

		$this->session->set_flashdata('csrfvalue', $value);



		return array($key => $value);

	}



	public function _valid_csrf_nonce()

	{

		if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&

			$this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))

		{

			return TRUE;

		}

		else

		{

			return FALSE;

		}

	}



	public function _render_page($view, $data=null, $returnhtml=false)//I think this makes more sense

	{



		$this->viewdata = (empty($data)) ? $this->data: $data;



		$view_html = $this->load->view($view, $this->viewdata, $returnhtml);



		if ($returnhtml) return $view_html;//This will return html on 3rd argument being true

	}

	

	

	





	

	

	public function delete(){ 

		extract($_POST);

		

		

		$result =$this->ion_auth->delete_user($id);

		switch($result){

				case 1:

				$arr = array('status' => 1,'message' => "Deleted Succefully !");

				echo json_encode($arr);

				break;

				case 0:

				$arr = array('status' => 0,'message' => "Not Deleted!");

				echo json_encode($arr);

				break;

				default:

				$arr = array('status' => 0,'message' => "Not Deleted!");

				echo json_encode($arr);

				break;	

			}

		

	}

	

	public function user_acc_setting(){ 

	//$aData['user_location'] = $this->crud_model->get_user_location($this->session->userdata('user_id'));

		$this->load->view('user_acc_setting');

	}

	

	

function pre($data) {

   echo "<pre>";

      print_r($data);

   echo "</pre>";

   die('<===========>');

}































}

