<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
session_start(); 
if(@$_SESSION["autoriser"]!="oui"){
    header("location:essai1.php");
    exit();
}
include("../executable/connexion.php");
include("../executable/paginnation.php");
$myId=$_SESSION["Id"];
if(isset($_GET['lance'])){
    $mat=$_GET['search']; 
  
    $statement=$pdo->prepare("SELECT * from user1 WHERE nom=:nom and etat= 0");
   $statement->execute(['nom' => $mat]);
}
else{
    $sql = 'SELECT * FROM `user1` WHERE  etat=0  AND id!=:myId ORDER BY `id` DESC LIMIT :premier, :parpage;';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':premier', $premier, PDO::PARAM_INT);
    $statement->bindValue(':parpage', $parPage, PDO::PARAM_INT);
    $statement->bindValue(':myId', $myId, PDO::PARAM_INT);
    $statement->execute();
}
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pageUser.css">
    <title>Document</title>
</head>
<body><center>
   
<!--     <div class="listACT">L.Active </div>
    <div class="listACH">L.Archivé </div> -->
    <div class="modifphoto"> <input type="file" name="mdph" class="mdp"></div>
    <form action="" method="get" >
<button   name="lance" type="submit"><img class="rechericone"  class="edicine" src="../img/iconesea.png" alt=""></button>
    <div class="recherchamp">
        
        <input class="rechechamp" name="search" type="text">
    </div>
    </form>
    <div class="photo"><img class="prof" src="<?='data:image/jpg;base64,'.base64_encode($_SESSION['LaPhoto'])?>" alt=""></div>

   
  <a href="../executable/deconnexion.php"><div class="deconect"></div></a>  
    <div class="tableau">

    <table class="thtable">
   <tr  class="trtable">
       <th>Nom</th>
       <th>Prenom</th>
       <th>Email</th>
       <th>Matricule</th>
       <th>Role</th>
      <!--  <th>Action</th> -->
   </tr>

  
   <?php foreach($people as $person): ?>
          
    <tr class="tr1table">  
            <td><?= $person->nom; ?></td>
            <td><?= $person->prenom; ?></td>
            <td><?= $person->mail; ?></td>
            <td><?= $person->matricule; ?></td>
            <td><?= $person->role; ?></td>
           
           
           <!--  <td>
               <a href="edit.php?id=<--?= $person->id ?>" > <img src="../img/editer1).png" class="edid" alt="" srcset=""></a>
               <a onclick="return confirm('Etes vous sur de supprimer ce professeur')" href="delete.php?id=<--?= $person->id ?>" ><img class="edid" src="../img/fdrer.png" alt="" srcset=""></a>
              <a href="edit.php?id=<--?= $person->id ?>" > <img class="edid" src="../img/imagear.png" alt="" srcset=""></a>
              
            </td> -->
          </tr>
        <?php endforeach; ?>
   
  
</table>
    </div>
    <a class= <?= ($currentPage == 1) ? "disabled" : "paginat1"?> href="?page=<?= $currentPage - 1 ?>"> <img class="flecheg"src="../img/fleched.png" alt=""></a>
    <div class="paginat2">page <?php echo($currentPage)?></div>
    <a class=  <?= ($currentPage == $pages) ? "disabled" : "paginat3" ?> href="?page=<?= $currentPage + 1 ?>"><img class="fleched <?= ($currentPage == $pages) ? "disabled" : "" ?>" src="../img/fleched.png" ></a>
    
    <div class="Nom"><?=$_SESSION["nomPrenom"]?></div>
    <div class="Matricule"><?=$_SESSION["LeMatricule"]?></div>
    <div class="email"><?=$_SESSION["LeEmail"]?></div>
    <div class="phh1"></div>
    <div class="phh2"></div>

    
    
    </center>
</body>
</html>