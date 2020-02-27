 <form id="form_add_update" name="form_add_update" role="form">
             <div class="alert hidden"></div>
 
  <div id="add_images_wrap" class="col-xs-12 col-md-12 " >                      
<div class="col-xs-12 col-md-4">
<label>Add  images </label> (<small>You could select multiple images</small>)
                     <input type="file" name="file[]" class=" file"  id="file" accept=".png,.PNG,.JPG,.jpg,.jpeg,.JPEG,.gif" multiple >
                   
</div>  <div class="col-xs-12 col-md-8">                 
					<input type="submit" class="btn btn-info " value="Upload Images" style="
    margin:  15px 0 0 0;
    width: 150px;
">
          </div>  
          <div class="clearfix">&nbsp;</div>   
              
          <div style="border-bottom:2px solid"> &nbsp;</div>
                      <div class="clearfix">&nbsp;</div>   
                     <?php
			if(isset($post_id)){		
					
			$where=array('post_id'=>$post_id);
			$ImgData = get_by_where_array($where,'slider_images');
			//echo $this->db->last_query();
			
			foreach($ImgData->result() as $Imgrow){
				$src=base_url().'uploads/'.$Imgrow->image;
				{?>
				<div style="margin-bottom: 10px;" class="col-xs-4 col-md-2  box-primary  img_wrap_<?php echo $Imgrow->id ?>">
                <img id="img_<?php echo $Imgrow->id ?>" src="<?php echo $src ?>" class="img-responsive"  ><br>
                <center>
                <a onclick="getImage('<?php echo $Imgrow->id ?>','slider_images')" class="btn btn-xs btn-success" data-toggle="tooltip" title="" style="overflow: hidden; position: relative;" data-original-title="Edit">
<i class="fa fa-pencil"></i></a>
<a class="btn btn-xs btn-danger"  onclick="deleteImage('<?php echo $Imgrow->id ?>','slider_images')" href="javascript:void(0)" data-toggle="tooltip" title="" style="overflow: hidden; position: relative;" data-original-title="Delete"><i class="fa fa-times"></i>
</a>
                </center>
                
                </div>
			<?php }	}
				
			}
					 ?>
                     </div>
					 <input type="hidden" id="post_id" name="post_id" value="<?php echo $post_id ?>" >
					 </form>
                 <?php include_once'edit_img_form.php' ?> 
				 

  <script>
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
	/*if($('#post_type').val()=='video'){
	if($('#upload_video').val()!=''){
		formData.append("upload_video", document.getElementById('upload_video').files[0]);
		}
	if($('#thumbnail').val()!=''){
		formData.append("thumbnail", document.getElementById('thumbnail').files[0]);
		}
	}*/
	
	
	var other_data = $('#form_add_update').serializeArray();
    $.each(other_data,function(key,input){
        formData.append(input.name,input.value);
    });   
	
	 
	
	//post_description = CKEDITOR.instances.editor1.getData();
	//		formData.append("post_description", post_description);

	// ajax start
		    $.ajax({
			type: "POST",
			url: "<?php echo base_url().'sliders/saveImages'; ?>",
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
				$('#<?php echo $post_id ?>').trigger('click');
				$('#<?php echo $post_id ?>').trigger('click');
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
				//window.location='blogpost';
				
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
			url: "<?php echo base_url().'sliders/update_image'; ?>",
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