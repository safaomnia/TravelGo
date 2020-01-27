<?php
class Route {
	public function __construct() {
		include __DIR__ . '/../Model/DatabaseConnection.php';
		include __DIR__ . '/../Model/DatabaseTable.php';
		include __DIR__ . '/../Model/Authentification.php';
		$this->utilisateurTable = new DatabaseTable($pdo, 'utilisateur');
		$this->clientTable = new DatabaseTable($pdo, 'client');
		$this->authentification = new Authentification($this->utilisateurTable,$this->clientTable,'login','mdp');
		$this->agentAgenceTable = new DatabaseTable($pdo, 'agent_agence');
		$this->agentHotelTable = new DatabaseTable($pdo, 'agent_hotel');
		$this->annonceTable = new DatabaseTable($pdo, 'annonce');
		$this->caracteristiqueTable = new DatabaseTable($pdo, 'caracteristique');
		$this->chambreTable = new DatabaseTable($pdo, 'chambre');
		$this->hotelTable = new DatabaseTable($pdo, 'hotel');
		$this->locationTable = new DatabaseTable($pdo, 'location');
		$this->optionVoitureTable = new DatabaseTable($pdo, 'option_voiture');
		$this->reclamationTable = new DatabaseTable($pdo, 'reclamation');
		$this->reservationTable = new DatabaseTable($pdo, 'reservation');
		$this->voitureTable = new DatabaseTable($pdo, 'voiture');
		$this->agenceTable = new DatabaseTable($pdo, 'agence');
	}

