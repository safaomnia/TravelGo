<!-- =======================
  Banner innerpage -->
<div class="innerpage-banner left bg-overlay-dark-7 py-7" style="background:url(images/07.jpg) repeat; background-size:cover;height: 10px;">
  <div class="container" style="margin-top: -50px;">
    <div class="row all-text-white">
      <div class="col-md-12 align-self-center">
        <h1 class="innerpage-title">Tous les reclamations</h1>
        <h6 class="subtitle">Liste des réclamation depuis les clients</h6>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="index.php"><i class="ti-home"></i> Acceuil</a></li>
            <li class="breadcrumb-item">Reclamation</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

<section class="pt80 pb80">
    <div class="container">
      <div class="row">

        <div class="col-sm-12 mb-5">
          <h5 class="text-center mb-4">Nous avons trouvé  <span><?=count($reclamations)?></span> reclamations </h5>
          <div class="table-responsive-sm">
            <table class="table table-lg table-noborder table-striped">
              <thead class="all-text-white bg-grad">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Client</th>
                  <th scope="col">Email</th>
                  <th scope="col">Sujet</th>
                  <th scope="col">Message</th>
                  <th scope="col">Date</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($reclamations as $reclamation) :?>
                  <tr>
                    <th scope="row"><?=$reclamation->id?></th>
                    <td><a href="?route=profil&id=<?=$reclamation->id_client?>">
                      <?php $email = '';
                      foreach($clients as $client) {
                        if($client->id == $reclamation->id_client) {
                          $email = $client->email;
                          echo "$client->prenom $client->nom";
                        }
                      } ?></a>
                    </td>
                    <td><?=$email?></td>
                    <td><?=$reclamation->sujet?></td>
                    <td><?=$reclamation->texte?></td>
                    <td><?=$reclamation->date_ajout?></td>
                    <td><a href="?route=repond&id=<?=$reclamation->id?>"><i class="fas fa-reply" style="color: DeepSkyBlue;"></i></a></td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </section>