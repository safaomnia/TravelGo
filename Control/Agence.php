<?php
class agence {

	function __construct($authentification,$utilisateur,$client,$agence,$voiture){
		$this->authentification = $authentification;
		$this->utilisateur = $utilisateur;
		$this->client = $client;
		$this->agence = $agence;
		$this->voiture = $voiture;
	}

	function supprimer(){
		$sql = "DELETE agence, voiture,location,annonce
				FROM agence
				LEFT JOIN voiture ON (agence.id = voiture.id_agence)
				LEFT JOIN annonce ON (voiture.id = annonce.id_voiture)
				LEFT JOIN location ON (voiture.id = location.id_voiture)
				WHERE agence.id = :value";
		$this->agence->query($sql,['value'=>$_GET['id']]);
		header("Location:?route=agence");
	}

	function enregister(){
		$this->agence->save($_POST['agence']);
		if (isset($_GET['id'])) header("Location:?route=formagence&id=$_GET[id]");
		else header("Location:?route=agence");
	}

	function formulaire(){
		$user = $this->authentification->getUser();
		return [ 
			'title'=>'Modifier Agence',
			'contenu'=>'FormAgence.htm.php',
			'variables' => [
				'agence' => (isset($_GET['id'])) ? $this->agence->findById($_GET['id']) : NULL,
				'agences' => $this->agence->find('id_agent',$user->id,"date_ajout"),
				'user' => $user
			]
		];
	}

	function afficher(){
		$user = $this->authentification->getUser();
		if (!empty($user)) {
			if (isset($user->profil)) {
				if(isset($_GET['affichage'])) {
					if ($_GET['affichage'] == 'false') {
						$agence = $this->agence->findAll("date_ajout");
					} else {
						$agence = $this->agence->find("id_agent",$user->id,"date_ajout");
;
					}
				} else {
				$agence = $this->agence->find("id_agent",$user->id,"date_ajout");
;
				}
			} else {
				if(isset($_GET['affichage'])) {
					if ($_GET['affichage'] == 'false') {
						$agence = $this->agence->findAll("date_ajout");
					} else {
						$agence = $this->agence->table("SELECT * FROM agence WHERE id IN (SELECT DISTINCT v.id_agence FROM `location` l,agence a,voiture v WHERE l.id_client=:value AND l.id_voiture = v.id AND v.id_agence=a.id) ORDER BY date_ajout",['value'=>$user->id]);
					}
				} else {
				$agence = $this->agence->table("SELECT * FROM agence WHERE id IN (SELECT DISTINCT v.id_agence FROM `location` l,agence a,voiture v WHERE l.id_client=:value AND l.id_voiture = v.id AND v.id_agence=a.id ) ORDER BY date_ajout",['value'=>$user->id]);
				}
			}
		} else {
			$agence = $this->agence->findAll("date_ajout");
		}
		return [ 
			'title'=>'Agence,',
			'contenu'=>'Agence.htm.php',
			'variables' => [
				'agences' => $agence,
				'agents' => $this->utilisateur->findAll("date_ajout"),
				'user' => $user
			]
		];
	}


	function details(){
		return [ 
			'title'=>'Agence',
			'contenu'=>'DetailsAgence.htm.php',
			'variables' => [
				'agence' => $this->agence->findById($_GET['id']),
				'voitures' => $this->voiture->find('id_agence',$_GET['id'],"date_ajout")
			]
		];
	}

	function rechercher(){
		$agences = $_POST['agence'];
		if (isset($_POST['agence'])) {
			$agence = [];
			foreach ($agences as $key => $value) {
				if ($value != "") {
					$agence[$key] = strtolower($value);
				}
			} 
			if (empty($agence)) header("Location:?route=agence");
		}
		return [ 
			'title'=>'Agence',
			'contenu'=>'Agence.htm.php',
			'variables' => [
				'agences' =>$this->agence->search($agence,"AND","date_ajout"),
				'agents' => $this->utilisateur->findAll("date_ajout"),
				'user' => $this->authentification->getUser(),
			]
		];
	}
}
?>