	public function getRoutes(){

		include __DIR__ . '/../Control/Utilisateur.php';
		include __DIR__ . '/../Control/Hotel.php';
		include __DIR__ . '/../Control/Agence.php';
		include __DIR__ . '/../Control/Reclamation.php';
		include __DIR__ . '/../Control/Annonce.php';
		include __DIR__ . '/../Control/Chambre.php';
		include __DIR__ . '/../Control/Voiture.php';
		include __DIR__ . '/../Control/Location.php';
		include __DIR__ . '/../Control/reservation.php';
		
		$utilisateurController = new utilisateur($this->authentification,$this->utilisateurTable,$this->clientTable,$this->hotelTable,$this->agenceTable,$this->chambreTable,$this->voitureTable,$this->caracteristiqueTable);
		$hotelController = new hotel($this->authentification,$this->utilisateurTable,$this->clientTable,$this->hotelTable,$this->chambreTable);
		$agenceController = new agence($this->authentification,$this->utilisateurTable,$this->clientTable,$this->agenceTable,$this->voitureTable);
		$reclamationController = new reclamation($this->authentification,$this->utilisateurTable,$this->clientTable,$this->reclamationTable);
		$annonceController = new annonce($this->authentification,$this->utilisateurTable,$this->clientTable,$this->annonceTable,$this->voitureTable,$this->hotelTable);
		$chambreController = new chambre($this->authentification,$this->utilisateurTable,$this->hotelTable,$this->chambreTable,$this->caracteristiqueTable,$this->reservationTable,$this->clientTable);
		$voitureController = new voiture($this->authentification,$this->utilisateurTable,$this->agenceTable,$this->voitureTable,$this->locationTable,$this->clientTable);
		$locationController = new location($this->authentification,$this->clientTable,$this->agenceTable,$this->voitureTable,$this->locationTable);
		$reservationController = new \reservation($this->authentification,$this->clientTable,$this->hotelTable,$this->chambreTable,$this->caracteristiqueTable,$this->reservationTable);

		$routes = [

			'repond' => [
				'GET' => [
					'controller' => $reclamationController,
					'method' => 'formulaire'
				],
				'POST' => [
					'controller' => $reclamationController,
					'method' => 'enregistrer'
				],
				'Auth' => true
			],
			'deleteuser' => [
				'GET' => [
					'controller' => $utilisateurController,
					'method' => 'supprimer'
				],
				'Auth' => true
			],
			'formuser' => [
				'GET' => [
					'controller' => $utilisateurController,
					'method' => 'formulaire'
				],
				'POST' => [
					'controller' => $utilisateurController,
					'method' => 'modifier'
				],
				'Auth' => true
			],
			'client' => [
				'GET' => [
					'controller' => $utilisateurController,
					'method' => 'client'
				],
				'POST' => [
					'controller' => $utilisateurController,
					'method' => 'rechercherClient'
				],
				'Auth' => true
			],
			'utilisateur' => [
				'GET' => [
					'controller' => $utilisateurController,
					'method' => 'afficher'
				],
				'POST' => [
					'controller' => $utilisateurController,
					'method' => 'rechercher'
				],
				'Auth' => true
			],
			'reservation' => [
				'GET' => [
					'controller' => $reservationController,
					'method' => 'afficher'
				],
				'POST' => [
					'controller' => $reservationController,
					'method' => 'rechercher'
				],
				'Auth' => true
			],
			'location' => [
				'GET' => [
					'controller' => $locationController,
					'method' => 'afficher'
				],
				'POST' => [
					'controller' => $voitureController,
					'method' => 'rechercher'
				],
				'Auth' => true
			],
			'profil' => [
				'GET' => [
					'controller' => $utilisateurController,
					'method' => 'details'
				],
				'POST' => [
					'controller' => $utilisateurController,
					'method' => 'modifier'
				],
				'Auth' => true
			],
			'deletechambre' => [
				'GET' => [
					'controller' => $chambreController,
					'method' => 'supprimer'
				],
				'Auth' => true
			],
			'deletehotel' => [
				'GET' => [
					'controller' => $hotelController,
					'method' => 'supprimer'
				],
				'Auth' => true
			],
			'deletevoiture' => [
				'GET' => [
					'controller' => $voitureController,
					'method' => 'supprimer'
				],
				'Auth' => true
			],
			'deleteagence' => [
				'GET' => [
					'controller' => $agenceController,
					'method' => 'supprimer'
				],
				'Auth' => true
			],
			'formvoiture' => [
				'GET' => [
					'controller' => $voitureController,
					'method' => 'formulaire'
				],
				'POST' => [
					'controller' => $voitureController,
					'method' => 'enregister'
				],
				'Auth' => true
			],
			'formchambre' => [
				'GET' => [
					'controller' => $chambreController,
					'method' => 'formulaire'
				],
				'POST' => [
					'controller' => $chambreController,
					'method' => 'enregister'
				],
				'Auth' => true
			],
			'formagence' => [
				'GET' => [
					'controller' => $agenceController,
					'method' => 'formulaire'
				],
				'POST' => [
					'controller' => $agenceController,
					'method' => 'enregister'
				],
				'Auth' => true
			],
			'formhotel' => [
				'GET' => [
					'controller' => $hotelController,
					'method' => 'formulaire'
				],
				'POST' => [
					'controller' => $hotelController,
					'method' => 'enregister'
				],
				'Auth' => true
			],
			'louer' => [
				'GET' => [
					'controller' => $locationController,
					'method' => 'formulaire'
				],
				'POST' => [
					'controller' => $locationController,
					'method' => 'enregistrer'
				],
				'Auth' => true
			],
			'reserver' => [
				'GET' => [
					'controller' => $reservationController,
					'method' => 'formulaire'
				],
				'POST' => [
					'controller' => $chambreController,
					'method' => 'enregister'
				],
				'Auth' => true
			],
			'detailsagence' => [
				'GET' => [
					'controller' => $agenceController,
					'method' => 'details'
				]
			],
			'detailshotel' => [
				'GET' => [
					'controller' => $hotelController,
					'method' => 'details'
				]
			],
			'voiture' => [
				'GET' => [
					'controller' => $voitureController,
					'method' => 'afficher'
				],
				'POST' => [
					'controller' => $voitureController,
					'method' => 'rechercher'
				]
			],
			'chambre' => [
				'GET' => [
					'controller' => $chambreController,
					'method' => 'afficher'
				],
				'POST' => [
					'controller' => $chambreController,
					'method' => 'rechercher'
				]
			],
			'annonce' => [
				'GET' => [
					'controller' => $annonceController,
					'method' => 'afficher'
				],
				'POST' => [
					'controller' => $annonceController,
					'method' => 'rechercher'
				]
			],
			'reclamation' => [
				'GET' => [
					'controller' => $reclamationController,
					'method' => 'afficher'
				],
				'POST' => [
					'controller' => $reclamationController,
					'method' => 'rechercher'
				],
				'Auth' => true
			],
			'reclamer' => [
				'GET' => [
					'controller' => $reclamationController,
					'method' => 'formulaire'
				],
				'POST' => [
					'controller' => $reclamationController,
					'method' => 'reclamer'
				],
				'Auth' => true
			],
			'agence' => [
				'GET' => [
					'controller' => $agenceController,
					'method' => 'afficher'
				],
				'POST' => [
					'controller' => $agenceController,
					'method' => 'rechercher'
				]
			],
			'hotel' => [
				'GET' => [
					'controller' => $hotelController,
					'method' => 'afficher'
				],
				'POST' => [
					'controller' => $hotelController,
					'method' => 'rechercher'
				]
			],
			'' => [
				'GET' => [
					'controller' => $utilisateurController,
					'method' => 'home'
				]
			],
			'logout' => [
				'GET' => [
					'controller' => $utilisateurController,
					'method' => 'deconnecter'
				]
			],
			'home' => [
				'GET' => [
					'controller' => $utilisateurController,
					'method' => 'home'
				]
			],
			'connexion' => [
				'GET' => [
					'controller' => $utilisateurController,
					'method' => 'connexion'
				],
				'POST' => [
					'controller' => $utilisateurController,
					'method' => 'authentifier'
				]
			],
			'inscription' => [
				'GET' => [
					'controller' => $utilisateurController,
					'method' => 'inscription'
				],
				'POST' => [
					'controller' => $utilisateurController,
					'method' => 'inscrire'
				]
			],
			'connexion/erreur' => [
				'GET' => [
					'controller' => $utilisateurController,
					'method' => 'erreur'
				]
			]
		];
		return $routes;
	}
	public function getAuthentification(){
		$auth = $this->authentification->isLoggedIn();
		return $auth;
	}
	public function getUser(){
		return $this->authentification->getUser();
	}
}