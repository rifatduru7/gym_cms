<?php 
include 'header.php'; 

?>
<head>
    <title>Haberler</title>  
</head>

<!--Page Title-->
<section class="page-title theme-overlay overlay-black" style="background-image:url(images/parallax/image-4.jpg);">
    <div class="auto-container">
        <div class="text-center">
            <h1>Haberler & Blog</h1>
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

          <div class="col-md-9">

              
            <div class="divider divider-primary divider-small mb-xl">
            </div>

            <div class="row">

              <?php

                $sayfada = 4; // sayfada gösterilecek içerik miktarını belirtiyoruz.


                $sorgu=$db->prepare("select * from icerik");
                $sorgu->execute();
                $toplam_icerik=$sorgu->rowCount();

                $toplam_sayfa = ceil($toplam_icerik / $sayfada);

                  // eğer sayfa girilmemişse 1 varsayalım.
                $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;

          // eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
                if($sayfa < 1) $sayfa = 1; 

        // toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
                if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa; 

                $limit = ($sayfa - 1) * $sayfada;

                $iceriksor=$db->prepare("select * from icerik order by icerik_zaman DESC limit $limit,$sayfada");
                $iceriksor->execute();

                while($icerikcek=$iceriksor->fetch(PDO::FETCH_ASSOC)) { ?>

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

                    <div align="right" class="col-md-12">
                      <ul class="pagination">

                        <?php

                        $s=0;

                        while ($s < $toplam_sayfa) {

                          $s++; ?>

                          <?php 

                          if ($s==$sayfa) {?>

                          <li class="active">

                            <a href="haberler?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>

                        </li>

                        <?php } else {?>


                        <li>

                            <a href="haberler?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>

                        </li>
                        
                        <?php   }

                    }

                    ?>

                </ul>
            </div>
            

        </div>

    </div>


    <!-- Sidebar -->


    <?php include 'rightbar.php'; ?>

</div>

</div>
</div>

<?php include 'footer.php'; ?>
