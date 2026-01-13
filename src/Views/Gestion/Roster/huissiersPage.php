<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cabinet d'Huissiers</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0a0e27 0%, #1a1f3a 50%, #0f1729 100%);
            color: #e2e8f0;
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            max-width: 1600px;
            margin: 0 auto;
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

        h1 {
            font-size: 3.5rem;
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 50%, #fbbf24 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 15px;
            font-weight: 700;
            letter-spacing: -1px;
        }

        .subtitle {
            color: #94a3b8;
            font-size: 1.2rem;
            font-weight: 300;
            letter-spacing: 0.5px;
        }

        .controls-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 50px;
            animation: fadeInUp 0.8s ease;
        }

        .search-box {
            position: relative;
        }

        .search-box input {
            width: 100%;
            padding: 16px 20px;
            background: rgba(30, 41, 59, 0.6);
            border: 2px solid rgba(245, 158, 11, 0.2);
            border-radius: 12px;
            color: #e2e8f0;
            font-size: 1rem;
            backdrop-filter: blur(10px);
            transition: all 0.4s ease;
        }

        .search-box input:focus {
            outline: none;
            border-color: #f59e0b;
            background: rgba(30, 41, 59, 0.8);
            box-shadow: 0 0 30px rgba(245, 158, 11, 0.3);
        }

        .filters {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .filter-group select {
            padding: 16px 20px;
            background: rgba(30, 41, 59, 0.6);
            border: 2px solid rgba(245, 158, 11, 0.2);
            border-radius: 12px;
            color: #e2e8f0;
            font-size: 1rem;
            cursor: pointer;
            backdrop-filter: blur(10px);
            transition: all 0.4s ease;
        }

        .filter-group select:hover,
        .filter-group select:focus {
            border-color: #f59e0b;
            background: rgba(30, 41, 59, 0.8);
            outline: none;
        }

        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 50px;
            animation: fadeInUp 0.8s ease 0.2s backwards;
        }

        .stat-card {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.1) 0%, rgba(217, 119, 6, 0.05) 100%);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 16px;
            border: 1px solid rgba(245, 158, 11, 0.2);
            text-align: center;
            transition: all 0.4s ease;
        }

        .stat-card:hover {
            transform: translateY(-8px);
            border-color: #f59e0b;
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.15) 0%, rgba(217, 119, 6, 0.1) 100%);
        }

        .stat-number {
            font-size: 3rem;
            background: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .stat-label {
            color: #cbd5e1;
            font-size: 0.95rem;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .roster-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
            animation: fadeInUp 0.8s ease 0.3s backwards;
        }

        .roster-card {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.7) 0%, rgba(51, 65, 85, 0.4) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(245, 158, 11, 0.2);
            border-radius: 16px;
            padding: 30px;
            transition: all 0.4s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .roster-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(245, 158, 11, 0.1), transparent);
            transition: left 0.6s ease;
        }

        .roster-card:hover::before {
            left: 100%;
        }

        .roster-card:hover {
            transform: translateY(-10px);
            border-color: #f59e0b;
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.9) 0%, rgba(51, 65, 85, 0.6) 100%);
            box-shadow: 0 20px 50px rgba(245, 158, 11, 0.15);
        }

        .card-header {
            display: flex;
            align-items: flex-start;
            gap: 20px;
            margin-bottom: 25px;
            position: relative;
            z-index: 1;
        }

        .card-avatar {
            width: 80px;
            height: 80px;
            border-radius: 12px;
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.2rem;
            font-weight: 700;
            color: #0a0e27;
            flex-shrink: 0;
        }

        .card-title-section h3 {
            color: #fbbf24;
            font-size: 1.4rem;
            margin-bottom: 8px;
            font-weight: 700;
        }

        .card-title-section p {
            color: #94a3b8;
            font-size: 0.95rem;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .card-details {
            margin: 25px 0;
            padding: 20px 0;
            border-top: 1px solid rgba(245, 158, 11, 0.1);
            border-bottom: 1px solid rgba(245, 158, 11, 0.1);
            position: relative;
            z-index: 1;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            font-size: 0.95rem;
        }

        .detail-label {
            color: #94a3b8;
            font-weight: 500;
        }

        .detail-value {
            color: #e2e8f0;
            font-weight: 600;
        }

        .consultation-badge {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-top: 10px;
            letter-spacing: 0.5px;
        }

        .consultation-yes {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.2) 0%, rgba(245, 158, 11, 0.1) 100%);
            color: #fbbf24;
            border: 1px solid rgba(245, 158, 11, 0.3);
        }

        .consultation-no {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.2) 0%, rgba(239, 68, 68, 0.1) 100%);
            color: #ff6b6b;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .card-actions {
            display: flex;
            gap: 12px;
            margin-top: 20px;
            position: relative;
            z-index: 1;
        }

        .btn {
            flex: 1;
            padding: 12px 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: 600;
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
        }

        .btn-edit {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: #0a0e27;
        }

        .btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(245, 158, 11, 0.3);
        }

        .btn-delete {
            background: rgba(239, 68, 68, 0.2);
            color: #ff6b6b;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .btn-delete:hover {
            background: rgba(239, 68, 68, 0.3);
            border-color: rgba(239, 68, 68, 0.5);
        }

        .pagination {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-top: 50px;
            animation: fadeInUp 0.8s ease 0.4s backwards;
        }

        .pagination button {
            padding: 12px 18px;
            background: rgba(30, 41, 59, 0.6);
            border: 2px solid rgba(245, 158, 11, 0.2);
            color: #e2e8f0;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            backdrop-filter: blur(10px);
        }

        .pagination button:hover,
        .pagination button.active {
            border-color: #f59e0b;
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: #0a0e27;
            transform: translateY(-2px);
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 1024px) {
            .controls-wrapper {
                grid-template-columns: 1fr;
            }

            .roster-grid {
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            }
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2.5rem;
            }

            .controls-wrapper {
                grid-template-columns: 1fr;
            }

            .filters {
                grid-template-columns: 1fr;
            }

            .roster-grid {
                grid-template-columns: 1fr;
            }

            .stat-card {
                padding: 20px;
            }

            .stat-number {
                font-size: 2.2rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
        <div class="logo">LegalHub</div>
        <nav>
            <a href="dashboard" class="nav-button nav-link">Home</a>
            <a href="Statistiques" class="nav-button nav-link">Statistics</a>
            <a href="Login" class="nav-button login">Login</a>
            <a href="Logout" class="nav-button logout">Logout</a>
        </nav>
    </header>
        
        <h1>Cabinet d'Huissiers</h1>
        <div class="controls-wrapper">
            <div class="search-box">
                <input type="text" placeholder="Rechercher un huissier..." id="searchInput">
            </div>
            <div class="filters">
                <select id="typesActesFilter">
                    <option value="">Tous les types d'actes</option>
                    <option value="Signification">Signification</option>
                    <option value="Constat">Constat</option>
                    <option value="Recouvrement">Recouvrement</option>
                    <option value="Expulsion">Expulsion</option>
                </select>
                <select id="consultationFilter">
                    <option value="">Tous les statuts</option>
                    <option value="1">Consultation En Ligne</option>
                    <option value="0">Sans Consultation En Ligne</option>
                </select>
            </div>
            <div class="card-actions">
                    <a href=""><button class="btn btn-edit">Add huissier + </button></a>
            </div>
        </div>


        <div class="roster-grid">
            <div class="roster-card">
                <div class="card-header">
                    <div class="card-avatar">AR</div>
                    <div class="card-title-section">
                        <h3>André Rousseau</h3>
                        <p>SIGNIFICATION</p>
                    </div>
                </div>
                <div class="card-details">
                    <div class="detail-row">
                        <span class="detail-label">Expérience</span>
                        <span class="detail-value">16 ans</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Localisation</span>
                        <span class="detail-value">Paris</span>
                    </div>
                    <span class="consultation-badge consultation-yes">✓ Consultation En Ligne</span>
                </div>
                <div class="card-actions">
                    <button class="btn btn-edit">Edit</button>
                    <button class="btn btn-delete">Delete</button>
                </div>
            </div>

            <div class="roster-card">
                <div class="card-header">
                    <div class="card-avatar">FM</div>
                    <div class="card-title-section">
                        <h3>Francine Michel</h3>
                        <p>CONSTAT</p>
                    </div>
                </div>
                <div class="card-details">
                    <div class="detail-row">
                        <span class="detail-label">Expérience</span>
                        <span class="detail-value">12 ans</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Localisation</span>
                        <span class="detail-value">Marseille</span>
                    </div>
                    <span class="consultation-badge consultation-yes">✓ Consultation En Ligne</span>
                </div>
                <div class="card-actions">
                    <button class="btn btn-edit">Edit</button>
                    <button class="btn btn-delete">Delete</button>
                </div>
            </div>

            <div class="roster-card">
                <div class="card-header">
                    <div class="card-avatar">GG</div>
                    <div class="card-title-section">
                        <h3>Gérard Gauthier</h3>
                        <p>RECOUVREMENT</p>
                    </div>
                </div>
                <div class="card-details">
                    <div class="detail-row">
                        <span class="detail-label">Expérience</span>
                        <span class="detail-value">18 ans</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Localisation</span>
                        <span class="detail-value">Lyon</span>
                    </div>
                    <span class="consultation-badge consultation-no">✗ Non Disponible</span>
                </div>
                <div class="card-actions">
                    <button class="btn btn-edit">Edit</button>
                    <button class="btn btn-delete">Delete</button>
                </div>
            </div>

            <div class="roster-card">
                <div class="card-header">
                    <div class="card-avatar">SM</div>
                    <div class="card-title-section">
                        <h3>Simone Marchand</h3>
                        <p>EXPULSION</p>
                    </div>
                </div>
                <div class="card-details">
                    <div class="detail-row">
                        <span class="detail-label">Expérience</span>
                        <span class="detail-value">14 ans</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Localisation</span>
                        <span class="detail-value">Toulouse</span>
                    </div>
                    <span class="consultation-badge consultation-yes">✓ Consultation En Ligne</span>
                </div>
                <div class="card-actions">
                    <button class="btn btn-edit">Edit</button>
                    <button class="btn btn-delete">Delete</button>
                </div>
            </div>

            <div class="roster-card">
                <div class="card-header">
                    <div class="card-avatar">TD</div>
                    <div class="card-title-section">
                        <h3>Thierry Deschamps</h3>
                        <p>SIGNIFICATION</p>
                    </div>
                </div>
                <div class="card-details">
                    <div class="detail-row">
                        <span class="detail-label">Expérience</span>
                        <span class="detail-value">20 ans</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Localisation</span>
                        <span class="detail-value">Paris</span>
                    </div>
                    <span class="consultation-badge consultation-yes">✓ Consultation En Ligne</span>
                </div>
                <div class="card-actions">
                    <button class="btn btn-edit">Edit</button>
                    <button class="btn btn-delete">Delete</button>
                </div>
            </div>

            <div class="roster-card">
                <div class="card-header">
                    <div class="card-avatar">VL</div>
                    <div class="card-title-section">
                        <h3>Valérie Legrand</h3>
                        <p>CONSTAT</p>
                    </div>
                </div>
                <div class="card-details">
                    <div class="detail-row">
                        <span class="detail-label">Expérience</span>
                        <span class="detail-value">10 ans</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Localisation</span>
                        <span class="detail-value">Nice</span>
                    </div>
                    <span class="consultation-badge consultation-no">✗ Non Disponible</span>
                </div>
                <div class="card-actions">
                    <button class="btn btn-edit">Edit</button>
                    <button class="btn btn-delete">Delete</button>
                </div>
            </div>
        </div>

        <div class="pagination" id="pagination"></div>
    </div>
</body>
</html>
