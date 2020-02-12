<?php getHead();
 ?>
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
div{
	margin-bottom:10px;
	}
   </style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Package Management
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li > <a href="product">View Packages </a></li>
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
            <div class="box-body">
             <form id="form_add_update" name="form_add_update" role="form">
             <div class="alert hidden"></div>
                    <div class="form-group wrap_form">
                     
                   
                    <div class="col-xs-12 col-md-6">
                      <label for="exampleInputEmail1">   Name</label>
                        <input type="text" class="form-control" id="product_name"   name="product_name" value="<?php if(isset($row)){ echo $row->product_name;} ?>">
                    </div>
                    <div class="col-xs-12 col-md-3">
                    <label for="exampleInputEmail1">   Price</label>
                    <input type="text" class="form-control" id="product_price"   name="product_price" value="<?php if(isset($row)){ echo $row->product_price;} ?>">
                    </div>
                   <div class="col-xs-12 col-md-3">
                    <label > Package Type</label>
                    <?php if(isset($row)){ 
					 $ms="";
					$ps="";
					if($row->package_type=='Marketing'){
						$ms='selected="selected"';
						}elseif($row->package_type=='Publishing'){
							$ps='selected="selected"';
							}
					} ?>
                    <select name="package_type" class="form-control">
                    <option <?=$ms?> value="Marketing">Marketing </option>
                    <option  <?=$ps?> value="Publishing">Publishing </option>
                    </select>
                     </div>
                  
                    
                    <div class="clearfix">&nbsp;</div>
                     <div class="col-xs-12 col-md-12">
                    <label for="exampleInputEmail1"> Product  Description</label>
                   <textarea class="form-control" rows="10" id="editor1" name="product_description"><?php if(isset($row)){ echo $row->product_description;} ?></textarea>

                    </div>
                    <div class="clearfix">&nbsp;</div>
                    <div class="col-xs-12 col-md-12">
                    <label>Extras</label>
                   <div class="group_wrap">
                   <?php
				 $groups =  get_table('extras_group');
					  
					   foreach($groups->result() as $group){
							if(isset($row)){ 
								$product_id = $row->id;
								$checked='';
								if(existInProductGroup($product_id,$group->id)==1){
									
									$checked='checked="checked"';
								}   
							}
						  
				   ?>
                    <label><?php echo $group->title ?></label>
                    <input class="group" <?php echo $checked ?> type="checkbox" value="<?php echo $group->id ?>" name="group_ids[]" >
                    
                   <?php
					   }
				   
				   ?>
                   </div>
                    </div>
                      <br>
                  <div id="add_images_wrap" class="col-xs-12 col-md-12 " >                      
                    <label>Add  images</label>
                     <input type="file" name="file[]" class=" file"  id="file" accept=".png,.PNG,.JPG,.jpg,.jpeg,.JPEG,.gif" multiple >
                     <?php
			if(isset($row)){		
					$product_id = $row->id;
			$where=array('product_id'=>$product_id);
			$ImgData = get_by_where_array($where,'product_images');
			
			foreach($ImgData->result() as $Imgrow){
				$src=base_url().'uploads/'.$Imgrow->image;
				{?>
				<div class="col-xs-4 col-md-2  box-primary  img_wrap_<?php echo $Imgrow->id ?>">
                <img id="img_<?php echo $Imgrow->id ?>" src="<?php echo $src ?>" class="img-responsive"  ><br>
                <center>
                <a onclick="getImage('<?php echo $Imgrow->id ?>','product_images')" class="btn btn-xs btn-success" data-toggle="tooltip" title="" style="overflow: hidden; position: relative;" data-original-title="Edit">
<i class="fa fa-pencil"></i></a>
<a class="btn btn-xs btn-danger"  onclick="deleteImage('<?php echo $Imgrow->id ?>','product_images')" href="javascript:void(0)" data-toggle="tooltip" title="" style="overflow: hidden; position: relative;" data-original-title="Delete"><i class="fa fa-times"></i>
</a>
                </center>
                
                </div>
			<?php }	}
				
			}
					 ?>
                     </div>
                   
                    
            <div class="clearfix">&nbsp;</div>
            
            
           </div> 
      <div class="clearfix">&nbsp;</div>
       <div class="col-xs-12 col-md-6">    
                     <button type="submit" class="btn btn-info">Submit</button>
                        <input type="hidden" id="id"  name="id" value="<?php if(isset($row)){ echo $row->id;} ?>">
                      </div>
                      </div>
                    
                 
                  
                    
                    
                </form>
                 <?php include_once'edit_img_form.php' ?>
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
  
  <script src="bower_components/ckeditor/ckeditor.js"></script>
 <script>

  $(function () {
    CKEDITOR.replace('product_description');
	
	
})
</script>
  <script>
  
 $(".group").click(function () {  
	   $this = $(this);
	   if($($this).is(":checked")){
		
		 }else{
			// ajax start
			<?php
			if(isset($row)){ 
			$product_id = $row->id;?>
			
			$.ajax({
			type: "POST",
			url: "<?php echo base_url().'extras/removeExtras'; ?>",
			data: {'group_id':$this.val(),'product_id':<?php echo$product_id ?>},
			success: function(data) {
			}
			
			});
		<?php } ?>
		 }
	  });
  
  /**********************************save************************************/
	 $('#form_add_update').on("submit",function(e) {
		e.preventDefault();
			var inputFile = $('input#file');
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
	
	var other_data = $('#form_add_update').serializeArray();
    $.each(other_data,function(key,input){
        formData.append(input.name,input.value);
    });   
	product_description = CKEDITOR.instances.editor1.getData();

			formData.append("product_description", product_description);

	// ajax start
		    $.ajax({
			type: "POST",
			url: "<?php echo base_url().'product/save'; ?>",
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
				window.location='product';
				},1000);
            }
			else if (data.status == "validation_error")
            {   alert(data.status);
			$(".alert").addClass('alert-warning');
				$(".alert").html(data.message);
				$(".alert").removeClass('hidden');
				
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
  