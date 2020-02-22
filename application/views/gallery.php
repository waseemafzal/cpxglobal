<?php 
include_once"header.php";
?>
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
            <h2><?=$year?></h2>
            <a class="fancybox" rel="gallery1" href="http://farm2.staticflickr.com/1669/23976340262_a5ca3859f6_b.jpg" title="Twilight Memories (doraartem)">
	<img src="http://farm2.staticflickr.com/1669/23976340262_a5ca3859f6_m.jpg" alt="" />
</a>
<a class="fancybox" rel="gallery1" href="http://farm2.staticflickr.com/1459/23610702803_83655c7c56_b.jpg" title="Electrical Power Lines and Pylons disappear over t.. (pautliubomir)">
	<img src="http://farm2.staticflickr.com/1459/23610702803_83655c7c56_m.jpg" alt="" />
</a>
<a class="fancybox" rel="gallery1" href="http://farm2.staticflickr.com/1617/24108587812_6c9825d0da_b.jpg" title="Morning Godafoss (Brads5)">
	<img src="http://farm2.staticflickr.com/1617/24108587812_6c9825d0da_m.jpg" alt="" />
</a>
<a class="fancybox" rel="gallery1" href="http://farm4.staticflickr.com/3691/10185053775_701272da37_b.jpg" title="Vertical - Special Edition! (cedarsphoto)">
	<img src="http://farm4.staticflickr.com/3691/10185053775_701272da37_m.jpg" alt="" />
</a>
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
