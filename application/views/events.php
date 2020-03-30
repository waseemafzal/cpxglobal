<?php 
include_once"header.php";
?>
        <section id="sub-header" style="background:url(frontend/events.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <h1>events
</h1>
</div>
            </div><!-- End row -->
        </div><!-- End container -->
      </section>
      <div class="clearfix">&nbsp;</div>
<section class="vc_rows wpb_rows vc_rows-fluid vc_custom_1488790902404 " id="main-features">
           

<div class="container">
 <h4>TRAINING DETAILS</h4>
<table class="table   table-bordered ">
	<tbody>
		<tr style="background-color:#3f4045 !important; color:#fff">
			<th colspan="1" rowspan="1">
			Course ID
			</th>
			<th colspan="1" rowspan="1">
			Training Title
			</th>
			<th colspan="1" rowspan="1">
			Location
			</th>
			<th colspan="1" rowspan="1">
			Training Date
			</th>
			<th colspan="1" rowspan="1">
			Registration Started
			</th>
			<th colspan="1" rowspan="1">
			Registration Closed
			</th>
			<th colspan="1" rowspan="1">
			Fees
			</th>
			<th colspan="1" rowspan="1">
			More Details
			</th>
		</tr>
          <?php
	if(!empty($data->result())){
	foreach ($data->result() as $row)
	{
		
		?>
		<tr>
			<td colspan="1" rowspan="1">
			<?php echo $row->course_id;?>
			</td>
			<td colspan="1" rowspan="1">
			<?php echo $row->title;?>
			</td>
			<td colspan="1" rowspan="1">
			<?php echo $row->location;?>
			</td>
			<td colspan="1" rowspan="1">
			<?php echo $row->on_date;?>
			</td>
			<td colspan="1" rowspan="1">
			<?php echo $row->start_at;?>
			</td>
			<td colspan="1" rowspan="1">
			<?php echo $row->end_at;?>
			</td>
			<td colspan="1" rowspan="1">
			<?php echo $row->fees;?>
			</td>
			<td align="center" colspan="1" rowspan="1">
			<a href="events/detail/<?php echo $row->id;?>" ><i class="fa fa-plus"></i></a>
			</td>
		</tr>
        <?php 
		}
	}
		
	?>
        
	</tbody>
</table>
</div>


        </section>
        
        
<?php include_once"footer.php"; ?>


