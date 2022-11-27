<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="index.css" rel="stylesheet" />
    <title>Home - FarmMonster</title>
</head>
<body>
    
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

<div class="wrapper">
    <div class="sidebar">
        <h2>Farm Monster</h2>
        <ul>
            <li><a href="index.php"><i class="fas fa-home"></i>Accueil</a></li>
            <li><a href="world.php"><i class="fas fa-globe-europe"></i>Monde</a></li>
            <li><a href="shop.php"><i class="fas fa-shopping-cart"></i>Magasin</a></li>
            <li><a href="leaderboard.php"><i class="fas fa-trophy"></i>Leaderboard</a></li>
            <li><a href="login.php"><i class="fas fa-user-plus"></i>Connexion</a></li>
            <li><a href="signup.php"><i class="fas fa-sign-in-alt"></i>Inscription</a></li>
        </ul> 
    </div>
    <div class="main_content">
        <div class="header">Farm Monster c'est quoi ?</div>  
        <div class="info">
          <div>                
          <form action="signup_post.php" method="post">						
                <h3>Inscription</h3>
						<input type="text" name="pseudo" placeholder="Pseudo">
                        <input type="email" name="email" placeholder="E-Mail">
                        <input type="password" name="password" placeholder="Mot de passe">
						<button class="submit">Inscription</button>
					</form>
            </div>
    </div>
</div>

</body>
</html>