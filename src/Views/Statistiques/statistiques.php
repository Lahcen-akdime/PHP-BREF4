<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques - Professionnels Juridiques</title>
    <link rel="stylesheet" href="src/Views/Public/style.css">
</head>
<body>
    <div class="container">
             <?php require_once "../src/Views/public/header.php" ?>
            <h1 style="text-align: center;">Statistiques Professionnels Juridiques</h1>

        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-number"><?= $avocatsSum ?></div>
                <div class="stat-label">Avocats Enregistrés</div>
            </div>

            <div class="stat-card">
                <div class="stat-number"><?= $huissierSum ?></div>
                <div class="stat-label">Huissiers de Justice</div>
            </div>

            <div class="stat-card">
                <div class="stat-number"><?= $avocatsSum+$huissierSum ?></div>
                <div class="stat-label">Professionnels Totaux</div>
            </div>
        </div>

        <div class="tables-section">
            <div class="table-wrapper">
                <h2 class="table-title">Répartition par Ville</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Ville</th>
                            <th>Avocats</th>
                            <th>Huissiers</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                         foreach ($allvilles as $key) {?>
                            <tr>
                                <td><?= $key['name'] ?></td>
                                <td><?= $count1 = $villeClass->gitCountByVille("avocat",$key['id']) ?></td>
                                <td><?= $count2 = $villeClass->gitCountByVille("huissier",$key['id']) ?></td>
                                <td><?= $count1+$count2?></td>
                            </tr>
                        <?php }  ?>
                    </tbody>
                </table>
            </div>

            <div class="table-wrapper">
                <h2 class="table-title">Top 3 Avocats (Expérience)</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Rang</th>
                            <th>Nom</th>
                            <th>Années d'Expérience</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $a = 1 ?>
                        <?php foreach ($top3 as $key ) {?>
                        <tr>
                            <td class="rank"><?= $a++ ?></td>
                            <td><?= $key['name'] ?></td>
                            <td>
                                <div class="experience-bar">
                                    <div class="bar-fill"></div>
                                    <span class="years"><?= $key['Annes_dex'] ?> ans</span>
                                </div>
                            </td>
                        </tr>
                        <?php }  ?>
                        <tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
