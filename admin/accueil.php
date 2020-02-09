<?php require_once('../partials/header.php'); ?>
<?php require_once('../connexion.php'); 
if($connect){
    $sql = "SELECT * FROM chambre";
    $res = mysqli_prepare($connect, $sql);
    $exe = mysqli_stmt_execute($res);
    //var_dump($exe);
}

?>



<h2 class="text-center font-weight-bold">BIENVENUE AU PARADIS</h2>

<p class="text-center font-weight-bold"><i>PARADISE RESORT</i> est un resort de luxe où on peut s'évader dans une nature généreuse.</p>
<br>
<p class="text-center"> Situé dans l'atole de Baa, à 35 minutes de l'aéroport de Malé en hydravion, l'Anantara Kihavah vous propose des villas de luxe, dotées de piscines privées et parfaitement intégrées à leur environnement naturel. Posées sur la plage ou installées sur pilotis au-dessus du lagon scintillant, elles sont soigneusement décorées dans un style contemporain. Petits et grands apprécieront les nombreuses activités qui leur seront proposées. Pendant que les enfants s'amuseront au Kids Club, les parents pourront profiter d'une pause bien-être mémorable à l'Anantara Spa. Côté cuisine, vous pourrez varier les plaisirs culinaires dans les différents restaurants de l'hôtel, notamment au Sea, situé sous l'eau ! </p>
<hr>
<h3 class="text-center">Nos solutions d'hébergement</h3>
<div class="row">

    <?php 
        if($exe){
            mysqli_stmt_bind_result($res, $numChambre, $prix, $nbLits, $nbPers, $confort, $image, $description);
            while(mysqli_stmt_fetch($res)){
        
        ?>
  <div class="card col-4" style="width: 18rem; "> 
 <img class="card-img-top mt-2 p-1 img-thumbnail" src="../images/<?php echo $image;  ?> " alt="Card image cap">
  <div class="card-body">
    <h3 class="card-title text-right font-weight-bold"><?php echo $confort; ?></h3>
    <p class="card-text text-right"> <?php echo $nbPers; ?> personnes</p>
  </div>
  <div class="card-body text-right font-weight-bold">
    <a href="detailChambre.php?numChambre=<?=$numChambre;?>" class="card-link">Détails</a>
  </div>
  </div>
     
     <?php  
      }
    }
    ?>
 </div>
<br>
<hr>



<?php require_once('../partials/footer.php'); ?>