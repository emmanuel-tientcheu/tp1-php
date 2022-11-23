
<?php

/**********************************************
 * Projet : Projet ICT305
 * code php : connexion.inc.php
 **********************************************
 * Auteur : TIENTCHEU TCHOKOUATOU EMMANUEL
 * E-mail : <tientcheutchokouatoue@gmail.com>
 ***********************************************
 * Date de création : 14-11-2022
 * Dernière modification : 19-11-2022
 ***********************************************
 * Historique des modifications 
 * 14-11-2022 ': connexion a la base de donne
 *               ict4d
 **********************************************/
    $servername = 'localhost';
    $username = 'admin';
    $password = 'mdp';
    $dbname = 'ict4d';
    $conn = null;
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    } catch (PDOException $e) {
        echo "Erreur: ".$e->getMessage();
        $conn = null;
    }
?>