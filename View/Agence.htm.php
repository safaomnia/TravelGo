
<!-- =======================
	Banner innerpage -->
<div class="innerpage-banner left bg-overlay-dark-7 py-7" style="background:url(images/07.jpg) repeat; background-size:cover;height: 10px;">
  <div class="container" style="margin-top: -50px;">
    <div class="row all-text-white">
      <div class="col-md-12 align-self-center">
        <h1 class="innerpage-title">Liste des agences des voitures</h1>
        <h6 class="subtitle">Fusce iaculis ex sed nulla commodo imperdiet. Proin sed rhoncus ligula.</h6>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="index-2.html"><i class="ti-home"></i> Acceuil</a></li>
            <li class="breadcrumb-item">agence</li>
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
                <input type="hidden" name="route" value="agence">
                <select class="custom-select select-big" name="affichage">
                  <option value="true" selected="">Vos agences </option>
                  <option value="false">Tous les agences </option>
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
                <input class="form-control" type="text" name="agence[nom]">
              </div>
            </div>
            <div class="mb-left">
              <label for="form_guests" class="form-label">Ville</label>
              <select class="custom-select select-big" name="agence[adresse]">
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
          <h2>Nous avons trouvé  <span><?=count($agences)?></span> agences </h2>
          <?php if (isset($user->profil)): ?>
            <ul class="list-inline">
              <li class="active" title="Ajouter nouvelle hôtel"><a href="?route=formagence"><i class="fa fa-plus-circle" style="font-size: 150%;" aria-hidden="true"></i></a></li>
          </ul>
          <?php endif ?>
        </div>
        <div class="row">
        <?php foreach ($agences as $agence) { ?>
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row listroBox">
                  <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12 Nopadding">
                    <div class="listroBoxmain">
                      <h3><a href="?route=voiture&id=<?=$agence->id?>"><?=$agence->nom?></a>
                        <?php if (isset($user->profil) && $user->id == $agence->id_agent): ?>
                            <i class="fa fa-ellipsis-v mr-2 mb-0" role="button" id="dropdownAccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="float: right;"></i>
                            <div class="dropdown-menu mt-2 shadow" aria-labelledby="dropdownAccount" style="margin-right: 120px;">  <a class="dropdown-item" href="?route=formagence&id=<?=$agence->id?>">Modifier</a> 
                              <a class="dropdown-item" href="?route=deleteagence&id=<?=$agence->id?>" onclick="return confirm('Voulez-vous sûr de suprrimer ce agence?');">Supprimer</a> 
                            </div>
                        <?php endif ?>

                      </h3>
                      <p>
                        <?php $ch = $agence->libelle;
                        if(strlen($ch) > 200) {
                          for ($i=0; $i < 200; $i++) { 
                            echo $ch[$i];
                          }
                          echo " ...<a href='?route=detailsagence&id=$agence->id'><font style='font-size:13px;color:#A9A9A9
;'> plus détails </font></a>";
                        }
                        ?>
                      </p>
                      <a href="#"><i class="fas fa-map-marker-alt"></i> <?=$agence->adresse?></a> </div>
                    <ul>
                      <li><span class="Ropen">Voiture: <?=$agence->nbr_voiture?></span></li>
                      <li>
                        <div class="R_retings"><span><?php 
                          foreach ($agents as $agent) {
                            if ($agent->id == $agence->id_agent) echo "$agent->prenom $agent->nom";
                          }
                          ?></span></div>
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