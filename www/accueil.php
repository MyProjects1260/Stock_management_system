<?php 
session_start();
if(isset($_SESSION['login'])){

 ?>
<html>
<center> <font color="red"> <h2> <?php echo "Bonjour " . $_SESSION['login']; } ?> </h2> </center> </font>
</html>


<html>
<head>
<style>

body {
  background-color: #E0FFFF;
  }

table {
 width: 100%;
 border-collapse: collapse;
 height: 550px;

}

th {
background-color: Teal;
color: white;
}

tr:nth-child(even) {background-color: #FFE4C4;}

</style>
</head>
<body> 
<table border=2 align=center >
  <tr>
    <th><h1> <strong> <center> Stock </h1> </th>
    <th><h1> <strong> <center>Achats </h1> </th>
    <th><h1> <strong> <center>Ventes </h1> </th>
  </tr>
  <tr>
    <td> <h2> <center><a href="consulterstock.php"><font color="Black"> Consulter stock </font> </a> </h2></td> 
    <td><h2><center><a href="consulterachats.php"><font color="Black"> Consulter achats </font></a> </a> </h2></td> 
    <td> <h2><center><a href="consulterventes.php"><font color="Black"> Consulter ventes </font></a> </h2></td>
  </tr>
  <tr>  
    <td> <h2> <center><a href="ajouterstock.php"><font color="Black"> Ajouter au stock </font></a> </h2> </td> 
    <td><h2><center><a href="ajouterachats.php"><font color="Black"> Ajouter aux achats </font></a> </h2> </td> 
    <td><h2><center><a href="ajoutervente.php"><font color="Black"> Ajouter aux ventes </font></a> </h2> </td>
  </tr>  
 </tr>
</table> 
<br>
<br>

<center> <strong> <h3> <a href="deconnexion.php"> <font color="red"> Se deconnecter </font> </strong> </center></a> </h3>

</body>
</html>