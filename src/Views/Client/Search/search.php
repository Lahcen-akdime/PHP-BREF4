<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche de Professionnels - LegalHub</title>
    <link rel="stylesheet" href="/PHP-BREF4/src/Views/Public/style.css">
    <link rel="stylesheet" href="/PHP-BREF4/src/Views/Client/Search/style.css">
    <script src="/PHP-BREF4/src/Views/Client/Search/script.js" defer></script>
</head>

<body>
    <?php require_once __DIR__ . "/../../Public/header.php" ?>

    <div class="search-layout">
        <aside class="search-sidebar">
            <div class="sidebar-header">
                <h2>Filtres</h2>
                <button class="reset-btn" onclick="resetFilters()">Réinitialiser</button>
            </div>

            <div class="search-group">
                <label>Mots-clés</label>
                <div class="input-wrapper">
                    <input type="text" id="keyword" placeholder="Nom, mot-clé..." oninput="performSearch()">
                    <i class="icon-search"></i>
                </div>
            </div>

            <div class="filter-section">
                <label>Profession</label>
                <select id="role" onchange="toggleFilters(); performSearch()">
                    <option value="avocat">Avocat</option>
                    <option value="huissier">Huissier de Justice</option>
                </select>
            </div>

            <div class="filter-section">
                <label>Ville</label>
                <select id="ville" onchange="performSearch()">
                    <option value="">Toutes les villes</option>
                    <?php foreach ($villes as $v): ?>
                        <option value="<?= htmlspecialchars($v['id']) ?>"><?= htmlspecialchars($v['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="filter-section active-filter" id="specialite-group">
                <label>Spécialité</label>
                <select id="specialite" onchange="performSearch()">
                    <option value="">Toutes les spécialités</option>
                    <option value="Droit_penal">Droit Pénal</option>
                    <option value="civil">Droit Civil</option>
                    <option value="famille">Droit de la Famille</option>
                    <option value="affaires">Droit des Affaires</option>
                </select>
            </div>

            <div class="filter-section" id="type-acte-group" style="display:none;">
                <label>Type d'acte</label>
                <select id="type_acte" onchange="performSearch()">
                    <option value="">Tous types d'actes</option>
                    <option value="signification">Signification</option>
                    <option value="execution">Exécution</option>
                    <option value="constats">Constats</option>
                </select>
            </div>
        </aside>

        <main class="search-content">
            <div class="content-header">
                <div class="header-text">
                    <h1>Experts Juridiques</h1>
                    <p>Trouvez le professionnel idéal pour vos besoins.</p>
                </div>
                <div class="results-count" id="results-count">
                    <!-- Javascript will update this -->
                </div>
            </div>

            <div class="roster-grid" id="results">
                <!-- Results injected here -->
            </div>
        </main>
    </div>
    <div id="booking-modal" class="modal"></div>
</body>

</html>