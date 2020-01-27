<?php

class chambre {

	function __construct($authentification,$utilisateur,$hotel,$chambre,$caracteristique,$reservation,$client){
		$this->authentification = $authentification;
		$this->utilisateur = $utilisateur;
		$this->hotel = $hotel;
		$this->chambre = $chambre;
		$this->caracteristique = $caracteristique;
		$this->client = $client;
	}

	function supprimer(){
		$sql = "DELETE chambre,reservation
				FROM chambre
				LEFT JOIN reservation ON (chambre.id = reservation.id_chambre)
				WHERE chambre.id = :value";
		$this->hotel->query($sql,['value' => $_GET['id']]);
		header("Location:?route=chambre");
	}

	function formulaire(){
		$user = $this->authentification->getUser();
		return [ 
			'title'=>'Modifier chambre',
			'contenu'=>'FormChambre.htm.php',
			'variables' => [
				'chambre' => (isset($_GET['id'])) ? $this->chambre->findById($_GET['id']) : NULL,
				'caracteristiques' => $this->caracteristique->findAll(),
				'hotels' => $this->hotel->find("id_agent",$user->id),
				'user' => $user
			]
		];
	}

	function enregister(){
		if (isset($_FILES["fileToUpload"]["name"])) {
			$file = $this->authentification->checkFile("images/hotels/","image");
			if ($file['upload']) {
				if (move_uploaded_file($file['loc'], $file['target'])) {
					$_POST['chambre']['photo'] = $file['final'];
					$this->chambre->save($_POST['chambre']);
					if (isset($_GET['id'])) header("Location:?route=formchambre&id=$_GET[id]");
					else header("Location:?route=chambre");
				}
			} else {
				$_POST['chambre']['photo'] = 'Default.png';
				$this->chambre->save($_POST['chambre']);
				if (isset($_GET['id'])) header("Location:?route=formchambre&id=$_GET[id]");
				else header("Location:?route=chambre");
			}
		} else {
			$this->chambre->save($_POST['chambre']);
			if (isset($_GET['id'])) header("Location:?route=formchambre&id=$_GET[id]");
			else header("Location:?route=chambre");
		}
	}

	function afficher(){
		$user = $this->authentification->getUser();
		if (!empty($user)) {
			if(isset($_GET['affichage'])) {
				if ($_GET['affichage'] == 'false') {
					if (isset($_GET['id'])) {
						$chambre = $this->chambre->find('id_hotel',$_GET['id']);
					} else {
					$chambre = (isset($user->profil)) ? $this->chambre->findAll("date_ajout") : $this->chambre->table("SELECT * FROM chambre WHERE id IN (SELECT DISTINCT r.id_chambre FROM `reservation` r,chambre c WHERE r.id_client=:value) ORDER BY date_ajout",['value'=>$user->id]);
					}
				} else {
					$chambre = (isset($user->profil)) ? $this->chambre->table("SELECT * FROM `chambre` WHERE id_hotel in (SELECT h.id FROM hotel h,chambre c WHERE h.id = c.id_hotel AND h.id_agent = :value) ORDER BY date_ajout",['value'=>$user->id]) :  $this->chambre->find('id_hotel',$_GET['id']);
				}
			} else {
			$chambre = (isset($user->profil)) ? $this->chambre->table("SELECT * FROM `chambre` WHERE id_hotel in (SELECT h.id FROM hotel h,chambre c WHERE h.id = c.id_hotel AND h.id_agent = :value) ORDER BY date_ajout",['value'=>$user->id]) : $this->chambre->table("SELECT * FROM chambre WHERE id IN (SELECT DISTINCT r.id_chambre FROM `reservation` r,chambre c WHERE r.id_client=:value) ORDER BY date_ajout",['value'=>$user->id]);
			}
		} else {
			$chambre = (isset($user->profil)) ? $this->chambre->findAll("date_ajout") : $this->chambre->find('id_hotel',$_GET['id'],"date_ajout");
		}
		return [ 
			'title'=>'Chambre',
			'contenu'=>'Chambre.htm.php',
			'variables' => [
				'hotel' => (isset($_GET['id'])) ? $this->hotel->findById($_GET['id']) : NULL,
				'chambres' => $chambre,
				'caracteristiques' => $this->caracteristique->findALL(),
				'hotels' => $this->hotel->findALL(),
				'user' => $user
			]
		];
	}


	function rechercher(){
		$chambres = $_POST['chambre'];
		$chambre = [];
		foreach ($chambres as $key => $value) {
			if ($value != "") {
				$chambre[$key] = strtolower($value);
			}
		}
		if (empty($chambre)) header("Location:?route=chambre&id=$_GET[id]");
		return [ 
			'title'=>'Chambre',
			'contenu'=>'Chambre.htm.php',
			'variables' => [
				'hotel' => $this->hotel->findById($_GET['id']),
				'chambres' =>$this->chambre->search($chambre,"AND","date_ajout"),
				'agents' => $this->utilisateur->findAll(),
				'caracteristiques' => $this->caracteristique->findALL(),
				'user'=> $this->authentification->getUser()
			]
		];
	}
}
?>