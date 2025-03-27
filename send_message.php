<?php
// Démarrer la session PHP (nécessaire pour CSRF)
session_start();

// Fonction pour générer un token CSRF
function generateCSRFToken() {
  if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
  }
  return $_SESSION['csrf_token'];
}

// Fonction pour valider un email
function isValidEmail($email) {
  return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Fonction pour nettoyer les données
function cleanInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Vérification du token CSRF
  if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    // Token CSRF invalide, rediriger avec un message d'erreur
    header("Location: index.php?error=security#contact");
    exit;
  }
  
  // Vérification honeypot (champ caché pour détecter les bots)
  if (!empty($_POST['website'])) {
    // Si le champ honeypot est rempli, c'est probablement un bot
    // On simule un succès mais on n'envoie pas l'email
    header("Location: index.php?sent=success#contact");
    exit;
  }
  
  // Limiter la fréquence des soumissions (protection contre les attaques par force brute)
  if (isset($_SESSION['last_submission_time'])) {
    $timeSinceLastSubmission = time() - $_SESSION['last_submission_time'];
    if ($timeSinceLastSubmission < 30) { // 30 secondes minimum entre deux soumissions
      header("Location: index.php?error=rate_limit#contact");
      exit;
    }
  }
  $_SESSION['last_submission_time'] = time();
  
  // Validation et nettoyage des entrées
  $errors = [];
  
  // Validation du nom (obligatoire, entre 2 et 50 caractères)
  $name = cleanInput(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
  if (empty($name) || strlen($name) < 2 || strlen($name) > 50) {
    $errors[] = 'name';
  }
  
  // Validation de l'email (obligatoire et format valide)
  $email = cleanInput(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
  if (empty($email) || !isValidEmail($email)) {
    $errors[] = 'email';
  }
  
  // Validation du téléphone (facultatif mais format valide si renseigné)
  $phone = cleanInput(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING));
  if (!empty($phone) && !preg_match('/^[0-9+\s\(\)-]{6,20}$/', $phone)) {
    $errors[] = 'phone';
  }
  
  // Validation du type d'événement (facultatif, max 100 caractères)
  $eventType = cleanInput(filter_input(INPUT_POST, 'eventType', FILTER_SANITIZE_STRING));
  if (!empty($eventType) && strlen($eventType) > 100) {
    $errors[] = 'eventType';
  }
  
  // Validation du message (obligatoire, entre 10 et 1000 caractères)
  $message = cleanInput(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING));
  if (empty($message) || strlen($message) < 10 || strlen($message) > 1000) {
    $errors[] = 'message';
  }
  
  // Si des erreurs sont détectées, rediriger avec les erreurs
  if (!empty($errors)) {
    $errorString = implode(',', $errors);
    header("Location: index.php?error=validation&fields=$errorString#contact");
    exit;
  }
  
  // Configuration pour l'envoi de l'email
  $to = "contact@eventopia.com"; // Remplacer par votre adresse email
  $subject = "Nouvelle demande de contact - Eventopia";

   // Création du contenu de l'email avec des entêtes pour éviter l'injection
   $email_content = "Nom: " . $name . "\n";
   $email_content .= "Email: " . $email . "\n";
   if (!empty($phone)) {
     $email_content .= "Téléphone: " . $phone . "\n";
   }
   if (!empty($eventType)) {
     $email_content .= "Type d'événement: " . $eventType . "\n\n";
   }
   $email_content .= "Message:\n" . $message . "\n";
   
   // Entêtes de l'email sécurisés
   $headers = "From: " . $to . "\r\n"; // Utiliser votre propre email comme expéditeur
   $headers .= "Reply-To: " . $email . "\r\n";
   $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
   $headers .= "MIME-Version: 1.0\r\n";
   $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
   
   // Journalisation de la tentative d'envoi (optionnel, pour les environnements de production)
   // error_log("Tentative d'envoi d'un message de " . $email . " le " . date('Y-m-d H:i:s'));
   
   // Envoi de l'email
   // En production, vous utiliseriez mail() ou une bibliothèque comme PHPMailer
   $mailSent = false;
   // $mailSent = mail($to, $subject, $email_content, $headers);
   
   // Simulation d'un envoi réussi pour cet exemple
   $mailSent = true;
   
   // Régénérer un nouveau token CSRF après une soumission réussie
   generateCSRFToken();
   
   // Redirection avec un paramètre de succès ou d'échec
   if ($mailSent) {
     header("Location: index.php?sent=success#contact");
   } else {
     header("Location: index.php?error=mail_error#contact");
   }
   exit;
 }
 
 // Si ce n'est pas une requête POST, générer un token CSRF pour le formulaire
 $csrf_token = generateCSRFToken();
 ?>
 