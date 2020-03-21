<?php 

include_once"header.php";
?>
<style>
#membsrshipcreate h4 {
    color: #000!important;
    text-align: center;
    background: #f30100;
    padding: 7px 6px;
    font-size: 20px;
    clear: both;
    display: inline-block;
    width: 100%;
}
</style>
        <section id="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
            <h1>MEMBERSHIP APPLICATION
            </h1>
</div>
            </div><!-- End row -->
        </div><!-- End container -->
      </section>
      <div class="clearfix">&nbsp;</div>
            
     <section class="vc_rows wpb_rows vc_rows-fluid vc_custom_1488790902404 " id="main-features">
            <div class="container">
             <h4 class="headingform__">Online Membership form</h4>
     
              <form id="membsrshipcreate" name="form_add_update" role="form" enctype="multipart/form-data">
                <div class="page-alert" style="display: block;"> </div>
               	<div id="registrationDetail" style="display:block;">
                	<section id="personalDetail" class="formSection">
        <h4>Personal Detail</h4>
        <div class="col-md-4 col-xs-12">
        <label>Name <span class="text-danger">*</span></label>
        <input class="form-control"  required="required" name="name" /> 	
        </div>
        <div class="col-md-4 col-xs-12">
        <label>Middle Name</label>
        <input class="form-control" name="middle_name" />
        </div>
        <div class="col-md-4 col-xs-12">
        <label>Last Name <span class="text-danger">*</span></label>
        <input class="form-control" required name="last_name" />
        </div>
        <div class="col-md-4 col-xs-12">
        <label>Email <span class="text-danger">*</span></label>
        <input class="form-control" type="email" required name="email" />
        </div>
        <div class="col-md-4 col-xs-12">
        <label>Mobile <span class="text-danger">*</span></label>
        <input class="form-control" required name="mobile" />
        </div>
        <div class="col-md-4 col-xs-12">
        <label>Fax</label>
        <input class="form-control"  name="fax" />
        </div>
        <div class="col-md-4 col-xs-12">
        <label>Date of birth</label>
        <input class="form-control" type="date" required name="dob" />
        </div>
        </section>
                    <section id="companySection" class="formSection">
                             
                        <h4>Company Detail</h4>
                        
                        <div class="col-md-4 col-xs-12">
                        <label>Company Name</label>
                        <input class="form-control"  required="required" name="company_name" />
                        </div>
                        <div class="col-md-4 col-xs-12">
                        <label>Principal Business:</label>
                        <input class="form-control" name="principle_bussniss" />
                        </div>
                        <div class="col-md-4 col-xs-12">
                        <label>Number of employees:</label>
                        <input class="form-control" required name="number_of_employees" />
                        </div>
                        
                        <div class="col-md-4 col-xs-12">
                        <label>Address</label>
                        <input class="form-control"  required="required" name="address" />
                        </div>
                        <div class="col-md-4 col-xs-12">
                        <label>Country:</label>
                        <input class="form-control" name="country" />
                        </div>
                        <div class="col-md-4 col-xs-12">
                        <label>Zip:</label>
                        <input class="form-control" required name="zip" />
                        </div>
                 </section>
                    <section id="PROFESSIONAL" class="formSection">
                        <h4>PROFESSIONAL &amp; EDUCATIONAL DETAILS: </h4>
                            
                        <div class="col-md-12 col-xs-12">
                        <p>University 	degree 	diploma 	other 	job detail </p>
                            <div class="field_wrapper">
                            <div>
                            <input type="text" placeholder="Company Name" name="job_detail[cname][]" value=""/>
                            <input type="text" placeholder="Position" name="job_detail[position][]" value=""/>
                            <input type="text" placeholder="Month & Years"  name="job_detail[period][]" value=""/>
                            <a href="javascript:void(0);" class="add_button" title="Add field"><i class="glyphicon glyphicon-plus"></i></a>
                            </div>
                            </div>
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        
                        <div class="col-md-4 col-xs-12">
                        <label>University:</label>
                        <input class="form-control" required name="university" />
                        </div>
                        <div class="col-md-4 col-xs-12">
                        <label>Degree:</label>
                        <input class="form-control" required name="degree" />
                        </div>
                        <div class="col-md-2 col-xs-12">
                        <label>Diploma:</label>
                        <input class="form-control" required name="diploma" />
                        </div>
                        <div class="col-md-2 col-xs-12">
                        <label>Other:</label>
                        <input class="form-control" required name="other" />
                        </div>
        </section>
                    <section id="personalDetail" class="formSection">
                        <h4>REFERRED BY:</h4>
                        <div class="col-md-4 col-xs-12">
                        <label>Name</label>
                        <input class="form-control"  required="required" name="refferby_detail[reffredName]" />
                        </div>
                        <div class="col-md-4 col-xs-12">
                        <label>Company</label>
                        <input class="form-control" name="refferby_detail[reffredCompanyName]" />
                        </div>
                        <div class="col-md-4 col-xs-12">
                        <label>Address</label>
                        <input class="form-control" required name="refferby_detail[reffredaddress]" />
                        </div>
                        <div class="col-md-4 col-xs-12">
                        <label>Suburb:</label>
                        <input class="form-control" type="text" required name="refferby_detail[Suburb]" />
                        </div>
                        <div class="col-md-4 col-xs-12">
                        <label>Phone</label>
                        <input class="form-control" required name="refferby_detail[reffredPhone]" />
                        </div>
                        <div class="col-md-4 col-xs-12">
                        <label>Email</label>
                        <input class="form-control" required name="refferby_detail[reffredEmail]" />
                        </div>
                        <div class="col-md-4 col-xs-12">
                        <label>State</label>
                        <input class="form-control"  name="refferby_detail[State]" />
                        </div>
                        <div class="col-md-4 col-xs-12">
                        <label>Zip</label>
                        <input class="form-control"  required name="refferby_detail[reffredZip]" />
                        </div>
                        <div class="col-md-4 col-xs-12">
                        <label>Website</label>
                        <input class="form-control"  required name="refferby_detail[reffredWebsite]" />
                        </div>
                        <p>How did you hear about CPPEx Global?</p>
                        <div id="howYou">
                        <div class="col-md-2 col-xs-6"><input name="hear_about[SocialMedia]" type="checkbox"><label>Social Media</label></div>
                        <div class="col-md-2 col-xs-6"><input name="hear_about[Website]" type="checkbox"><label>Website</label></div>
                        <div class="col-md-2 col-xs-6"><input name="hear_about[Friend]" type="checkbox"><label>Friends</label></div>
                        <div class="col-md-2 col-xs-6"><input name="hear_about[Emails]" type="checkbox"><label>Emails</label></div>
                        <div class="col-md-2 col-xs-6"><input name="hear_about[Events]" type="checkbox"><label>Events</label></div>
                        <div class="col-md-2 col-xs-6"><input name="hear_about[others]" type="checkbox"><label>others</label></div>
                        </div>
                </section>
                    <section id="MEMBERSHIP_DUESDetail" class="formSection">
                        <h4>MEMBERSHIP DUES:</h4>
                        <table class="table tale-striped" style="color: #fff; border:1px solid #999;">
                        <tr bgcolor="#CCCCCC">
                            <td><input name="membership_type" class="big-checkbox" value="4" type="radio"></td>
                            <td>Annual Dues - Corporate Membership:</td>
                            <td>$1,000.00</td>
                        </tr>
                        <tr bgcolor="#999999">
                            <td><input name="membership_type" class="big-checkbox" value="3" type="radio"></td>
                            <td>Annual Dues – Associate Membership: </td>
                            <td>$ 5,00.00</td>
                        </tr>
                        <tr bgcolor="#CCCCCC">
                            <td><input name="membership_type" class="big-checkbox" value="2" type="radio"></td>
                            <td>Annual Dues - Individual Membership:</td>
                            <td>$250.00</td>
                        </tr>
                        <tr bgcolor="#999999">
                            <td><input name="membership_type" class="big-checkbox" value="1" type="radio"></td>
                            <td>Annual Dues - Student Membership:</td>
                            <td>$1,000.00</td>
                        </tr>
                        </table>
                        <input type="hidden" id="mmmbershipID" name="mmmbershipID" value="" />
                         <input type="hidden" id="packageprice" name="packageprice" value="" />
                 <button class="btnCustom pull-right pubservice__42das8672878" type="submit">Registered</button>
                   </section>  
                </div>    
            </form>
            <section id="PaymentDetail" class="formSection" style="display:none;">
                <h4>PAYMENT METHOD:</h4>
                    <div class="col-md-6">
                        <img src="frontend/images/paypal.jpg" class="img-responsive">
                         <div id="paypal-button"></div>
                    
                    </div>
            </section>
			
            </div>
        </section>
        
        
