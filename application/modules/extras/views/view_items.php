<style>
.disable{
    border: none;
    background: no-repeat;
}
.inp{
	border-radius: 4px;
    padding: 8px 8px 8px 8px;
    border: none;
    box-shadow: 2px 1px 11px -1px #a4a4a4;
    width: 98%;

}
</style>
 
          <div class="alert hidden"></div>
          
           <table id="post_table" class="table table-striped table-bordered   responsive">
    <thead>
    
    
    <tr>
        <th>Title</th>
        <th>Price</th>
        <th>Status</th>
        
        <th>Actions <a href="javascript:void(0)" id="btnAddExtra" class="btn  btn-success btn-xs pull-right">Add Extra Item</a></th>
    </tr>
                 <form id="form_add_extra" name="form_add_extra" role="form">

    <tr id="form_row" style="display:none">
        <td><input type="text" class="inp" id="title"  placeholder="Title"  name="title" ></td>
        <td><input type="number" class="inp" id="price"  placeholder="Price" name="price" ></td>
        
        <th colspan="2">
         <input type="hidden" id="group_id"  name="group_id" value="<?php echo $group_id; ?>">
        <button type="button"  id="btnSaveExtra" class="btn  btn-success ">Save Extra Item</button></th>
    </tr>
    </form>
    </thead>
    <tbody>
                     <?php
			if(isset($group_id)){		
					
			$where=array('group_id'=>$group_id);
			$CI =& get_instance();

		$data=$CI->db->select('*')->where($where)->order_by('id','desc')->get('extras');

			
			//echo $this->db->last_query();
			
			foreach($data->result() as $row){
				$src=base_url().'uploads/'.$row->image;
				{?>
				<tr id="row_<?php echo$row->id;?>">
        <td><input type="text" value="<?php echo $row->title;?>" id="title" disabled="disabled" class=" edit_able disable " /></td>
        <td><input type="text" value="<?php echo $row->price;?>" id="price" disabled="disabled" class="edit_able disable" />
        <input type="button" onclick="updateRecord('<?php echo$row->id;?>')" id="btnUpdate" value="update" class="edit_able hidden btn  btn-info btn-xs pull-right" />
        </td>
        
            <td class="center">
				<?PHP if($row->status==0){
                $class="label-danger";
                $text='Inactive';
                
                }else{
                $class="label-success";
                $text='Active';
                } 
                ?> 
                <span id="div_status_<?PHP echo $row->id;?>">
                <a id="anchor_<?PHP echo $row->id;?>" href="javascript:void(0);"  
                onclick="changeStatus('<?PHP echo $row->id;?>','<?PHP echo $row->status;?>','extras');" >
                <span class="label <?PHP echo $class;?>"><?PHP echo $text;?></span>
                </a>
                </span>   
        </td> 
    
        <td class="center">
          <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Edit'));?>" class="btn btn-info " href="javascript:void(0)" onclick="editme('<?php echo $row->id;?>')">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
          </a>
          <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Delete'));?>" class="btn btn-danger " href="javascript:void(0)" onClick="deleteRecord('<?php echo$row->id;?>','extras');">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
          </a>
		
        </td>
    </tr>
	  <?php }	}
				
			}
					 ?>
             </tbody>
    </table>
					 <input type="hidden" id="group_id" name="group_id" value="<?php echo $group_id ?>" >
					

  <script>
  function updateRecord(id){
	  var row= '#row_'+id;
	  var title= $(row+' #title').val();
	  var price= $(row+' #price').val();
		  $.ajax({
			type: "POST",
			url: "<?php echo base_url().'extras/saveExtra'; ?>",
			data: {'title':title,'price':price,'id':id},
			dataType: 'JSON',
			beforeSend: function() {
			$('#loader').removeClass('hidden');
		//	$('#form_add_update .btn_au').addClass('hidden');
			},
			success: function(data) {
			$('#loader').addClass('hidden');
			 if (data.status ==0)
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
				$(".alert").addClass('hidden');
			//	$("#row_"+id +' .edit_able').attr('disabled',true);
	$("#row_"+id+' td .edit_able').addClass('disable');
	$("#row_"+id+' td #btnUpdate').addClass('hidden');
				},1000);
            }
			else if (data.status == "validation_error")
            {   showAlert(data.status);
			$(".alert").addClass('alert-warning');
				$(".alert").html(data.message);
				$(".alert").removeClass('hidden');
				
            }
			
           }
	 });
  
  }
  
  function editme(id){
 
	$("#row_"+id +' .edit_able').removeAttr('disabled');
	$("#row_"+id +' .edit_able').removeClass('inp');
	$("#row_"+id +' .edit_able').removeClass('disable');
	$("#row_"+id +' #btnUpdate').removeClass('hidden');
	
	
}

 function rowadjust(id){
 
	$("#row_"+id +' .edit_able').addAttr('disabled');
	$("#row_"+id +' .edit_able').addClass('inp');
	$("#row_"+id +' .edit_able').addClass('disable');
	$("#row_"+id +' #btnUpdate').addClass('hidden');
	
	
}

  
  $("#btnAddExtra").click(function(){
	  if($("#form_row").hasClass('shown')){
		  $("#form_row").hide();
		  $("#form_row").removeClass('shown');
	}else{
	$("#form_row").show();
	$("#form_row").addClass('shown');
	}
	  
	  
  });
  $("#btnSaveExtra").click(function(){
	  var title= $('#form_row #title').val();
	  var price= $('#form_row #price').val();
	  var group_id= $('#form_row #group_id').val();
	  $.ajax({
			type: "POST",
			url: "<?php echo base_url().'extras/saveExtra'; ?>",
			data: {'title':title,'price':price,'group_id':group_id},
			dataType: 'JSON',
			beforeSend: function() {
			$('#loader').removeClass('hidden');
		//	$('#form_add_update .btn_au').addClass('hidden');
			},
			success: function(data) {
			$('#loader').addClass('hidden');
			$('#form_add_extra .btn_au').removeClass('hidden');
			//alert(data.status);
			//var obj = jQuery.parseJSON(data);
            if (data.status == 1)
            {   
				$(".alert").addClass('alert-success');
				$(".alert").html(data.message);
				$(".alert").removeClass('hidden');
				setTimeout(function(){
				$(".alert").addClass('hidden');
				$('#form_add_extra')[0].reset();
				$('#<?php echo $group_id ?>').trigger('click');
				$('#<?php echo $group_id ?>').trigger('click');
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
           