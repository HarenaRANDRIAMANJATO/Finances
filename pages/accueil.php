<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Accueil LF 2025 - Finance</title>

  <!-- Bootstrap CSS (hors ligne) -->
  <link rel="stylesheet" href="../asset/bootstrap5_3/bootstrap/css/bootstrap.min.css" />

  <!-- Bootstrap Icons (optionnel, inclus pour les icônes) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

  <style>
    body, html {
      height: 100%;
      margin: 0;
      background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    h1 {
      font-size: 2.5rem;
      font-weight: 700;
      color: #1e3c72;
      text-shadow: 0 2px 5px rgba(0,0,0,0.1);
      margin-bottom: 3rem;
      padding-top: 2rem;
    }

    .container {
      padding-top: 2rem;
      padding-bottom: 4rem;
    }

    .card {
      border: none;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      background-color: #fff;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 25px rgba(0,0,0,0.3);
    }

    .card-img-top {
      width: 100%;
      height: 230px;
      object-fit: cover;
    }

    .card-body {
      text-align: center;
      padding: 1.5rem;
    }

    .card-title {
      font-size: 1.25rem;
      font-weight: 600;
      color: #1e3c72;
      margin-bottom: 1rem;
    }

    .btn-primary {
      background-color: #1e3c72;
      border-color: #1e3c72;
      font-size: 1rem;
      font-weight: 600;
      padding: 0.75rem 2rem;
      border-radius: 50px;
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #2a5298;
      border-color: #2a5298;
      transform: translateY(-2px);
    }

    .row {
      display: flex;
      justify-content: center;
      gap: 1.5rem;
      flex-wrap: wrap;
    }

    @media (max-width: 768px) {
      h1 {
        font-size: 2rem;
      }
      .card {
        width: 100%;
        max-width: 20rem;
      }
    }

    @media (max-width: 576px) {
      .card {
        max-width: 100%;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="mb-4 text-center">LF 2025 - Finance</h1>

    <div class="row justify-content-center">
      <div class="col-md-3 mb-3">
        <div class="card">
          <img src="../img/recette.avif" class="card-img-top" alt="Recettes" />
          <div class="card-body">
            <h5 class="card-title">Recettes et Dons</h5>
            <a href="annee.php" class="btn btn-primary">Voir +</a>
          </div>
        </div>
      </div>

      <div class="col-md-3 mb-3">
        <div class="card">
          <img src="../img/depense.jpg" class="card-img-top" alt="Dépenses" />
          <div class="card-body">
            <h5 class="card-title">Dépenses</h5>
            <a href="depense.php" class="btn btn-primary">Voir +</a>
          </div>
        </div>
      </div>

      <div class="col-md-3 mb-3">
        <div class="card">
          <img src="../img/tax.webp" class="card-img-top" alt="Déficits" />
          <div class="card-body">
            <h5 class="card-title">Déficits</h5>
            <a href="deficit.php" class="btn btn-primary">Voir +</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS (hors ligne) -->
  <script src="../asset/bootstrap5_3/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>