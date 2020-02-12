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
        Category Management
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li > <a href="cat">View Category </a></li>
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
             <div class="col-xs-12"><div class="alert hidden"></div></div>
                    <div class="form-group wrap_form">
					 <div class="col-xs-12 col-md-6">
					   <?php 
					   $option = get_table('cat_types');
					   
					   ?>
                      <label for="exampleInputEmail1"> Category Type</label>
                        <select class="form-control" name="type_id" onChange="getCat(this.value)" >
						<option value="">Select</option>
                     <?php
					   foreach($option->result() as $op){
					   ?>
                       <?php if(isset($row)){ 
					   $type_id='';
					   $selected='';
					   if($row->type_id==$op->id){
						   $selected='selected="selected"';
						   $type_id=$row->type_id;
						   }
					   } ?>
                       <option <?php echo $selected ?> value="<?php echo $op->id ?>"><?php echo $op->type ?></option>
                       <?php } ?>
                       </select>
                    </div>
					 <div class="clearfix">&nbsp;</div>
					 <div class="clearfix">&nbsp;</div>
                     
                        <div class="col-xs-12 pad0" id="cat_div">
                            <div class="col-xs-12 col-md-6">
                            
                            <?php 
							  if(isset($row))
							    { 
                            
							   $d = get_by_where_array(array('type_id'=>$row->type_id,'parent_id'=>0),'categories');
							   if ($d->num_rows()>0)
								{
				
							?>
                            
                            <select class="form-control" onChange="getsubCat(this.value)"  name="parent_id"  >
                                <option value="">Parent Cat</option>
                                <?php 
									foreach($d->result() as $op){
										if(isset($row))
										{ 
											$selected='';
											if($row->type_id==$op->id)
											{
												$selected='selected="selected"';
											}
										}
									 ?>
										<option <?php echo $selected ?> value="<?php echo $op->id ?>"><?php echo $op->cat_name ?></option>
                                
									<?php
                                   	 }
                                    ?>
                                </select>
                               <?php } ?>
                              <?php } ?>  
                            </div>
                           
                        </div>
                       
                        <?php  $edit = 'none';  if(isset($row)){ $edit ='show';}  ?>
						<div class="col-xs-12 pad0" id="sub_cat_div" style="display:<?php echo $edit;?>;">
                           <div class="col-xs-12 col-md-6">
                           <div class="clearfix">&nbsp;</div>
                          <?php 
						   if(isset($row)){
							  $d = get_by_where_array(array('id'=>$row->parent_id),'categories');
							  if ($d->num_rows()>0)
								{ 
                            ?>
                            
                            <select class="form-control"   name="parent_id_level_2">
                                <option value="">Parent Cat</option>
                                <?php
									
									foreach($d->result() as $op){
										if(isset($row))
										{ 
											$selected='';
											if($row->parent_id==$op->id)
											{
												$selected='selected="selected"';
											}
										}
									 ?>
										<option <?php echo $selected ?> value="<?php echo $op->id ?>"><?php echo $op->cat_name ?></option>
                                 <?php 
                            	  } 
							   ?>
							 </select>
							
                            <?php
                            }
                            ?>
                            <?php
                            }
                            ?>
                          </div>  
                        
                        </div>
                      
                     <div class="col-xs-12 col-md-6">
                       <div class="col-xs-12 col-md-12">
                      <label for="exampleInputEmail1"> Category name</label>
                        <input type="text" class="form-control" id="cat_name"  placeholder="Information Technology" name="cat_name" value="<?php if(isset($row)){ echo $row->cat_name;} ?>">

                    </div>
                   </div>
                   
                   
           </div> 
      <div class="clearfix">&nbsp;</div>
      <div class="clearfix">&nbsp;</div>
       <div class="col-xs-12 col-md-6">    
                     <button type="submit" class="btn btn-info">Submit</button>
                        <input type="hidden" id="id"  name="id" value="<?php if(isset($row)){ echo $row->id;} ?>">
                      </div>
                      </div>
                    
                 
                  
                    
                    
                </form>
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
  
  function getCat(id){
	    
		
		if(id !=0)
		   {
		    $("#cat_div").html('');
		    $("#sub_cat_div").html('');
			$.ajax({
				type: "POST",
				url: "<?php echo base_url().'cat/getCat'; ?>",
				data: {type_id:id},
				dataType: 'JSON',
				beforeSend: function() {
				$('#loader').removeClass('hidden');
				},
				success: function(data) {
				$('#loader').addClass('hidden');
				if (data.status == 1)
				{ 
					$('#cat_div').html(data.options);
				}
				
				
				}
			});
		   }

	//ajax end   
	  
  }
  
  
	  function getsubCat(id)
	  {
		  if(id !=0)
		   {
				$.ajax({
				type: "POST",
				url: "<?php echo base_url().'cat/getsubCat'; ?>",
					data: {parent_id:id},
					dataType: 'JSON',
					beforeSend: function() {
					$('#loader').removeClass('hidden');
				},
				success: function(data) {
				$('#loader').addClass('hidden');
				if (data.status == 1)
				{ 
					
					$('#sub_cat_div').show();
					$('#sub_cat_div').html(data.options);
				}
				
				
				}
				});
		   }
	  }
	 $('#form_add_update').on("submit",function(e) {
		e.preventDefault();
		var formData = new FormData();
		
		 var other_data = $('#form_add_update').serializeArray();
			$.each(other_data,function(key,input)
			{
				formData.append(input.name,input.value);
			}
		);   
	
	// ajax start
		    $.ajax({
			type: "POST",
			url: "<?php echo base_url().'cat/save'; ?>",
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
				window.location='cat';
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
 
  </script>
  