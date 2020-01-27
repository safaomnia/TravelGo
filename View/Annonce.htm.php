<!-- =======================
  Banner innerpage -->
<div class="innerpage-banner left bg-overlay-dark-7 py-7" style="background:url(images/07.jpg) repeat; background-size:cover;height: 10px;">
  <div class="container" style="margin-top: -50px;">
    <div class="row all-text-white">
      <div class="col-md-12 align-self-center">
        <h1 class="innerpage-title">Tous annonces</h1>
        <h6 class="subtitle">Vous pouvez trouvez tous les annonces des hôtels et agences des voiture ici</h6>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="index-2.html"><i class="ti-home"></i> Acceuil</a></li>
            <li class="breadcrumb-item">Annonce</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>
<!-- =======================
  Banner innerpage -->

<section class="pt80 pb80 cruise-grid-view">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-8 col-sm-12">
        <div class="row">
          <?php foreach ($annonces as $annonce) {
            if (!empty($annonce->id_hotel)) {
              foreach ($hotels as $hotel) {
                  if ($hotel->id == $annonce->id_hotel) {
                    $nom = $hotel->nom;
                    $image = "hotels/$hotel->image";
                  }
                }
            } elseif (!empty($annonce->id_voiture)) {
              foreach ($voitures as $voiture) {
                  if ($voiture->id == $annonce->id_voiture) {
                    $idAgence = $voiture->id_agence;
                    $nom = $voiture->marque;
                    $image = "cars/$voiture->photo";
                  }
                }
            } else {
              $image = "annonce.png";
            }
          ?>
            <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="listroBox">
              <figure> <a href="hotel-detailed.html"><img src="images/<?=$image?>" class="img-fluid" alt="" >
                <?php if (!empty($annonce->id_hotel)): ?>
                  <div class="read_more"><a href="?route=chambre&id=<?=$annonce->id_hotel?>"><span> Réserver</span></a></div>
                <?php elseif (!empty($annonce->id_voiture)) :?>
                  <div class="read_more"><a href="?route=louer&id=<?=$annonce->id_voiture?>&id_agence=<?=$idAgence?>"><span>Louer</span></a></div>
                <?php endif ?>
                </a> </figure>
              <div class="listroBoxmain">
                <h3><a href="hotel-detailed.html"><?=$annonce->titre?></a></h3>
                <p><?=$annonce->contenu;?></p> 
              </div>
              <?php if (!empty($annonce->id_hotel)) { ?>
                <ul>
                  <li><span class="Ropen">Hotel:  <?=$nom?></span></li>
                  <li>
                    <div class="R_retings"><span><?php 
                      foreach ($agents as $agent) {
                        if ($agent->id == $annonce->id_agent) echo "$agent->prenom $agent->nom";
                      }
                      ?><em><?=$annonce->type?></em></span></div>
                  </li>
                </ul>
              <?php } elseif(!empty($annonce->id_voiture)) { ?>
                <ul>
                  <li><span class="Ropen">Hotel:  <?=$nom?></span></li>
                  <li>
                    <div class="R_retings"><span><?php 
                      foreach ($agents as $agent) {
                        if ($agent->id == $annonce->id_agent) echo "$agent->prenom $agent->nom";
                      }
                      ?><em><?=$annonce->type?></em></span></div>
                  </li>
                </ul>
              <?php } else { ?>
                <ul>
                  <li></li>
                  <li>
                    <div class="R_retings"><span><?php 
                      foreach ($agents as $agent) {
                        if ($agent->id == $annonce->id_agent) echo "$agent->prenom $agent->nom";
                      }
                      ?><em><?=$annonce->type?></em></span></div>
                  </li>
                </ul>
              <?php } ?>
            </div>
          </div>
          <?php } ?>
          
      </div>
    </div>
  </div>
</section>