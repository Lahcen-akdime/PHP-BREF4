<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
       <link rel="stylesheet" href="/PHP-BREF4/src/Views/authentification/style.css">
</head>

    <!-- NAVBAR -->
<div class="navbar">
    <div class="logo">LegalHub</div>
    <div>
        <a href="Login" class="nav-button logout">Login</a>
    </div>
</div>

<div class="auth-choice-wrapper">

  <div class="auth-choice-card">

    <h2 class="auth-choice-title">Créer un compte</h2>
    <p class="auth-choice-subtitle">Choisissez votre type de compte</p>

    <form method="POST" action="/PHP-BREF4/Auth/FormDire">

      <label class="auth-choice-option">
        <input type="radio" name="role" value="client" required>
        <div class="auth-choice-box">
          <span class="auth-choice-icon">👤</span>
          <div class="auth-choice-text">
            <h4>Client</h4>
            <p>Prendre des rendez-vous juridiques</p>
          </div>
        </div>
      </label>

      <label class="auth-choice-option">
        <input type="radio" name="role" value="pro">
        <div class="auth-choice-box">
          <span class="auth-choice-icon">🧑‍⚖️</span>
          <div class="auth-choice-text">
            <h4>Professionnel</h4>
            <p>Avocat ou Huissier</p>
          </div>
        </div>
      </label>

      <button class="auth-choice-btn">Continuer</button>

    </form>

  </div>

</div>
