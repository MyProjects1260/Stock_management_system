<html>
  <head>
    <title>Modifier des ventes</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="designform.css">

  </head>
  <body>
  <div class="login-box">
  <h2>Modifier des ventes</h2>
  <form action="" method="post"> 
    <div class="user-box">
      <input type="text" name="reference"  required="">
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
  if(isset($_GET['ref_vente'])){


    $reference=$_GET['ref_vente'];
    $oldquantite=$_GET['quantite_vente'];
    $nvreference = $_POST['reference'];
    $nvdescription = $_POST['description'];
    $nvquantite=$_POST['quantite'];
    $nvprix = $_POST['prix'];
    $nvprixttc = $_POST['prixttc'];


$requete = $bdd->prepare('UPDATE vente SET ref_vente=:nvreference, description_vente=:nvdescription, quantite_vente=:nvquantite, prix_vente_hors_tax=:nvprix, prix_vente_ttc=:nvprixttc WHERE ref_vente=:ref_vente' );
$requete->execute(array(
  
  'ref_vente' => $reference,
  'nvreference' => $nvreference,
  'nvdescription' => $nvdescription,
  'nvquantite' => $nvquantite,
  'nvprix' => $nvprix,
  'nvprixttc' => $nvprixttc
  
    ));
    if($requete){
      

      $query = $bdd->exec("UPDATE stock 
                      SET quantite =  quantite -('$nvquantite' - '$oldquantite')
                      WHERE reference = '$reference'");

      ?>
      
      <html>
      <body>
      <script type="text/javascript">
      alert("Modification réussie");
      </script>
      </body>
      </html>
      
      <?php 
      }
    }
    }
      ?>