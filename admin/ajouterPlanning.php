<?php require_once('../partials/header.php'); ?>
<?php require_once('../connexion.php'); 


if($connect){
    $sql= 'SELECT * FROM reservation'; 
    $res = mysqli_query($connect, $sql);
}

  /*  $sql2= "SELECT * FROM chambre";
    $res2 = mysqli_prepare($connect, $sql2);
    $exe2 = mysqli_stmt_execute($res2);*/
    
 //  var_dump($exe);

   if(isset($_POST['soumettre']) && !empty($_POST['numClient']) && !empty($_POST['numChambre']) && !empty($_POST['dateArrivee']) && !empty($_POST['dateDepart'])){
    $numClient = (int)trim(addslashes(htmlentities($_POST['numClient'])));
    $numChambre = (int)trim(addslashes(htmlentities($_POST['numChambre'])));
    $dateArrivee = trim(addslashes(htmlentities($_POST['dateArrivee'])));
    $dateDepart = trim(addslashes(htmlentities($_POST['dateDepart'])));
          $sql = "INSERT INTO reservation (numClient, numChambre, dateArrivee, dateDepart ) VALUES('$numClient', '$numChambre', '$dateArrivee', '$dateDepart')";
          $res = mysqli_query($connect, $sql);
          if($res){
              header('location:planning.php');
          }else{
              echo "Echec d'insertion.";
          }
      }



?>

<div class="container">

    

        <div  class="card col-6 ">
            <div class="card-header">Ajouter une réservation</div>
            <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group ">
                            <label for="numClient">Numéro Client</label>
                            <input type="number" class="form-control" id="numClient" name="numClient" placeholder="Entrer un numéro de client">
                        </div>
                        <div class="form-group">
                            <label for="numChambre">Numéro Chambre</label>
                            <input type="number" class="form-control" id="numChambre" name="numChambre" placeholder="Entrer un numéro de chambre">
                        </div>
                        <div class="form-group">
                            <label for="dateArrivee">Date d'arrivée</label>
                            <input type="date" class="form-control" id="dateArrivee" name="dateArrivee" placeholder="Entrer la date d'arrivée">
                        </div>
                        <div class="form-group">
                            <label for="dateDepart">Date de départ</label>
                            <input type="date" class="form-control" id="dateDepart" name="dateDepart" placeholder="Entrer la date de départ">
                        </div>
                        <button type="submit" class="btn btn-primary" name="soumettre">Soumettre</button>
                    </form>
            </div>
            </div>
           
 </div>
            



<?php require_once('../partials/footer.php'); ?>