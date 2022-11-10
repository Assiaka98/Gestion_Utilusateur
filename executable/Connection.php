<?php
/* ini_set("display_errors", "1");
error_reporting(E_ALL); */
	/* session_start(); */
/* 	@$email=$_POST["Email"];
	@$pass=$_POST["pass"];
    
	@$valider=$_POST["valider"];
	$message="";
	
		include("../executable/Connection.php");
		$res=$pdo->prepare("SELECT * FROM user WHERE mail=? AND pass=?  limit 1");
		$res->setFetchMode(PDO::FETCH_ASSOC);
		$res->execute(array($email,md5($pass)));
		$tab=$res->fetchAll();
		if(count($tab)==0){
            $message="<li>Mauvais login ou mot de passe!</li>";
            header("location:session.php");
        }
       
			
		else{
			$_SESSION["autoriser"]="oui";
			$_SESSION["nomPrenom"]=strtoupper($tab[0]["nom"]." ".$tab[0]["prenom"]);
			header("location:session.php");
		}
	 */
	var_dump(extract($_POST)) ;
?>