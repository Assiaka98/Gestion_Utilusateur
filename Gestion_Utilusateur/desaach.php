<?php
include("connexion.php");
$id = $_GET['id'];
$sql = 'UPDATE user1 SET etat= 0 WHERE id=:id';
$ins = $pdo->prepare($sql);
if ($ins->execute([':id' => $id])) {
    header("Location:PAgeadmin.php");
}
?>