<?php require_once('../partials/header.php'); ?>

<?php require_once('../connexion.php'); 
if($connect){
    

    $sql= "SELECT * FROM chambre";
    $res = mysqli_prepare($connect, $sql);
    $exe = mysqli_stmt_execute($res);
    
  // var_dump($res);
}

?>

<br>
<h2 class="text-center">Gestion des chambres</h2>
<br>
<p class="text-right">
<a href="ajouterChambre.php" class="btn btn-warning"><i class="fas fa-plus"></i> Ajouter </a>
</p>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th class="text-center">Numéro</th>
      <th class="text-center">Prix</th>
      <th class="text-center">Nombre de lits</th>
      <th class="text-center">Nombre de personnes</th>
      <th class="text-center">Confort</th>
      <th class="text-center">Image</th>
      <th class="text-center">Description</th>

    
            <th class="text-center" colspan="3">Actions</th>
    
      
    </tr>
  </thead>
  <tbody>
  <?php
 if($exe){
    mysqli_stmt_bind_result($res, $numChambre, $prix, $nbLits, $nbPersonne, $confort, $image, $description);
    while(mysqli_stmt_fetch($res)){?>
    <tr>
      <td class="text-center"> <?php echo $numChambre; ?>  </td>
      <td class="text-center"> <?php echo $prix; ?>  </td>
      <td class="text-center"> <?php echo $nbLits; ?> </td>
      <td class="text-center"> <?php echo $nbPersonne; ?> </td>
      <td class="text-center"> <?php echo $confort; ?> </td>
      <td class="text-center"> <img src="../images/<?php echo $image ?>" alt=""/  height="100"> </td>
      <td class="text-center"> <?php echo $description; ?> </td>
      <td class="text-center"><a href="editerChambre.php?numChambre=<?=$numChambre;?>" class="btn btn-success" ><i class="fas fa-pen"></i></a></td>
      <td class="text-center"><a onclick="return confirm('Etes-vous sûr de vouloir supprimer ?');" href="supprimerChambre.php?numChambre=<?=$numChambre;?>" class="btn btn-danger" ><i class="fas fa-trash"></a></td>
    </tr>
<?php
    }
 }
?>
  </tbody>
</table>


<?php require_once('../partials/footer.php'); ?>