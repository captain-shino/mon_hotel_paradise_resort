<?php require_once("header.php") ?>

<?php 

$base = mysqli_connect("127.0.0.1","root","","clouds");

if($base){

    $sql_chambre_reserver = "SELECT num_chambre FROM reservation WHERE num_chambre = ? ";

    $resultat_chambre_reserver = mysqli_prepare($base,$sql_chambre_reserver);

    $ok_chambre_reserver = mysqli_stmt_bind_param($resultat_chambre_reserver,"i",$num_chambre_reserver);

    $num_chambre_reserver = $_GET['id'];

    $ok_chambre_reserver = mysqli_stmt_execute($resultat_chambre_reserver);

    if($ok_chambre_reserver){
        $ok_chambre_reserver = mysqli_stmt_bind_result ($resultat_chambre_reserver, $num_chambre_reservation);
        if(mysqli_stmt_fetch($resultat_chambre_reserver)){
            
        }

    } 
}

?>

<?php

//CONNEXION A LA BASE DE DONNEES

$base = mysqli_connect("127.0.0.1","root","","clouds");

$num_chambre = $_GET['id'];
$num_chambre_reserver;

if($num_chambre != $num_chambre_reservation){
    echo "Connexion réussie.<br>";
    echo "Information sur le serveur : ".mysqli_get_host_info($base)."<br>";

    if(isset($_POST['soumis']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['telephone']) && !empty($_POST['adresse']) && !empty($_POST['date_arrivee']) && !empty($_POST['date_depart']) ){

        $sql = "INSERT INTO client (nom,prenom,telephone,adresse) VALUES (?,?,?,?)";
    
        //PREPARATION DE LA REQUETE
    
        $resultat = mysqli_prepare($base,$sql);
    
        //LIAISON DES PARAMETRES
    
        $ok = mysqli_stmt_bind_param($resultat,'ssss',$nom,$prenom,$telephone,$adresse);
    
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $telephone = $_POST['telephone'];
        $adresse = $_POST['adresse'];
    
        //EXECUTION DE LA REQUETE
    
        $ok = mysqli_stmt_execute($resultat);
    
        if($ok){
            echo "Le client a été ajouté a la base de donnée.<br>";
        } else {
            echo "Echec de l'execution de la requête.<br>";
        }

        //FERMETURE DE LA REQUETE
    
        mysqli_stmt_close($resultat);

    
        //NOUVELLE REQUETE

        $sql_client = "SELECT num_client FROM client WHERE nom = ? AND prenom = ? AND adresse = ? AND telephone = ?";

        // PREPARATION DE LA REQUETE 

        $resultat_client = mysqli_prepare($base, $sql_client);

        //LIAISON DES PARAMETRES 

        $ok_client = mysqli_stmt_bind_param ($resultat_client,"ssss",$nom,$prenom,$adresse,$telephone);

        //EXECUTION DE LA REQUETE 

        $ok_client = mysqli_stmt_execute($resultat_client);

        if($ok_client){
            // ASSOCIATION DES VARIABLES DE RESULTAT 
            $ok_client = mysqli_stmt_bind_result($resultat_client,$num_client);

            //LECTURE DES VALEURS

            if(mysqli_stmt_fetch($resultat_client)){
                echo "Le client sélectionné est : ".$num_client."<br>" ; 
            }
        } else {
            echo "Echec de l'exécution de la requête.<br>";
        }

        mysqli_stmt_close($resultat_client);

        $sql_reservation = "INSERT INTO reservation (num_client,num_chambre,date_arrivee,date_depart) VALUES (?,?,?,?)";

        //PREPARATION DE LA REQUETE 

        $resultat_reservation = mysqli_prepare($base,$sql_reservation);

        //LIAISON DES PARAMETRES 

        $ok_reservation = mysqli_stmt_bind_param($resultat_reservation,"iiss",$num_client,$num_chambre,$date_arrivee,$date_depart);

        $date_arrivee = $_POST['date_arrivee'];
        $date_depart = $_POST['date_depart'];
        $num_chambre = $_GET['id'];

        //EXECUTION DE LA REQUETE

        $ok_reservation = mysqli_stmt_execute($resultat_reservation);

        if($ok_reservation){
            echo "La réservation a été ajoutée à la base de données.<br>";
        } else {
            echo "Echec lors de l'ajout de la réservation.<br>";
        }
        
        if(mysqli_close($base)){
            echo "Deconnexion réussie.<br>";
        }
        else{
            echo "Echec de la deconnexion.";
        }
    }

    else{
        echo "Veuillez remplir tout les champs.<br>";
    }

    


}

else {
    
    echo "<h1 class='text-danger'>Réservation impossible : La chambre est déjà réserver</h1><br>";
}

?>

<?php

if($num_chambre != $num_chambre_reservation){ ?>



<h1 class="text-center">Réservation</h1>

<br>

<form method="POST" action="">
  <div class="row">
    <div class="col">
    <label for="nom">Nom</label>
      <input type="text" class="form-control" id="nom" placeholder="Entrez votre nom" name="nom">
    </div>
    <div class="col">
        <label for="prenom">Prenom</label>
      <input type="text" class="form-control" placeholder="Entrez votre prenom" name="prenom" id="prenom">
    </div>
  </div>
<br>
  <div class="row">
    <div class="col-8">
    <label for="adresse">Adresse</label>
      <input type="text" class="form-control" id="nom" placeholder="Entrez votre adresse" name="adresse">
    </div>
    <div class="col-4">
        <label for="telephone">Telephone</label>
      <input type="text" class="form-control" placeholder="Entrez votre numero de telephone" name="telephone" id="telephone">
    </div>
  </div>
<br>
    <div class="row">
        <div class="col"> 
            <label for="date_arrivee">Date d'arrivée</label>
            <input type="text" id="date_arrivee" class="form-control date" name="date_arrivee">
        </div>
        <div class="col">
            <label for="date_depart">Date de départ</label>
            <input type="text" id="date_depart" class="form-control date" name="date_depart">
        </div>
    </div>

<br>

        <div class="offset-10">
            <button class="btn-lg btn-primary text-white" name="soumis" type="submit">
                Enregistrez
            </button>
        </div>
  
</form>

<?php }?>

<div class="offset-10">
            <button class="btn btn-primary" >
                <a href="accueil.php" class="text-white">Retour</a>
            </button>
</div>

<?php require_once("footer.php") ?>