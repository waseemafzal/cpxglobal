<?php include_once"header.php";
$banner=base_url().'uploads/'.$row->post_banner;

if($row->post_banner=='defaultbanner.png'){

$banner='images/about/page-title.jpg';

}



 ?>



<style>

p{

    font-size: 16px;

}

section{ padding: 0 }

ul{ margin: 0;

    padding: 0;

}

.sectionTop ul li{

    list-style-type: none;

}

    .sectionTop{

        padding-top: 2%;

    }

</style>



    <!-- page title -->
<p>&nbsp;</p>
<p>&nbsp;</p>
    <section class="sectionTop page-title centred" style="background-image: url(<?=$banner?>);">
   
        <div class="container">

            <div class="content-box">

                <ul class="bread-crumb">

                    <li><a href="index.php"><?php if(isset($row)){

echo '<h1>'.$row->post_title.'</h1>';

					 if(!empty($row->short_heading)){

					 	echo '<p>'.$row->short_heading.'</p>';

					 }

					}?></a></li>

                    

                </ul>

            </div>

        </div>

    </section>

    <!--End Page Title-->





    <!-- service section -->

    <section class="service-section sec-pad">

        <div class="container">

            <?php if(isset($row)){



					echo $row->post_description;	

					}?>

        </div>

    </section>

    <!-- service section end -->











<?php include_once"footer.php"; ?>

