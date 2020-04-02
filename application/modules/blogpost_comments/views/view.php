<?php getHead(); ?>
   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
     <?php echo $blogTitle ?>
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li > <a href="blogpost" class="btn btn-sm btn-su">Return to blog</a></li>
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
        <th>Name</th>
       <th>Email</th>
       
        <th>Comment</th>
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
        <td><?php echo $row->name;?></td>
        <td><?php echo $row->email;?></td>
        <td><?php 
		$post_description = strip_tags($row->body);
		//echo mb_substr($post_description,0,115,'UTF-8');

   echo $post_description;		
		?></td>
        
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
                            onclick="changeStatus('<?PHP echo $row->id;?>','<?PHP echo $row->status;?>','blogpost_comments');" >
                            	<span class="label <?PHP echo $class;?>"><?PHP echo $text;?></span>
                            </a>
                        </span>   
                    </td> 
                    
          <td class="center"><?php echo $row->created_on ?></td>
            
    <td class="center">
        
            <a data-toggle="tooltip" title=" <?php echo ucwords(this_lang('Delete'));?>" class="btn btn-danger" href="javascript:void(0)" onClick="deleteRecord('<?php echo$row->id;?>','blogpost_comments');">
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
  
  
  
  