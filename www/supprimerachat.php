<?php

$bdd=new PDO("sqlite:..\database.db");
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

if(isset($_GET['ref'])){
$ref = $_GET['ref'];


$requete = $bdd->query("DELETE FROM achat WHERE ref=$ref" );
}

header('Location:consulterachats.php');
?>