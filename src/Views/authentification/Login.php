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
        <a href="SignUp" class="nav-button logout">SignUp</a>
    </div>
</div>
<body>


<!-- LOGIN -->
<div class="container">
    <div class="card">
        <h2>Connexion</h2>
        <form method = "POST" action= "auth/Login" >
            <div class="input-group">
                <input type="email" placeholder="Email" name = 'email' required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Mot de passe" required>
            </div>
            <button class="btn">Se connecter</button>
        </form>

        <div class="switch">
            Pas de compte ? <a href="signup">Créer un compte</a>
        </div>
    </div>
</div>

</body>
</html>
