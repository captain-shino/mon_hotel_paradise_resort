<?php 
require_once('../connexion.php');
//require_once('securite.php');
if($_SESSION['user']['role'] == 1){


if(isset($_POST['soumis']) && !empty($_POST['login']) && !empty($_POST['pwd'])){
    
    $login = trim(htmlspecialchars(addslashes($_POST['login'])));
    $pass = md5(trim(htmlspecialchars(addslashes($_POST['pwd']))));
    $role = (int)trim(htmlspecialchars(addslashes($_POST['role'])));
     if($connect){
         $sql = "INSERT INTO utilisateurs (login,pass,role) VALUES ('$login', '$pass', '$role')";
         $res = mysqli_query($connect, $sql);
         if($res){
             header('location:index.php');
         }else{
             echo "Echec";
         }
     }
}
?>
<?php require_once('../partials/header.php'); ?>

<div class=" offset-3 col-6">
<div class="card">
  <div class="card-header text-center">Nouvel utilisateur</div>
  <div class="card-body">
    <form action="" method="post">
    <div class="form-group">
        <label for="login">Login:</label>
        <input type="text" class="form-control" placeholder="Entrer votre login" id="login" name="login">
    </div>
    <div class="form-group">
        <label for="pwd">Mot de passe:</label>
        <input type="password" class="form-control" placeholder="Entrer votre mot de passe" id="pwd" name="pwd">
    </div>
  
    <div class="form-group">
        <label for="role">Choisir role de l'utilisateur:</label>
        <select class="form-control" id="role" name="role">
            <option hidden>Choix</option>
            <option value="2">Réceptionniste</option>
            <option value="1">Gérant</option>
        </select>
    </div>
 

    
    <button type="submit" name="soumis" class="btn btn btn-success btn-block">Soumettre</button>
    </form>
    </div>
    </div>

</div>

<?php require_once('../partials/footer.php'); 
}else{
    header('location:index.php');
}
?>