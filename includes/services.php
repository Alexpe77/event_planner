<section id="services" class="section">
  <div class="max-container">
    <div class="text-center mb-16 animated fade-up">
      <h2 class="text-4xl font-semibold mb-4">Nos Services</h2>
      <p class="text-muted-foreground max-w-2xl mx-auto">
        Nous proposons une gamme complète de services d'organisation d'événements adaptés à vos besoins spécifiques.
      </p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <?php
      $services = [
        [
          "icon" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg>',
          "title" => "Planification d'événements",
          "description" => "De la conceptualisation à l'exécution, nous gérons chaque aspect de votre événement pour garantir une expérience sans stress."
        ],
        [
          "icon" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>',
          "title" => "Design & Décoration",
          "description" => "Nous créons des décors personnalisés qui capturent l'essence de votre vision et transforment n'importe quel espace en un lieu magique."
        ],
        [
          "icon" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg>',
          "title" => "Sélection de lieu",
          "description" => "Nous vous aidons à trouver le lieu parfait qui répond à toutes vos exigences, qu'il s'agisse d'un cadre intime ou d'un grand espace."
        ],
        [
          "icon" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 8h3a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2h-3"></path><path d="M11 18V6l-8 6 8 6"></path></svg>',
          "title" => "Coordination jour-J",
          "description" => "Notre équipe assure le bon déroulement de votre événement, permettant à vous et vos invités de profiter pleinement du moment."
        ],
        [
          "icon" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"></rect><path d="M6 8h.01"></path><path d="M10 8h.01"></path><path d="M14 8h.01"></path><path d="M18 8h.01"></path><path d="M8 12h.01"></path><path d="M12 12h.01"></path><path d="M16 12h.01"></path><path d="M7 16h10"></path></svg>',
          "title" => "Gestion des fournisseurs",
          "description" => "Nous coordonnons avec les meilleurs fournisseurs pour assurer que chaque aspect de votre événement soit impeccable."
        ],
        [
          "icon" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>',
          "title" => "Consultation événementielle",
          "description" => "Besoin de conseils d'experts? Nous offrons des consultations personnalisées pour vous aider à planifier votre événement parfait."
        ]
      ];
      
      foreach ($services as $index => $service) {
        echo '<div class="glass-card p-6 rounded-xl animated fade-up" data-delay="' . ($index * 100) . '">
          <div class="h-12 w-12 rounded-full bg-primary/10 flex items-center justify-center mb-4">
            ' . $service["icon"] . '
          </div>
          <h3 class="text-xl font-medium mb-2">' . $service["title"] . '</h3>
          <p class="text-muted-foreground">' . $service["description"] . '</p>
        </div>';
      }
      ?>
    </div>
  </div>
</section>