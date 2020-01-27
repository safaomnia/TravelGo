<!-- =======================
  Main Banner -->
<section class="p-0 height-700 parallax-bg tourBanner" style="background:url(images/banner/14.jpg) no-repeat 65% 0%; background-size:cover;height: 600px;">
  <div class="container h-100">
    <div class="row justify-content-between align-items-center h-100" >
      <div class="col-md-12 mb-7">
        <h4>Bienvenue dans notre site TravelGo</h4>
        <h1 class="display-4 font-weight-bold">Ici ! Vous pouvez réserver des chambres d'hôtel et des voitures d'agence dans toute la Tunisie</h1>
         </div>
    </div>
  </div>
</section>

<section class="Categories pt80 pb60 ">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-8">
        <p class="subtitle text-secondary nopadding">Rester et manger comme local</p>
        <h1 class="paddtop1 font-weight lspace-sm">Favories hôtels</h1>
      </div>
      <div class="col-md-4 d-lg-flex align-items-center justify-content-end"><a href="#" class="blist text-sm ml-2">Voir tous les hôtels<i class="fas fa-angle-double-right ml-2"></i></a></div>
    </div>
      <div class="row">
        <?php foreach ($hotels as $hotel) { ?>
          <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <div class="listroBox">
              <figure><a href="hotel-detailed.html"><img src="images/hotels/<?=$hotel->image?>" class="img-fluid" alt="" >
                <div class="read_more"><span>plus détails</span></div>
                </a> </figure>
              <div class="listroBoxmain">
                <h3><a href="hotel-detailed.html"><?=$hotel->nom?></a></h3>
                <p>
                  <?php $ch = $hotel->libelle;
                    if(strlen($ch) > 100) {
                      for ($i=0; $i < 100; $i++) { 
                        echo $ch[$i];
                      }
                      echo " ...<a href=''><font style='font-size:13px;color:#A9A9A9
;'> plus détails </font></a>";
                    }
                  ?>
                </p>
                <a class="address" href="#"><?=$hotel->adresse?></a> </div>
              <ul>
                <li style="visibility: hidden;">
                  <p class="card-text text-muted"><span class="h4 text-primary">$80</span> / night</p>
                </li>
                <li>
                  <div class="R_retings">
                    <div class="list-rat-ch list-room-rati"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        <?php } ?>
    </div>
  
  </div>
</section>

<!-- =======================
  service -->
<section class="service pt80 pb80 service-home">
  <div class="container">
      <div class="row mb-5">
      <div class="col-md-8">
        <h1 class="paddtop1 font-weight lspace-sm">Agence des voiture</h1>
      </div>
      <div class="col-md-4 d-lg-flex align-items-center justify-content-end"><a href="#" class="blist text-sm ml-2">Voir tous les agences<i class="fas fa-angle-double-right ml-2"></i></a></div>
    </div>
    <div class="row">
      <?php 
      $compteur = 0;
      $limite = min(3, count($agences));
      foreach ($agences as $agence) { ?>
          <div class="col-md-4 mt-30">
            <div class="featureBox icon-grad h-100">
              <h3 class="feature-box-title" style="margin: -5px 0 20px;"><?=$agence->nom?></h3>
              <p class="feature-box-desc"><?php $ch = $agence->libelle;
                if(strlen($ch) > 100) {
                  for ($i=0; $i < 100; $i++) { 
                    echo $ch[$i];
                  }
                  echo " ...<a class='mt-3' href='#'>Plus détails!</a> </div>";
                } else {
                  echo "$agence->libelle";
                }
              ?>
              </p>
          </div>
        <?php
        $compteur++;
        if ($compteur == $limite) break;
      } ?>
    </div>
  </div>
</section>
<!-- =======================
  service -->

