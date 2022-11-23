<?php

    session_unset();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST)){
             require('connexion.inc.php');
             extract($_POST);

             if(isset($matricule) && isset($mdp) && $conn!=null){

                $crypt = md5($mdp);
                echo $crypt;
                $sql = $conn ->prepare("SELECT * FROM etudiants WHERE matricule = '$matricule' AND secret = '$crypt'");
                $sql->execute();

                $verification = $sql->fetch();
                if($verification){
                    echo "bienvenu ";
                    $verification[3] = "M" ?  print "MR " : print "Mme ";
                    echo $verification[1]." ".$verification[2];

                    $message = "bienvenu ";
                    $message .=  $verification[3] = "M" ?  "MR " :  "Mme ";
                    $message .= $verification[1]." ".$verification[2];

                    echo $message;

                    $ip = $_SERVER["REMOTE_ADDR"];
                    $date = date('d-m-y h:i:s');

                    //raison
                    $sql = "INSERT INTO journal(adresse,date,matricule,statut,raison)
                            VALUES('$ip','$date','$matricule','Succès',' ')";
                    $conn->exec($sql);
                    
                    /********************************************************/
                    session_start();
                    $_SESSION['matricule'] = $matricule;
                    $_SESSION['message'] = $message;

                    header("Location: acceuil.php");

                    /********************************************************/


                }else{
                   echo "echec de l'authentification ";
                   $sql1 = $conn->prepare("SELECT * FROM etudiants WHERE secret = '$crypt'");
                   $sql2 = $conn ->prepare("SELECT * FROM etudiants WHERE matricule = '$matricule'");

                   $sql1->execute();
                   $sql2->execute();
                
                   $var1 = $sql1->fetch();
                   $var2 = $sql2->fetch();

                   if(!$var1){
                    $ip = $_SERVER["REMOTE_ADDR"];
                    $date = date('d-m-y h:i:s');

                    $sql = "INSERT INTO journal(adresse,date,matricule,statut,raison)
                            VALUES('$ip','$date','$matricule','Echec','Mot de passe érroné')";
                    $conn->exec($sql);
                    echo " le mot de passe  nexiste pas ";
                   }

                   if(!$var2){

                    $ip = $_SERVER["REMOTE_ADDR"];
                    $date = date('d-m-y h:i:s');

                    $sql = "INSERT INTO journal(adresse,date,matricule,statut,raison)
                            VALUES('$ip','$date','$matricule','Echec','Matricule incorect')";
                    $conn->exec($sql);
                    echo "le matricule n'existe pas ";
                   }
                }
             }else{
                $e->getMessage();
             }
        }
    }
?>