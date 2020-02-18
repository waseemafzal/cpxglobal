<?php 
include_once"header.php";
?>
        <section id="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <h1>Login
</h1>
</div>
            </div><!-- End row -->
        </div><!-- End container -->
      </section>
      <div class="clearfix">&nbsp;</div>
<section class="vc_rows wpb_rows vc_rows-fluid vc_custom_1488790902404 " id="main-features">
            <div class="container">
    <div class="col-md-6">


		<h2>Login</h2>

		<form method="post" class="login">

			
			<p class="form-row form-row-wide">
				<label for="username">Email address <span class="required">*</span></label>
				<input type="text" class="input-text" name="username" id="username" value="">
			</p>
			<p class="form-row form-row-wide">
				<label for="password">Password <span class="required">*</span></label>
				<input class="input-text" type="password" name="password" id="password">
			</p>

			
			<p class="form-row pull-left">
				<input type="hidden" id="_wpnonce" name="_wpnonce" value="a300951b13"><input type="hidden" name="_wp_http_referer" value="/learn/my-account/">				<input type="submit" class="button" name="login" value="Login">
				<label for="rememberme" class="inline">
					<input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember me				</label>
			</p>
			<p class="lost_password">
				<a href="http://demo.vegatheme.com/learn/my-account/lost-password/">Lost your password?</a>
			</p>
			<div class="clear"></div>

			
		</form>

		


	</div>
    
            </div>
        </section>
        
        
<?php include_once"footer.php"; ?>
