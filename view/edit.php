<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
session_start(); 
$_SESSION["autoriser"]="oui";
if(@$_SESSION["autoriser"]!="oui"){
    header("location:essai1.php");
    exit();

    //////////////////////////////////////
    
    include("../executable/connexion.php");
$id = $_GET['id'];
$sql = 'SELECT * FROM user1 WHERE id=:id';
$statement = $pdo->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['nom']) 
&& isset($_POST['prenom'])
&& isset($_POST['email']) 
) {
  $name = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $Email = $_POST['Email'];
  
 
  


 
  $sql = 'UPDATE user1 SET nom=:nom, prenom=:prenom,email =:mail WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':nom'=>$name,
  ':prenom'=>$prenom,':mail'=>$Email,
  ':id'=>$id])) {
   
    $message = 'Succès';
  }


 
}

/* 
 ?>
<?php require '../header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Modifier</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?> */
}

/* var_dump( $_SESSION["nomPrenom"]);
die;  */
include("../executable/connexion.php");
$sql = 'SELECT * FROM user1 WHERE id= id';
$statement = $pdo->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pagecssAdmin.css">
    <link rel="stylesheet" href="essai.css">
    <title>Document</title>
</head>
<body><center>
    <section>
    <div class="porteph"> </div>
    <div class="logo"><img class="logo"src="../img/pr9.webp" alt=""> </div>
  
    <div class="rechericone"><img class="edicine" src="../img/iconesea.png" alt=""></div>
    <div class="photo"><img src="<?=$_SESSION["LaPhoto"]?><" alt=""></div>

    <div class="recherchamp">
        <input class="rechechamp" type="text">
    </div>
  <a href="../executable/deconnexion.php"><div class="deconect"></div></a>  
<    <div class="tableau">

    <table class="thtable1">
   <tr  class="trtable1">
       <th>Zone de Modification</th>
       
   </tr>

  
  
</table>
    </div> -->
    <div class="rectangle-32"></div>
        <img class="rectangle-21" src="../img/pr9.webp" alt="Rectangle-2">
        <h1 class="title1 ibmplexsans-blod-black-32px">Formulaire d'inscription</h1>
        <div class="CI_Nom1">
            <form action="" method="post" id="myform">
            <input type="text" name="Nom" id="nom">
        </div>
        <div class="CI_Prenom1">
            <input type="text" name="Prenom" id="prenom" focus>
        </div>
        <div class="CI_email">
            <input type="email" name="Email" id="email" autofocus>
        </div>
        <div >
           
       
        </div>
        <div id="messagerI1"></div>
        <div id="messagerI2"></div>
        <div id="messagerI3"></div>
      
       
        <?php if(!empty($message)){ ?>
		<div class="messagerr3"><?php echo $message ?></div>
		<?php } ?>
       
        <div class="NomI ">Nom</div>
        <div class="PrenomI ">Prenom</div>
        <div class="emailI ">Email</div>
    
      <div class="op"></div>
       
        <?php if(!empty($message)){ ?>
		<div class="messagerr3"><?php echo $message ?></div>
		<?php } ?>
      
        <div class="NomI ">Nom</div>
        <div class="PrenomI ">Prenom</div>
        <div class="emailI ">Email</div>
    
      
        <div class="glass"></div>
        <input class="inscrire"  type="submit" name="S'Inscrire"value="S'Inscrire" >
      
        <input class="inscrire"  type="submit" name="S'Inscrire"value="S'Inscrire" >
        <a href="../view/essai1.php"></a>
        </form>
  
   <!--  
    <div class="paginat1"> <img class="flecheg"src="../img/fleched.png" alt=""></div>
    <div class="paginat2">page 1</div>
    <div class="paginat3"><img class="fleched" src="../img/fleched.png" alt=""></div> -->
    <div class="Nom"><?= $_SESSION["nomPrenom"] ?></div>
    <div class="Matricule"><?=$_SESSION["LeMatricule"]?></div>
    <div class="email"><?=$_SESSION["LeEmail"]?></div>
    <div class="phh1"></div>
    <div class="phh2"></div>

    </section>
    </center>
</body>
</html>