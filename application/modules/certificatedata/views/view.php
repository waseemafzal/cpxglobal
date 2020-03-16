<?php getHead(); ?>
   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
      Certificatedata Management
     
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li > <a href="certificatedata/add" class="btn btn-sm btn-su">Add Certificate Data</a></li>
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
                <table id="post_table" class="table table-striped table-bordered   responsive email_templating">
    <thead>
        <tr>
           <th><input type="checkbox" id="checkAll" value="2222"></th>
            <th>Cert. ID </th>
            <th>Cert. Name </th>
            <th>Appli. Name </th>
            <th>Company Name</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Country-City</th>
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
       <td class="center">
        	<input type="checkbox" class="checkItem" name="idss[]" value="<?php echo $row->id ?>">
        </td>
         <td><?php echo $row->certificate_id;?></td>
          <td><?php echo $row->certificate_name;?></td>
           <td><?php echo $row->applicant_name;?></td>
            <td><?php echo $row->company_name;?></td>
            <td><?php echo $row->mobile;?></td>
            <td><?php echo $row->email;?></td>
            <td><?php echo $row->country.'-'.$row->city;?></td>
       
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
  
  