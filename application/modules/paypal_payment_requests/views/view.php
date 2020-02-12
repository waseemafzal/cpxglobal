<?php getHead();

 ?>
   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Paypal Payment Requests Management</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>
    <!-- Main content`transactionID`, `Platform`, `NumberOFItem`, `phoneNumber`, `productID`, `productName`, `address`, `user_id`-->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
            <!-- /.box-header -->
          <div class="box-body">
            
                <table id="post_table" class="table table-striped table-bordered   responsive">
    <thead>
    <tr>
        <th><input type="checkbox" id="checkAll" ></th>
        <th>Paypal ID/Email</th>
        <th>Name</th>
        
        <th>Phone</th>
        <th> Date</th>
        <th> Amount</th>
        <th>Status</th>
        
    </tr>
    </thead>
    <tbody id="order_body">
    <?php
	if(!empty($data->result())){
	 
	 foreach ($data->result() as $row)
	 {
		?>
		<tr id="row_<?php echo $row->id;?>">
        <td class="center">
         <?php 
		  if($row->status ==PENDING)
		  {
		  ?>
         	<input type="checkbox" class="checkItem" name="paypal_ids[]" value="<?php echo $row->id ?>"></td>
         <?php 
		  }
		 ?>
        <td class="center"><?php echo $row->email ?></td>
        <td class="center"><?php echo $row->name ?></td>
        <td><?php echo $row->phone;?></td>  
        <td class="center"><?php echo $row->created_date; ?></td>
        <td class="center"><?php echo $row->amount ;?> $</td>
        <td class="center">
        <?PHP 
		$class='label-warning';
		$text=$row->status;
		
		if($row->status==PAID)
		{
        	$class="label-success";
			$sts = 'Paid';
		}else
		if($row->status==CANCELLEDPAYPAL)
		{
       	 	$class="label-danger";
			$sts = 'Cancel';
		}else
		if($row->status==PENDING)
		{
			$class="label-warning";
			$sts = 'New Request';
		}
        ?> 
        <span id="div_status_<?PHP echo $row->id;?>">
            <a id="anchor_<?PHP echo $row->id;?>" href="javascript:void(0);">
               <span class="label <?PHP echo $class;?>"><?PHP echo $sts;?></span>
            </a>
        </span>   
        </td> 
       
    </tr>
    <?php
	  }
	}
	?>
    
    </tbody>
    </table>
                    
                    
                
          </div>
                
           <div class="box-header">
             
              <button class="btn btn-success pull-right paytoselected" > <i class="fa fa-paypal"></i>  Pay To Selected  </button>
             <span  style="float:right;margin: 0px 10px 0px 0px;" class="load_cl"> </span>
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

 $("#checkAll").click(function(){
    $('.checkItem:checkbox').not(this).prop('checked', this.checked);
});


$('#post_table').dataTable( {
  "ordering": false
} );

$(document).ready(function(e) {
	
	$('.paytoselected').click(function (){
		
		var checkedfilter = $("#order_body input:checkbox:checked").map(function(){
			return $(this).val();
		}).get(); 
		
		if(checkedfilter!='')
		{
	   	    $(".paytoselected").prop('disabled',true);
		   payapalprocess(checkedfilter);
		}
		else
		{
		 alert('select atleast 1 checkbox to continue');	
		}
	})
    
	//paytoselected
});

	function payapalprocess(checkedfilter)
	{
		 $(".load_cl").html('<img src="<?php echo base_url();?>assets/icon_gif.gif">');
		 $.ajax({
			url: "<?php echo base_url().'withdrawlrequest/process'; ?>",
			type: 'POST',
			 data: {ids:checkedfilter},
			 dataType : "json",
			success: function(response) {
				
				//alert(response);
				if(response==1){
					
					$(".load_cl").html('');
					 window.location='<?php echo base_url().'withdrawlrequest/processsuccess'; ?>';
					//window.location = response.redirection;
					 //$(".paytoselected").prop('disabled',false);
					
				}
					else{
						 $(".paytoselected").prop('disabled',false);
						showAlert('Something went wrong in processing..','Alert','red')
					}
				}
			});	
		
	}


</script>
  
  
  
  