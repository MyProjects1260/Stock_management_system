<?php

$bdd=new PDO("sqlite:..\database.db");
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

$req=$bdd->query('SELECT * FROM achat ');



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
    <th><h2> <strong> <center>Prix </h2> </th>
  </tr>

  <?php 

  while($donnees = $req->fetch()){

   ?>
  <tr>
  <form action="" method="post" role="form">
 <td><?php echo $donnees['ref'];?></td>
 <td><?php echo $donnees['description_achat'];?></td>
 <td><?php echo $donnees['quantite_achat'];?></td>
 <td><?php echo $donnees['prix_achat'];?></td>
 <td> <a href="modifierachat.php?ref=<?php echo $donnees['ref'];?>&quantite_achat=<?php echo $donnees['quantite_achat'];?>">Modifier </a> </td>
 <td><a href="supprimerachat.php?ref=<?php echo $donnees['ref']; ?>">Supprimer </td> 
</tr>

<?php 

}
  ?>
</table> 
<center> <h3> <strong> <a href="accueil.php"> Retour </a> </strong> </h3> </center>

</body>
</html>

