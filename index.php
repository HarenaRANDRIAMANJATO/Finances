<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Accueil LF 2025</title>

  <!-- Bootstrap CSS (hors ligne) -->
  <link rel="stylesheet" href="asset/bootstrap5_3/bootstrap/css/bootstrap.min.css" />
  
  <style>
    /* Style personnalisé */
    body, html {
      height: 100%;
      margin: 0;
      background: linear-gradient(135deg, #1e3c72, #2a5298);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .hero {
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      color: white;
      padding: 2rem;
    }

    .hero h1 {
      font-size: 3.5rem;
      font-weight: 700;
      margin-bottom: 1rem;
      text-shadow: 0 2px 10px rgba(0,0,0,0.3);
    }

    .hero p {
      font-size: 1.25rem;
      margin-bottom: 2rem;
      max-width: 600px;
      opacity: 0.9;
    }

    .btn-visiter {
      font-size: 1.1rem;
      padding: 0.75rem 2rem;
      font-weight: 600;
      border-radius: 50px;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }

    .btn-visiter:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(0,0,0,0.3);
    }

    @media (max-width: 768px) {
      .hero h1 {
        font-size: 2.5rem;
      }
      .hero p {
        font-size: 1rem;
      }
    }
  </style>
</head>
<body>

  <div class="hero">
    <h1>Lois de Finance 2024-2025</h1>
    <p>Bienvenue dans l'avenir de l'innovation et de la performance.</p>

    <form action="pages/accueil.php" class="d-inline">
      <button type="submit" class="btn btn-light btn-lg btn-visiter">
        Visiter
      </button>
    </form>
  </div>

  <!-- Bootstrap JS (hors ligne) -->
  <script src="../asset/bootstrap5_3/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>