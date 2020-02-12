<?php getHead();

 ?>
   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Order Management
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>
    <!-- Main content`transactionID`, `Platform`, `NumberOFItem`, `phoneNumber`, `productID`, `productName`, `address`, `user_id`-->
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
        
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th> Date</th>
        <th> Amount</th>
        <th> OrderNo</th>
        <th>Conversation</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody id="order_body">
    <?php
	if(!empty($data->result()))
	{
	foreach ($data->result() as $row)
	{
		?>
		<tr id="row_<?php echo $row->id;?>">
        <td class="center"><?php echo $row->name ?></td>
        <td class="center"><?php echo $row->email ?></td>
        <td><?php echo $row->phone;?></td>  
        <td class="center"><?php echo date('Y-m-d',strtotime($row->created_on)); ?></td>
        <td class="center"><?php echo $row->amount.' $' ?></td>
        <td class="center"><?php echo $row->orderNo ?></td>
        <td class="center">
        
        <span id="div_status_<?PHP echo $row->id;?>">
        <a href="<?php echo base_url();?>disputeconversation/<?php echo$row->id;?>">
           <span class="label label-warning">conversation</span>
        </a>
        </span>   
        </td> 
        <td>
         <?php
        if($row->watched==0){
			echo '<div id="thisUnread_'.$row->id.'" style="position:relative;margin: -25px 0 0  0;float:  right;text-transform: uppercase;">
			<span class="labael label-success" style="
			position:  absolute;
			right:  2%;
			padding:  5px;
			border-radius:  29px;
			font-size: 10px;
			top: 10px;
			border: 1px solid #000;
			">Unread</span></div>';
		}
		?>   
        <a  class="btn btn-info orderDetail btn-xs" onclick="getOrderDetail('<?PHP echo $row->id;?>')">
        <i class="fa fa-eye"></i>
        View Detail</a>
        <a  class="btn btn-success btn-xs" href="order/edit/<?PHP echo $row->id;?>">
        <i class="fa fa-pencil"></i>
        Change Status</a>
             
        
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
   

<div id="CardModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Card Detail</h4>
      </div>
      <div class="modal-body" id="modalBody">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<div id="ProductModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Order Detail</h4>
      </div>
     
      <div id="printable_container" >
      <div class="modal-body " id="ProductDetaBody">
        
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="printJS({ printable: 'printable_container', type: 'html', header: '' ,
	    css: 'css/print.css' })"  class="btn btn-info pull-left" ><i class="fa fa-print"></i>Print</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

  <?php  getFooter(); ?>
<script>

 
$('#post_table').dataTable( {
  "ordering": false
} );

function getInfo(id){
 $.ajax({
        url: "<?php echo base_url().'order/cardinfo'; ?>",
        type: 'POST',
		 data: {id:id},
		dataType : "json",
        success: function(response) {
		   if(response.status == 1){
			   //CardModal
			   $('#CardModal').modal('show');
			   $('#CardModal #modalBody').html(response.data);
			  }
			  else{
				 showAlert('No info !','Alert','red')
				 }
			}
		});
}

function getOrderDetail(id){
 $.ajax({
        url: "<?php echo base_url().'order/getOrderDetail'; ?>",
        type: 'POST',
		 data: {id:id},
		dataType : "json",
        success: function(response) {
		   if(response.status == 1){
			   //CardModal
			   $('#ProductModal').modal('show');
			   $('#ProductDetaBody').html(response.data);
			   $("#unreadCounter").text(response.unreadCounter);
			   $("#thisUnread_"+id).remove();
			   
			   
			   
			  }
			  else{
				 showAlert('No info !','Alert','red')
				 }
			}
		});
}


function printDiv(divID) {
        //Get the HTML of div
        var divElements = document.getElementById(divID).innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = 
          "<html><head><title>Boston Pizza</title></head><body><img src='http://127.0.0.1/quickfoodadmin/uploads/4563657890092.png'>" + 
          divElements + "</body>";
        //Print Page
        window.print();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;

    }



</script>
  
  
  
  