<?php include_once"footer.php"; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    var maxField = 3; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper 
    var fieldHTML = '<div class="fieldNext"><input placeholder="Company Name" type="text" name="job_detail[cname][]" value=""/>  <input type="text" placeholder="Position" name="job_detail[position][]" value=""/>  <input placeholder="Month & Years" type="text" name="job_detail[period][]" value=""/><a href="javascript:void(0);" class="remove_button"> <i class="glyphicon glyphicon-minus"></i></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
	
	<!------------------Form submission -------------------->
	 $('#membsrshipcreate').on("submit",function(e) {
		
		       var radioValue = $("input[name='membership_type']:checked").val();

				if(radioValue){
				 var packagePrice='';
				 var radioVa = radioValue;
						if(radioVa==1)
						{
							packagePrice = <?php echo PACKAGE_1;?>;	 
						}
						else
						if(radioVa==2)
						{
							packagePrice = <?php echo PACKAGE_2;?>;	 
						}
						else
						if(radioVa==3)
						{
							packagePrice = <?php echo PACKAGE_3;?>;  
						}
						else
						if(radioVa==4)
						{
							packagePrice = <?php echo PACKAGE_4;?>;  
						}
						$("#packageprice").val(packagePrice);
				}
				else
				{
					
				  alert('Choose package to buy.');	
				  $("#MEMBERSHIP_DUESDetail").focus();
				  return false;
				}
			
			e.preventDefault();
			var btnc = '.pubservice__42das8672878';
			$(btnc).prop('disabled',true); 
			var formData = new FormData();
			var other_data = $('#membsrshipcreate').serializeArray();
			$.each(other_data,function(key,input)
				{
					formData.append(input.name,input.value);
				}
			);   
		
		

	 
		   $.ajax({
			type: "POST",
			url: "<?php echo base_url().'Membership/Membership_create'; ?>",
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			dataType: 'JSON',
			beforeSend: function() {
			$('#loader').removeClass('hidden');
		//	$('#form_add_update .btn_au').addClass('hidden');
			},
			success: function(data) {
			$('#loader').addClass('hidden');
			$('#form_add_update .btn_au').removeClass('hidden');
			if (data.status == 1)
            {   
				$(btnc).prop('disabled',false); 
				var aMessage = data.message.split('==');
				$("#mmmbershipID").val(aMessage[1]);
				//alert('mmmbershipID'+$("#mmmbershipID").val());
				getMsg('success',aMessage[0]);
				$(".headingform__").hide();
				$("#registrationDetail").hide();
				$("#PaymentDetail").slideDown('slow');
			}
           else if (data.status ==0)
            {  
				$(btnc).prop('disabled',false); 
				getMsg('success',data.message);
			}
			else if (data.status == "validation_error")
            {    
			   $(btnc).prop('disabled',false); 
			    getMsg('error',data.message);
			}
			
           }
	 });

	//ajax end    
    });
	<!-----------------Form sbmissions---------------------->
});


	function getMsg(type,msg)
	{
			var msgg = '<div class="message"><p class="'+type+'">'+msg+'</p></div>';
			$(".page-alert").show();
			$(".page-alert").addClass('error');
			$(".page-alert").html(msgg);
			$(".page-alert").focus();
			setTimeout(function()
			{
				$(".page-alert").fadeOut().html('');
			},10000);	
	}

