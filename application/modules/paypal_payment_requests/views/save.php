<?php getHead(); ?>
   <style>
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
        Paypal Payment Requests Management
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <!--<li > <a href="product">View product </a></li>-->
          <li><a href="<?php echo base_url() ?>paypal_payment_requests"><i class="fa fa-money"></i> Payment Request</a></li>
      
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            
              
            </div>
            <!-- /.box-header 0=pending,1=active,2=delivered,3=accepted/completed,4=cancelled -->
            <div class="box-body">
             <form id="form_add_update" name="form_add_update" role="form">
             <div class="alert hidden"></div>
                    <div class="form-group wrap_form">
                    <div class="col-xs-12 col-md-6">
                      <label for="exampleInputEmail1"> Order Status</label>
                      <select class="form-control" name="status">
					  <?php
					 $d= get_table('payment_status_titles');
					 $acitiveL='';
					 foreach($d->result() as $op){
						 $acitiveL='';
						 if(isset($row)){
							 if($row->status==$op->status_id){
								 $acitiveL='selected="selected"';
								 
							 }
						 }
					  ?>
                      <option <?=$acitiveL?> value="<?=$op->status_id?>"><?=$op->statusTitle?></option>
					 <?php } ?>
                      </select>
                    </div>
                    <div class="clearfix">&nbsp;</div>
                    <div class="clearfix">&nbsp;</div>
                    <div class="col-xs-12 col-md-12">
                      <label for="exampleInputEmail1"> Notes</label>
                      <textarea class="form-control" name="notes"><?php if(isset($row)){ echo $row->notes;} ?></textarea>
                    </div>
                   
                      <br>
                  
                   
                    
            <div class="clearfix">&nbsp;</div>
            
            
           </div> 
      <div class="clearfix">&nbsp;</div>
       <div class="col-xs-12 col-md-6">    
                     <button type="submit" class="btn btn-info">Submit</button>
                        <input type="hidden" id="id"  name="id" value="<?php if(isset($row)){ echo $row->id;} ?>">
                      </div>
                      </div>
                    
                 
                  
                    
                    
                </form>
                 <?php //include_once'edit_img_form.php' ?>
                 </div>
                <div class="clearfix">&nbsp;</div>
                  <div class="clearfix">&nbsp;</div>
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
			url: "<?php echo base_url().'paypal_payment_requests/save'; ?>",
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
				window.location='paypal_payment_requests';
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
				window.location='paypal_payment_requests';
				},1000);
            }
			
			
           }
	 });

	//ajax end    
    });
 
  /******************************/
  
     $('#form_edit_image').on("submit",function(e) {
	  
	  e.preventDefault();
		var inputFile = $('input#edit_image');
		 var filesToUpload = inputFile[0].files;
		 var formData = new FormData();
		 
		// make sure there is file(s) to upload
		if (filesToUpload.length > 0) {
			// provide the form data
			// that would be sent to sever through ajax
			for (var i = 0; i < filesToUpload.length; i++) {
				var file = filesToUpload[i];
				formData.append("file[]", file, file.name);				
			}
	}
	var other_data = $('#form_edit_image').serializeArray();
    $.each(other_data,function(key,input){
        formData.append(input.name,input.value);
    });   
	
	// ajax start
		    $.ajax({
			type: "POST",
			url: "<?php echo base_url().'product/update_image'; ?>",
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			beforeSend: function() {
			$('#loader').removeClass('hidden');
			//$('#form_sample .btn_au').addClass('hidden');
			},
				success: function(data) {
				$('#loader').addClass('hidden');
				$('#form_sample .btn_au').removeClass('hidden');
				var obj = jQuery.parseJSON(data);
				if (obj.status == 1)
				{   
				var src  =obj.image;
				if (src!=0){
					var src ='<?php echo base_url()?>uploads/'+obj.image;
				$("#img_"+obj.id).attr("src",src);
					}
				setTimeout(function(){
				$('#edit_image_wrap').hide('slow');
				$("#edit_small_image_div img").attr("src",src);
				},2000);
				}
				
				
			}
	 });

	//ajax end    
    });

  
  </script>
  