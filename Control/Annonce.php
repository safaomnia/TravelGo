<?php

class annonce {

	function __construct($authentification,$utilisateur,$client,$annonce,$voiture,$hotel){
		$this->authentification = $authentification;
		$this->utilisateur = $utilisateur;
		$this->client = $client;
		$this->annonce = $annonce;
		$this->voiture = $voiture;
		$this->hotel = $hotel;
	}

	function rechercher(){
		if ($_POST['annonce'] == "") {
			header("Location:route=annonce");
		} else {
			$annonce = ['titre'=>$_POST['annonce'],'contenu'=>$_POST['annonce']];
			return [ 
			'title'=>'Annonce',
			'contenu'=>'Annonce.htm.php',
			'variables' => [
				'annonces' => $this->annonce->search($annonce,"OR","date_ajout"),
				'agents' => $this->utilisateur->findAll(),
				'voitures' => $this->voiture->findAll(),
				'hotels' => $this->hotel->findAll()		]
			];
		}
	}

	function afficher(){
		return [ 
			'title'=>'Annonces',
			'contenu'=>'Annonce.htm.php',
			'variables'=> [
				'annonces' => $this->annonce->findAll("date_ajout"),
				'agents' => $this->utilisateur->findAll(),
				'voitures' => $this->voiture->findAll(),
				'hotels' => $this->hotel->findAll()
			]
		];
	}


	function reclamer(){
		$this->reclamation->save($_POST['reclamation']);
		header("Location:?route=reclamation&succes");
	}
}
?>