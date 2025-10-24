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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Recettes LF 2025</title>

  <!-- Bootstrap CSS (hors ligne) -->
  <link rel="stylesheet" href="../asset/bootstrap5_3/bootstrap/css/bootstrap.min.css" />

  <!-- Bootstrap Icons (inclus pour les icônes) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

  <style>
    /* Style personnalisé */
    body, html {
      height: 100%;
      margin: 0;
      background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container {
      padding-top: 6rem;
      padding-bottom: 4rem;
    }

    h2 {
      font-size: 2.5rem;
      font-weight: 700;
      color: #1e3c72;
      text-shadow: 0 2px 5px rgba(0,0,0,0.1);
      margin-bottom: 2rem;
      text-align: center;
    }

    .table {
      background-color: #fff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }

    .table-dark {
      background-color: #1e3c72;
      color: #fff;
    }

    .table th,
    .table td {
      vertical-align: middle;
      padding: 1rem;
    }

    .table-striped tbody tr:nth-of-type(odd) {
      background-color: rgba(30, 60, 114, 0.05);
    }

    .table-bordered th,
    .table-bordered td {
      border: 1px solid #dee2e6;
    }

    .table a {
      color: #2a5298;
      font-weight: 600;
      transition: color 0.3s ease;
    }

    .table a:hover {
      color: #1e3c72;
      text-decoration: underline;
    }

    .total {
      font-size: 1.2rem;
      font-weight: 600;
      color: #1e3c72;
      text-align: right;
      margin-top: 1.5rem;
      padding: 1rem;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }

    /* Style pour le bouton de retour et le logo */
    .header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      background-color: #1e3c72;
      padding: 1rem 2rem;
      box-shadow: 0 2px 5px rgba(0,0,0,0.2);
      z-index: 1000;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .logo img {
      height: 40px;
      width: auto;
    }

    .btn-retour {
      background-color: #fff;
      color: #1e3c72;
      font-weight: 600;
      padding: 0.5rem 1.5rem;
      border-radius: 50px;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      box-shadow: 0 2px 10px rgba(0,0,0,0.2);
    }

    .btn-retour:hover {
      background-color: #2a5298;
      color: #fff;
      transform: translateY(-2px);
    }

    .btn-retour .bi {
      font-size: 1.2rem;
    }

    @media (max-width: 768px) {
      h2 {
        font-size: 2rem;
      }
      .table th,
      .table td {
        font-size: 0.9rem;
        padding: 0.75rem;
      }
      .total {
        font-size: 1rem;
        text-align: center;
      }
      .header {
        padding: 0.75rem 1rem;
      }
      .logo img {
        height: 30px;
      }
      .btn-retour {
        padding: 0.4rem 1rem;
        font-size: 0.9rem;
      }
    }

    @media (max-width: 576px) {
      .table-responsive {
        font-size: 0.85rem;
      }
      .table th,
      .table td {
        padding: 0.5rem;
      }
      .header {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
      }
      .btn-retour {
        width: 100%;
        justify-content: center;
      }
    }
  </style>
</head>
<body>
  <div class="header">
    <a href="accueil.php" class="btn-retour">
      <i class="bi bi-arrow-right"></i> Retour
    </a>
  </div>

  <div class="container mt-5">
    <h2>Liste des Recettes</h2>
    <div class="table-responsive">
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
            <td><?= number_format($recette['montant_milliards'], 0, ',', ' ') ?></td>
            <td><?= $recette['created_at'] ?></td>
            <td><?= $recette['type_recette_id'] ?></td>
            <td><?= $recette['source_detail'] ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <p class="total"><strong>Total général :</strong> <?= number_format(array_sum(array_column($recettes, 'montant')), 0, ',', ' ') ?> Ar</p>
  </div>

  <!-- Bootstrap JS (hors ligne) -->
  <script src="../asset/bootstrap5_3/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>