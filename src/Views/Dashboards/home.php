<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Legal Services Platform - Home</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
            color: #e2e8f0;
            min-height: 100vh;
        }

        header {
            backdrop-filter: blur(10px);
            background: rgba(15, 23, 42, 0.8);
            border-bottom: 1px solid rgba(6, 182, 212, 0.2);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            sticky: top 0;
            z-index: 100;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #06b6d4 0%, #f59e0b 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        nav {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .nav-button {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 0.5rem;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .nav-button.nav-link {
            background: rgba(6, 182, 212, 0.1);
            color: #06b6d4;
            border: 1px solid rgba(6, 182, 212, 0.3);
        }

        .nav-button.nav-link:hover {
            background: rgba(6, 182, 212, 0.2);
            box-shadow: 0 0 20px rgba(6, 182, 212, 0.3);
            transform: translateY(-2px);
        }

        .nav-button.login {
            background: rgba(245, 158, 11, 0.1);
            color: #f59e0b;
            border: 1px solid rgba(245, 158, 11, 0.3);
        }

        .nav-button.login:hover {
            background: rgba(245, 158, 11, 0.2);
            box-shadow: 0 0 20px rgba(245, 158, 11, 0.3);
            transform: translateY(-2px);
        }

        .nav-button.logout {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .nav-button.logout:hover {
            background: rgba(239, 68, 68, 0.2);
            box-shadow: 0 0 20px rgba(239, 68, 68, 0.3);
            transform: translateY(-2px);
        }

        .hero {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 80px);
            text-align: center;
            padding: 3rem 2rem;
            gap: 2rem;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #06b6d4 0%, #f59e0b 50%, #06b6d4 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: #cbd5e1;
            max-width: 600px;
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        .hero-buttons {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            max-width: 1000px;
            width: 100%;
        }

        .button-card {
            padding: 2rem;
            border: 1px solid rgba(6, 182, 212, 0.2);
            border-radius: 1rem;
            background: rgba(6, 182, 212, 0.05);
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
            color: #e2e8f0;
        }

        .button-card:hover {
            background: rgba(6, 182, 212, 0.15);
            border-color: rgba(6, 182, 212, 0.5);
            box-shadow: 0 20px 50px rgba(6, 182, 212, 0.2);
            transform: translateY(-5px);
        }

        .button-card.amber {
            border-color: rgba(245, 158, 11, 0.2);
            background: rgba(245, 158, 11, 0.05);
        }

        .button-card.amber:hover {
            background: rgba(245, 158, 11, 0.15);
            border-color: rgba(245, 158, 11, 0.5);
            box-shadow: 0 20px 50px rgba(245, 158, 11, 0.2);
        }

        .button-icon {
            font-size: 2.5rem;
            background: linear-gradient(135deg, #06b6d4 0%, #f59e0b 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .button-card.amber .button-icon {
            background: linear-gradient(135deg, #f59e0b 0%, #06b6d4 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .button-label {
            font-weight: 600;
            font-size: 1.1rem;
        }

        footer {
            border-top: 1px solid rgba(6, 182, 212, 0.2);
            padding: 2rem;
            text-align: center;
            color: #94a3b8;
            margin-top: 3rem;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }

            .hero-subtitle {
                font-size: 1rem;
            }

            .hero-buttons {
                grid-template-columns: 1fr;
            }

            nav {
                flex-wrap: wrap;
                gap: 0.5rem;
            }

            .nav-button {
                padding: 0.5rem 1rem;
                font-size: 0.85rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">LegalHub</div>
        <nav>
            <a href="dashboard" class="nav-button nav-link">Home</a>
            <a href="Statistiques" class="nav-button nav-link">Statistics</a>
            <a href="Login" class="nav-button login">Login</a>
            <a href="Logout" class="nav-button logout">Logout</a>
        </nav>
    </header>

    <main class="hero">
        <h1 class="hero-title">Legal Services Platform</h1>
        <p class="hero-subtitle">Access the best avocats and huissiers in your area. Connect with legal professionals instantly.</p>

        <div class="hero-buttons">
            <a href="avocats" class="button-card">
                <div class="button-icon">⚖️</div>
                <div class="button-label">Avocats</div>
            </a>

            <a href="huissier" class="button-card amber">
                <div class="button-icon">📋</div>
                <div class="button-label">Huissiers</div>
            </a>

            <a href="statistique" class="button-card">
                <div class="button-icon">📊</div>
                <div class="button-label">Statistics</div>
            </a>

            <a href="dashboard" class="button-card amber">
                <div class="button-icon">📈</div>
                <div class="button-label">Dashboard</div>
            </a>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 LegalHub Platform. All rights reserved.</p>
    </footer>
</body>
</html>
