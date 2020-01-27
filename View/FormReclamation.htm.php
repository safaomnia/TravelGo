<!-- =======================
  Banner innerpage -->
<div class="innerpage-banner left bg-overlay-dark-7 py-7" style="background:url(images/07.jpg) repeat; background-size:cover;height: 10px;">
  <div class="container" style="margin-top: -50px;">
    <div class="row all-text-white">
      <div class="col-md-12 align-self-center">
        <h1 class="innerpage-title">Vous pouvez réclamer ici</h1>
        <h6 class="subtitle">Remplir ces champs et envoyer</h6>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="index-2.html"><i class="ti-home"></i> Acceuil</a></li>
            <li class="breadcrumb-item">Réclamation</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>
<!-- =======================
  Banner innerpage -->
<?php if (isset($_GET['succes'])) { ?>
  <section class="pt40" style="margin-bottom: -50px;" align="center">
    <div class="container">
        <div class="col-sm-12">
          <div class="alert alert-success" role="alert">
            Votre message envoyé avec succès. 
            <a href="#" class="alert-link">Alert: </a> Il faudra du temps pour répondre à la charge sur votre email.
          </div>
        </div>
    </div>
</section>
<?php } ?>
<section class="pt80 pb80 booking-section login-area">
  <div class="container">
    <div class="row" style="padding: 0 200px 0 200px;">
      <div class="col-lg-12 col-md-6 col-sm-12">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="login-box Booking-box">
              <div class="login-top">
                <h3>Vos réclamation</h3>
                <p>L'administrateur il vous répondra sur votre email</p>
              </div>
              <form class="login-form" method="POST">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 form-group email">
                    <label>Sujet</label>
                    <input class="form-control form-control-lg" type="text" name="reclamation[sujet]" required="">
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 form-group email">
                    <label  style="margin-bottom: 20px;">Message</label>
                    <textarea class="form-control" rows="5" name="reclamation[texte]"required></textarea>
                  </div>
                  <div class="col-md-4">
                    <input type="hidden" name="reclamation[id_client]" value="<?=$user->id?>">
                    <input type="hidden" name="reclamation[id]" value="">
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