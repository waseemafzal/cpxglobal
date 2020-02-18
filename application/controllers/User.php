<?php



defined('BASEPATH') OR exit('No direct script access allowed');



 class User extends CI_Controller 



 {







	public $freelancers= 'freelancers';



	public $tbl_countries = 'tbl_countries'; 



	public $tbl_states = 'tbl_states';



	public $tbl_cities = 'tbl_cities';



	public $location = 'location';



	public $tbl_freelancer_education = 'tbl_freelancer_education';



	public $tbl_freelancer_certificate = 'tbl_freelancer_certificate';



	public $skills = 'skills';



	public $tbl_freelancer_skill = 'tbl_freelancer_skill';

	public $tbl_childmenu = 'tbl_childmenu';

	public $users = 'users';

	

	

	



	



	



	



	function __construct()



	{



		parent::__construct();



		/*if(!$this->session->userdata('login')==true){

			redirect('/', 'refresh');

		}

*/

	}



	



	



		function stripepage(){
$this->load->view('stripe');
}
		function login(){
$this->load->view('login');
}



		



		function testmail()



		{

echo '<br><hr><h2>Result for Sending through support@skillsquared.com</h2>';



		echo 	$this->crud->send_smtp_email2('waseemafzal31@gmail.com',FROM,HEADING,'ORDER RECEIVED','Test SMTP email support@skillsquared.com');

echo '<br><hr><h2>Result for Sending through noreply@skillsquared.com</h2>';

		echo 	$this->crud->send_smtp_email('waseemafzal31@gmail.com',FROM,HEADING,'ORDER RECEIVED','Test SMTP email noreply@skillsquared.com');



		



		}



		



		function register()



		{



			$this->load->view('register');



		}




		



		function profile()



		{


		if(!$this->session->userdata('login')==true){

			redirect('/', 'refresh');

		}



			



			$aData['countries'] =$this->db->select('name,id')->from($this->tbl_countries)->order_by("id","desc")->get();



			$query =$this->crud->edit( get_session('user_id'),TBL_USER );



			$rolerow = $this->crud->edit( get_session('user_id'),$this->freelancers,'user_id');



			$rolerows = $rolerow;



			$loc_data  =  getuserlocation ($rolerows->location_id);



			$aData['loc_data']  = $loc_data; 



			$aData['countries'] = $this->db->select('name,id')->from($this->tbl_countries)->order_by("id","desc")->get();



			$aData['states'] = $this->db->select('name,id')->from($this->tbl_states)->where('country_id',$loc_data->country )->order_by("id","desc")->get();



			$aData['cities'] = $this->db->select('name,id')->from($this->tbl_cities)->where('state_id',$loc_data->state )->order_by("id","desc")->get();



			$aData['row']= $query;



			$aData['rolerow']=$rolerow;



			$this->load->view('profile',$aData);



		}



			function checkexistence()

			{

				extract($_POST);

				if(empty($key))

				{

					exit;

				}

				

				echo 	$isexist = is_exist('username',$key,$this->freelancers)	;

				exit;

			}

			



		



		



		function certificatecreate()



		{



		  



			if(!$this->session->userdata('login')==true){



				redirect('/', 'refresh');



				exit;



			}



		



		extract($_POST);



		$PrimaryID = base64_decode($_POST['nonouce___']);



		unset($_POST['action'], $_POST['nonouce___']);



		



		$this->load->library('form_validation');



		$this->form_validation->set_rules('certitle', '<i class="glyphicon glyphicon-arrow-right"></i> Certificate Title', 'trim|required');



		$this->form_validation->set_rules('institute', '<i class="glyphicon glyphicon-arrow-right"></i> Institute', 'trim|required');



		$this->form_validation->set_rules('file_check', '<i class="glyphicon glyphicon-arrow-right"></i> Certificate File', 'trim|required');



		



		if ($this->form_validation->run()==false)



		{



			$arr = array("status"=>"validation_error" ,"message"=> validation_errors());



			echo json_encode($arr);



		}



		else



		{    



			$_POST['created_date'] = NOW; 



			$freelancer_id = $_POST['freelancer_id'] = get_id_by_key('id','user_id',$this->session->userdata('user_id'),$this->freelancers);



			$data['certitle']=  $_POST['certitle'];



			$data['institute']=  $_POST['institute'];



			$data['freelancer_id']=  $_POST['freelancer_id'];



			$imgcheck = false;



			



			



			if (isset($_FILES['image']['name']) and !empty($_FILES['image']['name'])) 



			{



				$imgcheck = true;



				$info = pathinfo($_FILES['image']['name']);



				$ext = $info['extension']; // get the extension of the file

               



				if(in_array($ext,array('pdf','docs','rtf','jpg','png')))

					{



					$newname = rand(5, 3456) * date(time()) . "." . $ext;

					

					$target = 'uploads/freelancer/certifcate/' . $newname;

					

					

					

					if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) 

					

					{

					

					$image = $newname;

					

					}

					$data = array_merge(array('certificate'=>$image),$data);

			  }

			  else

			  {

				  $arr = array("status"=>"validation_error" ,"message"=> 'Invaild Certificate fles type');



					echo json_encode($arr); 

					exit; 

			  }



			}



			



			$result = $this->crud->saveRecord( $PrimaryID,$data,$this->tbl_freelancer_certificate );



			if(empty($PrimaryID))



			{	



				$eduid = $this->db->insert_id();



			}



			switch($result)



			{



				case 1:



				$data  = get_row_all('*','freelancer_id',$freelancer_id,$this->tbl_freelancer_certificate);



				 $html .= ' <table border="1" id="cerlistingtbl">



					<tbody >';



					if(is_array($data) and count($data) > 0 ){



					for($index = 0 ; $index < count($data); $index++)



					{	



					$id = 'edulistid'.$index; 	



					$html .= '<tr id="'.$id.'">



					<td class="td_c" id="idd_'.$index.'">'.$data[$index]->certitle.'</td>



					<td class="td_c" id="i_'.$index.'">'.$data[$index]->institute.'</td>



					<td id="dg_'.$index.'">your File</td>



					



					<td>



						<a href="javascript:void(0);" onclick="deleteaddional(\'certificate\',\''.base64_encode($data[$index]->id).'\',\''.$index.'\',\'cerlistid\')"><span class="glyphicon glyphicon-remove-circle"></span></a></td>';					



					}



					}   



					$html .= '</tr>';



					$html .= '</tbody >';



				$html .= '</table>';



             	



				$arr = array('status' => 1,'message' => "Certificate has been Saved Succefully !",'htmlrow'=>$html);



				echo json_encode($arr);



				break;



				



				case 2:



				$data  = get_row_all('*','freelancer_id',$freelancer_id,$this->tbl_freelancer_certificate);



				 $html .= ' <table border="1" id="cerlistingtbl">



					<tbody >';



					if(is_array($data) and count($data) > 0 ){



					for($index = 0 ; $index < count($data); $index++)



					{	



					$id = 'edulistid'.$index; 	



					$html .= '<tr id="'.$id.'">



					<td class="td_c" id="idd_'.$index.'">'.$data[$index]->certitle.'</td>



					<td class="td_c" id="i_'.$index.'">'.$data[$index]->institute.'</td>



					<td id="dg_'.$index.'">your File</td>



					



					<td>



					<a href="javascript:void(0);" onclick="deleteaddional(\'certificate\',\''.base64_encode($data[$index]->id).'\',\''.$index.'\',\'cerlistid\')"><span class="glyphicon glyphicon-remove-circle"></span></a>



					



					</td>';					



					}



					}   



					$html .= '</tr>';



					$html .= '</tbody >';



				$html .= '</table>';



				



				$arr = array('status' => 2,'message' => "Certificate has been Updated Succefully !",'htmlrow'=>$html);



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



		 }



		 



		



		



		



		function educationcreate()



		{



		  



			if(!$this->session->userdata('login')==true){



				redirect('/', 'refresh');



				exit;



			}



		



		extract($_POST);



		$PrimaryID = base64_decode($_POST['nonouce___']);



		unset($_POST['action'], $_POST['nonouce___']);



		



		$this->load->library('form_validation');



		$this->form_validation->set_rules('country', '<i class="glyphicon glyphicon-arrow-right"></i> Country', 'trim|required');



		$this->form_validation->set_rules('institute', '<i class="glyphicon glyphicon-arrow-right"></i> Institute', 'trim|required');



		$this->form_validation->set_rules('degree_title', '<i class="glyphicon glyphicon-arrow-right"></i> Degree Title', 'trim|required');



		$this->form_validation->set_rules('from_year', '<i class="glyphicon glyphicon-arrow-right"></i> From Year', 'trim|required'); 



		$this->form_validation->set_rules('to_year', '<i class="glyphicon glyphicon-arrow-right"></i> To Year', 'trim|required'); 



		



		if ($this->form_validation->run()==false)



		{



			$arr = array("status"=>"validation_error" ,"message"=> validation_errors());



			echo json_encode($arr);



		}



		else



		{    



			$_POST['created_date'] = NOW; 



			$freelancer_id = $_POST['freelancer_id'] = get_id_by_key('id','user_id',$this->session->userdata('user_id'),$this->freelancers);



			$result = $this->crud->saveRecord( $PrimaryID,$_POST,$this->tbl_freelancer_education );



			if(empty($PrimaryID))



			{	



				$eduid = $this->db->insert_id();



			}



			switch($result)



			{



				case 1:



				$data  = get_row_all('*','freelancer_id',$freelancer_id,$this->tbl_freelancer_education);



				 $html .= ' <table border="1" id="edulistingtbl">



					<tbody >';



					if(is_array($data) and count($data) > 0 ){



					for($index = 0 ; $index < count($data); $index++)



					{	



					$id = 'edulistid'.$index; 	



					$html .= '<tr id="'.$id.'">



					<td id="c_'.$index.'">'.$data[$index]->country.'</td>



					<td class="td_c" id="i_'.$index.'">'.$data[$index]->institute.'</td>



					<td id="dg_'.$index.'">'.$data[$index]->degree_title.'</td>



					<td id="ft_'.$index.'">'.$data[$index]->from_year.'-'.$data[$index]->to_year.'</td>



					<td><a href="javascript:void(0);" onclick="editaddional(\''.$index.'\',\''.base64_encode($data[$index]->id).'\')"><span class="glyphicon glyphicon-edit"></span></a>



					<a href="javascript:void(0);" onclick="deleteaddional(\'education\',\''.base64_encode($data[$index]->id).'\',\''.$index.'\',\'edulistid\')"><span class="glyphicon glyphicon-remove-circle"></span></a>



					



					</td>';					



					}



					}   



					$html .= '</tr>';



					$html .= '</tbody >';



				$html .= '</table>';



             	



				$arr = array('status' => 1,'message' => "Education has been Saved Succefully !",'htmlrow'=>$html);



				echo json_encode($arr);



				break;



				



				case 2:



				$data  = get_row_all('*','freelancer_id',$freelancer_id,$this->tbl_freelancer_education);



				 $html .= ' <table border="1" id="edulistingtbl">



					<tbody >';



					if(is_array($data) and count($data) > 0 ){



					for($index = 0 ; $index < count($data); $index++)



					{	



					$id = 'edulistid'.$index; 	



					$html .= '<tr id="'.$id.'">



					<td id="c_'.$index.'">'.$data[$index]->country.'</td>



					<td class="td_c" id="i_'.$index.'">'.$data[$index]->institute.'</td>



					<td id="dg_'.$index.'">'.$data[$index]->degree_title.'</td>



					<td id="ft_'.$index.'">'.$data[$index]->from_year.'-'.$data[$index]->to_year.'</td>



					<td><a href="javascript:void(0);" onclick="editaddional(\''.$index.'\',\''.base64_encode($data[$index]->id).'\')"><span class="glyphicon glyphicon-edit"></span></a>



					<a href="javascript:void(0);" onclick="deleteaddional(\'education\',\''.base64_encode($data[$index]->id).'\',\''.$index.'\',\'edulistid\')"><span class="glyphicon glyphicon-remove-circle"></span></a></td>';	



					



					



									



					}



					}   



					$html .= '</tr>';



					$html .= '</tbody >';



				$html .= '</table>';



				



				$arr = array('status' => 2,'message' => "Education has been Updated Succefully !",'htmlrow'=>$html);



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



		 }



		 



		function deleteaddional()



		{



		   



		   extract($_POST);



			if(!$this->session->userdata('login')==true){



				redirect('/', 'refresh');



				exit;



			}



			$id = base64_decode($id); 



			$table = $this->tbl_freelancer_education;



			if($target=='certificate' and !empty($target))



            { 



			  $table = $this->tbl_freelancer_certificate;



			  



			  // dom for file remove	 



			}			



			$this->db->where('id', $id);



			$result= $this->db->delete($table);



			if ($result)



			{



				$arr = array('status' => 1);



				echo json_encode($arr);



			}



			else



			{



			 $arr = array('status' => 0); 



			 echo json_encode($arr);	



			}



		}



		



		

     function freelancercreate()

		{

		  

		if(!$this->session->userdata('login')==true){

			redirect('/', 'refresh');

			exit;

		}

		

		//pre($_POST);

		
		extract($_POST);

		$anounce__ = explode('_',$_POST['nounce__']);

		

		//$PrimaryID = get_session('user_id');//base64_decode($anounce__[1]);

		// freelancers

		$LocationPID = base64_decode($_POST['loid']);

		unset($_POST['action'],$_POST['nounce__']);

		$afreelancer_data  = get_row_all('id,category_id,username','user_id',$this->session->userdata('user_id'),$this->freelancers);

		$PrimaryID = $afreelancer_data[0]->id;

		$freelancer_id = $afreelancer_data[0]->id;

		$categoryid = $afreelancer_data[0]->category_id;

		

		// new arslan

		

		$this->load->library('form_validation');

		//if(empty($freelancer_id))

		if(empty($afreelancer_data[0]->username))

		{

			$this->form_validation->set_rules('username', '<i class="glyphicon glyphicon-arrow-right"></i> UserName', 'trim|required');

		}

		

		$this->form_validation->set_rules('freelancer_title', '<i class="glyphicon glyphicon-arrow-right"></i> Freelancer Title', 'trim|required');

		

		if($categoryid==0)

		{

			$this->form_validation->set_rules('category_id', '<i class="glyphicon glyphicon-arrow-right"></i> Wroking Category', 'trim|required');

		}

		

		$this->form_validation->set_rules('availablity', '<i class="glyphicon glyphicon-arrow-right"></i> Availablity', 'trim|required');

		$this->form_validation->set_rules('description', '<i class="glyphicon glyphicon-arrow-right"></i> Description', 'trim|required');

		$this->form_validation->set_rules('lang[]', '<i class="glyphicon glyphicon-arrow-right"></i> lang', 'trim|required');

		$this->form_validation->set_rules('country', '<i class="glyphicon glyphicon-arrow-right"></i> Country', 'trim|required'); 

		$this->form_validation->set_rules('state', '<i class="glyphicon glyphicon-arrow-right"></i> State', 'trim|required'); 

		$this->form_validation->set_rules('city', '<i class="glyphicon glyphicon-arrow-right"></i> City', 'trim|required'); 
		
		
		
		if ($this->form_validation->run()==false)

		{

			$arr = array("status"=>"validation_error" ,"message"=> validation_errors());

			echo json_encode($arr);

		}

		else

		{   
		  $identityfile = get_id_by_key('cnic','user_id',$this->session->userdata('user_id'),$this->freelancers);	
			if(empty($identityfile))
			{
			if (empty($_FILES['identityfile']['name']))
			{
			$arr = array('status' => 0,'message' => 'The <i class="glyphicon glyphicon-arrow-right"></i> CNIC/Driving Licience is required!');
			echo json_encode($arr);die();
			
			}	
		}
		
		
		

			$address ='';

			$street ="";

			if(! empty($map_address))

			{

			   $aduser = array('address'=>$map_address);	

			   $this->db->where('id', $this->session->userdata('user_id'));

               $this->db->update($this->users, $aduser);

			}

			

			

			$alocation = array();

			//$alocation['location_type'] =  $location_type;

			$alocation['country']=  $country;

			$alocation['state']=  $state;

			$alocation['city']=  $city;

			//$alocation['zipcode']=  $zipcode;

			//$alocation['location_type']=  $location_type;	

			//$alocation['latitude']=  $lattitude;

			//$alocation['longitude']=  $longitude;

			$alocation['address']=  $map_address; 

			//$alocation['suite_apt']=  $suite_apt;

			$alocation['street']=  $street; 

			$alocation['formatted_address']=  $map_address;

			

			$result = $this->crud->saveRecord( $LocationPID,$alocation,$this->location );

			
			$adata = array(

				'user_id'=>$this->session->userdata('user_id'),

				'availablity'=>$availablity,

				'freelancer_title'=>$freelancer_title,

				'description'=>$description,

				'lang'=>json_encode($lang),

				'facebbok'=>$facebbok, 

				'linked_in'=>$linked_in,
				//'latitude'=>$latitude,
				//'longitude'=>$longitude,
				//'freelancer_address'=>$map_address,
				'google_plus'=>$google_plus,

				'twitter'=>$twitter,

				'instagram'=>$instagram,

				'type'=>'normal',

				'created_on'=>NOW

			);

			

			

			    

				$imgcheck = false;

				if (isset($_FILES['identityfile']['name']) and !empty($_FILES['identityfile']['name'])) 

				{

				$imgcheck = true;

				$info = pathinfo($_FILES['identityfile']['name']);

				$ext = $info['extension']; // get the extension of the file

					//if(in_array($ext,array('pdf','docs','rtf','jpg','png')))
					if(in_array($ext,array('pdf','docs','rtf','jpg','png','txt','gif','GIF','jpeg','PNG','JPEG','JPG')))

					{

					

						$newname = rand(5, 3456) * date(time()) . "." . $ext;

						$target = 'uploads/freelancer/certifcate/' . $newname;

						if (move_uploaded_file($_FILES['identityfile']['tmp_name'], $target)) 

						{

						$image = $newname;

						}

						

						$adata = array_merge(array('cnic'=>$image),$adata);

					}

					else

					{

						//$arr = array("status"=>"validation_error" ,"message"=> validation_errors());

						$arr = array('status' =>"validation_error",'message' => "Invalid File Format for CNIC/ Licence");

						echo json_encode($arr);

						exit;	  

					}

				

				}

			

			

			

				if($categoryid==0) // skip category when update

				{

					$adata =  array_merge(array('category_id'=>$category_id),$adata);	

				}

				

				if(empty($afreelancer_data[0]->username))

				{

				    // new

					$username = strtolower(( str_replace(')','-',str_replace('(','-',str_replace(',','-', str_replace('/','-',str_replace(' ','-',$username)))))));

					$adata =  array_merge(array('username'=>$username),$adata);

				}

				

				if(empty($LocationPID))

				{

					$locationID = $this->db->insert_id();

					$adata =  array_merge(array('location_id'=>$locationID),$adata);

				

				}

				

				if(empty($PrimaryID))

				{

				

				

					$result = $this->crud->saveRecord( $PrimaryID,$adata,$this->freelancers );

					$freelancer_id = $this->db->insert_id();

					$username = get_id_by_key('username','user_id',$this->session->userdata('user_id'),$this->freelancers);

						  

				}

				else

				{

				 

				  $result = $this->crud->saveRecord( $PrimaryID,$adata,$this->freelancers );

				  

				  if(isset($afreelancer_data[0]->username) AND empty($afreelancer_data[0]->username)  )

				  {

				  	transfercommissiontorefferralonsignup(); // new addition

				  }

				  $freelancer_id = $PrimaryID;	

				  $username = get_id_by_key('username','user_id',$this->session->userdata('user_id'),$this->freelancers); 

				

				}

			

			//arsal231

			//die('--');

			$freelancerskils = array();

			$freelancerskils = explode(',',$_POST['freelancer_skills']);	

			

			$this->db->where('freelancer_id', $freelancer_id);

			$result= $this->db->delete($this->tbl_freelancer_skill);

			

				for($index = 0 ; $index < count($freelancerskils); $index++)

				{

					if(!empty($freelancerskils[$index]))

					{

						$afreelancerskills[] = array('freelancer_id'=> $freelancer_id ,'skill_id '=>$freelancerskils[$index]);

					}

				}

				if(count($afreelancerskills))

				{

					if($this->db->insert_batch($this->tbl_freelancer_skill,$afreelancerskills) >0){

					

					$resultant =1;

					}

				}

			

			

			

			

			switch($result)

			{

				case 1:

				$arr = array('status' => 1,'message' => "Your Role has been saved Succefully !",'data_user'=>$username);

				echo json_encode($arr);

				break;

				

				case 2:

				$arr = array('status' => 2,'message' => "Your Role has been Updated Succefully !",'data_user'=>$username);

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

         }



		



		 /*===================Coutries,state,cities=====================*/

       

		 public function get_options()



		 {  

		

			extract($_POST);



			$table = $this->tbl_cities;



			$column =  'state_id';



			$optiontext = 'City';



			



			if(!empty($hint)  and $hint == 1)



			{



				$table = $this->tbl_states;



				$column =  'country_id';



				$optiontext = 'State';



			}



			$aState =$this->db->select('name,id')->from($table)->where($column ,$id )->order_by("id","desc")->get();



		   



			$stateHtml = '';



			$stateHtml .= '<option value="" >choose '.$optiontext.'</option>'; 

            if($optiontext =='City') 

			{

			  $stateHtml .= '<option value="other" >Other</option>';	

			}

			



			if($aState->result()){



				foreach ($aState->result() as $row)



				{



					$stateHtml .= '<option value="'.$row->id.'" >'.$row->name.'</option>'; 



				}



				}



			echo $stateHtml;            



			exit;



			



		 }



		



		



		public function extract_coordinates_detail()



		{   



			extract($_POST);



			echo json_encode($a_coordinates  = $this->crud->extract_coordinates($val));	



			exit;



		}



		



		function subscribe()



		 {



			$this->load->library('form_validation');



			$this->form_validation->set_rules('email','Email','valid_email|required|min_length[1]|max_length[50]|is_unique[tbl_subscriber.email]');



			if ($this->form_validation->run()==false)



			{



				$arr = array("status"=>0 ,"message"=> validation_errors());



				echo json_encode($arr);



			}



			else{ 



			extract($_POST);



			/******************************THANK EMAIL TO USER**************************************/



				$email_msg = 'Hello ! <br>Thanks for subscricption ';  



				



				$email_msg .= "<br><br><b>Skill Squared Support Team</b>";



				$subject = "Skill Squared Subscription";  



				$config = Array(



				'mailtype' => 'html',



				'charset' => 'iso-8859-1',



				'wordwrap' => TRUE);



				$this->load->library('email', $config);



				$this->email->from('no-reply@skillsquared.com', 'Skill Squared');  



				$this->email->to($email);  



				$this->email->subject($subject);  



				$this->email->message($email_msg);  



				$this->email->send();  



/******************************************************************************************************/



				



				$data = array(    //$data is a global variable



            	'email' => $email



				);



			//pre($data);



				$result =$this->db->insert('tbl_subscriber',$data);



				switch($result){



				case 1:



				$arr = array('status' => 1,'message' => "Subscribed Succefully !");



				echo json_encode($arr);



				break;



				case 0:



				$arr = array('status' => 0,'message' => "Not Subscribed!");



				echo json_encode($arr);



				break;



				default:



				$arr = array('status' => 0,'message' => "Not Subscribed!");



				echo json_encode($arr);



				break;	



		       }



			}



		}







	



			function verifySubscribe($hash)



			{



			



				$result =$this->user_model->isValidSubscriber($hash);



				if($result)



				{



					$aData['title'] =' Diamond Foam | Shop Quality Mattresses ';



					$aData['meta'] ="With more than 500 stores across Pakistan, Diamond Foam is the nation's leading bedding specialty retailer.";



					$this->load->view('header',$aData);



					$this->load->view('user/subscribe_thanks');



					$this->load->view('footer');



				}



			



			



			}



		



			function verifyme($varifyCode) {



			    



				$result = $this->user_model->verifyEmailAddress($varifyCode); //get the hash value which belongs to given email from database



				if($result==1){ 



					$this->load->view('header',$aData);



					$this->load->view('user/congrats',$aData);



					$this->load->view('footer',$aData);



				}



			}	



			



		function isvalidemail()



	    {



	      



		    $aData['all_subcategories'] =$this->category_model->getAllSubCatgories();



			



			$this->load->library('form_validation');



			$this->form_validation->set_rules('email_forget','Email','trim|required|valid_email|xss_clean|min_length[1]|max_length[50]');



			if ($this->form_validation->run()==false){



				$this->load->view($langUrl.'header',$aData);



				$this->load->view($langUrl.'user/forget',$aData);



				$this->load->view($langUrl.'footer');



			



			}else{



				



			   $result =$this->user_model->_isValidUserEmail($this->input->post('email_forget'));



			  switch($result){



				



					    case 1:



						$aData['class']="message_text_suc";



						$aData['msg_forget']="Sucess : Password Send Succesfully To your Email address";



						$this->load->view($langUrl.'header',$aData);



						$this->load->view($langUrl.'user/forget',$aData);



						//$this->load->view($langUrl.'main/left',$aData);



//$this->load->view($langUrl.'banner/banner',$aData);



						$this->load->view($langUrl.'footer');



                        break;



							



						case 0:



						



						$aData['class']="message_text_error";



						$aData['msg_forget']="Error : This Email not Exist In our System";



						$this->load->view($langUrl.'header',$aData);



						$this->load->view($langUrl.'user/forget',$aData);



						



						$this->load->view($langUrl.'footer');



						break;



						default:



						$this->forget();



						break;	



						



					



				}



			}



		}















	  function isvalidEmailExist()



	    {



			$this->load->library('form_validation');



			$this->form_validation->set_rules('email_forget','Email','trim|required|valid_email|xss_clean|min_length[1]|max_length[50]');



			if ($this->form_validation->run()==false){



			



			



			}else{



				extract($_POST);



			   $result =$this->user_model->_isValidUserEmail($email_forget);



			  switch($result){



				



					    case 1:



							echo 1;



							break;



						case 0:



							echo 0;



							break;



						default:



							echo 0;



							break;	



				}



			}



		}







	



	/*******************************Uset Forget*******************************************/



	



	



	



		function unsubscribe(){



			$aUrl=$this->uri->uri_to_assoc(1);



		    $this->user_model->unSubscribe($aUrl['email']); // unsubscribe Users



		}



		



		



		



	



	



	



}







/* End of file Dashboard.php */



/* Location: ./application/controllers/dashboard.php */



?>