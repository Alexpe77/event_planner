document.addEventListener('DOMContentLoaded', function() {
    // Navbar scroll effect
    const navbar = document.getElementById('navbar');
    const handleScroll = () => {
      if (window.scrollY > 50) {
        navbar.classList.add('navbar-scrolled');
      } else {
        navbar.classList.remove('navbar-scrolled');
      }
    };
    window.addEventListener('scroll', handleScroll);
    handleScroll(); // Initial check
  
    // Mobile menu toggle
    const menuToggle = document.getElementById('menuToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    menuToggle.addEventListener('click', () => {
      mobileMenu.classList.toggle('open');
      if (mobileMenu.classList.contains('open')) {
        menuToggle.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>';
      } else {
        menuToggle.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>';
      }
    });
  
    // Hide mobile menu when clicking on a link
    const mobileLinks = document.querySelectorAll('.navbar-mobile-link');
    mobileLinks.forEach(link => {
      link.addEventListener('click', () => {
        mobileMenu.classList.remove('open');
        menuToggle.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>';
      });
    });
  
    // Animation on scroll
    const animatedElements = document.querySelectorAll('.animated');
    const observerOptions = {
      root: null,
      rootMargin: '0px',
      threshold: 0.1
    };
  
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const element = entry.target;
          const delay = element.getAttribute('data-delay') || 0;
          setTimeout(() => {
            element.classList.add('visible');
          }, delay);
          observer.unobserve(element);
        }
      });
    }, observerOptions);
  
    animatedElements.forEach(element => {
      observer.observe(element);
    });
  
    // Portfolio filtering
    const portfolioItems = document.querySelectorAll('.portfolio-item');
    const filterButtons = document.querySelectorAll('[data-filter]');
  
    filterButtons.forEach(button => {
      button.addEventListener('click', () => {
        // Update active button styling
        filterButtons.forEach(btn => {
          btn.classList.remove('filter-button-default');
          btn.classList.add('filter-button-outline');
        });
        button.classList.remove('filter-button-outline');
        button.classList.add('filter-button-default');
  
        const filterValue = button.getAttribute('data-filter');
        
        portfolioItems.forEach(item => {
          const itemCategory = item.getAttribute('data-category');
          if (filterValue === 'all' || filterValue === itemCategory) {
            item.style.display = 'block';
          } else {
            item.style.display = 'none';
          }
        });
      });
    });
  
    // Portfolio modal
    const portfolioModal = document.getElementById('portfolioModal');
    const modalContent = document.getElementById('modalContent');
    const modalClose = document.getElementById('modalClose');
    const projects = [
      {
        id: 1,
        title: "Mariage de Jardin Élégant",
        category: "Mariage",
        location: "Domaine de Rosewood",
        image: "https://images.unsplash.com/photo-1465495976277-4387d4b0b4c0?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80",
        description: "Un luxueux mariage de jardin avec 150 invités, comprenant une arche florale personnalisée, une expérience gastronomique et une réception nocturne enchantée sous les étoiles."
      },
      {
        id: 2,
        title: "Sommet de Leadership d'Entreprise",
        category: "Entreprise",
        location: "Le Grand Hôtel",
        image: "https://images.unsplash.com/photo-1560523159-4a9692d222f8?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80",
        description: "Un sommet exécutif de trois jours pour 200 leaders commerciaux internationaux, comprenant des conférenciers principaux, des sessions d'ateliers et des événements de réseautage élégants."
      },
      {
        id: 3,
        title: "Dîner de Gala de Charité",
        category: "NonProfit",
        location: "Musée Métropolitain",
        image: "https://images.unsplash.com/photo-1607292803129-b7f29e025a5a?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80",
        description: "Gala annuel de collecte de fonds pour 300 invités qui a permis de recueillir plus de 500 000 € pour l'éducation des enfants, comprenant des enchères silencieuses, des spectacles en direct et un repas gastronomique."
      },
      {
        id: 4,
        title: "Week-end d'Anniversaire",
        category: "Social",
        location: "Villa Côtière",
        image: "https://images.unsplash.com/photo-1517857399767-a9a54d67c546?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80",
        description: "Une célébration de week-end de luxe pour un anniversaire important, comprenant une réception d'accueil, un dîner au bord de la plage et diverses expériences organisées pour 50 invités."
      },
      {
        id: 5,
        title: "Lancement de Produit",
        category: "Entreprise",
        location: "Espace Galerie Urbaine",
        image: "https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80",
        description: "Révélation innovante de produit pour 300 participants, comprenant des démonstrations interactives, des partenariats d'influenceurs et un service de restauration sophistiqué dans un espace industriel transformé."
      },
      {
        id: 6,
        title: "Renouvellement de Vœux Intime",
        category: "Mariage",
        location: "Falaises en Bord de Mer",
        image: "https://images.unsplash.com/photo-1532712938310-34cb3982ef74?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80",
        description: "Une cérémonie significative pour 30 membres proches de la famille, célébrant 25 ans de mariage avec des détails personnalisés et une réception au coucher du soleil."
      }
    ];
  
    portfolioItems.forEach(item => {
      item.addEventListener('click', () => {
        const projectId = parseInt(item.getAttribute('data-id'));
        const project = projects.find(p => p.id === projectId);
        
        if (project) {
          modalContent.innerHTML = `
            <div class="modal-image">
              <img 
                src="${project.image}" 
                alt="${project.title}" 
                class="w-full h-full object-cover"
              />
            </div>
            <div class="modal-details">
              <span class="portfolio-category">${project.category}</span>
              <h3 class="text-2xl font-serif font-medium mt-1 mb-2">${project.title}</h3>
              <p class="text-sm font-medium">${project.location}</p>
              <div class="mt-4 flex-grow">
                <p class="text-muted-foreground">${project.description}</p>
              </div>
            </div>
          `;
          
          portfolioModal.classList.add('open');
          document.body.style.overflow = 'hidden';
        }
      });
    });
  
    modalClose.addEventListener('click', () => {
      portfolioModal.classList.remove('open');
      document.body.style.overflow = 'auto';
    });
  
    // Contact form
    const contactForm = document.getElementById('contactFormElement');
    const successMessage = document.getElementById('successMessage');
    const contactFormContainer = document.getElementById('contactForm');
    const sendAnother = document.getElementById('sendAnotherMessage');
  
    if (contactForm) {
      contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Normally would submit form data here via AJAX
        // For demo purposes, just show success message after brief delay
        setTimeout(() => {
          contactFormContainer.classList.add('hidden');
          successMessage.classList.remove('hidden');
        }, 1000);
      });
    }
  
    if (sendAnother) {
      sendAnother.addEventListener('click', function() {
        successMessage.classList.add('hidden');
        contactFormContainer.classList.remove('hidden');
        contactForm.reset();
      });
    }
  
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          window.scrollTo({
            top: target.offsetTop - 80,
            behavior: 'smooth'
          });
        }
      });
    });
  });