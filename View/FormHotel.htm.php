<!-- =======================
  Banner innerpage -->
<div class="innerpage-banner left bg-overlay-dark-7 py-7" style="background:url(images/07.jpg) repeat; background-size:cover;height: 10px;">
  <div class="container" style="margin-top: -50px;">
    <div class="row all-text-white">
      <div class="col-md-12 align-self-center">
        <h1 class="innerpage-title"><?= (isset($_GET['id'])) ? 'Modifier' : 'Ajouter' ; ?> hôtel</h1>
        <h6 class="subtitle">L'ajout ou modification effectuer par seulement l'agent de hôtel</h6>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="index.php"><i class="ti-home"></i> Acceuil</a></li>
            <li class="breadcrumb-item active"><a href="?route=hotel"><i class="ti-home"></i> Hôtel</a></li>
            <li class="breadcrumb-item"><?= (isset($_GET['id'])) ? $hotel->nom : 'Ajouter' ; ?></li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>
<!-- =======================
  Banner innerpage -->

<section class="pt80 pb80 booking-section login-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-12" <?= (!isset($_GET['id'])) ? "style='display:none;'" : 'Ajouter' ; ?>>
        <div class="listing-item ">
          <article class="TravelGo-category-listing fl-wrap">
            <div class="TravelGo-category-img"> <a href="hotel-detailed.html"><img src="images/hotels/<?=$hotel->image?>" alt=""></a>
              <div class="TravelGo-category-opt">
                <div class="listing-rating card-popup-rainingvis" data-starrating2="5"> <?php for ($i=0; $i < $hotel->categorie; $i++) { ?>
                    <i class="fa fa-star"></i>
                  <?php } ?>
                </div>
                <div class="rate-class-name" style="visibility: hidden;">
                  <div class="score"><strong>Very Good</strong>27 Reviews </div>
                  <span>5.0</span> </div>
              </div>
            </div>
            <div class="TravelGo-category-content fl-wrap title-sin_item">
              <div class="TravelGo-category-content-title fl-wrap">
                <div class="TravelGo-category-content-title-item">
                  <h3 class="title-sin_map">
                    <?=$hotel->nom?>
                  </h3>
                  <div class="TravelGo-category-location fl-wrap">
                    <a href="#" class="map-item"><i class="fas fa-map-marker-alt"></i> <?=$hotel->adresse?></a><br>
                    <a href="#" class="map-item"><i class="fas fa-phone"></i> <?=$hotel->telephone?></a>
                  </div>
                </div>
              </div>
              <p><strong>Description: </strong><?=$hotel->libelle?></p>
            </div>
          </article>
        </div>
      </div>
      <div class="col-lg-8 col-md-6 col-sm-12" <?= (!isset($_GET['id'])) ? "style='margin-left:200px;'" : 'Ajouter' ; ?>>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="login-box Booking-box">
              <div class="login-top">
                <h3><?= (isset($_GET['id'])) ? 'Modifier' : 'Ajouter' ; ?> un hôtel</h3>
                <p>S'il le chambre à été réserver il va vous alerter</p>
              </div>
              <form class="login-form" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                    <label>Nom</label>
                    <input type="text" name="hotel[nom]" value="<?=(isset($_GET['id'])) ? $hotel->nom : '' ; ?>" required>
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                    <label>Adresse</label>
                    <input type="text" name="hotel[adresse]" value="<?=(isset($_GET['id'])) ? $hotel->adresse : '' ; ?>" required>
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                    <label>Téléphone</label>
                    <input type="tel" name="hotel[telephone]" value="<?=(isset($_GET['id'])) ? $hotel->telephone : '' ; ?>" maxlength="8" pattern="[0-9]{8}" required>
                  </div> 
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                      <label>Nombre d'étoile</label>
                      <select class="custom-select select-big mb-3" name="hotel[categorie]">
                        <option value="5" <?=(isset($_GET['id']) && $hotel->categorie == '5') ? "selected" : '' ; ?>>★★★★★ (5/5)</option>
                        <option value="4" <?=(isset($_GET['id']) && $hotel->categorie == '4') ? "selected" : '' ; ?>>★★★★☆ (4/5)</option>
                        <option value="3" <?=(isset($_GET['id']) && $hotel->categorie == '3') ? "selected" : '' ; ?>>★★★☆☆ (3/5)</option>
                        <option value="2" <?=(isset($_GET['id']) && $hotel->categorie == '2') ? "selected" : '' ; ?>>★★☆☆☆ (2/5)</option>
                        <option value="1" <?=(isset($_GET['id']) && $hotel->categorie == '1') ? "selected" : '' ; ?>>★☆☆☆☆ (1/5)</option>
                      </select>
                  </div> 
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                    <label style="margin:-20px 0 20px;">Description</label>
                    <textarea class="form-control" name="hotel[libelle]" rows="5" required=""><?=(isset($_GET['id'])) ? $hotel->libelle : '' ; ?></textarea>
                  </div>
                  <div class="form-group col-lg-6 col-md-12 col-sm-12 email" style="margin-top: -15px;">
                    <label for="exampleFormControlFile1" style="margin-bottom: 7px;">Photo d'hôtel</label>
                    <input name="fileToUpload" type="file" class="form-control-file" id="exampleFormControlFile1">
                  </div>
                  <div class="col-md-4">
                    <input type="hidden" name="hotel[id_agent]" value="<?=$user->id?>">
                    <input type="hidden" name="hotel[id]" value="<?=(isset($_GET['id'])) ? $hotel->id : '' ; ?>">
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