<section id="contact" class="section">
  <div class="max-container">
    <div class="text-center mb-16 animated fade-up">
      <h2 class="text-4xl font-semibold mb-4">Contactez-nous</h2>
      <p class="text-muted-foreground max-w-2xl mx-auto">
        Prêt à planifier votre prochain événement ? Contactez-nous pour une consultation personnalisée.
      </p>
    </div>
    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
      <div class="animated fade-right">
        <div class="contact-card">
          <h3 class="text-2xl font-serif mb-6">Informations de Contact</h3>
          
          <div class="space-y-6">
            <div class="contact-info-item">
              <div class="contact-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
              </div>
              <div>
                <p class="font-medium">Email</p>
                <p class="text-muted-foreground">contact@eventopia.com</p>
              </div>
            </div>
            
            <div class="contact-info-item">
              <div class="contact-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
              </div>
              <div>
                <p class="font-medium">Téléphone</p>
                <p class="text-muted-foreground">+33 (1) 23 45 67 89</p>
              </div>
            </div>
            
            <div class="contact-info-item">
              <div class="contact-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
              </div>
              <div>
                <p class="font-medium">Bureau</p>
                <p class="text-muted-foreground">123 Avenue des Événements, Suite 400<br />7000 Mons</p>
              </div>
            </div>
            
            <div class="contact-info-item">
              <div class="contact-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
              </div>
              <div>
                <p class="font-medium">Heures de Bureau</p>
                <p class="text-muted-foreground">Lundi - Vendredi: 9:00 - 18:00</p>
              </div>
            </div>
          </div>
          
          <div class="mt-12">
            <img 
              src="https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6a3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" 
              alt="Intérieur de Bureau" 
              class="rounded-xl h-48 w-full object-cover shadow-md"
            />
          </div>
        </div>
      </div>
      
      <div class="animated fade-left" data-delay="200">
        <div id="contactForm" class="contact-form-card">
          <h3 class="text-2xl font-serif mb-6">Envoyez un Message</h3>
          
          <?php
          // Afficher des messages de succès ou d'erreur si présents dans l'URL
          if (isset($_GET['sent']) && $_GET['sent'] == 'success') {
            echo '<div class="alert alert-success mb-6">Votre message a été envoyé avec succès. Nous vous contacterons bientôt !</div>';
          }
          if (isset($_GET['error'])) {
            $errorType = $_GET['error'];
            $errorMsg = '';
            switch ($errorType) {
              case 'security':
                $errorMsg = 'Une erreur de sécurité s\'est produite. Veuillez réessayer.';
                break;
              case 'rate_limit':
                $errorMsg = 'Veuillez attendre quelques instants avant d\'envoyer un nouveau message.';
                break;
              case 'validation':
                $errorMsg = 'Veuillez vérifier les champs du formulaire et réessayer.';
                break;
              case 'mail_error':
                $errorMsg = 'Un problème est survenu lors de l\'envoi du message. Veuillez réessayer plus tard.';
                break;
              default:
                $errorMsg = 'Une erreur s\'est produite. Veuillez réessayer.';
            }
            echo '<div class="alert alert-error mb-6">' . $errorMsg . '</div>';
          }
          
          // Récupérer les champs en erreur (si présents)
          $errorFields = [];
          if (isset($_GET['fields'])) {
            $errorFields = explode(',', $_GET['fields']);
          }
          ?>

          <form action="send_message.php" method="POST" id="contactFormElement" class="space-y-5">
            <input type="hidden" name="csrf_token" value="<?php echo isset($csrf_token) ? $csrf_token : ''; ?>">
            <div class="honeypot">
              <input type="text" name="website" id="website" autocomplete="off" tabindex="-1">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
              <div class="form-group">
                <label for="name" class="form-label">
                  Nom Complet <span class="required">*</span>
                </label>
                <input
                  type="text"
                  id="name"
                  name="name"
                  class="form-input <?php echo in_array('name', $errorFields) ? 'input-error' : ''; ?>"
                  placeholder="Votre nom"
                  required
                  minlength="2"
                  maxlength="50"
                  value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>"
                />
                <?php if (in_array('name', $errorFields)): ?>
                  <div class="form-error">Veuillez entrer un nom valide (2-50 caractères).</div>
                <?php endif; ?>
              </div>
              
              <div class="form-group">
                <label for="email" class="form-label">
                  Adresse Email <span class="required">*</span>
                </label>
                <input
                  type="email"
                  id="email"
                  name="email"
                  class="form-input <?php echo in_array('email', $errorFields) ? 'input-error' : ''; ?>"
                  placeholder="votre@email.com"
                  required
                  value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
                />
                <?php if (in_array('email', $errorFields)): ?>
                  <div class="form-error">Veuillez entrer une adresse email valide.</div>
                <?php endif; ?>
              </div>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
              <div class="form-group">
                <label for="phone" class="form-label">
                  Numéro de Téléphone 
                </label>
                <input
                  type="tel"
                  id="phone"
                  name="phone"
                  class="form-input <?php echo in_array('phone', $errorFields) ? 'input-error' : ''; ?>"
                  placeholder="01 23 45 67 89"
                  value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>"
                />
                <?php if (in_array('phone', $errorFields)): ?>
                  <div class="form-error">Veuillez entrer un numéro de téléphone valide.</div>
                <?php endif; ?>
              </div>
              
              <div class="form-group">
                <label for="eventType" class="form-label">
                  Type d'Événement
                </label>
                <input
                  type="text"
                  id="eventType"
                  name="eventType"
                 class="form-input <?php echo in_array('eventType', $errorFields) ? 'input-error' : ''; ?>"
                  placeholder="Mariage, Entreprise, etc."
                  maxlength="100"
                  value="<?php echo isset($_POST['eventType']) ? htmlspecialchars($_POST['eventType']) : ''; ?>"
                />
                <?php if (in_array('eventType', $errorFields)): ?>
                  <div class="form-error">Le type d'événement est trop long (max 100 caractères).</div>
                <?php endif; ?>
              </div>
            </div>
            
            <div class="form-group">
              <label for="message" class="form-label">
                Votre Message <span class="required">*</span>
              </label>
              <textarea
                id="message"
                name="message"
                class="form-textarea <?php echo in_array('message', $errorFields) ? 'input-error' : ''; ?>"
                placeholder="Parlez-nous de votre événement..."
                rows="4"
                required
                minlength="10"
                maxlength="1000"
              ><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
              <?php if (in_array('message', $errorFields)): ?>
                <div class="form-error">Veuillez entrer un message valide (10-1000 caractères).</div>
              <?php endif; ?>
              <div class="text-right text-xs text-muted-foreground mt-1">
                <span id="charCount">0</span>/1000 caractères
              </div>
            </div>
            
            <div class="form-group">
              <div class="captcha-container">
                <!-- Vous pourriez ajouter ici un CAPTCHA plus sophistiqué comme reCAPTCHA -->
                <div class="simple-captcha">
                  <label for="captcha" class="form-label">
                    Sécurité <span class="required">*</span>
                  </label>
                  <div class="captcha-challenge">
                    <?php 
                    $num1 = rand(1, 10);
                    $num2 = rand(1, 10);
                    $_SESSION['captcha_result'] = $num1 + $num2;
                    echo "$num1 + $num2 = ?";
                    ?>
                  </div>
                  <input
                    type="number"
                    id="captcha"
                    name="captcha"
                    class="form-input"
                    required
                  />
                </div>
              </div>
            </div>
            
            <div class="form-group">
              <div class="flex items-start">
                <input
                  type="checkbox"
                  id="consent"
                  name="consent"
                  class="form-checkbox mt-1"
                  required
                />
                <label for="consent" class="ml-2 text-sm">
                  J'accepte que mes informations soient utilisées uniquement pour répondre à ma demande et accepte la <a href="#" class="text-primary hover:underline">politique de confidentialité</a>.
                </label>
              </div>
            </div>
            
            <button 
              type="submit" 
              class="btn btn-primary btn-lg form-submit"
              id="submitButton"
            >
              Envoyer le Message
            </button>
          </form>
        </div>
        
        <div id="successMessage" class="form-success contact-form-card hidden">
          <div class="success-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
          </div>
          <h3 class="text-2xl font-serif mb-4">Merci !</h3>
          <p class="text-muted-foreground max-w-md">
            Votre message à été reçu. Nous vous contacterons dès que possible pour discuter de vos besoins d'événement.
          </p>
          <button 
            class="btn btn-primary mt-6 rounded-full"
            id="sendAnotherMessage"
          >
            Envoyer un autre message
          </button>
        </div>
      </div>
    </div>
  </div>
</section>