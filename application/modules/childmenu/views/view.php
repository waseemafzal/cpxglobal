<?php getHead(); ?>
   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
      <?php echo $this->heading;?>
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li > <a href="<?php echo $this->controller_name;?>/add" class="btn btn-sm btn-su">Add Child</a></li>
        <li > <a href="menu/add" class="btn btn-sm btn-su">Add Menu</a></li>
        <li > <a href="submenu/add">Add sub Menu</a></li>
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
        <th>Page ID </th>
        <th>Menu Name </th>
        <th>Sub Menu Name </th>
        <th>Title </th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
	if(!empty($data->result())){
	  foreach ($data->result() as $row){
		
		?>
		<tr id="row_<?php echo $row->id;?>">
        <td><?php echo 'Menu-'.$row->id;?></td>
        <td><?php echo $row->parent_name;?></td>
        <td><?php echo (isset($row->subparent_name) ? $row->subparent_name : '<strong>==>></strong>' ); ?></td>
        <td><?php echo $row->title;?></td>
       
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
            	onclick="changeStatus('<?PHP echo $row->id;?>','<?PHP echo $row->status;?>','<?php echo $this->tbl;?>');" >
            	<span class="label <?PHP echo $class;?>"><?PHP echo $text;?></span>
            </a>
        </span>   
        &nbsp;
			
            <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Edit'));?>" class="btn btn-info btn-sm" href="banners/view/<?php echo $row->id;?>">
                        <i class="glyphicon glyphicon-picture icon-white"></i>
                        View Banners
                        </a>
        
            <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Edit'));?>" class="btn btn-info btn-sm" 
            href="<?php echo $this->controller_name;?>/edit/<?php echo $row->id;?>">
            <i class="glyphicon glyphicon-edit icon-white"></i>
            View/Edit
            </a>
            <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Delete'));?>" class="btn btn-danger btn-sm" href="javascript:void(0)" onClick="deleteRecord('<?php echo$row->id;?>','<?php echo $this->tbl;?>');">
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
  
  
  
  