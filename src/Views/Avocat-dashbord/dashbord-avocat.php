<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Avocat</title>
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
            padding: 20px;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
        }

        header {
            backdrop-filter: blur(10px);
            background: rgba(15, 23, 42, 0.8);
            border-bottom: 1px solid rgba(6, 182, 212, 0.2);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 40px;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        h1 {
            font-size: 2.5rem;
            background: linear-gradient(135deg, #06b6d4 0%, #06d6ff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .subtitle {
            color: #94a3b8;
            font-size: 1rem;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: linear-gradient(135deg, rgba(6, 182, 212, 0.1) 0%, rgba(8, 145, 178, 0.05) 100%);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 16px;
            border: 1px solid rgba(6, 182, 212, 0.2);
            text-align: center;
            transition: all 0.4s ease;
        }

        .stat-card:hover {
            transform: translateY(-8px);
            border-color: #06b6d4;
            background: linear-gradient(135deg, rgba(6, 182, 212, 0.15) 0%, rgba(8, 145, 178, 0.1) 100%);
            box-shadow: 0 15px 40px rgba(6, 182, 212, 0.15);
        }

        .stat-icon {
            font-size: 3rem;
            margin-bottom: 15px;
        }

        .stat-number {
            font-size: 3rem;
            background: linear-gradient(135deg, #06b6d4 0%, #06d6ff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .stat-label {
            color: #cbd5e1;
            font-size: 0.95rem;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .stat-subtitle {
            color: #94a3b8;
            font-size: 0.85rem;
            margin-top: 8px;
        }

        .details-section {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.7) 0%, rgba(51, 65, 85, 0.4) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(6, 182, 212, 0.2);
            border-radius: 16px;
            padding: 30px;
            margin-bottom: 30px;
        }

        .section-title {
            color: #06b6d4;
            font-size: 1.4rem;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .detail-item {
            background: rgba(15, 23, 42, 0.5);
            padding: 16px;
            border-radius: 12px;
            border-left: 3px solid #06b6d4;
        }

        .detail-label {
            color: #94a3b8;
            font-size: 0.85rem;
            margin-bottom: 6px;
        }

        .detail-value {
            color: #e2e8f0;
            font-size: 1.3rem;
            font-weight: 700;
        }

        .chart-container {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.7) 0%, rgba(51, 65, 85, 0.4) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(6, 182, 212, 0.2);
            border-radius: 16px;
            padding: 30px;
            margin-bottom: 30px;
        }

        .chart-title {
            color: #06b6d4;
            font-size: 1.2rem;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .bar {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .bar-label {
            color: #cbd5e1;
            font-size: 0.9rem;
            min-width: 120px;
            font-weight: 500;
        }

        .bar-container {
            flex: 1;
            height: 30px;
            background: rgba(15, 23, 42, 0.5);
            border-radius: 6px;
            margin: 0 15px;
            overflow: hidden;
        }

        .bar-fill {
            height: 100%;
            background: linear-gradient(90deg, #06b6d4 0%, #06d6ff 100%);
            border-radius: 6px;
            transition: width 0.6s ease;
        }

        .bar-value {
            color: #06d6ff;
            font-size: 0.85rem;
            font-weight: 700;
            min-width: 60px;
            text-align: right;
        }

        .btn {
            padding: 12px 24px;
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            border: none;
            border-radius: 8px;
            color: #0a0e27;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(6, 182, 212, 0.3);
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 1.8rem;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .stat-number {
                font-size: 2.2rem;
            }

            .detail-grid {
                grid-template-columns: 1fr;
            }

            .bar {
                flex-direction: column;
                align-items: flex-start;
            }

            .bar-label {
                margin-bottom: 8px;
            }

            .bar-container {
                width: 100%;
                margin: 10px 0;
            }

            .bar-value {
                margin-top: 8px;
                text-align: left;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div>
                <div class="logo">📋 AVOCAT</div>
                <h1>Tableau de Bord</h1>
                <p class="subtitle">Ahmed Bennani | Licence #2024-AV-001</p>
            </div>
        </header>

        <div class="stats">
            <div class="stat-card">
                <div class="stat-icon">👥</div>
                <div class="stat-number"><?= $ClientsUnique ?></div>
                <div class="stat-label">Clients Uniques</div>
                <div class="stat-subtitle">Cette année</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">⏱️</div>
                <div class="stat-number"><?= $heures ?> H</div>
                <div class="stat-label">Heures Travaillées</div>
                <div class="stat-subtitle">40 heures/mois en moyenne</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">💰</div>
                <div class="stat-number"><?= $chiffreDaffaire ?> DH</div>
                <div class="stat-label">Chiffre d'Affaires</div>
                <div class="stat-subtitle">+15% par rapport à l'année dernière</div>
            </div>
        </div>

        <div class="details-section">
            <h2 class="section-title">Détails d'Activité</h2>
            <div class="detail-grid">
                <div class="detail-item">
                    <div class="detail-label">Dossiers Actifs</div>
                    <div class="detail-value">12</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Dossiers Fermés</div>
                    <div class="detail-value">18</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Taux de Succès</div>
                    <div class="detail-value">85%</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Tarif Horaire</div>
                    <div class="detail-value">100 DH/h</div>
                </div>
            </div>
        </div>

        <div class="chart-container">
            <h2 class="chart-title">Répartition des Heures par Domaine</h2>
            
            <div class="bar">
                <div class="bar-label">Droit Commercial</div>
                <div class="bar-container">
                    <div class="bar-fill" style="width: 45%;"></div>
                </div>
                <div class="bar-value">45%</div>
            </div>

            <div class="bar">
                <div class="bar-label">Droit du Travail</div>
                <div class="bar-container">
                    <div class="bar-fill" style="width: 30%;"></div>
                </div>
                <div class="bar-value">30%</div>
            </div>

            <div class="bar">
                <div class="bar-label">Droit Immobilier</div>
                <div class="bar-container">
                    <div class="bar-fill" style="width: 15%;"></div>
                </div>
                <div class="bar-value">15%</div>
            </div>

            <div class="bar">
                <div class="bar-label">Autres Domaines</div>
                <div class="bar-container">
                    <div class="bar-fill" style="width: 10%;"></div>
                </div>
                <div class="bar-value">10%</div>
            </div>
        </div>

        <div class="details-section">
            <h2 class="section-title">Top 5 Clients</h2>
            <div class="detail-grid">
                <div class="detail-item">
                    <div class="detail-label">SARL Maroc Tech</div>
                    <div class="detail-value">4,800 DH</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Entreprise XYZ</div>
                    <div class="detail-value">3,200 DH</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Société ABC</div>
                    <div class="detail-value">2,800 DH</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Groupe DEF</div>
                    <div class="detail-value">2,400 DH</div>
                </div>
            </div>
        </div>

        <button class="btn">Télécharger Rapport Complet</button>
    </div>
</body>
</html>
