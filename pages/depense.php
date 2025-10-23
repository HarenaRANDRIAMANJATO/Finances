<?php 
include '../inc/fonction.php';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dépenses - Loi de Finances</title>
     <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-icons.css" />
    <link rel="stylesheet" href="../assets/bootstrap/styles/style.css" />
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .header {
            background-color: #0074B7;
            color: white;
            padding: 20px 0;
            text-align: center;
            margin-bottom: 30px;
        }

        .table thead {
            background-color: #0074B7;
            color: white;
        }

        .btn-primary {
            background-color: #0074B7;
            border: none;
        }

        .btn-primary:hover {
            background-color: #005fa3;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>Gestion des Dépenses</h2>
        <p>Loi de Finances 2025</p>
    </div>

    <div class="container">

        <div class="mb-3">
            <a href="index.php" class="btn btn-secondary">&larr; Retour à l'accueil</a>
        </div>

        <!-- Tableau des Dépenses -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h5 class="card-title">Liste des Dépenses</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Catégorie</th>
                            <th>Montant (Ar)</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Exemple de données (à remplacer par des données dynamiques) -->
                        <tr>
                            <td>1</td>
                            <td>Salaire fonction publique</td>
                            <td>2 000 000</td>
                            <td>21/10/2025</td>
                            <td>
                                <button class="btn btn-primary btn-sm">Modifier</button>
                                <button class="btn btn-danger btn-sm">Supprimer</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Investissement infrastructure</td>
                            <td>5 500 000</td>
                            <td>19/10/2025</td>
                            <td>
                                <button class="btn btn-primary btn-sm">Modifier</button>
                                <button class="btn btn-danger btn-sm">Supprimer</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Bouton pour ajouter une nouvelle dépense -->
        <div class="text-end mb-4">
            <a href="ajouter_depense.php" class="btn btn-primary">Ajouter une Dépense</a>
        </div>

    </div>

</body>
</html>
