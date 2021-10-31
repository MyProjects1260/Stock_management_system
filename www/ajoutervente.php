<html>
  <head>
    <title>Ajout aux ventes</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="designform.css">

  </head>
  <body>
  <div class="login-box">
  <h2>Ajout aux ventes</h2>
  <form action="" method="post"> 
    <div class="user-box">
      <input type="text" name="reference" required="">
      <label>Reference</label>
    </div>
    <div class="user-box">
      <input type="text" name="description" required="">
      <label>Description</label>
    </div>
    <div class="user-box">
      <input type="text" name="quantite" required="">
      <label>Quantité</label>
    </div>
    <div class="user-box">
      <input type="text" name="prix" required="">
      <label>Prix hors taxe</label>
    </div>
    <div class="user-box">
      <input type="text" name="prixttc" required="">
      <label>Prix ttc</label>
    </div>
    <div class="wrap">
    <button class="button" type="submit" name="valider" href="/">Valider</button>
    </div>

    <center> <h3> <strong> <a href="accueil.php"> Retour </a> </strong> </h3> </center>


 </form> 
</div>
  </body>
</html>

<?php

$bdd=new PDO("sqlite:..\database.db");
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

if(isset($_POST['valider'])){


    $reference = $_POST['reference'];
    $description = $_POST['description'];
    $quantite=$_POST['quantite'];
    $prix = $_POST['prix'];
    $prixttc = $_POST['prixttc'];


$requete = $bdd->prepare('INSERT INTO vente(ref_vente, description_vente, quantite_vente, prix_vente_hors_tax, prix_vente_ttc)
 VALUES(:ref_vente, :description_vente , :quantite_vente, :prix_vente_hors_tax, :prix_vente_ttc)');
$requete->execute(array(
	'ref_vente' => $reference,
  'description_vente' => $description,
  'quantite_vente' =>$quantite,
    'prix_vente_hors_tax' => $prix,
    'prix_vente_ttc' => $prixttc
    ));



    if($requete){
      
      $bdd->exec('PRAGMA foreign_keys = ON');
    
    $query = $bdd->exec("UPDATE stock 
                      SET quantite =  quantite- '$quantite'
                      WHERE reference = '$reference'");

      ?>
      
      <html>
      <body>
      <script type="text/javascript">
      alert("Ajout réussi");
      </script>
      </body>
      </html>
      
      <?php 
      }
    }
      ?>



 