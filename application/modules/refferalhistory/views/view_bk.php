<?php getHead(); ?>
   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
     Refferal History
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
       <!-- <li > <a href="cms/add" class="btn btn-sm btn-su">Add Page</a></li>-->
      </ol>
    </section>
    <!-- Main content -->
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
        <th>ID</th>
        <th>Reffered By </th>
        
       <!-- <th>Actions</th>-->
    </tr>
    </thead>
    <tbody>
    <?php  //refferal_id
	if(!empty($data->result()))
	{
	foreach ($data->result() as $row)
	{
		$reffered_by = explode("=",$row->reffered_by);
		?>
		<tr id="row_<?php echo $row->refferal_id;?>">
        <td><?php echo $row->refferal_id;?></td>
        
         <td><a href="javascript:void(0);" class="linkgeneratemodal_btn" id="<?php echo $row->refferal_id;?>" ><?php echo $row->reffered_by;?></a> (<?php echo $row->total_referal;?>)</td>
   <!-- <td class="center">
            <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Edit'));?>" class="btn btn-info" href="cms/edit/<?php echo $row->refferal_id;?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Vie/Edit
            </a>
            <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Delete'));?>" class="btn btn-danger" href="javascript:void(0)" onClick="deleteRecord('<?php echo $row->refferal_id;?>','cms');">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>-->
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
  <style  type="text/css">
   #ul_reffered_list {list-style: decimal;}
   #ul_reffered_list li{border-bottom: 1px solid #ddd;
background-color: darkgray !important;
font-size: 14px;
padding: 0px 0px 0px 10px;}
  </style>
  <div class="modal fade" id="linkgeneratemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-body" >
          <div class="tab" role="tabpanel">
          <h4>Refferred list </h4>
          
                <ul id="ul_reffered_list">
                </ul>
             </div>
         </div>
      </div>
   </div>
</div> 

  <?php  getFooter(); ?>
<script>
$('#post_table').dataTable( {
  "ordering": false
} );

	$(".linkgeneratemodal_btn").click(function(){
	   
	 $("#ul_reffered_list").html('');
		var id = $(this).attr('id');
		$('#linkgeneratemodal').modal('show');
		getrefferallist(id);
	  
   })
   
   
   function getrefferallist(id)
   {
	   
        jQuery.ajax({
			method:"POST",    
			url :'<?php echo base_url().'refferalhistory/getrefferallist'; ?>',
			data:{'id':id},
			success: function(response)
			{
				$("#ul_reffered_list").html(response)
			}
		});	
	}

</script>
  
  
  
  