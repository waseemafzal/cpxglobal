<?php getHead(); ?>
   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
       Gallery Management
        
      </h1>
      <ol class="breadcrumb">
     <a class="btn btn-info fff pull-right" href="gallery/add" class="btn btn-sm btn-su"> <i class="fa fa-plus"></i> Add Gallery</a>
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
        <th>Title </th>
        <th>Year </th>
        
        <th>Status  </th>
        <th>Image</th>
        
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
	if(!empty($data->result())){
	foreach ($data->result() as $row){
		
		?>
		<tr id="row_<?php echo$row->id;?>">
        <td><?php echo $row->title;?></td>
        <td class="center"><?php echo $row->year; ?></td>
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
        onclick="changeStatus('<?PHP echo $row->id;?>','<?PHP echo $row->status;?>','slider');" >
        <span class="label <?PHP echo $class;?>"><?PHP echo $text;?></span>
        </a>
        </span>   
        </td>
       <td class="center ">
		<?php 
		$src=base_url().'uploads/'.get_thumbnail($row->image);
		if(empty($row->image)){
		$src=base_url().'uploads/noimg.png';
		
		}
				echo '<a class="fancybox" href="'.$src.'"><img  src="'.$src.'" width="50" ></a>';
			
		 ?>
         
         </td>
        
        <td class="center">
            <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Edit'));?>" class="btn btn-info" href="gallery/edit/<?php echo $row->id;?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Delete'));?>" class="btn btn-danger" href="javascript:void(0)" onClick="deleteRecord('<?php echo $row->id;?>','tbl_gallery');">
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
  
  
  
  