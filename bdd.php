<?php

function connect_bdd() {
    $hote = 'mysql-farmmonster.alwaysdata.net';
    $utilisateur = '290423';
    $mdp = '';
    $nombdd = 'farmmonster_bdd';
    $bdd = new PDO("mysql:host=$hote;dbname=$nombdd", $utilisateur, $mdp);
    return $bdd;
}
?>