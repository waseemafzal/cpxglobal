<?php getHead(); ?>
    <link rel="stylesheet" type="text/css" href="assets/css/dropzone.css" />
    <script type="text/javascript" src="assets/js/dropzone.js"></script> 
<style type="text/css">



#course_added_videos ul {
    list-style: none;
    padding: 0;
  
    .inner {
        padding-left: 1em;
        overflow: hidden;
        display: none;
      
        &.show {
          /*display: block;*/
        }
    }
  
#course_added_videos li {
        margin: .5em 0;
      
        a.toggle {
            width: 100%;
            display: block;
            background: rgba(0,0,0,0.78);
            color: #fefefe;
            padding: .75em;
            border-radius: 0.15em;
            transition: background .3s ease;
          
            &:hover {
                background: rgba(0, 0, 0, 0.9);
            }
        }
    }
}
  
  
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Course Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li > <a href="course/add" class="btn btn-sm btn-su">Add Course</a></li>
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
                <table id="post_table" class="table table-striped table-bordered   responsive">
    <thead>
    <tr>
        <th>Title</th>
        <th>Description</th>
       
        <th>img/vido</th>
        <th>created on</th>
        
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
	if(!empty($data->result())){
	foreach ($data->result() as $row){
		
		?>
		<tr id="row_<?php echo $row->id;?>">
        <td><?php echo $row->post_title;?></td>
        <td><?php 
		$post_description = strip_tags($row->post_description);
		//echo mb_substr($post_description,0,115,'UTF-8');
    if (strlen($post_description) > 10)
     echo substr($post_description, 0, 50) . '...';		
		?></td>
        
        <td class="center">
		<?php 
		if($row->post_type=='video'){
		?>
        <video id="my-video" controls preload="auto"  style="width:150px;"
  poster="<?php echo base_url().'uploads/'.$row->thumb; ?>" data-setup="{}">
    <source src="<?php echo base_url().'uploads/'.$row->video_url; ?>" type='video/mp4'>
   
    <p class="vjs-no-js">
      To view this video please enable JavaScript, and consider upgrading to a web browser that
      
    </p>
  </video>
		<?php }
		else if($row->post_type=='image'){
			$post_id = $row->id;
			$where=array('post_id'=>$post_id);
			$ImgData = get_by_where_array($where,'post_images');
			
			foreach($ImgData->result() as $Imgrow){
				$src=base_url().'uploads/'.$Imgrow->file;
				echo '<img src="'.$src.'" width="50" >';
				}
		}
		else if($row->post_type=='embed url'){
		$arr = explode('=',$row->video_url);
		
		 ?>
         <iframe width="250" height="100" src="https://www.youtube.com/embed/<?php echo $arr[1]; ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
<?php } ?>
         
         </td>
        	 
          <td class="center">
          	<button type="button" class="btn btn-info btn-sm course_videos" id="<?php echo $row->id;?>">Lectures</button>
          </td>
            
    <td class="center">
            <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Edit'));?>" class="btn btn-sm btn-info" href="course/edit/<?php echo $row->id;?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Delete'));?>" class="btn btn-sm btn-danger" href="javascript:void(0)" onClick="deleteRecord('<?php echo$row->id;?>','course');">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    
	
	<?php 
	  }
	}
		
	?>
    
             </tbody>
       </table>
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
        <!-- .courses video modal -->
        <div id="course_videos" class="modal fade" role="dialog">
            <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Upload Course Lectures</h4>
            </div>
            <div class="modal-body" >
            <span id="mes_wrap"></span>
                <form name="lecture_form"   id="lecture_form" role="form">
                    <div class="col-xs-12 col-md-6" >
                        <label for="exampleInputEmail1">Lecture Title</label>
                        <input type="text" class="form-control" id="lec_title" placeholder="Enter Lecture Title" name="lec_title" value="">
                    </div>
                   
                 <input type="hidden" value="done" name="process">
                  <span id="hidden_span"></span>
                  <span id="hidden_span_lecture"></span>
                </form>
                
                <div style="clear:both;">&nbsp;</div>
           		<span style="color: #be2626;"><?php echo 'Max filesize: 256MiB';?><span>
                <div class="upload-div">
                  <form action="<?php echo base_url().'course/savelecture'; ?>" class="dropzone" id="dropzone"></form>
                </div>
                <div class="uploaded-files"></div>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="coursesaddedvideos">See All saved videos</button>
             
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
               <button type="submit" class="btn btn-success" id="savevideos">Save</button>
               
              
            </div>
            </div>
            
            </div>
        </div>
	    <!-- .courses video modal -->
              
   
        <!-- .courses video modal -->
        <div id="course_added_videos" class="modal fade" role="dialog">
            <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Uploaded All Previous Lectures</h4>
            </div>
            <div class="modal-body" >
               
            </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            
            </div>
        </div>
	    <!-- .courses video modal --> 
   <div class="modal fade" id="video_preview" role="dialog">
    <div class="modal-dialog">
    	<div class="modal-content">
        	
          <div class="modal-body">
            <p>Some text in the modal.</p>
          </div>
      </div>
    </div>
    </div>    
  <?php  getFooter(); ?>
  <style type="text/css">
    .uploaded-files{margin-top: 20px;}
  </style>
