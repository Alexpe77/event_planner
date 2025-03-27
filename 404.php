<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Page non trouvée | Eventopia</title>
    <meta name="description" content="Page non trouvée - Eventopia - Service professionnel d'organisation d'événements." />
    <meta name="author" content="Eventopia" />
    
    <link rel="icon" type="image/svg+xml" href="favicon.ico" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/404.css">
    
    <!-- CSP pour améliorer la sécurité -->
    <meta http-equiv="Content-Security-Policy" content="default-src 'self'; style-src 'self' https://fonts.googleapis.com 'unsafe-inline'; font-src 'self' https://fonts.gstatic.com; img-src 'self' https://images.unsplash.com; script-src 'self';">
  </head>

  <body>
    <div class="min-h-screen bg-background">
      <?php include 'includes/navbar.php'; ?>
      
      <main class="error-page">
        <div class="max-container error-container">
          <div class="error-content">
            <span class="error-badge">Erreur 404</span>
            <h1 class="error-title">Page Non Trouvée</h1>
            <p class="error-message">La page que vous recherchez n'existe pas ou a été déplacée.</p>
            <a href="index.php" class="btn btn-primary btn-lg">Retour à l'accueil</a>
          </div>
          <div class="error-image-container">
            <img src="https://images.unsplash.com/photo-1461749280684-dccba630e2f6?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" alt="Illustration page non trouvée" class="error-image">
          </div>
        </div>
      </main>
      
      <?php include 'includes/footer.php'; ?>
    </div>

    <script src="js/main.js"></script>
  </body>
</html>