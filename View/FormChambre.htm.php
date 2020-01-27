<!-- =======================
  Banner innerpage -->
<div class="innerpage-banner left bg-overlay-dark-7 py-7" style="background:url(images/07.jpg) repeat; background-size:cover;height: 10px;">
  <div class="container" style="margin-top: -50px;">
    <div class="row all-text-white">
      <div class="col-md-12 align-self-center">
        <h1 class="innerpage-title"><?= (isset($_GET['id'])) ? 'Modifier' : 'Ajouter' ; ?> une chambre</h1>
        <h6 class="subtitle">L'ajout ou modification effectuer par seulement l'agent de hôtel
        </h6>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="index.php"><i class="ti-home"></i> Acceuil</a></li>
            <li class="breadcrumb-item active"><a href="?route=hotel"><i class="ti-home"></i> Hôtel</a></li> 
            <li class="breadcrumb-item active"><i class="ti-home"></i><?php 
            if (isset($_GET['id'])) {
              foreach ($caracteristiques as $caracteristique) {
                if ($caracteristique->id == $chambre->id_caracteristique) {
                 $type = $caracteristique->type;
                 $libelle = $caracteristique->libelle;
                 echo "$type";
                }
              } 
            } else echo "Chambre";
           ?></li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

<section class="pt80 pb80 booking-section login-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-12" <?= (!isset($_GET['id'])) ? "style='display:none;'" : 'Ajouter' ; ?>>
        <div class="listing-item ">
          <article class="TravelGo-category-listing fl-wrap">
            <div class="TravelGo-category-img"> <a href="hotel-detailed.html"><img src="images/hotels/<?=$chambre->photo?>" alt=""></a>
            <div class="TravelGo-category-content fl-wrap title-sin_item">
              <div class="TravelGo-category-content-title fl-wrap">
                <div class="TravelGo-category-content-title-item">
                  <h3 class="title-sin_map">
                    <?=$type?>
                  </h3>
                  <div class="TravelGo-category-location fl-wrap">
                    <a href="#" class="map-item"><i class="fas fa-hotel"></i> 
                      <?php 
                       foreach ($hotels as $hotel) {
                          if ($hotel->id == $chambre->id_hotel) {
                           $nom = $hotel->nom;
                           echo "$nom";
                          }
                        } ?>
                    </a><br>
                    <a href="#" class="map-item"><i class="far fa-user mr-2"></i> <?=$chambre->nombre?></a>
                    <span><?=$chambre->prix?>dt</span>
                  </div>
                </div>
              </div><?=$libelle?><br><br>
              <p><strong>Description: </strong><?=$chambre->description?></p>
            </div>
          </article>
        </div>
      </div>
      <div class="col-lg-8 col-md-6 col-sm-12" <?= (!isset($_GET['id'])) ? "style='margin-left:200px;'" : 'Ajouter' ; ?>>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="login-box Booking-box">
              <div class="login-top">
                <h3><?= (isset($_GET['id'])) ? 'Modifier' : 'Ajouter' ; ?> une chambre</h3>
                <p>s'il le chambre à été réserver il va vous alerter</p>
              </div>
              <form class="login-form" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                    <label>Type</label>
                    <select class="custom-select select-big mb-3" name="chambre[id_caracteristique]">
                      <?php foreach ($caracteristiques as $caracteristique): ?>
                        <option value="<?=$caracteristique->id?>" <?=(isset($_GET['id']) && $chambre->id_caracteristique == $caracteristique->id) ? "selected" : '' ; ?>><?=$caracteristique->type?></option>
                      <?php endforeach ?>
                    </select>
                  </div> 
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                    <label>hôtel</label>
                    <select class="custom-select select-big mb-3" name="chambre[id_hotel]">
                       <?php foreach ($hotels as $hotel): ?>
                        <option value="<?=$hotel->id?>" <?=(isset($_GET['id']) && $chambre->id_hotel == $hotel->id) ? "selected" : '' ; ?>><?=$hotel->nom?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                    <label>Prix</label>
                    <input type="number" name="chambre[prix]" value="<?=(isset($_GET['id'])) ? $chambre->prix : '' ; ?>" min="0" max="1000" required>
                  </div>   
                  <div class="col-lg-6 col-md-12 col-sm-12 email">
                    <label>Nombre</label>
                    <input type="text" name="chambre[nombre]" value="<?=(isset($_GET['id'])) ? $chambre->nombre : '' ; ?>" required>
                  </div> 
                  <div class="col-lg-6 col-md-12 col-sm-12 email" >
                    <label style="margin:20px 0 20px;">Description</label>
                    <textarea class="form-control" name="chambre[description]" rows="5" required=""><?=(isset($_GET['id'])) ? $chambre->description : '' ; ?></textarea>
                  </div>
                  <div class="form-group col-lg-6 col-md-12 col-sm-12 email" style="margin-top: 20px;">
                    <label for="exampleFormControlFile1" style="margin-bottom: 10px;">Photo de chambre</label>
                    <input name="fileToUpload" type="file" class="form-control-file" id="exampleFormControlFile1">
                  </div>
                  <div class="col-md-4">
                    <input type="hidden" name="chambre[id]" value="<?=(isset($_GET['id'])) ? $chambre->id : '' ; ?>">
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