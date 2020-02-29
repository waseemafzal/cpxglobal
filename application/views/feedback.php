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
	
</style>
        <section id="sub-header" style="background:url(frontend/feedback.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
            <h1>Feedback
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
<h3>Participant's details</h3>

<div class="col-md-4 col-xs-12">
<label>Date</label>
<input type="date" class="form-control"  required="required" name="date" />
</div>
<div class="col-md-4 col-xs-6" style="margin-top:30px">
<label class="pull-left">Timing </label> 
<input width="30" type="time"  required name="name" /> -  
<input width="30"  type="time" required name="name" />
</div>
<div class="col-md-4 col-xs-12">
<label>Email</label>
<input class="form-control" type="email" required name="email" />
</div>
<div class="col-md-4 col-xs-12">
<label>Employee’s Name:*</label>
<input class="form-control" required name="company" />
</div>
<div class="col-md-4 col-xs-12">
<label>Job Title:*</label>
<input class="form-control" required name="company" />
</div>
<div class="col-md-4 col-xs-12">
<label> Mobile</label>
<input class="form-control" required name="phone" />
</div>
<div class="col-md-12 col-xs-12">
<label> Company Name</label>
<input class="form-control" required name="phone" />
</div>
<h3>Product details</h3>
<div class="col-md-4 col-xs-12">
<label>Product Services</label>
<select class="form-control">
<option value="Training">Training</option>
<option value="Consultancy">Consultancy</option>
<option value="Certification">Certification</option>
<option value="Membership">Membership</option>
<option value="Award">Award</option>
</select>
</div>
<div class="col-md-4 col-xs-12">
<label>Trainers Name</label>
<input type="text" class="form-control"  required="required" name="trainersName" />
</div>
<div class="col-md-4 col-xs-12">
<label>Subject / Title</label>
<input type="text" class="form-control"  required="required" name="Subject" />
</div>
 <h3>Instructions</h3>

<p>Please indicate your impressson of the items listed below, if it was highly favourable, choose 5. If not so favorable, give your opinion-choose from 4 to 1</p>
 <!--<h3>Training Materials </h3>-->
<table class="table">
<tr>
    <th>Training Materials</th>
    <th>1</th>
    <th>2</th>
    <th>3</th>
    <th>4</th>
</tr>
<tr>
    <td>The training met my expectations.</td>
    <td><input type="radio" name="expectations" value="1"></td>
    <td><input type="radio" name="expectations" value="2"></td>
    <td><input type="radio" name="expectations" value="3"></td>
    <td><input type="radio" name="expectations" value="4"></td>
</tr>
<tr>
    <td>I will be able to apply the knowledge learned.</td>
    <td><input type="radio" name="learned" value="1"></td>
    <td><input type="radio" name="learned" value="2"></td>
    <td><input type="radio" name="learned" value="3"></td>
    <td><input type="radio" name="learned" value="4"></td>
</tr>
<tr>
    <td>The training objectives for each topic were identified and followed.</td>
    <td><input type="radio" name="expectations" value="1"></td>
    <td><input type="radio" name="expectations" value="2"></td>
    <td><input type="radio" name="expectations" value="3"></td>
    <td><input type="radio" name="expectations" value="4"></td>
</tr>
<tr>
    <td>The curriculum content was organized and easy to follow.</td>
    <td><input type="radio" name="content" value="1"></td>
    <td><input type="radio" name="content" value="2"></td>
    <td><input type="radio" name="content" value="3"></td>
    <td><input type="radio" name="content" value="4"></td>
</tr>
<tr>
    <td>The materials distributed were pertinent and useful.
</td>
    <td><input type="radio" name="useful" value="1"></td>
    <td><input type="radio" name="useful" value="2"></td>
    <td><input type="radio" name="useful" value="3"></td>
    <td><input type="radio" name="useful" value="4"></td>
</tr>
</table>
<table class="table">
<tr>
    <th>DEPARTMENT | INSTRUCTOR</th>
    <th>1</th>
    <th>2</th>
    <th>3</th>
    <th>4</th>
</tr>
<tr>
    <td>The presenters were knowledgeable about the topics.
