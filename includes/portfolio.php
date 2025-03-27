<section id="portfolio" class="section portfolio">
  <div class="max-container">
    <div class="text-center mb-16 animated fade-up">
      <h2 class="text-4xl font-semibold mb-4">Notre Portfolio</h2>
      <p class="text-muted-foreground max-w-2xl mx-auto">
        Explorez notre collection d'événements et de célébrations exceptionnels que nous avons eu le privilège de créer.
      </p>
      
      <div class="portfolio-filters">
        <button class="filter-button filter-button-default" data-filter="all">Tous</button>
        <button class="filter-button filter-button-outline" data-filter="Mariage">Mariage</button>
        <button class="filter-button filter-button-outline" data-filter="Entreprise">Entreprise</button>
        <button class="filter-button filter-button-outline" data-filter="Social">Social</button>
        <button class="filter-button filter-button-outline" data-filter="NonProfit">Association</button>
      </div>
    </div>
    
    <div class="portfolio-grid" id="portfolioGrid">
      <?php
      $projects = [
        [
          "id" => 1,
          "title" => "Mariage de Jardin Élégant",
          "category" => "Mariage",
          "location" => "Domaine de Rosewood",
          "image" => "https://images.unsplash.com/photo-1465495976277-4387d4b0b4c0?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80",
          "description" => "Un luxueux mariage de jardin avec 150 invités, comprenant une arche florale personnalisée, une expérience gastronomique et une réception nocturne enchantée sous les étoiles."
        ],
        [
          "id" => 2,
          "title" => "Sommet de Leadership d'Entreprise",
          "category" => "Entreprise",
          "location" => "Le Grand Hôtel",
          "image" => "https://images.unsplash.com/photo-1560523159-4a9692d222f8?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80",
          "description" => "Un sommet exécutif de trois jours pour 200 leaders commerciaux internationaux, comprenant des conférenciers principaux, des sessions d'ateliers et des événements de réseautage élégants."
        ],
        [
          "id" => 3,
          "title" => "Dîner de Gala de Charité",
          "category" => "NonProfit",
          "location" => "Musée Métropolitain",
          "image" => "https://images.unsplash.com/photo-1607292803129-b7f29e025a5a?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80",
          "description" => "Gala annuel de collecte de fonds pour 300 invités qui a permis de recueillir plus de 500 000 € pour l'éducation des enfants, comprenant des enchères silencieuses, des spectacles en direct et un repas gastronomique."
        ],
        [
          "id" => 4,
          "title" => "Week-end d'Anniversaire",
          "category" => "Social",
          "location" => "Villa Côtière",
          "image" => "https://images.unsplash.com/photo-1517857399767-a9a54d67c546?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80",
          "description" => "Une célébration de week-end de luxe pour un anniversaire important, comprenant une réception d'accueil, un dîner au bord de la plage et diverses expériences organisées pour 50 invités."
        ],
        [
          "id" => 5,
          "title" => "Lancement de Produit",
          "category" => "Entreprise",
          "location" => "Espace Galerie Urbaine",
          "image" => "https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80",
          "description" => "Révélation innovante de produit pour 300 participants, comprenant des démonstrations interactives, des partenariats d'influenceurs et un service de restauration sophistiqué dans un espace industriel transformé."
        ],
        [
          "id" => 6,
          "title" => "Renouvellement de Vœux Intime",
          "category" => "Mariage",
          "location" => "Falaises en Bord de Mer",
          "image" => "https://images.unsplash.com/photo-1532712938310-34cb3982ef74?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80",
          "description" => "Une cérémonie significative pour 30 membres proches de la famille, célébrant 25 ans de mariage avec des détails personnalisés et une réception au coucher du soleil."
        ]
      ];
      
      foreach ($projects as $index => $project) {
        echo '<div class="portfolio-item animated fade-up" data-delay="' . ($index * 100) . '" data-category="' . $project["category"] . '" data-id="' . $project["id"] . '">
          <div class="portfolio-image-container">
            <div class="portfolio-image">
              <img 
                src="' . $project["image"] . '" 
                alt="' . $project["title"] . '" 
                class="w-full h-full object-cover"
              />
            </div>
          </div>
          <div class="portfolio-content">
            <span class="portfolio-category">' . $project["category"] . '</span>
            <h3 class="portfolio-title">' . $project["title"] . '</h3>
            <p class="portfolio-location">' . $project["location"] . '</p>
          </div>
        </div>';
      }
      ?>
    </div>
  </div>
  
  <div class="modal" id="portfolioModal">
    <div class="modal-content">
      <div class="modal-close" id="modalClose">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
      </div>
      <div class="modal-grid" id="modalContent">
        <!-- Content will be populated by JavaScript -->
      </div>
    </div>
  </div>
</section>