<?php 
include_once"header.php";
?>
        <section id="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <h1><?php if(isset($row)){ echo $row->post_title;} ?>
</h1>
<?php if(isset($row)){ 
if($row->short_heading!=''){
	echo $row->short_heading;
	}
} ?>
</div>
            </div><!-- End row -->
        </div><!-- End container -->
      </section>
      <div class="clearfix">&nbsp;</div>
<section class="vc_rows wpb_rows vc_rows-fluid vc_custom_1488790902404 " id="main-features">
            <div class="container">
            <?php if(isset($row)){ 
			if($row->displaysidebar==1){
			$sidebarPosition=	$row->sidebar;
			if($sidebarPosition==0){
				$positionClass='pull-right';
				}
				if($sidebarPosition==1){
				$positionClass='pull-left';
				}
			?>
            <aside class="col-xs-12 col-sm-4 col-md-4 <?=$positionClass?>">
            <?php
			foreach($imgdata->result() as $sidebar){
			$src=base_url().'uploads/'.$sidebar->image;
			?>
            <div class="thumbnail">
          <a target="_blank" href="<?=$sidebar->url?>" class="fancybox">  <img src="<?=$src?>" class="img-responsive" alt="<?=$sidebar->title?>"></a>
            <div class="caption">
          <p><?=$sidebar->title?></p>
        </div>
            </div>
            
            <?php } ?>
            </aside>
            <?php } }?>
            <div class="col-xs-12 col-sm-8 col-md-8 ">

<?php if(isset($row)){ echo $row->post_description;} ?>

            </div>
            
              </div>
        </section>
        
        
<?php include_once"footer.php"; ?>
<script type="text/javascript">
$(document).ready(function(){

	$('table').addClass('table table-striped'); 
});

</script>