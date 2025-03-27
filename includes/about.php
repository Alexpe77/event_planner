<section id="about" class="section">
  <div class="max-container">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
      <div class="animated fade-right relative">
        <div class="aspect-[3/4] rounded-2xl overflow-hidden shadow-xl">
          <img 
            src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?ixlib=rb-4.0.3&auto=format&fit=crop&w=900&q=80" 
            alt="Portrait d'organisateur d'événements" 
            class="w-full h-full object-cover"
          />
        </div>
        <div class="quote-card">
          <p class="quote-text">
            "Chaque événement raconte une histoire unique."
          </p>
        </div>
      </div>
      
      <div class="animated fade-left" data-delay="200">
        <span class="badge">
          À propos de nous
        </span>
        <h2 class="text-4xl font-semibold mb-6">Transformer votre vision en réalité</h2>
        <p class="text-muted-foreground mb-8">
          Avec plus d'une décennie d'expérience dans l'organisation d'événements, nous avons bâti une réputation pour la création d'expériences fluides et mémorables. Notre approche combine une attention méticuleuse aux détails, une vision créative et un service personnalisé pour donner vie à vos rêves.
        </p>
        
        <div class="feature-list">
          <?php
          $features = [
            "Planification personnalisée adaptée à votre vision",
            "Coordination experte de la conception à l'exécution",
            "Réseau sélectionné de fournisseurs et lieux premium",
            "Attention aux détails qui dépasse les attentes"
          ];
          
          foreach ($features as $feature) {
            echo '<div class="feature-item mb-4">
              <div class="feature-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
              </div>
              <p>' . $feature . '</p>
            </div>';
          }
          ?>
        </div>
        
        <div class="stats-grid">
          <?php
          $stats = [
            ["number" => "200+", "label" => "Événements"],
            ["number" => "50+", "label" => "Lieux"],
            ["number" => "10+", "label" => "Années"]
          ];
          
          foreach ($stats as $stat) {
            echo '<div class="stat-item">
              <p class="stat-number">' . $stat["number"] . '</p>
              <p class="stat-label">' . $stat["label"] . '</p>
            </div>';
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>