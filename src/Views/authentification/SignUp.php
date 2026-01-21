<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
       <link rel="stylesheet" href="/PHP-BREF4/src/Views/authentification/style.css">
</head>
    <!-- NAVBAR -->
<div class="navbar">
    <div class="logo">LegalHub</div>
    <div>
        <a href="Login" class="nav-button logout">Login</a>
    </div>
</div>
<div class="client-signup-wrapper">

  <div class="client-signup-card">

    <h2 class="client-signup-title">Créer un compte client</h2>
    <p class="client-signup-subtitle">
      Inscrivez-vous pour réserver vos consultations
    </p>

    <form>

      <div class="client-signup-group">
        <input type="text" placeholder="Nom complet" required>
      </div>

      <div class="client-signup-group">
        <input type="email" placeholder="Email" required>
      </div>

      <div class="client-signup-group">
        <input type="password" placeholder="Mot de passe" required>
      </div>

      <div class="client-signup-group">
        <input type="password" placeholder="Confirmer le mot de passe" required>
      </div>

      <button class="client-signup-btn">
        Créer le compte
      </button>

      <p class="client-signup-switch">
        Déjà inscrit ?
        <a href="Login">Se connecter</a>
      </p>

    </form>

  </div>

</div>
