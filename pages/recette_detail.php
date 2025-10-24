<?php
include '../inc/fonction.php';

// On récupère le type passé en GET
$type_id = isset($_GET['type']) ? intval($_GET['type']) : 0;

$details = [];
$titre = '';

switch($type_id) {
    case 3: // Douane
        $details = getRecetteDouane();
        $titre = "Recettes Douanières (Tableau 4)";
        $colonnes = ['ID', 'Nature des droits et taxes', 'LFR 2024 (milliards Ar)', 'LF 2025 (milliards Ar)'];
        break;

    case 2: // Non Fiscales
        $details = getRecetteNonFiscale();
        $titre = "Recettes Non Fiscales (Tableau 5)";
        $colonnes = ['ID', 'Nature', 'LFR 2024 (milliards Ar)', 'LF 2025 (milliards Ar)'];
        break;

    default:
        $titre = "Détails non disponibles pour ce type";
        $details = [];
        $colonnes = [];
        break;
}
?>

 <link rel="stylesheet" href="../asset/bootstrap5_3/bootstrap/css/bootstrap.min.css" />
<script src="../asset/bootstrap5_3/bootstrap/js/bootstrap.bundle.min.js"></script>

<div class="container mt-4">
    <h2><?= $titre ?></h2>

    <?php if(!empty($details)): ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <?php foreach($colonnes as $col): ?>
                    <th><?= $col ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
        <?php foreach($details as $d): ?>
            <tr>
                <td><?= $d['id'] ?></td>
                <td><?= $d['nature'] ?></td>
                <td><?= number_format($d['montant_2024'],1,',',' ') ?></td>
                <td><?= number_format($d['montant_2025'],1,',',' ') ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>Aucun détail disponible pour ce type.</p>
    <?php endif; ?>
</div>

<a href="recette.php" class="btn btn-secondary mt-3">&larr; Retour à la liste des recettes</a>
