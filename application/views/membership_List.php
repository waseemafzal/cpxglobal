<?php 
include_once"header.php";
?>
        <section id="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <h1>MEMBERSHIP List
</h1>

</div>
            </div><!-- End row -->
        </div><!-- End container -->
      </section>
      <div class="clearfix">&nbsp;</div>
<section class="vc_rows wpb_rows vc_rows-fluid vc_custom_1488790902404 " id="main-features">
            <div class="container"> 
<h4>Membersip List</h4>
 <table class="table table-bordered " style="border:1px solid #ccc" >
	<tbody>
		<tr style="background-color:#f30100 !important; color:#fff">
			<th colspan="1" rowspan="1">
			 Sr. No 
			</th>
			<th colspan="1" rowspan="1">
			 Membership ID 
			</th>
			<th colspan="1" rowspan="1">
			 Customer ID 
			</th>
			<th colspan="1" rowspan="1">
			 Membership Class 
			</th>
			<th colspan="1" rowspan="1">
			 Organization 
			</th>
			<th colspan="1" rowspan="1">
			 Representative 
			</th>
			<th colspan="1" rowspan="1">
			 Email 
			</th>
			<th colspan="1" rowspan="1">
			 Location 
			</th>
			
			<th colspan="1" rowspan="1">
			 More Details 
			</th>
		</tr>
		 <?php 
		  if(count($membershipList) > 0 )
		  {
		   $counter = 1;	  
		   for($index= 0 ;$index< count($membershipList);$index++)
		   {
				$instance = $membershipList[$index]; 
				$memberShiptype ='';
				if($instance->membership_type==1)
				{
					$memberShiptype = 'Student Membership';	
				}
				else
				if($instance->membership_type==2)
				{
					$memberShiptype = 'Individual Membership';	
				}
				else
				if($instance->membership_type==3)
				{
					$memberShiptype = 'Associate Membership';	
				}
				else
				if($instance->membership_type==4)
				{
					$memberShiptype = 'Corporate Membership';	
				}
				$aPersonalData = json_decode($instance->personal_data);
				$aCompanyData = json_decode($instance->company_data);
		?>
         <tr>
			<td colspan="1" rowspan="1">
			 	<?php echo $counter;?> 
			</td>
            
			<td colspan="1" rowspan="1">
				MACG<?php echo $instance->membership_id;?>
			</td>
            
			<td colspan="1" rowspan="1">
			 	CG00<?php echo $instance->user_id;?>
			</td>
            
			<td colspan="1" rowspan="1">
				 <?php echo $memberShiptype;?> 
			</td>
            
			<td colspan="1" rowspan="1">
				 <?php echo $aCompanyData->organization;?> 
			</td>
            
			<td colspan="1" rowspan="1">
			 	<?php echo $aPersonalData->name;?>
			</td>
            
			<td colspan="1" rowspan="1">
			 		<?php echo $aPersonalData->email;?> 
			</td>
            
			<td colspan="1" rowspan="1">
			  <?php echo $aCompanyData->address;?>  
			</td>
            
			<td align="center" colspan="1" rowspan="1">
				<a  href="javascript:void(0);"  onclick="getinfod('<?php echo $instance->id;?>');"  data-toggle="modal" data-target="#infodata"><i class="fa fa-plus"></i></a>
                <div style="display:none;" id="dinfo_<?php echo $instance->id;?>"><?php echo $instance->package_info_admin;?></div>
			</td>
		</tr> 
       <?php 
	      $counter++;
	     }
	   }
	   ?> 
		
	</tbody>
</table>

        </section>
        
<!------------------------------->
 <div class="modal fade" id="infodata">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style=" background-color:#f30100 !important; color:#fff;">
        <h4 class="modal-title">Info</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div id="modelidd" class="modal-body">
          
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!------------------------------->
 
        
<?php include_once"footer.php"; ?>
<script type="text/javascript">
function getinfod(id)
{

 $("#modelidd").html($("#dinfo_"+id).html());
 
}

</script>