<?php getHead(); ?>
   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
      <?php echo $this->heading; ?>
         <?php 
		  if($backlink)
		  {
		  ?>
         <a href="<?php echo base_url().'view_users' ?>" >Back to users</a>
         <?php 
		 }
		 ?>
      </h1> 
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <?php if(isset($searchmessage)) echo $searchmessage;?>
            
             <form name="" method="post" action="<?php echo base_url();?>services/index/">
             <div id="post_table_filter" class="dataTables_filter" style="float: right; width:23%;margin: 10px 0px 0px 0px;"><input type="search"  name="usersearch" class="form-control input-sm"  placeholder="Enter name email to Search">
           <!--  <button type="submit" class="btn btn-info btn-sm">Search</button>-->
             </form>
             </div>
              
            </div>
            <!-- /.box-header -->
             <div class="box-body">
                <table  class="table table-striped table-bordered   responsive">
    <thead>
    <tr>
        <th>ID </th>
         <th>User Name</th>
        <th>User Email</th>
        <th>Service Title </th>
        <th>Price </th> 
        <th>created date </th> 
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
	if(!empty($data->result())){
		$counter=1;
	 foreach ($data->result() as $row){
		
		?> 
		<tr id="row_<?php echo $row->id;?>">
          <td><?php echo $counter;?></td>
            <td><?php echo $row->name;?></td>
            <td><?php echo $row->email;?></td>
            <td><?php echo $row->title;?></td>
            <td><?php echo $row->price;?></td>
            <td><?php echo date('d/m/Y H:i:s',strtotime($row->created_on));?></td>
         
         <td class="center">
        
         <?PHP 
		 
            if($row->status=='0')
            {
            	$class="label-danger";
            	$text='Cancel';
            }
			else
			if($row->status==2)
            {
            	$class="label-danger";
            	$text='Pending';
            }
            else
			if($row->status==1)
            {
           	 	$class="label-success";
            	$text='Active';
            } 
            
            ?> 
             <div class="input-group-btn ">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> 
                    <span class="caret"></span> 
                    </button>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);" style="color:#F00;" 
                        onClick="deleteRecord('<?php echo $row->id;?>','<?php echo $this->tbl;?>');"><u>Delete</u></a></li>
                        <li><a href="javascript:void(0);" onClick="setrequeststatus('<?php echo $row->id;?>','0');">Cancel</a></li>
                        <li><a href="javascript:void(0);" onClick="setrequeststatus('<?php echo $row->id;?>','2');">Pending</a></li>
                        <li><a href="javascript:void(0);" onClick="setrequeststatus('<?php echo $row->id;?>','1');">Active</a></li>
                    </ul>
                </div>
                    <span id="div_status_<?PHP echo $row->id;?>">
                    	<span class="label <?PHP echo $class;?>"><?PHP echo $text;?></span>
                    </span>  
            
            
            
            
        </td>
    </tr>
    
		<?php 
		 $counter++;
		}
	}
		
	?>
    
               </tbody>
             </table>
             
             <div class="paginationci">
<?php if (isset($links)) { ?>
                <?php echo $links ?>
                
            <?php } ?>
            </div>
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
   
 <style type="text/css">
 .paginationci{  
display: inline-block;
padding-left: 0;
margin: 20px 0;
border-radius: 4px;
margin: 25px 0px 10px 32%;
/*padding: 10px 10px 10px 10px;*/
 }
  .paginationci strong{color: #fff;
cursor: default;
background-color: #337ab7;
border-color: #337ab7;
padding: 8px 11px 8px 12px;   border: 1px solid #337ab7;}
 .paginationci  a{ 
    z-index: 2;
    color: cadetblue;
  
    border-color: #ddd;
    padding: 8px 11px 8px 12px;
    border: 1px solid #ddd;
}
 


  </style>
  <?php  getFooter(); ?>
<script>
$('#post_table').dataTable( {
  "ordering": false
} );

function setrequeststatus(id,status) {
			
			 $("#div_status_"+id).html('<i class="fa fa-cog fa-spin" style="font-size:24px"></i>');
			 jQuery.ajax({
				method:"POST",    
				url :'<?php echo base_url().'services/setrequeststatus'; ?>',
				data:{'id':id,'status':status},
				success: function(response){
						if(response!=''){ 
							$("#div_status_"+id).html(response);
						
					  }
					  
					  
					
				}
			});	 
		
		}


</script>
  
  
  
  