<?php getHead(); ?>

   

<div class="content-wrapper">
<style type="text/css">
/*#DDTB_paginate{ display:none;}*/
.c_revert{color:#F00;}	 
.c_reset{ color:#0C3;} 
</style>
    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        USERS   

        

      </h1>

      <ol class="breadcrumb">

       

        <!--<li><a href="#" class="btn btn-info btn-sm">ADD USERS</a></li>

        -->

      </ol>

    </section>



    <!-- Main content -->

    <section class="content">

      <div class="row">

        <div class="col-xs-12">

          <div class="box">

            <div class="box-header">
<?php if(isset($searchmessage)) echo $searchmessage;?>
            
             <form name="" method="post" action="<?php echo base_url();?>auth/view_users/">
             <div id="post_table_filter" class="dataTables_filter" style="float: right; width:23%;margin: 10px 0px 0px 0px;"><input type="search"  name="usersearch" class="form-control input-sm"  placeholder="Enter name / phone/ email Search">
           <!--  <button type="submit" class="btn btn-info btn-sm">Search</button>-->
             </form>
             </div>

            </div>

            <!-- /.box-header -->

            <div class="box-body">

             <table class="table table-bordered table-striped " >

                     <thead>

                        <tr >

                            <th>ID</th>
                            <th style="width: 3%;"><?php echo ucwords('R. By');?></th>
                            <th><?php echo ucwords(this_lang('NAME')).'-Services';?></th>

                            <th style="width: 3%;"><?php echo ucwords(this_lang('EMAIL'));?></th>
                            <?php
if(end($this->uri->segment_array())!='admins'){
?>
                            <th><?php echo ucwords(this_lang('Phone No'));?></th>
                            <th><?php echo ucwords(this_lang('Address'));?></th>
<?php } ?>
                            <th><?php echo ucwords(this_lang('Image'));?></th>

                            <th><?php echo ucwords(this_lang('status'));?></th>

                            <th><?php echo ucwords(this_lang('action'));?></th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php

                    foreach ($users as $user):
						$refferal_person_name = '--';
						if(! empty($user->refferal_person_id))
						{
							$refferal_person_name = get_id_by_key('name','id',$user->refferal_person_id,$this->users);
						}
					?>

                    <tr id="row_<?PHP echo $user->id;?>" class="user_type<?php echo $user->user_type; 

                    ?>">

                    <td><?php echo htmlspecialchars($user->id,ENT_QUOTES,'UTF-8');?></td>
                     <td><?php echo $refferal_person_name;?></td>
                    <td><?php echo htmlspecialchars($user->name,ENT_QUOTES,'UTF-8').' (<a href="'.base_url().'services/?id='.$user->id.'" target="_blank">'.$user->total_sevices.'</a>)';?>
                     <?php 
					if(! empty($user->usertype))
					{
					  $typetext  = 'Buyer';
					  $c = 'blue';   
					  if($user->usertype=='normal')
					  {
						 $typetext  = 'Freelancer';
						 $c = 'green';  
					  }
					  echo '</br><span style="color:'.$c.';">'.$typetext.'</span>';
					}
					?>
                    
                    </td>
				<?php
				if(end($this->uri->segment_array())!='admins'){
				?>
                    <td id="pwcolumn" ><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?>
						<?php 
                        if(!empty( $user->viewpw ))
                        {
                        ?> 
                         <a href="javascript:void(0)"  onclick="vpwf('<?php echo $user->id;?>')" title="see password">
                         <i class="fa fa-eye" aria-hidden="true"></i> <i class="fa fa-key" aria-hidden="true"></i></a></br>
                          <span id="vpw<?php echo $user->id;?>" style=" display:none;"><?php echo $user->viewpw; ?></span>
                        <?php 	
                        }
                        ?>
                        </br>
                       
                       <?php 
                        if(!empty( $user->upw_hash ))
                        {
                        ?> 
                          
                           <span class="resetpw_<?php echo $user->id; ?>">
                        
                        <a href="javascript:void(0)"  onclick="resetpw('<?php echo $user->id;?>','revert')" title="see password" class="c_revert">
                        revert</a>
                     </span>
                        <?php 
						}
						else
						{
						?>
                        <span class="resetpw_<?php echo $user->id; ?>">
                        <a href="javascript:void(0)"  onclick="resetpw('<?php echo $user->id;?>','reset')" title="see password" class="c_reset">
                        reset</a>
                     </span>
                     <?php 
					  }
					 ?>
                        
                      
                    </td>
                    <td>
					<?php echo htmlspecialchars($user->phone,ENT_QUOTES,'UTF-8');?> 
                    
                    </td>
                    
                    
                    <?php  } ?>
                    <td><?php echo htmlspecialchars((!empty($user->address) ? $user->address : 'Not provided') ,ENT_QUOTES,'UTF-8');?></td>

                    <td  class="center">

						<?php

                        $img = $user->image;
					  
                        if(!empty($img) and $img!='noimg.png')
						{
                         $image = base_url().'uploads/users/'.get_thumbnail($img);
						//{
						?>

                            <span style="margin:0 !important; display:inline-block" class="thumbnail">
    
                            <a title="img" href="<?php echo $image; ?>">
    
                            <img width="50" height="50" src="<?php echo $image; ?>" alt="img">
    
                            </a>
    
                            </span>

                        <?php 
						//}

                        } else{

                        echo '<img width="50" height="50" src="'.base_url().'assets/noimg.png">';

                        }

                        ?> 

                    </td>

                    <td class="center">

						<?PHP if($user->active==0){

                        $class="label-danger";

                        $text='Suspended';

                        }else{

                        $class="label-success";

                        $text='Active';

                        } 

                        ?> 

                        <span id="div_status_<?PHP echo $user->id;?>">

                        <a href="javascript:void(0);"  

                        onclick="changeUserStatus('<?PHP echo $user->id;?>','<?PHP echo $user->active;?>','<?PHP echo 'users';?>');" >

                        <span class="label <?PHP echo $class;?>">

                        <?PHP echo ucwords(this_lang($text));?></span>

                        </a>

                        </span>   

                    </td> 

                    <td>
<?php
if(end($this->uri->segment_array())=='admins'){
?>
                        <a href="auth/edit/<?php echo$user->id;?>"  data-toggle="tooltip" title="Edit User" class="btn btn-effect-ripple btn-xs btn-success ">

                        <i class="fa fa-pencil"></i></a>
<?php } ?>
                        <a href="javascript:void(0)" onClick="deleteUser('<?php echo $user->id;?>','users');" data-toggle="tooltip" title="Delete " class="btn btn-effect-ripple btn-xs btn-danger">

                        <i class="fa fa-times">

                        </i>

                        </a>

                    </td>

                    </tr>

                    <?php endforeach;?>

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

   <script type="text/javascript">
     
	  
	  function vpwf(id)
	  {
	    $("#vpw"+id).toggle('slow','linear');	
		 $("#vpw"+id).css('color','red');
	  }
	   
	  
	  function resetpw(id,type)
      {
	    
		$(".resetpw_"+id).html('<img src="<?php echo base_url().'assets/smal_loader.gif';?>" >') ;
        jQuery.ajax({
			method:"POST",    
			url :'<?php echo base_url().'auth/resetPw'; ?>',
			data:{'id':id,'type':type},
			success: function(response)
			{
				
				$(".resetpw_"+id).html(response)
			}
		});	
	}
	 $(document).ready(function() {
		 
		/* $("#DataTables_Table_0_wrapper").DataTable( {
    "bInfo" : false,
    "paging": false,
    "ordering": false,
    "searching": false
});*/
    
} ); 
   </script>