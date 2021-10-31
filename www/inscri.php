<?php 

if(isset($_POST['submit'])){

if(!empty($_POST['login']) && !empty($_POST['mdp1']) && !empty($_POST['mdp2'])){
    $login = $_POST['login'];
    $mdp1 = $_POST['mdp1'];
    $mdp2 = $_POST['mdp2'];

    if ($mdp1 !== $mdp2) 
			{ 
        ?>
<html>
<body>
<script type="text/javascript">
alert("Mot de passe non identique");
window.location.replace('inscription.php');
</script>
</body>
</html>

<?php 
        	}else {

      
 $bdd=new PDO("sqlite:..\database.db");
 $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 


$stmt=$bdd->prepare("SELECT log_in FROM administrateur WHERE log_in=:log_in");
$stmt->execute(array(
	'log_in' => $login));
$user=$stmt->fetch();

if($user){

	?>

	<html>
	<body>
	<script type="text/javascript">
	alert("login existe deja");
	window.location.replace('inscription.php');
	</script>
	</body>
	</html>

	<?php

}else {



$req = $bdd->prepare('INSERT INTO administrateur(log_in, mdp) VALUES(:log_in, :mdp)');
$req->execute(array(
	'log_in' => $login,
	'mdp' => $mdp1
	));

?>
<html>
<body>
<script type="text/javascript">
alert("Compte crée");
window.location.replace('index.php');
</script>
</body>
</html>

<?php

}
}

}
}


?>