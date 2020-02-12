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
font-weight: ;}	  
	  
    </style>
            
                
      <div  class="box" style="padding: 0px 0px 0px 30px;">
                   
              
        <p></p>
                   <p>   <img src="<?php echo base_url().'assets/paypal-logo.svg'?>" class="paypalc"></p>
                  <hr/>
             <table id="resultstbale" >
                  <thead>
                      <tr class="head headstyle" style="border-bottom: 1px solid #ccc;">
                          <th style="width: 10%;" width="368" > &nbsp;ID</th>
                          <th style="width: 38%;" width="368"> &nbsp;Receviers</th>
                          <th style="width: 21%;" width="368"> &nbsp;Amount</th>
                          <th style="width: 20%;" width=""> Cost us</th>
                          <th  width="123"> Status</th>
                      </tr>
                  </thead>
                  <tbody>
                  
                  <tr class="even">
                  <td >&nbsp;1</td>
                   <td>arsal231@hotmail.com</td>
                   <td>100.00 $</td>
                   <td>0.25 $</td>
                   <td class="paid">Paid</td>
                  </tr>
                  
                  <tr>
                  <td >&nbsp;2</td>
                   <td>arsal231@hotmail.com</td>
                   <td>100.00 $</td>
                    <td>0.25 $</td>
                   <td class="paid">Paid</td>
                  </tr>
                  
                  
                  
                   
                  </tbody>
              </table>
              <div class='back_btn'><a  href='<?php echo base_url();?>paypal_payment_requests' id= 'btn'><< <strong>Back to Request Page</strong></a></div>
                 
                 </div>
               </div>
           </section>      
       </div>
   <?php  getFooter(); ?>
  
  
  

  
