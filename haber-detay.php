<?php 
include 'header.php'; 


$iceriksor=$db->prepare("SELECT * from icerik where icerik_id=:icerik_id");
$iceriksor->execute(array(
    'icerik_id' => $_GET['icerik_id']
    ));

$icerikcek=$iceriksor->fetch(PDO::FETCH_ASSOC);

?>
<head>
    <title><?php echo $icerikcek['icerik_ad']; ?></title>  
</head>

<!--Page Title-->
<section class="page-title theme-overlay overlay-black" style="background-image:url(images/parallax/image-4.jpg);">
    <div class="auto-container">
        <div class="text-center">
            <h1><?php echo $icerikcek['icerik_ad']; ?></h1>
            <div class="bread-crumb">
            </div>

        </div>
    </div>
</section>

<br>
<br>


<section class="blog_area section_padding">
    <div class="container">

        <div class="row">

             <!--Content Side-->    
                <div class="col-lg-9 col-md-8 col-sm-6 col-xs-12">
                    <section class="blog-container blog-detail">
                        <!--Blog Post-->
                        <div class="wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <!--Blog Post-->
                            <article class="blog-post hvr-float-shadow">
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                       <figure class="post-header">
                                    <a href="#"><img style="width:840px; height: 460px;" alt="<?php echo $icerikcek['icerik_ad']; ?>" src="<?php echo $icerikcek['icerik_resimyol']; ?>"></a>
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
                                        <div class="content pl-30 pb-30">
                                            <h3 class="title"><a href="blog-detail.html"><?php echo $icerikcek['icerik_ad']; ?></a></h3>
                                           
                                            <div class="text">
                                                <p><?php echo $icerikcek['icerik_detay']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>                        
                            <!--Blog Post-->
                            
                           
                            
                           

                          
                        </div>
                    </section>               
                    
                </div>
                <!--Content Side-->

    <!-- Sidebar -->


    <?php include 'rightbar.php'; ?>

</div>

</div>
</div>

<?php include 'footer.php'; ?>
