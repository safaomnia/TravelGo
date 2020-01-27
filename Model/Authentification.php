<?php
class Authentification {

	public function __construct(DatabaseTable $utilisateur,DatabaseTable $client, $login, $mdp) {
		session_start();
		$this->client = $client;
		$this->utilisateur = $utilisateur;
		$this->login = $login;
		$this->mdp = $mdp;
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

	public function login($username, $password, $table) {
		$user = $this->$table->find($this->login, $username);
		if (!empty($user) && $password === $user[0]->{$this->mdp}) {
			session_regenerate_id();
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['table'] = $table;
			return true;
		} else {
			return false;
		}
	}

	public function isLoggedIn() {
		if (empty($_SESSION['username'])) {
			return false;
		}
		if (isset($_SESSION['table'])) {
			$table = $_SESSION['table'];
		} else {
			$table = 'client';
		}
		$user = $this->$table->find($this->login, strtolower($_SESSION['username']));

		if (!empty($user) && $user[0]->{$this->mdp} === $_SESSION['password']) {
			return true;
		}
		else {
			return false;
		}
	}
	
	public function getUser() {
		if ($this->isLoggedIn()) {
			$table = $_SESSION['table'];
			return $this->$table->find($this->login, strtolower($_SESSION['username']))[0];
		}
		else {
			return false;
		}
	}

	public function checkFile($target_dir,$type = NULL)
	{
		$file = rand(1000,100000)."-".basename($_FILES["fileToUpload"]["name"]);
		$new_file_name = strtolower($file);
		$final_file=str_replace(' ','-',$new_file_name);
		$target_file = $target_dir . $final_file;
		$file_loc = $_FILES['fileToUpload']['tmp_name'];
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

		if ($type == "image") {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		    if($check !== false) {
		        return ['upload'=>true,"message"=>"File is an image - $check[mime]. ","loc"=>$file_loc,"target"=>$target_file,"final"=>$final_file];
		    } else {
		        return ['upload'=>false,"message"=>"File n'est pas image.","loc"=>$file_loc,"target"=>$target_file,"final"=>$final_file];
		    }
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    return ['upload'=>false,"message"=>"Seulement extension: JPG, JPEG, PNG & GIF.","loc"=>$file_loc,"target"=>$target_file,"final"=>$final_file];
			}
			
			if ($_FILES["fileToUpload"]["size"] > 50000000) {
			    return ['upload'=>false,"message"=>"File très volumineuse.","loc"=>$file_loc,"target"=>$target_file,"final"=>$final_file];
			}
		} elseif ($type == "PDF") {
			if($imageFileType != "pdf" ) {
			    return ['upload'=>false,"message"=>"Seulement extension: PDF.","loc"=>$file_loc,"target"=>$target_file,"final"=>$final_file];
			} else {
				 return ['upload'=>true,"message"=>"","loc"=>$file_loc,"target"=>$target_file,"final"=>$final_file];
			}
		} else {
			return ['upload'=>true,"message"=>"","loc"=>$file_loc,"target"=>$target_file,"final"=>$final_file];
		}
	}

	public function mail($fields)
	{
		require_once 'phpmailer/PHPMailerAutoload.php';
		require_once 'phpmailer/class.smtp.php';

		//go to the setting security account gmail and active 
		//Paramètre "Autoriser les applications moins sécurisées" activé
		
		$m = new PHPMailer;
		$m->SMTPDebug = 3;
		$m->CharSet = 'UTF-8';
		$m->isSMTP();
		$m->SMTPAuth = true;
		$m->SMTPtype = 'LOGIN';
		$m->Host = 'smtp.gmail.com';
		$m->Username = 'soulisafa47@gmail.com';
		$m->Password = 'safa07984394';
		$m->SMTPSecure = 'ssl';
		$m->Port = 465;
		$m->setFrom($fields['from'],$fields['fromName']);
		$m->addAddress($fields['to']);
		$m->Subject = $fields['subject'];
		$m->Body = $fields['message'];
		return $m->send();
	}
}