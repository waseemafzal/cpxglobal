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
       Customerdata Management
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li > <a href="customerdata">View Customerdata </a></li>
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
                      <label for="exampleInputEmail1">Company name</label>
                        <input type="text" class="form-control" id="company_name"   name="company_name" value="<?php if(isset($row)){ echo $row->company_name;} ?>">

                    </div>
                    <div class="col-xs-12 col-md-6">
                      <label for="exampleInputEmail1">Business</label>
                        <input type="text" class="form-control" id="business"   name="business" value="<?php if(isset($row)){ echo $row->business;} ?>">

                    </div>
                    <div class="col-xs-12 col-md-6">
                      <label for="exampleInputEmail1">Participants name</label>
                        <input type="text" class="form-control" id="participants_name"   name="participants_name" value="<?php if(isset($row)){ echo $row->participants_name;} ?>">

                    </div>
                    <div class="col-xs-12 col-md-6">
                      <label for="exampleInputEmail1">Designation</label>
                        <input type="text" class="form-control" id="designation"   name="designation" value="<?php if(isset($row)){ echo $row->designation;} ?>">

                    </div>
                    
                    <div class="col-xs-12 col-md-6">
                      <label for="exampleInputEmail1">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?php if(isset($row)){ echo $row->phone;} ?>">

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
                  

              
                   <div class="col-xs-12 col-md-6">
                      <label for="exampleInputEmail1"> Recomended by</label>
                        <input type="text" class="form-control" id="recomended"  name="recomended" value="<?php if(isset($row)){ echo $row->recomended;} ?>">

                    </div>
                    
                    <div class="clearfix">&nbsp;</div> <div class="clearfix">&nbsp;</div>
                  <div class="col-xs-12 col-md-12">
                      <label>Detail / notes</label>
                        
<textarea class="form-control" rows="10" id="editor1" name="description"><?php if(isset($row)){ echo $row->description;} ?></textarea>

                    </div>
					   <div class="clearfix">&nbsp;</div>
                     
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
  
  
 <script src="assets/bower_components/ckeditor/ckeditor.js"></script>
 <script type="text/javascript">

  $(function () {
    CKEDITOR.replace('editor1');
 
  
});
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
		post_description = CKEDITOR.instances.editor1.getData();

			formData.append("description", post_description);


	// ajax start
		    $.ajax({
			type: "POST",
			url: "<?php echo base_url().'customerdata/save'; ?>",
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
				window.location='customerdata';
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

  
