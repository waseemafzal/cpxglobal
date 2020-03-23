<?php getHead();

 ?>
   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Registration Management
       
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
            
            <!-- /.box-header -->
            <div class="box-body">
            
                <table id="" class="table table-striped table-bordered   responsive email_templating">
    <thead>
    <tr>
        <th><input type="checkbox" id="checkAll" value="2222"></th>
        <th># of persons</th>
       
        <th> Personal detail</th>
         <th>Date</th>
        <th> Amount Payed</th>
        
    </tr>
    </thead>
    <tbody >
    <?php
	if(!empty($data->result())){
	foreach ($data->result() as $row){
		
		?>
		<tr id="row_<?php echo $row->id;?>">
        <td class="center">
        	<input type="checkbox" class="checkItem" name="idss[]" value="<?php echo $row->id ?>">
        </td>
        <td class="center"><?php echo $row->no_of_persons; ?></td>
        <td class="center"><?php 
		$personal_detail=json_decode($row->personal_detail);
		//print_r($personal_detail);
		
		foreach($personal_detail as $key => $value) {
	$count= 		count($value);
	for($i=0;$i<$count;$i++){
	echo '
	<p>'.$value[$i].'</p>
	';	
		}
    //echo $value[0] ."<br>";
  }
		 ?></td>
        
        
        <td class="center"><?php echo date('Y-m-d',strtotime($row->created_on)); ?></td>
        <td class="center"><?php echo $row->price_now; ?></td>
        
        
         
        
        <td>
        
       
        
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
  
  