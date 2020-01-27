<!-- =======================
Banner innerpage -->
<div class="innerpage-banner left bg-overlay-dark-7 py-7" style="background:url(images/07.jpg) repeat; background-size:cover;height: 10px;">
<div class="container" style="margin-top: -50px;">
<div class="row all-text-white">
  <div class="col-md-12 align-self-center">
    <h1 class="innerpage-title">Tous les clients</h1>
    <h6 class="subtitle">Ici trouvez la liste de tous les clients</h6>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="index.php"><i class="ti-home"></i> Acceuil</a></li>
        <li class="breadcrumb-item">client</li>
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
          <h2>Nous avons trouvé  <span><?=count($utilisateurs)?></span> clients </h2>
        </div>
		<div class="row">
			<?php foreach ($utilisateurs as $utilisateur):  ?>
				<!-- Team item -->
				<div class="col-sm-6 col-md-3">
					<div class="team-item text-center">
						<div class="team-avatar"><img src="images/team/<?=$utilisateur->photo?>" alt="">
						</div>
						<div class="team-desc">
							<h5 class="team-name"><?=$utilisateur->prenom?> <?=$utilisateur->nom?></h5>
							<span class="team-position"><?=$utilisateur->etat?></span>
							<p>
								<strong>Adresse: </strong><?=$utilisateur->adresse?>
								<strong>Sexe: </strong><?=$utilisateur->adresse?>
							</p>
							<ul class="social-icons si-colored-on-hover">
								<?php if ($utilisateur->etat == "Actif"): ?>
									<li class="social-icons-item social-instagram"><a class="social-icons-link" href="?route=client&id=<?=$utilisateur->id?>&block"><i class="fas fa-user-times" style="color: tomato;"></i></a></li>
								<?php else: ?>
									<li class="social-icons-item social-instagram"><a class="social-icons-link" href="?route=client&id=<?=$utilisateur->id?>&active"><i class="fas fa-user-check" style="color: green;"></i></a></li>
								<?php endif ?>
							</ul>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>
		<!-- row end -->
	</div>
</section>
<!-- =======================
team style default -->