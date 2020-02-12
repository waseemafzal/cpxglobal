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
   </style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <?php echo $this->heading;?>
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li > <a href="<?php echo $this->controller_name;?>">View Sub menu </a></li>
        <li > <a href="submenu/add">Add sub Menu</a></li>
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
                      <label for="exampleInputEmail1"> Menu Title</label>
                         <select class="form-control" onChange="getsubCat(this.value)"  name="menu_id"  >
                                <option value="">Main Menu</option>
                                <?php 
									foreach($menu->result() as $op){
										if(isset($row))
										{ 
											$selected='';
											if($row->menu_id ==$op->id)
											{
												$selected='selected="selected"';
											}
										}
							   ?>
										<option <?php echo $selected ?> value="<?php echo $op->id ?>"><?php echo $op->title;?></option>
                                
								<?php
                                 }
                                ?>
                                </select>
                       </div>
                    
                      <div class="clearfix">&nbsp;</div> <div class="clearfix">&nbsp;</div>
                    
                    <div class="col-xs-12 col-md-6">
                      <label for="exampleInputEmail1">Sub Menu Title</label>
                        <input type="text" class="form-control" id="title"  placeholder="Lorem ipsum post" name="title" value="<?php if(isset($row)){ echo $row->title;} ?>">

                    </div>
                 
                
                    <div class="clearfix">&nbsp;</div> <div class="clearfix">&nbsp;</div>
                    <div class="col-xs-12 col-md-6">
                    <label for="exampleInputEmail1"> Page  Banner</label>
                    <input type="file" name="image" id="image"  /><div class="clearfix">&nbsp;</div>
                   
                   <?php if(isset($row))
				   { 
				  	 echo '<img src="'.base_url().'uploads/banner/'.$row->page_banner.'" style="width:500px; height:200px; border:1px solid #ccc;">';
				   }
				   ?> </div> 
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
		

			

if($('#image').val()!=''){
		formData.append("image", document.getElementById('image').files[0]);
		}
	// ajax start
		    $.ajax({
			type: "POST",
			url: "<?php echo base_url().$this->controller_name.'/save'; ?>",
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
				window.location='<?php echo $this->controller_name;?>';
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


  
  </script>

  
