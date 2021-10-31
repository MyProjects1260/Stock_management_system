<?php 
session_start();


if(isset($_POST['submit'])){

    $login = $_POST['login'];
    $mdp = $_POST['mdp1'];


    $bdd=new PDO("sqlite:..\database.db");
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    
$req = $bdd->prepare('SELECT log_in, mdp FROM administrateur WHERE log_in = :log_in AND mdp = :mdp');
$req->execute(array(
    'log_in' => $login,
    'mdp' => $mdp
  ));
$resultat = $req->fetch();

if($resultat){

$_SESSION['login']=$login;
$_SESSION['mdp']=$mdp;

?>
<html>
<body>
<script type="text/javascript">
alert("Connexion réussie");
window.location.replace('accueil.php');
</script>
</body>
</html>


<?php

}else {

  ?>
  
  <html>
  <body>
  <script type="text/javascript">
  alert("Login ou mot de passe incorrect");
  window.location.replace('index.php');
  </script>
  </body>
  </html>

<?php
}
}
?>