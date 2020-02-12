<?php
	$base = $_SERVER['REQUEST_URI'];
	$setting=getSetting();

//	header('Location: https://'.$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);

//	 echo strpos($_SERVER['HTTP_HOST'], 'www.');exit;

/*	if ((strpos($_SERVER['HTTP_HOST'], 'www.') === false))

	{

	    

		header('Location: https://www.'.$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);

		exit();

	}*/
$controller=$this->router->class;
?>

<!doctype html>

<html lang="en">



   <head>

      <title>Skillsquared</title>

      <meta charset="utf-8">

      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	  <base href="<?=base_url()?>">

      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/css/plugins.css">

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">





			<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">

		

     

      <?php 

	   if($controller=='conversation')

	   {

		?>		

            <link href="<?php echo base_url();?>chat/assets/css/animate.css" rel="stylesheet">

            <link href="<?php echo base_url();?>chat/assets/css/screen.css" rel="stylesheet">

            <link href="<?php echo base_url();?>chat/assets/css/style-light.css"  id="maintheme" rel="stylesheet">

            <link href="<?php echo base_url();?>chat/assets/css/colors/green.css" id="theme"  rel="stylesheet">

       <?php 

       }

	   else

	   {

	   ?>

            <link href="<?php echo base_url();?>assets/css/mobile.css" rel="stylesheet">

            <link href="<?php echo base_url();?>assets/css/mogo-slider.css" rel="stylesheet">

            <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/jquery-confirm/confirm.css">

            <link rel="stylesheet" href="<?php echo base_url();?>assets/css/panels.css">

            <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

       <?php 

	   }

	  

		if(isset($facebbokMeta))

		{

			echo $facebbokMeta;

		}

	?>
	<script data-ad-client="ca-pub-5350900913378266" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

   <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-153719871-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-153719871-1');
</script>




   </head>

   <body>

      <div  class="Loader"></div>

	   <style>



       



.centered {



  position: fixed;



  top: 50%;



  left: 50%; z-index: 9999;



  /* bring your own prefixes */



  transform: translate(-50%, -50%);



}



       </style> 



        <div id="loader" class="hidden">



    <div id="loading-img" class="centered"> 

      <img src="<?php echo base_url(); ?>assets/loader.gif">



    </div>



    </div>



      <div class="wrapper">

         <?php 

		// global $freelanverusername;

		   include"main-nav.php";

		

		  

		   $controller=$this->router->class;

			if($controller=='seller')

			{

				include"inc/seller-nav.php";

			}

			if($controller=='buyer')

			{

				include"inc/buyer-nav.php";

			}

		 ?>

         <?php //include"nav.php";?>

         