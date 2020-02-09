<?php
require_once('../connexion.php');

if($connect){
    $sql = "DELETE FROM chambre WHERE numChambre = ?";
    $res = mysqli_prepare($connect, $sql);
   mysqli_stmt_bind_param($res, 'i', $_GET['numChambre']);
   $exe = mysqli_stmt_execute($res);

   if($exe){
       header('location:chambre.php');
   }else{
       echo "Echec de la suppression";
   }
 

}




?>