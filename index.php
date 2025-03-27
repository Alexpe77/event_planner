
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Eventopia | Premier Service d'Événementiel</title>
    <meta name="description" content="Eventopia - Créer des moments inoubliables et des événements exceptionnels. Services professionnels d'organisation d'événements pour mariages, événements d'entreprise et rassemblements sociaux." />
    <meta name="author" content="Eventopia" />

    <meta property="og:title" content="Eventopia | Premier Service d'Événementiel" />
    <meta property="og:description" content="Créer des moments inoubliables et des événements exceptionnels. Services professionnels d'organisation d'événements pour toutes occasions." />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://images.unsplash.com/photo-1519167758481-83f550bb49b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@eventopia" />
    <meta name="twitter:image" content="https://images.unsplash.com/photo-1519167758481-83f550bb49b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" />
    
    <link rel="icon" type="image/svg+xml" href="favicon.ico" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/form.css">
    
    <meta http-equiv="Content-Security-Policy" content="default-src 'self'; style-src 'self' https://fonts.googleapis.com 'unsafe-inline'; font-src 'self' https://fonts.gstatic.com; img-src 'self' https://images.unsplash.com; script-src 'self';">
  </head>

  <body>
    <div class="min-h-screen bg-background">
      <?php include 'includes/navbar.php'; ?>
      
      <main>
        <?php include 'includes/hero.php'; ?>
        <?php include 'includes/services.php'; ?>
        <?php include 'includes/about.php'; ?>
        <?php include 'includes/portfolio.php'; ?>
        <?php include 'includes/contact.php'; ?>
      </main>
      
      <?php include 'includes/footer.php'; ?>
    </div>

    <script src="js/main.js"></script>
    <script src="js/form-validation.js"></script>
  </body>
</html>