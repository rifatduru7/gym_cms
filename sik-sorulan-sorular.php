<?php 
include 'header.php'; 

?>
<head><title>Sık Sorulan Sorular</title>  
</head>

<!--Page Title-->
<section class="page-title theme-overlay overlay-black" style="background-image:url(images/parallax/image-4.jpg);">
    <div class="auto-container">
        <div class="text-center">
            <h1>Sık Sorulan Sorular</h1>
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

            <h1 class="mt-xl mb-none">Sık Sorulanlar</h1>
            <div class="divider divider-primary divider-small mb-xl">
               <hr>
           </div>

           <div class="row">

            <div class="toggle toggle-primary col-md-11" data-plugin-toggle>

                <?php 

                $ssssor=$db->prepare("select * from sss order by sss_sira DESC");
                $ssssor->execute();

                $say=0;

                while($ssscek=$ssssor->fetch(PDO::FETCH_ASSOC)) { $say++;
                    ?>

                    <div class="panel-group" id="accordion">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $say; ?>">
                                <?php echo $ssscek['sss_ad']; ?></a>
                            </h4>
                        </div>
                        <div id="collapse<?php echo $say; ?>" class="panel-collapse collapse">
                          <div class="panel-body"><?php echo strip_tags($ssscek['sss_detay']); ?></div>
                          </div>
                      </div>              
                  </div>


              
                <?php } ?>


            </div>



        </div></div>




        <!-- Sidebar -->


        <?php include 'rightbar.php'; ?>

    </div>

</div>
</div>

<?php include 'footer.php'; ?>
