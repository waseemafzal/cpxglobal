<?php 
include_once"header.php";
?>
<style>
.Section>h3{    color: #000!important;
    text-align: center;
    background: #f30100;
    padding: 7px 6px;
    font-size: 20px;
    clear: both;
    display: inline-block;
    width: 100%;
	}
	input.form-control, textarea.form-control{height: auto;
    margin: 0;
    padding: 5px 10px;}
	.table td{ margin:0; padding:0}
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
            <h4>Online registration form</h4>
            <form id="form_add_update" name="form_add_update" method="post" action="">
<section id="personalDetail" class="Section">
<h3>Personal Detail <span>Name to appear on the certificate, please provide correct and clearly</span>
</h3>
<div class="col-md-12">
<div class="table-responsive">
<table class="table" style="width:100%">
<thead>
<tr>
 <td>#</td>
 <td>Name</td>
 <td>Email</td>
 <td>Job Title</td>
 <td>Phone</td>
 <td>ID No</td>
 <td>Nationality </td>
 <td><a class="btn btn-info add_button"><i class="fa fa-plus"></i> Add More</a>
</td>
</tr>

</thead>
<tbody class="field_wrapper">
<tr>
<td>1</td>
 <td><input   class="form-control"required name="Name[]" /><span class="text-danger">*</span></td>
 <td><input   class="form-control"type="email" required name="email[]" /><span class="text-danger">*</span></td>
 <td><input   class="form-control"required name="company[]" /><span class="text-danger">*</span></td>
 <td><input class="form-control" type="text"    required="required" name="phone" /><span class="text-danger">*</span></td>
 <td><input   class="form-control"  required name="idno[]" /><span class="text-danger">*</span></td>
 <td><input   class="form-control"required name="nationality[]" /><span class="text-danger">*</span></td>
 <td>&nbsp;</td>
</tr>
<tr>

</tbody>
</table>

</div>
</div>
<h3>Company detail</h3>
<div class="col-md-4 col-xs-12">
<label>Company <span class="text-danger">*</span></label>
<input type="text" class="form-control"  required="required" name="Company" />
</div>
<div class="col-md-4 col-xs-12">
<label>Phone <span class="text-danger">*</span></label>
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
<div class="clearfix">&nbsp;</div>
<table style="text-align:center;border: 1px solid lightgray;" align="center" class="table  table-border">
<thead>
	<tr >
    <th  bgcolor="#CCCCCC" colspan="2" style="text-align:center" >COURSE FEES: $4,000</td>
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

<h3>Payment Terms:
</h3>
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

<div class="col-xs-12"><input type="checkbox"> I have read, understand and agreed to the above</div>
</div>
<section id="PaymentDetail" class="formSection" style="display:none" >
                <h2>PAYMENT METHOD:</h2>
                    <div class="col-md-6">
                        <img src="frontend/images/paypal.jpg" class="img-responsive">
                         <div id="paypal-button"></div>
                    
                    </div>
            </section>

<div class="col-md-12 col-xs-12">
<center><input type="submit" class="btnCustom" value="Submit"></center>
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
 var x = 2; //Initial field counter is 1
   
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper 
     //New input field html 
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
		var fieldHTML = '<tr id="row_'+x+'"><td>'+x+'</td><td><input   class="form-control"required name="Name[]" /></td><td><input class="form-control"type="email" required name="email[]" /></td><td><input   class="form-control"required name="company[]" /></td><td><input type="text" class="form-control"   required="required" name="phone" /></td><td><input   class="form-control"  required name="idno[]" /></td><td><input   class="form-control"required name="nationality[]" /></td><td><a href="javascript:void(0);" onClick="hideme('+x+')"> <i class="glyphicon glyphicon-minus"></i></a></td></tr>';
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    
});	
function hideme(id){
		$('#row_'+id).remove();
		x--;
		}
    
</script>