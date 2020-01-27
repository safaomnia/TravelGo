 
<div class="innerpage-banner left bg-overlay-dark-7 py-7" style="background:url(images/07.jpg) repeat; background-size:cover;height: 10px;">
  <div class="container" style="margin-top: -50px;">
    <div class="row all-text-white">
      <div class="col-md-12 align-self-center">
        <h1 class="innerpage-title">Grid des chambres d'hôtel <?= (isset($_GET['id'])) ? $hotel->nom : '' ; ?></h1>
        <h6 class="subtitle">Vous pouvez reservez dans l'hotél selon le chambre désiré</h6>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="index.php"><i class="ti-home"></i> Acceuil</a></li>
            <li class="breadcrumb-item active"><a href="?route=hotel"><i class="ti-home"></i> Hôtel</a></li>
            <li  class="breadcrumb-item"><?= (isset($_GET['id'])) ? $hotel->nom : 'chambre' ; ?></li>
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
                <input type="hidden" name="route" value="chambre">
                <select class="custom-select select-big" name="affichage">
                  <option value="true" selected="">Vos chambre </option>
                  <option value="false">Tous les chambres </option>
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
              <label for="form_guests" class="form-label">Type</label>
              <div class="form-group">
                <input class="form-control" type="text" name="chambre[description]">
              </div>
            </div>
            <div class="mb-left">
              <label for="form_guests" class="form-label">Personne</label>
              <select class="custom-select select-big" name="chambre[nombre]">
                <option selected="" disabled="">Choisir</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="2">4</option>
              </select>
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
          <h2>Nous avons trouvé  <span><?=count($chambres)?></span> chambres </h2>
          <?php if (isset($user->profil)): ?>
            <ul class="list-inline">
              <li class="active" title="Ajouter nouvelle chambre"><a href="?route=formchambre"><i class="fa fa-plus-circle" style="font-size: 150%;" aria-hidden="true"></i></a></li>
          </ul>
          <?php endif ?>
        </div>
        <div class="row">
          <?php foreach ($chambres as $chambre):
           foreach ($caracteristiques as $caracteristique) {
              if ($caracteristique->id == $chambre->id_caracteristique) {
               $type = $caracteristique->type;
               $libelle = $caracteristique->libelle;
              }
            } ?>
            <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="listing-item ">
                <article class="TravelGo-category-listing fl-wrap">
                  <div class="TravelGo-category-img"> <img src="images/hotels/<?=$chambre->photo?>" alt="">
                  </div>
                  <div class="TravelGo-category-content fl-wrap title-sin_item">
                    <div class="TravelGo-category-content-title fl-wrap">
                      <div class="TravelGo-category-content-title-item">
                        <h3 class="title-sin_map col-md-12"><?=$type?>
                        <?php if (isset($user->profil)) :
                        foreach ($hotels as $hotel) {
                          if (($chambre->id_hotel == $hotel->id) && ($hotel->id_agent == $user->id) ) {  ?>
                              <i class="fa fa-ellipsis-v mr-2 mb-0" role="button" id="dropdownAccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="float:right;"></i>
                              <div class="dropdown-menu mt-2 shadow" aria-labelledby="dropdownAccount" style="margin-right: 120px;">  <a class="dropdown-item" href="?route=formchambre&id=<?=$chambre->id?>">Modifier</a> 
                                <a class="dropdown-item" href="?route=deletechambre&id=<?=$chambre->id?>" onclick="return confirm('Voulez vous sûr de supprimer ce chambre?')">Supprimer</a> 
                              </div>
                          <?php } }  endif ?>
                        </h3>
                        <div class="TravelGo-category-location fl-wrap col-md-12"><a href="#" class="map-item"><i class="far fa-user mr-2"></i> <?=$chambre->nombre?> place</a> <span style="margin-top: 0px;"><?=$chambre->prix?>dt</span> </div>

                      </div>
                    </div>
                    <p><?=$libelle?><br><br>
                    <strong>Description : </strong><?=$chambre->description?>
                      
                    </p>
                    <?php if (!isset($user->profil)): ?>
                      <div class="TravelGo-category-footer fl-wrap">
                        <div class="TravelGo-category-price btn-grad"><a href="?route=reserver&id=<?=$chambre->id?>&id_hotel=<?=$_GET['id']?>"><span>Réserver</span></div>
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