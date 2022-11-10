<?php
	try{
		$pdo=new PDO("mysql:host=localhost;dbname=SIMPLON","sakha","traore");
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
?>