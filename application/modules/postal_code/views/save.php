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
div{
	margin-bottom:10px;
	}
   </style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Postal code Management
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li > <a href="postal_code">View Postal codes </a></li>
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
             <form id="form_add_update" name="form_add_update" method="post" role="form">
             <div class="alert hidden"></div>
                    <div class="form-group wrap_form">
                     <div class="col-xs-12 col-md-6">
                      <label for="exampleInputEmail1"> city</label>
                       <select class="form-control" name="city_id" >
                       <?php 
					   $option = get_table('city');
					   foreach($option->result() as $op){
					   ?>
                       <?php if(isset($row)){ 
					   $selected='';
					   if($row->city_id==$op->id){
						   $selected='selected="selected"';
						   }
					   } ?>
                       <option <?php echo $selected ?> value="<?php echo $op->id ?>"><?php echo $op->cat_name ?></option>
                       <?php } ?>
                       </select>

                    </div>
                   
                    <div class="col-xs-12 col-md-6">
                      <label for="exampleInputEmail1"> Postal code</label>
                        <input type="text" class="form-control" id="postal_code"   name="postal_code" value="<?php if(isset($row)){ echo $row->product_name;} ?>">
                    </div>
                    <div class="col-xs-12 col-md-6">
                    <label for="exampleInputEmail1"> Min Order</label>
                    <input type="text" class="form-control" id="min_order"   name="min_order" value="<?php if(isset($row)){ echo $row->min_order;} ?>">
                    </div>
            <div class="clearfix">&nbsp;</div>
            
            
           </div> 
      <div class="clearfix">&nbsp;</div>
       <div class="col-xs-12 col-md-6">    
                     <button type="submit" class="btn btn-info">Submit</button>
                        <input type="hidden" id="id"  name="id" value="<?php if(isset($row)){ echo $row->id;} ?>">
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
	 $('#form_add_update').on("submit",function(e) {
	
	e.preventDefault();
	var formData = new FormData();
	// make sure there is file(s) to upload
	var other_data = $('#form_add_update').serializeArray();
    $.each(other_data,function(key,input){
        formData.append(input.name,input.value);
    });   
	
	// ajax start
		    $.ajax({
			type: "POST",
			url: "<?php echo base_url().'postal_code/save'; ?>",
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
				window.location='postal_code';
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
  