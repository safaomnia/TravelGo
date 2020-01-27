<!-- =======================
  Banner innerpage -->
<div class="innerpage-banner left bg-overlay-dark-7 py-7" style="background:url(images/07.jpg) repeat; background-size:cover;height: 10px;">
  <div class="container" style="margin-top: -50px;">
    <div class="row all-text-white">
      <div class="col-md-12 align-self-center">
        <h1 class="innerpage-title"><?=(isset($_GET['id'])) ? 'Modifier' : 'Ajouter' ; ?> une voiture</h1>
        <h6 class="subtitle">L'ajout ou modification effectuer par seulement l'agent d'agence
        </h6>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="index.php"><i class="ti-home"></i> Acceuil</a></li>
            <li class="breadcrumb-item active"><a href="?route=agence"><i class="ti-home"></i> agence</a></li> 
            <li class="breadcrumb-item active"><i class="ti-home"></i><?=(isset($_GET['id'])) ? $voiture->marque : 'voiture' ; ?></li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

<section class="pt80 pb80 booking-section login-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-12" <?= (!isset($_GET['id'])) ? "style='display:none;'" : 'Ajouter' ; ?>>
        <div class="listing-item ">
          <article class="TravelGo-category-listing fl-wrap">
            <div class="TravelGo-category-img"> <a href="hotel-detailed.html"><img src="images/cars/<?=$voiture->photo?>" alt=""></a>
            <div class="TravelGo-category-content fl-wrap title-sin_item">
              <div class="TravelGo-category-content-title fl-wrap">
                <div class="TravelGo-category-content-title-item">
                  <h3 class="title-sin_map">
                    <?=$voiture->marque?>
                  </h3>
                  <div class="TravelGo-category-location fl-wrap">
                    <a href="#" class="map-item"><i class="fas fa-hotel"></i> 
                      <?php 
                       foreach ($agences as $agence) {
                          if ($agence->id == $voiture->id_agence) {
                           $nom = $agence->nom;
                           echo "$nom";
                          }
                        } ?>
                    </a>
                    <span><?=$voiture->prix?>dt</span>
                  </div>
                </div>
              </div>
              <p><strong>Numéro de matricule: </strong><?=$voiture->num_matr?></p>
              <p><strong>Model: </strong><?=$voiture->model?></p>
              <p><strong>Couleur: </strong><?=$voiture->couleur?></p>
              <p><strong>Année: </strong><?=$voiture->annee?></p>
              <p><strong>Kilometage: </strong><?=$voiture->kilometrage?></p>
              <p><strong>Carburant: </strong><?=$voiture->carburant?></p>
            </div>
          </article>
        </div>
      </div>
      <div class="col-lg-8 col-md-6 col-sm-12" <?= (!isset($_GET['id'])) ? "style='margin-left:200px;'" : 'Ajouter' ; ?>>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="login-box Booking-box">
              <div class="login-top">
                <h3><?= (isset($_GET['id'])) ? 'Modifier' : 'Ajouter' ; ?> une voiture</h3>
                <p>s'il le voiture à été louer il va vous alerter</p>
              </div>
              <form class="login-form" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                    <label>Agence</label>
                    <select class="custom-select select-big mb-3" name="voiture[id_agence]">
                       <?php foreach ($agences as $agence): ?>
                        <option value="<?=$agence->id?>" <?=(isset($_GET['id']) && $voiture->id_agence == $agence->id) ? "selected" : '' ; ?>><?=$agence->nom?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                    <label>Prix</label>
                    <input type="number" name="voiture[prix]" value="<?=(isset($_GET['id'])) ? $voiture->prix : '' ; ?>" min="0" max="50000" required>
                  </div> 
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                    <label>Marque</label>
                    <input type="text" name="voiture[marque]" value="<?=(isset($_GET['id'])) ? $voiture->marque : '' ; ?>" required>
                  </div> 
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                    <label>Numéro de matricule</label>
                    <input type="text" name="voiture[num_matr]" value="<?=(isset($_GET['id'])) ? $voiture->num_matr : '' ; ?>" required>
                  </div> 
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                    <label>Model</label>
                    <input type="text" name="voiture[model]" value="<?=(isset($_GET['id'])) ? $voiture->model : '' ; ?>" required>
                  </div> 
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                    <label>Couleur</label>
                    <input type="text" name="voiture[couleur]" value="<?=(isset($_GET['id'])) ? $voiture->couleur : '' ; ?>" required>
                  </div> 
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                    <label>Année</label>
                    <input type="number" name="voiture[annee]" value="<?=(isset($_GET['id'])) ? $voiture->annee : '' ; ?>" max="<?=date("Y")?>" required pattern="{4}">
                  </div> 
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                    <label>Carbuant</label>
                    <input type="text" name="voiture[carburant]" value="<?=(isset($_GET['id'])) ? $voiture->carburant : '' ; ?>" required>
                  </div> 
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                    <label>Kilometrage</label>
                    <input type="text" name="voiture[kilometrage]" value="<?=(isset($_GET['id'])) ? $voiture->kilometrage : '' ; ?>" required >
                  </div> 
                  <div class="form-group col-lg-6 col-md-12 col-sm-12 email">
                    <label for="exampleFormControlFile1">Photo de voiture</label>
                    <input name="fileToUpload" type="file" class="form-control-file" id="exampleFormControlFile1">
                  </div>
                  <div class="col-md-4">
                    <input type="hidden" name="voiture[id]" value="<?=(isset($_GET['id'])) ? $voiture->id : '' ; ?>">
                    <button class="Confirm" type="submit" name="button"><?= (isset($_GET['id'])) ? 'Modifier' : 'Ajouter' ; ?></button>
                  </div>
                </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>