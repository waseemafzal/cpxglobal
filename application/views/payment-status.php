<?php include_once"header.php";?>
<style type="text/css">


.item a{text-decoration: none;font-size: 16px;text-align: center; padding: 5px 10px; background-color: #32BD9A; color: #FFF;border-radius: 2px;}
.item a:hover{border: 1px solid #32BD9A; background-color: #FFF; color: #32BD9A; text-decoration:underline;}

.payment-wrap
{
	background: #fafafa;
	padding: 25px 0px 25px 25px;
	border: 1px #e5e5e5 solid;
}
.payment-wrap h3
{
 
}
.payment-wrap p
{
	color: #0e0e0f;
	font-size: 14px;
	font-weight: bold;
}
.payment-wrap p span
{
	color: #555;
	font-size: 13px;
	font-weight: normal; 
}
.payment-wrap a
{
 
}
 .pay-error{}
</style>


<section id="page-id">
  <div class="container">
    <div class="clearfix">&nbsp;</div>
        <div class="clearfix">&nbsp;</div>

    <div class="clearfix">&nbsp;</div>

    
    <div class="col-md-4">
     <img src="<?php echo base_url();?>/assets/paypal-nb.png">
    </div>
       <div class="col-md-8">
        <?php
		
		$exchangerate = 1;
		
        // List all products
        if(count($orderdata > 0 ))
		{
        ?>
         <p>&nbsp;</p>
     
        <div class="payment-wrap">
            <h3>Your payment was successfull.</h3>
            <p>TXN ID : <span> <?php echo $orderdata->txn_id; ?></span></p>
            <p>Paid Amount :<span> <?php echo nmf($exchangerate * $orderdata->payment_gross); ?> $</span></p>
            <p>Payment Status : <span><?php echo $orderdata->payment_status; ?></span></p>
            <p>Payment Date : <span><?php echo $orderdata->created; ?></span></p>
              </div>
        <?php        
        }
		else
		{
            echo '<p class="pay-error">Payment was unsuccessful</p>';
        }
        ?>
        <a href="<?php echo base_url();?>">Back to Home</a>
     <p>&nbsp;</p>
      <p>&nbsp;</p>
      
    </div>
</div>

</section>


    

<?php include_once"footer.php";?>

