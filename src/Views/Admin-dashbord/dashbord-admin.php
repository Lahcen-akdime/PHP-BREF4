<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/PHP-BREF4/src/Views/Public/style.css">

    <title>Dashboard Admin</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
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
            border-bottom: 1px solid rgba(245, 158, 11, 0.2);
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
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        h1 {
            font-size: 2.5rem;
            background: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%);
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

        .controls {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .search-box input {
            padding: 12px 16px;
            background: rgba(30, 41, 59, 0.6);
            border: 2px solid rgba(245, 158, 11, 0.2);
            border-radius: 8px;
            color: #e2e8f0;
            font-size: 0.95rem;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            flex: 1;
            min-width: 250px;
        }

        .search-box input:focus {
            outline: none;
            border-color: #f59e0b;
            background: rgba(30, 41, 59, 0.8);
            box-shadow: 0 0 20px rgba(245, 158, 11, 0.3);
        }

        .filter-group {
            display: flex;
            gap: 10px;
        }

        .filter-group select {
            padding: 12px 16px;
            background: rgba(30, 41, 59, 0.6);
            border: 2px solid rgba(245, 158, 11, 0.2);
            border-radius: 8px;
            color: #e2e8f0;
            font-size: 0.95rem;
            cursor: pointer;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .filter-group select:focus {
            outline: none;
            border-color: #f59e0b;
            background: rgba(30, 41, 59, 0.8);
        }

        .table-wrapper {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.7) 0%, rgba(51, 65, 85, 0.4) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(245, 158, 11, 0.2);
            border-radius: 12px;
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: rgba(15, 23, 42, 0.8);
            border-bottom: 1px solid rgba(245, 158, 11, 0.2);
        }

        th {
            padding: 16px;
            text-align: left;
            color: #f59e0b;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        td {
            padding: 16px;
            border-bottom: 1px solid rgba(245, 158, 11, 0.1);
            color: #cbd5e1;
        }

        tbody tr:hover {
            background: rgba(245, 158, 11, 0.05);
        }

        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .status-pending {
            background: rgba(245, 158, 11, 0.2);
            color: #fbbf24;
            border: 1px solid rgba(245, 158, 11, 0.3);
        }

        .status-approved {
            background: rgba(34, 197, 94, 0.2);
            color: #86efac;
            border: 1px solid rgba(34, 197, 94, 0.3);
        }

        .status-rejected {
            background: rgba(239, 68, 68, 0.2);
            color: #ff6b6b;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .btn {
            padding: 8px 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.85rem;
            font-weight: 600;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .btn-approve {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            color: #0a0e27;
        }

        .btn-approve:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(34, 197, 94, 0.3);
        }

        .btn-reject {
            background: rgba(239, 68, 68, 0.2);
            color: #ff6b6b;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .btn-reject:hover {
            background: rgba(239, 68, 68, 0.3);
            border-color: rgba(239, 68, 68, 0.5);
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.1) 0%, rgba(217, 119, 6, 0.05) 100%);
            backdrop-filter: blur(10px);
            padding: 20px;
            border-radius: 12px;
            border: 1px solid rgba(245, 158, 11, 0.2);
            text-align: center;
        }

        .stat-number {
            font-size: 2.5rem;
            color: #f59e0b;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .stat-label {
            color: #94a3b8;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 1.8rem;
            }

            .controls {
                flex-direction: column;
            }

            .search-box input {
                min-width: auto;
            }

            table {
                font-size: 0.9rem;
            }

            th, td {
                padding: 12px 8px;
            }

            .btn {
                padding: 6px 10px;
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>
    <?php require_once __DIR__ . "/../Public/header.php" ?>
    <div class="container">
        <header>
            <div>
                <div class="logo">⚖️ PLATEFORME JURIDIQUE</div>
                <h1>Dashboard Admin</h1>
                <p class="subtitle">Gestion des comptes professionnels</p>
            </div>
        </header>

        <div class="stats">
            <div class="stat-card">
                <div class="stat-number"><?= $pending ?></div>
                <div class="stat-label">Pending</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?= $accepted ?></div>
                <div class="stat-label">Accepted</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?= $rejected ?></div>
                <div class="stat-label">Rejected</div>
            </div>
        </div>

        <div class="controls">
            <div class="search-box">
                <input type="text" placeholder="Rechercher par nom, email...">
            </div>
            <div class="filter-group">
                <select>
                    <option>Tous les statuts</option>
                    <option>En attente</option>
                    <option>Approuvé</option>
                    <option>Rejeté</option>
                </select>
                <select>
                    <option>Tous les types</option>
                    <option>Avocat</option>
                    <option>Huissier</option>
                </select>
            </div>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Role</th>
                        <!-- <th>Date inscription</th> -->
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($LesDemandes as $demande){ ?>
                    <tr>
                        <td><?= $demande['id'] ?></td>
                        <td><?= $demande['name'] ?></td>
                        <td><?= $demande['email'] ?></td>
                        <td><?= $demande['role'] ?></td>
                        <td><span class="status-badge status-pending"><?= $demande['status'] ?></span></td>
                        <td>
                            <div class="actions">
                                <a href="Update&id=<?= $demande['id'] ?>&role=<?= $demande['role'] ?>">
                                    <button class="btn btn-approve">Approuver</button>
                                </a>
                                <a href="Rejected&id=<?=$demande['id']?>&role=<?= $demande['role'] ?>">
                                    <button class="btn btn-reject">Refuser</button>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <!-- <tr>
                        <td>Fatima Alami</td>
                        <td>fatima.alami@law.com</td>
                        <td>Avocat</td>
                        <td>2024-01-10</td>
                        <td><span class="status-badge status-approved">Approuvé</span></td>
                        <td>
                            <div class="actions">
                                <button class="btn btn-reject">Suspendre</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Mohammed Zaki</td>
                        <td>m.zaki@bailiff.com</td>
                        <td>Huissier</td>
                        <td>2024-01-12</td>
                        <td><span class="status-badge status-pending">En attente</span></td>
                        <td>
                            <div class="actions">
                                <button class="btn btn-approve">Approuver</button>
                                <button class="btn btn-reject">Refuser</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Nadia Boulaoui</td>
                        <td>nadia.b@bailiff.com</td>
                        <td>Huissier</td>
                        <td>2024-01-08</td>
                        <td><span class="status-badge status-approved">Approuvé</span></td>
                        <td>
                            <div class="actions">
                                <button class="btn btn-reject">Suspendre</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Hassan Elmoury</td>
                        <td>h.elmoury@law.com</td>
                        <td>Avocat</td>
                        <td>2024-01-20</td>
                        <td><span class="status-badge status-rejected">Rejeté</span></td>
                        <td>
                            <div class="actions">
                                <button class="btn btn-approve">Rétablir</button>
                            </div>
                        </td>
                    </tr> -->
                    <!-- <tr>
                        <td>Laila Hassan</td>
                        <td>laila.h@bailiff.com</td>
                        <td>Huissier</td>
                        <td>2024-01-05</td>
                        <td><span class="status-badge status-approved">Approuvé</span></td>
                        <td>
                            <div class="actions">
                                <button class="btn btn-reject">Suspendre</button>
                            </div>
                        </td>
                    </tr> -->
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
