<?php getHead(); ?>
   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
      Jobs Management
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li > <a href="jobs/add" class="btn btn-sm btn-su">Add Jobs</a></li>
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
        <th>Job </th>
        <th>Application received </th>
        <th>Status </th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
	if(!empty($data->result())){
	foreach ($data->result() as $row){
		
		?>
		<tr id="row_<?php echo$row->id;?>">
        <td><?php echo $row->post_title;?></td>
         <td>Recceived Application (<a href="jobs/viewCvs/<?php echo$row->id;?>"><?php echo count_tbl_where('tbl_jobs_applicant','id',$row->id);?></a>)</td>
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
                            onclick="changeStatus('<?PHP echo $row->id;?>','<?PHP echo $row->status;?>','tbl_jobs');" >
                            	<span class="label <?PHP echo $class;?>"><?PHP echo $text;?></span>
                            </a>
                        </span>   
                    </td> 
                 
    <td class="center">
            <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Edit'));?>" class="btn btn-info" href="jobs/edit/<?php echo $row->id;?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                View/Edit
            </a>
            <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Delete'));?>" class="btn btn-danger" href="javascript:void(0)" onClick="deleteRecord('<?php echo $row->id;?>','jobs');">
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
  
  
  
  