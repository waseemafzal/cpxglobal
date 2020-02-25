<?php 
include_once"header.php";
?>
        <section id="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <h1>Login / Register
</h1>
</div>
            </div><!-- End row -->
        </div><!-- End container -->
      </section>
      <div class="clearfix">&nbsp;</div>
<section class="vc_rows wpb_rows vc_rows-fluid vc_custom_1488790902404 " id="main-features">
            <div class="container">
            <div class="row">
        <div class="span12">
    		<div class="" id="loginModal">
              <div class="modal-header">
                <h3>Have an Account?</h3>
              </div>
              <div class="modal-body">
                <div class="well">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#login" data-toggle="tab">Login</a></li>
                    <li><a href="#create" data-toggle="tab">Create Account</a></li>
                    <li><a href="#request" data-toggle="tab">Request new password </a></li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                   <div class="page-alert" style="display: block;"></div>
                    <div class="tab-pane active in" id="login">
                        
     					<form role="form" class="form-horizontal"  method="post" id="form_user_loggedin" >
                        <fieldset>
                          <div id="legend">
                            <legend class="">Login</legend>
                          </div>    
                          <div class="control-group">
                            <!-- Username -->
                            <label class="control-label"  for="username">Username</label>
                            <div class="controls">
                              <input type="text" id="identity" name="identity" placeholder="" class="form-control">
                             
                              
                            </div>
                          </div>
     
                          <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" for="password">Password</label>
                            <div class="controls">
                              <input type="password" id="password" name="password" placeholder="" class="form-control">
                            </div>
                          </div>
     
     
                          <div class="control-group">
                            <!-- Button -->
                            <div class="controls">
                              <button class="btn btn-success" type="button" id="login-btn">Login</button>
                               <span id="logindiv"></span>
                            </div>
                          </div>
                        </fieldset>
                      </form>                
                    </div>
                    <div class="tab-pane fade " id="request">
                      
                      <form role="form-horizontal" method="post" id="form_user_forgot_67676r_39892hfh" >
                      
                        <fieldset>
                          <div id="legend">
                            <legend class="">Recover Password</legend>
                          </div>    
                          <div class="control-group">
                            <!-- Username -->
                            <label class="control-label"  for="username">Email</label>
                            <div class="controls">
                              <input type="text" id="recoveemail" name="email" placeholder="john@gmail.com" class="form-control">
                            </div>
                          </div>
     <div class="control-group">
                            <!-- Button -->
                            <div class="controls">
                              <button class="btn btn-success" id="forgotpasswordsbt" type="button">Submit</button>
                                <span id="forgotUpdiv"></span>
                            </div>
                          </div>
                        </fieldset>
                      </form>                
                    </div>
                    <div class="tab-pane fade" id="create">
                      <!--<form id="tab">-->
                      
                        <form role="form" class="billing-form" method="post" id="formusersignup_56_d4d352csfs83_4" enctype="multipart/form-data">
                         
                      
                       <div class="col-md-4 col-xs-12">
                        <label>Full Name</label>
                        <input type="text" value="" name="name" class="form-control">
                       
                       </div>
                       <div class="col-md-4 col-xs-12">
                      
                        <label>Email</label>
                        <input type="text" value="" name="email" class="form-control">
                         </div>
                        
                      <div class="col-md-4 col-xs-12">
                      
                        <label>Phone</label>
                        <input type="text" value="" name="phone" class="form-control">
                         </div>
                        
                      <div class="col-md-4 col-xs-12">
                      
                        <label>Password</label>
                        <input type="text" value="" name="password" class="form-control">
                         </div>
                         <div class="col-md-4 col-xs-12">
                      
                        <label>Confirm Password</label>
                        <input type="text" value="" name="confirm-password" class="form-control">
                         </div>
                        <div class="col-md-4 col-xs-12">
                      
                        <label>Country</label>
                         <input type="text" value="" name="countryid" class="form-control">
    
     
                        <div>
                        <!--  <button class="btn btn-primary" id="signupbtn__" type="submit">Create Account</button>-->
                          	<button type="button" id="signupbtn__" class="btn btn-primary">  SignUp  </button>
                          <span id="signUpdiv"></span>
                        </div>
                      </form>
                    </div>
                </div>
                <div class="clearfix">&nbsp;</div>
              </div>
            </div>
        </div>
	</div>
