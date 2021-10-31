<?php

$bdd=new PDO("sqlite:..\database.db");
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

$req=$bdd->query('SELECT * FROM vente ');



?>

<html>
<head>
<style>
body {
  background-color: #FFB6C1;
  }
  </style>
<link rel="stylesheet" href="style.css">
</head>
<body>
<table border=2 align=center >
  <tr>
    <th><h2> <strong> <center>Reference </h2> </th>
    <th><h2> <strong> <center>Description </h2> </th>
    <th><h2> <strong> <center>Quantité </h2> </th>
    <th><h2> <strong> <center>Prix hors taxe </h2> </th>
    <th><h2> <strong> <center>Prix hors ttc </h2> </th>
  </tr>

  <?php 

  while($donnees = $req->fetch()){

   ?>
  <tr>
  <form action="" method="post" role="form">
 <td><?php echo $donnees['ref_vente'];?></td>
 <td><?php echo $donnees['description_vente'];?></td>
 <td><?php echo $donnees['quantite_vente'];?></td>
 <td><?php echo $donnees['prix_vente_hors_tax'];?></td>
 <td><?php echo $donnees['prix_vente_ttc'];?></td>
 <td> <a href="modifiervente.php?ref_vente=<?php echo $donnees['ref_vente'];?>&quantite_vente=<?php echo $donnees['quantite_vente'];?>">Modifier </a> </td>
 <td><a href="supprimervente.php?ref_vente=<?php echo $donnees['ref_vente']; ?>">Supprimer </td> 
</tr>

<?php 

}
  ?>
</table> 
<center> <h3> <strong> <a href="accueil.php"> Retour </a> </strong> </h3> </center>

</body>
</html>

