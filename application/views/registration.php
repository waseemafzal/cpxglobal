<?php 
include_once"header.php";
?>
<style>
.Section>h3{color: #000!important;
    text-align: center;
    background: #9CC2E5;
    padding: 7px 6px;
    font-size: 20px;
	clear:both;
	}
	
</style>
        <section id="sub-header" style="background:url(frontend/feedback.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
            <h1>Registration
            </h1>
</div>
            </div><!-- End row -->
        </div><!-- End container -->
      </section>
      <div class="clearfix">&nbsp;</div>
<section class="vc_rows wpb_rows vc_rows-fluid vc_custom_1488790902404 " id="main-features">
            <div class="container">
            <form id="form_add_update" name="form_add_update" method="post" action="">
<section id="personalDetail" class="Section">
<h3>Personal Detail
</h3>
<div class="col-md-12"><p>Name to appear on the certificate, please provide correct and clearly
</p></div>
<div class="col-md-4 col-xs-12">
<label> Name:*</label>
<input class="form-control" required name="Name" />
</div>

<div class="col-md-4 col-xs-12">
<label>Email</label>
<input class="form-control" type="email" required name="email" />
</div>
<div class="col-md-4 col-xs-12">
<label>Job Title:*</label>
<input class="form-control" required name="company" />
</div>
<div class="col-md-4 col-xs-12">
<label>Phone</label>
<input type="text" class="form-control"  required="required" name="phone" />
</div>
<div class="col-md-4 col-xs-6" >
<label >ID no </label> 
<input  class="form-control"  required name="idno" /> -  
</div>

<div class="col-md-4 col-xs-12">
<label> Nationality</label>
<input class="form-control" required name="nationality" />
</div>

<h3>Company detail</h3>
<div class="col-md-4 col-xs-12">
<label>Company</label>
<input type="text" class="form-control"  required="required" name="Company" />
</div>
<div class="col-md-4 col-xs-12">
<label>Phone</label>
<input type="text" class="form-control"  required="required" name="Subject" />
</div>
<div class="col-md-4 col-xs-12">
<label>Address</label>
<input type="text" class="form-control"  required="required" name="address" />
</div>
<div class="col-md-4 col-xs-12">
<label>Country</label>
<input type="text" class="form-control"  required="required" name="country" />
</div>
<h3>Finance Department detail</h3>
<div class="col-md-6 col-xs-12">
<label>Name</label>
<input type="text" class="form-control"  required="required" name="depName" />
</div>
<div class="col-md-6 col-xs-12">
<label>Phone</label>
<input type="text" class="form-control"  required="required" name="depPhone" />
</div>
<div class="col-md-6 col-xs-12">
<label>Email</label>
<input type="text" class="form-control"  required="required" name="depEmail" />
</div>
<div class="col-md-6 col-xs-12">
<label>Position</label>
<input type="text" class="form-control"  required="required" name="depPosition" />
</div>
<section id="PaymentDetail" class="formSection" style="display:none;">
                <h2>PAYMENT METHOD:</h2>
                    <div class="col-md-6">
                        <img src="frontend/images/paypal.jpg" class="img-responsive">
                         <div id="paypal-button"></div>
                    
                    </div>
            </section>

<div class="col-md-12 col-xs-12">
<center><input type="submit" class="btn btn-info" value="Submit"></center>
</div>
</section>

</form>
            </div>
        </section>
  
    <div id="Modal" class="modal fade " role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header model-header-message">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
     <div class="modal-body">
   <p>  Dear participant,</p>
 <p> Thanks for the feedback on your experience with our training management team. We sincerely appreciate your insight because it helps us build a better customer experience.
If you have any more questions, comments, or concerns or compliments, please feel welcome to reach back out as we would be more than happy to assist you!</p>
<p>Best Regards,<br>
CPPEx Global</p>

	</div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div> 
        
<?php include_once"footer.php"; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  /**********************************save************************************/
	 $('#form_add_update').on("submit",function(e) {
		e.preventDefault();
		
		 var formData = new FormData();
	var other_data = $('#form_add_update').serializeArray();
    $.each(other_data,function(key,input){
        formData.append(input.name,input.value);
    });   
	// ajax start
		    $.ajax({
			type: "POST",
			url: "<?php echo base_url().'contact/saveFeedback'; ?>",
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
			$("#Modal").modal('show');
				setTimeout(function(){
				$("#Modal").modal('hide');
				},10000);
            }
           else if (data.status ==0)
            {  
			$(".alert").addClass('alert-success');
				$(".alert").html(data.message);
				$(".alert").removeClass('hidden');
				setTimeout(function(){
				//window.location=data.redirect;
				},1000);
            }
			
			
           }
	 });

	//ajax end    
    });

</script>