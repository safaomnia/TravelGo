<?php 

/**
 * 
 */
class reservation
{
	
	function __construct($authentification, $hotel, $client, $chambre, $caracteristique, $reservation)
	{
		$this->authentification = $authentification;
		$this->hotel = $hotel;
		$this->client = $chambre;
		$this->chambre = $chambre;
		$this->caracteristique = $caracteristique;
		$this->reservation = $reservation;

	}

	function afficher(){
		$sql = "SELECT * FROM `reservation` WHERE id_chambre in (SELECT c.id FROM hotel h,chambre c WHERE c.id_hotel = h.id AND h.id_agent = :value) ORDER BY `date_ajout`";
		$user = $this->authentification->getUser();
		return [ 
			'title'=>'Chambre',
			'contenu'=>'Reservation.htm.php',
			'variables' => [
				'reservations' => $this->reservation->table($sql,['value'=>$user->id]),
				'caracteristiques' => $this->caracteristique->findALL(),
				'chambres' => $this->chambre->findALL(),
				'clients' => $this->client->findALL(),
				'user' => $user
			]
		];
	}
	
	function formulaire(){
		$user = $this->authentification->getUser();
		return [ 
			'title'=>'Chambre',
			'contenu'=>'FormReservation.htm.php',
			'variables' => [
				'chambre' => $this->chambre->findById($_GET['id']),
				'hotel' => $this->hotel->findById($_GET['id_hotel']),
				'reservations' => $this->reservation->table("SELECT * FROM `reservation` WHERE id_chambre = :chambre AND id_client = :client",['chambre'=>$_GET['id'],'client'=>$user->id]),
				'caracteristiques' => $this->caracteristique->findALL(),
				'user' => $user
			]
		];
	}

	function enregistrer(){
		
		$this->reservation->save($_POST['reservation']);
		header("Location:?route=chambre&id=$_GET[id]");
	}


	function rechercher(){
		if ($_POST['reservation'] == "") {
			header("Location:?route=reservation");
		} else {
			$reservation = [
				'sujet'=>$_POST['reservation'],
				'texte'=>$_POST['reservation']
			];
			return [ 
			'title'=>'Réservation',
			'contenu'=>'Réservation.htm.php',
			'variables' => [
				'reservations'=> $this->reservation->search($reservation,"OR","date_ajout"),'reservations' => $this->reservation->table($sql,['value'=>$user->id]),
				'caracteristiques' => $this->caracteristique->findALL(),
				'chambres' => $this->chambre->findALL(),
				'clients' => $this->client->findALL(),
				'user' => $user ]
			];
		}
	}
}
?>