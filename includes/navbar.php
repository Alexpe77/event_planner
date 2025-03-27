<nav class="navbar" id="navbar">
  <div class="max-container flex items-center justify-between">
    <a href="#home" class="navbar-brand">
      Eventopia
    </a>

    <!-- Desktop Navigation -->
    <div class="navbar-desktop space-x-8">
      <a href="#home" class="navbar-link">Accueil</a>
      <a href="#services" class="navbar-link">Services</a>
      <a href="#about" class="navbar-link">À propos</a>
      <a href="#portfolio" class="navbar-link">Portfolio</a>
      <a href="#contact" class="navbar-link">Contact</a>
    </div>

    <!-- Mobile Menu Button -->
    <button 
      class="navbar-mobile-toggle"
      id="menuToggle"
      aria-label="Toggle Menu"
    >
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <line x1="3" y1="12" x2="21" y2="12"></line>
        <line x1="3" y1="6" x2="21" y2="6"></line>
        <line x1="3" y1="18" x2="21" y2="18"></line>
      </svg>
    </button>
  </div>

  <!-- Mobile Navigation -->
  <div class="navbar-mobile" id="mobileMenu">
    <div class="flex flex-col space-y-4">
      <a href="#home" class="navbar-mobile-link">Accueil</a>
      <a href="#services" class="navbar-mobile-link">Services</a>
      <a href="#about" class="navbar-mobile-link">À propos</a>
      <a href="#portfolio" class="navbar-mobile-link">Portfolio</a>
      <a href="#contact" class="navbar-mobile-link">Contact</a>
    </div>
  </div>
</nav>