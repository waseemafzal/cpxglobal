<?php 
include_once"header.php";
?>
        <section id="sub-header" style="background:url('<?=base_url()?>frontend/Career.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <h1>career
</h1>
</div>
            </div><!-- End row -->
        </div><!-- End container -->
      </section>
      <div class="clearfix">&nbsp;</div>
<section class="vc_rows wpb_rows vc_rows-fluid vc_custom_1488790902404 " id="main-features">
            <div class="container">
            
            <h4 align="center">CAREER</h4>

<p>CPPEx Global hire the experienced, best and brightest printing &amp; packaging and associated industrial specialists and more, our team members thrive in an environment of openness, knowledge sharing, and innovation. who possess the skills required to deliver outstanding training and consulting services as CPPEx Global has long been dedicated to serving the global printing &amp; packaging converting, chemicals, paper, food, colorant and associated industries. We are also seeking energetic, enthusiastic, knowledgeable and client focused talented fresh graduates for administration and sales and marketing department.&nbsp;We evaluate qualified applicants without regard to race, color, religion, sex, sexual orientation, gender identity, national origin, disability, veteran status, or any other legally protected characteristics.</p>

<p>People work with us for different reasons - not just the usual training and consultancy company perks. People work with us for the challenge, our scale, our open-source technical approach, the push to constantly up-skill, and the direct impact you will have on our business and its products.</p>

<p>If you are enthusiastic and possess real motivation and qualification, you can join a highly professional network of technical consultants and expert&rsquo;s team. As a member of our excellent team, we will give you a position where you can continue to excel and make a difference in the challenging market, where your talents and ambitions are recognized and rewarded.</p>

<h4 align="center">Come work with us!</h4>
<p align="center" style="
    text-align: center;
">With offices all around the world, we're constantly hiring.</p><table class="table table-bordered " style="border:1px solid #ccc" >
		<tr style="background-color:#f30100 !important; color:#fff">
	<td>Sr No</td>
    <td>Position</td>
    <td>Location</td>
    <td>Date of posting</td>
    <td>Last date</td>
    <td>Detail</td>
    
</tr>
<?php
if($data->num_rows()>0){
	foreach($data->result() as $job)
{?>
<tr>
	<td><?=$job->id?></td>
    <td><?=$job->post_title?></td>
    <td><?=$job->company_location?></td>
    <td><?php if($job->created_on!='') echo date('F j y',strtotime($job->created_on))?></td>
    <td><?php if($job->created_on!='') 
	echo date('F j y',strtotime('+30 days',strtotime($job->created_on))) . PHP_EOL;
	?></td>
    <td align="center"><a href="career/detail/<?=$job->id?>"><i class="fa fa-plus"></i></a></td>
</tr>
<?php } }?>
</table>

            </div>
        </section>
        
        
<?php include_once"footer.php"; ?>
