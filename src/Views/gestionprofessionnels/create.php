<!DOCTYPE html>
<html lang="fr">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Créer Profil Professionnel</title>
        <!-- <link rel="stylesheet" href="../Public/style.css"> -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="../Public/form.js" ></script>
        <style>

        :root {
            --bg-main: radial-gradient(circle at top, #0f172a, #020617);
            --bg-card: #020617;
            --border: #1e293b;
            --text-muted: #94a3b8;
            --gradient: linear-gradient(90deg, #22d3ee, #facc15);
        }

        /* =======================
   RESET & BASE
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

    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <title>Configuration du Profil</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <!-- <div class="page">
            <div class="left">
                <h1>
                    Configuration<br>
                    du <span>Profil</span>
                </h1>
                <p>Renseignez vos informations professionnelles</p>
            </div> -->

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
                                <button id="btnAvocat" type="button" class="option active">⚖️ Avocat</button>
                                <button id="btnHuissier" type="button" class="option">📜 Huissier</button>
                            </div>

                            <div class="grid">
                                <input id="Nom" type="text" placeholder="Nom complet">
                                <input id="Email" type="email" placeholder="Email professionnel">
                            </div>
                                <input id="password" type="text" name="password" placeholder="password....">
                            <button id="btn1" type="button" class="next">Suivant</button>

                        </div>
                        <!-- STEP 2 -->
                        <div id="step2" class="step">
                            <div class="grid">
                                <input id="annees_experience" type="number" placeholder="Nombre d'années d'expérience">
                                <input id="Tarif" type="text" placeholder="Tarif de base">
                            </div>

                            <select id="selectSpesialete">
                                <option value="">select spesialete</option>
                                <option value="affaires">affaires</option>
                                <option value="civil">civil</option>
                                <option value="famille">famille</option>
                                <option value="Droit_penal">Droit_penal</option>
                            </select>
                            <select id="selectTypesdactes">
                                <option>select Types_d'actes</option>
                                <option>execution</option>
                                <option>constats</option>
                                <option>signification</option>
                                <option>Droit_penal</option>
                            </select>

                            <div class="buttons">
                                <button id="btnRetour1" type="button" class="prev">Retour</button>
                                <button id="btn2"  type="button" class="next">Suivant</button>
                            </div>
                        </div>

                        <!-- STEP 3 -->
                        <div id="step3" class="step">
                            <select id="Ville">
                                <option>Beni Mellal</option>
                                <option>Casablanca</option>
                                <option>Rabat</option>
                            </select>

                            <div class="radio">
                                <label><input id="conseltationOui" type="radio" name="online"> Oui</label>
                                <label><input id="conseltationNon" type="radio" name="online"> Non</label>
                            </div>

                            <input id="file" type="file">

                            <div class="buttons">
                                <button id="btnRetour2" type="button" class="prev">Retour</button>
                                <button id="btn3" type="submit" class="submit">CRÉER MON PROFIL PROFESSIONNEL</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        </div>
    </body>

    </html>



</body>

</html>