<?php 
include_once"header.php";
?>
        
        <section id="sub-header" style="background:url(frontend/faq.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
            <h1>FAQ
            </h1>
</div>
            </div><!-- End row -->
        </div><!-- End container -->
      </section>
        <section class="vc_rows wpb_rows vc_rows-fluid vc_custom_1488790902404" id="main-features">
            <div class="container">
            <div class="panel-group" id="faqAccordion">
             <?php
	if($data->result()){
		$i=0;
	foreach ($data->result() as $row){
		
		?>
        <div class="panel panel-default ">
            <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question<?=$i?>">
                 <h4 class="panel-title">
                    <a href="javscript:void(0)" class="ing">Q: <?=$row->question?></a>
              </h4>

            </div>
            <div id="question<?=$i?>" class="panel-collapse collapse" style="height: 0px;">
                <div class="panel-body">
                     <h5><span class="label label-primary">Answer</span></h5>

                    <p><?=$row->answer?>
                        </p>
                </div>
            </div>
        </div>
        <?php
		$i++;
		 }} ?>
        
    </div>
            </div>

        </section>
        
<?php include_once"footer.php"; ?>