</script>
<script>
<?php  //$aPaypaladmin = paypalsetting('front');?>
paypal.Button.render({

    env: 'sandbox',

    client: {

        sandbox: 'AdQJBq4-Cq74TG1-2kIOsfGRNY3DhCo8VHSRc_-qMEnjCmbbKttcVdUuDYn-hoRk0CJoB9_SDAQpNdUo',

        production: 'EMF9Tbm8aGZ-bvWvBCrYXAXXwaXVZaV_h2cRXN5yTbqubIBKrFp9Mqi7lld5MoTonUbk9vvFKlJmUre-'

    },

    // Customize button (optional)

    locale: 'en_US',

    style: {

        size: 'small',

        color: 'gold',

        shape: 'pill',

    },

    // Set up a payment

    payment: function (data, actions) {

        return actions.payment.create({

            transactions: [{

                amount: {

                    total: $("#packageprice").val(),

                    currency: 'USD'

                }

            }]

      });

    },

    // Execute the payment

    onAuthorize: function (data, actions) {

        return actions.payment.execute()

        .then(function () {

            // Show a confirmation message to the buyer

            //window.alert('Thank you for your purchase!');

            

            // Redirect to the payment process page

			
			var membershipID = $("#mmmbershipID").val();

			 window.location = "<?php echo base_url();?>membership/paymentprocessing?paymentID="+data.paymentID+"&token="+data.paymentToken+"&payerID="+data.payerID+"&membershipID_43782_noncceekey="+membershipID;

		

			


        });

    }

}, '#paypal-button');







</script>