</td>
    <td><input type="radio" name="knowledgeable" value="1"></td>
    <td><input type="radio" name="knowledgeable" value="2"></td>
    <td><input type="radio" name="knowledgeable" value="3"></td>
    <td><input type="radio" name="knowledgeable" value="4"></td>
</tr>
<tr>
    <td>The presentations were interesting and practical.</td>
    <td><input type="radio" name="presentations" value="1"></td>
    <td><input type="radio" name="presentations" value="2"></td>
    <td><input type="radio" name="presentations" value="3"></td>
    <td><input type="radio" name="presentations" value="4"></td>
</tr>
<tr>
    <td>The presenters met the training objectives & address attendees concerns.
</td>
    <td><input type="radio" name="concerns" value="1"></td>
    <td><input type="radio" name="concerns" value="2"></td>
    <td><input type="radio" name="concerns" value="3"></td>
    <td><input type="radio" name="concerns" value="4"></td>
</tr>
<tr>
    <td> Class participation and interaction were encouraged.</td>
    <td><input type="radio" name="encouraged" value="1"></td>
    <td><input type="radio" name="encouraged" value="2"></td>
    <td><input type="radio" name="encouraged" value="3"></td>
    <td><input type="radio" name="encouraged" value="4"></td>
</tr>
<tr>
    <td>Adequate time was provided for attendee questions.
</td>
    <td><input type="radio" name="adequatetime" value="1"></td>
    <td><input type="radio" name="adequatetime" value="2"></td>
    <td><input type="radio" name="adequatetime" value="3"></td>
    <td><input type="radio" name="adequatetime" value="4"></td>
</tr>
</table>
<table class="table">
<tr>
    <th>VENUE, PROCEDURE & INFORMATION</th>
    <th>1</th>
    <th>2</th>
    <th>3</th>
    <th>4</th>
</tr>
<tr>
    <td>Did you receive timely, advance training information?
</td>
    <td><input type="radio" name="timelyinformation" value="1"></td>
    <td><input type="radio" name="timelyinformation" value="2"></td>
    <td><input type="radio" name="timelyinformation" value="3"></td>
    <td><input type="radio" name="timelyinformation" value="4"></td>
</tr>
<tr>
    <td>The time allotted for the training was sufficient.</td>
    <td><input type="radio" name="sufficienttime" value="1"></td>
    <td><input type="radio" name="sufficienttime" value="2"></td>
    <td><input type="radio" name="sufficienttime" value="3"></td>
    <td><input type="radio" name="sufficienttime" value="4"></td>
</tr>
<tr>
    <td>Was adequate time allowed for breaks and meals?
</td>
    <td><input type="radio" name="timeforbreaks" value="1"></td>
    <td><input type="radio" name="timeforbreaks" value="2"></td>
    <td><input type="radio" name="timeforbreaks" value="3"></td>
    <td><input type="radio" name="timeforbreaks" value="4"></td>
</tr>
<tr>
    <td> The meeting room and facilities were adequate & comfortable?</td>
    <td><input type="radio" name="roomfacilities" value="1"></td>
    <td><input type="radio" name="roomfacilities" value="2"></td>
    <td><input type="radio" name="roomfacilities" value="3"></td>
    <td><input type="radio" name="roomfacilities" value="4"></td>
</tr>
<tr>
    <td>This training is worthwhile and should be conducted on a regular basis.
</td>
    <td><input type="radio" name="regulartraining" value="1"></td>
    <td><input type="radio" name="regulartraining" value="2"></td>
    <td><input type="radio" name="regulartraining" value="3"></td>
    <td><input type="radio" name="regulartraining" value="4"></td>
</tr>
</table>
<div class="col-md-6 col-xs-12">
    <label>What did you like most about this training?</label>
    <input class="form-control"  required="required" name="mostlike" />
</div>
<div class="col-md-6 col-xs-12">
    <label>What aspects of the training could be improved?</label>
    <input class="form-control"  required="required" name="improvementneeded" />
</div>
<div class="col-md-12 col-xs-12">
    <label>What additional technical training would you like to have in the future?
</label>
    <input class="form-control"  required="required" name="futuretraining" />
</div>
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