<?php getHead();?>





    <div class="content-wrapper">

       

        <section class="content-header">

            <h1>

            Transaction Payment Status

            

            </h1>

            <ol class="breadcrumb">

           <?php /*?> <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>

           

            <li><a href="<?php echo base_url() ?>paypal_payment_requests"><i class="fa fa-money"></i> Payment Request</a></li><?php */?>

            

            </ol>

        </section>

     <section class="content">
<style type="text/css">
 .sucess_pp{ color:#390;  font-weight:bold;}
 .error_pp{ color:#F00;  font-weight:bold;}
</style>
    <div class="row">

            

                

      <div  class="box" style="padding: 0px 0px 0px 30px;">

                   

                    <hr/>

          <?php
				 
					 $obj = $this->session->userdata('payout_paymentresponse');
				
					
					$error_message = '';
	$emails = array();
	if(isset($obj->error) and ($obj->error=='invalid_token'))
	{
	  $error_message =  '<p class="error_pp">'.$obj->error_description.'</p>';	
	}
	else
	if(isset($obj->name) and ($obj->name=='MALFORMED_REQUEST'))
	{
			
		$error_message =  '<p class="error_pp">Batch ID already exist.</p>' ;
	}
	else
	if(isset($obj->items) and is_array($obj->items))
	{ 
		
		  for($index = 0 ; $index < sizeof($obj->items); $index++)
			{
			
				$instance = $obj->items[$index];
				$email = $instance->payout_item->receiver;
				$amount = $instance->payout_item->amount->value.' '.$instance->payout_item->amount->currency;
				if($instance->transaction_status=='UNCLAIMED')
				{
				
					$error_message .='';
					if(isset($instance->errors))
					{
						if(isset($instance->errors->name) and   $instance->errors->name =='RECEIVER_UNREGISTERED')
						{
							$error_message .='<p class="error_pp">This receiver email ID '.$email.' does not belong to Paypal.</p>';   
						} 
					}
				}
				else
				if($instance->transaction_status=='SUCCESS') // 
				{
				
					$emails[] =  $email = $instance->payout_item->receiver;	
					$error_message .='<p class="sucess_pp">This payment of worth "'.$amount.'" sent successfully to this receiver email ID '.$email.'</p>';   
				}
				
			}
	
   }

echo $error_message;
echo "</br>";
					
					
			echo "<h3 id='success'>Payment Successful</h3>";
			?>

                      

             <!--<table width="691" id="results" >

                  <thead>
					<tr class="head" style="border-bottom: 1px solid #ccc;">
						<th width="368">Receviers</th>
						  <th width="123">Status</th>
					</tr>



                  </thead>

                  <tbody>

                    

                          <tr>

                              <td>

                                  

                                              

                              </td>

                              <td>

                                 

                              </td>

                          </tr>

                      <?php //}

                                

						?><input type="hidden" value="<?php echo $totalamount - $secondry_total; ?>" id="primary"/>

                  <tr>

                      <td><b>Total Amount</b></td>

                      <td><b>$<?php echo number_format( $totalamount,2); ?> USD</b></td>

                  </tr>

                  </tbody>

              </table>-->

              <div class='back_btn'><a  href='<?php echo base_url();?>paypal_payment_requests' id= 'btn'><< <strong>Back</strong></a></div>

                    <?php

					//updatepaidstatus($recerveremail ,$atransactionid , $aamount ,$astatus );

					

                    ?>

                </div>

                

              

            

            

              </div>

        </section>      

       </div>

        <?php



?>



  

   



  <?php  getFooter(); ?>

  

  

  



  

