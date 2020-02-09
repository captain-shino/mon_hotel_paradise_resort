<?php
// require_once(ROOT.'/authentification/securite.php');
require_once('../connexion.php');

if($connect){
    $sql = "DELETE FROM reservation WHERE numClient = ?";
    $res = mysqli_prepare($connect, $sql);
   mysqli_stmt_bind_param($res, 'i', $_GET['numClient']);
   $exe = mysqli_stmt_execute($res);

   if($exe){
       header('location:planning.php');
   }else{
       echo "Echec de la suppression";
   }
 

}

?>