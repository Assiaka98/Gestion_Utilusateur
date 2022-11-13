
<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
session_start(); 
if(@$_SESSION["autoriser"]!="oui"){
    header("location:essai1.php");
    exit();
}
$myId=$_SESSION["Id"];
$_SESSION["autoriser"]="oui";
/* var_dump( $_SESSION["myI"]);
die; */
include("connexion.php");
include("paginnation1.php");
if(isset($_GET['lance'])){
    $mat=$_GET['search']; 
  
    $statement=$pdo->prepare("SELECT * from user1 WHERE nom=:nom and etat= 1");
   $statement->execute(['nom' => $mat]);
}
else{
    $sql = 'SELECT * FROM `user1` WHERE  etat=1 AND id!=:myId ORDER BY `id` DESC LIMIT :premier, :parpage;';
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="CSS/style.css">
    <title></title>
  </head>
  <body>
    <div class="container-fluid ">
        <div class="row">
          <header class="col-md-12 hautDePage">
          <div class="profil">
          <div class="photo"><img class="prof" src="<?='photo:image/jpg;base64,'.base64_encode($_SESSION['Photo'])?>" alt=""></div>
          <div class="Nom"><?= $_SESSION["nomPrenom"] ?></div>
          <div class="Matricule"><?=$_SESSION["LeMatricule"]?></div>
          <div class="email"><?=$_SESSION["LeEmail"]?></div>
          <div class="phh1"></div>
          <div class="phh2"></div>
           </div>
    
    <a href="deconnexion.php"><div class="deconect"><svg version='1.1' width='50px' height='50px'id='Capa_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px'
	 viewBox='0 0 55 55' style='enable-background:new 0 0 55 55;' xml:space='preserve'>
<g>
	<path d='M53.924,24.382c0.101-0.244,0.101-0.519,0-0.764c-0.051-0.123-0.125-0.234-0.217-0.327L41.708,11.293
		c-0.391-0.391-1.023-0.391-1.414,0s-0.391,1.023,0,1.414L50.587,23H29.001c-0.553,0-1,0.447-1,1s0.447,1,1,1h21.586L40.294,35.293
		c-0.391,0.391-0.391,1.023,0,1.414C40.489,36.902,40.745,37,41.001,37s0.512-0.098,0.707-0.293l11.999-11.999
		C53.799,24.616,53.873,24.505,53.924,24.382z'/>
	<path d='M36.001,29c-0.553,0-1,0.447-1,1v16h-10V8c0-0.436-0.282-0.821-0.697-0.953L8.442,2h26.559v16c0,0.553,0.447,1,1,1
		s1-0.447,1-1V1c0-0.553-0.447-1-1-1h-34c-0.032,0-0.06,0.015-0.091,0.018C1.854,0.023,1.805,0.036,1.752,0.05
		C1.658,0.075,1.574,0.109,1.493,0.158C1.467,0.174,1.436,0.174,1.411,0.192C1.38,0.215,1.356,0.244,1.328,0.269
		c-0.017,0.016-0.035,0.03-0.051,0.047C1.201,0.398,1.139,0.489,1.093,0.589c-0.009,0.02-0.014,0.04-0.022,0.06
		C1.029,0.761,1.001,0.878,1.001,1v46c0,0.125,0.029,0.243,0.072,0.355c0.014,0.037,0.035,0.068,0.053,0.103
		c0.037,0.071,0.079,0.136,0.132,0.196c0.029,0.032,0.058,0.061,0.09,0.09c0.058,0.051,0.123,0.093,0.193,0.13
		c0.037,0.02,0.071,0.041,0.111,0.056c0.017,0.006,0.03,0.018,0.047,0.024l22,7C23.797,54.984,23.899,55,24.001,55
		c0.21,0,0.417-0.066,0.59-0.192c0.258-0.188,0.41-0.488,0.41-0.808v-6h11c0.553,0,1-0.447,1-1V30
		C37.001,29.447,36.553,29,36.001,29z M23.001,52.633l-20-6.364V2.367l20,6.364V52.633z'/>
</g>
</svg></div></a>  
          </header>
        </div>
    </div>
    <div class="container">
      <div class="row">
        <section class="col-md-12 centre">

        <nav class="navbar navbar-expand-lg ">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      <a class="nav-link "  href="PAgeadmin.php?$_SESSION<?= $_SESSION["autoriser"]="oui" ?>"><div >Active </div></a>
      
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pageArchive.php">Archives</a>
      </li>
     
    </ul>


    <form action="" method="get" class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" name="search" type="text" placeholder="Veuillez Saisir un nom">
        <button   name="lance" type="submit" class="btn btn-outline-success my-2 my-sm-0">Rechercher</button>
      
    </form>



  </div>
</nav>



     
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
            <a class="btn btn-outline-success my-2 my-sm-0" href="desaach.php?id=<?= $person->id ?>" > <svg width='36px' height='36px' viewBox='0 0 36 36' version='1.1'  preserveAspectRatio='xMidYMid meet' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
    <title>unarchive-line</title>
    <path d='M29,32H7V22H5V32a2,2,0,0,0,2,2H29a2,2,0,0,0,2-2V22H29Z' class='clr-i-outline clr-i-outline-path-1'></path><path d='M14,24a1,1,0,0,0,1,1h6a1,1,0,0,0,0-2H15A1,1,0,0,0,14,24Z' class='clr-i-outline clr-i-outline-path-2'></path><path d='M15,18H6V14h9V12H5.5A1.5,1.5,0,0,0,4,13.5V20H15.78A3,3,0,0,1,15,18Z' class='clr-i-outline clr-i-outline-path-3'></path><path d='M30.5,12H21v2h9v4H21a3,3,0,0,1-.78,2H32V13.5A1.5,1.5,0,0,0,30.5,12Z' class='clr-i-outline clr-i-outline-path-4'></path><path d='M13,9.55,17,5.6V18a1,1,0,1,0,2,0V5.6l4,3.95a1,1,0,1,0,1.41-1.42L18,1.78,11.61,8.13A1,1,0,0,0,13,9.55Z' class='clr-i-outline clr-i-outline-path-5'></path>
    <rect x='0' y='0' width='36' height='36' fill-opacity='0'/>
</svg></a> 
              
            </td>
          </tr>
        <?php endforeach; ?>
   
  
  </table>


  <div class="mesafaleches">
  <a class= <?= ($currentPage == 1) ? "disabled" : "paginat1"?> href="?page=<?= $currentPage - 1 ?>"> <svg width='42px' height='42px' viewBox='0 0 524 524' style='shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd' version='1.1' xml:space='preserve' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><defs><style type='text/css'>
  
  </style></defs><g id='Layer_x0020_1'><path class='fil0' d='M262 0c72,0 138,29 185,77 48,47 77,113 77,185 0,72 -29,138 -77,185 -47,48 -113,77 -185,77 -72,0 -138,-29 -185,-77 -48,-47 -77,-113 -77,-185 0,-72 29,-138 77,-185 47,-48 113,-77 185,-77zm177 85c-45,-45 -108,-73 -177,-73 -69,0 -132,28 -177,73 -45,45 -73,108 -73,177 0,69 28,132 73,177 45,45 108,73 177,73 69,0 132,-28 177,-73 45,-45 73,-108 73,-177 0,-69 -28,-132 -73,-177z' id='Curve_x0020_767'/><path class='fil0' d='M208 368c2,3 2,7 0,9 -3,2 -6,2 -9,0l-110 -111c-3,-2 -3,-6 0,-8l110 -111c3,-2 6,-2 9,0 2,2 2,6 0,9l-107 106 107 106z' id='Curve_x0020_456'/><path class='fil0' d='M93 268c-3,0 -6,-3 -6,-6 0,-3 3,-6 6,-6l338 0c3,0 6,3 6,6 0,3 -3,6 -6,6l-338 0z' id='Curve_x0020_45'/></g></svg></a>
    <div class="paginat2">page <?php echo($currentPage)?></div>
    <a class=  <?= ($currentPage == $pages) ? "disabled" : "paginat3" ?> href="?page=<?= $currentPage + 1 ?>"><svg width='42px' height='42px' viewBox='0 0 512 512' style='shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd' version='1.1' xml:space='preserve' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><defs><style type='text/css'>
   
  </style></defs><g id='Layer_x0020_2'><path class='fil0' d='M256 12c-68,0 -129,27 -173,71 -44,44 -71,105 -71,173 0,68 27,129 71,173 44,44 105,71 173,71 68,0 129,-27 173,-71 44,-44 71,-105 71,-173 0,-68 -27,-129 -71,-173 -44,-44 -105,-71 -173,-71zm-181 63c46,-46 110,-75 181,-75 71,0 135,29 181,75 46,46 75,110 75,181 0,71 -29,135 -75,181 -46,46 -110,75 -181,75 -71,0 -135,-29 -181,-75 -46,-46 -75,-110 -75,-181 0,-71 29,-135 75,-181z' id='Curve_x0020_6'/><path class='fil0' d='M317 368c-2,2 -6,2 -8,0 -2,-2 -2,-6 0,-8l104 -104 -104 -104c-2,-2 -2,-6 0,-8 2,-2 6,-2 8,0l108 108c3,2 3,6 0,8l-108 108z' id='Curve_x0020_5'/><path class='fil0' d='M421 250c3,0 6,3 6,6 0,3 -3,6 -6,6l-330 0c-3,0 -6,-3 -6,-6 0,-3 3,-6 6,-6l330 0z' id='Curve_x0020_4'/></g></svg></a>
   </div>
  </section>
      </div>
      
    </div>
    <div class="container-fluid">
    <div class="row">
        <footer class="col-md-12 PiedDePge">
        </footer>
      </div>
    </div> 
    <script src="pc.js"></script>
  </body>
</html>
