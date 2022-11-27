<?php
session_start();
$hote = 'mysql-farmmonster.alwaysdata.net';
$utilisateur = '290423';
$mdp = '';
$nombdd = 'farmmonster_bdd';
$bdd = new PDO("mysql:host=$hote;dbname=$nombdd", $utilisateur, $mdp);

$requete = $bdd->prepare('SELECT * FROM Utilisateur WHERE id = '.$_SESSION['id']);
$requete->execute();
$reponse = $requete->fetch(PDO::FETCH_ASSOC);  

$name = $_POST['nom']; 
$pseudo = $reponse['Pseudo']; 

$insertUser=$bdd->exec("UPDATE Utilisateur SET Bois=Bois + 300 WHERE Pseudo='$pseudo'");
header('Location: world.php');
?>