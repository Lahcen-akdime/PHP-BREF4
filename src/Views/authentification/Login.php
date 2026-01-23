<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
       <link rel="stylesheet" href="/ISTICHARA/src/Views/authentification/style.css">
</head>


<!-- NAVBAR -->
<div class="navbar">
    <div class="logo">LegalHub</div>
    <div>
        <a href="form" class="nav-button logout">SignUp</a>
    </div>
</div>
<body>

<!-- LOGIN -->
<div class="container">
    <div class="card">
     <?php if (!empty($_SESSION['success'])): ?>
        <p style="color:green"><?= $_SESSION['success']; unset($_SESSION['success']); ?></p>
    <?php endif; ?>
        <h2>Connexion</h2>
        <form method = "POST" action= "Login" >
            <div class="input-group">
                <input type="email" placeholder="Email" name = 'email' required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Mot de passe" name = 'password' required>
            </div>
            <?php if (!empty($_SESSION['error'])): ?>
                <p style="color:red"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p>
            <?php endif; ?>
            <button name = "submitLogin" class="btn">Se connecter</button>
        </form>

        <div class="switch">
            Pas de compte ? <a href="form">Créer un compte</a>
        </div>
    </div>
</div>

</body>
</html>
