<?php getHead(); ?>
   <style type="text/css">
    .btn_allocate{ display:none;}
   </style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <?php echo $this->heading;?>
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        
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
        <th style="width: 15%;">Category</th>
        <th>Buyer</th>
        
        <th  style="width: 13%;">Price - Delievry </th>
        <th>Description </th> 
        <th style="width: 11%;">Date </th> 
        <th style="width: 19%;">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
	if(!empty($data->result())){
	 foreach ($data->result() as $row)
	 {
		
		?> 
		<tr id="row_<?php echo $row->id;?>">
          <td><?php echo $row->category_name;?></td>
            <td><?php echo substr($row->buyer_name,0,11)?></br>
             <!--<a href="javascript:void(0)" onclick="send_message('<?php //echo $row->id;?>','<?php //echo $row->buyer_name;?>')" title="send message">
             <i style="font-size:18px" class="fa">&#xf1d9;</i></a>-->
            </td>
          
            <td><?php echo $row->price;?> <span style="color:#06F;"> - </span><?php echo $row->delievry;?>
                <?php if(! empty($row->require_doc)):?>
                <a href=" <?php echo base_url().'uploads/buyer/'.$row->require_doc;?>"  title="Download attachment"  target="_blank">
                 <i class="fa fa-paperclip" aria-hidden="true"></i></a>
                 <?php endif;?>
                 
            </td>
            <td><?php echo substr($row->description,0,40).'...';?>
             <a href="javascript:void(0)" onclick="display_message('<?php echo $row->id;?>','<?php echo $row->buyer_name;?>')"  title="Pereview Full">
             <i style="font-size:18px" class="fa">&#xf06e;</i></a>
              <span id="this_message_<?php echo $row->id;?>"  style="display:none;"><?php echo $row->description;?></span>
            </td>
            <td><?php echo date('d,M Y',strtotime($row->created_date));?></td>
         
         <td class="center">
        
         <?PHP 
            if($row->status==0)
            {
            	$class="label-danger";
            	$text='Inactive';
            }
            else
            {
           	 	$class="label-success";
            	$text='Active';
            } 
            $allocated = get_id_by_key('id','quick_request_id',$row->id,'tbl_buyrer_assigned_services')
            ?> 
            &nbsp;
            <?php if(! empty($allocated)):
		 	?>
			   
               <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Services Allocated'));?>" class="btn btn-warning btn-sm" 
                href="javascript:void(0)" style="cursor:default;">
               <i class="fa fa-tasks" aria-hidden="true"></i>
				Service Allocated 
            </a>
			<?php    
			else:
			?>
			 <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Assign services'));?>" class="btn btn-info btn-sm" href="javascript:void(0)" 
           onClick="assignservices('<?php echo $row->category_id;?>','<?php echo $row->buyer_id;?>','<?php echo $row->id;?>');">
               <i class="fa fa-tasks" aria-hidden="true"></i>
				Assign services
            </a>
			   
			   
		    <?php 	   
			endif;
			?>
          
            
            
            
             <input type="hidden" id="category_name_<?php echo $row->id;?>" value="<?php echo $row->category_name;?>">
             <input type="hidden" id="buyer_name_<?php echo $row->id;?>" value="<?php echo $row->buyer_name;?>">
                               
          <!--<span id="div_status_<?PHP echo $row->id;?>">
            <a id="anchor_<?PHP echo $row->id;?>" href="javascript:void(0);"  
            	onclick="changeStatus('<?PHP echo $row->id;?>','<?PHP echo $row->status;?>','<?php echo $this->tbl;?>');" >
            	<span class="label <?PHP echo $class;?>"><?PHP echo $text;?></span>
            </a>
         </span>  -->
        
        &nbsp;
           <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Delete'));?>" class="btn btn-danger btn-sm" href="javascript:void(0)" onClick="deleteRecord('<?php echo $row->id;?>','<?php echo $this->tbl;?>');">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                
            </a>
        
                                        
        </td>
    </tr>
    
		<?php }
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
   <div id="buyerMessageModal" class="modal fade" role="dialog">

  <div class="modal-dialog">

   <div class="modal-content">

      <div class="modal-header">

      <div class="clearfix">&nbsp;</div> 

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Buyer Message </h4>

      </div>

     

       

      <div class="modal-body">

          
                                 

      </div> 

       <div class="clearfix">&nbsp;</div> 

      <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	  </div>

    

    </div>



  </div>

</div>

  
  <div id="sendMessagetobuyer_modal" class="modal fade" role="dialog">

  <div class="modal-dialog">

   <div class="modal-content">

      <div class="modal-header">

      <div class="clearfix">&nbsp;</div> 

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Send Message to buyer </h4>

      </div>

      <form  id="sendmessagetobuyer_form" name="sendmessagetobuyer_form" role="form" >

        <span class="h_nouncef"></span>	

      <div class="modal-body">

      

           <input type="hidden" id="to_buyer" name="to_buyer" value="">
			<div class="clearfix">&nbsp;</div> 
			<div class="col-xs-4 col-md-12 col-sm-12">

            <label>Type Your Message</label>

            <textarea name="message" class="form-control tip" data-tip="tip-description" data-placement="right" placeholder="Type Message for Buyer" rows="3" data-original-title="" title=""></textarea>

            </div>

            

            <div class="clearfix">&nbsp;</div>  

                                 

      </div> 

       <div class="clearfix">&nbsp;</div> 

      <div class="modal-footer">

        <button type="button" class="btn   btn-success"  onclick="post_message()">Send Message</button>

        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

      </div>

      </form>

    </div>



  </div>

</div>

<div id="assignservices_modal" class="modal fade" role="dialog">

  <div class="modal-dialog">

   <div class="modal-content">

      <div class="modal-header">

      

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Assign services for -->Web Programming  </h4>

      </div>

      <form  id="assignservice_form" name="assignservice_form" role="form" >

       <span class="h_nouncef"></span>	

      <div class="modal-body">

            <div class="col-md-4">
                   
                    <div class="checkbox">
                        <label for="checkboxes-0">
                            <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">
                            Option one
                        </label>
                    </div>
                
                    
                </div>

       </div> 
	   <div class="clearfix">&nbsp;</div> 

      <div class="modal-footer">
        <input type="hidden" id="buyer_request_quick_id" name="buyer_request_quick_id" value="">
		<button type="button" class="btn   btn-success btn_allocate"  onclick="assign_service()">Allocate</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	</div>

      </form>

    </div>



  </div>

</div>

  <?php  getFooter(); ?>
<script>
$('#post_table').dataTable( {
  "ordering": false
} );
function display_message(id,buyername){
	
	var fetch_message = $("#this_message_"+id).html();
	$("#buyerMessageModal .modal-title").html('Message From Buyer <i class="fa fa-long-arrow-right"></i> <strong>'+buyername+'</strong>');
	
	$('#buyerMessageModal').modal('show');
	$('#buyerMessageModal .modal-body').html('<p>'+fetch_message+'</p>');
	return false;
	
}

function send_message(id,buyername){
	
	var fetch_message = $("#to_buyer").val(id);
	$("#sendMessagetobuyer_modal .modal-title").html('Send Message <i class="fa fa-long-arrow-right"></i> <strong>'+buyername+'</strong>');
	$('#sendMessagetobuyer_modal').modal('show');
	return false;
	
}
function assignservices(categoryid,buyerid,id){
	     
		$("#buyer_request_quick_id").val('');
		$("#assignservices_modal .modal-body").html('<i class="fa fa-cog fa-spin" style="font-size:24px"></i>');
		$('#assignservices_modal').modal('show');
		var category_name = $("#category_name_"+id).val();
		var buyer_name = $("#buyer_name_"+id).val();
		$("#buyer_request_quick_id").val(id);
		
		
		var quickreqid = $("#buyer_request_quick_id").val();
		//buyer_request_quick_id
		
		
		//var fetch_message = $("#to_buyer").val(id);
		$("#assignservices_modal .modal-title").html('Allocate service for <i class="fa fa-long-arrow-right"></i> <strong>'+category_name+'</strong>'+ '</br> To Buyer <i class="fa fa-long-arrow-right"></i> <strong>'+buyer_name+'</strong>' );
		
		jQuery.ajax({
			method:"POST",    
			url :'<?php echo base_url().'buyerquick/getfeaturedservices'; ?>',
			data:{'categoryid':categoryid,'buyerid':buyerid,'qreqid':quickreqid},
			success: function(response)
			{
				if(response!=''){ 
				    $(".btn_allocate").show();
					$("#assignservices_modal .modal-body").html(response);
				
				}
			}
		});	 
	return false;
	
  }

function assign_service()

	 {

		
        var post_url; 
		var formData = new FormData();
		post_url = '<?php echo base_url().'buyerquick/assignservice'; ?>'; 
		var other_data = $('#assignservice_form').serializeArray();
			$.each(other_data,function(key,input)
			{
				formData.append(input.name,input.value);
			}

		);  
 
		  
		$.ajax({

			url: post_url,
			type: 'POST',
			data: formData,
			dataType: "json",
			processData: false,
			contentType: false,
			beforeSend: function() 
			{
				$('#loader').removeClass('hidden');
			},

			success: function(data) {
				//alert('ddd'+data);
				//return false;
			$('#loader').addClass('hidden');
			$(".page-alert").removeClass('error');
			$(".page-alert").removeClass('success');
			if (data.status == 1)

            {   
 			$(".btn_allocate").hide();
			    showAlert(data.message,'Success','green');
				setTimeout(function(){
					 location.reload();
				},2000);
			}

           else if (data.status ==0)

            {  

				showAlert(data.message,title='Error','red');

				

            }

			else if (data.status == 2) 

            {   

			    showAlert(data.message,'Success','green');

				$("#education_form .edulisting").html(data.htmlrow);

				$("#education_form .h_nouncef").html('');

				//resetf( f_ );

			}

			else if (data.status == "validation_error")

            {    

			    showAlert(data.message,title='Error','red');

			}

			

           }

			

		   });

    }


 function post_message()

	 {

		
        var post_url; 
		var formData = new FormData();
		post_url = '<?php echo base_url().'buyerquick/sendmessage'; ?>'; 
		var other_data = $('#sendmessagetobuyer_form').serializeArray();
			$.each(other_data,function(key,input)
			{
				formData.append(input.name,input.value);
			}

		);  
 
		  
		$.ajax({

			url: post_url,
			type: 'POST',
			data: formData,
			dataType: "json",
			processData: false,
			contentType: false,
			beforeSend: function() 
			{
				$('#loader').removeClass('hidden');
			},

			success: function(data) {
				//alert('ddd'+data);
				//return false;
			$('#loader').addClass('hidden');
			$(".page-alert").removeClass('error');
			$(".page-alert").removeClass('success');
			if (data.status == 1)

            {   

			    showAlert(data.message,'Success','green');
				setTimeout(function(){
					 location.reload();
				},2000);
			}

           else if (data.status ==0)

            {  

				showAlert(data.message,title='Error','red');

				

            }

			else if (data.status == 2) 

            {   

			    showAlert(data.message,'Success','green');

				$("#education_form .edulisting").html(data.htmlrow);

				$("#education_form .h_nouncef").html('');

				//resetf( f_ );

			}

			else if (data.status == "validation_error")

            {    

			    showAlert(data.message,title='Error','red');

			}

			

           }

			

		   });

    }


</script>
  
  
  
  