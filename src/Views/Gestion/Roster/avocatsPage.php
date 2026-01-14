
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cabinet Juridique - Avocats</title>
       <link rel="stylesheet" href="src/Views/Public/style.css">
</head>
<body>
    <?php require_once "../src/Views/public/header.html" ?>
    <h1>Cabinet d'Avocats</h1>
    <div class="container"> 
        <div class="controls-wrapper">
            <div class="search-box">
                <input type="text" placeholder="Rechercher un avocat..." id="searchInput">
            </div>
            <div class="filters">
                <select id="specialityFilter">
                    <option value="">Toutes les spécialités</option>
                    <option value="Droit_penal">Droit Pénal</option>
                    <option value="civil">Droit Civil</option>
                    <option value="famille">Droit de la Famille</option>
                    <option value="affaires">Droit des Affaires</option>
                </select>
                <select id="consultationFilter">
                    <option value="">Tous les statuts</option>
                    <option value="1">Consultation En Ligne</option>
                    <option value="0">Sans Consultation En Ligne</option>
                </select>
            </div>
            <div class="card-actions">
                    <a href="../Formulaires/DinamicCreate.php"><button class="btn btn-edit">Add avocat + </button></a>
            </div>
        </div>

        <div class="roster-grid">
            <?php foreach($data as $key){?>
            <div class="roster-card">
                <div class="card-header">
                    <div class="card-avatar">AV</div>
                    <div class="card-title-section">
                        <h3><?= $key['name'] ?></h3>
                        <p><?= $key['specialite'] ?></p>
                    </div>
                </div>
                <div class="card-details">
                    <div class="detail-row">
                        <span class="detail-label">Expérience</span>
                        <span class="detail-value"><?= $key['Annes_dex'] ?> ans</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Localisation</span>
                        <span class="detail-value"><?= $avocatClass -> villeName($key['ville_id']) ?></span>
                    </div>
                    <span class="consultation-badge <?php if($key['consultation_en_ligne']==true){echo 'consultation-yes';}?>"><?php if($key['consultation_en_ligne']==true){echo "✓ Consultation En Ligne";} ?></span>
                </div>
                <div class="card-actions">
                    <button class="btn btn-edit">Edit</button>
                    <button class="btn btn-delete">Delete</button>
                </div>
            </div> 
            <?php } ?>
        </div>

        <div class="pagination" id="pagination"></div>
    </div>
</body>
</html>
