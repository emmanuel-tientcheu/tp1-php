<?php
/**********************************************
 * Projet : Projet ICT305
 * code php : setup.php
 **********************************************
 * Auteur : TIENTCHEU TCHOKOUATOU EMMANUEL
 * E-mail : <tientcheutchokouatoue@gmail.com>
 ***********************************************
 * Date de création : 13-11-2022
 * Dernière modification : 19-11-2022
 ***********************************************
 * Historique des modifications 
 * 13-11-2022 : le script setup.php affiche les 
 *              modules installés 
 * 14-11-2022 ': connexion en mode root sans mot
 *               de passe 
 *               creation de la base de donnee ict4d
 *               attribution de tout les privileges
 *               crestion des tables etudiants et 
 *               journal
 **********************************************/

   $extensions = get_loaded_extensions();
   $extension_loaded = array();
   $extension_controle = ["cgi","Core","curl","pdo","date","hash","mbstring","mysqli","openss1","session","standard"];
   
   natcasesort($extensions);
   natcasesort($extension_controle);

   foreach ($extension_controle as $extension){
    if(in_array($extension,$extensions)){
        $extension_loaded[$extension] = "oui";
    }else{
        $extension_loaded[$extension] = "non";
    }
   }

   echo "<table style=\"border:2px solid block\">";
   foreach ($extension_loaded as $key => $extension){
     echo "Extension <span style=\"font-weight: bold\">$key</span> .......................$extension <br/>";
   }
   echo "</table>";
   

   $servername = 'localhost';
   $username = 'root';
   $password = '';

   try {
    $conn = new PDO("mysql:host=$servername",$username,$password);

    $sql = "CREATE DATABASE IF NOT EXISTS ict4d";
    $conn->exec($sql);
    /*************************************************/
    $sql = "CREATE USER IF NOT EXISTS'admin'@'localhost' IDENTIFIED BY 'mdp'";
    $conn->exec($sql);
    /************************************************/
    $sql = "GRANT ALL PRIVILEGES ON ict4d.* TO 'admin'@'localhost'";
    $conn->exec($sql);
    /*************************************************/
    $sql = "USE `ict4d`";
    $conn->exec($sql);

    $sql = "CREATE TABLE IF NOT EXISTS etudiants(
      matricule VARCHAR(30) ,
      noms VARCHAR(30) NOT NULL,
      prenoms VARCHAR(30) NOT NULL,
      sexe VARCHAR(5) NOT NULL,
      secret VARCHAR(255) NOT NULL,
      email VARCHAR(30) NOT NULL)";
    $conn->exec($sql);

    /************************************************/
    $sql = "CREATE TABLE IF NOT EXISTS journal(
      adresse VARCHAR(30) NOT NULL,
      date TIMESTAMP NULL,
      matricule VARCHAR(30) NOT NULL,
      statut VARCHAR(30) NOT NULL,
      raison VARCHAR(30) NOT NULL)";
    $conn->exec($sql);
   
   } catch (\PDOException $e) {
      $conn = NULL;
      echo "Erreur : ".$e->getMessage();
      exit(1);
   }
   $conn = NULL ;
?>