<?php
ini_set("display_errors", "1");
error_reporting(E_ALL & ~E_DEPRECATED);
// On se connecte à là base de données
require_once('connexion.php');

$sql = 'SELECT * FROM `user1` ORDER BY `id` DESC;';

// On prépare la requête
$query = $pdo->prepare($sql);

// On exécute
$query->execute();

// On récupère les valeurs dans un tableau associatif
$user = $query->fetchAll(PDO::FETCH_ASSOC);


// On détermine sur quelle page on se trouve
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}
$rqtc= 'SELECT COUNT(*) AS matricule FROM `user1`WHERE etat=0' ;
$query = $pdo->prepare($rqtc);
$query->execute();
$cont = $query->fetch();
 $nbUser = (int) $cont['matricule'];  
 // On détermine le nombre d'articles par page
$parPage = 5;

// On calcule le nombre de pages total
$pages = ceil($nbUser / $parPage);

// Calcul du 1er article de la page
$premier = ($currentPage * $parPage) - $parPage;
/* $sql = 'SELECT * FROM `user1` ORDER BY `id` DESC LIMIT :premier, :parpage;';
 */
// On prépare la requête
/* $query = $db->prepare($sql); */

/* $query->bindValue(':premier', $premier, PDO::PARAM_INT);
$query->bindValue(':parpage', $parPage, PDO::PARAM_INT); */

// On exécute
/* $query->execute(); */

// On récupère les valeurs dans un tableau associatif
/* $articles = $query->fetchAll(PDO::FETCH_ASSOC); */

/*   var_dump($nbUser); 
die; */  
?>