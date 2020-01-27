<!-- =======================
Banner innerpage -->
<div class="innerpage-banner left bg-overlay-dark-7 py-7" style="background:url(images/07.jpg) repeat; background-size:cover;height: 10px;">
<div class="container" style="margin-top: -50px;">
<div class="row all-text-white">
  <div class="col-md-12 align-self-center">
    <h1 class="innerpage-title">Tous les utilisateur</h1>
    <h6 class="subtitle">Ici trouvez la liste de tous agents</h6>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="index.php"><i class="ti-home"></i> Acceuil</a></li>
        <li class="breadcrumb-item">agent</li>
      </ol>
    </nav>
  </div>
</div>
</div>
</div>

<!-- =======================
team style default -->
<section class="team pt80 pb40">
	<div class="container">
		<div class="resultBar barSpaceAdjust">
          <h2>Nous avons trouvé  <span><?=count($utilisateurs)?></span> agents </h2>
          <?php if ($user->profil=="administrateur"): ?>
            <ul class="list-inline">
              <li class="active" title="Ajouter nouvelle hôtel"><a href="?route=formuser"><i class="fa fa-plus-circle" style="font-size: 150%;" aria-hidden="true"></i></a></li>
          </ul>
          <?php endif ?>
        </div>
		<div class="row">
			<?php foreach ($utilisateurs as $utilisateur): 
				if($utilisateur->profil != 'administrateur') : ?>
				<!-- Team item -->
				<div class="col-sm-6 col-md-3">
					<div class="team-item text-center">
						<div class="team-avatar">
							<img src="images/team/<?=$utilisateur->photo?>" alt="">
						</div>
						<div class="team-desc">
							<h5 class="team-name">
								<i class="fa fa-ellipsis-v mr-2 mb-0" role="button" id="dropdownAccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
	                            <div class="dropdown-menu mt-2 shadow" aria-labelledby="dropdownAccount">  
	                            	<a class="dropdown-item" href="?route=formuser&id=<?=$utilisateur->id?>">Modifier</a>
	                            	<a class="dropdown-item" href="?route=deleteuser&id=<?=$utilisateur->id?>" onclick="return confirm('Voulez-vous sûr de suprrimer ce utilisateur?');">Supprimer</a> 
	                            </div>
	                            <?=$utilisateur->prenom?> <?=$utilisateur->nom?>
							</h5>
							<span class="team-position"><?=$utilisateur->profil?></span>
							<p>
								<strong>Adresse: </strong><?=$utilisateur->adresse?><br>
								<strong>Sexe: </strong><?=$utilisateur->sexe?><br>
								<strong>Raison social: </strong><?=$utilisateur->raison_social?><br>
								<strong>Matricule Fiscale: </strong><?=$utilisateur->adresse?><br>
							</p>
							<ul class="social-icons si-colored-on-hover">
								<li class="social-icons-item social-instagram"><a class="social-icons-link" href="mailto:<?=$utilisateur->email?>"><i class="fas fa-envelope"></i></a></li>
								<li class="social-icons-item social-facebook"><a class="social-icons-link" href="tel:<?=$utilisateur->telephone?>"><i class="fas fa-phone"></i></a></li>
							
							</ul>
						</div>
					</div>
				</div>
			<?php endif; endforeach ?>
		</div>
		<!-- row end -->
	</div>
</section>
<!-- =======================
team style default -->