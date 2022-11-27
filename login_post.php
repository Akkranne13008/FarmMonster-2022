
<?php
session_start();
if(isset($_POST['pseudo']) && isset($_POST['password']))
{
   $hote = 'mysql-farmmonster.alwaysdata.net';
   $utilisateur = '290423';
   $mdp = '';
   $nombdd = 'farmmonster_bdd';
   $bdd = new PDO("mysql:host=$hote;dbname=$nombdd", $utilisateur, $mdp);

      $pseudo = $_POST['pseudo']; 
      $password = $_POST['password'];

      
         if($pseudo !== "" && $password !== ""){
         $requete = $bdd->prepare("SELECT count(*), id FROM Utilisateur WHERE Pseudo = ? AND Password = ?");
         $requete->bindParam(1, $pseudo);
         $requete->bindParam(2, $password);

         $requete->execute();
         $reponse = $requete->fetch(PDO::FETCH_ASSOC);
         $count = $reponse['count(*)'];
         if($count!=0) 
         {  
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['id'] = $reponse['id'];
            $_SESSION['acces'] = 1;
            header('Location: profil.php');
         }
         else
         {
            header('Location: login.php');
         }
      }
   }
else
{
   header('Location: login.php');
}
?>
