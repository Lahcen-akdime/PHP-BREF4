<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Professionnel Juridique</title>

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
            padding: 40px 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
        }

        header {
            margin-bottom: 50px;
            text-align: center;
            animation: fadeInDown 0.8s ease;
        }

        h1 {
            font-size: 2.8rem;
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 50%, #06d6ff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .subtitle {
            color: #94a3b8;
            font-size: 1rem;
            font-weight: 300;
        }

        .type-selector {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 40px;
            animation: fadeInUp 0.8s ease;
        }

        .radio-option {
            display: none;
        }

        .radio-label {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: rgba(30, 41, 59, 0.6);
            border: 2px solid rgba(6, 182, 212, 0.2);
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.4s ease;
            font-weight: 600;
            letter-spacing: 0.5px;
            backdrop-filter: blur(10px);
        }

        .radio-option:checked + .radio-label {
            border-color: #06b6d4;
            background: linear-gradient(135deg, rgba(6, 182, 212, 0.2) 0%, rgba(6, 182, 212, 0.1) 100%);
            color: #06b6d4;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(6, 182, 212, 0.2);
        }

        .radio-option[value="huissier"]:checked + .radio-label {
            border-color: #f59e0b;
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.2) 0%, rgba(245, 158, 11, 0.1) 100%);
            color: #f59e0b;
            box-shadow: 0 8px 20px rgba(245, 158, 11, 0.2);
        }

        .form-container {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.7) 0%, rgba(51, 65, 85, 0.4) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(6, 182, 212, 0.2);
            border-radius: 16px;
            padding: 40px;
            animation: fadeInUp 0.8s ease 0.2s backwards;
        }

        .form-group {
            margin-bottom: 30px;
        }

        .form-group:last-child {
            margin-bottom: 0;
        }

        label {
            display: block;
            margin-bottom: 12px;
            color: #cbd5e1;
            font-weight: 600;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
        }

        input,
        select {
            width: 100%;
            padding: 14px 18px;
            background: rgba(15, 23, 41, 0.6);
            border: 2px solid rgba(6, 182, 212, 0.2);
            border-radius: 8px;
            color: #e2e8f0;
            font-size: 0.95rem;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            backdrop-filter: blur(10px);
            transition: all 0.4s ease;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #06b6d4;
            background: rgba(15, 23, 41, 0.8);
            box-shadow: 0 0 20px rgba(6, 182, 212, 0.2);
        }

        .radio-option[value="huissier"]:checked ~ .form-container input:focus,
        .radio-option[value="huissier"]:checked ~ .form-container select:focus {
            border-color: #f59e0b;
            box-shadow: 0 0 20px rgba(245, 158, 11, 0.2);
        }

        .conditional-field {
            display: none;
        }

        .conditional-field.active {
            display: block;
            animation: slideDown 0.4s ease;
        }

        .form-divider {
            display: none;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(6, 182, 212, 0.2), transparent);
            margin: 35px 0;
        }

        .form-divider.active {
            display: block;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-row .form-group {
            margin-bottom: 20px;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .checkbox-input {
            width: 24px;
            height: 24px;
            cursor: pointer;
            accent-color: #06b6d4;
        }

        .radio-option[value="huissier"]:checked ~ .form-container .checkbox-input {
            accent-color: #f59e0b;
        }

        .button-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-top: 40px;
        }

        button {
            padding: 16px 24px;
            border: none;
            border-radius: 8px;
            font-size: 0.95rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
        }

        .btn-submit {
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            color: #0a0e27;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(6, 182, 212, 0.3);
        }

        .radio-option[value="huissier"]:checked ~ .form-container .btn-submit {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        }

        .btn-cancel {
            background: rgba(239, 68, 68, 0.2);
            color: #ff6b6b;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .btn-cancel:hover {
            background: rgba(239, 68, 68, 0.3);
            border-color: rgba(239, 68, 68, 0.5);
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            .form-container {
                padding: 25px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .button-group {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Ajouter un Professionnel</h1>
            <p class="subtitle">Enregistrez un nouvel Huissier ou huissier</p>
        </header>

        <form id="professionalForm" class="professional-form" method="POST">
            <div class="type-selector">
                <input type="radio" id="Huissier-type" class="radio-option" name="profession" value="Huissier" checked>
                <label for="Huissier-type" class="radio-label">Huissier</label>
            </div>

            <div class="form-container">
                <!-- Common Fields -->
                <div class="form-group">
                    <label for="name">Nom Complet *</label>
                    <input type="text" id="name" name="name" placeholder="Jean Dupont" value="<?= $data['name'] ?>" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="experience">Années d'Expérience *</label>
                        <input type="number" id="experience" name="Annes_dex" value="<?= $data['Annes_dex'] ?>" placeholder="10" min="0" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="ville">Ville *</label>
                        <select id="specialty" name="ville_id">
                            <option value="<?= $data['ville_id'] ?>"><?= $villeClass -> villeName($data['ville_id']) ?></option>
                           <?php foreach($allvilles as $ville){?>
                            <option value="<?= $ville['id'] ?>"><?= $ville['name'] ?></option>
                           <?php }  ?>
                        </select>
                    </div>
                </div>
                <input type="hidden" value="<?= $data['id'] ?>" name="id">
                <!-- huissier Specific Fields -->
                <div id="huissier-field">
                    <div class="form-group">
                        <label for="types-actes">Types d'Actes *</label>
                        <select id="types-actes" name="types_actes" value="<?= $data['types_actes'] ?>">
                            <option value="<?= $data['types_actes'] ?>"><?= $data['types_actes'] ?></option>
                            <option value="Signification">Signification</option>
                            <option value="Constats">Constats</option>
                            <option value="execution">execution</option>
                        </select>
                    </div>
                </div>


                <div class="form-divider" id="divider"></div>

                <!-- Common Bottom Field -->
                <div class="form-group checkbox-group" style="margin-top: 2rem;">
                    <label for="consultation" style="margin-bottom: 0;">Consultation en ligne </label>
                    <select type="checkbox" id="types-actes" name="consultation_en_ligne">
                        <option value="0">Non</option>
                        <option value="1">Oui</option>
                    </select>
                </div>

                <!-- Buttons -->
                <div class="button-group">
                    <a href="avocats"><button type="button" class="btn-cancel">Annuler</button></a>
                    <button type="submit" class="btn-submit">Modifier</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>