<script>
$('#post_table').dataTable( {
  "ordering": false
} );

	function removelecture(lecture_detail_id)
	{
    	jQuery.ajax({
				method:"POST",    
				url : "<?php echo base_url().'course/courselecturerelecturevideo'; ?>",
				data:{'lecture_detail_id':lecture_detail_id},
				success: function(response){
				if(response=='1')
				{
				  $("#list_"+lecture_detail_id).fadeOut('slow').remove(this);           
				  showAlert('Lecture has been deleted..','Success','green');	
				}	
				
			}
		});	 
		
    }

	$("#coursesaddedvideos").click(function(){
	   var course_id = $("#course_id").val();
		   jQuery.ajax({
				method:"POST",    
				url : "<?php echo base_url().'course/getsavedlectures'; ?>",
				data:{'course_id':course_id},
				success: function(response){
				$('#course_added_videos .modal-body').html(response);	
		  }
		});	 
	
	  $('#course_added_videos').modal('show');
      return false;	
})

$(".course_videos").click(function(){
	
	var uniqueid = $(this).attr('id');
	resetuploader();
	//$("#lec_title").val('');
	
	//$("#dropzone").removeClass('dz-started');
	//$("#dropzone").html('<div class="dz-default dz-message"><span>Drop files here to upload</span></div>');
	//$("input[name='process']").val('done');
	var hiddeninput  = document.createElement("input");
	hiddeninput.setAttribute('id','course_id');
	hiddeninput.setAttribute('name','course_id');
	hiddeninput.setAttribute('type','hidden');
	hiddeninput.setAttribute('value',uniqueid);
	$("#savevideos").html('Save');
	$("#lecture_form #hidden_span").html(hiddeninput);
	$('#course_videos').modal('show');
    return false;	
})

	 $("#savevideos").click(function(){
	
			if(! $('#lec_title').val())
			{
				showAlert('Lecture title can\'t be empty','Error','red');
				return false;
			}
			
			if(! $('#title_video').val())
			{
				showAlert('Upload video before save...!','Error','red');
				return false;
			}
		   
		    var formData = new FormData();
			var formData1 = new FormData();
			var other_data = $('#lecture_form').serializeArray();
			$.each
				(other_data,function(key,input)
				{
				
				formData.append(input.name,input.value);
				}
			); 
			
			var other_data1 = $('#dropzone').serializeArray();
			$.each
				(other_data1,function(key,input)
				{
				
				formData.append(input.name,input.value);
				}
			);   
			  
		  $.ajax({
			type: "POST",
			url: "<?php echo base_url().'course/savelecture'; ?>",
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			dataType: 'JSON',
			beforeSend: function() {
			$('#loader').removeClass('hidden');
		
			},
			success: function(data) {
			$('#loader').addClass('hidden');
			$('#form_add_update .btn_au').removeClass('hidden');
			if (data.status == 1)
            {   
				$(".alert").addClass('alert-success');
				$(".alert").html(data.message);
				$(".alert").removeClass('hidden');
				$("#mes_wrap").show();
				$("#mes_wrap").html('<p class="suc_msg">Operation has been completed succesfully..</p>');
				setTimeout(function(){
					resetuploader();
					$("#mes_wrap").html('').fadeOut('slow').remove(this)
				},2000);
			}
			else
			{
			  
				showAlert('something went wrong....!','Error','red');
				setTimeout(function(){
				window.location='course';
				},1000);
			  	
		    }
		 }
	   });
	
	})
   
   $(document).ready(function(e) {
    
		$('.toggle').click(function(e) {
			e.preventDefault();
			
			var $this = $(this);
			
			if ($this.next().hasClass('show')) {
				$this.next().removeClass('show');
				$this.next().slideUp(350);
			} 
			else 
			{
				$this.parent().parent().find('li .inner').removeClass('show');
				$this.parent().parent().find('li .inner').slideUp(350);
				$this.next().toggleClass('show');
				$this.next().slideToggle(350);
			}
	 });
	
  });

 function edit_lecture(lectureid){
	
	 $('#course_added_videos').modal('hide');
	 $("input[name='process']").val('edit'); // set mode edit
	 $("#lec_title").val( $("#on_edit_lec_title_"+lectureid).html() );
	 $("#savevideos").html('update');
	 
	
	var hiddeninput  = document.createElement("input");
	hiddeninput.setAttribute('id','course_lecture_id');
	hiddeninput.setAttribute('name','course_lecture_id');
	hiddeninput.setAttribute('type','hidden');
	hiddeninput.setAttribute('value',lectureid);
	$("#lecture_form #hidden_span_lecture").html(hiddeninput);
	return false;
 }
 
 function delete_lecture(lectureid )
 {
	if(lectureid !='')
	{
	  
	  
	   $.confirm({

		title: 'Confirmation!',
		content: 'If you will delete this lecture all of its data will be erase. Still want todelete this lecture.? !',
		animation: 'zoom',
		closeAnimation: 'scale',
		autoClose: 'cancel|10000',
		type: 'red',

		buttons: {
		
			deleteUser: {
			
				text : 'Yes',
				btnClass: 'btn-primary',
				action: function () {
					$.ajax({
						url : "<?php echo base_url().'course/courselectureremove'; ?>",
						type: 'POST',
						data:{'lectureid':lectureid},
						dataType: "json",
						success: function(response) {
						$(".ui-item").hide();
						if (response.status == 1)
						{   
						  $("#lec_wrap_"+lectureid).fadeOut('slow').remove(this);
						 
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
  }
 
 function resetuploader()
 {
	$("#lec_title").val(''); 
	$("#dropzone").removeClass('dz-started');
	$("#dropzone").html('<div class="dz-default dz-message"><span>Drop files here to upload</span></div>');
	$("input[name='process']").val('done');
 }
 
 
function preview_video(id){
			
			accessvideo = $("#cvideo_"+id).html();
			var url  = '<?php echo base_url();?>uploads/lectures/'+accessvideo;
			var makevideo ='<a href="javascript:void(0);" data-dismiss="modal" style="color:red;margin:10px 1px 0px 10px;"><strong>X</strong></a><div>&nbsp;</div>';
		makevideo += '<video id="my-video" controls preload="auto" width="450px" height="380px" style="margin: -55px 0px 0px 11%;"   data-setup="{}"> <source src="'+url+'" type="video/mp4"> </video>';
			
			
			$('#video_preview').modal('show');
			$("#video_preview .modal-body").html(makevideo);
			return false;
		}
</script>
  
  
  
  