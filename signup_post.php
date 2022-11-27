<?php
    $hote = 'mysql-farmmonster.alwaysdata.net';
    $utilisateur = '290423';
    $mdp = '';
    $nombdd = 'farmmonster_bdd';
    $bdd = new PDO("mysql:host=$hote;dbname=$nombdd", $utilisateur, $mdp);
         
        
if(!empty($_POST['pseudo']) && !empty($_POST['password'])){
    $pseudo=htmlspecialchars($_POST['pseudo']); 
    $email=htmlspecialchars($_POST['email']); 
    $prenom=htmlspecialchars($_POST['prenom']); 
    $nom=htmlspecialchars($_POST['nom']); 
    $password=htmlspecialchars($_POST['password']); 


    $moneyset = 0;



        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "L'adresse e-mail est valide";
            header("Location: signup.php");
        }
        else {
            $insertUser=$bdd->prepare("INSERT INTO Utilisateur(Pseudo,Email,Password,Gold,Bois,Plante,Gem,Perm_MonsterFarm) VALUES (?,?,?,?,?,?,?,?)");
            $insertUser->bindParam(1, $pseudo);
            $insertUser->bindParam(2, $email);
            $insertUser->bindParam(3, $password);
            $insertUser->bindParam(4,  $moneyset);
            $insertUser->bindParam(5,  $moneyset);
            $insertUser->bindParam(6,  $moneyset);
            $insertUser->bindParam(7,  $moneyset);
            $insertUser->bindParam(8,  $moneyset);
            $insertUser->execute();
            header("Location: login.php");
        }
}
else {
    header("Location: signup.php");
    echo "Problème lors de l'inscription";
}
?>