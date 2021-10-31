<?php

$bdd=new PDO("sqlite:..\database.db");
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	
if(isset($_GET['ref_vente'])){
$ref = $_GET['ref_vente'];


$requete = $bdd->query("DELETE FROM vente WHERE ref_vente=$ref" );
}
  
header('Location:consulterventes.php');
?>