</div>
            </div>
        </section>
       <style type="text/css">
	    .page-alert p { margin-bottom:0px;}
       </style>  
  <script type="text/javascript">

 jQuery(document).ready(function(e) {
   
	$("#signupbtn__").click(function(e){
	
	    e.preventDefault();
		createuserregular();
		return false;
	
	})

	$("#login-btn").click(function(e){
		e.preventDefault();
		loggedin_user();
		return false;
    });
	
	$("#forgotpasswordsbt").click(function(e){
		e.preventDefault();
		forgotuserpage();
		return false;
    });
 });
 
  
  // forgot  
  function forgotuserpage()
   {
       	jQuery("#forgotUpdiv").html('<i class="fa fa-cog fa-spin" style="font-size:24px"></i>'); 
		
		jQuery("#forgotpasswordsbt").prop('disabled',true);
		var formData = new FormData();
		var other_data = $('#form_user_forgot_67676r_39892hfh').serializeArray();
		$.each(other_data,function(key,input){
			formData.append(input.name,input.value);
		});   

        $('#loader').removeClass('hidden');

	    $.ajax({
		url: "<?php echo base_url().'auth/forgot'; ?>",
		type: 'POST',
		data: formData,
		dataType: "json",
		processData: false,
		contentType: false,
		success: function(response) {
			$('#loader').addClass('hidden'); 
				jQuery("#forgotpasswordsbt").prop('disabled',false);
 			jQuery("#forgotUpdiv").html('');
			if (response.status == 1)
			{   
				getMsg('success',response.message);
			}
			else if (response.status ==0)
			{  
				getMsg('error',response.message);
			}
			else
			{
				
				getMsg('error',response.message);
			}

        }
	 });
   }
 
 
  
     // loginedd
	 function loggedin_user()
	 {

       	jQuery("#logindiv").html('<i class="fa fa-cog fa-spin" style="font-size:24px"></i>');
		var formData = new FormData();
		var other_data = $('#form_user_loggedin').serializeArray();

		

		$.each(other_data,function(key,input){

		

			formData.append(input.name,input.value);

		});   


	    $.ajax({

		url: "<?php echo base_url().'auth/userlogin'; ?>",

		type: 'POST',

		data: formData,

		dataType: "json",

		processData: false,

		contentType: false,

		beforeSend: function() {

			$('#loader').removeClass('hidden');

		},

		success: function(response) {

		$('#loader').addClass('hidden');
		jQuery("#logindiv").html('');
         if (response.status == 1)

			{   

			   

			   setTimeout(function(){

				window.location="<?php echo base_url(); ?>";

				

				},2000);

			}

			else if (response.status ==0)

            {  

				 getMsg('error',response.message);
				
			}else

			{

			  getMsg('error',response.message);

			}

           }

       });

     }  
	
	
  
     function createuserregular(){


		var formData = new FormData();

		jQuery("#signUpdiv").html('<i class="fa fa-cog fa-spin" style="font-size:24px"></i>');

		var other_data = jQuery('#formusersignup_56_d4d352csfs83_4').serializeArray();

		
		jQuery("#signupbtn__").prop('disabled',true);
		jQuery.each(other_data,function(key,input)
		{
			formData.append(input.name,input.value);
		}); 
		
		
		jQuery.ajax({



        url: "<?php echo base_url().'auth/createaccount'; ?>",

		

		type: 'POST',

		

		data: formData,

		

		dataType: "json",

		

		processData: false,

		

		contentType: false,

        beforeSend: function() {

			jQuery('#loader').removeClass('hidden');

			},

        success: function(response) {

			jQuery('#loader').addClass('hidden');
           jQuery("#signUpdiv").html('');
			if (response.status == 1)
			{   
              
			   getMsg('success',response.message);
			  jQuery("#signupbtn__").prop('disabled',false);
			    setTimeout(function(){
					window.location="<?php echo base_url().'user/login' ?>";
				
				},2000); 
			}
			else if (response.status ==2)
			{  
				
			
				
            }
			else if (response.status ==0)
			{  
			   getMsg('error',response.message);
			   jQuery("#signupbtn__").prop('disabled',false);
			  
			}
			else  
			{   
			     getMsg('error',response.message);
				jQuery("#signupbtn__").prop('disabled',false);
				
			}
		  }

       });
   } 
   
   function getMsg(type,msg)
	{
			var msgg = '<div class="message '+type+'">'+msg+'</div>';
			jQuery(".page-alert").show();
			jQuery(".page-alert").addClass('error');
			jQuery(".page-alert").html(msgg);
			jQuery(".page-alert").focus();
			setTimeout(function()
			{
				jQuery(".page-alert").html('').fadeOut();
			},10000);	
	}
     
	 
	 
	 
  </script>      
<?php include_once"footer.php"; ?>
