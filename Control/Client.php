<?php

class client {

	function __construct($authentification,$utilisateur,$client,$hotel,$agence,$chambre,$voiture,$caracteristique){
		$this->authentification = $authentification;
		$this->utilisateur = $utilisateur;
		$this->client = $client;
		$this->hotel = $hotel;
		$this->agence = $agence;
		$this->chambre = $chambre;
		$this->voiture = $voiture;
		$this->caracteristique = $caracteristique;
	}

	function rechercherClient(){
		if ($_POST['client'] == "") {
			header("Location:?route=client");
		} else {
			$client = [
				'nom'=>$_POST['client'],
				'prenom'=>$_POST['client'],
				'adresse'=>$_POST['client'],
				'telephone'=>$_POST['client'],
				'email'=>$_POST['client'],
				'sexe'=>$_POST['client']
			];
			return [ 
			'title'=>'Client',
			'contenu'=>'Client.htm.php',
			'variables' => [
				'utilisateurs' => $this->client->search($client,"OR","date_inscription"),
				'user' => $this->authentification->getUser()	]
			];
		}
	}

	function authentifier(){
		if (isset($_POST['client'])) {
			$login = $this->authentification->login($_POST['login'],$_POST['mdp'],"client");
		} 
		if($login){
			header('location: index.php');
		} else {
			header('location: ?route=connexion&error');
		}
	}

	function inscrire(){
		$user = $_POST['client'];
		$register = $this->client->find('login',$user['login']);
		if(empty($register)){
			$this->client->save($user);
			header('location: ?route=connexion');
		} else {
			header('location: ?route=inscription&error');
		}
	}

	function etudier(){
		if (isset($_GET['block'])) $this->client->save(['etat'=>"Bloque",'id'=>$_GET['id']]);
		if (isset($_GET['active'])) $this->client->save(['etat'=>"Actif",'id'=>$_GET['id']]);
		return [ 
			'title'=>'Client',
			'contenu'=>'Client.htm.php',
			'variables' => [
				'utilisateurs' => $this->client->findAll("date_inscription"),
				'user' => $this->authentification->getUser()
			]
		];
	}

	function home(){
		return [
			'contenu'=>'Home.htm.php', 
			'title'=>'Acceuil',
			'variables' => [
				'hotels' => $this->hotel->find("categorie",5),
				'agences' => $this->agence->findAll("date_ajout"),
				'chambres' => $this->chambre->findAll("date_ajout"),
				'voitures' => $this->voiture->findAll("date_ajout"),
				'caracteristiques' => $this->voiture->findAll("date_ajout")
			]
		];
	}

}
?>