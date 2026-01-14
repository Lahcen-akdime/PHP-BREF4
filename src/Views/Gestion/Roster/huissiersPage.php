<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cabinet d'Huissiers</title>
       <link rel="stylesheet" href="src/Views/Public/style.css">
</head>
<body>
    <?php require_once "../src/Views/public/header.html" ?>
    <div class="container">
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
            <?php foreach($data as $key){?>
            <div class="roster-card">
                <div class="card-header">
                    <div class="card-avatar">HU</div>
                    <div class="card-title-section">
                        <h3><?= $key['name'] ?></h3>
                        <p><?= $key['types_actes'] ?></p>
                    </div>
                </div>
                <div class="card-details">
                    <div class="detail-row">
                        <span class="detail-label">Expérience</span>
                        <span class="detail-value"><?= $key['Annes_dex'] ?> ans</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Localisation</span>
                        <span class="detail-value"><?= $villeClass -> villeName($key['ville_id']) ?></span>
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
