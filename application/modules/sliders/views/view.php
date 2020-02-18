<?php getHead(); ?>
   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Sliders Management
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <!--<li > <a href="sliders/add" class="btn btn-sm btn-su">Add New</a></li>-->
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
        <th>Slider  Name</th>
        <th>Status</th>
        
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
	if($data->result()){
	foreach ($data->result() as $row){
		/*
			id
			post_title
			post_date
			post_type
			video_url
		*/
		?>
		<tr id="row_<?php echo$row->id;?>">
        <td><?php echo $row->title;?></td>
   
            <td class="center">
                                    	
                                        
                                        <?PHP if($row->status==0){
										       $class="label-danger";
											   $text='Inactive';
											   
										}else{
										      $class="label-success";
											  $text='Active';
										} 
										 	
										?> 
                                   
                                   <span id="div_status_<?PHP echo $row->id;?>">
                                   <a id="anchor_<?PHP echo $row->id;?>" href="javascript:void(0);"  
                                       onclick="changeStatus('<?PHP echo $row->id;?>','<?PHP echo $row->status;?>','sliders');" >
                                          
                                           		 <span class="label <?PHP echo $class;?>"><?PHP echo $text;?></span>
                                            </a>
                                     </span>   
                                    </td> 
    
        <td class="center">
		 <a href="javascript:void(0)" id="<?php echo$row->id;?>"   data-toggle="tooltip" title="view Images " class="btn  btn-warning slider-detail btn_action" >
             <?php echo ucwords(this_lang('Images ')); ?>
              <i class="fa fa<?php echo$row->id;?> fa-plus"></i>
            </a> 
            <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Edit'));?>" class="btn btn-info " href="sliders/edit/<?php echo $row->id;?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Delete'));?>" class="btn btn-danger hidden" href="javascript:void(0)" onClick="deleteRecord('<?php echo$row->id;?>','sliders');">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
		
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
   

  <?php  getFooter(); ?>
<script>

var table =    $('#post_table').DataTable( {
        
        "paging":         false
    } );
		 // Add event listener for opening and closing oil details
      $('#post_table').on('click', 'a.slider-detail', function () {
		
		   var tr = $(this).closest('tr');
          var id = $(this).attr('id');
          var row = table.row(tr);
		   if (row.child.isShown()) {
              // This row is already open - close it
              row.child.hide();
            $('.slider-detail .fa'+id).addClass('fa-plus');
			  $('.slider-detail .fa'+id).removeClass('fa-minus');
          } else {
              // Open this row
			  $('.slider-detail  .fa'+id).removeClass('fa-plus');
			  $('.slider-detail  .fa'+id).addClass('fa-minus');
			  				  $.ajax({
			url : "<?php echo base_url().'sliders/getImages'; ?>",
			type: 'POST',
			data: {id: id},
		beforeSend: function() {
		$('#loader').removeClass('hidden');
		$('.tooltip-inner').addClass('hidden');
		},
        success: function(response) {
			$('#loader').addClass('hidden');
		
			row.child(response).show();
              tr.addClass('shown');
			  tr.addClass('oil-shown');
           }
		 });
	
		  }
          
		  
      });




</script>
  
  
  
  