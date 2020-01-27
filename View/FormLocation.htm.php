<!-- =======================
  Banner innerpage -->
<div class="innerpage-banner left bg-overlay-dark-7 py-7" style="background:url(images/07.jpg) repeat; background-size:cover;height: 10px;">
  <div class="container" style="margin-top: -50px;">
    <div class="row all-text-white">
      <div class="col-md-12 align-self-center">
        <h1 class="innerpage-title">Reserver la voiture séléctionné</h1>
        <h6 class="subtitle">Réserver et attend la réponse de hôtel <?=$agence->nom?></h6>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="index.php"><i class="ti-home"></i> Acceuil</a></li>
            <li class="breadcrumb-item active"><a href="?route=agence"><i class="ti-home"></i> Hôtel</a></li> 
            <li class="breadcrumb-item active"><a href="?route=voiture&id=<?=$_GET['id']?>"><i class="ti-home"></i> <?=$agence->nom?></a></li>
            <li class="breadcrumb-item">voiture</li>
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
      <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="listing-item ">
          <article class="TravelGo-category-listing fl-wrap">
            <div class="TravelGo-category-img"> <a href="agence-detailed.html"><img src="images/cars/<?=$voiture->photo?>" alt=""></a>
            </div>
            <div class="TravelGo-category-content fl-wrap title-sin_item">
              <div class="TravelGo-category-content-title fl-wrap">
                <div class="TravelGo-category-content-title-item">
                  <h3 class="title-sin_map">
                    <a href="agence-detailed.html">
                    <?=$voiture->marque?>
                    </a>
                  </h3>
                  <div class="TravelGo-category-location fl-wrap"><a href="#" class="map-item"><i class="fas fa-map-marker-alt"></i> <?=$agence->adresse?></a> <span><?=$voiture->prix?>dt</span> </div>
                </div>
              </div>
              <p>
                <strong>Model: </strong><?=$voiture->model?><br>
                <strong>Couleur: </strong><?=$voiture->couleur?><br>
                <strong>Année: </strong><?=$voiture->annee?><br>
                <strong>Carburant: </strong><?=$voiture->carburant?><br>
                <strong>Kilométrage: </strong><?=$voiture->kilometrage?><br>   
              </p>
              <div class="TravelGo-category-content-title-item others-details">
                <h3 class="title-sin_map"><a href="agence-detailed.html">Liste de vos locations de cette voiture</a></h3>
              </div>
              <table class="table table-striped">
                <thead>
                  <th>Début</th>
                  <th>Fin</th>
                  <th>Date</th>
                </thead>
                <tbody>
                  <?php foreach ($locations as $location): ?>
                    <tr>
                      <td><?=$location->date_debut?></td>
                      <td><?=$location->date_fin?></td>
                      <td><?=$location->date_ajout?></td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </article>
        </div>
      </div>
      <div class="col-lg-8 col-md-6 col-sm-12">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="login-box Booking-box">
              <div class="login-top">
                <h3>Date de location</h3>
                <p>s'il le voiture à été louer il va vous alerter</p>
              </div>
              <form class="login-form" method="POST" action="#" onsubmit="return confirm('Etes-vous sûr de confirmer cette location?')">
                <div class="row">
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                    <label>Date début</label>
                    <input type="date" name="location[date_debut]" required="">
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                    <label>Date fin</label>
                    <input type="date" name="location[date_fin]" required="">
                  </div>
                  <div class="login-top cardInfo">
                    <h3>Les informations de votre carte</h3>
                    <p>Choisir type de paiment.</p>
                  </div>
                  <div class="row" style="margin-left: 0;">
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                    <label>type de carte de crédit</label>
                    <select class="custom-select select-big mb-3">
                      <option selected="">sélectionnez une carte</option>
                    </select>
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                    <label>Nom du titulaire</label>
                    <input type="text" name="text" placeholder="Nom du titulaire">
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                    <label>Numéro de carte</label>
                    <input type="text" name="text" placeholder="Numéro de carte">
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                    <label>Numéro d'identification de la carte</label>
                    <input type="text" name="text" placeholder="Numéro d'identification de la carte">
                  </div>
                  <div class="col-md-12 d-flex justify-content-between">
                    <div class="chqbox">
                      <input type="checkbox" name="rememberme" id="rmme">
                      <label for="rmme"> En continuant, vous acceptez les Termes et Conditions.</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <input type="hidden" name="location[id_client]" value="<?=$user->id?>">
                    <input type="hidden" name="location[id_voiture]" value="<?=$_GET['id']?>">
                    <button class="Confirm" type="submit" name="button">Confirmer la location</button>
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