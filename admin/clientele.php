<?php require_once('../partials/header.php'); ?>
<?php require_once('../connexion.php'); 
if($connect){
    $sql= 'SELECT * FROM client'; 
    $res = mysqli_prepare($connect, $sql);
    $exe = mysqli_stmt_execute($res);

  /*  $sql2= "SELECT * FROM chambre";
    $res2 = mysqli_prepare($connect, $sql2);
    $exe2 = mysqli_stmt_execute($res2);*/
    
   // var_dump($res);


}

?>


<br>
<h3 class="text-center">Fiche clientèle</h3>

<table class="table">
  <thead class="thead-light">
    <tr>
      <th class="text-center">Numéro client</th>
      <th class="text-center">Nom</th>
      <th class="text-center">Prénom</th>
      <th class="text-center">Téléphone</th>
      <th class="text-center">Adresse</th>
    </tr>
  </thead>
  <tbody>
  <?php
 if($exe){
    mysqli_stmt_bind_result($res, $numClient, $nom, $prenom, $telephone, $adresse);
    while(mysqli_stmt_fetch($res)){

      
      ?>
  
    <tr>
      
      <td class="text-center"><?php echo $numClient; ?></td>
      <td class="text-center"><?php echo $nom; ?></td>
      <td class="text-center"><?php echo $prenom; ?></td>
      <td class="text-center"><?php echo $telephone; ?></td>
      <td class="text-center"><?php echo $adresse; ?></td>
      
    </tr>

    <?php
    }
 }
?>

  </tbody>
</table>


<?php require_once('../partials/footer.php'); ?>