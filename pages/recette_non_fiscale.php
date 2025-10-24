<?php
// Afficher les erreurs pour le debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../inc/fonction.php';

// Récupère toutes les recettes non fiscales
$details = getRecetteNonFiscale();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Recettes Non Fiscales LF 2025</title>
 <link rel="stylesheet" href="../asset/bootstrap5_3/bootstrap/css/bootstrap.min.css" />
<script src="../asset/bootstrap5_3/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-4">
    <h2>Recettes Non Fiscales (Tableau 5)</h2>
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nature</th>
                <th>LFR 2024 (milliards Ar)</th>
                <th>LF 2025 (milliards Ar)</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($details as $d): ?>
            <tr>
                <td><?= $d['id'] ?></td>
                <td><?= $d['nature'] ?></td>
                <td><?= number_format($d['montant_2024'], 1, ',', ' ') ?></td>
                <td><?= number_format($d['montant_2025'], 1, ',', ' ') ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <a href="recette.php" class="btn btn-secondary mt-3">&larr; Retour à la liste des recettes</a>
</div>
</body>
</html>
