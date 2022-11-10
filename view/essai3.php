<?php

$idEleve = $_GET['idEleve'];
$sql = 'SELECT * FROM eleve WHERE idEleve=:idEleve';
$statement = $connection->prepare($sql);
$statement->execute([':idEleve' => $idEleve ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['nom']) 
&& isset($_POST['prenom'])
&& isset($_POST['daten']) 
&& isset($_POST['lieun']) 
&& isset($_POST['classe']) 
&& isset($_POST['cycle']) 
&& isset($_POST['login']) 
&& isset($_POST['motdepass'])) {
  $name = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $daten = $_POST['daten'];
  $lieun = $_POST['lieun'];
  $classe = $_POST['classe'];
  $cycle = $_POST['cycle'];
  $login = $_POST['login'];
  $motdepass = $_POST['motdepass'];
 
  $sql = 'UPDATE eleve SET nom=:nom, prenom=:prenom, daten=:daten ,lieun=:lieun, classe=:classe, cycle=:cycle,
   login=:login, motdepass=:motdepass WHERE idEleve=:idEleve';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':nom'=>$name,
  ':prenom'=>$prenom,':daten'=>$daten,
  ':lieun'=>$lieun,':classe'=>$classe,':cycle'=>$cycle,
  ':login'=>$login,':motdepass' =>$motdepass,
  ':idEleve'=>$idEleve])) {
   
    $message = 'Succès';
  }


 
}


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
      <?php endif; ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de modification</title>
    <<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fichConnexion.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
   <script src="script.js"></script>
</head>
<body>
   <div class="contenantGlogal">
   <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
    <form  id="create-account-form" method="POST" action="">
        
      <div class="title">
            <h2>Formulaire de modification</h2>
      </div>
         
        <!-- USERNAME -->
        <div class="contenantPartieGDduFormulaire">

            <div class="blocGD">
                    <div class="input-group">
                        <label for="prenom">Nom</label><br>
                        <input type="text" id="nom" placeholder="EX: Ousmane" name="nom" value="<?= $person->nom; ?>">
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <p>Error Message</p>
                    </div>

                    <div class="input-group">
                        <label for="prenom">Prenom</label><br>
                        <input type="text" id="prenom" placeholder="EX: Ousmane" name="prenom" value="<?= $person->prenom; ?>">
                      <!--   <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i> -->
                        <p>Error Message</p>
                    </div>
                    <!-- EMAIL -->
                    <div class="input-group">
                        <label for="email">Email</label><br>
                        <input type="email" id="email" placeholder="Email" name="email" value="<?= $person->email; ?>">
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <p>Error Message</p>
                    </div>
                   

            <button type="submit" name="ok" class="btn">Modifier</button>
        
               
        </div>
        
            
        
    </form>
  </div>
            <script></script>               
    <script src="fichModif.js"></script>
</body>
</html>