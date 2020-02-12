<?php getHead();?>




    <div class="content-wrapper">
       
        <section class="content-header">
            <h1>
          			Paystack Transfer Status  
            
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
	

		    $obj = json_decode($this->session->userdata('paystack_paymentresponse'));
			$aMessage ='';
			if(! empty($obj))
			{
				
				/***************************/
				$aTransfercode = array();
				$aRecipient = array();
				$aAmount = array();
				$aStatus = array();
				$aEmails = array();
				$aEmails_backendwork = array();
				$amountconvertedtoUSD = array();
				$aStatus_backendwork = array(); 
				
				
				 if(isset($obj->status) AND ($obj->status==true))
				 {
				   if(isset($obj->data) AND is_array($obj->data) AND (count($obj->data) > 0))  
				   {
						for($index = 0 ; $index < count($obj->data); $index++)
						{
							
						  $instance = $obj->data;
						  $aRecipient[] =  '"'.$instance[$index]->recipient.'"';
						  $aAmount[] =  $instance[$index]->amount;
						  $aTransfercode[] =  $instance[$index]->transfer_code;
						  $aStatus[] =  PAID;
						}   
					    
						$aRecipientstr = implode(',', $aRecipient);
				        $emailsqlq = $this->db->query("SELECT PRP.email,PRP.amount,PRP.amount_unit,PRP.user_id FROM `tbl_paystack_user_info` AS TPUI 
						INNER JOIN `payment_requests_paystack` AS PRP ON TPUI.user_id = PRP.user_id 
						WHERE TPUI.recepient_no IN ( ".$aRecipientstr.") AND PRP.status = ".PENDING."");
					
					
					
						if (count($emailsqlq->result()) > 0) 
						{
							foreach ($emailsqlq->result() as $row) 
							{
								$aEmails_backendwork[] =  $row->email;
								$aAmount_backend[] =  $row->amount;
								$aStatus_backendwork[] =  PAID;
								$aUser_id[] =  $row->user_id;
								$aAmount_unit[] =  $row->amount_unit;
							
							}		
					   	}
					
					   updatepaidstatusPaystack($aStatus_backendwork ,$aAmount_backend,$aEmails_backendwork ,$aUser_id,$aAmount_unit); 
						
						
					}      
				 }
				 else
				
				 if(isset($obj->status)  AND  (empty($obj->status)))
				 {
					  
					  $aMessage =  '<p class="error_pp">'.$obj->message.' '.$obj->data[0].'</p>' ;     
					 
				 }
				
				 /***************************/ 
				
				
				
				 //VALIDATION_ERROR
				
				  
				 $this->session->set_userdata('paystack_paymentresponse', '');
			 ?>
					
		  <div  class="box" style="padding: 0px 0px 0px 30px;">
					   
				  
			<p></p>
					   <p>   <img src="<?php echo base_url().'assets/paystck-logo.png'?>" class="paypalc"></p>
					  <hr/>
					  
					  <?php 
					  
					  if( ! empty($aMessage))
					  {
						 echo $aMessage; 
						 
					  }
					  else
					  {
					  ?>
					<table id="resultstbale" >
					  <thead>
						 <tr class="head headstyle" style="border-bottom: 1px solid #ccc;" height="25">
							<th style="width: 9%;" width="368"> &nbsp;ID</th>
							<th style="width: 27%;" width="368"> &nbsp;Transaction No</th>
							<th style="width: 27%;" width="368"> &nbsp;Recipient No</th>
							<th style="width: 16%;" width="368"> &nbsp;Amount</th>
							<th width="123"> Status</th>
						  </tr>
					  </thead>
					  <tbody>
					  <?php 
					  
					  if(is_array($aRecipient) AND (count($aRecipient) > 0))
					  {
					   $counter = 1;
					   for($index = 0; $index < count($aRecipient); $index++)
					   {
							$class = 'even';	 
							if($counter%2==0)
							{
								$class = '';	
							}
							?>
							<tr class="<?php echo $class;?>">
								<td >&nbsp;<?php echo $counter;?></td>
								<td class="<?php echo 'paid';?>"><?php echo $aTransfercode[$index];?></td>
								  <td><?php echo $aRecipient[$index];?></td>
								<td><?php echo ($aAmount[$index]/100);?> NGN</td>
								
								<td class="<?php echo 'paid';?>"><?php echo 'Paid';?></td>	
							</tr>
					  <?php 
							
							$counter++;
						 }
					  
					  }
					
						 
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
              <div class='back_btn'><a  href='<?php echo base_url();?>paystack_payment_requests' id= 'btn'><< <strong>Back to Request Page</strong></a></div>
                 
                 </div>
               </div>
           </section>      
       </div>
   <?php  getFooter(); ?>
  
  

