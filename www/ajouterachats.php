<html>
  <head>
    <title>Ajout aux achats</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="designform.css">

  </head>
  <body>
  <div class="login-box">
  <h2>Ajout aux achats</h2>
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
      <label>Prix</label>
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


$requete = $bdd->prepare('INSERT INTO achat(ref, description_achat, quantite_achat, prix_achat) VALUES(:ref, :description_achat , :quantite_achat, :prix_achat)');
$requete->execute(array(
	'ref' => $reference,
  'description_achat' => $description,
  'quantite_achat' =>$quantite,
	'prix_achat' => $prix
    ));

    if($requete){

      $query = $bdd->exec("UPDATE stock 
      SET quantite =  quantite + '$quantite'
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