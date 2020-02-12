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
       Courses Management
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li > <a href="course">View Courses </a></li>
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
                    
                     
                    <div class="col-xs-6 col-md-6"> 
                        <label for="exampleInputEmail1">Course Category</label>
                        
                        
                        
                        
                        <select class="form-control" name="course_category_id">
                        <option value=""> Choose Course Category</option>
						<?php 
						if($course_catogories->result()){
						 foreach ($course_catogories->result() as $course_cat){
						?>  
                           
                             
                            <option value="<?php echo $course_cat->id;?>" 
							<?php if(isset($row) && $row->course_category_id == $course_cat->id){ echo 'selected="selected"';} ?>
                            ><?php echo $course_cat->title;?></option>
                            
                       <?php 
					       }
					   }?>     
                      </select>
                    </div>
                     <div class="clearfix">&nbsp;</div>
                     <div class="clearfix">&nbsp;</div>
                    
                    
                    <div class="col-xs-12 col-md-6">
                      <label for="exampleInputEmail1"> Course Title </label>
                        <input type="text" class="form-control" id="post_title"  placeholder="Course Title" name="post_title" value="<?php if(isset($row)){ echo $row->post_title;} ?>">
                      
                    </div>
                
                     
                    <div class="col-xs-12 col-md-6">                      
                    <label>Post Type</label>
                    <select class="form-control " id="post_type" name="post_type" onchange="gettype(this.value)">
                   <?php 
				   $op = array('video'=>'video','embed url'=>'embed url');
					foreach($op as $key=>$val){ 
					if(isset($row))
					{
						if($row->post_type==$val)
						{
						$selected ='selected="selected"';
						}
						else
						{
						$selected ='';
						}
					}
						echo ' <option '.$selected .' value="'.$val.'">'.$val.' </option>';
					}
					
					$imageDisplay='none';
					$videpDisplay='none';
					$embedDisplay='none';
					if(isset($row)){
					 if($row->post_type=='image')
					 {
						$imageDisplay='block';
					 }
					else if($row->post_type=='video' )
					{	
					 $videpDisplay='block';
					} 
					
						else if($row->post_type=='embed url')
						{	
						 $embedDisplay='block';
						} 
					}	 
				  ?>
                  
                    </select>
                    </div>
                    <div class="clearfix">&nbsp;</div>
                  <div class="col-xs-12 col-md-12">
                      <label> Course  Description</label>
                        
                        <textarea class=" textarea" id="editor1"  placeholder="Lorem ipsum post" name="post_description"><?php if(isset($row)){ echo $row->post_description;} ?></textarea>

                    </div>
					 
                      <div id="video_wrap" class="col-xs-12 col-md-6 other_wrap" style="display:<?php echo $embedDisplay ?>">                      
                    <label>Enter url</label>
                        <input type="text" class="form-control" id="video_url"  placeholder="video url" name="video_url" value="<?php if(isset($row)){ echo $row->video_url;} ?>">
                       <br>
                      <img   src="<?php echo $row->thumbnail ?>" class="img-responsive"   />
                    </div>
                      
                      <br>
                  
                   
                    
            <div class="clearfix">&nbsp;</div>
            
            <div id="upload_video_wrap" class="col-xs-12 col-md-12 other_wrap" >      
            <div class="col-xs-12 col-md-6">
                     <label>Upload Introductory video </label>
                     <input type="file" name="upload_video" class="upload_video"  id="upload_video" accept=".mp4,.MP4"  >
                     
                    <?php 
					if($row->post_type=='video')
					{
					?>
                        <video id="my-video" controls preload="auto"  style="width:250px;"
                            poster="<?php echo base_url().'uploads/'.$row->thumbnail; ?>" data-setup="{}">
                            <source src="<?php echo base_url().'uploads/'.$row->video_url; ?>" type='video/mp4'>
                            
                            <p class="vjs-no-js">
                            To view this video please enable JavaScript, and consider upgrading to a web browser that
                            
                            </p>
                        </video>
					<?php 
					}
					?>

                </div>                
                <div class="col-xs-12 col-md-6">
                    <label>Video thumbnail</label>
                    <input type="file" name="thumbnail" class="thumbnail"  id="thumbnail" accept=".png,.PNG,.JPG,.jpg,.jpeg,.JPEG,.gif"  >
                    <div class="col-xs-12 col-md-6" style="padding: 0px; margin: 30px 0px 0px;">
                    <?php
                    if($row->post_type=='video'){
                      $thumbnail=base_url().'uploads/'.$row->thumbnail;
                    }
                    
                    ?>
                   	 <img  width="50"  src="<?php echo $thumbnail ?>" class="img-responsive"   />
                    </div>  
                </div>     
            </div>
           </div> 
           
                <div class="col-xs-12 col-md-6">
                    <label for="exampleInputEmail1">Short Description</label>
                    <textarea name="short_description" class="form-control"><?php if(isset($row)){ echo $row->short_description;} ?></textarea>
                </div>
              <div class="clear"></div>
                <div class="col-xs-12 col-md-6">
                    <label for="exampleInputEmail1">Course Price</label>
                    <input type="text" class="form-control" id="price"  placeholder="Enter Course Price" name="price" 
                    value="<?php if(isset($row)){ echo $row->price;} ?>">
                </div>
              
              <div class="clearfix">&nbsp;</div><div class="clearfix">&nbsp;</div>
                <div class="col-xs-12 col-md-6">
                    <label >What's Included.?</label>
                    <div id="education_fields">
                         
                       <?php 
					    if(isset($row))
						{
					    if($includes->result()){
						 foreach ($includes->result() as $inc){
						?>  
                         <div class="form-group removeclass<?php echo  $inc->id;?>">
                            <div class="col-sm-12 pad0">
                               <div class="form-group">
                                 <div class="input-group">   
                                 <input type="text" class="form-control" id="educationDate" name="include_list[]" 
                                 value="<?php echo  $inc->included_list;?>">
                                  <div class="input-group-btn"> <button class="btn btn-danger" type="button"
                                  onclick="deleteInclude('<?php echo  $inc->id;?>','<?php echo $this->tbl_course_include;?>') "> 
                                   <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                    </button>
                                    </div>
                                    </div>
                                  </div>
                                 </div>
                          <div class="clear"></div></div> 	
                            
                         <?php 
						   }
					     }
						}
					  ?>   
                    </div>
                    
                    <div class="col-sm-12 pad0">
                    <div class="form-group">
                    <div class="input-group">
                   
                        
                      
                    
                    
                    
                    <input type="text" class="form-control" id="include_list" value="<?php if(isset($row)){ echo $row->include_list;} ?>"   name="include_list[]" >
                    
                    <div class="input-group-btn">
                    <button class="btn btn-success" type="button"  onclick="education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                    </div>
                    
                    
                    	</div>
                     </div>
                    </div>
                <div class="clear"></div>
                
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
               <script>
               function gettype(val){
					if(val=='video'){
						$('#upload_video_wrap').show();
						$('#video_wrap').hide();
						$('#add_images_wrap').hide();
						
					}else if(val=='image'){
						$('#add_images_wrap').show();
						$('#video_wrap').hide();
						$('#upload_video_wrap').hide();
					}
					else if(val=='embed url'){
						$('#video_wrap').show();
						$('#add_images_wrap').hide();
						$('#upload_video_wrap').hide();
					}
					else{
						$('#video_wrap').hide();
						$('#add_images_wrap').hide();
						$('#upload_video_wrap').hide();
					}
				}
               </script> 
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

  <script>
  /**********************************save************************************/
	 $('#form_add_update').on("submit",function(e) {
		e.preventDefault();
		 
		 var inputFile = $('input#file');
		// var filesToUpload = inputFile[0].files;
	     
		 var formData = new FormData();
		// make sure there is file(s) to upload
		
		/*	if (filesToUpload.length > 0) {
				for (var i = 0; i < filesToUpload.length; i++) {
					var file = filesToUpload[i];
					formData.append("file[]", file, file.name);				
				}
			}*/
			
			if($('#post_type').val()=='video'){
				if($('#upload_video').val()!='')
				{
					formData.append("upload_video", document.getElementById('upload_video').files[0]);
				}
				if($('#thumbnail').val()!='')
				{
					formData.append("thumbnail", document.getElementById('thumbnail').files[0]);
				}
			}
	
	
	var other_data = $('#form_add_update').serializeArray();
    $.each(other_data,function(key,input){
        formData.append(input.name,input.value);
    });   
		post_description = CKEDITOR.instances.editor1.getData();
		formData.append("post_description", post_description);

	// ajax start
		    $.ajax({
			type: "POST",
			url: "<?php echo base_url().'course/save'; ?>",
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
				window.location='course';
				},1000);
            }
			else if (data.status == "validation_error")
            {  // alert(data.status);
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
      $.each(other_data,function(key,input)
	  {
        formData.append(input.name,input.value);
      });   
	
	// ajax start
		    $.ajax({
			type: "POST",
			url: "<?php echo base_url().'course/update_image'; ?>",
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
					if (src!=0)
					{
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
   
   // delete include
   function deleteInclude(id,table){

	    
		 $.confirm({

    title: 'Confirmation!',

    content: 'Are you sure to delete!',

	animation: 'zoom',

    closeAnimation: 'scale',

	autoClose: 'cancel|5000',

	type: 'red',

	buttons: {

        deleteUser: {

            text : 'Yes',

			btnClass: 'btn-primary',

            action: function () {

                // if user click ok the row will be deleted by the following code

				//ajax call to delete	

				$.ajax({

				url: "<?php echo base_url().'crud/delete'; ?>",

				type: 'POST',

				data: {id:id,table:table},

				dataType: "json",

				success: function(response) {

					$(".ui-item").hide();

				if (response.status == 1)

				{   
					$(".removeclass"+id).hide('slow');
				}

				else if (response.status ==0)

				{  

				$.alert('Error',':You could not delete');

				}

				else  

				{  

				$.alert('Error',response);

				

				}

				}

				});





            }

        },

        cancel: function () {

			text : 'Yes'

        },

    }

   

	});  

	} 
   
   
   
  
  </script>
 

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
	//CKEDITOR.config.contentsLangDirection = 'rtl'; // This line will make right to left
    CKEDITOR.replace('editor1')
    
  })
  
  
  var room = 1;
  function education_fields() 
  
  {
		
		room++;
		var objTo = document.getElementById('education_fields')
		var divtest = document.createElement("div");
		divtest.setAttribute("class", "form-group removeclass"+room);
		var rdiv = 'removeclass'+room;
		divtest.innerHTML = '<div class="col-sm-12 pad0"><div class="form-group"><div class="input-group"> <input type="text" class="form-control" id="educationDate"   name="include_list[]" ><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div>';
		
		objTo.appendChild(divtest)
	}
   function remove_education_fields(rid) {
     $('.removeclass'+rid).remove();
   }
  
</script>