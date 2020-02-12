<?php getHead(); ?>
   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Category Management
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li > <a href="cat/add" class="btn btn-sm btn-su">Add Category</a></li>
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
                        <th>Parent</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
   	     <tbody>
      	<?php
			if($data->result()){
			 foreach ($data->result() as $row)
			 {
			
			?>
                <tr id="row_<?php echo$row->id;?>">
                    <td class="center"><?php echo get_title_by_fieldName($row->type_id,'type','cat_types') ?></td>
                    <td><?php echo $row->cat_name;?></td>
                    
                    <td class="center">
                    	<?PHP 
                        if($row->status==0)
                        {
                            $class="label-danger";
                            $text='Inactive';
                        }
                        else
                        {
                            $class="label-success";
                            $text='Active';
                        } 
                        
                        ?> 
                        
                        <span id="div_status_<?PHP echo $row->id;?>">
                            <a id="anchor_<?PHP echo $row->id;?>" href="javascript:void(0);"  
                            onclick="changeStatus('<?PHP echo $row->id;?>','<?PHP echo $row->status;?>','categories');" >
                            	<span class="label <?PHP echo $class;?>"><?PHP echo $text;?></span>
                            </a>
                        </span>   
                    </td> 
                    
                    <td class="center">
                        <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Edit'));?>" class="btn btn-info" href="banners/view/<?php echo $row->id;?>">
                        <i class="glyphicon glyphicon-picture icon-white"></i>
                        View Banners
                        </a>
                        <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Edit'));?>" class="btn btn-info" href="cat/edit/<?php echo $row->id;?>">
                        <i class="glyphicon glyphicon-edit icon-white"></i>
                        Edit
                        </a>
                        <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Delete'));?>" class="btn btn-danger" href="javascript:void(0)" onClick="deleteCat('<?php echo$row->id;?>');">
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
  
  
  
  