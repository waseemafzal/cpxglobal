<?php getHead();?>
   <style>
	.chat_claas{
		border-top: 1px solid #d2d6de;
		border-left: 1px solid #d2d6de;
		border-right: 1px solid #d2d6de;
		width: 100%;
		height: 400px;
		padding-top: 15px;
		overflow-y: auto;
		box-shadow: 0 1px 1px rgba(0,0,0,0.1);
	}
	.chat_claas ul{
		padding: 0px;
		list-style: none;
	}
	
	.admin_otherc{ color:#939;}
	.chat_claas ul li{}
	.userclass{}
	.disputetitle{font-size: 16px;
color: #3c8dbc;}
.preasont{font-size: 12px;
}
.adminp{border: 1px;
border-radius: 50px;
border: 1px solid #d2d6de;
padding: 20px;
background: aliceblue;}

.otherp{border: 1px;
border-radius: 50px;
border: 1px solid #d2d6de;
padding: 20px;
background:blanchedalmond;}


.fr{ float:right;}
.fr{ float:right;}
.mrl{margin:0px 0px 0px 10px;}
.notep{font-size: 11px;
color: chocolate;}
.enable{ display:block; background:green; height:10px; width:10px;}
.disable{display:block; background:red; height:10px; width:10px;}
   </style>
<div class="content-wrapper">
    <section class="content-header">
    
      <h1>
      
         Dispute Conversation:
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li > <a href="<?php echo base_url() ?>disputedorder">Back </a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
    <?php
	
	$buyername = '';
	$buyer_from_id  = '';

      if(count($disputechatdata->achatbuyer) > 0)
	  {
		foreach($disputechatdata->achatbuyer as $buyerchatkeys)
		{
		  if($buyerchatkeys->from_id !=ADMIN)
		  {
			$buyername =  $buyerchatkeys->from_name;  
			$buyer_to_id =  $buyerchatkeys->from_id; 
			break;
		  }
		} 
	  }
		$sellername = '';
		$seller_to_id = '';
	  
	 if(count($disputechatdata->achatseller) > 0)
	  {
		foreach($disputechatdata->achatseller as $sellerchatkeys)
		{
		  if($sellerchatkeys->from_id !=ADMIN)
		  {
			$sellername =  $sellerchatkeys->from_name; 
			$seller_to_id =  $sellerchatkeys->from_id;  
		      break;
		  }
		  	
		}
	  }
		$ordercompleteprice  = calculateprocessingformula($orderdispute->amount ,true);
				
	  
		?>
            <!-- /.box-header -->
            <div class="box-body">
             
             <div class="alert hidden"></div>
                    <div class="form-group wrap_form">
                    <?php ?>
                    <h3>Order Reference #:<?php if(isset($orderdispute->orderNo)) echo $orderdispute->orderNo;?>   
                  
                    
                    <button type="submit" class="btn btn-warning fr mrl "  
                    onclick="closedisputeresetorder('<?php echo $orderdispute->id;?>','<?php echo $orderdispute->dispute_id;?>');">Close Dispute and Do Reset </button>
                    
                      <button type="submit" class="btn btn-info fr" data-toggle="modal" data-target="#myModal">Refund  Payment</button>
                    </h3>
                    <h4>Dispute Title: <span class="disputetitle"> <?php if(isset($orderdispute->dispute_title)) echo $orderdispute->dispute_title;?> </span></h4>
                  <div class="clearfix">&nbsp;</div>
                  
                 
                    <div class="col-xs-12 col-md-6">
                     <?php 
				   if(count($disputechatdata->achatbuyer) > 0)
	  				{
				   ?>
                      <label for="exampleInputEmail1"> Buyer: (<a href="#"><?php echo $buyername;?></a>)</label>
                        <div class="col-md-12 chat_claas">
                          <ul id="buyer_ul">
                          <?php 
							foreach($disputechatdata->achatbuyer as $buyerchatkeys)
							{
								$aclass='otherp';
								$anchorclass="admin_otherc";
								if($buyerchatkeys->from_id ==ADMIN)
								{
									$aclass='adminp';
									$anchorclass="admin_c";
								}
							?>		  
                            <li><p class="<?php echo $aclass;?>">
                            <a href="#"  class="<?php echo $anchorclass;?>">
							<?php echo $buyerchatkeys->from_name;?>: </a><?php echo $buyerchatkeys->message;?></p></li>
                            <li>&nbsp;</li>
							<?php
							  }
							?>
                                
                          </ul>
                           
                        </div>
                            <form id="form_buyer_message_panel" name="form_buyer_message_panel" role="form">
                                <input type="hidden"  name="from_id" value="<?php echo ADMIN;?>">
                                <input type="hidden"  name="to_id" value="<?php echo $buyer_to_id;?>">
                                <input type="hidden"  name="disputed_id" value="<?php echo $orderdispute->dispute_id;?>">
                                 <input type="hidden"  name="type" value="<?php echo BUYER;?>">
                                <textarea class="form-control" id="admin_messge"  name="admin_messge" placeholder="Type message to send buyer"></textarea>
                                <div class="clearfix">&nbsp;</div>
                                <button type="submit" class="btn btn-info">Send Reply</button>
                            </form>
                       <?php 
					   }
					   else
					   {
					   ?>
                      	<p>No reply yet from  Buyer against this dispute.</p>
					   <?php 
					    }
					   ?>
                    </div>
                    
                 
                 
                
                    <div class="col-xs-12 col-md-6">
                       <?php 
				   if(count($disputechatdata->achatseller) > 0)
	  				{
				   ?>
                      <label for="exampleInputEmail1"> Seller: (<a href="#"><?php echo $sellername;?></a>)</label>
                        <div class="col-md-12 chat_claas">
                          <ul id="seller_ul">
                           <?php 
							foreach($disputechatdata->achatseller as $sellerchatkeys)
							{
								$aclass='otherp';
								$anchorclass="admin_otherc";
								if($sellerchatkeys->from_id ==ADMIN)
								{
									$aclass='adminp';
									$anchorclass="admin_c";
								}
							?>		  
                            <li><p class="<?php echo $aclass;?>">
                            <a href="#"  class="<?php echo $anchorclass;?>">
							<?php echo $sellerchatkeys->from_name;?>: </a><?php echo $sellerchatkeys->message;?></p></li>
                            <li>&nbsp;</li>
							<?php
							  }
							?>
                          </ul>
                           
                        </div>
                       
                            <form id="form_seller_message_panel" name="form_seller_message_panel" role="form">
                                <input type="hidden"  name="from_id" value="<?php echo ADMIN;?>">
                                <input type="hidden"  name="to_id" value="<?php echo $seller_to_id;?>">
                                <input type="hidden"  name="disputed_id" value="<?php echo $orderdispute->dispute_id;?>">
                                  <input type="hidden"  name="type" value="<?php echo SELLER;?>">
                                <textarea class="form-control" id="admin_messge"  name="admin_messge"  placeholder="Type message to send seller"></textarea>
                                <div class="clearfix">&nbsp;</div>
                                <button type="submit" class="btn btn-info">Send Reply</button>
                            </form>
                             <?php 
							 }
							 else
							 {
							 ?>
                             <p>No reply yet from  Seller against this dispute.</p>
                             <?php 
							 }
							 ?>  
                    </div>
                    
                 
                    
                    
             </div>
            <div class="clearfix">&nbsp;</div>
               
               
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
  
  
  <?php 
  
  	    $getbuyerrrecipeinet = $checkforbuyer  = get_id_by_key('recepient_no','user_id',$buyer_to_id,'tbl_paystack_user_info' );
		$getsellerrecipeinet = $checkforseller = get_id_by_key('recepient_no','user_id',$seller_to_id,'tbl_paystack_user_info' );
		$buyerpaymentsettingstatus='disable';	
		if(!empty($checkforbuyer)) 
		{ 
			$buyerpaymentsettingstatus='enable';	
		}
		
		$sellerpaymentsettingstatus='disable';	
		if(!empty($checkforseller))
		{
			$sellerpaymentsettingstatus='enable';	
		}
 	
   //$  
  ?>
  
  <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
	buyername sellername
            
  
     <div class="modal-content" style="padding:10px;">
     
        <div class="col-xs-12 col-md-6">
                <label for="exampleInputEmail1">Payment Refund Option</label>
                    <select class="form-control" onchange="choosepaymentmethod(this.value)" >
                        <option value="">Choose Payment Method </option>
                        <option value="Paypal"  >Paypal</option>
                        <option value="Paystack"  >Paystack</option>  
                    </select>
                    </br>
        </select>

            </div>
            <div class="clearfix">&nbsp;</div>
      <!----Paystack----->      
     <form id="form_skill_squared_kjnsdjnhsdjs87sd8s7d8s7d_paystack" name="form_skill_squared_kjnsdjnhsdjs87sd8s7d8s7d_paystack" role="form" 
      style="display:none;">
             
    
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title sbmitwork">Transfer money/ Refund via Paystack</h4>
      </div>
      
           <div class="modal-body">  
  
           <div class="form-group">
           <label for="exampleInputEmail1"> Refund Payment to:</label>  
            
            <label for="exampleInputEmail1"> Seller (<?php echo $sellername;?>)<span class="<?php echo $sellerpaymentsettingstatus;?>"></span></label>
            <input type="radio" name="paymentto" value="<?php echo $seller_to_id.'|'.$getsellerrecipeinet;?>" />  &nbsp;  &nbsp;
            <label for="exampleInputEmail1"> Buyer (<?php echo $buyername;?>) <span class="<?php echo $buyerpaymentsettingstatus;?>"></span></label>
            <input type="radio" name="paymentto" value="<?php echo $buyer_to_id.'|'.$getbuyerrrecipeinet;?>" /> 
           </div>
        	 
        <div class="form-group">
         <label><i class="fa fa-bank"></i></span> Paystack Email <span class="mendt"></span></label>
         <input type="email" name="paystack_email" id="paystack_email" value="" class="form-control"  placeholder="user-paypal@gmail.com" required="required" />
         <span class="notep">Note:email just to acknowledege user.</span>
        </div>
        
        <div class="form-group">
            <label><i class="fa fa-money"></i></span> Amount of order for to send/refund. </label>
            <input type="hidden" name="order_id_hidden" id="order_id_hidden" value="<?php echo $orderdispute->id;?>" class="form-control"  />
            <input type="text" name="paystack_amount" id="paystack_amount" 
            value="<?php echo $ordercompleteprice;?>" class="form-control " maxlength="7"  placeholder="100" required="required"/>
            <span class="notep">Note:This amount is without 10% deduction for Skillsqaurd</span>
        </div>
       
        <div class="">&nbsp;</div>
      
           <div class="modal-footer">
        <button type="button" class="btn btn-default btn-small" data-dismiss="modal">Close</button>
        

        <input type="submit" class="btn btn-success btn-small btn_transfer_ps" value="Process Refund">
        
      </div>
    </div>
    </form>
    
    
    
    <!------Paypal-------->
    <form id="form_skill_squared_kjnsdjnhsdjs87sd8s7d8s7d" name="form_skill_squared_kjnsdjnhsdjs87sd8s7d8s7d" role="form"  style="display:none;">
             
    
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title sbmitwork">Transfer money/ Refund Paypal</h4>
      </div>
      
           <div class="modal-body">
           
           <div class="form-group">
           <label for="exampleInputEmail1"> Refund Payment to:</label>  
            
            <label for="exampleInputEmail1"> Seller (<?php echo $sellername;?>)</label>
            <input type="radio" name="paymentto" value="<?php echo $seller_to_id?>" />  &nbsp;  &nbsp;
            <label for="exampleInputEmail1"> Buyer (<?php echo $buyername;?>)</label>
            <input type="radio" name="paymentto" value="<?php echo $buyer_to_id?>" /> 
           </div>
           
        
        <div class="form-group">
         <label>Paypal Email <span class="mendt"><i class="fa fa-paypal"></i></span></label>
         <input type="email" name="payal_email" id="payal_email" value="" class="form-control"  placeholder="user-paypal@gmail.com" required="required" />
         <span class="notep">Note:Enter a valid paypal email.</span>
        </div>
        
        <div class="form-group">
            <label><i class="fa fa-money"></i> Amount of order for to send/refund. </label>
            <input type="hidden" name="order_id_hidden" id="order_id_hidden" value="<?php echo $orderdispute->id;?>" class="form-control"  />
            <input type="text" name="payal_amount" id="payal_amount" 
            value="<?php echo $ordercompleteprice;?>" class="form-control " maxlength="7"  placeholder="100" required="required"/>
            <span class="notep">Note:This amount is without 10% deduction for Skillsqaurd</span>
        </div>
       
        <div class="">&nbsp;</div>
      
           <div class="modal-footer">
        <button type="button" class="btn btn-default btn-small" data-dismiss="modal">Close</button>
        

        <input type="submit" class="btn btn-success btn-small btn_transfer"  value="Process Refund">
        
      </div>
    </div>
    </form>
    </div>
    </div>
  
 <script src="assets/bower_components/ckeditor/ckeditor.js"></script>
 <script type="text/javascript">

  $(function () {
    CKEDITOR.replace('editor1');
 
  
});
</script>
  <script>
  /**********************************save************************************/
	
    function choosepaymentmethod (val)
	 {
		if(val=='Paypal') 
		{
			$("#form_skill_squared_kjnsdjnhsdjs87sd8s7d8s7d").show();
			$("#form_skill_squared_kjnsdjnhsdjs87sd8s7d8s7d_paystack").hide();
		}
		else
		if(val=='Paystack')
		{   
			$("#form_skill_squared_kjnsdjnhsdjs87sd8s7d8s7d").hide();
			$("#form_skill_squared_kjnsdjnhsdjs87sd8s7d8s7d_paystack").show();  
		}
		  
		 
	 }
 
 
  /******************************/
    $('#form_buyer_message_panel').on("submit",function(e) {
		
			e.preventDefault();	
			var formData = new FormData();
			var other_data = $('#form_buyer_message_panel').serializeArray();
				$.each(other_data,function(key,input)
				{
					formData.append(input.name,input.value);
				}
			);   
			
		    $.ajax({
			type: "POST",
			url: "<?php echo base_url().'disputeconversation/sendreplybyadmin'; ?>",
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
			$('#form_buyer_message_panel .btn_au').removeClass('hidden');
			//alert(data.status);
			//var obj = jQuery.parseJSON(data);
            if (data.status == 1)
            {   
			  
			  $('#form_buyer_message_panel #admin_messge').val('');
			  $("#buyer_ul").append(data.message);
				var $chat = $(".chat_claas");
				$chat.scrollTop($chat.height());
			 	
            }
           else if (data.status ==0)
            {  
			
				setTimeout(function(){
				$(".alert").addClass('hidden');
				},3000);
				showAlert(data.message,title='Error','red');
            }
			else if (data.status == 2)
            {   
			
				showAlert(data.message,'Success','green');
				setTimeout(function(){
				location.reload();
				},1000);
            }
			else if (data.status == "validation_error")
            {   
			
				showAlert(data.message,title='Error','red');
				
            }
			
           }
	 });

	//ajax end    
    });

   $('#form_seller_message_panel').on("submit",function(e) {
			e.preventDefault();	
			var formData = new FormData();
			var other_data = $('#form_seller_message_panel').serializeArray();
				$.each(other_data,function(key,input)
				{
					formData.append(input.name,input.value);
				}
			);   
			
		    $.ajax({
			type: "POST",
			url: "<?php echo base_url().'disputeconversation/sendreplybyadmin'; ?>",
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
			$('#form_seller_message_panel .btn_au').removeClass('hidden');
			//alert(data.status);
			//var obj = jQuery.parseJSON(data);
            if (data.status == 1)
            {   
			  
			  $('#form_seller_message_panel #admin_messge').val('');
			  $("#seller_ul").append(data.message);	
				
            }
           else if (data.status ==0)
            {  
			
				setTimeout(function(){
				$(".alert").addClass('hidden');
				},3000);
				showAlert(data.message,title='Error','red');
            }
			else if (data.status == 2)
            {   
			
				showAlert(data.message,'Success','green');
				setTimeout(function(){
				location.reload();
				},1000);
            }
			else if (data.status == "validation_error")
            {   
			
				showAlert(data.message,title='Error','red');
				
            }
			
           }
	 });

	//ajax end    
    });
	 
	 $('#form_skill_squared_kjnsdjnhsdjs87sd8s7d8s7d').on("submit",function(e) 
	  {
		e.preventDefault();	
		var formData = new FormData();
		var other_data = $('#form_skill_squared_kjnsdjnhsdjs87sd8s7d8s7d').serializeArray();
		$.each(other_data,function(key,input){
			formData.append(input.name,input.value);
		});   
		 $(".btn_transfer").prop('disabled',true);   
	$.confirm({
	title: 'Confirmation!',
	content: 'Are you sure to continue.?',
	animation: 'zoom',
	closeAnimation: 'scale',
	autoClose: 'cancel|5000',
	type: 'red',
	buttons: {
		
		 deleteUser: {
			text : 'Yes',
			btnClass: 'btn-primary',
			action: function () {
			
		    $.ajax({
			type: "POST",
			url: "<?php echo base_url().'disputeconversation/refund_payment_to_paypal'; ?>",
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
			
			if (data == 1)
            {    $(".btn_transfer").prop('disabled',false);  
				 window.location='<?php echo base_url().'Disputeconversation/processsuccesspaypal'; ?>';
			}
           else
		   { 
			    $(".btn_transfer").prop('disabled',false);  
				setTimeout(function(){
				 $(".alert").addClass('hidden');
				},3000);
				showAlert('some thing went wrong/or check the sender',title='Error','red');
            }
			
			
           }
	  });
        
	  }
   },
		cancel: function () {
			  $(".btn_transfer").prop('disabled',false); 
			text : 'Yes'
		},
      }
	//ajax end    
    });
	
	});
	 
	 
	 
     
      $('#form_skill_squared_kjnsdjnhsdjs87sd8s7d8s7d_paystack').on("submit",function(e) 
	  {
		e.preventDefault();	
		var formData = new FormData();
		var other_data = $('#form_skill_squared_kjnsdjnhsdjs87sd8s7d8s7d_paystack').serializeArray();
		$.each(other_data,function(key,input){
			formData.append(input.name,input.value);
		});   
		 $(".btn_transfer_ps").prop('disabled',true);   
	$.confirm({
	title: 'Confirmation!',
	content: 'Are you sure to continue.?',
	animation: 'zoom',
	closeAnimation: 'scale',
	autoClose: 'cancel|5000',
	type: 'red',
	buttons: {
		
		 deleteUser: {
			text : 'Yes',
			btnClass: 'btn-primary',
			action: function () {
			
		    $.ajax({
			type: "POST",
			url: "<?php echo base_url().'disputeconversation/refund_payment_via_paystack'; ?>",
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
			
			if (data == 1)
            {    $(".btn_transfer_ps").prop('disabled',false);  
				 window.location='<?php echo base_url().'Disputeconversation/processsuccesspaystack'; ?>';
			}
           else
		   { 
			    $(".btn_transfer_ps").prop('disabled',false);  
				setTimeout(function(){
				 $(".alert").addClass('hidden');
				},3000);
				showAlert('some thing went wrong/or check the sender',title='Error','red');
            }
			
			
           }
	 });
        
		
		}
        },
		cancel: function () {
			  $(".btn_transfer_ps").prop('disabled',false); 
			text : 'Yes'
		},
      }
	//ajax end    
    });
	
	});
	 
	 
	
	
	
	
	
  </script>

  
