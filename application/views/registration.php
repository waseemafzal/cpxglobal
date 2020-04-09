<?php 
include_once"header.php";
?>
<style>
.Section h3{    color: #fff !important;
    text-align: center;
    background: #3f4045;
    padding: 7px 6px;
    font-size: 20px;
    clear: both;
    display: inline-block;
    width: 100%;
	text-transform: uppercase;
	}
	input.form-control, textarea.form-control{height: auto;
    margin: 0;
    padding: 5px 10px;}
	.table td{ margin:0; padding:0}
	thead>tr>td{ text-transform:capitalize;}
	.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
 
     border-top: none !important; 
}
</style>
        <section id="sub-header" style="background:url(frontend/registration.jpg)">
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
          <div class="col-md-12"> <h4 class="headingform__"><?php echo strtoupper('Online registration form');?></h4></div>
            <form id="membsrshipcreate" name="form_add_update" method="post" action="">
             <div class="page-alert" style="display: block;"> </div>
				<section id="personalDetail" class="Section">
<div class="col-xs-12"><h3>Personal Detail <span></span>
</h3></div>
<div class="col-md-12">
<div class="table-responsive">
<table class="table" style="width:100%">
<thead>
<tr>
 
 <td>Name</td>
 <td>Email</td>
 <td>Job Title</td>
 <td>Phone</td>
 <td>ID No</td>
 <td>Nationality </td>
 <!--<td><a class="btn btn-info add_button"><i class="fa fa-plus"></i> Add More</a>
</td>-->
</tr>

</thead>
<tbody class="field_wrapper">
<tr>

 <td><input   class="form-control"required name="personal_detail[name][]" /></td>
 <td><input   class="form-control"type="email" required name="personal_detail[email][]" /></td>
 <td><input   class="form-control"required name="personal_detail[job_title][]" /></td>
 <td><input class="form-control" type="text"    required="required" name="personal_detail[phone][]" /></td>
 <td><input   class="form-control"  required name="personal_detail[id_no][]" /></td>
 <td><input   class="form-control"required name="personal_detail[nationality][]" /></td>

</tr>
<tr>

</tbody>
</table>
<a class="btnCustom add_button "><i class="fa fa-plus"></i> Add More</a>
</div>
</div>




<div class="col-xs-12"><h3>Company details</h3></div>
<div class="col-md-4 col-xs-12">
<label>Company <span class="text-danger">*</span></label>
<input type="text" class="form-control"  required="required" name="company_detail[name]" />
</div>
<div class="col-md-4 col-xs-12">
<label>Phone <span class="text-danger">*</span></label>
<input type="text" class="form-control"  required="required" name="company_detail[phone]" />
</div>
<div class="col-md-4 col-xs-12">
<label>Address</label>
<input type="text" class="form-control"  required="required" name="company_detail[address]" />
</div>
<div class="col-md-4 col-xs-12">
<label>Country</label>
<input type="text" class="form-control"  required="required" name="company_detail[country]" />
</div>
<div class="col-xs-12"><h3>Finance Department details</h3></div>
<div class="col-md-6 col-xs-12"> 



<label>Name</label>
<input type="text" class="form-control"  required="required" name="finanace_detail[name]" />
</div>
<div class="col-md-6 col-xs-12">
<label>Phone</label>
<input type="text" class="form-control"  required="required" name="finanace_detail[phone]" />
</div>
<div class="col-md-6 col-xs-12">
<label>Email</label>
<input type="text" class="form-control"  required="required" name="finanace_detail[email]" />
</div>
<div class="col-md-6 col-xs-12">
<label>Position</label>
<input type="text" class="form-control"  required="required" name="finanace_detail[position]" />
</div>
<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>
<div class="col-xs-12">
<table style="text-align:center;border: 1px solid lightgray;" align="center" class="table  table-border">
<thead>
	<tr >
    <th  bgcolor="#CCCCCC" colspan="2" style="text-align:center" >COURSE FEES: $<?php echo nmf(COURSE_PRICE);?></td>
    </tr>
    <tr>
    <th style="text-align:center"  colspan="2" align="center">
Group Discount
</td>
    </tr>
