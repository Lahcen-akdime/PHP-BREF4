<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demandes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../src/Views/Public/style.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">
    <?php require_once "../src/Views/public/header.html"; ?>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8 text-gray-900" style="background: linear-gradient(135deg, #06b6d4 0%, #0891b2 50%, #06d6ff 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">Demandes en attente</h1>

        <style>
            .glass-table {
                width: 100%;
                border-collapse: separate;
                border-spacing: 0;
                background: rgba(30, 41, 59, 0.6);
                backdrop-filter: blur(10px);
                border-radius: 16px;
                border: 1px solid rgba(6, 182, 212, 0.2);
                overflow: hidden;
                color: #e2e8f0;
            }

            .glass-table th,
            .glass-table td {
                padding: 16px 24px;
                text-align: left;
                border-bottom: 1px solid rgba(6, 182, 212, 0.1);
            }

            .glass-table th {
                background: rgba(15, 23, 42, 0.6);
                font-weight: 600;
                color: #06b6d4;
                text-transform: uppercase;
                font-size: 0.85rem;
                letter-spacing: 0.5px;
            }

            .glass-table tr:last-child td {
                border-bottom: none;
            }

            .glass-table tr:hover td {
                background: rgba(6, 182, 212, 0.05);
            }

            .status-select {
                background: rgba(15, 23, 42, 0.6);
                border: 1px solid rgba(6, 182, 212, 0.3);
                color: #e2e8f0;
                padding: 8px 12px;
                border-radius: 8px;
                outline: none;
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .status-select:focus {
                border-color: #06b6d4;
                box-shadow: 0 0 0 2px rgba(6, 182, 212, 0.2);
            }

            .status-select option {
                background: #0f172a;
                color: #e2e8f0;
            }
        </style>

        <div class="overflow-x-auto">
            <table class="glass-table">
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Date Début</th>
                        <th>Date Fin</th>
                        <th>Durée</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($demandes)): ?>
                        <?php foreach ($demandes as $demande):
                            $start = new DateTime($demande['date_debut']);
                            $end = new DateTime($demande['date_fin']);
                            $diff = $start->diff($end);
                            $duration = $diff->h + ($diff->i / 60);
                        ?>
                            <tr id="row-<?= $demande['id'] ?>" data-duration="<?= $duration ?>">
                                <td class="font-medium"><?= htmlspecialchars($demande['client_name'] ?? 'Unknown') ?></td>
                                <td><?= htmlspecialchars($start->format('Y-m-d H:i')) ?></td>
                                <td><?= htmlspecialchars($end->format('Y-m-d H:i')) ?></td>
                                <td><?= $duration ?> h</td>
                                <td>
                                    <select onchange="handleStatusChange(this, <?= $demande['id'] ?>)" class="status-select">
                                        <option value="Pending" <?= $demande['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                                        <option value="Accepted" <?= $demande['status'] == 'Accepted' ? 'selected' : '' ?>>Accépter</option>
                                        <option value="Rejected" <?= $demande['status'] == 'Rejected' ? 'selected' : '' ?>>Rejeter</option>
                                    </select>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center py-8 text-gray-400">Aucune demande en attente.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div id="acceptModal" class="fixed inset-0 bg-gray-900 bg-opacity-70 overflow-y-auto h-full w-full hidden z-50 flex items-center justify-center backdrop-blur-sm">
        <div class="relative p-6 border border-gray-700 w-96 shadow-2xl rounded-xl bg-slate-800 text-gray-100">
            <div class="mt-3 text-center">
                <h3 class="text-xl leading-6 font-bold text-cyan-400 mb-4">Accepter la demande</h3>
                <div class="mt-2 text-left">
                    <label class="block text-sm font-medium text-gray-300 mb-2">Lien Zoom</label>
                    <input type="text" id="zoomLink" class="w-full px-4 py-2 border border-gray-600 bg-slate-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 text-white placeholder-gray-400" placeholder="https://zoom.us/j/...">
                </div>
                <div class="items-center px-4 py-3 mt-6 flex gap-4">
                    <button id="closeModal" class="w-full px-4 py-2 bg-slate-700 text-gray-300 font-medium rounded-lg hover:bg-slate-600 transition-colors">
                        Annuler
                    </button>
                    <button id="confirmAccept" class="w-full px-4 py-2 bg-cyan-600 text-white font-medium rounded-lg hover:bg-cyan-700 transition-colors shadow-lg shadow-cyan-900/50">
                        Confirmer
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirm Modal -->
    <div id="confirmModal" class="fixed inset-0 bg-gray-900 bg-opacity-70 overflow-y-auto h-full w-full hidden z-50 flex items-center justify-center backdrop-blur-sm">
        <div class="relative p-6 border border-gray-700 w-96 shadow-2xl rounded-xl bg-slate-800 text-gray-100">
            <div class="mt-3 text-center">
                <h3 class="text-xl leading-6 font-bold text-red-400 mb-4">Confirmation</h3>
                <p class="text-gray-300 mb-6">Êtes-vous sûr de vouloir rejeter cette demande ?</p>
                <div class="items-center px-4 py-3 flex gap-4">
                    <button id="cancelReject" class="w-full px-4 py-2 bg-slate-700 text-gray-300 font-medium rounded-lg hover:bg-slate-600 transition-colors">
                        Non
                    </button>
                    <button id="confirmReject" class="w-full px-4 py-2 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition-colors shadow-lg shadow-red-900/50">
                        Oui
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Notification -->
    <div id="notification" class="fixed bottom-4 right-4 px-6 py-4 rounded-xl shadow-2xl transform transition-all duration-300 translate-y-20 opacity-0 z-50 flex items-center gap-3 bg-white border border-gray-200">
        <div id="notificationIcon"></div>
        <p id="notificationMessage" class="font-medium text-gray-800"></p>
    </div>

    <script>
        const notification = document.getElementById('notification');
        const notificationMessage = document.getElementById('notificationMessage');
        const notificationIcon = document.getElementById('notificationIcon');

        function showNotification(message, type = 'success') {
            notification.classList.remove('translate-y-20', 'opacity-0');
            notificationMessage.textContent = message;

            if (type === 'success') {
                notification.className = "fixed bottom-4 right-4 px-6 py-4 rounded-xl shadow-2xl transform transition-all duration-300 z-50 flex items-center gap-3 bg-emerald-50 border border-emerald-200";
                notificationIcon.innerHTML = `<svg class="w-6 h-6 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>`;
                notificationMessage.className = "font-medium text-emerald-800";
            } else {
                notification.className = "fixed bottom-4 right-4 px-6 py-4 rounded-xl shadow-2xl transform transition-all duration-300 z-50 flex items-center gap-3 bg-red-50 border border-red-200";
                notificationIcon.innerHTML = `<svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>`;
                notificationMessage.className = "font-medium text-red-800";
            }

            setTimeout(() => {
                notification.classList.add('translate-y-20', 'opacity-0');
            }, 3000);
        }

        const modal = document.getElementById('acceptModal');
        const confirmModal = document.getElementById('confirmModal');
        const zoomLinkInput = document.getElementById('zoomLink');
        let currentDemandeId = null;
        let currentSelectElement = null;
        let currentDuration = null;

        function handleStatusChange(selectElement, id) {
            const status = selectElement.value;
            currentDemandeId = id;
            currentSelectElement = selectElement;
            const row = selectElement.closest('tr');
            currentDuration = row ? row.getAttribute('data-duration') : 0;

            if (status === 'Accepted') {
                modal.classList.remove('hidden');
            } else if (status === 'Rejected') {
                confirmModal.classList.remove('hidden');
            }
        }

        document.getElementById('cancelReject').addEventListener('click', () => {
            confirmModal.classList.add('hidden');
            if (currentSelectElement) {
                currentSelectElement.value = 'Pending';
            }
        });

        document.getElementById('confirmReject').addEventListener('click', async () => {
            confirmModal.classList.add('hidden');
            await updateStatus(currentDemandeId, 'Rejected');
        });

        document.getElementById('closeModal').addEventListener('click', () => {
            modal.classList.add('hidden');
            zoomLinkInput.value = '';
            if (currentSelectElement) {
                currentSelectElement.value = 'Pending';
            }
        });

        document.getElementById('confirmAccept').addEventListener('click', async () => {
            const link = zoomLinkInput.value;

            if (!link) {
                showNotification('Veuillez entrer un lien Zoom', 'error');
                return;
            }

            await updateStatus(currentDemandeId, 'Accepted', link, currentDuration);
        });

        async function updateStatus(id, status, link = null, duration = 0) {
            try {
                const body = {
                    demande_id: id,
                    status: status,
                    duration: duration
                };

                if (link) {
                    body.link = link;
                }

                const response = await fetch('index.php?page=demandes/accept', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(body)
                });

                const result = await response.json();

                if (result.success) {
                    showNotification('Status mis à jour avec succès!', 'success');

                    const row = document.getElementById(`row-${id}`);
                    if (row) {
                        row.style.transition = 'all 0.5s ease';
                        row.style.opacity = '0';
                        row.style.transform = 'translateX(20px)';
                        setTimeout(() => row.remove(), 500);
                    }
                } else {
                    showNotification('Erreur: ' + result.message, 'error');
                    if (currentSelectElement) currentSelectElement.value = 'Pending';
                }
            } catch (error) {
                console.error('Error:', error);
                showNotification('Une erreur est survenue', 'error');
                if (currentSelectElement) currentSelectElement.value = 'Pending';
            }
            modal.classList.add('hidden');
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.classList.add('hidden');
                if (currentSelectElement && currentSelectElement.value === 'Accepted') {
                    currentSelectElement.value = 'Pending';
                }
            }
            if (event.target == confirmModal) {
                confirmModal.classList.add('hidden');
                if (currentSelectElement && currentSelectElement.value === 'Rejected') {
                    currentSelectElement.value = 'Pending';
                }
            }
        }
    </script>
</body>

</html>