 <?php
  ini_set("display_errors", "-1");
error_reporting(E_ALL);
session_start();
 	@$Nom=$_POST["Nom"];
	@$Prenom=$_POST["Prenom"];
	@$Email=$_POST["Email"];
	@$Pass=$_POST["Pass"];
	@$Password1=$_POST["Password1"];
	@$valider=$_POST["S'Inscrire"];
	@$Role=$_POST["Role"];
	@$Photo=$_POST["Photo"];
	/* @$Matricule=''; */
	@$verif1='Admin';
	@$verif2='User';
	$message="";

  
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Tp2";
    $conn = mysqli_connect($servername, $username, $password, $dbname);


                            $query2 = "select * from user1 order by id desc limit 1";
                            $result2 = mysqli_query($conn,$query2);
                            $row = mysqli_fetch_array($result2);
                            $last_id = $row['id'];
                            if ($last_id == "")
                            {
                                $Matricule = "CUS1";
                            }
                            else
                            {
                                $Matricule = substr($last_id, 3);
                                $Matricule = intval($Matricule);
                                $Matricule = "CUS" . ($Matricule + 1);
                            }
	
		
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
                
            
				if(@$Role== $verif1){$ins=$pdo->prepare("insert into user1(matricule,nom,prenom,mail,mot_de_passe,photo,etat,date,date_modif,date_archive,role_etat,role) values(?,?,?,?,?,0,?,now(),now(),now(),3,?)");
					$ins->execute(array($Matricule,$Nom,$Prenom,$Email,md5($Pass),$Photo,$Role));

  
					header("location:view/essai1.php");

				} 
				else{
					$ins=$pdo->prepare("insert into user1(matricule,nom,prenom,mail,mot_de_passe,photo,etat,date,date_modif,date_archive,role_etat,role) values(?,?,?,?,?,?,0,now(),now(),now(),6,?)");
					$ins->execute(array($Matricule,$Nom,$Prenom,$Email,md5($Pass),$Photo,$Role));
					header("location:view/essai1.php");
				}
				
			}
    