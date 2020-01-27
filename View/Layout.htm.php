<!doctype html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="Cache-control" content="no-cache">
<!-- Bootstrap CSS -->
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link href="css/form.css" type="text/css" rel="stylesheet" />
<link href="css/bootstrap-datepicker.css" type="text/css" rel="stylesheet" />
<!-- Favicon -->
<!-- Favicon and Touch Icons -->
<link href="images/favicon.png" rel="shortcut icon" type="image/png">
<link href="images/apple-touch-icon.png" rel="apple-touch-icon">
<link href="images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
<link href="images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
<link href="images/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">
<title><?=$title?></title>
</head>
<body>

<!-- =======================
	header Start-->
<header class="header-static navbar-sticky navbar-light shadow"> 
  <!-- Search -->
  <div class="top-search collapse bg-light" id="search-open" data-parent="#search">
    <div class="container">
      <div class="row position-relative">
        <div class="col-md-8 mx-auto py-5">
          <form method="POST">
            <div class="input-group">
              <input type="hidden" name="route" value="<?=$_GET['route']?>">
              <input class="form-control border-radius-right-0 border-right-0" type="text" name="<?=$_GET['route']?>" autofocus placeholder="Que chercher-vous?">
              <button type="button" class="btn btn-grad border-radius-left-0 mb-0">Rechercher</button>
            </div>
          </form>
        </div>
        <a class="position-absolute top-0 right-0 mt-3 mr-3" data-toggle="collapse" href="#search-open"><i class="fas fa-window-close"></i></a> </div>
    </div>
  </div>
  <!-- End Search -->  
  
  <!-- Logo Nav Start -->
  <nav class="navbar navbar-expand-lg">
    <div class="container"> 
      <!-- Logo --> 
      <a class="navbar-brand" href="index.php"> <img src="images/logo-header.png" alt="travelgo"> </a> 
      <!-- Menu opener button -->
      <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"> </span> </button>
      <!-- Main Menu Start -->
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
          <!-- Menu item 1 Demos-->
          <li class="nav-item"> 
            <a class="nav-link" href="index.php" id="docMenu">Acceuil <font style="margin-left: 10px;">|</font></a>
          </li>
          <?php if (!$authentification || !isset($user->profil)): ?>
            <li class="nav-item" > 
            <a class="nav-link" href="?route=hotel" id="docMenu">Hôtel<font style="margin-left: 10px;">|</font></a>
            </li>
            <li class="nav-item"> 
              <a class="nav-link" href="?route=agence" id="docMenu">Agence <font style="margin-left: 10px;">|</font></a>
            </li>
            <li class="nav-item"> 
              <a class="nav-link" href="?route=annonce" id="docMenu">Annonce <font style="margin-left: 10px;">|</font></a>
            </li>
            <li class="nav-item"> 
              <a class="nav-link" href="?route=reclamer" id="docMenu">Réclamation <font style="margin-left: 10px;">|</font></a>
            </li>
          <?php elseif($user->profil == "agent_agence"):?>
            <li class="nav-item"> 
              <a class="nav-link" href="?route=agence" id="docMenu">Agence <font style="margin-left: 10px;">|</font></a>
            </li>
            <li class="nav-item"> 
              <a class="nav-link" href="?route=voiture" id="docMenu">Voiture <font style="margin-left: 10px;">|</font></a>
            </li>
            <li class="nav-item"> 
              <a class="nav-link" href="?route=location" id="docMenu">Location <font style="margin-left: 10px;">|</font></a>
            </li>
          <?php elseif($user->profil == "agent_hotel"): ?>
            <li class="nav-item"> 
              <a class="nav-link" href="?route=hotel" id="docMenu">Hôtel <font style="margin-left: 10px;">|</font></a>
            </li>
            <li class="nav-item"> 
              <a class="nav-link" href="?route=chambre" id="docMenu">Chambre <font style="margin-left: 10px;">|</font></a>
            </li>
            <li class="nav-item"> 
              <a class="nav-link" href="?route=reservation" id="docMenu">Réservation <font style="margin-left: 10px;">|</font></a>
            </li>
          <?php else: ?>
             <li class="nav-item"> 
              <a class="nav-link" href="?route=Utilisateur" id="docMenu">Utilisateur <font style="margin-left: 10px;">|</font></a>
            </li>
            <li class="nav-item"> 
              <a class="nav-link" href="?route=client" id="docMenu">Client <font style="margin-left: 10px;">|</font></a>
            </li>
            <li class="nav-item"> 
              <a class="nav-link" href="?route=reclamation" id="docMenu">Récalamation <font style="margin-left: 10px;">|</font></a>
            </li>
          <?php endif ?>
          <li class="nav-item">
             <a class="nav-link" href="#" id="docMenu">À propos </a>
          </li>
        </ul>
      </div>
      <!-- Main Menu End --> 
      <!-- Header Extras Start-->
      <div class="navbar-nav"> 
        <!-- extra item Search-->
        <div class="nav-item search border-0 pl-3 pr-0 px-lg-2" id="search"> <a class="nav-link" data-toggle="collapse" href="#search-open"><i class="fas fa-search"></i></a> </div>
        <!-- extra item Btn-->
        <div class="nav-item border-0 d-none d-lg-inline-block align-self-center dropdown"> 
          <?php if (!$authentification) { ?>
            <a href="#" class=" btn btn-sm btn-grad text-white mb-0 dropdown-toggle" role="button" id="dropdownAccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-user mr-2"></i>Compte </a>
            <div class="dropdown-menu mt-2 shadow" aria-labelledby="dropdownAccount">  <a class="dropdown-item" href="?route=connexion">Connexion</a> 
              <a class="dropdown-item" href="?route=inscription">Inscription</a> </div>
          </a> 
          <?php } elseif(!empty($user)) { ?>
            <a href="#" class=" btn btn-sm btn-grad text-white mb-0 dropdown-toggle" role="button" id="dropdownAccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-user mr-2"></i><?php echo "$user->prenom $user->nom";?></a>
              <div class="dropdown-menu mt-2 shadow" aria-labelledby="dropdownAccount">  
                <?php if (isset($user->profil) && ($user->profil != 'administrateur')): ?>
                  <a class="dropdown-item" href="?route=profil">Profil</a> 
                <?php endif ?>
                <a class="dropdown-item" href="?route=logout">Déconnexion</a> 
              </div>
            </a> 
        <?php } ?>
      </div>
      </div>
      <!-- Header Extras End--> 
    </div>
  </nav>
  <!-- Logo Nav End --> 
