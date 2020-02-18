<?php 
include_once"header.php";
?>
        <section id="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <h1>Register
</h1>
</div>
            </div><!-- End row -->
        </div><!-- End container -->
      </section>
      <div class="clearfix">&nbsp;</div>
<section class="vc_rows wpb_rows vc_rows-fluid vc_custom_1461569850623"><div class="container"><div class="row"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner"><div class="wpb_wrapper"><div class="woocommerce">

<div class="woocommerce-notices-wrapper"></div>

<div class="col2-set row" id="customer_login">


	<div class="col-md-6">

		<h2>Register</h2>

		<form method="post" class="register">

			
			
			<p class="form-row form-row-wide">
				<label for="reg_email">Email address <span class="required">*</span></label>
				<input type="email" class="input-text" name="email" id="reg_email" value="">
			</p>

			
				<p class="form-row form-row-wide">
					<label for="reg_password">Password <span class="required">*</span></label>
					<input type="password" class="input-text" name="password" id="reg_password">
				</p>

			
			<!-- Spam Trap -->
			<div style="left: -999em; position: absolute;"><label for="trap">Anti-spam</label><input type="text" name="email_2" id="trap" tabindex="-1"></div>

			<div class="woocommerce-privacy-policy-text"></div>			
			<p class="form-row">
				<input type="hidden" id="_wpnonce" name="_wpnonce" value="364a380d46"><input type="hidden" name="_wp_http_referer" value="/learn/my-account/">				<input type="submit" class="button" name="register" value="Register">
			</p>

			
		</form>

	</div>

</div>

</div></div></div></div></div></div></section>        
        
<?php include_once"footer.php"; ?>
