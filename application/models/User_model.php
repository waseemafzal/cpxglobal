<?php
	class User_model extends CI_model {
			
			
			private $tblName='tbl_user';
			private $tblCart='tbl_cart';
			private $tblSubscriber='tbl_subscriber';
			private $tbl_requestcall='tbl_requestcall';
			private $active=1;
			private $unActive=0;
			 
			   function __construct()
				{
				
					parent::__construct();	
				}
	public function save($data_array)
		{
			//
			$email=$data_array['email'];
			 $sql="SELECT email FROM ".$this->tblName." WHERE email='".$email."'";
			$data= $this->db->query($sql);
			if ($data->num_rows()>0)
			{  
			  $result = 2; 
			
			}else{
			  $dbExi=$this->db->insert($this->tblName, $data_array); 
				$result =0;
				if($dbExi){
					$result = 1;
				}
			} 
		 return  $result;
		}

	public function requestSave($data_array)
		{
		$dbExi=$this->db->insert($this->tbl_requestcall, $data_array); 
		$result =0;
		if($dbExi){
			$result = 1;
		}
		return  $result;
		}
	
		
	public 	function get()
		{
			
         	$sql="SELECT * FROM ".$this->tblName." WHERE  type!='".ADMIN."'";
			$data= $this->db->query($sql);
			if ($data->num_rows()>0)
			{
				return $data;
			}
			else
			{
				return 0;
			}
			
			
		}
		
		
		public 	function getSubscribers()
		{
			
			$sql="SELECT * FROM ".$this->tblSubscriber." WHERE  status='".$this->active."'";
			$data= $this->db->query($sql);
			if ($data->num_rows()>0)
			{
				return $data;
			}
			else
			{
				return 0;
			}
			
			
		}
		
		
		
		public 	function unSubscribe($email)
		{ 
			$sql="UPDATE  ".$this->tblSubscriber." SET status='".$this->unActive." WHERE email='".$email."'";
			$data= $this->db->query($sql);  
			//true
        }
		
		public function subscribe($data_array)
		{
			//
			$email=$data_array['email'];
		 	 $sql="SELECT email FROM ".$this->tblSubscriber." WHERE email='".$email."' AND status = 1";
		
			$data= $this->db->query($sql);
			if ($data->num_rows()>0)
			{  
			  $result = 2; 
			
			}else{
			  $dbExi=$this->db->insert($this->tblSubscriber, $data_array); 
				$result =0;
				if($dbExi){
					$result = 1;
				}
			} 
		 return  $result;
		}
		
		
		
		
		  
		
		
		

 	public  function delete($id)
		{
			
          	$sql="DELETE FROM ".$this->tblName." WHERE id='".$id."'";
			$data= $this->db->query($sql);
			if ($data)
			{
				return 1;
			}
			else
			{
				return 0;
			}
			
			
		}
    
	public function edit($id)
		{
			
           $sql="SELECT * FROM ".$this->tblName."  WHERE id='".$id."'";
			$data= $this->db->query($sql);
			if ($data->num_rows()>0)
			{
				return $data->row();
			}
			else
			{
				return 0;
			}
			
			
		}
		
		/*****************Is User Valid**************************/
		  
		   	
		  
		public function _isValidUser($email,$password)
		{
			
            $sql="SELECT * FROM ".$this->tblName."  WHERE email='".$email."' AND password='".$password."' AND status='".$this->active."' AND type='".USER."'";
			$data= $this->db->query($sql);
			return $data;
		}
		public function isValidSubscriber($hash)
		{
			
            $sql="SELECT * FROM ".$this->tblSubscriber."  WHERE hash='".$hash."'";
			$data= $this->db->query($sql);
			if($data){
				$sql="UPDATE  ".$this->tblSubscriber." SET status='".$this->active."' WHERE hash='".$hash."' ";
			$data= $this->db->query($sql);  
				return 1;
				}
			else{
				return 0;
				}
		}
		
		  
		public function _isValidAdmin($email,$password)
		{
			
            $sql="SELECT * FROM ".$this->tblName."  WHERE email='".$email."' AND password='".$password."' AND type='".ADMIN."'";
			$data= $this->db->query($sql);
			return $data;
		}
		  
		
		
		
		/***************************************************************************/
		  public function _isValidEmail($email)
		{
			
            $sql="SELECT * FROM ".$this->tblName."  WHERE email='".$email."'  AND type='".ADMIN."'";  // for admin
			$data= $this->db->query($sql);
			
			if ($data->num_rows()>0)
			{
				$result =  $data->row();
				
				$password = $result->password;
				$email = $result->email;
				//$userName = $result->display_name;
				$userName ='Admin';
				/*******************************************/
				    $this->load->library('email');
					$config['protocol'] = 'mail';
					$config['mailpath'] = '/usr/sbin/sendmail';
					$config['charset'] = 'iso-8859-1';
					$config['mailtype'] = 'html';
					$config['wordwrap'] = TRUE;
					$this->email->initialize($config);
					
					$this->email->from('non-reply@charryq8.com', 'CherryQ8.com');
					$this->email->to($email); 
					$this->email->subject('Paswword Recovey');
					$msg=' Hi,&nbsp;'.$userName.' <br/>
					  Your Password <span style="font-weight:bold">: '.$password.'</span>
					<br/>
					
					<br/>
					Regards,
					<br/>
					cherryq8 team
					';
					$this->email->message($msg);			
					$this->email->send();
				/*******************************************/
				 return 1;	
			}else{
				
			  	return 0;	
			}
			
			
		}
		/***************************************************************************/
		
		
		
		
		/******************************User Forget**************************************/
	  public function _isValidUserEmail($email)
		{
			
             $sql="SELECT * FROM ".$this->tblName."  WHERE email='".$email."'  AND status='".$this->active."' AND type='".USER."'"; // for User
			$data= $this->db->query($sql);
			
			if ($data->num_rows()>0)
			{
				$result =  $data->row();
				
				$password = $result->password;
				$email = $result->email;
				$userName = $result->display_name;
				/*******************************************/
				$this->load->library('email');
				$config['protocol'] = 'mail';
				$config['mailpath'] = '/usr/sbin/sendmail';
				$config['charset'] = 'iso-8859-1';
				$config['mailtype'] = 'html';
				$config['wordwrap'] = TRUE;
				$this->email->initialize($config);
				$this->email->from('non-reply@diamondfoam.com', 'diamondfoam.com');
				$this->email->to($email); 
				$this->email->subject('Paswword Recovey');
				$msg=' Hi,&nbsp;'.$userName.' <br/>
				Your Password<span style="font-weight:bold">:&nbsp;'.$password.'</span>
				<br/>
				<br/>
				
				Regards,
				<br/>
				Diamondfoam Team
				';
				$this->email->message($msg);			
				$this->email->send();
				/*******************************************/
				 return 1;	
			}else{
				
			  	return 0;	
			}
			
			
		}
		/****************************User Forget*****************************************/
		
		
		
		
		
		/****************************************************/
		
		
		public function getCmsPage($id)
		{
			
           $sql="SELECT * FROM ".$this->tblName."  WHERE id='".$id."'";
			$data= $this->db->query($sql);
			if ($data->num_rows()>0)
			{
				return $data->row();
			}
			else
			{
				return 0;
			}
			
			
		}
	
	public  function update($email,$user_name,$display_name,$password,$id)
		{
			
			
			
		   $sql="SELECT email FROM ".$this->tblName." WHERE email='".$email."' AND  id!='".$id."'";
			$data= $this->db->query($sql);
			if ($data->num_rows()>0)
			{  
			  return 2;
			
			}else{
				 $updatedAt= date('y-m-d H:i:s');
		        $sql="UPDATE  ".$this->tblName." SET email='".$email."',user_name='".$user_name."',display_name='".$display_name."',password='".$password."',updated_at='".$updatedAt."'  WHERE id='".$id."'";
			  $data= $this->db->query($sql);  
				if ($data)
				{
					return 1;
				}
				else
				{
					return 0;
				}
				}
			
		}
		
		
		function logout() // user 
		{
			
					
			$userData = array(
						'user_id'  => '',
						'user_name'  => '',
						'email'     => '',
						'user_type'     => '',
						'logged_in_user' => false
					);
				  $this->session->set_userdata($userData);
				  return true;
		}
		
		//admin logout
		
		function _alogout()
		{
			$userData = array(
						'admin_id'  => '',
						'user_name_admin'  => '',
						'type'  => '',
						'logged_in' => false
					);
			$this->session->set_userdata($userData);
			return true;
		}
		
		
     	
		
   public  function _emptyUserItems($id)
		{
			
            $sql="DELETE FROM ".$this->tblCart." WHERE user_id='".$id."'";
			$data= $this->db->query($sql);
			if ($data)
			{
				return 1;
			}
			else
			{
				return 0;
			}
			
			
		}

public function verifyEmailAddress($verificationCode)  
        {  
          //  $this->db->set('status', 1)->where('hash', $verificationCode)->update(".$this->tblName.");  
 $sql="UPDATE  ".$this->tblName." SET status=1 WHERE hash='".$verificationCode."'";
			$data= $this->db->query($sql);  
            if ($data==1)
			{
				return 1;
			}
			else
			{
				return 0;
			}
        }   
		
		
}
?>