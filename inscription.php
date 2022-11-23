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
 * 13-11-2022 : creation du formulaire avec tout 
 *              les champ requis 
 **********************************************/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="inscription.css">
    <title>Document</title>
</head>
<body>
    <div class="container formulaire mt-5 w-100">
    <h4 style="text-align:center">Formulaire d'inscription </h4>

    <form action="enregistrement.php" method="post" class="mt-2" enctype="multipart/form-data">
        <div class="row container">

            <div class="col-12 col-md-6 col-sm-12">

            <label for="nom">Matricule</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="basic-url" 
               aria-describedby="basic-addon3" name="matricule"
               required>
            </div>

            <label for="nom">Nom</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control"  
               aria-describedby="basic-addon3" name="nom"
               required>
            </div>

            <label for="nom">Adresse</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control"  
               aria-describedby="basic-addon3" name="adresse"
               required>
            </div>

            <label for="nom">Mot de passe</label>
            <div class="input-group mb-3">
              <input type="password" class="form-control" 
               aria-describedby="basic-addon3" name="mdp" id="mdp"
               required>
            </div>

            </div>


            <div class="col-12 col-md-6 col-sm-12">

            <label for="nom">Prénom</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" 
               aria-describedby="basic-addon3" name="prenom"
               required>
            </div>

            <label for="sexe">Sexe</label>
                <select class="form-select" aria-label="sexe" name="sexe">
                  <option selected>M</option>
                  <option value="F">F</option>
                </select>

            <label for="nom" class="mt-3">Email</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" 
               aria-describedby="basic-addon3" name="email"
               required>
            </div>

            <label for="nom">Valider le mot de passe</label>
            <div class="input-group mb-3">
              <input type="password" class="form-control" 
               aria-describedby="basic-addon3" name="vMdp" id="valid"
               required>
            </div>

            </div>

        </div>
        <div class="mx-4 "><button class="btn btn-primary" type="submit" value="Submit" id="submit">s'inscrire</button></div>
    </form>
    </div>
</body>
<script src="./scripts.js"></script>
</html>

