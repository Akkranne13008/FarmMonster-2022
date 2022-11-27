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

$insertUser=$bdd->exec("UPDATE Utilisateur SET Bois=Bois - 100, Plante=Plante - 50, Gem=Gem-25 WHERE Pseudo='$pseudo'");
$insertUser=$bdd->exec("UPDATE Utilisateur SET Gold=Gold + 2 WHERE Pseudo='$pseudo'");
header('Location: shop.php');
?>