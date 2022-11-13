<?php
 ini_set("display_errors", "1");
error_reporting(E_ALL);
session_start();  
$_SESSION["autoriser"]="oui";
if(@$_SESSION["autoriser"]!="oui"){
    header("location:essai1.php");
    exit();
}
    //////////////////////////////////////
    
    include("connexion.php");
/*     include("../executable/connexion.php");
$sql = 'SELECT * FROM user1 WHERE ';
$statement = $pdo->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ); */
/* include("../executable/connexion.php"); */
/* $id = $_GET['id'];
$sql = 'SELECT * FROM user1 WHERE id=:id';
$ins = $pdo->prepare($sql);
$ins->execute([':id' => $id ]);
$person = $ins->fetch(PDO::FETCH_OBJ); */
/* foreach($people as $person):
     $person->nom; 
    $person->prenom; 
     $person->mail; 
     $person->matricule; 
     $person->role; 
      endforeach;  */
      @$valider=$_POST["S'Inscrire"];
      @$id = $_GET['id'];
      $sql = 'SELECT * FROM user1 WHERE id=:id';
      $statement = $pdo->prepare($sql);
      $statement->execute([':id' => $id ]);
      $person = $statement->fetch(PDO::FETCH_OBJ);
/* var_dump($person);
die; */


if(isset($valider) ){
  $name = $_POST['Nom'];
  $prenom = $_POST['Prenom'];
  $Email = $_POST['Email'];
  
 
  


 
  $sql = 'UPDATE user1 SET nom=:nom, prenom=:prenom,mail =:email WHERE id=:id';
  $statement = $pdo->prepare($sql);
  if ($statement->execute([':nom'=>$name,
  ':prenom'=>$prenom,':email'=>$Email,
  ':id'=>$id])) {
   
    header("Location: PAgeadmin.php");
  }


 
} 
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <div class="container-fluid ">
        <div class="row">
          <header class="col-md-12 hautDePage">
           <h1>Inscription</h1>
          </header>
        </div>
    </div>
    <div class="container">
      <div class="row">
        <section class="col-md-12 centre">
        <?php if(!empty($message)){ ?>
		<div class="messagerr3"><?php echo $message ?></div>
		<?php } ?>


        <form method="POST" action="" id="myform" >
          <div class="col-md-6 formGauche">
              <div class="form-group">
                <label for="prenom">Nom </label><br> 
                <input type="text" name="Nom" id="nom" class="form-control"  value="<?= $person->nom; ?>">
                <div id="messagerI1"></div>
              </div>

              <div class="form-group">
                <label for="email">E-mail</label><br>
                
                <input type="email" class="form-control" name="Email" id="email" value="<?= $person->mail; ?>" autofocus>
                <div id="messagerI3"></div>
              </div>

              
        
             
             
          </div>
          <div class="col-md-6 formDroite" >
          <div class="form-group">
                <label for="prenom">Prenom </label><br>
                
                <input type="text" name="Prenom" class="form-control" id="prenom"value="<?= $person->prenom;?>"  focus>
                <div id="messagerI2"></div>
           </div>  
            
      

              <button type="submit" name="S'Inscrire" class="btn btn-secondary btn-lg bit Sinscrire">Modifier</button>


              <span class="Seconnecter"><a href="PAgeadmin.php">Annuler</a></span>
        </form>
        
        </section>
      </div>
    </div>
    <div class="container-fluid">
    <div class="row">
        <footer class="col-md-12 PiedDePge">
        </footer>
      </div>
    </div> 
    <script src="pj.js"></script>
  </body>
</html>  



























