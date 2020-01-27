<!-- =======================
  Banner innerpage -->
<div class="innerpage-banner left bg-overlay-dark-7 py-7" style="background:url(images/07.jpg) repeat; background-size:cover;height: 10px;">
  <div class="container" style="margin-top: -50px;">
    <div class="row all-text-white">
      <div class="col-md-12 align-self-center">
        <h1 class="innerpage-title">Tous les locations</h1>
        <h6 class="subtitle">Réservation des agences des voitures</h6>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="index.php"><i class="ti-home"></i> Acceuil</a></li>
            <li class="breadcrumb-item">Location</li>
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
          <h5 class="text-center mb-4">Nous avons trouvé  <span><?=count($locations)?></span> locations </h5>
          <div class="table-responsive-sm">
            <table class="table table-lg table-noborder table-striped">
              <thead class="all-text-white bg-grad">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Client</th>
                  <th scope="col">Voiture</th>
                  <th scope="col">Date de début</th>
                  <th scope="col">Date de fin </th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($locations as $location) :?>
                  <tr>
                    <th scope="row"><?=$location->id?></th>
                    <td><a href="?route=profil&id=<?=$location->id_client?>">
                      <?php 
                      foreach($clients as $client) {
                        if($client->id == $location->id_client) {
                          echo "$client->prenom $client->nom";
                        }
                      } ?></a>
                    </td>
                    <td><?php 
                      foreach($voitures as $voiture) {
                        if($voiture->id == $location->id_voiture) {
                          echo "$voiture->marque";
                        }
                      } ?></td>
                    <td><?=$location->date_debut?></td>
                    <td><?=$location->date_fin?></td>
                    <td><?=$location->date_ajout?></td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </section>