</thead>
<tbody>
<tr>
<td>2-4 Delegates
</td>
<td>
15%
Discount
</td>
</tr>
<tr>
<td>5-10 Delegates
</td>
<td>
25%
Discount
</td>
</tr>
</tbody>
<tfoot>
<tr>
<td colspan="2" style="font-style:italic">All discounts to group discount are given on original course fee excluding VAT.</td>
</tr>
</tfoot>
</table>
<div class="col-md-12 Section" style="border:1px solid lightgray;margin: 0 0 10px 0;padding: 10px 10px;">
<div class="col-xs-12">
<h3>Payment Terms:
</h3></div>
<ul>
	<li>100% payment of the amount in maximum 15 days upon the receipt of invoice.</li>
	<li>The payment shall be conducted in credit card, cash or direct bank transfer excluding VAT.</li>
	<li>All cancellation shall be done in written form</li>
	<li>No cancellation fees shall be liable if the cancellation is done 15 days earlier of the training session.</li>
	<li>50% cancellation fees shall be liable if the cancellation is done 07 days earlier of the training session.</li>
	<li>100% cancellation fees shall be liable if the cancellation is filed 03 days earlier of the training session.</li>
	<li>If the training session is cancelled by CPPEx Global due to some unforeseen circumstance, the paid amount will be 100% returned to clients back within 48 working hours or customer can use this fees for next coming any training session.</li>
	<li>Selection of trainer, course contents and venue shall be at the discretion of CPPEx Global Or details mentioned in the marketing materials.</li>
	<li>Complaints related to trainer, contents, venue or services shall be accepted in written form and handle by CPPEx Global complaints management team.</li>
</ul>

<!--<div class="col-xs-12"><input type="checkbox" required="required" value="1"> I have read, understand and agreed to the above</div>-->
<div class="col-md-12 col-xs-12" style="
    margin: 18px 0 0 0;
">
                  <input type="checkbox" required="required" style="
    float: left;
"><span style="
    /* top: 7%; */
    /* left: 3%; */
    margin: 3px 0  0 0;
    display: inline;
    ">  I have read,
understand and agreed with all CPPEx Global terms and conditions.</span>
               
                </div>
</div>
</div>

<div class="col-md-12 col-xs-12">
<center>

 <div  style="display:" id="___----nonounc____"></div>
  <div  style="display:" id="___----nonounc____R"></div>
<button class="btnCustom pull-right pubservice__42das8672878" type="submit">Submit</button>

</center>
</div>
</section>

			 </form>
             
             <section id="PaymentDetail" class="formSection" style="display:none;">
            <div class="col-xs-12">    <h4>PAYMENT METHOD:</h4></div>
                    <div class="col-md-6">
                        <img src="frontend/images/paypal.jpg" class="img-responsive">
                         <div id="paypal-button"></div>
                    
                    </div>
            </section>
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
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script type="text/javascript">
  /**********************************save************************************/

 var x = 2; //Initial field counter is 1
   
$(document).ready(function(){
    var maxField = 11; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper 
     //New input field html 
    
    //Once add button is clicked
    $(addButton).click(function(){ 






        //Check maximum number of input fields
		var fieldHTML = '<tr id="row_'+x+'"><td><input   class="form-control"required name="personal_detail[name][]" /></td><td><input class="form-control"type="email" required name="personal_detail[email][]" /></td><td><input   class="form-control"required name="personal_detail[job_title][]" /></td><td><input type="text" class="form-control"   required="required" name="personal_detail[phone][]" /></td><td><input   class="form-control"  required name="personal_detail[id_no][]" /></td><td><input   class="form-control"required name="personal_detail[nationality][]" /></td><td><a href="javascript:void(0);" onClick="hideme('+x+')"> <i class="glyphicon glyphicon-minus"></i></a></td></tr>';
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
       
	   
	    
		<!------------------Form submission -------------------->
	 $('#membsrshipcreate').on("submit",function(e) {
			
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
			url: "<?php echo base_url().'Contact/registration_create'; ?>",
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
				var messsage = data.message;
				$("#___----nonounc____").html(data.bag.price_now);
				$("#___----nonounc____R").html(data.bag.register_id);
				//alert('mmmbershipID'+$("#mmmbershipID").val());
				getMsg('success',messsage); 
				$("#personalDetail").hide();
				$(".headingform__").hide();
				
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
function hideme(id){
		$('#row_'+id).remove();
		x--;
		}
    
</script>
<script>
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

                    total: $("#___----nonounc____").html(),

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

			
			var nonucerK = $("#___----nonounc____R").html();

			 window.location = "<?php echo base_url();?>contact/paymentprocessing?paymentID="+data.paymentID+"&token="+data.paymentToken+"&payerID="+data.payerID+"&RegisetrKey_43782_noncceekey="+nonucerK;

		

			


        });

    }

}, '#paypal-button');







</script>