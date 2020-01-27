<!-- =======================
  Banner innerpage -->
<div class="innerpage-banner left bg-overlay-dark-7 py-7" style="background:url(images/07.jpg) repeat; background-size:cover;height: 10px;">
  <div class="container" style="margin-top: -50px;">
    <div class="row all-text-white">
      <div class="col-md-12 align-self-center">
        <h1 class="innerpage-title">Vous pouvez repondre ici</h1>
        <h6 class="subtitle">Remplir ces champs et envoyer le réponse va envoyer par email</h6>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="index-2.html"><i class="ti-home"></i> Acceuil</a></li>
            <li class="breadcrumb-item">Répondre</li>
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
    <div class="row" style="padding: 0 200px 0 200px;">
      <div class="col-lg-12 col-md-6 col-sm-12">
        <?php if (isset($_GET['succes'])) { ?>
          <section>
            <div class="container">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="alert alert-success" role="alert">
                    Votre message envoyé avec succès. 
                    <a href="#" class="alert-link">Alert: </a> vos client il va recepter vous message.
                  </div>
                </div>
            </div>
        </section>
        <?php } ?>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="login-box Booking-box">
              <div class="login-top">
                <h3>Répondre à
                    <?php
                    foreach ($clients as $client){
                      if($reclamation->id_client == $client->id) {
                        echo "$client->prenom $client->nom";
                      }
                    } ?>
                </h3>
                <p><strong>Sujet: </strong><?=$reclamation->sujet?></p>
              </div>
              <form class="login-form" method="POST">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 form-group email">
                    <label  style="margin-bottom: 20px;">Message</label>
                    <textarea class="form-control" rows="5" placeholder="Entrez votre message" name="reclamation[reponse]" required=""></textarea>
                  </div>
                  <div class="col-md-4">
                    <input type="hidden" name="reclamation[id_client]" value="<?=$reclamation->id_client?>">
                    <input type="hidden" name="reclamation[id]" value="<?=$_GET['id']?>">
                    <button class="Confirm" type="submit" name="button">Envoyer</button>
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