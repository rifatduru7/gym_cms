<?php 
include 'header.php'; 
$hakkimizdasor=$db->prepare("select * from hakkimizda where hakkimizda_id=?");
$hakkimizdasor->execute(array(0));
$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);

?>
    <head>
        <title>Hakkımızda</title>

    </head>
    
    <!--Page Title-->
    <section class="page-title theme-overlay overlay-black" style="background-image:url(images/parallax/image-4.jpg);">
    	<div class="auto-container">
        	<div class="text-center">
                <h1><?php echo $hakkimizdacek['hakkimizda_baslik']; ?></h1>
                
                
            </div>
        </div>
    </section>


    <!--Popular Classes-->
    <section class="pt-90 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <div class="practise-area">
                        <div class="thumb">
                            <img src="images/photos/1.jpg" alt="">
                            <div class="round-style"></div>
                        </div>
                        <div class="practise-details">
                            <i class="icon flaticon-silhouette"></i>
                            <h4 class="title"></h4>
                            <p class="details"><?php echo $hakkimizdacek['hakkimizda_vizyon']; ?></p>
                            <a class="btn-thm btn-xs" href="#">Vizyon <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="practise-area">
                        <div class="thumb">
                            <img src="images/photos/2.jpg" alt="">
                            <div class="round-style"></div>
                        </div>
                        <div class="practise-details">
                            <i class="icon flaticon-silhouette-3"></i>
                            <h4 class="title"></h4>
                            <p class="details"><?php echo $hakkimizdacek['hakkimizda_misyon']; ?></p>
                            <a class="btn-thm btn-xs" href="#">Misyon <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                </div></div></section>


    
   
 
    
    <!--Parallax Section-->
    <section class="parallax-section theme-overlay overlay-white p-0" style="background-image:url(images/parallax/image-1.jpg);">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 col-lg-6 col-md-offset-0 col-lg-offset-1 wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="mt-80 mt-md-50 mb-sm-50">
                        <h3 class="title-bottom lg mb-20 pb-10"><?php echo $hakkimizdacek['hakkimizda_baslik']; ?></h3>
                        <p class="color-black fs-16"><?php echo $hakkimizdacek['hakkimizda_icerik']; ?></p>
                                      
                    </div>                    
                </div>
                <div class="col-md-5 col-lg-5 pr-0 bg-half-d1">                   
                </div>
            </div>
        </div>
    </section>
    
  
    
    
 <?php include 'footer.php'; ?>