<!-- =======================
  Banner innerpage -->
<div class="innerpage-banner left bg-overlay-dark-7 py-7" style="background:url(images/07.jpg) repeat; background-size:cover;height: 10px;">
  <div class="container" style="margin-top: -50px;">
    <div class="row all-text-white">
      <div class="col-md-12 align-self-center">
        <h1 class="innerpage-title"><?=(isset($_GET['id'])) ? 'Modifier' : 'Ajouter';?> agent </h1>
        <h6 class="subtitle">Consulter et modifier vos utilisateur</h6>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="index.php"><i class="ti-home"></i> Acceuil</a></li>
            <li class="breadcrumb-item"><?=(isset($_GET['id'])) ? "$user->prenom $user->nom" : 'Agent';?></li>
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
      <?php if (isset($_GET['id'])): ?>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="listing-item ">
            <article class="TravelGo-category-listing fl-wrap">
              <div class="TravelGo-category-img"><img src="images/team/<?=$user->photo?>" alt=""></a>
              </div>
              <div class="TravelGo-category-content fl-wrap title-sin_item">
                <div class="TravelGo-category-content-title fl-wrap">
                  <div class="TravelGo-category-content-title-item">
                    <h3 class="title-sin_map">
                      <a href="agence-detailed.html">
                      <?=$user->prenom?> <?=$user->nom?>
                      </a>
                    </h3>
                  </div>
                </div>
                <p>
                  <strong>Adresse: </strong><?=$user->adresse?><br>
                  <strong>Téléphone: </strong><?=$user->telephone?><br>
                  <strong>Sexe: </strong><?=$user->sexe?>
                </p>
              </div>
            </article>
          </div>
        </div>
      <?php endif ?>
      <div class="col-lg-8 col-md-6 col-sm-12" <?= (!isset($_GET['id'])) ? "style='margin-left:200px;'" : '' ; ?>>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="login-box Booking-box">
               <div class="login-top">
                <h3>Agent informations</h3>
                <p>Le deux peut publier ou modifier supprimer.</p>
              </div>
              <form class="login-form" action="#" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                    <label>Nom</label>
                    <input type="text" name="client[nom]" value="<?=(isset($_GET['id'])) ? $user->nom : '' ; ?>" pattern="[A-Za-z]{3,}" title="Ce champ doit être alphabétique et au minimum 3 catatéres" required>
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                    <label>Prénom</label>
                    <input type="text" name="client[prenom]" value="<?=(isset($_GET['id'])) ? $user->prenom : '' ; ?>" pattern="[A-Za-z]{3,}" title="Ce champ doit être alphabétique et au minimum 3 catatéres" required>
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                    <label>Email</label>
                    <input type="email" name="client[email]" value="<?=(isset($_GET['id'])) ? $user->email : '' ; ?>" required>
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12 password">
                    <label>Téléphone</label>
                    <input type="text" name="client[telephone]" value="<?=(isset($_GET['id'])) ? $user->telephone : '' ; ?>" pattern="[0-9]{8}" maxlength="8" required>
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                    <label>Sexe</label>
                    <select class="custom-select select-big mb-3" name="client[sexe]">
                      <option selected="" disabled="">Choisir</option>
                      <option value="Homme" <?php if (isset($_GET['id']) && $user->sexe == 'Homme') echo "selected"; ?>>Homme</option>
                      <option value="Femme" <?php if (isset($_GET['id']) && $user->sexe == 'Femme') echo "selected"; ?>>Femme</option>
                    </select>
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                    <label>Profil</label>
                    <select class="custom-select select-big mb-3" name="client[profil]">
                      <option value="agent_agence" <?php if (isset($_GET['id']) && $user->profil == 'agent_agence') echo "selected"; ?>>Agent Agence</option>
                      <option value="agent_hotel" <?php if (isset($_GET['id']) && $user->profil == 'agent_hotel') echo "selected"; ?>>Agent Hôtel</option>
                    </select>
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                    <label>Address</label>
                    <input type="text" name="client[adresse]" value="<?=(isset($_GET['id'])) ? $user->adresse : '' ; ?>" required>
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                    <label>Raison social</label>
                    <input type="text" name="client[raison_social]" value="<?=(isset($_GET['id'])) ? $user->raison_social : '' ; ?>" required>
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                    <label>Matricule fiscale</label>
                    <input type="text" name="client[mat_fiscale]" value="<?=(isset($_GET['id'])) ? $user->mat_fiscale : '' ; ?>" required>
                  </div>
                  <div class="form-group col-lg-6 col-md-12 col-sm-12 email">
                    <label for="exampleFormControlFile1">Photo à télécharger</label>
                    <input name="fileToUpload" type="file" class="form-control-file" id="exampleFormControlFile1">
                  </div>
                  <div class="col-md-12">
                    <input type="hidden" name="profil" value="<?=(isset($user->profil)) ?'true': 'false';?>">
                    <input type="hidden" name="client[id]" value="<?=$user->id?>">
                    <button class="Confirm" type="submit" name="button"> <?=(isset($_GET['id'])) ? 'Modifier' : 'Ajouter';?></button>
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