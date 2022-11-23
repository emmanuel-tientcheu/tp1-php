
<?php
/* code php : setup.php
 **********************************************
 * Auteur : TIENTCHEU TCHOKOUATOU EMMANUEL
 * E-mail : <tientcheutchokouatoue@gmail.com>
 ***********************************************
 * Date de création : 13-11-2022
 * Dernière modification : 19-11-2022
 ***********************************************
 * Historique des modifications 
 * 13-11-2022 : verfie si le formulaire a ete
 *              soumis en post si la variable
 *              global post a ete cree retire 
 *              l'espace entre les chaine soumise
 *              transforme toute la chaine en 
 *              minuscule et met en majuscule 
 *              le 1er caracter de chaque variable
 * 17-11-2022 : lecture du fichier connexion.inc.php
 *              verification de la valeur de l'objet
 *              PDO
 *              verification du matricule de 2 etudiants
 *              ajout des etudiants
 **********************************************/
       if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST)){
            extract($_POST);

            trim($nom, " ");
            $nom = strtolower($nom);
            $nom = ucwords($nom);

            trim($matricule, " ");
            $matricule = strtolower($matricule);
            $matricule = ucwords($matricule);

            trim($adresse, " ");
            $adresse = strtolower($adresse);
            $adresse = ucwords($adresse);

            trim($mdp, " ");
            $mdp = strtolower($mdp);
            $mdp = ucwords($mdp);

            trim($prenom, " ");
            $prenom = strtolower($prenom);
            $prenom = ucwords($prenom);

            trim($email, " ");
            $email = strtolower($email);
            $email= ucwords($email);

            trim($vMdp , " ");
            $vMdp = strtolower($vMdp);
            $vMdp = ucwords($vMdp);

            trim($nom, " ");

            if(!isset($nom)){
              echo "enregistrement impossible le user n'as pas de nom";
            }
            if(!isset($prenom)){
              echo "enregistrement impossible le user n'as pas de prenpm";
            }
            if(!isset($matricule)){
              echo "enregistrement impossible le user n'as pas de matricule";
            }

            echo "Nom : ".$nom ."<br/>";
            echo "Prenom : ".$prenom."<br/>";
            echo "email : $email <br/>";
            echo "Matricule : $matricule <br/>";
            echo "adresse : ".$adresse ."<br/>";
            echo "sexe : ".$sexe ."<br/>";
            echo "mot de passe : $mdp <br/>";
            echo "verification mot de passe : $vMdp <br/>";

           require('connexion.inc.php');
           if($conn != null){
          //  echo "la connexion a bien ete effectué ";
          /************************************************ */

          $crypt = md5($mdp);
          $sql = "INSERT INTO etudiants(matricule,noms,prenoms,sexe,secret,email)
                  VALUES('$matricule','$nom','$prenom','$sexe','$crypt','$email')";
          $conn->exec($sql);
            /************************************************/
            $sql =$conn->prepare("SELECT * FROM etudiants");
            $sql->execute();

            $array_Student = $sql->fetchAll(PDO::FETCH_ASSOC);
            $col = count($array_Student);

            $nom = "";
            $matricule = "";
            $next_nom = "";
            $next_matricule = "";
           
            for($i=0 ; $i<$col ; $i++){
                $nom = $array_Student[$i]['noms'];
                $matricule = $array_Student[$i]['matricule'];
              for($j=$i+1 ; $j<$col ; $j++){
                $next_nom = $array_Student[$j]['noms'];
                $next_matricule = $array_Student[$j]['matricule'];

                if($next_matricule == $matricule){
                    echo "les etudiants $nom et $next_nom ont le meme matricule qui est $matricule"."<br/>";
                }
              }
            }
            /*************************************************************/ 


            echo "tout c'est bien passé";
           }else{
            echo $e->getMessage();
           }
        }
       }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Document</title>
</head>
<body>

<nav class="navbar navbar-light ">
  <span class="navbar-brand mb-0 h1"><a href="inscription.php" class="badge badge-primary" style="color:black">Retourner au formulaire d'inscription</a></span>
  <span class="navbar-brand mb-0 h1"> <a href="index.php" class="badge badge-primary"  style="color:black">Retouner sur la page index</a></span>
</nav>

</body>
</html>

