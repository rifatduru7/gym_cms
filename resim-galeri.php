<?php 
include 'header.php'; 

?>
<head>
    <link href="css/modalimg.css" rel="stylesheet">

        <title>Resim Galeri</title>  

</head>
<!--Page Title-->
<section class="page-title theme-overlay overlay-black" style="background-image:url(images/parallax/image-4.jpg);">
    <div class="auto-container">
        <div class="text-center">
            <h1>Resim Galeri</h1>
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

           

         <div class="row">

             <ul class="portfolio-list lightbox m-none" data-plugin-options='{"delegate": "a.lightbox-portfolio", "type": "image", "gallery": {"enabled": true}}'>

              <?php

                $sayfada = 20; // sayfada gösterilecek içerik miktarını belirtiyoruz.


                $sorgu=$db->prepare("select * from galeri");
                $sorgu->execute();
                $toplam_galeri=$sorgu->rowCount();

                $toplam_sayfa = ceil($toplam_galeri / $sayfada);

                  // eğer sayfa girilmemişse 1 varsayalım.
                $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;

			    // eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
                if($sayfa < 1) $sayfa = 1; 

				// toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
                if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa; 

                $limit = ($sayfa - 1) * $sayfada;

                $galerisor=$db->prepare("select * from galeri order by galeri_id DESC limit $limit,$sayfada");
                $galerisor->execute();
                $say=0;

                while($galericek=$galerisor->fetch(PDO::FETCH_ASSOC)) { $say++;?>


                <div style="padding: 10px;" class="col-md-4">

                    <img id="myImg<?php echo $say; ?>" src="<?php echo $galericek['galeri_resimyol']; ?>" alt="<?php echo $galericek['galeri_resimyol']; ?>" >

                    <div  id="myModal" class="modal">
                      <span class="close">&times;</span>
                      <img class="modal-content" id="img01">
                      <div id="caption"></div>
                  </div>

                  <script>
var modal = document.getElementById('myModal');

var img = document.getElementById("myImg<?php echo $say; ?>");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

var span = document.getElementsByClassName("close")[0];

span.onclick = function() { 
    modal.style.display = "none";
}
</script>



</div>



<?php } ?>

</ul>

<div align="right" class="col-md-12">
 <ul class="pagination">

  <?php

  $s=0;

  while ($s < $toplam_sayfa) {

   $s++; ?>

   <?php 

   if ($s==$sayfa) {?>

   <li class="active">

    <a href="resim-galeri?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>

</li>

<?php } else {?>


<li>

    <a href="resim-galeri?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>

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
