document.addEventListener('DOMContentLoaded', function() {
    // Validation du formulaire côté client
    const contactForm = document.getElementById('contactFormElement');
    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const phoneInput = document.getElementById('phone');
    const messageInput = document.getElementById('message');
    const captchaInput = document.getElementById('captcha');
    const submitButton = document.getElementById('submitButton');
    const charCountElement = document.getElementById('charCount');
  
    if (contactForm) {
      // Compteur de caractères pour le message
      if (messageInput && charCountElement) {
        messageInput.addEventListener('input', function() {
          const charCount = this.value.length;
          charCountElement.textContent = charCount;
          
          // Changer la couleur si on approche de la limite
          if (charCount > 950) {
            charCountElement.style.color = 'rgb(239, 68, 68)';
          } else {
            charCountElement.style.color = '';
          }
        });
      }
  
      // Validation en temps réel du nom
      if (nameInput) {
        nameInput.addEventListener('blur', function() {
          validateField(this, function(value) {
            return value.length >= 2 && value.length <= 50;
          }, 'Veuillez entrer un nom valide (2-50 caractères).');
        });
      }
  
      // Validation en temps réel de l'email
      if (emailInput) {
        emailInput.addEventListener('blur', function() {
          validateField(this, function(value) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(value);
          }, 'Veuillez entrer une adresse email valide.');
        });
      }
  
      // Validation en temps réel du téléphone (si rempli)
      if (phoneInput) {
        phoneInput.addEventListener('blur', function() {
          if (this.value.trim() !== '') {
            validateField(this, function(value) {
              const phoneRegex = /^[0-9+\s\(\)-]{6,20}$/;
              return phoneRegex.test(value);
            }, 'Veuillez entrer un numéro de téléphone valide.');
          } else {
            // Réinitialiser le style car le champ est optionnel
            this.classList.remove('input-error');
            const errorElement = this.parentNode.querySelector('.form-error');
            if (errorElement) {
              errorElement.remove();
            }
          }
        });
      }
  
      // Validation du message
      if (messageInput) {
        messageInput.addEventListener('blur', function() {
          validateField(this, function(value) {
            return value.length >= 10 && value.length <= 1000;
          }, 'Veuillez entrer un message valide (10-1000 caractères).');
        });
      }
  
      // Soumission du formulaire avec validation
      contactForm.addEventListener('submit', function(e) {
        let isValid = true;
        
        // Vérifier le nom
        if (!validateField(nameInput, function(value) {
          return value.length >= 2 && value.length <= 50;
        }, 'Veuillez entrer un nom valide (2-50 caractères).')) {
          isValid = false;
        }
        
        // Vérifier l'email
        if (!validateField(emailInput, function(value) {
          const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
          return emailRegex.test(value);
        }, 'Veuillez entrer une adresse email valide.')) {
          isValid = false;
        }
        
        // Vérifier le téléphone (si rempli)
        if (phoneInput.value.trim() !== '') {
          if (!validateField(phoneInput, function(value) {
            const phoneRegex = /^[0-9+\s\(\)-]{6,20}$/;
            return phoneRegex.test(value);
          }, 'Veuillez entrer un numéro de téléphone valide.')) {
            isValid = false;
          }
        }
        
        // Vérifier le message
        if (!validateField(messageInput, function(value) {
          return value.length >= 10 && value.length <= 1000;
        }, 'Veuillez entrer un message valide (10-1000 caractères).')) {
          isValid = false;
        }
        
        // Si le formulaire n'est pas valide, on empêche l'envoi
        if (!isValid) {
          e.preventDefault();
          return false;
        }
        
        // Désactiver le bouton pendant l'envoi pour éviter les soumissions multiples
        submitButton.disabled = true;
        submitButton.textContent = 'Envoi en cours...';
        
        // Le formulaire est valide, il sera soumis
        return true;
      });
    }
  
    // Fonction utilitaire pour valider un champ
    function validateField(field, validationFn, errorMessage) {
      if (!field) return true;
      
      const value = field.value.trim();
      const isValid = validationFn(value);
      
      // Supprimer l'ancien message d'erreur s'il existe
      const existingError = field.parentNode.querySelector('.form-error');
      if (existingError) {
        existingError.remove();
      }
      
      if (!isValid) {
        // Ajouter la classe d'erreur et le message
        field.classList.add('input-error');
        
        const errorElement = document.createElement('div');
        errorElement.className = 'form-error';
        errorElement.textContent = errorMessage;
        
        field.parentNode.appendChild(errorElement);
      } else {
        // Réinitialiser le style
        field.classList.remove('input-error');
      }
      
      return isValid;
    }
    
    // Réinitialiser le formulaire lorsqu'on clique sur "Envoyer un autre message"
    const sendAnotherButton = document.getElementById('sendAnotherMessage');
    if (sendAnotherButton) {
      sendAnotherButton.addEventListener('click', function() {
        const successMessage = document.getElementById('successMessage');
        const contactFormContainer = document.getElementById('contactForm');
        
        if (successMessage && contactFormContainer) {
          successMessage.classList.add('hidden');
          contactFormContainer.classList.remove('hidden');
          contactForm.reset();
          charCountElement.textContent = '0';
        }
      });
    }
  });