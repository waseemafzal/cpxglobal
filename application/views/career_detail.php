<?php 
include_once"header.php";
if(isset($row)){ 

$post_banner=base_url().'uploads/default_banner.jpg';}

?>
<style>
#tintBG{
	
   
}#title{
    background: #0000009e;
    display: inline-block;
    padding: 1% 5%;
}
.jobinfo>p{ margin-bottom:0px;}
</style>
        <section id="sub-header" style="background:url('<?=base_url()?>frontend/Career.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <h1>career
</h1>
</div>
            </div><!-- End row -->
        </div><!-- End container -->
      </section>
      <div class="clearfix">&nbsp;</div>
<section class="vc_rows wpb_rows vc_rows-fluid vc_custom_1488790902404 " id="main-features">
            <div class="container">
            <div class="jobinfo">
            <h4>  <?php 
                if(isset($row)){ 
                echo $row->post_title;
                } 
                ?></h4>
            <p><b>Date </b> : <?php 
                if(isset($row)){ 
                echo date('F , j ,Y',strtotime($row->created_on));
                } 
                ?></p>
            <p><b>Location </b> :  <?php 
                if(isset($row)){ 
                echo $row->company_location;
                } 
                ?></p>
            <p><b>Company </b> : CPPEx Global</p>
            
            <p><b> Reporting </b> :  <?php 
                if(isset($row)){ 
                echo $row->short_heading;
                } 
                ?></p>
            </div>
            <div class="clearfix">&nbsp;</div>
				<?php 
                if(isset($row)){ 
                echo $row->post_description;
                } 
                ?>
          <div class="clearfix">&nbsp;</div>
<a id="btnApply" class="btnCustom">APPLY NOW</a>
              </div>
        </section>
        
        
<?php include_once"footer.php"; ?>
<!-- Latest compiled and minified CSS -->
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

	$('table').addClass('table table-striped'); 
});


$('#btnApply').click(function() {
    $('#ApplyModal').modal('show');
});
/**********************************save************************************/
 
</script>
<div id="ApplyModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="padding-left:3%">Apply on job</h4>
      </div>
           <form id="form_add_update" method="post" name="form_add_update" role="form">
        
      <div class="modal-body">
       
             <div class="col-xs-12"><div class="alert hidden"></div></div>
        <div class="col-xs-12 col-md-6"><label > Name: <span class="text-danger">*</span> </label>
        <input type="text" class="form-control" name="name" >
        </div>
        <div class="col-xs-12 col-md-6"><label> Email: <span class="text-danger">*</span> </label>
          <input type="text" class="form-control" name="email" >
        </div>
        <div class="col-xs-12 col-md-12">
        
                      <label class="sentence" > Please explain yourself: <span class="text-danger">*</span> </label>
                       
<textarea class="form-control" rows="8" id="purposal" name="purposal"></textarea>                    </div>
      <div class="clearfix">&nbsp;</div>
      
      <div class="col-xs-12 col-md-12">
                      <label>  Attach your CV <span class="text-danger">*</span></label>
                   <input type="file" name="file" id="file"  />
                   <input type="hidden" name="job_id" value="<?=end($this->uri->segment_array());?>"  />
                   
                   
                  
</div>
 <div class="clearfix">&nbsp;</div>
        
      </div>
      <div class="modal-footer">
                             <button type="button"  onClick="return mySubmitFunction(event)"  class="btnCustom pull-right">Submit <span class="btn_au hidden"><i class="fa fa-cog fa-spin" style="font-size:24px"></i></span></button>

      </div>
      </form>
    </div>

  </div>
</div>
<script type="text/javascript">
function mySubmitFunction(e){

		e.preventDefault();
		
		 var formData = new FormData();
	var other_data = $('#form_add_update').serializeArray();
    $.each(other_data,function(key,input){
        formData.append(input.name,input.value);
    });   
	 if($('#file').val()!=''){
		formData.append("file", document.getElementById('file').files[0]);
		}
		
	// ajax start
		    $.ajax({
			type: "POST",
			url: "<?php echo base_url().'career/saveApplication'; ?>",
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			dataType: 'JSON',
			beforeSend: function() {
			//$('#loader').removeClass('hidden');
			$('#form_add_update .btn_au').removeClass('hidden');
			
			},
			success: function(data) {
			$('#form_add_update .btn_au').addClass('hidden');
			  if (data.status == 1)
            {   
				$(".alert").addClass('alert-success');
				$(".alert").html(data.message);
				$(".alert").removeClass('hidden');
				$(".alert").removeClass('alert-danger');
				$(".alert").removeClass('alert-warning');
				setTimeout(function(){
				$(".alert").addClass('hidden');
				$('#form_add_update')[0].reset();
				$('#ApplyModal').modal('hide');
				
				//window.location=data.redirect;
				},5000);
            }
           else if (data.status ==0)
            {  
			$(".alert").addClass('alert-danger');
				$(".alert").html(data.message);
				$(".alert").removeClass('hidden');
				setTimeout(function(){
				$(".alert").addClass('hidden');
				},3000);
            }
			
			
           }
	 });

	//ajax end    
    
	}
</script>