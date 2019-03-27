<?php 
include 'header.php'; 
include 'slider.php'; 
?>



<br>


<title><?php echo $ayarcek['ayar_title']; ?></title>

<!--Parallax Section-->
<section class="parallax-section theme-overlay overlay-white p-0" style="background-image:url(images/parallax/image-1.jpg);">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7 col-lg-6 col-md-offset-0 col-lg-offset-1 wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                <div class="mt-80 mt-md-50 mb-sm-50">
                    <h2 class="title-bottom lg mb-20 pb-10"><?php echo $hakkimizdacek['hakkimizda_baslik']; ?></h2>
                    <p class="color-black fs-16"><?php echo substr($hakkimizdacek['hakkimizda_icerik'],0,330); ?>...</p>
                    <div class="fs-18 fw-b mt-20"><a href="hakkimizda"><button style="background-color:#E61F41;" class="btn btn-danger btn-xs"> Devamı</button></a></div>                
                </div>                    
            </div>
            <div class="col-md-5 col-lg-5 pr-0 bg-half-d1">                   
            </div>
        </div>
    </div>
</section>



<!--Blog Section-->
<section class="blog-section pt-80 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="text-uppercase">Haberler & Blog</h1>
                <hr>
            </div>
        </div>
        <div class="row clearfix blog-post-hvr">
            <div class="col-md-8">
                <div class="row">


                  <?php 

                  $iceriksor=$db->prepare("select * from icerik order by icerik_zaman DESC limit 4");
                  $iceriksor->execute();

                  while($icerikcek=$iceriksor->fetch(PDO::FETCH_ASSOC)) { ?>



                  <!--Column-->
                  <div class="col-md-6 col-lg-12">
                    <article class="blog-post">
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-12">
                                <figure class="post-header">
                                    <a href="#"><img style="width:360px; height: 260px;" alt="<?php echo $icerikcek['icerik_ad']; ?>" src="<?php echo $icerikcek['icerik_resimyol']; ?>"></a>
                                    <div class="entry-meta">
                                        <ul>
                                            <?php 
                                            $tarih=explode(' ',$icerikcek['icerik_zaman']);
                                            $tarihduz=tcevir($tarih[0]);
                                            $gun=explode('-',$tarihduz);
                                            ?>
                                            <li class="entry-date"><span><?php echo $gun[0]; ?></span> <br> <?php 

                                                switch ($gun[1]) {

                                                    case "01": echo "Ocak"; break;
                                                    case "02": echo "Şubat"; break;
                                                    case "03": echo "Mart"; break;
                                                    case "04": echo "Nisan"; break;
                                                    case "05": echo "Mayıs"; break;
                                                    case "06": echo "Haz."; break;
                                                    case "07": echo "Tem."; break;
                                                    case "08": echo "Ağus."; break;
                                                    case "09": echo "Eylül"; break;
                                                    case "10": echo "Ekim"; break;
                                                    case "11": echo "Kasım"; break;
                                                    case "12": echo "Ara."; break;

                                                }

                                                ?></li>
                                                <li class="entry-comment"><i class="icon fa fa-comment"></i> <?php echo $gun[2]; ?></li>
                                            </ul>
                                        </div>
                                    </figure>                                        
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="content">
                                        <h3 class="title"><a href="blog-detail.html"><?php echo substr($icerikcek['icerik_ad'],0,100); ?></a></h3>

                                        <div class="text">
                                            <p><?php echo substr($icerikcek['icerik_detay'],0,200); ?>...</p>
                                        </div>
                                        <a href="<?=seo($icerikcek["icerik_ad"]).'-'.$icerikcek["icerik_id"]?>" class="read-more">Devamını Oku<i class="ml-5 fa fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>

                    <?php } ?>
                </div>
            </div>

            <div class="col-md-4">

                <?php 

                $iceriksor=$db->prepare("select * from icerik order by icerik_zaman DESC limit 4,5");
                $iceriksor->execute();

                while($icerikcek=$iceriksor->fetch(PDO::FETCH_ASSOC)) { ?>


                <!--Column-->
                <article class="blog-post post-tale">
                    <div class="row clearfix">                            
                        <div class="col-md-12">
                            <figure class="post-header">
                                <a href="#"><img style="width:360px; height: 260px;" alt="<?php echo $icerikcek['icerik_ad']; ?>" src="<?php echo $icerikcek['icerik_resimyol']; ?>"></a>
                                <div class="entry-meta">
                                    <ul>
                                        <?php 
                                        $tarih=explode(' ',$icerikcek['icerik_zaman']);
                                        $tarihduz=tcevir($tarih[0]);
                                        $gun=explode('-',$tarihduz);
                                        ?>
                                        <li class="entry-date"><span><?php echo $gun[0]; ?></span> <br> <?php 

                                            switch ($gun[1]) {

                                                case "01": echo "Ocak"; break;
                                                case "02": echo "Şubat"; break;
                                                case "03": echo "Mart"; break;
                                                case "04": echo "Nisan"; break;
                                                case "05": echo "Mayıs"; break;
                                                case "06": echo "Haz."; break;
                                                case "07": echo "Tem."; break;
                                                case "08": echo "Ağus."; break;
                                                case "09": echo "Eylül"; break;
                                                case "10": echo "Ekim"; break;
                                                case "11": echo "Kasım"; break;
                                                case "12": echo "Ara."; break;

                                            }

                                            ?></li>
                                            <li class="entry-comment"><i class="icon fa fa-comment"></i> <?php echo $gun[2]; ?></li>
                                        </ul>
                                    </div>
                                </figure>                                        
                            </div>
                            <div class="col-md-12">
                                <div class="content">
                                    <h3 class="title"><a href="blog-detail.html"><?php echo substr($icerikcek['icerik_ad'],0,100); ?></a></h3>

                                    <div class="text">
                                        <p><?php echo substr($icerikcek['icerik_detay'],0,200); ?>...</p>
                                    </div>
                                    <a href="<?=seo($icerikcek["icerik_ad"]).'-'.$icerikcek["icerik_id"]?>" class="read-more">Devamını Oku<i class="ml-5 fa fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </article>
                    <?php } ?>
                </div>                

            </div>
        </div>
    </section>




    <!--Featured Section-->
    <section class="featured-section pt-80 pb-70">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="color-white text-uppercase">Hakkımızda</h1>
                    <hr>
                </div>
            </div>

            <div class="row clearfix">

                <!--Skills Column-->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 column">
                    <h4 class="sec-title title-bottom color-white mb-30"><span class="color-theme">Tanıtım</span> Videosu</h4>
                    <div class="skills">

                        <div class="embed-responsive embed-responsive-16by9 mb-xl">
                            <iframe width="200" height="113" src="https://www.youtube.com/embed/<?php echo $hakkimizdacek['hakkimizda_video']; ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                        </div>

                    </div>

                </div>               

                <!--Accordion Column-->
                <article class="col-xs-12 col-sm-6 col-md-6 col-lg-4 column">
                    <h4 class="sec-title title-bottom color-white mt-md-30 mb-30"><span class="color-theme">Sık Sorulanlar</span> </h4>

                    <!--Accordion Box-->
                    <ul class="accordion-box">


                      <?php 

                      $ssssor=$db->prepare("select * from sss order by sss_sira DESC limit 3");
                      $ssssor->execute();

                      while($ssscek=$ssssor->fetch(PDO::FETCH_ASSOC)) {
                        ?>

                        <!--Block-->
                        <li class="block">
                            <div class="acc-btn active"><div class="icon-outer"><span class="icon fa icon-minus flaticon-line"></span> <span class="icon icon-plus flaticon-signs"></span></div> <?php echo $ssscek['sss_ad']; ?></div>
                            <div class="acc-content ">
                                <div class="content"><?php echo strip_tags($ssscek['sss_detay']); ?> </div>
                            </div>
                        </li>

                        <?php } ?>





                    </ul>

                </article>

                <!--Tabs Column-->
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 column sm-d-ib">
                    <h4 class="sec-title title-bottom color-white mb-30 mt-md-30"><span class="color-theme">Vizyon</span> Misyon</h4>
                    <div class="tab-style" data-border="1px solid #9101cc">
                        <!--Btns Column-->
                        <div class="column">
                            <div class="tab-btns clearfix">
                                <a href="#tab-1" class="tab-btn active">Vizyon</a>
                                <a href="#tab-2" class="tab-btn">Misyon</a>
                            </div>
                        </div>

                        <!--Content Column-->
                        <div class="column content-column">

                            <!--Tab-->
                            <div class="tab collapsed" id="tab-1">
                                <div class="row clearfix">
                                    <div class="col-md-12 text-column">
                                        <p class="color-white title-bottom lg pb-10 mb-15"><?php echo $hakkimizdacek['hakkimizda_vizyon']; ?></p>

                                    </div>
                                </div>
                            </div>

                            <!--Tab-->
                            <div class="tab" id="tab-2">
                                <div class="row clearfix">
                                    <div class="col-md-12 text-column">
                                        <p class="color-white title-bottom lg pb-10 mb-15"><?php echo $hakkimizdacek['hakkimizda_misyon']; ?></p>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>





    <?php 
    include 'footer.php'; 
    ?>
