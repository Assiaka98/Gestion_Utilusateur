<?php
ini_set("display_errors", "1");
error_reporting(E_ALL & ~E_DEPRECATED);
	 session_start(); 
	@$email=$_POST["Email"];
	@$pass=$_POST["Pass"];
    @$valider=$_POST["submit"];
	$message="";
	if(isset($valider)){
    
		include("connexion.php");
		$res=$pdo->prepare("SELECT * FROM user1 WHERE mail=? AND mot_de_passe=?  limit 1");
		$res->setFetchMode(PDO::FETCH_ASSOC);
		$res->execute(array($email,md5($pass)));
		$tab=$res->fetchAll();
        /* var_dump(count($tab)==0);
        die; */
		if(count($tab)==0){
            $message="Email ou mot de passe incorrecte";
            
        }
       
			
		else
        {
			$_SESSION["autoriser"]="oui";
        $messagePrenomNom=$_SESSION["nomPrenom"]=($tab[0]["nom"]." ".$tab[0]["prenom"]);
        $messageMatricule=$_SESSION["LeMatricule"]=strtoupper($tab[0]["matricule"]);
        $messageEmail=$_SESSION["LeEmail"]=($tab[0]["mail"]);
        $messagePhoto=$_SESSION["LaPhoto"]=$tab[0]["photo"];
        $messageId=$_SESSION["Id"]=$tab[0]["id"];
        $_SESSION["etat"]=$tab[0]["etat"];


        $_SESSION["LeRole"]=strtoupper($tab[0]["role"]);
       /*     var_dump( $_SESSION["Id"]);
        die  ;   */
        // $message.="connection reussi";
        if($_SESSION["LeRole"]=="ADMIN")
        {
            header("Location:PAgeadmin.php?id=$person->id ");
        } else if($_SESSION["LeRole"]=="USER")
             {
                header("Location:pageUser.php");
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
    <title>Connexion</title>
  </head>
  <body>
    <div class="container-fluid ">
        <div class="row">
          <header class="col-md-12 hautDePage">
            <h1>Connexion</h1>
          </header>
        </div>
    </div>
    <div class="container">
      <div class="row">
        <section class="col-md-12 centre">
        
                    <?php if(!empty($message)){ ?>
		          <div class="messagerr4"><?php echo $message ?></div>
		          <?php } ?>
            <form method="POST" action=""id="myform">
            <div class="col-md-6 conect">
                <div class="form-group">
                    <label for="email">E-mail *</label><br>
                    <input type="email" name="Email" id="Email" placeholder="exemple@gmail.com" class="form-control">
                    <div id="messagerC3"></div>
                    
                  
                  
                 
                </div>
                <div class="form-group">
                    <label for="mdp">Mot de passe *</label><br>
                    <input type="password"  name="Pass" id="Password"  class="form-control">
                    <div id="messagerC5"></div>
               
                </div>  
                <button type="submit" class="btn btn-secondary btn-lg bit" name="submit">Connexion</button><br>     
            </div>
            </form>
            <div class="lien"><a href="inscription.php" >S'inscrire</a></div>
        </section>
      </div>
    </div>
    <div class="container-fluid">
    <div class="row">
        <footer class="col-md-12 PiedDePge">
        </footer>
      </div>
    </div> 
    <script src="executable/pc.js"></script>
  </body>
</html>