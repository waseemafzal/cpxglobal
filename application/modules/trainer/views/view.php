<?php getHead(); ?>
   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
      	Trainer Management
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li > <a href="trainer/add" class="btn btn-sm btn-su">Add New Trainer</a></li>
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
                           <th>Trainer ID </th>
                            <th>Name </th>
                            <th>Speciality </th>
                            <th>Phone </th>
                            <th>Email </th>
                            <th>Country-City</th>
                            <th>Recommended</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
   				 <tbody>
    
  
    <?php
	if(!empty($data->result())){
	foreach ($data->result() as $row)
	{
	?>
 
        <tr id="row_<?php echo $row->id;?>">
            <td><?php echo $row->trainer_id;?></td>
            <td><?php echo $row->name;?></td>
            <td><?php echo $row->speciality;?></td>
            <td><?php echo $row->phone;?></td>
            <td><?php echo $row->email;?></td>
            <td><?php echo $row->country.'-'.$row->city;?></td>
            <td><?php echo $row->recommended_by;?></td>
       
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
  "ordering": false
} );
</script>
  
  
  
  