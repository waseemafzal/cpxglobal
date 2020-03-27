<?php getHead();

 ?>
   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Membership Management
       
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
            <div class="box-header" >
            <h4>Yearly/month/status report</h4>
            <form action="<?php base_url();?>memberships" method="post">
              <div class="col-md-2">
                <select name="yearwise" class="form-control">
                    <option value="">Select Year</option>
                    <?php 
						for($index = 2020; $index>=2000;$index--)
						{
						?>
							<option value="<?php echo $index;?>"  
							<?php echo (($_POST['yearwise']==$index) ? 'selected="selected"' : '');?>><?php echo $index;?></option>
						<?php 
						}
                    ?>
                </select>
               </div> 
               <div class="col-md-2">
                <select name="monthwise" class="form-control">
                    <option value="">Select Month</option>
                    <?php 
						for($index = 1; $index<=12;$index++)
						{
						?>
							<option value="<?php echo $index;?>" 
                             <?php echo (($_POST['monthwise']==$index) ? 'selected="selected"' : '');?>>
							  <?php 
							  	$m = $index;	
							    if($index<10)
								{
								 $m = '0'.$index;	
								} 
							  
							  ?>
							  <?php echo $m;?>
                             </option>
						<?php 
						}
                    ?>
                </select>
               </div> 
                <div class="col-md-2">
                    <select name="paymentstatus"  class="form-control">
                        <option value="">Select Status <?php echo $_POST['paymentstatus'];?></option>
                        <option value="2" <?php echo (($_POST['paymentstatus']==2) ? 'selected="selected"' : '');?>>Not Paid</option>
                        <option value="1" <?php echo (($_POST['paymentstatus']==1) ? 'selected="selected"' : '');?>>Paid</option>
                    </select>
                 </div>
                  
                 <div class="col-md-3">
                    <input type="text" name="searchbynamecounrty" 
                    value="<?php echo (!empty($_POST['searchbynamecounrty'])) ? $_POST['searchbynamecounrty'] :''; ?>" placeholder="Search by Name/Country"  class="form-control "/>
                 </div>
                 
                  <div class="col-md-3">
                   <input type="submit" name="filterbtn" value="Submit"  class="btn btn-success btn-small "/>
                   <a href="<?php base_url();?>memberships">
                   <input type="button" name="filterbtnreset" value="Reset"  class="btn btn-default btn-small "/>
                   </a>
                 </div>
                 
                 
              </form>   
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
                <table id="" class="table table-striped table-bordered   responsive email_templating">
    <thead>
    <tr>
        <th><input type="checkbox" id="checkAll" value="2222"></th>
        <th>ID</th>
        <th>Username</th>
        
       
        <th> Payment</th>
         <th>Package Type</th>
        <th> Buy on</th>
         <th>Country</th>
         <th class="no-sort"> Add Note</th>
       
        <th class="no-sort">Actions</th>
    </tr>
    </thead>
    <tbody >
    <?php
	if(!empty($data->result())){
	foreach ($data->result() as $row){
		
		
		
		$pstatus="Not Paid";
		if($row->payment_status==1){
          $pstatus="Paid";
        } 
		?>
		<tr id="row_<?php echo $row->id;?>">
        <td class="center">
        	<input type="checkbox" class="checkItem" name="idss[]" value="<?php echo $row->id ?>">
        </td>
        <td class="center"><?php echo $row->id; ?></td>
        <td class="center"><?php echo $row->username; ?></td>
        <td class="center"><?php echo $pstatus ?></td>
        
        <td class="center">
        <?PHP 
		
		
		
		$class='label-warning';
		
		if($row->membership_type==1)
		{
          $Pakacge="Package type 1";
        }else if($row->membership_type==2){
          $Pakacge="Package type 2";
        } 
		else if($row->membership_type==3){
          $Pakacge="Package type 3";
        } 
		else if($row->membership_type==4){
           $Pakacge="Package type 4";
        } 
		
        ?> 
        
        <span id="div_status_119">
           
           		 <span class="label label-success"><?PHP echo $Pakacge;?></span>
                   </span>
        </td>
        <td class="center"><?php echo  date('Y-m-d',strtotime($row->created_date)); ?></td>
        
       
        <td class="center"><?php echo $row->country; ?></td>
        <td class="center">
        
        <span style="display:none" id="notee_<?PHP echo $row->id;?>"><?PHP echo $row->package_info_admin;?></span>
        <a  class="btn btn-info  btn-xs" onclick="addNote('<?PHP echo $row->id;?>')"><i class="fa fa-plus"></i>
        Add Note</a>
       
        
        </td>
         
        
        <td>
        
        <a  class="btn btn-info orderDetail btn-xs" onclick="getPackageDetail('<?PHP echo $row->id;?>')"><i class="fa fa-eye"></i>
        View Detail</a>
       
        
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

 <div id="NoteModel" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Note <span id="lblstatus"></span></h4>
      </div>
     
      <div id="printable_container" >
      <div class="modal-body " id="NoteModeBody">
        <div>
         <textarea id="textNote" placeholder="Add note" ></textarea>
        </div>
        <div>
           <input type="hidden" id="rowID" value="">
         
          
        </div>
        
      </div>
      </div>
      <div class="modal-footer">
      <span id="btnnn"></span>
        <input type="button" value="submit" id="btnn" class="btn btn-default btn-success" onclick="saveNote();">
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
        <h4 class="modal-title">Package Detail <span id="lblstatus"></span></h4>
      </div>
     
      <div id="printable_container" >
      <div class="modal-body " id="ProductDetaBody">
        
      </div>
      </div>
      <div class="modal-footer">
       
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

  <?php  getFooter(); ?>
<script>

 
$('#post_table').dataTable( {
  "ordering": true,
  columnDefs: [{
      orderable: false,
      targets: "no-sort"
    }]
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
  
  
  function addNote(id)
  {
	$('#NoteModel').modal('show');
	$("#rowID").val(id);
	$("#textNote").val($("#notee_"+id).html());
	
  }
  
  function saveNote()
  {
	
	 if($("#textNote").val()=='')
	 {
	  alert('Note can\'t be empty.');	
	  return false; 
	 }
	 var textNote = $("#textNote").val();
	 var rowID = $("#rowID").val();
	 
	 $('#btnnn').html('<i class="fa fa-cog fa-spin" style="font-size:24px"></i>');
	 $.ajax({
		url: "<?php echo base_url().'memberships/addNote'; ?>",
		type: 'POST',
		data: {id:rowID,note:textNote},
		dataType : "json",
        success: function(response) 
		{
		   
				if(response == 1){
					$('#btnnn').html('');
					$("#notee_"+rowID).html(textNote);
					
					alert('updated successfully');
					$('#NoteModel').modal('hide');
				}
				else{
					alert('Updation Failed.');
					//showAlert('No info !','Alert','red')
				}
			}
		});
  }
  
  function getPackageDetail(id)
  {
	$('#ProductModal').modal('show');
	$('#ProductDetaBody').html('<i class="fa fa-cog fa-spin" style="font-size:24px"></i>');
	
	  $.ajax({
		url: "<?php echo base_url().'memberships/getPackageDetail'; ?>",
		type: 'POST',
		data: {id:id},
		dataType : "json",
        success: function(response) 
		{
		   if(response.status == 1){
			   //CardModal
			 
			   //$("#lblstatus").html($("#div_status_"+id).html());
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
  
 <style type="text/css">
  #textNote{border: 1px solid #ddd;
	width: 100%;
	padding: 10px;
	margin-bottom: 10px;}
 </style> 
  
  