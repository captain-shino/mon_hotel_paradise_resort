<?php require_once('../partials/header.php'); ?>
<?php
require_once('../connexion.php');

if(isset($_POST['soumettre'])  && !empty($_POST['numChambre'])){

     if($connect){
        
         $numChambre = (int)trim(addslashes(htmlentities($_POST['numChambre'])));
         $prix = (int)trim(addslashes(htmlentities($_POST['prix'])));
         $nbLits = (int)trim(addslashes(htmlentities($_POST['nbLits'])));
         $nbPersonne = (int)trim(addslashes(htmlentities($_POST['nbPersonne'])));
         $confort = trim(addslashes(htmlentities($_POST['confort'])));
        // $image = trim(addslashes(htmlentities($_POST['image'])));
         $description = trim(addslashes(htmlentities($_POST['description'])));
         $image = $_FILES['image']['name'];
         $destination = '../images/';
            move_uploaded_file($_FILES['image']['tmp_name'],
            $destination.$_FILES['image']['name']);
          
            if($image == ""){
               // $sql1 = "UPDATE chambre SET numChambre = ? , prix = ?, nbLits = ?, nbPersonne = ?, confort = ?, description = ?  WHERE numChambre = '$numChambre'";
                $sql1 = "UPDATE chambre SET  prix= ?, nbLits=?, nbPersonne=?, confort=?, description=? WHERE numChambre =  $numChambre" ;
                $res1 = mysqli_prepare($connect, $sql1);
                mysqli_stmt_bind_param($res1,'iiiss', $prix, $nbLits, $nbPersonne, $confort, $description);
                $exe1 = mysqli_stmt_execute($res1);
                    if($res1){
                        header('location:chambre.php');
                        }else{
                    echo "Echec de la modification";
                        }
            }else{
                $sql1 = "UPDATE chambre SET   prix = ?, nbLits = ?, nbPersonne = ?, confort = ?, image = ?, description = ?  WHERE numChambre = $numChambre";
                $res1 = mysqli_prepare($connect, $sql1);
         mysqli_stmt_bind_param($res1,'iiisss', $prix, $nbLits, $nbPersonne, $confort, $image , $description);
   
         $exe1 = mysqli_stmt_execute($res1);
      
         if($res1){
         header('location:chambre.php');
         }else{
        echo "Echec de la modification";
         }
            }

     }
 }


if(isset($_GET['numChambre'])){
    $numChambre =(int)$_GET['numChambre'];
    if($connect){
    $sql = "SELECT * FROM chambre WHERE numChambre= ".$numChambre;
    $res = mysqli_prepare($connect, $sql);
   // var_dump($res);
    if($res){
      //  $data = mysqli_fetch_assoc($res);
       
        $exe=mysqli_stmt_execute($res);
      
   // $exe = mysqli_stmt_execute($res);
   
        
    }
  
}
}
?>

<div class="container">

    

        <div  class="card col-6 ">
            <div class="card-header">Modification de chambre</div>
            <div class="card-body">
                    <form method="post" enctype="multipart/form-data">

                    <?php 
                        if($exe){
                                     mysqli_stmt_bind_result($res, $numChambre, $prix, $nbLits, $nbPersonne, $confort, $image, $description );
                                    if(mysqli_stmt_fetch($res)){       
                       
            ?>
                        <div class="form-group ">
                            <label for="numChambre">Numéro Chambre</label>
                            <input type="number" class="form-control" id="numChambre" name="numChambre" value="<?php echo $numChambre; ?>">
                        </div>
                        <div class="form-group">
                            <label for="prix">Prix Chambre</label>
                            <input type="number" class="form-control" id="prix" name="prix" placeholder="" value="<?php echo $prix; ?>">
                        </div>
                        <div class="form-group">
                            <label for="nbLits">Nombre de lits</label>
                            <input type="number" class="form-control" id="nbLits" name="nbLits" placeholder="" value="<?php echo $nbLits; ?>">
                        </div>
                        <div class="form-group">
                            <label for="nbPersonne">Nombre de personnes</label>
                            <input type="number" class="form-control" id="nbPersonne" name="nbPersonne" placeholder="" value="<?php echo $nbPersonne; ?>">
                        </div>
                        <div class="form-group">
                            <label for="confort">Confort</label>
                            <input type="text" class="form-control" id="confort" name="confort" placeholder="" value="<?php echo $confort; ?>">
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image" placeholder="" value="<?php echo $image; ?>">
                            <img src="../images/<?php echo  $image  ?>" alt="">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="" value="<?php echo $description; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary" name="soumettre">Soumettre</button>
                    </form>
                    <?php 
  //  mysqli_stmt_close($res);
    }
  //  mysqli_close($connect);
    }
        ?>
            </div>
            </div>
           
 </div>



<?php require_once('../partials/footer.php'); ?>