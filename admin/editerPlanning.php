<?php require_once('../partials/header.php'); ?>
<?php
require_once('../connexion.php');

if(isset($_POST['soumettre'])  && !empty($_POST['numClient']) && !empty($_POST['numChambre']) && !empty($_POST['dateArrivee']) &&!empty($_POST['dateDepart'])){
   // var_dump($_POST);
    if($connect){
        $numClient = (int)trim(addslashes(htmlentities($_POST['numClient'])));
        $numChambre = (int)trim(addslashes(htmlentities($_POST['numChambre'])));
        $dateArrivee = trim(addslashes(htmlentities($_POST['dateArrivee'])));
        $dateDepart = trim(addslashes(htmlentities($_POST['dateDepart'])));

        
        $sql1 = "UPDATE reservation SET dateArrivee = ? , dateDepart=?  WHERE numClient = $numClient AND numChambre = $numChambre ";
       /* $sql1 = "UPDATE reservation 
        SET numClient = ?, numChambre = ?, dateArrivee=?,dateDepart=? 
        WHERE numClient = 1 AND numChambre = 1";*/
        
        $res1 = mysqli_prepare($connect, $sql1);

        mysqli_stmt_bind_param($res1,'ss', $dateArrivee, $dateDepart);
  
        $exe1 = mysqli_stmt_execute($res1);
     


        if($res1){
    header('location:planning.php');
        }else{
    echo "Echec de la modification";
        }

    }
}

if(isset($_GET['numClient'])){
    $numClient =(int)$_GET['numClient'];
if($connect){
    $sql = "SELECT * FROM reservation WHERE numClient= ".$numClient;
    $res = mysqli_prepare($connect, $sql);

    if($res){
      //  $data = mysqli_fetch_assoc($res);
       // var_dump($res);
        $exe=mysqli_stmt_execute($res);

   // $exe = mysqli_stmt_execute($res);
   
        
    }
  
}
}



?>



<h2 class="text-center">Modification des réservations</h2>
<br>


<div class="container">
        <div  class="card col-12  " colspan="3">
            <div class="card-header">Modification des dates de réservation</div>
            <div class="card-body">
                    <form method="post" action = "" enctype="multipart/form-data">
    <?php
    if($exe){
        mysqli_stmt_bind_result($res, $numClient, $numChambre, $dateArrivee, $dateDepart);
         if(mysqli_stmt_fetch($res)){       
                       
            ?>
                        <div class="form-group ">
                            <label for="numClient">Numéro de client</label>
                            <input type="number" class="form-control" id="numClient" name="numClient" value="<?php echo $numClient; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="numChambre">Numéro de chambre</label>
                            <input type="number" class="form-control" id="numChambre" name="numChambre" value="<?php echo $numChambre; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exdateArrivee">Ancienne date d'arrivée </label>
                            <input type="text" class="form-control" id="exDateArrivee"  placeholder="<?php echo date('d/m/y', strtotime($dateArrivee)); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exdateArrivee">Ancienne date départ </label>
                            <input type="text" class="form-control" id="exDateDepart" placeholder="<?php echo date('d/m/y', strtotime($dateDepart)); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="dateArrivee">Nouvelle date d'arrivée</label>
                            <input type="date" class="form-control" id="dateArrivee" name="dateArrivee" placeholder="" >
                        </div>
                        <div class="form-group">
                            <label for="dateDepart">Nouvelle date départ</label>
                            <input type="date" class="form-control" id="dateDepart" name="dateDepart" placeholder="" >
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" name="soumettre">Soumettre</button>
                    </form>

    <?php
    mysqli_stmt_close($res);
    }
    mysqli_close($connect);
    }
        ?>


            </div>
            </div>
           
        </div>
            

<?php require_once('../partials/footer.php'); ?>