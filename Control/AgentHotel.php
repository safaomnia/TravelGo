<?php

class agent_agence {

	function __construct($authentification,$utilisateur,$agent_agence){
		$this->authentification = $authentification;
		$this->utilisateur = $utilisateur;
		$this->agent_agence = $agent_agence;
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


	function rechercher(){
		if ($_POST['utilisateur'] == "") {
			header("Location:?route=utilisateur");
		} else {
			$utilisateur = [
				'nom'=>$_POST['utilisateur'],
				'prenom'=>$_POST['utilisateur'],
				'adresse'=>$_POST['utilisateur'],
				'telephone'=>$_POST['utilisateur'],
				'email'=>$_POST['utilisateur'],
				'sexe'=>$_POST['utilisateur'],
				'raison_social'=>$_POST['utilisateur'],
				'mat_fiscale'=>$_POST['utilisateur'],
				'profil'=>$_POST['utilisateur']
			];
			return [ 
			'title'=>'Utilisateur',
			'contenu'=>'Utilisateur.htm.php',
			'variables' => [
				'utilisateurs' => $this->utilisateur->search($utilisateur,"OR","date_ajout"),
				'user' => $this->authentification->getUser()	]
			];
		}
	}


	function supprimer(){
		$user = $this->utilisateur->findById($_GET['id']);
		if ($user->profil == "agent_agence") {
			$sql = "DELETE utilisateur, agent_agence, agence, voiture, location, annonce
				FROM utilisateur
				LEFT JOIN agent_agence ON (utilisateur.id = agent_agence.id)
				LEFT JOIN agence ON (utilisateur.id = agence.id_agent)
				LEFT JOIN voiture ON (agence.id = voiture.id_agence)
				LEFT JOIN annonce ON (voiture.id = annonce.id_voiture)
				LEFT JOIN location ON (voiture.id = location.id_voiture)
				WHERE utilisateur.id = :value";
		} else {
			$sql = "
			DELETE utilisateur, agent_hotel, hotel, chambre, reservation, annonce 
			FROM utilisateur 
			LEFT JOIN agent_hotel ON (utilisateur.id = agent_hotel.id) 
			LEFT JOIN hotel ON (utilisateur.id = hotel.id_agent) 
			LEFT JOIN chambre ON (hotel.id = chambre.id_hotel) 
			LEFT JOIN annonce ON (hotel.id = annonce.id_hotel) 
			LEFT JOIN reservation ON (chambre.id = reservation.id_chambre) 
			WHERE utilisateur.id = 12345680";
		}

		$this->utilisateur->query($sql,['value'=>$_GET['id']]);
		header("Location:?route=utilisateur");
	}

	function authentifier(){
		if (isset($_POST['client'])) {
			$login = $this->authentification->login($_POST['login'],$_POST['mdp'],"client");
		} else {
			$login = $this->authentification->login($_POST['login'],$_POST['mdp'],"utilisateur");
		}
		if($login){
			header('location: ?route=home');
		} else {
			header('location: ?route=connexion&error');
		}
	}

	function details(){
		return [ 
			'title'=>'Profil',
			'contenu'=>'Profil.htm.php',
			'variables' => [
				'user' => $this->authentification->getUser()
			]
		];
	}

	function formulaire(){
		return [ 
			'title'=>'Utilisateur',
			'contenu'=>'FormUtilisateur.htm.php',
			'variables' => [
				'user' =>  (isset($_GET['id'])) ? $this->utilisateur->findById($_GET['id']) : NULL
			]
		];
	}

	function modifier(){
		if (isset($_FILES["fileToUpload"]["name"])) {
			$file = $this->authentification->checkFile("images/team/","image");
			if ($file['upload']) {
				if (move_uploaded_file($file['loc'], $file['target'])) {
					$_POST['client']['photo'] = $file['final'];
					if($_POST['profil'] != "") {
						if($_GET['route'] != 'formuser') {
							$this->utilisateur->save($_POST['client']);
							header("Location:?route=profil");
						} elseif ($_GET['route'] == 'formuser') {
							$this->utilisateur->save($_POST['client']);
							header("Location:?route=utilisateur");
						}
					} else {
						$this->client->save($_POST['client']);
						header("Location:?route=profil");
					}
				}
			} else {
				if($_POST['profil'] != "") {
					if($_GET['route'] != 'formuser') {
						$this->utilisateur->save($_POST['client']);
						header("Location:?route=profil");
					} elseif ($_GET['route'] == 'formuser') {
						$this->utilisateur->save($_POST['client']);
						header("Location:?route=utilisateur");
					}
				} else {
					$this->client->save($_POST['client']);
					header("Location:?route=profil");
				}
			}
		} else {
			if($_POST['profil'] != "") {
				if($_GET['route'] != 'formuser') {
					$this->utilisateur->save($_POST['client']);
					header("Location:?route=profil");
				} elseif ($_GET['route'] == 'formuser') {
					$this->utilisateur->save($_POST['client']);
					header("Location:?route=utilisateur");
				}
			} else {
				$this->client->save($_POST['client']);
				header("Location:?route=profil");
			}
		}
	}

	function inscrire(){
		$user = $_POST['utilisateur'];
		$register = $this->client->find('login',$user['login']);
		if(empty($register)){
			$this->client->save($user);
			header('location: ?route=connexion');
		} else {
			header('location: ?route=inscription&error');
		}
	}

	function afficher(){
		return [ 
			'title'=>'Utilisateur',
			'contenu'=>'Utilisateur.htm.php',
			'variables' => [
				'utilisateurs' => $this->utilisateur->findAll("date_ajout"),
				'user' => $this->authentification->getUser()
			]
		];
	}
	function client(){
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
			'title'=>'Succes Road',
			'variables' => [
				'hotels' => $this->hotel->find("categorie",5),
				'agences' => $this->agence->findAll("date_ajout"),
				'chambres' => $this->chambre->findAll("date_ajout"),
				'voitures' => $this->voiture->findAll("date_ajout"),
				'caracteristiques' => $this->voiture->findAll("date_ajout")
			]
		];
	}
	function connexion(){
		return [
			'contenu'=>'Connexion.htm.php', 
			'title'=>'Connexion',
			'variables' => [
			]
		];
	}
	function inscription(){
		return [
			'contenu'=>'Inscription.htm.php', 
			'title'=>'Inscription',
			'variables' => [
			]
		];
	}

	function erreur(){
		return [
			'contenu'=>'ErreurConnexion.htm', 
			'title'=>'Erreur d\'authentification',
			'icon'=>'Error.png'
		];
	}
	
	function deconnecter(){
		session_destroy();
		unset($_SESSION);
		header("location:?route=home");
	}
}
?>