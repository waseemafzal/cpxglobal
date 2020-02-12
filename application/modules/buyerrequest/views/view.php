<?php getHead(); ?>
   
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
        <th>Category</th>
        <th>Buyer</th>
        
        <th>Price - Delievry </th>
        <th>Description </th> 
        <th>Date </th> 
        <th>Actions</th>
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
            <td><?php echo $row->buyer_name;?></br>
            <!-- <a href="javascript:void(0)" onclick="send_message('<?php //echo $row->id;?>','<?php //echo $row->buyer_name;?>')" title="send message">
             <i style="font-size:18px" class="fa">&#xf1d9;</i></a>-->
            </td>
          
            <td><?php echo $row->price;?> <span style="color:#06F;"> - </span><?php echo $row->delievry;?>
                <a href=" <?php echo base_url().'uploads/buyer/'.$row->require_doc;?>"  title="Download attachment"  target="_blank">
                 <i class="fa fa-paperclip" aria-hidden="true"></i></a>
            </td>
            <td><?php echo substr($row->description,0,15).'...';?>
             <a href="javascript:void(0)" onclick="display_message('<?php echo $row->id;?>','<?php echo $row->buyer_name;?>')"  title="Pereview Full">
             <i style="font-size:18px" class="fa">&#xf06e;</i></a>
              <span id="this_message_<?php echo $row->id;?>"  style="display:none;"><?php echo $row->description;?></span>
            </td>
            <td><?php echo date('d/m/Y H:i:s',strtotime($row->created_date));?></td>
         
         <td class="center">
        
         <?PHP 
           $class="label-danger";
			if($row->status==0 )
            {
			   $text='Pending';
			}
			else
			if($row->status==3 )
            {
			   $text='Cancel';
			}
			else
            {
           	 	$class="label-success";
            	$text='Active';
            } 
            
            ?> 
            
     
        
                <div class="input-group-btn ">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> 
                    <span class="caret"></span> 
                    </button>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);" style="color:#F00;" 
                        onClick="deleteRecord('<?php echo$row->id;?>','<?php echo $this->tbl;?>');"><u>Delete</u></a></li>
                        <li><a href="javascript:void(0);" onClick="setrequeststatus('<?php echo $row->id;?>','3');">Cancel</a></li>
                        <li><a href="javascript:void(0);" onClick="setrequeststatus('<?php echo $row->id;?>','0');">Pending</a></li>
                        <li><a href="javascript:void(0);" onClick="setrequeststatus('<?php echo $row->id;?>','1');">Active</a></li>
                    </ul>
                </div>
                    <span id="div_status_<?PHP echo $row->id;?>">
                    	<span class="label <?PHP echo $class;?>"><?PHP echo $text;?></span>
                    </span>  
                                      
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


 function post_message()

	 {

		
        var post_url; 
		var formData = new FormData();
		post_url = '<?php echo base_url().'buyerrequest/sendmessage'; ?>'; 
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
	
	
	function setrequeststatus(id,status) {
			
			 $("#div_status_"+id).html('<i class="fa fa-cog fa-spin" style="font-size:24px"></i>');
			 jQuery.ajax({
				method:"POST",    
				url :'<?php echo base_url().'buyerrequest/setrequeststatus'; ?>',
				data:{'id':id,'status':status},
				success: function(response){
						if(response!=''){ 
							$("#div_status_"+id).html(response);
						
					  }
					  
					  
					
				}
			});	 
		
		}



</script>
  
  
  
  