<?php 
include_once"header.php";

?>
<style>

.thumbnailbox img{ border-radius: 8px;width: 100%;}
.thumbnailbox {
    border: 3px solid #f30100;
    margin-bottom: 43px;
    display: inline-block;
    border-radius: 10px;
	width: 100%;
}	

</style>
        <section id="sub-header" style="background:url(frontend/gallery.jpg)">
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
           <div class="col-md-12 "> <h4> GALLERY - <?=$year?></h4></div>
           <?php
	if($data!=0){
	foreach ($data->result() as $row){
	$src=	base_url().'uploads/'.get_thumbnail($row->image);
	$srcL =	base_url().'uploads/'.$row->image;
		
		?>
        <div class="col-md-3 col-xs-6 col-sm-4">
        <div class="thumbnailbox">
            <a onmouseover="bigImg(this)"  class="fancybox hoverClick" rel="gallery1" href="<?=$srcL?>" title="<?=$row->title?>">
	<img src="<?=$src?>"    alt="<?=$row->title?>" />
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
<script>
function bigImg(e){
	e.click();
	}
	

</script>
