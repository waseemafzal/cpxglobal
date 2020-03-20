<?php getHead(); ?>
   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
      Training Management
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li > <a href="trainings/add" class="btn btn-sm btn-su">Add New Training Course</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header" >
            <h4>Course ID/Title/Start ON Report</h4>
            <form action="<?php base_url();?>Trainings" method="post">
              
                 
                  <div class="col-md-2"> 
                    <input type="text" name="searchbyid" value="<?php echo (!empty($_POST['searchbyid']) ? $_POST['searchbyid'] :'' );?>" placeholder="By Course ID"  class="form-control "/>
                 </div>
                 <div class="col-md-4">
                    <input type="text" name="searchbytitle" value="<?php echo (!empty($_POST['searchbytitle']) ? $_POST['searchbytitle'] :'' );?>" placeholder="By Course Title"  class="form-control "/>
                 </div>
                 
                 
                  <div class="col-md-2">
                    <input type="date" name="searchbyondate" value="<?php echo (!empty($_POST['searchbyondate']) ? $_POST['searchbyondate'] :'' );?>"  class="form-control "/>
                 </div>
                 
                  <div class="col-md-3">
                   <input type="submit" name="filterbtn" value="Submit"  class="btn btn-success btn-small "/>
                   <a href="<?php base_url();?>Trainings">
                   <input type="button" name="filterbtnreset" value="Reset"  class="btn btn-default btn-small "/>
                   </a>
                 </div>
                 
                 
                 
                 
                 
              </form>   
              
            </div>
            <!-- /.box-header -->
             <div class="box-body">
                <table id="" class="table table-striped table-bordered   responsive">
    <thead>
        <tr>
            <th>Course ID </th>
            <th>Course Title </th>
            <th>Start At </th>
            <th>End At </th>
             <th>Start Date</th>
            <th class="no-sort">Actions</th>
        </tr>
    </thead>
    <tbody>
    
  
    <?php
	if(!empty($data->result())){
	foreach ($data->result() as $row)
	{
		
		?>
		<tr id="row_<?php echo $row->id;?>">
        <td><?php echo $row->course_id;?></td>
         <td><?php echo $row->title;?></td>
          <td><?php echo $row->start_at;?></td>
           <td><?php echo $row->end_at;?></td>
            <td><?php echo date('m-d-Y',strtotime($row->on_date));?></td>
       
    <td class="center">
            <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Edit'));?>" class="btn btn-info" href="<?php echo $this->controllerName;?>/edit/<?php echo $row->id;?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                View/Edit
            </a>
            <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Delete'));?>" class="btn btn-danger" href="javascript:void(0)" onClick="deleteRecord('<?php echo $row->id;?>','<?php echo $this->tbl;?>');">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    
		<?php 
		}
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
  "ordering": true,
  columnDefs: [{
      orderable: false,
      targets: "no-sort"
    }]
} );
</script>
  
  
  
  