<!-- =======================
  Banner innerpage -->
<div class="innerpage-banner left bg-overlay-dark-7 py-7" style="background:url(images/07.jpg) repeat; background-size:cover;height: 10px;">
  <div class="container" style="margin-top: -50px;">
    <div class="row all-text-white">
      <div class="col-md-12 align-self-center">
        <h1 class="innerpage-title">Tous les réservation</h1>
        <h6 class="subtitle">Réservation des chambres des hôtels</h6>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="index.php"><i class="ti-home"></i> Acceuil</a></li>
            <li class="breadcrumb-item">Réservation</li>
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
          <h5 class="text-center mb-4">Nous avons trouvé  <span><?=count($reservations)?></span> réservations </h5>
          <div class="table-responsive-sm">
            <table class="table table-lg table-noborder table-striped">
              <thead class="all-text-white bg-grad">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Client</th>
                  <th scope="col">Chambre</th>
                  <th scope="col">Date de début</th>
                  <th scope="col">Date de fin </th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($reservations as $reservation) :?>
                  <tr>
                    <th scope="row"><?=$reservation->id?></th>
                    <td><a href="?route=profil&id=<?=$reservation->id_client?>">
                      <?php 
                      foreach($clients as $client) {
                        if($client->id == $reservation->id_client) {
                          echo "$client->prenom $client->nom";
                        }
                      } ?></a>
                    </td>
                    <td>
                      <?php 
                      foreach($chambres as $chambre) {
                        if($chambre->id == $reservation->id_chambre) {
                          foreach($caracteristiques as $caracteristique) {
                            if($chambre->id_caracteristique == $caracteristique->id) {
                              echo $caracteristique->type;
                            }
                          }
                        }
                      } ?>
                    </td>
                    <td><?=$reservation->date_debut?></td>
                    <td><?=$reservation->date_fin?></td>
                    <td><?=$reservation->date_ajout?></td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </section>