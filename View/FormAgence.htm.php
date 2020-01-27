<!-- =======================
  Banner innerpage -->
<div class="innerpage-banner left bg-overlay-dark-7 py-7" style="background:url(images/07.jpg) repeat; background-size:cover;height: 10px;">
  <div class="container" style="margin-top: -50px;">
    <div class="row all-text-white">
      <div class="col-md-12 align-self-center">
        <h1 class="innerpage-title"><?= (isset($_GET['id'])) ? 'Modifier' : 'Ajouter' ; ?> agence</h1>
        <h6 class="subtitle">L'ajout ou modification effectuer par seulement l'agent de voiture</h6>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="index.php"><i class="ti-home"></i> Acceuil</a></li>
            <li class="breadcrumb-item active"><a href="?route=agence"><i class="ti-home"></i> Agence</a></li>
            <li class="breadcrumb-item"><?= (isset($_GET['id'])) ? $agence->nom : 'Ajouter' ; ?></li>
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
            <div class="TravelGo-category-content fl-wrap title-sin_item">
              <div class="TravelGo-category-content-title fl-wrap">
                <div class="TravelGo-category-content-title-item">
                  <h3 class="title-sin_map">
                    <?=$agence->nom?>
                  </h3>
                  <div class="TravelGo-category-location fl-wrap">
                    <a href="#" class="map-item"><i class="fas fa-map-marker-alt"></i> <?=$agence->adresse?></a><br>
                    <a href="#" class="map-item"><i class="fas fa-phone"></i> <?=$agence->telephone?></a>
                  </div>
                </div>
              </div>
              <p><strong>Description: </strong><?=$agence->libelle?></p>
            </div>
          </article>
        </div>
      </div>
      <div class="col-lg-8 col-md-6 col-sm-12" <?= (!isset($_GET['id'])) ? "style='margin-left:200px;'" : 'Ajouter' ; ?>>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="login-box Booking-box">
              <div class="login-top">
                <h3><?= (isset($_GET['id'])) ? 'Modifier' : 'Ajouter' ; ?> une agence</h3>
                <p>s'il le voiture à été réserver il va vous alerter</p>
              </div>
              <form class="login-form" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                    <label>Nom</label>
                    <input type="text" name="agence[nom]" value="<?=(isset($_GET['id'])) ? $agence->nom : '' ; ?>" required>
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                    <label>Adresse</label>
                    <input type="text" name="agence[adresse]" value="<?=(isset($_GET['id'])) ? $agence->adresse : '' ; ?>" required>
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                    <label>Téléphone</label>
                    <input type="text" name="agence[telephone]" value="<?=(isset($_GET['id'])) ? $agence->telephone : '' ; ?>"  pattern="[0-9]{8}"  maxlenght="8" required>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 email">
                    <label style="margin-bottom: 20px;">Description</label>
                    <textarea class="form-control" name="agence[libelle]" rows="5" required=""><?=(isset($_GET['id'])) ? $agence->libelle : '' ; ?></textarea>
                  </div>
                  <div class="col-md-4">
                    <input type="hidden" name="agence[id_agent]" value="<?=$user->id?>">
                    <input type="hidden" name="agence[id]" value="<?=(isset($_GET['id'])) ? $agence->id : '' ; ?>">
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