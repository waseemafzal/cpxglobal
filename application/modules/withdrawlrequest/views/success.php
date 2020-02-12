<?php getHead();?>


    <div class="content-wrapper">
       
        <section class="content-header">
            <h1>
          Transaction Payment Status 
            
            </h1>
            <ol class="breadcrumb">
            </ol>
        </section>
     <section class="content">
    <div class="row">
    <style type="text/css">
	  #resultstbale {width: 97%;}
	  .headstyle{border-bottom: 1px solid #ccc; font-size: 13px;
background: #3c8dbc;
color: #fff;}
 #resultstbale tr td{font-size: 13px;}


.even{background: #ddd;}
.paid{color: green;
font-weight: bold;}
.fail{color: red;
font-weight: bold;}	
.error_pp{color: red;
font-weight: bold;}  
	  
    </style>
            
       <?php   
            $obj = $this->session->userdata('payout_paymentresponse');
			
			if(! empty($obj))
			{
			
		    $error_message = '';
			$emails = array();
			$aMessage='';
			
			
			if(isset($obj->name) AND $obj->name=='INSUFFICIENT_FUNDS')
			{
			  
			  $aMessage =  '<p class="error_pp">'.$obj->message.'</p>';
			}
			else
			if(isset($obj->error) AND $obj->error=='invalid_token')
			{
				$aMessage =  '<p class="error_pp">'.$obj->error_description.'</p>';		
			}
			
			//VALIDATION_ERROR
			if(isset($obj->name) AND $obj->name=='VALIDATION_ERROR')
			{
			  $aMessage =  '<p class="error_pp">'.$obj->details.'</p>';	
			}
			else
			if(isset($obj->error) and ($obj->error=='invalid_token'))
			{
			  $aMessage =  '<p class="error_pp">'.$obj->error_description.'</p>';	
			}
			else
			if(isset($obj->name) and ($obj->name=='MALFORMED_REQUEST'))
			{
					
				$aMessage =  '<p class="error_pp">Batch ID already exist.</p>' ;
			}
			else
			if(isset($obj->items) and is_array($obj->items))
			{ 
				 $adetailMsg = array();
				 $aMessage = array();
				 $error_message .='';
				 $aStatus = array();
				  for($index = 0 ; $index < sizeof($obj->items); $index++)
					{
						
						$instance = $obj->items[$index];
						$email = $instance->payout_item->receiver;
						$amount = $instance->payout_item->amount->value.' '.$instance->payout_item->amount->currency;
						if($instance->transaction_status=='UNCLAIMED')
						{
						   if(isset($instance->errors))
							{
								if(isset($instance->errors->name) and   $instance->errors->name =='RECEIVER_UNREGISTERED')
								{
									$adetailMsg[] ='<p class="fail" style="font-size: 11px;">This receiver email ID does not belong to Paypal.</p>'; 
									$aMessage[] = 0;  
									$aStatus[] = CANCELLEDPAYPAL;  
								} 
							}
						}
						else
						if(($instance->transaction_status=='SUCCESS') or ($instance->transaction_status=='PENDING')) // 
						{
							$adetailMsg[] ='';
							$emails[] =  $email = $instance->payout_item->receiver;	 // update in database
							$aPaidmount[] = $instance->payout_item->amount->value; // update in database
							$aMessage[] =1;  
							$aStatus[] = PAID;   
						}
					    else
						if($instance->transaction_status=='FAILED') // 
						{
							$adetailMsg[] ='<p class="fail" style="font-size: 11px;">Processing failed</p>'; 
							$aMessage[] = 0;
							$aStatus[] = CANCELLEDPAYPAL;  
						}
						
						 $tranacationID[] = $instance->transaction_id; 
						 $eRmails[] = $instance->payout_item->receiver; // display records
						 $aPayout_item_fee[] =  $instance->payout_item_fee->value; // display records
						 $aTransaction_id[] =  $instance->transaction_id; // display records
						 $aAmount[] = $instance->payout_item->amount->value	; // display records
					} 
					
					
				
			
					
					updatepaidstatus($aStatus ,$aAmount,$eRmails); // process
			}
		
         ?>
                
      <div  class="box" style="padding: 0px 0px 0px 30px;">
                   
              
        <p></p>
                   <p>   <img src="<?php echo base_url().'assets/paypal-logo.svg'?>" class="paypalc"></p>
                  <hr/>
                  
                  <?php 
				   if( ! is_array($aMessage))
				   {
					 echo $aMessage; 
					 
				  }
				  else
				  {
				  ?>
                     <table id="resultstbale" >
                  <thead>
                     <tr class="head headstyle" style="border-bottom: 1px solid #ccc;/*! height: 15px; */" height="25">
                          <th style="width: 9%;" width="368"> &nbsp;ID</th>
                          <th style="width: 27%;" width="368"> &nbsp;Receviers</th>
                          <th style="width: 35%;" width="368"> &nbsp;Detail</th>
                          <th style="width: 16%;" width="368"> &nbsp;Amount</th>
                          <th style="width: 18%;" width=""> Cost us</th>
                          <th width="123"> Status</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php 
				  
				  if(count($tranacationID) > 0)
				  {
				   $counter = 1;
				   for($index = 0; $index < count($tranacationID); $index++)
				   {
						$class = 'even';	 
						if($counter%2==0)
						{
							$class = '';	
						}
						
						if($aMessage[$index] == 0)
						{
							$statusTxt = 'Fail';
							$statusclass= 'fail';	
						}
						else
						if($aMessage[$index] == 1)
						{
							$statusTxt = 'Paid';
							$statusclass= 'paid';
						}
						?>
						<tr class="<?php echo $class;?>">
                            <td >&nbsp;<?php echo $counter;?></td>
                            <td class="<?php echo $statusclass;?>">
							 <?php echo $eRmails[$index];?></td>
                              <td><?php echo $adetailMsg[$index];?></td>
                            <td><?php echo $aAmount[$index];?> $</td>
                            <td><?php echo $aPayout_item_fee[$index];?> $</td>
                            <td class="<?php echo $statusclass;?>"><?php echo $statusTxt;?></td>	
						</tr>
			      <?php 
                  $counter++;
                }
               }
			    
				 $this->session->set_userdata('payout_paymentresponse', '');
             ?>
                   
                  </tbody>
              </table>

   			 	  <?php 
				  }
   }
   else
   {
	 echo '<p>Expire.......</p>';   
   }
   
   
   ?>
              <div class='back_btn'><a  href='<?php echo base_url();?>paypal_payment_requests' id= 'btn'><< <strong>Back to Request Page</strong></a></div>
                 
                 </div>
               </div>
           </section>      
       </div>
   <?php  getFooter(); ?>
  
  
  

  
