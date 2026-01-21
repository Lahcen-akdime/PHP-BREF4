<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer Profil Professionnel</title>
    <link rel="stylesheet" href="../Public/style.css">

</head>
<body>

<div class="dashboard-container">
    <div class="setup-card">
        <div class="setup-header">
            <h1 class="gradient-text">Configuration du Profil</h1>
            <p>Renseignez vos informations professionnelles</p>
        </div>

        <div class="role-selector">
            <label class="role-tab">
                <input type="radio" name="role" value="avocat" checked onclick="switchFields('avocat')">
                <div class="tab-design">⚖️ <span>Avocat</span></div>
            </label>
            <label class="role-tab">
                <input type="radio" name="role" value="huissier" onclick="switchFields('huissier')">
                <div class="tab-design">📜 <span>Huissier</span></div>
            </label>
        </div>

        <form action="#" class="main-form">
            <div class="grid-layout">
                <div class="form-group">
                    <label>Nom Complet</label>
                    <input type="text" placeholder="Ex: Yassmine Jabal" required>
                </div>
                <div class="form-group">
                    <label>Email Professionnel</label>
                    <input type="email" placeholder="yassmine@example.com" required>
                </div>
                <div class="form-group">
                    <label>Expérience</label>
                    <input type="number" placeholder="Nombre d'années">
                </div>
                <div class="form-group">
                    <label>Tarif de base</label>
                    <input type="number" step="0.01" placeholder="0.00 DH">
                </div>

                <div id="avocat-only" class="form-group full-width">
                    <label>Spécialité </label>
                    <select>
                        <option>Droit de la Famille</option>
                        <option>Droit des Affaires</option>
                        <option>Droit Pénal</option>
                    </select>
                </div>
                <div id="huissier-only" class="form-group full-width" style="display:none">
                    <label>Types d'actes</label>
                    <input type="text" placeholder="Ex: Constats, Recouvrement...">
                </div>

                <div class="form-group">
                    <label>Ville</label>
                    <select>
                        <option>Marrakech</option>
                        <option>Casablanca</option>
                        <option>Beni Mellal</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Consultation en ligne</label>
                    <div class="toggle-flex">
                        <label><input type="radio" name="online" checked> Non</label>
                        <label><input type="radio" name="online"> Oui</label>
                    </div>
                </div>

                <div class="form-group full-width">
                    <label>Documents justificatifs</label>
                    <input type="file" class="file-custom">
                </div>
            </div>

            <button type="submit" class="save-btn">Créer mon profil professionnel</button>
        </form>
    </div>
</div>

    <script>
/**
 * تبديل الحقول بناءً على نوع المهنة المختار
 * @param {string} role - 'avocat' أو 'huissier'
 */
function switchFields(role) {
    // جلب الحاويات الخاصة بكل مهنة
    const avocatSection = document.getElementById('avocat-only');
    const huissierSection = document.getElementById('huissier-only');

    if (role === 'avocat') {
        avocatSection.style.display = 'block';
        huissierSection.style.display = 'none';
        
    } else {
        avocatSection.style.display = 'none';
        huissierSection.style.display = 'block';
        
    }
}


    </script>
</body>
</html>