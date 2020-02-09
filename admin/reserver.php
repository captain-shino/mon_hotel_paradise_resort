<?php require_once('../partials/header.php'); ?>
<?php require_once('../connexion.php');

if($connect){

  $sql_chambre_reserver = "SELECT numChambre FROM reservation WHERE numChambre = ? ";

  $res_chambre_reserver = mysqli_prepare($connect,$sql_chambre_reserver);

  $exe_chambre_reserver = mysqli_stmt_bind_param($res_chambre_reserver,"i",$num_chambre_reserver);

  $num_chambre_reserver = $_GET['id'];

  $exe_chambre_reserver = mysqli_stmt_execute($res_chambre_reserver);

  if($exe_chambre_reserver){
      $exe_chambre_reserver = mysqli_stmt_bind_result ($res_chambre_reserver, $num_chambre_reservation);
      if(mysqli_stmt_fetch($res_chambre_reserver)){
          
      }

  } 
}

?>

<?php

//CONNEXION A LA BASE DE DONNEES

$connect = mysqli_connect("127.0.0.1","root","","mon_hotel");

$num_chambre = $_GET['id'];
$num_chambre_reserver;

if($num_chambre != $num_chambre_reservation){
 // echo "Connexion réussie.<br>";
//  echo "Information sur le serveur : ".mysqli_get_host_info($connect)."<br>";

  if(isset($_POST['soumis']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['telephone']) && !empty($_POST['adresse']) && !empty($_POST['date_arrivee']) && !empty($_POST['date_depart']) ){

      $sql = "INSERT INTO client (nom,prenom,telephone,adresse) VALUES (?,?,?,?)";
  
      //PREPARATION DE LA REQUETE
  
      $res = mysqli_prepare($connect,$sql);
  
      //LIAISON DES PARAMETRES
  
      $exe = mysqli_stmt_bind_param($res,'ssss',$nom,$prenom,$telephone,$adresse);
  
      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      $telephone = $_POST['telephone'];
      $adresse = $_POST['adresse'];
  
      //EXECUTION DE LA REQUETE
  
      $exe = mysqli_stmt_execute($res);
  
      if($exe){
          echo "Le client a été ajouté a la base de donnée.<br>";
      } else {
          echo "Echec de l'execution de la requête.<br>";
      }

      //FERMETURE DE LA REQUETE
  
      mysqli_stmt_close($res);

  
      //NOUVELLE REQUETE

      $sql_client = "SELECT num_client FROM client WHERE nom = ? AND prenom = ? AND adresse = ? AND telephone = ?";

      // PREPARATION DE LA REQUETE 

      $res_client = mysqli_prepare($connect, $sql_client);

      //LIAISON DES PARAMETRES 

      $exe_client = mysqli_stmt_bind_param ($res_client,"ssss",$nom,$prenom,$adresse,$telephone);

      //EXECUTION DE LA REQUETE 

      $exe_client = mysqli_stmt_execute($res_client);

      if($exe_client){
          // ASSOCIATION DES VARIABLES DE RESULTAT 
          $exe_client = mysqli_stmt_bind_result($res_client,$num_client);

          //LECTURE DES VALEURS

          if(mysqli_stmt_fetch($res_client)){
              echo "Le client sélectionné est : ".$num_client."<br>" ; 
          }
      } else {
          echo "Echec de l'exécution de la requête.<br>";
      }

      mysqli_stmt_close($res_client);

      $sql_reservation = "INSERT INTO reservation (num_client,num_chambre,date_arrivee,date_depart) VALUES (?,?,?,?)";

      //PREPARATION DE LA REQUETE 

      $res_reservation = mysqli_prepare($connect,$sql_reservation);

      //LIAISON DES PARAMETRES 

      $exe_reservation = mysqli_stmt_bind_param($res_reservation,"iiss",$num_client,$num_chambre,$date_arrivee,$date_depart);

      $date_arrivee = $_POST['date_arrivee'];
      $date_depart = $_POST['date_depart'];
      $num_chambre = $_GET['id'];

      //EXECUTION DE LA REQUETE

      $exe_reservation = mysqli_stmt_execute($res_reservation);

      if($exe_reservation){
          echo "La réservation a été ajoutée à la base de données.<br>";
      } else {
          echo "Echec lors de l'ajout de la réservation.<br>";
      }
      
      if(mysqli_close($connect)){
          echo "Deconnexion réussie.<br>";
      }
      else{
          echo "Echec de la deconnexion.";
      }
  }

  

  


}

else {
  
  echo "<h1 class='text-danger'>Réservation impossible : La chambre est déjà réserver</h1><br>";
}

?>

<?php

if($num_chambre != $num_chambre_reservation){ ?>






<h3 class="text-center">Nouvelle réservation</h3>
<div class="card">
  <div class="card-header text-center">Merci de remplir tous les champs</div>
  <div class="card-body">
        <form method="post" action="" enctype="multipart/form-data">
        <div class="form-row">
            <div class="col-6 mb-2">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" placeholder="Veuillez renseigner nom" name="nom">
            </div>
            <div class="col-6">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" placeholder="Veuillez renseigner votre prénom" name="prenom">
            </div>
            
            <div class="col-6 mb-2">
            <label for="tel">Téléphone</label>
            <input type="text" class="form-control" id="tel" placeholder="Veuillez renseigner votre numéro de téléphone" name="tel">
            </div>
            <div class="col-6">
            <label for="adresse">Adresse</label>
            <input type="adresse" class="form-control" placeholder="Veuillez renseigner votre adresse" name="adresse">
            </div>

            <div class="col-6 mb-2">
                <label for="dateArrivee">Date d'arrivée</label>
                <input type="date" class="form-control" id="dateArrivee" name="dateArrivee" placeholder="" >
            </div>
            <div class="col-6 mb-2">
            <label for="dateDepart">Date départ</label>
            <input type="date" class="form-control" id="dateDepart" name="dateDepart" placeholder="" >

        </div>
        <div class="card-footer text-center">
        <a href="accueil.php" class="card-link btn btn-warning">Retour</a>
        <button type="submit" class="btn btn-success" name="soumettre" >Réserver</button>
        </div>
        </form>

        <?php }?>
  </div>

</div>




<?php require_once('../partials/footer.php'); ?>