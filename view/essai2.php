
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
   /* 
    
   @$Photo=file_get_contents($_FILES['image']['tmp_name']);
   /* @$Matricule=''; */
   @$verif1='Admin';
   @$verif2='User';
   $matricule = date('  his-- A', time()).'-GZL';
   $message="";
   
       
           include("../executable/connexion.php");
           $req=$pdo->prepare("select id from user1 where mail=? limit 1");
           $req->setFetchMode(PDO::FETCH_ASSOC);
           $req->execute(array($Email));
           $tab=$req->fetchAll();
/*
            var_dump(count($tab)>0);
           die;  */
           if(count($tab)>0){
           
               $message="<li>Email existe déjà!</li>";
           
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
                   header("location:essai1.php");

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
                   include("../executable/connexion.php");
            
                   header("location:essai1.php");
               }
               
           }}
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="essai.css">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">
    <div class="page-connection-3 screen">
    <div class="desktop-8"> </div>
    <div class="overlap-group">

        <div class="CI_Nom">
            <form action="" method="post" id="myform" enctype="multipart/form-data">
            <input type="text" name="Nom" id="nom">
        </div>
        <div class="CI_Prenom">
            <input type="text" name="Prenom" id="prenom" focus>
        </div>
        <div class="CI_email">
            <input type="email" name="Email" id="email" autofocus>
        </div>
        <div >
           
            <select class="CI_Role" id="role" name="Role">
  <option >User</option>
  <option >Admin</option>
  
</select>


        </div>
        <div class="CI_Password">
            <input type="password" name="Password1" id="password" autofocus>
        </div>
        <div class="CI_rePassword">
            <input type="password" name="Pass" id="repass">
        </div>
        <div class="CI_Photo">
            <input type="file" id="photo" name="image" style="display:none" accept=".jpeg,.jpg,.png" />
                 <div id="photo1"> </div>
         <button type="button" class="selectfile"  onclick="getfile()" value="s'inscrire"></button>
        </div>
        <div id="messagerI1"></div>
        <div id="messagerI2"></div>
        <div id="messagerI3"></div>
        <div id="messagerI4">Champ Role vide</div>
        <div id="messagerI5"></div>
        <div id="messagerI6"></div>
        <div id="messagerI7"></div>
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
        <div class="RoleI">Role</div>
        <div class="mot-de-passeI ">Mot de passe</div>
        <div class=" remot-de-passeI ">Repasse</div>
        <div class="PhotoI">Photo</div>
        <!-- <div class="email ibmplexsans-bold-black-20px">Email</div>
        <div class="mot-de-passe ibmplexsans-bold-black-20px">Mot de passe</div> -->
        <div class="glass"></div>
        <input class="inscrire"  type="submit" name="S'Inscrire"value="S'Inscrire" >
        <a href="../view/essai1.php"><div class="connecter3">Se connecter</div></a>
        </form>
    </div>
    </div>
    </div>
</body>
<script src="../executable/pj.js"></script>

</html>