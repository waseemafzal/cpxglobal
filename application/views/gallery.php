<?php 
include_once"header.php";

?>
<style>
.thumbnail{background-color: #f30100;
    border: 1px solid #f30100;}
</style>
<link href='fancybox/jquery.fancybox.css' media='all' rel='stylesheet' type='text/css'>
        <section id="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <h1>GALLERY
</h1>
</div>
            </div><!-- End row -->
        </div><!-- End container -->
      </section>
      <div class="clearfix">&nbsp;</div>
<section class="vc_rows wpb_rows vc_rows-fluid vc_custom_1488790902404 " id="main-features">
            <div class="container">
           <div class="col-md-12"> <h4> GALLERY - <?=$year?></h4></div>
           <?php
	if($data!=0){
	foreach ($data->result() as $row){
	$src=	base_url().'uploads/'.$row->image;
		
		?>
        <div class="col-md-2 col-xs-6 col-sm-4">
        <div class="thumbnail">
            <a class="fancybox" rel="gallery1" href="<?=$src?>" title="<?=$row->title?>">
	<img src="<?=$src?>"  class="img-responsive"   alt="<?=$row->title?>" />
</a>
</div>
</div>
<?php } }else{
	echo '<p>No Gallery Found!</p>';
	}?>

<div class="hrhrow">&nbsp;</div>
            </div>
        </section>
        
        
<?php include_once"footer.php"; ?>
<script src="fancybox/jquery.fancybox.js"></script>

<script>
$(document).ready(function() {
    $("#single_1").fancybox({
          helpers: {
              title : {
                  type : 'float'
              }
          }
      });
});
</script>
