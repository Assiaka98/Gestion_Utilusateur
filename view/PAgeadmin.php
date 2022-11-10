<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
session_start(); 
$_SESSION["autoriser"]="oui";
if(@$_SESSION["autoriser"]!="oui"){
    header("location:essai1.php");
    exit();
} 

   
include("../executable/connexion.php");
include("../executable/paginnation.php");


////////////////////////Afficher la liste et rechercher ////////////// 
 $myId=$_SESSION["Id"];
 /* var_dump($myId);
 die; */
if(isset($_GET['lance'])){
     $mat=$_GET['search']; 

   
     $statement=$pdo->prepare("SELECT * FROM `user1` WHERE nom=:nom and etat=0 ");
     
     $statement->execute(['nom' => $mat]);
    
}
else{
    $sql = 'SELECT * FROM `user1` WHERE  etat=0  and id!=:myId ORDER BY `id` DESC LIMIT :premier, :parpage;';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':premier', $premier, PDO::PARAM_INT);
    $statement->bindValue(':parpage', $parPage, PDO::PARAM_INT);
    $statement->bindValue(':myId', $myId, PDO::PARAM_INT);
    $statement->execute(); 
}
$people = $statement->fetchAll(PDO::FETCH_OBJ);
//************************************************* */
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pagecssAdmin.css">
    <title>Document</title>
</head>
<body>
  
    
    <a href="essai1.php?$_SESSION<?= $_SESSION["autoriser"]="oui" ?>"><div class="listACT">L.Active </div></a>
    <a href="pageArchive.php"><div class="listACH">L.Archivé </div></a>
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
       <th>Action</th>
   </tr>

  
   <?php  foreach($people as $person): ?>
          
    <tr class="tr1table">  
            <td><?= $person->nom; ?></td>
            <td><?= $person->prenom; ?></td>
            <td><?= $person->mail; ?></td>
            <td><?= $person->matricule; ?></td>
            <td><?= $person->role; ?></td>
           
           
            <td>
               <a href="dup1.php?id=<?= $person->id ?>" > <svg width='24px' height='24px' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'>
    <g fill='#494c4e' fill-rule='evenodd'>
        <path d='M18 2v2.96a1 1 0 0 1-2 0V2.5a.5.5 0 0 0-.5-.5h-13a.5.5 0 0 0-.5.5v19a.487.487 0 0 0 .49.5H15a1 1 0 0 1 0 2H2a2.006 2.006 0 0 1-2-2V2a2.006 2.006 0 0 1 2-2h14a2.006 2.006 0 0 1 2 2z'/>
        <path d='M8.006 19.037c-.187-5.117 4.134-7.848 7-8.791V10a1.993 1.993 0 0 1 1.165-1.822 2.053 2.053 0 0 1 2.084.251l5 4c.472.385.746.962.745 1.571 0 .604-.275 1.175-.749 1.55l-4.982 3.986a2 2 0 0 1-3.263-1.436 4.447 4.447 0 0 0-3.27 1.938c-.025.045-.053.09-.083.132-.385.527-1 .836-1.653.83a1.994 1.994 0 0 1-1.994-1.963zM16.7 16.28a1 1 0 0 1 .3.72v.989l5-4L17 10v1a1 1 0 0 1-.764.972c-.263.064-6.425 1.636-6.187 6.982 1.182-1.863 3.172-2.854 5.919-2.954H16a1 1 0 0 1 .7.28zm5.3-2.29V14v-.01zM12 6a1 1 0 0 1-1 1H5a1 1 0 1 1 0-2h6a1 1 0 0 1 1 1zm-6 9H5a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2zm3-4H5a1 1 0 0 1 0-2h4a1 1 0 1 1 0 2z'/>
    </g>
</svg></a>
               <a href="modifRole.php?id=<?= $person->id ?>" ><svg width='48px' height='48px' viewBox='0 0 48 48' fill='none' xmlns='http://www.w3.org/2000/svg'>
<rect width='48' height='48' fill='white' fill-opacity='0.01'/>
<path d='M18 31H38V5' stroke='black' stroke-width='4' stroke-linecap='round' stroke-linejoin='round'/>
<path d='M30 21H10V43' stroke='black' stroke-width='4' stroke-linecap='round' stroke-linejoin='round'/>
<path d='M44 11L38 5L32 11' stroke='black' stroke-width='4' stroke-linecap='round' stroke-linejoin='round'/>
<path d='M16 37L10 43L4 37' stroke='black' stroke-width='4' stroke-linecap='round' stroke-linejoin='round'/>
</svg>
</a>
              <a onclick="return confirm('Etes vous sur de supprimer ce professeur')" href="archive.php?id=<?= $person->id ?>"  > <img class="edid" src="../img/imagear.png" alt="" srcset=""></a>
              
            </td>
          </tr>
        <?php endforeach; ?>
   
  
</table>
    </div>
    
        <div class="opa">
            
        </div>
		
    <a class= <?= ($currentPage == 1) ? "disabled" : "paginat1"?> href="?page=<?= $currentPage - 1 ?>"> <img class="flecheg"src="../img/fleched.png" alt=""></a>
    <div class="paginat2">page <?php echo($currentPage)?></div>
    <a class=  <?= ($currentPage == $pages) ? "disabled" : "paginat3" ?> href="?page=<?= $currentPage + 1 ?>"><img class="fleched <?= ($currentPage == $pages) ? "disabled" : "" ?>" src="../img/fleched.png" ></a>
    <div class="Nom"><?= $_SESSION["nomPrenom"] ?></div>
    <div class="Matricule"><?=$_SESSION["LeMatricule"]?></div>
    <div class="email"><?=$_SESSION["LeEmail"]?></div>
    <div class="phh1"></div>
    <div class="phh2"></div>


</body>
</html>