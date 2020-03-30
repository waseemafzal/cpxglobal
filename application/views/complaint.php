<?php 
include_once"header.php";
?>
<style>
.Section>h3,h3{    color: #fff !important;
    text-align: center;
    background: #3f4045;
    padding: 7px 6px;
    font-size: 20px;
    clear: both;
    display: inline-block;
    width: 100%;
	}
input[type="radio"], input[type="checkbox"] {
	
   width: 22px;
    height: 23px;
}	
.counters{
	width: 30px;
	text-align:center;
   
	}
	.table {
    width: 100%;
    margin-bottom: 20px;
    border: 2px solid lightgray;
}
</style>
        <section id="sub-header" style="background:url(frontend/complaint.jpg);background-size: 100%;background-position: 50% 50%;">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
            <h1>complaint 
            </h1>
</div>
            </div><!-- End row -->
        </div><!-- End container -->
      </section>
      <div class="clearfix">&nbsp;</div>
<section class="vc_rows wpb_rows vc_rows-fluid vc_custom_1488790902404 " id="main-features">
            <div class="container">

              
              <form id="form1" name="form_add_update" method="post" action="">
               		 <section id="personalDetail" class="formSection">
                <div class="alert hidden">Thank you very much for completing this form. We will be in touch with you shortly.</div>
                <p>We are sorry that you are unhappy with our products or services. Letting us know means we can record your complaint and work with you to understand what’s happened and how we can put things right. You can complete our Online Complaint form and we will contact you by email, phone or post to resolve your Complaint:</p>
                <p>This form is designed to capture your complaint as quickly and as easily as possible and will be passed directly to our Complaints Team to investigate your issue and try to put things right. There are some key pieces of information we need in order to do this – Please complete the following fields in the form to submit your complaints and note all fields marked with * must be completed.
                </p>
                <p><i class="fa fa-lock"></i> This is a secure form and will be passed directly to our Complaints Team</p>
                <h3>Personal  Detail</h3>
              
                <div class="col-md-4 col-xs-12">
                <label>Title</label>
                <input class="form-control"  required="required" name="title" />
                </div>
                <div class="col-md-4 col-xs-12">
                <label>Fist Name</label>
                <input class="form-control"  required="required" name="first_name" />
                </div>
                <div class="col-md-4 col-xs-12">
                <label>Last Name</label>
                <input class="form-control" required name="last_name" />
                </div>
                <div class="col-md-4 col-xs-12">
                <label>Address</label>
                <input class="form-control" required name="other_address[address]" />
                </div>
                <div class="col-md-4 col-xs-12">
                <label>City</label>
                <input class="form-control" required  name="other_address[city]" />
                </div>
                <div class="col-md-4 col-xs-12">
                <label>State</label>
                <input class="form-control" required  name="other_address[state]"  />
                </div>
                <div class="col-md-4 col-xs-12">
                <label>Zipcode</label>
                <input class="form-control" required  name="other_address[zipcode]" />
                </div>
                <div class="col-md-4 col-xs-12">
                <label>Email</label>
                <input class="form-control" type="email" required name="email" />
                </div>
                <div class="col-md-4 col-xs-12">
                <label>Phone</label>
                <input class="form-control" required name="phone" />
                </div>
                <div class="col-md-4 col-xs-12">
                <label>Product / service involved</label>
                <input class="form-control"   name="other_address[product_service_involved]" />
                </div>
                <div class="col-md-4 col-xs-12">
                <label>Date of training/consultancy/award</label>
                <input class="form-control" type="date"  name="other_address[dob]"/>
                </div>
                <div class="col-md-4 col-xs-12">
                <label>Have you contacted the regional representative?
                </label>
                <input class="form-control" type="text" required  name="other_address[contacted]"/>
                </div>
                <div class="col-md-12 col-xs-12">
                <label>What do you think should be done to resolve your complaint fairly?
                </label>
                <input class="form-control" type="text" required   name="other_address[think]"/>
                </div>
                <div class="col-md-12 col-xs-12">
                <label>Summary of your complaint
                </label>
                <textarea class="form-control" name="other_address[summary]" ></textarea>
                </div>
                <div class="col-md-6 col-xs-12">
                <label>Choose file
                </label>
                <input class="form-control" type="file"  name="image" id="image"/><br>
                
              
                
              
                    <div class="page-alert" style="display: block;"></div>
                   
    


                </div>
                 <div class="col-md-12 col-xs-12">
                  <input type="checkbox" required="required" ><span  style="            position: absolute;
    top: 18%;"> I understand and agree with all terms and conditions of CPPEx Global complaints handling policy.</span>
               
                </div>
               
                <div class="col-md-12 col-xs-12">
                 <p>&nbsp;</p>
               <!-- <button     name="btnComplaint" class="btn btn-info btn-large" type="submit" >Submit</button>-->
                  <input type="submit" class="btn btn-info btn-large" value="Submit">
                </div>
                </section>
                </form>

          

            </div>
        </section>
        
        
<?php include_once"footer.php"; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
function showAlert(){
	
	}
	
	

  /**********************************save************************************/
	 $('#form1').on("submit",function(e) {
		e.preventDefault();
		
		var formData = new FormData();
		var other_data = $('#form1').serializeArray();
		$.each(other_data,function(key,input)
		{
			formData.append(input.name,input.value);
		});  
		 formData.append("image", document.getElementById('image').files[0]);	 
	// ajax start
		    $.ajax({
			type: "POST",
			url: "<?php echo base_url().'contact/saveComplaintForm'; ?>",
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
			//$('#form_add_update .btn_au').removeClass('hidden');
			//alert(data.status);
			//var obj = jQuery.parseJSON(data);
            if (data.status == 1)
            {   
			  //$("#mmmbershipID").val(aMessage[1]);
				//alert('mmmbershipID'+$("#mmmbershipID").val());
				getMsg('success',data.message);
				//$("#registrationDetail").hide();
				//$("#PaymentDetail").slideDown('slow');
            }
           else if (data.status ==0)
            {  
			  getMsg('error',data.message);
            }
			
			
           }
	 });

	//ajax end    
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
</script>