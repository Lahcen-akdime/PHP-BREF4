<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
       <link rel="stylesheet" href="/PHP-BREF4/src/Views/Public/style.css">
</head>


<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="logo">LegalHub</div>
    <div>
        <a href="SignUp" class="nav-button logout">Sign Up</a>
    </div>
</div>

<!-- LOGIN -->
<div class="container">
    <div class="card">
        <h2>Connexion</h2>
        <form>
            <div class="input-group">
                <input type="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Mot de passe" required>
            </div>
            <button class="btn">Se connecter</button>
        </form>

        <div class="switch">
            Pas de compte ? <a href="SignUp">Créer un compte</a>
        </div>
    </div>
</div>

</body>
</html>
