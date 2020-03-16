<?php getHead();

 ?>
   <style>
   div.col-xs-12{ margin-bottom:10px};
    .box-primary {
	margin:5px 2px;	
		}
    .box-primary img{
		min-width:200px;
		min-height: 200px;
	
	}
	div.center{
background-color: #fff;
    border-radius: 5px;
    box-shadow: -2px 2px 7px 1px;
    left: 0;
    margin-left: -100px;
    padding: 11px;
    position: absolute;
    top: 10%;
    width: 50%;
}
   </style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Certificate Data Management
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li > <a href="customerdata">View Certificate Data </a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            
              
            </div>
            <!-- /.box-header -->
      <!--      title 	short_heading 	post_banner 	description 	start_at 	end_at 	all_day 	location 	on_date-->
            <div class="box-body">
             <form id="form_add_update" name="form_add_update" role="form">
             <div class="alert hidden"></div>
                    <div class="form-group wrap_form">
                   
                      <div class="clearfix">&nbsp;</div>
                    <div class="col-xs-12 col-md-6">
                      <label for="exampleInputEmail1">Certificate ID</label>
                        <input type="text" class="form-control" id="certificate_id"   name="certificate_id" value="<?php if(isset($row)){ echo $row->certificate_id;} ?>">

                    </div>
                    <div class="col-xs-12 col-md-6">
                      <label for="exampleInputEmail1">Certificate Name</label>
                        <input type="text" class="form-control" id="certificate_name"   name="certificate_name" value="<?php if(isset($row)){ echo $row->certificate_name;} ?>">

                    </div>
                    <div class="col-xs-12 col-md-12">
                      <label for="exampleInputEmail1">Applicant Name</label>
                        <input type="text" class="form-control" id="applicant_name"   name="applicant_name" value="<?php if(isset($row)){ echo $row->applicant_name;} ?>">

                    </div>
                    <div class="clearfix">&nbsp;</div>
                    <div class="col-xs-12 col-md-6">
                      <label for="exampleInputEmail1">Enter Customer ID(Seacrh)</label>
                        <input type="text" class="form-control" id="customer_id"   name="customer_id" value="<?php if(isset($row)){ echo $row->customer_id;} ?>"  onkeyup="getCustomerdata(this.value)">

                    </div>
                    
                    <div class="clearfix">&nbsp;</div>
                     <h3><em>Customer Auto Fill Data</em></h3>
                     <hr />
                    
                    <div id="userdatablock">
                    <div class="col-xs-12 col-md-6">
                      <label for="exampleInputEmail1">Company Name</label>
                        <input type="text" class="form-control" id="company_name"   name="company_name" value="<?php if(isset($row)){ echo $row->company_name;} ?>">

                    </div>
                    
                    <div class="col-xs-12 col-md-6">
                      <label for="exampleInputEmail1">Mobile</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" value="<?php if(isset($row)){ echo $row->mobile;} ?>">

                    </div>
                    <div class="col-xs-12 col-md-6">
                      <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?php if(isset($row)){ echo $row->email;} ?>">

                    </div>
                    
                    <div class="col-xs-12 col-md-6">
                      <label for="exampleInputEmail1">City</label>
                        <input type="text" class="form-control" id="city" name="city" value="<?php if(isset($row)){ echo $row->city;} ?>">

                    </div>
                    <div class="col-xs-12 col-md-6">
                      <label for="exampleInputEmail1">Country</label>
                        <input type="text" class="form-control" id="country" name="country" value="<?php if(isset($row)){ echo $row->country;} ?>">

                    </div>
                  </div>

              <div class="col-xs-12 col-md-6">
                      <label for="exampleInputEmail1">Trainer</label>
                        <input type="text" class="form-control" id="trainer" name="trainer" value="<?php if(isset($row)){ echo $row->trainer;} ?>">

                    </div>
                   <div class="col-xs-12 col-md-6">
                      <label for="exampleInputEmail1">Fees</label>
                        <input type="text" class="form-control" id="fees"  name="fees" value="<?php if(isset($row)){ echo $row->fees;} ?>">

                    </div>
                     <div class="col-xs-12 col-md-6">
                      <label for="exampleInputEmail1">Duration</label>
                        <input type="text" class="form-control" id="duration"  name="duration" value="<?php if(isset($row)){ echo $row->duration;} ?>">

                    </div>
                    
                     <div class="col-xs-12 col-md-6">
                      <label for="exampleInputEmail1">Issuance Date</label>
                        <input type="text" class="form-control" id="issuance_date"  name="issuance_date" value="<?php if(isset($row)){ echo $row->issuance_date;}else{ echo 'YYYY-MM-DD';} ?>">

                    </div>
                     <div class="col-xs-12 col-md-6">
                      <label for="exampleInputEmail1">Expiration Date</label>
                        <input type="text" class="form-control" id="expiration_date"  name="expiration_date" value="<?php if(isset($row)){ echo $row->expiration_date;}else{ echo 'YYYY-MM-DD';} ?>">

                    </div>
                    <div class="clearfix">&nbsp;</div> <div class="clearfix">&nbsp;</div>
                  
					  
                     
            </div>
            
             <div class="clearfix">&nbsp;</div>
             <div class="clearfix">&nbsp;</div>
             <div class="col-xs-12 col-md-12">
                           <button type="submit" class="btn btn-info">Submit</button>
                        <input type="hidden" id="id"  name="id" value="<?php if(isset($row)){ echo $row->id;} ?>">
                   </div>
           </div> 

                    
                       <div class="clearfix">&nbsp;</div>
                    
                </form>
                 <?php //include_once'edit_img_form.php' ?>
                 </div>
               
              
            </div>
          </div>
          
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
   

  <?php  getFooter(); ?>
  
  

 <script type="text/javascript">

 

   
   function getCustomerdata(vald)
    {
		
	if(vald!='')
	{	
	//$('#ProductModal').modal('show');
	$('#userdatablock').html('<i class="fa fa-cog fa-spin" style="font-size:24px"></i>');
	
	  $.ajax({
		url: "<?php echo base_url().'Certificatedata/getCustomerData'; ?>",
		type: 'POST',
		data: {id:vald},
		dataType : "json",
        success: function(response) 
		{
		 
				if(response.status == 1){
					$('#userdatablock').html(response.data);
				
				}
				else{
					$('#userdatablock').html(response.data);
				}
			}
		});
	 }
    }
   
   
</script>
  <script>
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
			url: "<?php echo base_url().'certificatedata/save'; ?>",
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
			//alert(data.status);
			//var obj = jQuery.parseJSON(data);
            if (data.status == 1)
            {   
				$(".alert").addClass('alert-success');
				$(".alert").html(data.message);
				$(".alert").removeClass('hidden');
				setTimeout(function(){
				$(".alert").addClass('hidden');
				$('#form_add_update')[0].reset();
				},3000);
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
			else if (data.status == 2)
            {   
			$(".alert").addClass('alert-success');
				$(".alert").html(data.message);
				$(".alert").removeClass('hidden');
				setTimeout(function(){
				window.location='certificatedata';
				},1000);
            }
			else if (data.status == "validation_error")
            {  
			$(".alert").addClass('alert-warning');
				$(".alert").html(data.message);
				$(".alert").removeClass('hidden');
				
            }
			
           }
	 });

	//ajax end    
    });
 
  /******************************/


  
  </script>

  
