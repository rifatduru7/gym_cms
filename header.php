<?php 
include 'nedmin/netting/baglan.php';
include 'nedmin/production/ponki.php';
date_default_timezone_set('Europe/Istanbul');

$ayarsor=$db->prepare("select * from ayar where ayar_id=?");
$ayarsor->execute(array(0));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);
$hakkimizdasor=$db->prepare("select * from hakkimizda where hakkimizda_id=?");
$hakkimizdasor->execute(array(0));
$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!-- Stylesheets -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/revolution-slider.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="<?php echo $ayarcek['ayar_keywords']; ?>" />
    <meta name="description" content="<?php echo $ayarcek['ayar_description']; ?>">
    <meta name="author" content="<?php echo $ayarcek['ayar_author']; ?>"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link href="css/bootstrap-margin-padding.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>
    <div class="page-wrapper">

        <!-- Preloader -->
        <div class="preloader"></div>

        <!-- #topbar -->
        <section id="topbar" class="construct header-top">
            <div class="container">
                <div class="row">
                    <div class="social pull-right">

                    </div> <!-- /.social -->
                    <div class="contact-info pull-left">
                        <ul>
                            <li><a href="tel:+1234567890"><i class="fa fa-map-marker"></i>  <?php echo $ayarcek['ayar_adres']; ?> / <?php echo $ayarcek['ayar_il']; ?> - <?php echo $ayarcek['ayar_ilce']; ?></a></li>
                            <li><a href="mailto:example@gmail.com"><i class="fa fa-envelope"></i> <?php echo $ayarcek['ayar_mail']; ?></a></li>
                            <li><a href="tel:1800654896"><i class="fa fa-phone"></i> <?php echo $ayarcek['ayar_tel']; ?></a></li>
                        </ul>
                    </div> <!-- /.contact-info -->
                </div>
            </div>
        </section> <!-- /#topbar -->

        <!-- header -->
        <header class="construct header-curvy">
            <div class="search-box">
                <div class="container">
                    <div class="pull-right search  col-lg-3 col-md-4 col-sm-5 col-xs-12">
                        <form action="#">
                            <input type="text" placeholder="Search Here"> <button type="submit"><i class="icon icon-Search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="cart-box">
                <div class="container">
                    <div class="pull-right cart col-lg-6 col-xs-12">
                        <p><i class="icon icon-FullShoppingCart"></i> You Have <span>1 Item</span> in your Cart. Price is <span>$199</span></p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="clearfix">
                    <div class="pull-left logo">
                        <a href="index.html">
                            <img src="<?php echo $ayarcek['ayar_logo']; ?>" alt="FitClub">
                        </a>
                    </div>
                    <nav class="pull-right mainmenu-container clearfix">

                        <button class="mainmenu-toggler">

                        </button>
                        <ul class="mainmenu pull-right">
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

                    <ul class="submenu">

                        <?php 

                        while($altmenucek=$altmenusor->fetch(PDO::FETCH_ASSOC)) {
                            ?>

                            <li>
                                <a href="<?php

                                if (strlen($altmenucek['menu_url'])>0) {

                                    echo $altmenucek['menu_url'];

                                } elseif (strlen($altmenucek['menu_url'])==0) {?>

                                sayfa-<?=seo($altmenucek["menu_ad"]).'-'.$altmenucek["menu_id"]?>

                                <?php }

                                ?>"><?php echo $altmenucek['menu_ad']; ?></a>

                            </li>

                            <?php  } ?>

                        </ul>
                    </li>



                    <?php } ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <!--End Main Header -->  