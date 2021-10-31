<?php

$bdd=new PDO("sqlite:..\database.db");
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

if(isset($_GET['reference'])){
$ref = $_GET['reference'];


$requete = $bdd->query("DELETE FROM stock WHERE reference=$ref" );
}
  
header('Location:consulterstock.php');
?>