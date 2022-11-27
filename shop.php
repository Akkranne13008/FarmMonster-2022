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
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="index.css" rel="stylesheet" />
    <title>Profil - FarmMonster</title>
</head>
<body>
    
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

<div class="wrapper">
    <div class="sidebar">
        <h2>Farm Monster</h2>
        <ul>
        <li><a href="index.php"><i class="fas fa-home"></i>Accueil</a></li>
        <?php
            if($reponse['Perm_World'] == 0 ) {
                echo'            
                <li><a href="world.php"><i class="fas fa-globe-europe"></i>Monde 1</a></li>
                ';
                } 
            elseif($reponse['Perm_World'] == 1 ) {
                echo'            
                <li><a href="world2.php"><i class="fas fa-globe-europe"></i>Monde 2</a></li>
                ';
                } 
                elseif($reponse['Perm_World'] == 2 ) 
                {
                    echo'
                    <li><a href="world3.php"><i class="fas fa-globe-europe"></i>Monde 3</a></li>
                    ';
                }
                elseif($reponse['Perm_World'] == 3 ) 
                {
                    echo'
                    <li><a href="world4.php"><i class="fas fa-globe-europe"></i>Monde 4</a></li>
                    ';
                }
            ?>            <li><a href="shop.php"><i class="fas fa-shopping-cart"></i>Magasin</a></li>
            <li><a href="leaderboard.php"><i class="fas fa-trophy"></i>Leaderboard</a></li>
            <?php 
            if(!isset($_SESSION['id'])) {
            echo'            
            <li><a href="login.php"><i class="fas fa-user-plus"></i>Connexion</a></li>
            <li><a href="signup.php"><i class="fas fa-sign-in-alt"></i>Inscription</a></li>
            ';
            } 
            else
            {
                echo'
                <li><a href="profil.php"><i class="fas fa-user-alt"></i>Profil</a></li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Deconnexion</a></li>
                ';
            }

            ?>
        </ul> 
    </div>
    <div class="main_content">
        <div class="header">Farm Monster c'est quoi ?</div>  
        <div class="info">

          <div>Profil : <?php print_r($reponse['Pseudo']) ?> </div>
          <div>Ressources</div>
          <div><?php print_r($reponse['Gold']) ?> <i class="fas fa-coins" style="color:#ff8000"></i></div>
          <div><?php print_r($reponse['Bois']) ?> <i class="fas fa-tree" style="color:#966F33"></i></div>
          <div><?php print_r($reponse['Plante']) ?> <i class="fas fa-seedling" style="color:#046307"></i></div>
          <div><?php print_r($reponse['Gem']) ?> <i class="fas fa-gem" style="color:#52aef8"></i></div>
            
          <?php
          if ($reponse['Bois'] >= 100)
          if ($reponse['Plante'] >= 50)
          if ($reponse['Gem'] >= 25){
           echo'
           <p>100 Bois + 50 Feuille + 25 Gems = 2 Gold</p>
           <br>
           <div>100 <i class="fas fa-tree" style="color:#966F33"></i></div>
           <div>50 <i class="fas fa-seedling" style="color:#046307"></i></div>
           <div>25 <i class="fas fa-gem" style="color:#52aef8"></i></div>
           <form action="sell.php" method="post">	
           <button class="submit">Vendre</button>
           </form>
           ';
          }
          ?>
           <?php
          if ($reponse['Bois'] >= 1000)
          if ($reponse['Plante'] >= 500)
          if ($reponse['Gem'] >= 250){
           echo'
           <p>1000 Bois + 500 Feuille + 250 Gems = 20 Gold</p>
           <br>
           <div>1000 <i class="fas fa-tree" style="color:#966F33"></i></div>
           <div>500 <i class="fas fa-seedling" style="color:#046307"></i></div>
           <div>250 <i class="fas fa-gem" style="color:#52aef8"></i></div>
           <form action="sell20.php" method="post">	
           <button class="submit">Vendre x10</button>
           </form>
           ';
          }
          ?>
</body>
</html>