<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recettes par année</title>
</head>
<body>
<?php
require_once __DIR__ . '/../inc/fonction.php';

$tot2024 = getTotalRecetteByYear(2024);
$tot2025 = getTotalRecetteByYear(2025);

function fmt($v) {
    return number_format((float)$v, 2, '.', ' ');
}
?>
    <table border="1">
        <tr>
            <td>annee</td>
            <td>total</td>
        </tr>
        <tr>
            <td>2024</td>
            <td><?php echo fmt($tot2024); ?></td>
        </tr>
        <tr>
            <td>2025</td>
            <td><?php echo fmt($tot2025); ?></td>
        </tr>
    </table>
</body>
</html>