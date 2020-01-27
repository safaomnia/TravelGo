<?php

class voiture {

	function __construct($authentification,$utilisateur,$agence,$voiture,$location,$client){
		$this->authentification = $authentification;
		$this->utilisateur = $utilisateur;
		$this->agence = $agence;
		$this->voiture = $voiture;
		$this->location = $location;
		$this->client = $client;
	}


	function supprimer(){
		$sql = "DELETE voiture,location,annonce
				FROM voiture
				LEFT JOIN location ON (voiture.id = location.id_voiture)
				LEFT JOIN annonce ON (voiture.id = annonce.id_voiture)
				WHERE voiture.id = :value";
		$this->voiture->query($sql,['value'=>$_GET['id']]);
		header("Location:?route=voiture");
	}

	function enregister(){
		var_dump($_POST['voiture']);
		if (isset($_FILES["fileToUpload"]["name"])) {
			$file = $this->authentification->checkFile("images/cars/","image");
			if ($file['upload']) {
				if (move_uploaded_file($file['loc'], $file['target'])) {
					$_POST['voiture']['photo'] = $file['final'];
					$this->voiture->save($_POST['voiture']);
					(isset($_GET['id']))? header("Location:?route=formvoiture&id=$_GET[id]") : header("Location:?route=voiture");
				}
			} else {
				$_POST['voiture']['photo'] = 'Default.png';
				$this->voiture->save($_POST['voiture']);
				(isset($_GET['id'])) ? header("Location:?route=formvoiture&id=$_GET[id]") : header("Location:?route=voiture");
			}
		} else {
			$this->voiture->save($_POST['voiture']);
			(isset($_GET['id'])) ? header("Location:?route=formvoiture&id=$_GET[id]") : header("Location:?route=voiture");
		}
	}

	function formulaire(){
		$user = $this->authentification->getUser();
		return [ 
			'title'=>'Modifier voiture',
			'contenu'=>'FormVoiture.htm.php',
			'variables' => [
				'voiture' => (isset($_GET['id'])) ? $this->voiture->findById($_GET['id']) : NULL,
				'agences' => $this->agence->find("id_agent",$user->id),
				'user' => $user
			]
		];
	}

	function afficher(){
		$user = $this->authentification->getUser();
		if (!empty($user)) {
			if(isset($_GET['affichage'])) {
				if ($_GET['affichage'] == 'false') {
					if (!isset($_GET['id'])) {
						$voiture = (isset($user->profil)) ? $this->voiture->findAll("date_ajout") :  $this->voiture->table("SELECT * FROM voiture WHERE id IN (SELECT DISTINCT l.id_voiture FROM `location` l,voiture v WHERE l.id_client=:value) ORDER BY date_ajout",['value'=>$user->id]);
					} else {
						$voiture =  $this->voiture->find('id_agence',$_GET['id'],"date_ajout");
					}
				} else {
					$voiture = (isset($user->profil)) ? $this->voiture->table("SELECT * FROM `voiture` WHERE id_agence in (SELECT a.id FROM agence a,voiture v WHERE a.id = v.id_agence AND a.id_agent = :value) ORDER BY date_ajout",['value'=>$user->id]) :$this->voiture->find('id_agence',$_GET['id'],"date_ajout");
				}
			} else {
				$voiture = (isset($user->profil)) ? $this->voiture->table("SELECT * FROM `voiture` WHERE id_agence in (SELECT a.id FROM agence a,voiture v WHERE a.id = v.id_agence AND a.id_agent = :value) ORDER BY date_ajout",['value'=>$user->id]) : $this->voiture->table("SELECT * FROM voiture WHERE id IN (SELECT DISTINCT l.id_voiture FROM `location` l,voiture v WHERE l.id_client=:value) ORDER BY date_ajout",['value'=>$user->id]);
			}
		} else {
			$voiture = $this->voiture->find('id_agence',$_GET['id'],"date_ajout");
		}
		
		return [ 
			'title'=>'Voiture',
			'contenu'=>'Voiture.htm.php',
			'variables' => [
				'agence' => (isset($_GET['id'])) ? $this->agence->findById($_GET['id']) : NULL,
				'voitures' => $voiture,
				'agences' =>$this->agence->findAll(),
				'user' => $user
			]
		];
	}


	function rechercher(){
		$voitures = $_POST['voiture'];
		$voiture = [];
		foreach ($voitures as $key => $value) {
			if ($value != "") {
				$voiture[$key] = strtolower($value);
			}
		}
		if (empty($voiture)) header("Location:?route=voiture&id=$_GET[id]");
		return [ 
			'title'=>'Voiture',
			'contenu'=>'Voiture.htm.php',
			'variables' => [
				'agence' => $this->agence->findById($_GET['id']),
				'voitures' =>$this->voiture->search($voiture,"AND","date_ajout"),
				'user'=> $this->authentification->getUser()
			]
		];
	}
}
?>