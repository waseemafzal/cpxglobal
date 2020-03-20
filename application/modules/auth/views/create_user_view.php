<?php getHead(); ?>
<style>
    .box-primary {
	margin:5px 2px;	
		}
    .box-primary img{
		min-width:200px;
		min-height: 200px;
	
	}
	div.center{
background-color: #fff;
    border-radius: 5px;
    box-shadow: -2px 2px 7px 1px;
    left: 0;
    margin-left: -100px;
    padding: 11px;
    position: absolute;
    top: 10%;
    width: 50%;
}

   </style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin  Management
              </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li > <a href="admins">view admins</a> </li>
        <li > <a href="view_users">view users</a> </li>
        <li > <a href="<?php echo $this->uri->segment(1); ?>/create_user">Add Admin</a> </li>
      </ol>
    </section>

        
<section class="content">
      <div class="row">


    <div class="row">

    <div class="box col-md-12">

    <div class="box-inner">

    

    <div class="box-content">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">

  

            <form id="form-register"  method="post" class="form-horizontal">

                <div id="infoMessage" class="alert  hidden"></div>



                 <div class="form-group">
<?php

 if(lasturi()=='profile'){
	echo '<input type="hidden" name="user_type" value="'.get_session('user_type').'" >';	
	 
}
if(isset($row->user_type) and $row->user_type==STAFF){
echo '<input type="hidden" name="user_type" value="'.STAFF.'" >';	
}
if(lasturi()=='create_user'){
	
	
?>
        <div class="col-xs-12 col-md-4 col-sm-4">
                          <label> <?php echo ucwords(this_lang('Select Account Type')); ?></label>
                           <select class="form-control" name="user_type">
                               
                               
                           <option value="0"> <?php echo ucwords(this_lang('USER TYPE')); ?></option>
                           <?php 
						   $data = get_tbl_users_rights(); ?>
                           
                           <?php $c=0; 
						   foreach ($data->result() as $user):
						   $c++;
						      $string = $user->group_title;
						      
					if(get_session('user_type')!=SUPER_ADMIN){
						if($c==2){
							continue;
							}
						
						}
						   ?>
                           
                           <option <?php if($row->user_type == $user->id) echo "selected='selected'" ?> value="<?php echo  $user->id?>">
                           <?php 
						   
						   echo  $string?>
                           </option>
                           <?php endforeach;?>
                           </select>
                        </div>
        <?php
}
?>
	
<div class="col-xs-12 col-md-4 col-sm-4">

    <label><?php echo ucwords(this_lang('Name')); ?></label>

    <input id="name" name="name" class="form-control" value="<?php if(isset($row)){ echo $row->name;} ?>" placeholder="John" type="text" required>

</div>
                    <div class="col-xs-12 col-md-4">

                        <label> Email</label>

                        <input type="text" id="email" value="<?php if(isset($row)){ echo $row->email;} ?>" name="email" class="form-control" placeholder="xyz@gmail.com" required>

                    </div>

                        <div class="clearfix">&nbsp;</div> 

                     <div class="col-xs-12 col-md-4">

                     
                            <label> <?php echo ucwords(this_lang('Password')); ?></label>

                            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required  autocomplete="off" value="">

                        </div>

                   <div class="col-xs-12 col-md-4">

                        <label>  <?php echo ucwords(this_lang('Verify Password')); ?></label>

                        <input type="password" id="register-password-verify" name="password_confirm" class="form-control" placeholder="Verify Password" autocomplete="off">

                    </div>

                    </div>

                        <div class="clearfix">&nbsp;</div> 

                          <div class="col-xs-12 col-md-6">

                        <label>  <?php echo ucwords(this_lang('Profile Pic')); ?></label>

                     <input type="file" name="file[]" class=" file"  id="file" accept=".png,.PNG,.JPG,.jpg,.jpeg,.JPEG,.gif"  >

                        </div>

                        <div class="clearfix">&nbsp;</div> 

         

                           
                   

                    </div>  

                    

                    <div class="col-xs-12">

                     <span style="margin:0 !important; display:inline-block" >

                     <?php

				   if(isset($row->image)){ 

				    $image =  $row->image;

				   if(strpos($image, 'jpg') !== false){

					   $res = explode('.',$image);

		$name = $res[0];

		$ext = $res[1];

		$image = base_url().'uploads/'.$name.'.'.$ext;

		//$thumb = $name.'_thumb.'.$ext;

					    $src  = base_url().'uploads/'.$row->image;

					   echo '<img  src="'.$src.'" alt="img" width="150" height="150">';

					   }

				   }

				

				   ?>

                   </span>

                    </div>

                    <div class="form-group form-actions">

                        <div class="col-xs-6" style="padding-top: 28px;">

                            

                           
<input type="hidden" id="id"  name="id" value="<?php if(isset($row)){ echo $row->id;} ?>">
                         
                            <button type="button" onclick="create_user();" class="btn btn-effect-ripple btn-success pull-right" name="create_user_submit_btn"><i class="fa fa-plus"></i>  <?php echo ucwords(this_lang('Save')); ?></button>
 <div class="clearfix">&nbsp;</div> 
                        </div>

                        

                    </div>

                </form>
                 <div class="clearfix">&nbsp;</div> 
                  <div class="clearfix">&nbsp;</div> 

    </div>
    </div>
    </div>
    </div>

    </div>

    </div>

   



    </div>

</div>
</section>

 



  <?php  getFooter(); ?>

  

  

  

  