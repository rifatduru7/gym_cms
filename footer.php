 <!--Main Footer-->
 <footer class="main-footer bg-image theme-overlay overlay-deep-black" data-img-bg="images/parallax/image-2.jpg">

    <!--Footer Upper-->
    <div class="footer-upper xs-width4-center">
     <div class="container">
        <div class="row clearfix">
            <div class="col-md-4 col-sm-6">
                <div class="footer-widget about-widget">
                    <a href="#">
                        <img src="<?php echo $ayarcek['ayar_logo']; ?>" alt="<?php echo $ayarcek['ayar_title']; ?> logo"/>
                    </a>
                    <p class="mt-15"><?php echo strip_tags(substr($hakkimizdacek['hakkimizda_icerik'],0,400)); ?>.. </p>


                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
             <div class="footer-widget links-widget">
                 <div class="widget-title"><h3>Hızlı Linkler</h3></div>
                 <ul>
                     <?php 

                     $menusor=$db->prepare("select * from menu where menu_ust=:menu_ust order by menu_sira");
                     $menusor->execute(array(
                        'menu_ust' => 0
                        ));
                     while($menucek=$menusor->fetch(PDO::FETCH_ASSOC)) {
                        $menu_id=$menucek['menu_id'];
                        $altmenusor=$db->prepare("select * from menu where menu_ust=:menu_id order by menu_sira");
                        $altmenusor->execute(array(
                            'menu_id' => $menu_id
                            ));
                        $say=$altmenusor->rowCount();

                        ?>

                        <li <?php 
                        if ($say>0) {

                            echo "class='submenu'";
                        }
                        ?>>
                        <a href="<?php

                        if (strlen($menucek['menu_url'])>0) {

                            echo $menucek['menu_url'];

                        } elseif (strlen($menucek['menu_url'])==0) {?>

                        sayfa-<?=seo($menucek["menu_ad"]).'-'.$menucek["menu_id"]?>

                        <?php }

                        ?>"><?php echo $menucek['menu_ad']; ?></a>


                    </li>



                    <?php } ?>

                </ul>
            </div>
        </div>


        <div class="col-md-5 col-sm-6 col-xs-12">
            <div class="footer-widget contact-widget">
                <div class="widget-title"><h3>Hızlı İletişim</h3></div>

                <form action="smphp/index.php" class="validated-contact-form contact-form" id="footer-cf">

                <input type="text" name="adsoyad"  placeholder="Ad Soyad">
                    <input type="text" name="eposta" placeholder="Mail Adresi" >
                    <textarea name="mesaj" placeholder="Mesajınız"></textarea>
                    <button type="submit" name="iletisimform">Gönder</button>
                    <div class="result"></div><!-- /.result -->

                </form>

            </div>
        </div>

    </div>
</div>
</div>

<!--Footer bootom-->
<div class="footer-bottom">
 <div class="auto-container text-center fs-13">
  <p>Copyright © 2017 <a target="_blank" title="Rıfat Duru" href="http://www.rifatduru.com/">Rıfat Duru</a> </p>

</div>
</div>

</footer>

</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top"><span class="fa fa-arrow-up"></span></div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/revolution.min.js"></script>
<!-- MixIt UP JS -->
<script src="js/jquery.mixitup.min.js"></script> 

<!-- FancyBox -->
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.plugin.min.js"></script>
<script src="js/jquery.datepick.min.js"></script>
<script src="js/wow.js"></script>

<script src="js/validate.js"></script>
<script src="js/script.js"></script>

</body>
</html>