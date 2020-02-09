<?php require_once('../partials/header.php'); ?>
<?php require_once('../connexion.php');
if(isset($_GET['numChambre'])){
    $numChambre =(int)$_GET['numChambre'];

if($connect){
    $sql = "SELECT * FROM chambre WHERE numChambre = ".$numChambre;
    $res = mysqli_prepare($connect, $sql);
   // mysqli_stmt_bind_param($res, 'i', $_GET['numChambre']);
    $exe = mysqli_stmt_execute($res);
    if($exe){
        mysqli_stmt_bind_result($res, $numChambre, $prix, $nbLits, $nbPers, $confort, $image, $description);
        while(mysqli_stmt_fetch($res)){
        }
    }
}
}
?>

<h1></h1>



<div class="row ml-5">
          <div class="card m-1 ml-5" style="width:80% ">
            <img class="card-img-top" src="../images/<?php echo $image;  ?> " alt="Card image cap">
            <div class="card-body">
                <h3 class="card-title text-right font-weight-bold"><?php echo $confort; ?></h3>
                <p class="card-text text-justify"><?php echo $description; ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item text-right"> Pour <?php echo $nbPers; ?> personnes</li>
                <li class="list-group-item text-right"> La chambre contient <?php echo $nbLits; ?> lit</li>
                <li class="list-group-item text-right"> Le séjour est à <?php echo $prix; ?> Euros par nuit</li>
            </ul>
            <div class="card-body text-center">
                <a href="accueil.php" class="card-link">Retour</a>
                <a href="reserver.php?id=<?=$numChambre;?>" class="card-link">Réserver</a>
            </div>
            </div>

</div>

<br>


<?php require_once('../partials/footer.php'); ?>