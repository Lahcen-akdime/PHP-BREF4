<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Créer Profil Professionnel</title> -->
    <!-- <link rel="stylesheet" href="../Public/style.css"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    
    <style>
        :root {
            --bg-main: radial-gradient(circle at top, #0f172a, #020617);
            --bg-card: #020617;
            --border: #1e293b;
            --text-muted: #94a3b8;
            --gradient: linear-gradient(90deg, #22d3ee, #facc15);
        }
        
        /* =======================
        
        ======================= */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }
        
        body {
            min-height: 100vh;
            background: var(--bg-main);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* =======================
        LAYOUT
        ======================= */
        .page {
            width: 90%;
            max-width: 1200px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 60px;
        }

        .left {
            flex: 1;
        }
        
        .right {
            flex: 1;
            display: flex;
            justify-content: center;
        }
        
        /* =======================
        LEFT CONTENT
        ======================= */
        .left h1 {
            font-size: 56px;
            line-height: 1.1;
        }
        
        .left h1 span {
            background: var(--gradient);
            -webkit-background-clip: text;
            color: transparent;
        }
        
        .left p {
            margin-top: 15px;
            max-width: 350px;
            color: var(--text-muted);
        }
        
        /* =======================
        CARD / FORM
        ======================= */
        .card {
            width: 380px;
            background: var(--bg-card);
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.6);
        }
        
        /* =======================
        FORM ELEMENTS
        ======================= */
        .step {
            display: none;
        }
        
        .step.active {
            display: block;
        }
        
        .toggle {
            display: flex;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 20px;
        }
        
        .option {
            flex: 1;
            padding: 12px;
            border: none;
            background: transparent;
            color: white;
            cursor: pointer;
        }
        
        .option.active {
            background: var(--gradient);
            color: black;
        }
        
        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }
        
        input,
        textarea,
        select {
            width: 100%;
            padding: 12px;
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 10px;
            color: white;
            margin-bottom: 12px;
        }
        
        textarea {
            resize: none;
            height: 80px;
        }
        
        .radio {
            display: flex;
            justify-content: space-around;
            margin: 15px 0;
        }
        
        /* =======================
        BUTTONS
        ======================= */
        .buttons {
            display: flex;
            gap: 10px;
        }
        
        button {
            padding: 12px;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        
        .next,
        .submit {
            background: var(--gradient);
            font-weight: bold;
        }
        
        .prev {
            background: var(--border);
            color: white;
        }

        :root {
            --bg-main: radial-gradient(circle at top, #0f172a, #020617);
            --bg-card: #020617;
            --border: #1e293b;
            --text-muted: #94a3b8;
            --gradient: linear-gradient(90deg, #22d3ee, #facc15);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }
        
        body {
            min-height: 100vh;
            background: var(--bg-main);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .card {
            width: 420px;
            background: var(--bg-card);
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, .6);
        }
        
        h1 {
            font-size: 30px;
            margin-bottom: 5px;
        }
        
        h1 span {
            background: var(--gradient);
            -webkit-background-clip: text;
            color: transparent;
        }
        
        .subtitle {
            color: var(--text-muted);
            font-size: 14px;
            margin-bottom: 25px;
        }
        
        .info {
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 12px;
        }
        
        .label {
            font-size: 12px;
            color: var(--text-muted);
        }
        
        .value {
            font-size: 16px;
            font-weight: 600;
            margin-top: 4px;
        }
        
        .badge {
            display: inline-block;
            padding: 6px 14px;
            border-radius: 20px;
            background: var(--gradient);
            color: black;
            font-weight: bold;
            font-size: 13px;
        }
        
        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }
        
        .footer {
            margin-top: 25px;
            text-align: center;
        }
        
        button {
            padding: 12px 20px;
            border-radius: 14px;
            border: none;
            cursor: pointer;
            font-weight: bold;
            background: var(--gradient);
        }
        
        /* =======================
        RESPONSIVE
        ======================= */
        @media (max-width: 900px) {
            .page {
                flex-direction: column;
                text-align: center;
            }
            
            .left h1 {
                font-size: 42px;
            }
            
            .right {
                width: 100%;
            }
            
            .left p {
                margin: 15px auto;
            }
        }
        </style>
</head>

<body>
    <form action="ProfessionnelController" method="POST" enctype="multipart/form-data">
        <div class="right">
            <div class="card">
                <div class="container">
                    <h1>Configuration du <span>Profil</span></h1>
                    <p class="subtitle">Renseignez vos informations professionnelles</p>
                    
                    <div id="error" class="alert alert-danger" role="alert" style="display: none;">
                        This is a danger alert—check it out!
                    </div>
                    
                    <!-- STEP 1-->
                    
                    <div id="step1" class="step active">
                        <div class="toggle">
                            <label><input name="type" id="btnAvocat" value="avocats" type="radio" class="option active">⚖️ Avocat</input></label>
                            <label><input name="type" id="btnHuissier" value="huissiers" type="radio" class="option">📜 Huissier</input></label>
                        </div>
                        
                        <div class="grid">
                            <input name="name" id="Nom" type="text" placeholder="Nom complet">
                            <input name="email" id="Email" type="email" placeholder="Email professionnel">
                        </div>
                        <input id="password" type="text" name="password" placeholder="password....">
                        <button id="btn1" type="button" class="next">Suivant</button>
                        
                    </div>
                    <!-- STEP 2 -->
                    <div id="step2" class="step">
                        <div class="grid">
                            <input name="annees_experience" id="annees_experience" type="number" placeholder="Nombre d'années d'expérience">
                            <input id="Tarif" type="text" name="Tarif" placeholder="Tarif de base">
                        </div>
                        
                        <select id="selectSpesialete" name="specialite">
                            <option value="">select spesialete</option>
                            <option value="affaires">affaires</option>
                            <option value="civil">civil</option>
                            <option value="famille">famille</option>
                            <option value="Droit_penal">Droit_penal</option>
                        </select>
                        <select id="selectTypesdactes" name="types_actes">
                            <option value="">select Types_d'actes</option>
                            <option value="execution">execution</option>
                            <option value="constats">constats</option>
                            <option value="signification">signification</option>
                        </select>
                        
                        <div class="buttons">
                            <button id="btnRetour1" type="button" class="prev">Retour</button>
                            <button id="btn2" type="button" class="next">Suivant</button>
                        </div>
                    </div>

                    <!-- STEP 3 -->
                    <div id="step3" class="step">
                        <select id="Ville" name="Ville">
                            <option>Beni Mellal</option>
                            <option>Casablanca</option>
                            <option>Rabat</option>
                        </select>
                        
                        <div class="radio">
                            <label><input id="conseltationOui" type="radio" name="conseltation" value="oui"> Oui</label>
                            <label><input id="conseltationNon" type="radio" name="conseltation" value="non"> Non</label>
                        </div>
                        
                        <input id="file" type="file" name="document">
                        
                        
                        
                        <div class="buttons">
                            <button id="btnRetour2" type="button" class="prev">Retour</button>
                            <button id="btnvalidation" type="button" class="prev">suivent</button>
                        </div>
                    </div>
                    <!-- STEP 4 -->
                    <div id="card-profil" class="card" style="display: none;">
                        <div class="info">
                            <div class="label">Nom complet</div>
                            <div id="nameafficher" class="value"></div>
                        </div>
                        
                        <div class="info">
                            <div class="label">Email</div>
                            <div id="emailafficher" class="value"></div>
                        </div>
                        
                        <div class="grid">
                            <div class="info">
                                <div class="label">Expérience</div>
                                <div id="anneExperienceafficher" class="value"></div>
                            </div>
                            
                            <div class="info">
                                <div class="label"></div>
                                <div id="Tarifafficher" class="value"></div>
                            </div>
                        </div>
                        
                        <div class="info">
                            <div class="label">Spécialité</div>
                            <div id="specialiteafficher" class="value"></div>
                            
                        </div>
                        
                        <div class="info">
                            <div class="label">Types d’actes</div>
                            <div id="typeacteafficher" class="value"></div>
                        </div>
                        
                        <div class="grid">
                            <div class="info">
                                <div class="label">Ville</div>
                                <div id="villeafficher" class="value"></div>
                            </div>
                            
                            <div class="info">
                                <div class="label"></div>
                                <div id="Consultationafficher" class="value">Oui</div>
                            </div>
                        </div>

                        <div class="footer">
                            <button>Modifier le profil</button>
                            
                            <button id="btn3" type="submit" class="submit">CRÉER MON PROFIL PROFESSIONNEL</button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </form>
    <script src="form.js"></script>
</body>

</html>