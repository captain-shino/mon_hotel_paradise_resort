

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <style>
      body {
        font-family: 'Questrial', sans-serif;
        
      }
      head{
        color: white;
      }
    </style>
    <title>Paradise Resort</title>
</head>

<body class="container">
<header class="mb-5 ">
<br>
<div class="mt-10  ">
 <img src="../images/banner.jpg" alt="" width="100%"> </div>

 <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <a class="navbar-brand font-weight-bold" href="accueil.php">Paradise Resort</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="accueil.php">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Administration
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

          <a class="dropdown-item" href="#"></a>
          <a class="dropdown-item" href="">Connexion</a>
          <div class="dropdown-divider"></div>

          <a class="dropdown-item" href="planning.php">Planning</a>
          <a class="dropdown-item" href="clientele.php">Clients</a>
          <a class="dropdown-item" href="chambre.php">Chambres</a>
          <a class="dropdown-item" href="register.php">Enregistrer</a>
           <a class="dropdown-item" href="logout.php">Déconnexion</a>
        </div>
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Que recherchez-vous?" aria-label="Search">
      <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Recherche</button>
    </form>
  </div>
</nav>
</header>