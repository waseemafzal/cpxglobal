<?php include_once"header.php"; ?>



<style>
#shopGetOrderStatusID{ margin-top: 6%;
    padding: 10px 15px;
    border-radius: 35px;
    float: left;}
</style>
    <!-- page title -->
    <section class="page-title centred hidden" style="background-image: url(images/about/page-title.png);">
        <div class="container">
            <div class="content-box">
                <div class="title"><h1>Order Success</h1></div>
                <ul class="bread-crumb">
                    <li><a href="indx.php">Home</a></li>
                    <li>order</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    
    <!-- contact section -->
    <section class="contact-section">
        <div class="container">
           
<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
                            
        <div class="well">
    
            
    
            

            <ul class="list-group">
           <?php if(isset($orderNo)){ ?>
		   <h2 class="label label-success">Congrats : Your order have been placed </h4>
           <p> you can visit this <a href="<?=$orderStatusCheckLink?>"><b> LINK </b> to check the status</p>
				<h1 class="label label-success"></h1>
				<?php } else{
					echo '<li class="list-group-item">
                    <span class="prefix">OOPS:</span>
                    <span class="label label-danger">Something wrong # !</span>
                </li>';
					}?>
            </ul>

            
        </div>
    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
        </div>
        
    </section>
    <!-- contact section end -->

<?php include_once"footer.php"; ?>
