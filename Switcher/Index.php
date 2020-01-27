<?php 
//http://robsnotebook.com/xampp-ssl-encrypt-passwords pour le site doit être https et pour être sécurisé il doit activé votre certificat (payé)
//phpmailer et son code dans l'authentification
//https://www.udemy.com/?utm_source=adwords-brand&utm_medium=udemyads&utm_campaign=NEW-AW-PROS-Branded-Search-World-EN-ENG_._ci__._sl_ENG_._vi__._sd_All_._la_EN_._&tabei=7&utm_term=_._ag_48933380294_._ad_279519253629_._de_c_._dm__._pl__._ti_kwd-310556426868_._li_9075950_._pd__._&gclid=CjwKCAjw04vpBRB3EiwA0IieasYwU-SH15ZRLGTFIiNKLNC19u0Xbdd_FRsBbcS6qsxCM7IC5YeT9hoCe8UQAvD_BwE
//learning web
try {
	include  __DIR__ . '/Entry.php';
	include  __DIR__ . '/Route.php';
	if(isset($_GET['route'])) $route = strtolower($_GET['route']);
	else $route = "";
	$entry = new Entry($route ,$_SERVER['REQUEST_METHOD'],new Route());
	$entry->run();
}
catch (PDOException $e) {
	echo 
	'<script>
		alert("'.$e->getMessage().'")
	</script>';
} 
?>