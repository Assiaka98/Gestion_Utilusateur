<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
session_start(); 
$_SESSION["autoriser"]="oui";
if(@$_SESSION["autoriser"]!="oui"){
    header("location:essai1.php");
    exit();
} 

   
include("connexion.php");
include("paginnation.php");


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
          <img src="/photo/siaka.jpg">
            <div class="photo"><img class="prof" src="<php echo 'data:photo/jpg;base64,'.base64_encode($_SESSION['Photo'])?>" alt=""></div>
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
      <a class="nav-link "  href="pageadmin.php?$_SESSION<?= $_SESSION["autoriser"]="oui" ?>"><div >Active </div></a>
      
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
               <a class='btn btn-outline-primary' href="dup1.php?id=<?= $person->id ?>" > <svg width='40px' height='40px' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'>
    <g fill='#494c4e' fill-rule='evenodd'>
        <path d='M18 2v2.96a1 1 0 0 1-2 0V2.5a.5.5 0 0 0-.5-.5h-13a.5.5 0 0 0-.5.5v19a.487.487 0 0 0 .49.5H15a1 1 0 0 1 0 2H2a2.006 2.006 0 0 1-2-2V2a2.006 2.006 0 0 1 2-2h14a2.006 2.006 0 0 1 2 2z'/>
        <path d='M8.006 19.037c-.187-5.117 4.134-7.848 7-8.791V10a1.993 1.993 0 0 1 1.165-1.822 2.053 2.053 0 0 1 2.084.251l5 4c.472.385.746.962.745 1.571 0 .604-.275 1.175-.749 1.55l-4.982 3.986a2 2 0 0 1-3.263-1.436 4.447 4.447 0 0 0-3.27 1.938c-.025.045-.053.09-.083.132-.385.527-1 .836-1.653.83a1.994 1.994 0 0 1-1.994-1.963zM16.7 16.28a1 1 0 0 1 .3.72v.989l5-4L17 10v1a1 1 0 0 1-.764.972c-.263.064-6.425 1.636-6.187 6.982 1.182-1.863 3.172-2.854 5.919-2.954H16a1 1 0 0 1 .7.28zm5.3-2.29V14v-.01zM12 6a1 1 0 0 1-1 1H5a1 1 0 1 1 0-2h6a1 1 0 0 1 1 1zm-6 9H5a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2zm3-4H5a1 1 0 0 1 0-2h4a1 1 0 1 1 0 2z'/>
    </g>
</svg></a>
               <a class="btn btn-outline-warning" href="modifRole.php?id=<?= $person->id ?>" ><svg width='40px' height='40px' viewBox='0 0 48 48' fill='none' xmlns='http://www.w3.org/2000/svg'>
<rect width='48px' height='48px' fill='white' fill-opacity='0.01'/>
<path d='M18 31H38V5' stroke='black' stroke-width='4' stroke-linecap='round' stroke-linejoin='round'/>
<path d='M30 21H10V43' stroke='black' stroke-width='4' stroke-linecap='round' stroke-linejoin='round'/>
<path d='M44 11L38 5L32 11' stroke='black' stroke-width='4' stroke-linecap='round' stroke-linejoin='round'/>
<path d='M16 37L10 43L4 37' stroke='black' stroke-width='4' stroke-linecap='round' stroke-linejoin='round'/>
</svg>
</a>
              <a class='btn btn-outline-danger' onclick="return confirm('Etes vous sur de supprimer ce professeur')" href="archive.php?id=<?= $person->id ?>"  > <svg version='1.1' id='Capa_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px'
	 width='40px' height='40px' viewBox='0 0 482.428 482.429' style='enable-background:new 0 0 482.428 482.429;'
	 xml:space='preserve'>
<g>

		<path d='M381.163,57.799h-75.094C302.323,25.316,274.686,0,241.214,0c-33.471,0-61.104,25.315-64.85,57.799h-75.098
			c-30.39,0-55.111,24.728-55.111,55.117v2.828c0,23.223,14.46,43.1,34.83,51.199v260.369c0,30.39,24.724,55.117,55.112,55.117
			h210.236c30.389,0,55.111-24.729,55.111-55.117V166.944c20.369-8.1,34.83-27.977,34.83-51.199v-2.828
			C436.274,82.527,411.551,57.799,381.163,57.799z M241.214,26.139c19.037,0,34.927,13.645,38.443,31.66h-76.879
			C206.293,39.783,222.184,26.139,241.214,26.139z M375.305,427.312c0,15.978-13,28.979-28.973,28.979H136.096
			c-15.973,0-28.973-13.002-28.973-28.979V170.861h268.182V427.312z M410.135,115.744c0,15.978-13,28.979-28.973,28.979H101.266
			c-15.973,0-28.973-13.001-28.973-28.979v-2.828c0-15.978,13-28.979,28.973-28.979h279.897c15.973,0,28.973,13.001,28.973,28.979
			V115.744z'/>
		<path d='M171.144,422.863c7.218,0,13.069-5.853,13.069-13.068V262.641c0-7.216-5.852-13.07-13.069-13.07
			c-7.217,0-13.069,5.854-13.069,13.07v147.154C158.074,417.012,163.926,422.863,171.144,422.863z'/>
		<path d='M241.214,422.863c7.218,0,13.07-5.853,13.07-13.068V262.641c0-7.216-5.854-13.07-13.07-13.07
			c-7.217,0-13.069,5.854-13.069,13.07v147.154C228.145,417.012,233.996,422.863,241.214,422.863z'/>
		<path d='M311.284,422.863c7.217,0,13.068-5.853,13.068-13.068V262.641c0-7.216-5.852-13.07-13.068-13.07
			c-7.219,0-13.07,5.854-13.07,13.07v147.154C298.213,417.012,304.067,422.863,311.284,422.863z'/>

</g>
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