</header>
<!-- =======================
	header End--> 

<?=$output?>



<!-- =======================
	footer  -->
<footer class="footer footer-dark">
  <!--footer copyright -->
  <div class="footer-copyright py-3">
        <!-- copyright text -->
        <div class="copyright-text">©2019 All Rights Reserved by <a href="#!"> TravelGo.</a></div>
    
  </div>
</footer>
<!-- =======================
	footer  --> 

<!-- Optional JavaScript --> 
<script src="js/jquery.min.js" type="text/javascript"></script> 
<script src="js/popper.min.js" type="text/javascript"></script> 
<script src="js/bootstrap.min.js" type="text/javascript"></script> 
<script src="js/functions.js" type="text/javascript"></script> 
<script src="js/owl.carousel.min.js" type="text/javascript"></script> 
<script src="js/slick.js" type="text/javascript"></script> 
<script src="js/swiper.min.js" type="text/javascript"></script> 
<script src="js/main.js" type="text/javascript"></script> 
<script src="js/jquery.fancybox.min.js" type="text/javascript"></script> 
<script src="js/bootstrap-datepicker.min.js" type="text/javascript"></script> 
<script src="js/jquery-ui.min.js" type="text/javascript"></script>
  
</script>

</body>

<!-- Mirrored from preview.templatehouse.net/travelgo/homepage2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2019 10:57:50 GMT -->
</html>