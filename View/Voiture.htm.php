 <div class="innerpage-banner left bg-overlay-dark-7 py-7" style="background:url(images/07.jpg) repeat; background-size:cover;height: 10px;">
  <div class="container" style="margin-top: -50px;">
    <div class="row all-text-white">
      <div class="col-md-12 align-self-center">
        <h1 class="innerpage-title">Grid des voitures d'une agence <?= (isset($_GET['id'])) ? $agence->nom : '' ; ?></h1>
        <h6 class="subtitle">Vous pouvez louer des voiture selon l'agence sélectionné</h6>
        <nav aria-label="breadcrumb" style="bottom: 0;">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="index.php"><i class="ti-home"></i> Acceuil</a></li>
            <li class="breadcrumb-item active"><a href="?route=agence"><i class="ti-home"></i> Agence</a></li>
            <li class="breadcrumb-item"><?= (isset($_GET['id'])) ? $agence->nom : 'Voiture' ; ?></li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>
<section class="pt80 pb80 cruise-grid-view">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-12">
        <?php if (!empty($user)) { ?>
          <div class="Filter-left" style="margin-bottom: 30px;">
            <form>
              <div class="mb-left">
                <label for="form_guests" class="form-label">Affichage</label>
                <input type="hidden" name="route" value="voiture">
                <select class="custom-select select-big" name="affichage">
                  <option value="true" selected="">Vos voiture </option>
                  <option value="false">Tous les voitures </option>
                </select>
                <?php if (!isset($user->profil)): ?>
                  <input type="hidden" name="id" value="<?=$_GET['id']?>">
                <?php endif ?>
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
              <label for="form_guests" class="form-label">Marque</label>
              <div class="form-group">
                <input class="form-control" type="text" name="voiture[marque]">
              </div>
            </div>
            <div class="mb-left">
              <label for="form_guests" class="form-label">Modél</label>
              <div class="form-group">
                <input class="form-control" type="text" name="voiture[model]">
              </div>
            </div>
            <div class="mb-left">
              <label for="form_guests" class="form-label">Couleur</label>
              <div class="form-group">
                <input class="form-control" type="text" name="voiture[couleur]">
              </div>
            </div>
            <div class="mb-left">
              <label for="form_guests" class="form-label">Année</label>
              <div class="form-group">
                <input class="form-control" type="text" name="voiture[annee]">
              </div>
            </div>
            <div class="mb-left">
              <label class="form-label">Price range</label>
              <div class="range-slider">
                <input type="range" min="0" max="500" range="true">
                <span class="range-value">150</span> </div>
            </div>
            <div class="pb-left">
              <div class="mb-left">
                <button type="submit" class="btn btn-primary btn-grad FilterBtn"> <i class="fas fa-search mr-1"></i>Chercher </button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-lg-9 col-md-9 col-sm-12">
        <div class="resultBar barSpaceAdjust">
          <h2>Nous avons trouvé  <span><?=count($voitures)?></span> voitures </h2>
          <?php if (isset($user->profil)): ?>
            <ul class="list-inline">
              <li class="active" title="Ajouter nouvelle voitue"><a href="?route=formvoiture"><i class="fa fa-plus-circle" style="font-size: 150%;" aria-hidden="true"></i></a></li>
          </ul>
          <?php endif ?>
        </div>
        <div class="row">
          <?php foreach ($voitures as $voiture): ?>
            <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="listing-item ">
                <article class="TravelGo-category-listing fl-wrap">
                  <div class="TravelGo-category-img"><img src="images/cars/<?=$voiture->photo?>" alt="">
                  </div>
                  <div class="TravelGo-category-content fl-wrap title-sin_item">
                    <div class="TravelGo-category-content-title fl-wrap">
                      <div class="TravelGo-category-content-title-item">
                        <h3 class="title-sin_map col-md-12"><?=$voiture->marque?>
                          <?php if (isset($user->profil)) :
                            foreach ($agences as $agence) {
                            if (($voiture->id_agence == $agence->id) && ($agence->id_agent == $user->id) ) {  ?> ?>
                            <i class="fa fa-ellipsis-v mr-2 mb-0" role="button" id="dropdownAccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="float:right;"></i>
                            <div class="dropdown-menu mt-2 shadow" aria-labelledby="dropdownAccount" style="margin-right: 120px;">  <a class="dropdown-item" href="?route=formvoiture&id=<?=$voiture->id?>">Modifier</a> 
                              <a class="dropdown-item" href="?route=deletevoiture&id=<?=$voiture->id?>" onclick="return confirm('Voulez vous sûr de supprimer ce voiture?')">Supprimer</a> 
                            </div>
                        <?php } } endif ?>
                        </h3>
                        <div class="TravelGo-category-location fl-wrap col-md-12"><a href="#" class="map-item"><i class="far fa-user mr-2"></i> 
                          <?=$voiture->num_matr?></a>
                          <span style="margin-top: 0px;"><?=$voiture->prix?>dt</span> </div>
                      </div>
                    </div>
                    <p>
                      <strong>Model: </strong><?=$voiture->model?><br>
                      <strong>Couleur: </strong><?=$voiture->couleur?><br>
                      <strong>Année: </strong><?=$voiture->annee?><br>
                      <strong>Carburant: </strong><?=$voiture->carburant?><br>
                      <strong>Kilométrage: </strong><?=$voiture->kilometrage?><br>
                    </p>
                    <?php if (!isset($user->profil)): ?>
                      <div class="TravelGo-category-footer fl-wrap">
                        <div class="TravelGo-category-price btn-grad"><a href="?route=louer&id=<?=$voiture->id?>&id_agence=<?=$_GET['id']?>"><span>Louer</span></a></div>
                      </div>
                    <?php endif ?>
                  </div>
                </article>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
</section>