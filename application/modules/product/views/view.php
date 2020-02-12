<?php getHead(); ?>
   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Products Management
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li > <a href="product/add/" class="btn btn-sm btn-su">Add Product</a></li>
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
        <th>Name</th>
        <th>Price</th>
        <th>Description</th>
        
        <th>Image</th>
        <th>Status</th>
        <th>created on</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
	if(!empty($data->result())){
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
        <td><?php echo $row->id;?></td>
         <td><?php echo $row->product_name;?></td>
       
        <td class="center"><?php echo $row->product_price ?></td>
        <td class="center"><?php echo html_cut($row->product_description, 70) ?></td>
       
                 
        <td class="center">
		<?php 
		
		$where=array('product_id'=>$row->id);
			$ImgData = get_by_where_array($where,'product_images');
			
			foreach($ImgData->result() as $Imgrow){
				$src=base_url().'uploads/'.$Imgrow->image;
				echo '<img src="'.$src.'" width="50" >';
				}
		
		 ?>
         
         </td>
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
                                       onclick="changeStatus('<?PHP echo $row->id;?>','<?PHP echo $row->status;?>','product');" >
                                          
                                           		 <span class="label <?PHP echo $class;?>"><?PHP echo $text;?></span>
                                            </a>
                                     </span>   
                                    </td>	 
          <td class="center"><?php echo $row->created_on ?></td>
        <td class="center">
           
			  <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Edit'));?>" class="btn btn-info" href="product/edit/<?php echo $row->id;?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
			
            <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Delete'));?>" class="btn btn-danger" href="javascript:void(0)" onClick="deleteRecord('<?php echo$row->id;?>','product');">
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
$('#post_table').dataTable( {
  "ordering": false
} );
</script>
  
  
  
  