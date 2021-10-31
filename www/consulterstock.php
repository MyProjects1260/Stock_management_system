<?php

$bdd=new PDO("sqlite:..\database.db");
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

$req=$bdd->query('SELECT * FROM stock ');



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
 <td><?php echo $donnees['reference'];?></td>
 <td><?php echo $donnees['description_stock'];?></td>
 <td><?php echo $donnees['quantite'];?></td>
 <td><?php echo $donnees['prix'];?></td>
 <td> <a href="modifierstock.php?reference=<?php echo $donnees['reference'];?>" > Modifier </a> </td>
 <td><a href="supprimerstock.php?reference=<?php echo $donnees['reference']; ?>" >Supprimer </td> 
</tr>

<?php 

}
  ?>

</table> 

<center> <h3> <strong> <a href="accueil.php"> Retour </a> </strong> </h3> </center>

</body>
</html>

