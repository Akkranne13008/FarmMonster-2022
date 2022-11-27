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
          <?php
          
          ?>
          <div>Profil : <?php print_r($reponse['Pseudo']) ?> </div>
          <div>Email : <?php print_r($reponse['Email']) ?> </div>
          <div><?php print_r($reponse['Gold']) ?> <i class="fas fa-coins" style="color:#ff8000"></i></div>
          <div><?php print_r($reponse['Bois']) ?> <i class="fas fa-tree" style="color:#966F33"></i></div>
          <div><?php print_r($reponse['Plante']) ?> <i class="fas fa-seedling" style="color:#046307"></i></div>
          <div><?php print_r($reponse['Gem']) ?> <i class="fas fa-gem" style="color:#52aef8"></i></div>
          <?php
           if($reponse['Perm_MonsterFarm'] == 0){
            echo'<form action="CreateMonsterFarm_POST.php" method="post">

            <label for="Nom">Saisir le nom de votre MonsterFarm</label>
            <br>
            <input type="text" name="nom" id="titre" placeholder="surnom">
            <input type="submit" value="Valider">
        </form>';
          }
            elseif ($reponse['Perm_MonsterFarm'] == 1)
           if($reponse['Level_FarmMonster'] == 0){
            echo'
            <br>
            <p>Surnom : '. $reponse['Name_FarmMonster']. '</p>
            <img src="images/monster/0.png">
            <p>Niveau : '. $reponse['Level_FarmMonster']. '</p>
            ';
           }
           elseif($reponse['Level_FarmMonster'] <= 5){
            echo'
            <br>
            <p>Surnom : '. $reponse['Name_FarmMonster']. '</p>
            <img src="images/monster/1.png">
            <p>Niveau : '. $reponse['Level_FarmMonster']. '</p>
            ';
           }
           elseif ($reponse['Level_FarmMonster']<= 10 ){
            echo'
            <br>
            <p>Surnom : '. $reponse['Name_FarmMonster']. '</p>
            <img src="images/monster/2.png">
            <p>Niveau : '. $reponse['Level_FarmMonster']. '</p>
            ';
           }
           elseif ($reponse['Level_FarmMonster'] <= 15){
            echo'
            <br>
            <p>Surnom : '. $reponse['Name_FarmMonster']. '</p>
            <img src="images/monster/3.png">
            <p>Niveau : '. $reponse['Level_FarmMonster']. '</p>
            ';
           }
           elseif ($reponse['Level_FarmMonster'] <= 20){
            echo'
            <br>
            <p>Surnom : '. $reponse['Name_FarmMonster']. '</p>
            <img src="images/monster/4.png">
            <p>Niveau : '. $reponse['Level_FarmMonster']. '</p>
            ';
           }
           elseif ($reponse['Level_FarmMonster'] <= 25){
            echo'
            <br>
            <p>Surnom : '. $reponse['Name_FarmMonster']. '</p>
            <img src="images/monster/5.png">
            <p>Niveau : '. $reponse['Level_FarmMonster']. '</p>
            ';
           }
           elseif ($reponse['Level_FarmMonster'] <= 30){
            echo'
            <br>
            <p>Surnom : '. $reponse['Name_FarmMonster']. '</p>
            <img src="images/monster/6.png">
            <p>Niveau : '. $reponse['Level_FarmMonster']. '</p>
            ';
           }
           elseif ($reponse['Level_FarmMonster'] <= 35){
            echo'
            <br>
            <p>Surnom : '. $reponse['Name_FarmMonster']. '</p>
            <img src="images/monster/7.png">
            <p>Niveau : '. $reponse['Level_FarmMonster']. '</p>
            ';
           }
           elseif ($reponse['Level_FarmMonster'] <= 40){
            echo'
            <br>
            <p>Surnom : '. $reponse['Name_FarmMonster']. '</p>
            <img src="images/monster/8.png">
            <p>Niveau : '. $reponse['Level_FarmMonster']. '</p>
            ';
           }
           elseif ($reponse['Level_FarmMonster'] <= 45){
            echo'
            <br>
            <p>Surnom : '. $reponse['Name_FarmMonster']. '</p>
            <img src="images/monster/9.png">
            <p>Niveau : '. $reponse['Level_FarmMonster']. '</p>
            ';
           }
           elseif ($reponse['Level_FarmMonster'] >= 45){
            echo'
            <br>
            <p>Surnom : '. $reponse['Name_FarmMonster']. '</p>
            <img src="images/monster/9.png">
            <p>Niveau : '. $reponse['Level_FarmMonster']. '</p>
            ';
           }
            ?>

           <?php

      // Level 0
           if ($reponse['Perm_MonsterFarm'] == 1)
           if($reponse['Level_FarmMonster'] >= 0){
            echo'			
            <p>Cout : 10 <i class="fas fa-coins" style="color:#ff8000"></i></p>
            ';
           }
           if($reponse['Gold'] >= 10)
           if($reponse['Perm_MonsterFarm'] == 1)
           if($reponse['Level_FarmMonster'] >= 0){
            echo'
            <form action="rankup.php" method="post">	
            <button class="submit">Améliorer</button>
            </form>
            ';
           }
           if($reponse['Gold'] >= 100)
           if($reponse['Perm_MonsterFarm'] == 1)
           if($reponse['Level_FarmMonster'] >= 0){
            echo'
            <form action="rankup10.php" method="post">	
            <button class="submit">Améliorer x10</button>
            </form>
            ';
           }
           ?>
           
<?php
 if($reponse['Perm_World'] == 0)
 if($reponse['Gold'] >= 50)
 {
    echo'
    <form action="rankupworld.php" method="post">	
    <br>
    <br>
    <p>Permet de améliorer son ile </p>
    <p>Cout : 50 <i class="fas fa-coins" style="color:#ff8000"></i></p>
    <button class="submit">Améliorer le monde</button>
    </form>
    ';
   }
?>
<?php
if($reponse['Perm_World'] == 1)
if($reponse['Gold'] >= 150)
{
   echo'
   <form action="rankupworld2.php" method="post">	
   <br>
   <br>
   <p>Permet de améliorer son ile </p>
   <p>Cout : 150 <i class="fas fa-coins" style="color:#ff8000"></i></p>
   <button class="submit">Améliorer le monde</button>
   </form>
   ';
  }
?>

      </div>
    </div>
</div>

</body>
</html>