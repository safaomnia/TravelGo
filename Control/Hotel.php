<?php

class hotel {

	function __construct($authentification,$utilisateur,$client,$hotel,$chambre){
		$this->authentification = $authentification;
		$this->utilisateur = $utilisateur;
		$this->client = $client;
		$this->hotel = $hotel;
		$this->chambre = $chambre;
	}

	function supprimer(){
		$sql = "DELETE hotel, chambre, reservation, annonce
				FROM hotel
				LEFT JOIN annonce ON (hotel.id = annonce.id_hotel)
				LEFT JOIN chambre ON (hotel.id = chambre.id_hotel)
				LEFT JOIN reservation ON (chambre.id = reservation.id_chambre)
				WHERE hotel.id = :value";
		$this->hotel->query($sql,['value'=>$_GET['id']]);
		header("Location:?route=hotel");
	}


	function formulaire(){
		$user = $this->authentification->getUser();
		return [ 
			'title'=>'Modifier hotel',
			'contenu'=>'FormHotel.htm.php',
			'variables' => [
				'hotel' => (isset($_GET['id'])) ? $this->hotel->findById($_GET['id']) : NULL,
				'hotels' => $this->hotel->find('id_agent',$user->id,"date_ajout"),
				'user' => $user
			]
		];
	}

	function enregister(){
		if (isset($_FILES["fileToUpload"]["name"])) {
			$file = $this->authentification->checkFile("images/hotels/","image");
			if ($file['upload']) {
				if (move_uploaded_file($file['loc'], $file['target'])) {
					$_POST['hotel']['image'] = $file['final'];
					$this->hotel->save($_POST['hotel']);
					if (isset($_GET['id'])) header("Location:?route=formhotel&id=$_GET[id]");
					else header("Location:?route=hotel");
				}
			} else {
				$_POST['hotel']['image'] = 'Default.png';
				$this->hotel->save($_POST['hotel']);
				if (isset($_GET['id'])) header("Location:?route=formhotel&id=$_GET[id]");
				else header("Location:?route=hotel");
			}
		} else {
			$this->hotel->save($_POST['hotel']);
			if (isset($_GET['id'])) header("Location:?route=formhotel&id=$_GET[id]");
			else header("Location:?route=hotel");
		}
	}

	function afficher(){
		$user = $this->authentification->getUser();
		if (!empty($user)) {
			if (isset($user->profil)) {
				if(isset($_GET['affichage'])) {
					if ($_GET['affichage'] == 'false') {
						$hotel = $this->hotel->findAll("date_ajout");
					} else {
						$hotel = $this->hotel->find("id_agent",$user->id,"date_ajout");
					}
				} else {
					$hotel = $this->hotel->find("id_agent",$user->id,"date_ajout");
				}
			} else {
				if(isset($_GET['affichage'])) {
					if ($_GET['affichage'] == 'false') {
						$hotel = $this->hotel->findAll("date_ajout");
					} else {
						$hotel = $this->hotel->table("SELECT * FROM hotel WHERE id IN (SELECT DISTINCT c.id_hotel FROM `reservation` r,hotel h,chambre c WHERE r.id_client=:value AND r.id_chambre = c.id AND c.id_hotel=h.id) ORDER BY date_ajout",['value'=>$user->id]);
					}
				} else {
				$hotel = $this->hotel->table("SELECT * FROM hotel WHERE id IN (SELECT DISTINCT c.id_hotel FROM `reservation` r,hotel h,chambre c WHERE r.id_client=:value AND r.id_chambre = c.id AND c.id_hotel=h.id) ORDER BY date_ajout",['value'=>$user->id]);
				}
			}
		} else {
			$hotel = $this->hotel->findAll("date_ajout");
		}
		return [ 
			'title'=>'Hotel',
			'contenu'=>'Hotel.htm.php',
			'variables' => [
				'hotels' => $hotel,
				'agents' => $this->utilisateur->findAll(),
				'user'=> $user
			]
		];
	}

	function details(){
		return [ 
			'title'=>'Hotel',
			'contenu'=>'DetailsHotel.htm.php',
			'variables' => [
				'hotel' => $this->hotel->findById($_GET['id']),
				'chambres' => $this->chambre->find('id_hotel',$_GET['id'],"date_ajout")
			]
		];
	}

	function rechercher(){
		$hotels = $_POST['hotel'];
		$hotel = [];
		foreach ($hotels as $key => $value) {
			if ($value != "") {
				$hotel[$key] = strtolower($value);
			}
		}
		if (empty($hotel)) header("Location:?route=hotel");
		return [ 
			'title'=>'Hotel',
			'contenu'=>'Hotel.htm.php',
			'variables' => [
				'hotels' =>$this->hotel->search($hotel,"AND","date_ajout"),
				'agents' => $this->utilisateur->findAll(),
				'user' => $this->authentification->getUser()			]
		];
	}
}
?>