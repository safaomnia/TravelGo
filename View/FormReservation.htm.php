<!-- =======================
  Banner innerpage -->
<div class="innerpage-banner left bg-overlay-dark-7 py-7" style="background:url(images/07.jpg) repeat; background-size:cover;height: 10px;">
  <div class="container" style="margin-top: -50px;">
    <div class="row all-text-white">
      <div class="col-md-12 align-self-center">
        <h1 class="innerpage-title">Réserver la chambre séléctionné</h1>
        <h6 class="subtitle">Réserver et attend la réponse de hôtel <?=$hotel->nom?></h6>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="index.php"><i class="ti-home"></i> Acceuil</a></li>
            <li class="breadcrumb-item active"><a href="?route=hotel"><i class="ti-home"></i> Hôtel</a></li> 
            <li class="breadcrumb-item active"><a href="?route=chambre&id=<?=$_GET['id']?>"><i class="ti-home"></i> <?=$hotel->nom?></a></li>
            <li class="breadcrumb-item">chambre</li>
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
            <div class="TravelGo-category-img"> <a href="hotel-detailed.html"><img src="images/hotels/<?=$chambre->photo?>" alt=""></a>
            </div>
            <div class="TravelGo-category-content fl-wrap title-sin_item">
              <div class="TravelGo-category-content-title fl-wrap">
                <div class="TravelGo-category-content-title-item">
                  <h3 class="title-sin_map">
                    <a href="hotel-detailed.html">
                    <?php foreach ($caracteristiques as $caracteristique): 
                      if ($caracteristique->id == $chambre->id_caracteristique) {
                         $libelle = $caracteristique->libelle;
                         $type = $caracteristique->type;
                         echo "$caracteristique->type";
                       } ?>
                    <?php endforeach ?>
                    </a>
                  </h3>
                  <div class="TravelGo-category-location fl-wrap"><a href="#" class="map-item"><i class="fas fa-map-marker-alt"></i> <?=$hotel->adresse?></a> <span><?=$chambre->prix?>dt</span> </div>
                </div>
              </div>
              <?=$libelle?><br><br>
              <p><strong>Description: </strong><?=$chambre->description?></p>
              <div class="TravelGo-category-content-title-item others-details">
                <h3 class="title-sin_map"><a href="agence-detailed.html">Liste de vos réservation de cette chambre</a></h3>
              </div>
              <table class="table table-striped">
                <thead>
                  <th>Début</th>
                  <th>Fin</th>
                  <th>Date</th>
                </thead>
                <tbody>
                  <?php foreach ($reservations as $reservation): ?>
                    <tr>
                      <td><?=$reservation->date_debut?></td>
                      <td><?=$reservation->date_fin?></td>
                      <td><?=$reservation->date_ajout?></td>
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
                <h3>Date de réservation</h3>
                <p>s'il le chambre à été réserver il va vous alerter</p>
              </div>
              <!--onsubmit="return confirm('Etes-vous sûr de confirmer cette réservation?')"-->
              <form class="login-form" method="POST" target="paypal" action="https://www.paypal.com/fr/cgi-bin/webscr" novalidate="">
                <div class="row">
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                    <label>Date début</label>
                    <input type="date" name="reservation[date_debut]" required="">
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                    <label>Date fin</label>
                    <input type="date" name="reservation[date_fin]" required="">
                  </div>
                  <div class="col-md-12">
                    <input type="hidden" name="reservation[id_client]" value="<?=$user->id?>">
                    <input type="hidden" name="reservation[id_chambre]" value="<?=$_GET['id']?>">
                    <input type="hidden" name="cmd" value="_xclick">
                    <input type="hidden" name="business" value="seller@designerfotos.com">
                    <!-- Permet au client de saisir la quantité souhaitée -->
                    <input type="hidden" name="undefined_quantity" value="1">
                    <input type="hidden" name="item_name" value="reservation_chambre">
                    <input type="hidden" name="item_number" value="<?=$_GET['id']?>">
                    <!--Aucune variable currency_code n^a été spécifiée, donc le montant est supposé être en USD -->
                    <input type="hidden" name="amount" value="<?=$chambre->prix?>">
                    <! Variables de transit pour le suivi des commandes, par exemple -->
                    <input type="hidden" name="custom" value="merchant_custom_value">
                    <input type="hidden" name="invoice" value="merchant_invoice_12345">
                    <input type="hidden" name="charset" value="utf-8">
                    <input type="hidden" name="no_shipping" value="1">
                    <input type="hidden" name="image_url" value="https://www.designerfotos.com/logo.gif">
                    <input type="hidden" name="return" value="http://www.designerfotos.com/thankyou.htm">
                    <input type="hidden" name="cancel_return"
                    value="https://localhost/travelgo/switcher/index.php?route=reserver&id=<?=$_GET['id']?>&id_hotel=<?=$_GET['id_hotel']?>">
                    <!-- N^invite pas le client à ajouter une remarque à son achat -->
                    <input type="hidden" name="no_note" value="1">
                 
                    <button class="Confirm col-lg-4" type="submit">Réserver <img src="images/paypal.png" width="55"></button>
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
<!--https://developer.paypal.com/docs/api/overview/  create paypal account-->
<!--https://www.sandbox.paypal.com/myaccount/  create a sendbox paypal account-->
<script src="https://www.paypal.com/sdk/js?client-id=sb"></script>
<script>paypal.Buttons().render('body');</script>
