<?php include_once"header.php";?>
		<style type="text/css">
		.nbr{ border-radius: 0px !important;}
		.msg_box{ display:none;}
		.s_msg p,.s_msg{  color:#11b719 !important;}
		.r_msg p,.r_msg{  color:#F00 !important;}
		.btlb{color:#11b719 !important;}
		.btlb:hover{ text-decoration:underline;}
		.boxl{background:#254c33ad !important;padding: 5px 5px 5px 5px;}
		#formuserloggedin_56_dsadad443 { display:block;}
		#form_user_forgot_67676r_39892hfh{ display:none;}
		#formusersignup_56_d4d352csfs83_4{ display:none;}
		.custom-checkbox input{ cursor: pointer;}
        </style>
        <?php 
			$displaylogin = 'block';
			$dipalysignup = 'none';
			if (!empty($referal))
			{
				$displaylogin = 'none';
				$dipalysignup = 'block';
			}
		?>  
			
			
           <!-- End Navigation -->
			<div class="clearfix"></div>
			
			<!-- Title Header Start -->
			<section class="login-plane-sec"> 
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-md-offset-3">
							<div class="login-panel panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Login Panel</h3>
								</div>
								<div class="panel-body">
                                
									<img src="<?=getlogo('assets/img/logo.png')?>" class="img-responsive boxl" />
									
                                    <form role="form" method="post" id="formuserloggedin_56_dsadad443" style="display:<?php echo $displaylogin;?>">
                                       <p id="msg_box"></p>
										<fieldset>
											<div class="form-group">
												<input class="form-control" placeholder="Email or Phone No" name="identity" type="text" autofocus maxlength="60">
                                                
											</div>
											<div class="form-group">
												<input class="form-control" placeholder="Password" name="password" type="password" id="password" value="">
                                                 
											</div>
                                            
                                            
                                            
                                            <div class="row">
                                            
                                                <div class="col-xs-12">
                                                <span class="custom-checkbox" style="color:#07b107;">
                                                <input type="checkbox" id="1">
                                                <label for="1"></label>
                                                Remember Me  </span> 
                                                </div>
                                            </div>
											<!-- Change this to a button or input when using this as a form -->
                                            <button type="submit" id="loginsbmbtn" class="btn btn-login nbr"> Login </button>
                                             <a href="javascript:void(0);" class="signbbtn btlb"  style="float:left;">Signup?</a>
                                            <a href="javascript:void(0);" class="fpb btlb"  style="float:right;">Forgot Password?</a>
                                        </fieldset>
									</form>
                                    
                                    
                                    
                                    <form role="form" method="post" id="form_user_forgot_67676r_39892hfh" >
                                     
                                       <p id="msg_box"></p>
										<fieldset>
											<div class="form-group">
												<input class="form-control" placeholder="your@yahoo.com" name="email" type="text" autofocus>
                                            </div>
											
                                            <div class="row">
                                            
                                                <div class="col-xs-12">
                                                <span class="custom-checkbox" style="color:#07b107;">
                                                
                                               
                                                <a href="javascript:void(0);" class="btl btlb" >Back to login</a></span> 
                                                </div>
                                            </div>
											<button type="submit" id="login-btn" class="btn btn-login nbr">  Reset Password  </button>
										</fieldset>
									</form>
                                    
                                    <form role="form" class="billing-form" method="post" id="formusersignup_56_d4d352csfs83_4" enctype="multipart/form-data"
                                    style="display:<?php echo $dipalysignup;?>">
                                    
                                       <p id="msg_box"></p>
										<div class="col-md-12 col-sm-12">
							<div class="">
							   <div class="row">
									<div class="col-xs-12">
										
										<input type="text" class="form-control" placeholder="Full Name" name="name">
									</div>
								</div>
                                <span></span>
								<div class="row">
									<div class="col-xs-12">
										
										<input type="text" class="form-control" placeholder="your@yahoo.com" name="email">
									</div>
									
								</div>
                                 <span></span>
                                 <div class="row">
									<div class="col-xs-12">
										
										 <input type="text" class="form-control" placeholder="Phone No" name="phone" >
									</div>
									
								</div>
                                
                                 
								<div class="row">
									<div class="col-xs-6">
										
										<input type="password" class="form-control" placeholder="Password" name="password">
									</div>
									<div class="col-xs-6">
										
										<input type="password" class="form-control" placeholder="Confirm Password" name="confirm-password">
									</div>
								</div>
								
                                <div class="row">
									<div class="col-xs-12">
										
                                        <select name="countryid" class="form-control" >

                                           <option value="" >Country</option>

                                          <?php 
											if($countries->result())
											{
												foreach ($countries->result() as $rows)
												{
										   ?>
												<option value="<?php echo $rows->id;?>"  ><?php echo $rows->name;?></option>
										  <?php 
											 }
										   }
										 ?>  

                                        </select>
										
									</div>
									
								</div>
                                
                                <div class="row">
                                	<div class="col-xs-12">
                                    <span class="custom-checkbox" style="color:#07b107;">
                                    <input type="checkbox" id="1" name="become_freelancer" value="1">
                                    <label for="1"></label>
                                    <a href="<?php echo base_url();?>become-a-freelancer" class="btlb" > Become a Freelancer? </a> </span> 
                                    </div>
                                </div>
                                
								<div class="row mrg-top-30">
									<div class="col-md-12 text-center">
                                     <a href="javascript:void(0);" class="btl btlb"  style="float:right;">Back to Login</a></span> 
										<button type="submit" id="signupbtn__" class="btn btn-success btn-success btn btn-login nbr">  SignUp  </button>
									</div>
								</div>
							   <p>&nbsp;</p>
							
							</div>
						</div>
									</form>
                                    
									<!--<ul class="social-login">
										<li class="facebook-login"><a href="javascript:void(0);"><i class="fa fa-facebook"></i>Facebook</a></li>
										<span>OR</span>
										<li class="google-plus-login"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i>GooglePlus</a></li>
									</ul>-->
								</div>
							</div>
						</div>
					</div>
				</div>
					<?php 
                    if (!empty($referal))
                    {
                    	echo '<input type="hidden" name="refferalkey" id="rkey___423390" value="'.$referal.'">';
                    }
                    ?>
			</section>
			
			<!-- Footer Section Start -->
			<?php include_once"footer.php";?>