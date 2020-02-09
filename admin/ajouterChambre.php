<?php require_once('../partials/header.php'); ?>
<?php require_once('../connexion.php'); 


if (isset ($_POST['soumettre'])){
    $numChambre = (int) trim(addslashes(htmlentities($_POST['numChambre'])));
    $prix =(int) trim(addslashes(htmlentities($_POST['prix'])));
    $nbLits = (int) trim(addslashes(htmlentities($_POST['nbLits'])));
    $nbPersonne = trim(addslashes(htmlentities($_POST['nbPersonne'])));
    $confort =  trim(addslashes(htmlentities($_POST['confort'])));
    $image = $_FILES['image']['name'];
    //$image =  trim(addslashes(htmlentities($_POST['image'])));
    $description =  trim(addslashes(htmlentities($_POST['description'])));
    $destination = "../images/";
    move_uploaded_file($_FILES['image']['tmp_name'], $destination.$_FILES['image']['name']);

    $sql = " INSERT INTO chambre (numChambre, prix, nbLits, nbPersonne, confort, image, description) VALUES (?,?,?,?,?,?,?) ";
    $res = mysqli_prepare($connect,$sql);
    mysqli_stmt_bind_param($res,"iiiisss", $numChambre, $prix, $nbLits, $nbPersonne, $confort, $image, $description);
    $exe = mysqli_stmt_execute($res);

if($exe){
    header("location:chambre.php");
} else {
    echo "Erreur";
    }

}



?>

<h2 class="text-center">Ajouter nouvelle chambre</h2>
<form method="post" action="" enctype="multipart/form-data">
  <div class="form-group">
    <label for="numChambre">Numéro de chambre</label>
    <input type="number" class="form-control" id="numChambre" name="numChambre" placeholder="Entrer Numéro de chambre">
  </div>
  <div class="form-group">
    <label for="prix">Prix</label>
    <input type="number" class="form-control" id="prix" name="prix" placeholder="Entrer prix de la chambre">
  </div>
  <div class="form-group">
    <label for="nbLits">Nombre de lits</label>
    <input type="number" class="form-control" id="nbLits" name="nbLits"  placeholder="Entrer Nombre de lits">
  </div>
  <div class="form-group">
    <label for="nbPersonnes">Nombre de personnes</label>
    <input type="number" class="form-control" id="nbPersonne" name="nbPersonnes" placeholder="Entrer Nombre de personnes">
  </div>
  <div class="form-group">
    <label for="confort">Confort</label>
    <input type="text" class="form-control" id="confort" name="confort" placeholder="Confort de la chambre">
  </div>
  <div class="form-group">
    <label for="image">Image</label>
    <input type="file" class="form-control" id="image" name="image" placeholder="Entrer Image">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <input type="textarea"  class="form-control" rows="5" id="description" placeholder="Entrer description de la chambre" name="description">
  </div class=" form-group text-right">
  <button type="submit" class="btn btn-primary" name="soumettre">Soumettre</button>
</form>

<?php require_once('../partials/footer.php'); ?>