<section> 
  <!-- Slider main container-->
  <div class="swiper-container detail-slider slider-gallery"> 
    <!-- Additional required wrapper-->
    <div class="swiper-wrapper"> 
      <!-- Slides-->
      <?php foreach ($chambres as $chambre): ?>
        <div class="swiper-slide">
          <a data-toggle="gallery-top" title="Our street">
            <img src="images/hotels/<?=$chambre->photo?>" alt="Our street" class="img-fluid">
          </a>
        </div>
      <?php endforeach ?>
     
    </div>
    <div class="swiper-pagination swiper-pagination-white"></div>
    <div class="swiper-button-prev swiper-button-white"></div>
    <div class="swiper-button-next swiper-button-white"></div>
  </div>
</section>
<section class="pt80 pb80 listingDetails Campaigns">
  <div class="container">
    <div class="row" style="margin-left:20px;"> 
      
      <!-- Tab line -->
      <div class="col-lg-12 col-md-12 col-sm-12 ">
        <ul class="nav nav-tabs tab-line">
          <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab-de-1"> Description </a> </li>
          <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab-de-2"> Chambre </a> </li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane booking-search show active" id="tab-de-1">
            <div class="text-block NopaddingDetails">
              <h5 class="mb-4"><?=$hotel->nom?></h5>
              <p class="text-muted font-weight-light"><?=$hotel->libelle?></p>
            </div>
          </div>
          <div class="tab-pane" id="tab-de-2">
            <div class="text-block NopaddingDetails"> 
              <!-- Gallery-->
              <h5 class="mb-4">Gallery</h5>
              <div class="row gallery ml-n1 mr-n1">
                <?php foreach ($chambres as $chambre): ?>
                  <div class="col-lg-4 col-6 px-1 mb-2">
                      <a href="?route=reserver"><img src="images/hotels/<?=$chambre->photo?>" alt="..." class="img-fluid"></a>
                  </div>
                <?php endforeach ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>