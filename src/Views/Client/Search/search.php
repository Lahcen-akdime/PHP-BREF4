<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche de Professionnels - LegalHub</title>
    <link rel="stylesheet" href="../src/Views/Public/style.css">
    <link rel="stylesheet" href="../src/Views/Client/Search/style.css">
    <script src="../src/Views/Client/Search/script.js" defer></script>
</head>

<body>
    <?php require_once __DIR__ . "/../../Public/header.html" ?>

    <div class="container">
        <div class="page-header">
            <h1>Trouvez votre Expert Juridique</h1>
            <p class="subtitle">Des professionnels qualifiés et disponibles pour vous accompagner</p>
        </div>

        <div class="controls-extended">
            <div class="search-box">
                <input type="text" id="keyword" placeholder="Rechercher par nom..." oninput="performSearch()">
            </div>

            <div class="filter-group">
                <select id="role" onchange="toggleFilters(); performSearch()">
                    <option value="avocat">Avocats</option>
                    <option value="huissier">Huissiers de justice</option>
                </select>
            </div>

            <div class="filter-group">
                <select id="ville" onchange="performSearch()">
                    <option value="">Toutes les villes</option>
                    <?php foreach ($villes as $v): ?>
                        <option value="<?= htmlspecialchars($v['id']) ?>"><?= htmlspecialchars($v['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="filter-group active-filter" id="specialite-group">
                <select id="specialite" onchange="performSearch()">
                    <option value="">Toutes les spécialités</option>
                    <option value="Droit_penal">Droit Pénal</option>
                    <option value="civil">Droit Civil</option>
                    <option value="famille">Droit de la Famille</option>
                    <option value="affaires">Droit des Affaires</option>
                </select>
            </div>

            <div class="filter-group" id="type-acte-group" style="display:none;">
                <select id="type_acte" onchange="performSearch()">
                    <option value="">Tous types d'actes</option>
                    <option value="signification">Signification</option>
                    <option value="execution">Exécution</option>
                    <option value="constats">Constats</option>
                </select>
            </div>
        </div>

        <div class="roster-grid" id="results">
        </div>
        <div id="booking-modal" class="modal"></div>
    </div>
</body>

</html>