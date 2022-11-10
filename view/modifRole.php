<?php
 ini_set("display_errors", "-1");
 error_reporting(E_ALL);
 /* session_start(); */
include("../executable/connexion.php");
/* $datee=date(time()); */
/* var_dump($datee); */
/* @$id = (int) $_GET['id'];
$role = $pdo->query("SELECT role FROM user1 WHERE id=:id")->fetchColumn();  */
$id = (int) $_GET['id'];
$role = $pdo->query("SELECT role FROM user1 WHERE id=$id")->fetchColumn();
// var_dump($role);
// exit;
if($role=='Admin')

{
  $datee= time();
 /*  var_dump($datee);
exit; */
    $rol='User';
    $sql = 'UPDATE user1 set role=:rol  WHERE id=:id';
    $ins = $pdo->prepare($sql);
    if ($ins->execute(['rol' => $rol,':id' => $id ])) {
      header("Location: PAgeadmin.php");
    }
    
}else{
    $rol='Admin';
    $sql = 'UPDATE user1 set role=:rol  WHERE id=:id';
    
    $ins = $pdo->prepare($sql);
    if ($ins->execute(['rol' => $rol,':id' => $id])) {
      header("Location: PAgeadmin.php");
    }
}
