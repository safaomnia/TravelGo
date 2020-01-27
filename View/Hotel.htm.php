
<!-- =======================
	Banner innerpage -->
<div class="innerpage-banner left bg-overlay-dark-7 py-7" style="background:url(images/07.jpg) repeat; background-size:cover;height: 10px;">
  <div class="container" style="margin-top: -50px;">
    <div class="row all-text-white">
      <div class="col-md-12 align-self-center">
        <h1 class="innerpage-title">Liste des hotéls</h1>
        <h6 class="subtitle">Vous pouvez le réserver</h6>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="index.php"><i class="ti-home"></i> Acceuil</a></li>
            <li class="breadcrumb-item">hôtel</li>
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
      <div class="col-lg-3 col-md-3 col-sm-12">
        <?php if (!empty($user)) { ?>
          <div class="Filter-left" style="margin-bottom: 30px;">
            <form>
              <div class="mb-left">
                <label for="form_guests" class="form-label">Affichage</label>
                <input type="hidden" name="route" value="hotel">
                <select class="custom-select select-big" name="affichage">
                  <option value="true" selected="">Vos hotel </option>
                  <option value="false">Tous les hôtels </option>
                </select>
              </div>
              <div class="pb-left">
                <div class="mb-left">
                  <button type="submit" class="btn btn-primary btn-grad FilterBtn">Afficher </button>
                </div>
              </div>
            </form>
          </div>
        <?php } ?>
        <div class="Filter-left">
          <form method="POST">
            <div class="mb-left">
              <label for="form_guests" class="form-label">Nom</label>
              <div class="form-group">
                <input class="form-control" type="text" name="hotel[nom]">
              </div>
            </div>
            <div class="mb-left">
              <label for="form_guests" class="form-label">Ville</label>
              <select class="custom-select select-big" name="hotel[adresse]">
                <option selected="" disabled="">Choisir</option>
                <option value="Tunis">Tunis</option>
                <option value="Jendouba">Jendouba</option>
                <option value="Sfax">Sfax</option>
                <option value="Sousse">Sousse</option>
                <option value="Monastir">Monastir</option>
                <option value="Bizerte">Bizerte</option>
                <option value="Gabès">Gabès</option>
                <option value="Kairouan">Kairouan</option>
                <option value="Mahdia">Mahdia</option>
                <option value="Nabeul">Nabeul</option>
                <option value="Ariana">Ariana</option>
                <option value="Gafsa">Gafsa</option>
                <option value="Hammamet">Hammamet</option>
                <option value="Tozeur">Tozeur</option>
                <option value="Médenine">Médenine</option>
                <option value="Kef">Kef</option>
                <option value="Béja">Béja</option>
                <option value="Tataouine">Tataouine</option>
                <option value="Kasserine">Kasserine</option>
                <option value="Manouba">Manouba</option>
                <option value="Sidi Bouzid">Sidi Bouzid</option>
                <option value="Zaghouan">Zaghouan</option>
                <option value="Zarzis">Zarzis</option>
                <option value="Siliana">Siliana</option>
                <option value="Ben Arous">Ben Arous</option>
              </select>
            </div>
            <div class="mb-left">
              <label for="form_type" class="form-label">Catégorie</label>
              <select class="custom-select select-big" name="hotel[categorie]">
                <option selected="" disabled="">Choisir</option>
                <option value="5">★★★★★ 5</option>
                <option value="4">★★★★☆ 4</option>
                <option value="3">★★★☆☆ 3</option>
                <option value="4">★★☆☆☆ 2</option>
                <option value="1">★☆☆☆☆ 1</option>
              </select>
            </div>
            <div class="pb-left">
              <div class="mb-left">
                <button type="submit" class="btn btn-primary btn-grad FilterBtn"> <i class="fas fa-search mr-1"></i>Chercher </button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-lg-9 col-md-8 col-sm-12">
        <div class="resultBar barSpaceAdjust">
          <h2>Nous avons trouvé  <span><?=count($hotels)?></span> hôtels </h2>
          <?php if (isset($user->profil)): ?>
            <ul class="list-inline">
              <li class="active" title="Ajouter nouvelle hôtel"><a href="?route=formhotel"><i class="fa fa-plus-circle" style="font-size: 150%;" aria-hidden="true"></i></a></li>
          </ul>
          <?php endif ?>
        </div>
        <div class="row">
        <?php foreach ($hotels as $hotel) { ?>
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row listroBox">
                  <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 Nopadding">
                    <figure> <a href="?route=chambre&id=<?=$hotel->id?>"><img src="images/hotels/<?=$hotel->image?>" class="img-fluid" alt=""></a>
                      <div class="TravelGo-category-opt">
                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5">
                          <?php for ($i=0; $i < $hotel->categorie; $i++) { ?>
                            <i class="fa fa-star"></i>
                          <?php } ?>
                        </div>
                        <div class="rate-class-name" style="visibility: hidden;">
                          <div class="score"><strong>Very Good</strong>27 Reviews </div>
                          <span>5.0</span>
                        </div>
                      </div>
                      </a> </figure>
                  </div>
                  <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12 Nopadding">
                    <div class="listroBoxmain">
                      <h3 style="margin-bottom: 30px;">
                        <a href="?route=chambre&id=<?=$hotel->id?>"><?=$hotel->nom?></a>
                        <?php if (isset($user->profil) && $user->id == $hotel->id_agent): ?>
                            <i class="fa fa-ellipsis-v mr-2 mb-0" role="button" id="dropdownAccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="float: right;"></i>
                            <div class="dropdown-menu mt-2 shadow" aria-labelledby="dropdownAccount" style="margin-right: 120px;">  <a class="dropdown-item" href="?route=formhotel&id=<?=$hotel->id?>">Modifier</a> 
                              <a class="dropdown-item" href="?route=deletehotel&id=<?=$hotel->id?>" onclick="return confirm('Voulez-vous sûr de suprrimer ce hôtel?');">Supprimer</a> 
                            </div>
                        <?php endif ?>
                      </h3>
                     
                      <p>
                        <?php $ch = $hotel->libelle;
                        if(strlen($ch) > 200) {
                          for ($i=0; $i < 200; $i++) { 
                            echo $ch[$i];
                          }
                          echo " ...<a href='?route=detailshotel&id=$hotel->id'><font style='font-size:13px;color:#A9A9A9
;'> plus détails </font></a>";
                        }
                        ?>
                      </p>
                      <a href="#"><i class="fas fa-map-marker-alt"></i> <?=$hotel->adresse?></a> </div>
                    <ul>
                      <li><span class="Ropen">Chambres: <?=$hotel->nbr_chambre?></span></li>
                      <li>
                        <div class="R_retings"><span><?php 
                          foreach ($agents as $agent) {
                            if ($agent->id == $hotel->id_agent) echo "$agent->prenom $agent->nom";
                          }
                          ?><em><?=$hotel->nbr_personne?> personnes</em></span></div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div> 
        <?php } ?>
      </div>
    </div>
  </div>
</section>