<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historique des Consultations - LegalHub</title>
    <link rel="stylesheet" href="../src/Views/Public/style.css">
    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .page-header {
            text-align: center;
            padding: 40px 0;
            color: #cbd5e1;
        }

        .history-table {
            width: 100%;
            border-collapse: collapse;
            background: rgba(30, 41, 59, 0.4);
            border-radius: 12px;
            overflow: hidden;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(6, 182, 212, 0.1);
        }

        .history-table th,
        .history-table td {
            padding: 16px;
            text-align: left;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            color: #e2e8f0;
        }

        .history-table th {
            background: rgba(15, 23, 42, 0.6);
            font-weight: 600;
            color: #06b6d4;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.05em;
        }

        .history-table tr:hover {
            background: rgba(255, 255, 255, 0.02);
        }

        .badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            display: inline-block;
        }

        .badge-pending {
            background: rgba(234, 179, 8, 0.15);
            color: #facc15;
            border: 1px solid rgba(234, 179, 8, 0.3);
        }

        .badge-accepted {
            background: rgba(34, 197, 94, 0.15);
            color: #4ade80;
            border: 1px solid rgba(34, 197, 94, 0.3);
        }

        .badge-rejected {
            background: rgba(239, 68, 68, 0.15);
            color: #f87171;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .btn-link {
            color: #06b6d4;
            text-decoration: none;
            font-weight: 500;
            transition: 0.2s;
        }

        .btn-link:hover {
            color: #22d3ee;
            text-decoration: underline;
        }

        .empty-history {
            text-align: center;
            padding: 60px;
            color: #94a3b8;
            font-size: 1.1rem;
        }
    </style>
</head>

<body>
    <?php require_once __DIR__ . "/../../Public/header.php" ?>

    <div class="container">
        <div class="page-header">
            <h1>Historique de mes consultations</h1>
            <p>Suivez vos rendez-vous passés et à venir</p>
        </div>

        <?php if (empty($history)): ?>
            <div class="empty-history">
                <p>Aucune consultation trouvée.</p>
                <a href="client/search" class="btn-link">Trouver un professionnel</a>
            </div>
        <?php else: ?>
            <table class="history-table">
                <thead>
                    <tr>
                        <th>Date de début</th>
                        <th>Professionnel</th>
                        <th>Statut</th>
                        <th>Lien de réunion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($history as $h): ?>
                        <tr>
                            <td><?= date('d/m/Y H:i', strtotime($h['date_debut'])) ?></td>
                            <td><?= htmlspecialchars($h['professionel_name']) ?></td>
                            <td>
                                <?php
                                $statusClass = match ($h['status']) {
                                    'Accepted' => 'badge-accepted',
                                    'Rejected' => 'badge-rejected',
                                    default => 'badge-pending'
                                };
                                $statusLabel = match ($h['status']) {
                                    'Accepted' => 'Confirmé',
                                    'Rejected' => 'Refusé',
                                    default => 'En attente'
                                };
                                ?>
                                <span class="badge <?= $statusClass ?>"><?= $statusLabel ?></span>
                            </td>
                            <td>
                                <?php if ($h['status'] === 'Accepted' && $h['meeting_link']): ?>
                                    <a href="<?= htmlspecialchars($h['meeting_link']) ?>" target="_blank" class="btn-link">
                                        Rejoindre la réunion
                                    </a>
                                <?php elseif ($h['status'] === 'Accepted'): ?>
                                    <span style="color: #94a3b8;">Lien non disponible</span>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>