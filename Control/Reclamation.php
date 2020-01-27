<?php

class reclamation {

	function __construct($authentification,$utilisateur,$client,$reclamation){
		$this->authentification = $authentification;
		$this->utilisateur = $utilisateur;
		$this->client = $client;
		$this->reclamation = $reclamation;
	}

	function rechercher(){
		if ($_POST['reclamation'] == "") {
			header("Location:?route=reclamation");
		} else {
			$reclamation = [
				'sujet'=>$_POST['reclamation'],
				'texte'=>$_POST['reclamation']
			];
			return [ 
			'title'=>'Réclamation',
			'contenu'=>'Reclamation.htm.php',
			'variables' => [
				'reclamations'=> $this->reclamation->search($reclamation,"OR","date_ajout"),
				'clients'=> $this->client->findAll(),
				'user'=> $this->authentification->getUser()	]
			];
		}
	}


	function afficher(){
		return [ 
			'title'=>'Reclamation',
			'contenu'=>'Reclamation.htm.php',
			'variables' => [
				'reclamations'=> $this->reclamation->findAll("date_ajout"),
				'clients'=> $this->client->findAll(),
				'user'=> $this->authentification->getUser()
			]
		];
	}

	function formulaire(){
		return [ 
			'title'=>'Reclamer',
			'contenu'=>($_GET['route'] == 'reclamer') ? 'FormReclamation.htm.php' : 'RepondReclamation.htm.php',
			'variables' => [
				'clients' => $this->client->findAll(),
				'reclamation' => (isset($_GET['id'])) ? $this->reclamation->findById($_GET['id']) : NULL,
				'user' => $this->authentification->getUser()
			]
		];
	}


	function enregistrer(){
		
		$user = $this->client->findById($_POST['reclamation']['id_client']);
		$reclamation = $this->reclamation->findById($_GET['id']);

		if ($this->authentification->mail([
			'from'=>'soulisafa47@email.com',
			'fromName'=>'TravelGo',
			'to'=>$user->email,
			'subject'=>$reclamation->sujet,
			'message'=>$_POST['reclamation']['reponse']
		])){
			$_POST['reclamation']['etat'] = '1';
		    $this->reclamation->save($_POST['reclamation']);
		    header("Location:?route=repond&id=$_GET[id]&succes");
		}
	}
}
?>