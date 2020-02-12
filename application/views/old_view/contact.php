<?php include_once"header.php"; ?>
			
			<!-- Title Header Start -->
			<section class="inner-header-title" style="background-image:url(assets/img/banner-10.jpg);">
				<div class="container">
					<h1>Contact Page</h1>
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- Title Header End -->
			
			<!-- Contact Page Section Start -->
			<section class="contact-page">
				<div class="container">
				<h2>Drop A Mail</h2>
				
					<div class="col-md-4 col-sm-4">
						<div class="contact-box">
							<i class="fa fa-map-marker"></i>
							<p><?=$setting->address?></p>
						</div>
					</div>
					
					<div class="col-md-4 col-sm-4">
						<div class="contact-box">
							<i class="fa fa-envelope"></i>
							<p><?=$setting->email?></p>
						</div>
					</div>
					
					<div class="col-md-4 col-sm-4">
						<div class="contact-box">
							<i class="fa fa-phone"></i>
							<p><?=$setting->phone?></p>
						</div>
					</div>
					
				</div>
			</section>
			<!-- contact section End -->
			
			<!-- contact form -->
			<section class="contact-form">
				<div class="container">
					<h2>Drop A Mail</h2>
                    <?php
					if(isset($status['type'])=='success'){
					    
						echo '<div class="alert alert-success">Thanks for contact us. Our representative will back to you shortly.</div>';
						}else
					if(isset($status['type'])=='error'){
						echo '<div class="alert alert-danger">Some problems occured, please try again.</div>';
						}
					?>
					 <form id="contact-form" name="contact_form" class="default-form" action="contact" method="post">
               
					<div class="col-md-6 col-sm-6">
						<input type="text" class="form-control" name="name" placeholder="Your Name">
					</div>
					
					<div class="col-md-6 col-sm-6">
						<input type="email" class="form-control" name="email" placeholder="Your Email">
					</div>
					
					<div class="col-md-6 col-sm-6">
						<input type="text" class="form-control" name="phone" placeholder="Phone Number">
					</div>
					
					<div class="col-md-6 col-sm-6">
						<input type="text" class="form-control" name="subject" placeholder="Subject">
					</div>
					
					<div class="col-md-12 col-sm-12">
						<textarea class="form-control" name="message" placeholder="Message"></textarea>
					</div>
					
					<div class="col-md-12 col-sm-12">
						<input type="submit" name="contactsubmit" class="btn btn-primary" value="submit">
					</div>
					</form>
				</div>
			</section>
			<!-- Contact form End -->
			
			<?php include_once"footer.php"; ?>