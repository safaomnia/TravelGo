<?php

/**
 * 
 */
class location
{
	
	function __construct($authentification, $client, $agence, $voiture, $location)
	{
		$this->authentification = $authentification;
		$this->client = $client;
		$this->agence = $agence;
		$this->voiture = $voiture;
		$this->location = $location;
	}

	function rechercher(){
		if ($_POST['location'] == "") {
			header("Location:?route=location");
		} else {
			$location = [
				'id'=>$_POST['location']
			];
			return [ 
			'title'=>'Location',
			'contenu'=>'Location.htm.php',
			'variables' => [
				'locations'=> $this->location->search($location,"OR","date_ajout"),
				'voitures' => $this->voiture->findALL("date_ajout"),
				'clients' => $this->client->findALL(),
				'user' => $this->authentification->getUser() ]
			];
		}
	}

	function afficher(){
		$sql = "SELECT * FROM `location` WHERE id_voiture in (SELECT v.id FROM agence a,voiture v WHERE v.id_agence = a.id AND a.id_agent = :value) ORDER BY `date_ajout`";
		$user = $this->authentification->getUser();
		return [ 
			'title'=>'Voiture',
			'contenu'=>'Location.htm.php',
			'variables' => [
				'locations' => $this->location->table($sql,['value'=>$user->id]),
				'voitures' => $this->voiture->findALL("date_ajout"),
				'clients' => $this->client->findALL(),
				'user' => $user
			]
		];
	}


	function formulaire(){
		$user = $this->authentification->getUser();
		return [ 
			'title'=>'Voiture',
			'contenu'=>'FormLocation.htm.php',
			'variables' => [
				'voiture' => $this->voiture->findById($_GET['id']),
				'agence' => $this->agence->findById($_GET['id_agence']),
				'locations' => (isset($user->profil)) ? $this->location->findById($_GET['id']) : $this->location->table("SELECT * FROM `location` WHERE id_voiture = :voiture AND id_client = :client",['voiture'=>$_GET['id'],'client'=>$user->id]),
				'user' => $user
			]
		];
	}

	function enregistrer(){
		function construit_url_paypal()
		{
			$api_paypal = 'https://api-3t.sandbox.paypal.com/nvp?'; // Site de l'API PayPal. On ajoute déjà le ? afin de concaténer directement les paramètres.
			$version = 56.0; // Version de l'API
			
			$user = 'vendeur_1236594550_biz_api1.siteduzero.com'; // Utilisateur API
			$pass = 'SEFYITJFG8QRHN1S'; // Mot de passe API
			$signature = 'ZWg4tSHZZ0GQIK8U6VKGWO1mxrtOAJzAGFNRnFpDWRKX-fv8q5Tuj64n'; // Signature de l'API

			$api_paypal = $api_paypal.'VERSION='.$version.'&USER='.$user.'&PWD='.$pass.'&SIGNATURE='.$signature; // Ajoute tous les paramètres

			return 	$api_paypal; // Renvoie la chaîne contenant tous nos paramètres.
		}
		$requete = construit_url_paypal(); // Construit les options de base

		// La fonction urlencode permet d'encoder au format URL les espaces, slash, deux points, etc.)
		$requete = $requete."&METHOD=SetExpressCheckout".
					"&CANCELURL=".urlencode("http://127.0.0.1/cancel.php").
					"&RETURNURL=".urlencode("http://127.0.0.1/return.php").
					"&AMT=10.0".
					"&CURRENCYCODE=EUR".
					"&DESC=".urlencode("Magnifique oeuvre d'art (que mon fils de 3 ans a peint.)").
					"&LOCALECODE=FR".
					"&HDRIMG=".urlencode("http://www.siteduzero.com/Templates/images/designs/2/logo_sdz_fr.png");

		// Affiche la chaîne pour vérifier que la chaîne est bien formatée :
		echo $requete;
		$this->location->save($_POST['location']);
		// header("Location:?route=voiture&id=$_GET[id]");
	}


}
?>