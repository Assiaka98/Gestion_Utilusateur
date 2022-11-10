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
    
    include("../executable/connexion.php");
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
    <link rel="stylesheet" href="essai.css">
    <title>Document</title>
</head>

<body>
    <div class="page-connection-3 screen">
    <div class="desktop-8"> </div>
    <div class="overlap-group">

        


        <div class="CI_Nom">
            <form action="" method="post" id="myform">
            <input type="text" name="Nom" id="nom"  value="<?= $person->nom; ?>">
        </div>
        <div class="CI_Prenom">
            <input type="text" name="Prenom" id="prenom"value="<?= $person->prenom;?>"  focus>
        </div>
        <div class="CI_email">
            <input type="email" name="Email" id="email" value="<?= $person->mail; ?>" autofocus>
        </div>
        <div >
           
      
        </div>
        <div id="messagerI1"></div>
        <div id="messagerI2"></div>
        <div id="messagerI3"></div>
        
        <!-- <div id="messagerr3">gggggg</div> -->
        <?php if(!empty($message)){ ?>
		<div class="messagerr3"><?php echo $message ?></div>
		<?php } ?>
        <!-- <div class="rectangle-9">
            <input type="password" name="Password" id="Password">
        </div> -->
        <div class="NomI ">Nom</div>
        <div class="PrenomI ">Prenom</div>
        <div class="emailI ">Email</div>
       
        <!-- <div class="email ibmplexsans-bold-black-20px">Email</div>
        <div class="mot-de-passe ibmplexsans-bold-black-20px">Mot de passe</div> -->
        <div class="glass"></div>
        <input class="inscrire1"  type="submit" name="S'Inscrire"value="Modifier" >
        <a href="../view/essai1.php"><div class="connecter1">Annuler</div></a>
        </form>
    </div>
    </div>
</body>
<script src="../executable/pj.js"></script>
</html>