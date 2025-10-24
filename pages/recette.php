
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include '../inc/fonction.php';

$recettes = getRecettes();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Recettes LF 2025</title>
 <link rel="stylesheet" href="../asset/bootstrap5_3/bootstrap/css/bootstrap.min.css" />
<script src="../asset/bootstrap5_3/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h2>Liste des Recettes</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Libellé</th>
                <th>Montant (Ar)</th>
                <th>Date</th>
                <th>Type ID</th>
                <th>Commentaire</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($recettes as $recette): ?>
            <tr>
                <td><?= $recette['id'] ?></td>
                    <td>
                        <a href="recette_detail.php?type=<?= $recette['type_recette_id'] ?>" class="text-decoration-none">
                            <?= $recette['libelle'] ?>
                        </a>
                    </td>

                </td>
                <td><?= number_format($recette['montant_milliards'], 0, ',', ' ') ?></td>

                <td><?= $recette['created_at'] ?></td>
                <td><?= $recette['type_recette_id'] ?></td>
                <td><?= $recette['source_detail'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p><strong>Total général :</strong> <?= number_format(array_sum(array_column($recettes, 'montant')),0,',',' ') ?> Ar</p>
</div>
</body>
</html>
