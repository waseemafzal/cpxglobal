<?php 
include_once"header.php";
?>
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
            <form id="form1" name="form1" method="post" action="">
<section id="personalDetail" class="formSection">
<div class="alert hidden">Thank you very much for completing this form. We will be in touch with you shortly.</div>
<p>We are sorry that you are unhappy with our products or services. Letting us know means we can record your complaint and work with you to understand what’s happened and how we can put things right. You can complete our Online Complaint form and we will contact you by email, phone or post to resolve your Complaint:</p>
<p>This form is designed to capture your complaint as quickly and as easily as possible and will be passed directly to our Complaints Team to investigate your issue and try to put things right. There are some key pieces of information we need in order to do this – Please complete the following fields in the form to submit your complaints and note all fields marked with * must be completed.
</p>
<p><i class="fa fa-lock"></i> This is a secure form and will be passed directly to our Complaints Team</p>
<div class="col-md-4 col-xs-12">
<label>Title</label>
<input class="form-control"  required="required" name="Title" />
</div>
<div class="col-md-4 col-xs-12">
<label>Fist Name</label>
<input class="form-control"  required="required" name="fname" />
</div>
<div class="col-md-4 col-xs-12">
<label>Last Name</label>
<input class="form-control" required name="lname" />
</div>
<div class="col-md-4 col-xs-12">
<label>Address</label>
<input class="form-control" required name="sddress" />
</div>
<div class="col-md-4 col-xs-12">
<label>City</label>
<input class="form-control" required name="city" />
</div>
<div class="col-md-4 col-xs-12">
<label>State</label>
<input class="form-control" required name="state" />
</div>
<div class="col-md-4 col-xs-12">
<label>Zipcode</label>
<input class="form-control" required name="zipcode" />
</div>
<div class="col-md-4 col-xs-12">
<label>Email</label>
<input class="form-control" type="email" required name="email" />
</div>
<div class="col-md-4 col-xs-12">
<label>Phone</label>
<input class="form-control" required name="Phone" />
</div>
<div class="col-md-4 col-xs-12">
<label>Product / service involved</label>
<input class="form-control"  name="fax" />
</div>
<div class="col-md-4 col-xs-12">
<label>Date of training/consultancy/award</label>
<input class="form-control" type="date" required name="dob" />
</div>
<div class="col-md-4 col-xs-12">
<label>Have you contacted the regional representative?
</label>
<input class="form-control" type="text" required name="contacted" />
</div>
<div class="col-md-12 col-xs-12">
<label>What do you think should be done to resolve your complaint fairly?
</label>
<input class="form-control" type="text" required name="think" />
</div>
<div class="col-md-12 col-xs-12">
<label>Summary of your complaint
</label>
<textarea class="form-control" name="Summary"></textarea>
</div>
<div class="col-md-6 col-xs-12">
<label>Choose file
</label>
<input class="form-control" type="file"  name="file" /><br>

<input type="checkbox">I understand and agree with all terms and conditions of CPPEx Global complaints handling policy.
</div>
<div class="col-md-12 col-xs-12">

<button  onClick="showAlert()"   name="btnComplaint" class="btn btn-info btn-large" >Submit</button>
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
</script>