<?php
 session_start();
 session_destroy();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container formulaire mt-5 w-100">
<h4 style="text-align:center">Formulaire de connection</h4>
<form action="verification.php" method="post" class="mt-2" enctype="multipart/form-data">
    <div class="row container">

    <div class="col-12 col-md-6 col-sm-12 formulaire">

    <label for="matricule">Matricule</label>
    <div class="input-group mb-3">
      <input type="text" class="form-control" id="basic-url" 
      aria-describedby="basic-addon3" name="matricule"
      required>
    </div>

    </div>

    <div  class="col-12 col-md-6 col-sm-12 formulaire">
        
    <label for="mdp">Mot de passe</label>
    <div class="input-group mb-3">
      <input type="password" class="form-control" id="basic-url" 
      aria-describedby="basic-addon3" name="mdp"
      required>
    </div>
    </div>

    </div>
    <div class="mx-4 "><button class="btn btn-primary" type="submit" value="Submit" id="submit">connexion</button></div>

</form>
</div>

<nav class="navbar navbar-light bg-light mt-5">
  <span class="navbar-brand mb-0 h1"> <a href="inscription.php" class="">Inscrivez vous ici</a></span>
</nav>
</body>
</html>