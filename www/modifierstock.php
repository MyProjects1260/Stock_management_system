<html>
  <head>
    <title>Modifier du stock</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="designform.css">

  </head>
  <body>
  <div class="login-box">
  <h2>Modifier du stock</h2>
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
  if(isset($_GET['reference'])){


    $reference=$_GET['reference'];
    $nvreference = $_POST['reference'];
    $nvdescription = $_POST['description'];
    $nvquantite=$_POST['quantite'];
    $nvprix = $_POST['prix'];


$requete = $bdd->prepare('UPDATE stock SET reference=:nvreference, description_stock=:nvdescription, quantite=:nvquantite, prix=:nvprix WHERE reference=:reference' );
$requete->execute(array(
  
  'reference' => $reference,
	'nvreference' => $nvreference,
  'nvdescription' => $nvdescription,
  'nvquantite' => $nvquantite,
  'nvprix' => $nvprix
  
    ));
    if($requete){

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