<?php 
 
 ini_set("display_errors", "-1");
error_reporting(E_ALL);
session_start();
$matricule = date('  his-- A', time()).'-GZL';


   if(isset($_POST["S'Inscrire"])){

   @$Nom=$_POST["Nom"];
   @$Prenom=$_POST["Prenom"];
   @$Email=$_POST["Email"];
   @$Pass=$_POST["Pass"];
   @$Password1=$_POST["Password1"];
   @$valider=$_POST["S'Inscrire"];
   @$Role=$_POST["Role"];
   @$Photo=$_FILES['image']['tmp_name'];

    $nom_photo =  $_FILES['image']['name'];
    $type_photo =  $_FILES['image']['type'];
    $size_photo =  $_FILES['image']['size'];
    $tmp_photo =  $_FILES['image']['tmp_name'];
    $erroFile =  $_FILES['image']['error'];
    move_uploaded_file($tmp_photo, './photo/'.$nom_photo);
   /* 
    
   @$Photo=file_get_contents($_FILES['image']['tmp_name']);
   /* @$Matricule=''; */
   @$verif1='Admin';
   @$verif2='User';
   $matricule = date('  his-- A', time()).'-GZL';
   $message="";

           include("connexion.php");
           $req=$pdo->prepare("select id from user1 where mail=? limit 1");
           $req->setFetchMode(PDO::FETCH_ASSOC);
           $req->execute(array($Email));
           $tab=$req->fetchAll();

           if(count($tab)>0){
           
               $message="un compte existe déjà  avec Email ";
           
           }
               
           else{
               
           
               if(@$Role== $verif1){$ins=$pdo->prepare("insert into user1(matricule,nom,prenom,mail,mot_de_passe,photo,etat,date,date_modif,date_archive,role_etat,role) values(?,?,?,?,?,?,0,now(),now(),now(),3,?)");
                $ins->bindParam(1, $matricule);
                $ins->bindParam(2, $Nom);
                $ins->bindParam(3, $Prenom);
                $ins->bindParam(4, $Email);
                $ins->bindParam(5, md5($Pass));
                $ins->bindParam(6, $Photo);
                $ins->bindParam(7, $Role);
                $ins->execute();
                if($ins){
 

                //array($Matricule,$Nom,$Prenom,$Email,md5($Pass),$Photo,$Role)
                   header("location:index.php");

                }
              
               } 
               else{
                   $ins=$pdo->prepare("insert into user1(matricule,nom,prenom,mail,mot_de_passe,photo,etat,date,date_modif,date_archive,role_etat,role) values(?,?,?,?,?,?,0,now(),now(),now(),6,?)");
                   $ins->bindParam(1, $matricule);
                   $ins->bindParam(2, $Nom);
                   $ins->bindParam(3, $Prenom);
                   $ins->bindParam(4, $Email);
                   $ins->bindParam(5, md5($Pass));
                   $ins->bindParam(6, $Photo);
                   $ins->bindParam(7, $Role);
                   $ins->execute();
                   include("connexion.php");
            
                   header("location:index.php");
               }
               
           }}
   
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
        <form method="POST" action="" id="myform" enctype="multipart/form-data">
          <div class="col-md-6 formGauche">
              <div class="form-group">
                <label for="prenom">Nom </label><br>
                <input type="text" name="Nom" id="nom" placeholder="nom" class="form-control" >
                <div id="messagerI1"></div>
              </div>

              <div class="form-group">
                <label for="email">E-mail</label><br>
                <input type="email" type="email" name="Email" id="email"placeholder="exemple@gmail.com" class="form-control">
                <div id="messagerI3"></div>
              </div>

              <div class="form-group">
                <label for="mdp">Mot de passe</label><br>
                <input type="password"  name="Password1" id="password" class="form-control">
                <div id="messagerI5"></div>
             </div>
             
             <div class="form-group">
              <label for="photo">Importer une image</label><br>
              <input type="file" id="photo" name="image"  accept=".jpeg,.jpg,.png"class="form-control selectfile" onclick="getfile()"><br>
             
             </div>
          </div>
          <div class="col-md-6 formDroite" >
          <div class="form-group">
                <label for="prenom">Prenom </label><br>
                <input type="text" name="Prenom" id="prenom" placeholder="prenom" class="form-control">
                <div id="messagerI2"></div>
           </div>  
              <div class="form-group">
                <label id="role" name="Role">Role</label><br>
                  <select id="role" name="Role">
                    <option>Admin</option>
                    <option >User</option>
                  </select>
                  <div id="messagerI4"></div>
              </div>
             
              

             <div class="form-group"><br>
                <label for="mdp1">Confirme Mot de passe</label><br>
                <input type="password"  name="Pass" id="repass" class="form-control"  >
                <div id="messagerI6"></div>
             </div>   
          </div>
      

              <button type="submit" name="S'Inscrire" class="btn btn-secondary btn-lg bit Sinscrire">S'inscrire</button>
              <span class="Seconnecter"><a href="index.php">Se connecter</a></span>
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