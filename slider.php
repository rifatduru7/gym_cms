    <!--Main Slider-->
    <section class="main-slider">
       <div class="tp-banner-container">
        <div class="tp-banner">
         <ul>

              <?php 

              $slidersor=$db->prepare("select * from slider where slider_durum=? order by slider_sira ASC limit 25");
              $slidersor->execute(array(1));

              while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) {
                   ?>



                   <li data-transition="slideup" data-slotamount="1" data-masterspeed="1000" data-thumb="<?php echo $slidercek['slider_resimyol']; ?>"  data-saveperformance="off"  data-title="<?php echo $slidercek['slider_ad']; ?>">
                    <img src="<?php echo $slidercek['slider_resimyol']; ?>"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"> 
                    

               </li>

               <?php } ?>



          </ul>

          <div class="tp-bannertimer"></div>
     </div>
</div>
</section>