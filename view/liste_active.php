<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
include("../executable/connexion.php");
$sql = 'SELECT * FROM user WHERE etat= 1';
$statement = $pdo->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Liste des Utilisateur actif</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered md-9">
        <tr>
         

        <th>Nom</th>
          <th>Prenom</th>
          <th>Mail</th>
          <th>Matricule</th>
          <th>Role</th>
          <th>action</th>
          


          

          <th style="text-align:center">Action</th>
        </tr>
        <?php foreach($people as $person): ?>
          <tr>
          <td><?= $person->nom; ?></td>
            <td><?= $person->prenom; ?></td>
            <td><?= $person->mail; ?></td>
            <td><?= $person->matricule; ?></td>
            <td><?= $person->role; ?></td>
           
            <td>
              <a href="edit.php?id=<?= $person->id ?>" class="btn btn-info">Modifier</a>
              <a onclick="return confirm('Etes vous sur de supprimer ce professeur')" href="delete.php?id=<?= $person->id ?>" class='btn btn-danger'>Supprimer</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>

