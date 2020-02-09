<?php require_once('../partials/header.php'); ?>
<?php require_once('../connexion.php'); 


if($connect){
    $sql= 'SELECT * FROM reservation'; 
    $res = mysqli_prepare($connect, $sql);
    $exe = mysqli_stmt_execute($res);

  


}

?>



<h2 class="text-center">Planning des réservations</h2>
<br>



<p class="text-right">
<a href="ajouterPlanning.php" class="btn btn-warning"><i class="fas fa-plus"></i> Ajouter </a>
</p>

<table class="table table-bordered">
  <thead>
    <tr>
      <th class="text-center">Numéro Client</th>
      <th class="text-center">Numéro Chambre</th>
      <th class="text-center">Arrivée</th>
      <th class="text-center" >Départ</th>
      <th class="text-center" colspan="3" >Actions</th>

    </tr>
  </thead>
  <tbody>
<?php
 if($exe){
    mysqli_stmt_bind_result($res, $numClient, $numChambre, $dateArrivee, $dateDepart);
    while(mysqli_stmt_fetch($res)){

      
      ?>
    <tr>
      <td class="text-center"> <?php echo $numClient; ?>  </td>
      <td class="text-center"> <?php echo $numChambre; ?>  </td>
      <td class="text-center"> <?php echo date('d/m/y', strtotime($dateArrivee)); ?> </td>
      <td class="text-center"> <?php echo date('d/m/y', strtotime($dateDepart)); ?> </td>
      <td class="text-center"><a href="editerPlanning.php?numClient=<?=$numClient;?>" class="btn btn-success" ><i class="fas fa-pen"></i></a></td>
      <td class="text-center"><a onclick="return confirm('Etes-vous sûr de vouloir supprimer ?');" class="btn btn-danger"   href="supprimerPlanning.php?numClient=<?=$numClient;?>"  ><i class="fas fa-trash"></i></a></td>
    </tr>
<?php
    }
 }
?>

  </tbody>
</table>




<?php require_once('../partials/footer.php'); ?>