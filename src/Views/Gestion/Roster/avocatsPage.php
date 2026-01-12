<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cabinet Juridique - Avocats</title>
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
            max-width: 1600px;
            margin: 0 auto;
        }

        header {
            margin-bottom: 60px;
            text-align: center;
            animation: fadeInDown 0.8s ease;
        }

        h1 {
            font-size: 3.5rem;
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 50%, #06d6ff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 15px;
            font-weight: 700;
            letter-spacing: -1px;
        }

        .subtitle {
            color: #94a3b8;
            font-size: 1.2rem;
            font-weight: 300;
            letter-spacing: 0.5px;
        }

        .controls-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 50px;
            animation: fadeInUp 0.8s ease;
        }

        .search-box {
            position: relative;
        }

        .search-box input {
            width: 100%;
            padding: 16px 20px;
            background: rgba(30, 41, 59, 0.6);
            border: 2px solid rgba(6, 182, 212, 0.2);
            border-radius: 12px;
            color: #e2e8f0;
            font-size: 1rem;
            backdrop-filter: blur(10px);
            transition: all 0.4s ease;
        }

        .search-box input:focus {
            outline: none;
            border-color: #06b6d4;
            background: rgba(30, 41, 59, 0.8);
            box-shadow: 0 0 30px rgba(6, 182, 212, 0.3);
        }

        .filters {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .filter-group select {
            padding: 16px 20px;
            background: rgba(30, 41, 59, 0.6);
            border: 2px solid rgba(6, 182, 212, 0.2);
            border-radius: 12px;
            color: #e2e8f0;
            font-size: 1rem;
            cursor: pointer;
            backdrop-filter: blur(10px);
            transition: all 0.4s ease;
        }

        .filter-group select:hover,
        .filter-group select:focus {
            border-color: #06b6d4;
            background: rgba(30, 41, 59, 0.8);
            outline: none;
        }

        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 50px;
            animation: fadeInUp 0.8s ease 0.2s backwards;
        }

        .stat-card {
            background: linear-gradient(135deg, rgba(6, 182, 212, 0.1) 0%, rgba(8, 145, 178, 0.05) 100%);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 16px;
            border: 1px solid rgba(6, 182, 212, 0.2);
            text-align: center;
            transition: all 0.4s ease;
        }

        .stat-card:hover {
            transform: translateY(-8px);
            border-color: #06b6d4;
            background: linear-gradient(135deg, rgba(6, 182, 212, 0.15) 0%, rgba(8, 145, 178, 0.1) 100%);
        }

        .stat-number {
            font-size: 3rem;
            background: linear-gradient(135deg, #06b6d4 0%, #06d6ff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .stat-label {
            color: #cbd5e1;
            font-size: 0.95rem;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .roster-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
            animation: fadeInUp 0.8s ease 0.3s backwards;
        }

        .roster-card {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.7) 0%, rgba(51, 65, 85, 0.4) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(6, 182, 212, 0.2);
            border-radius: 16px;
            padding: 30px;
            transition: all 0.4s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .roster-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(6, 182, 212, 0.1), transparent);
            transition: left 0.6s ease;
        }

        .roster-card:hover::before {
            left: 100%;
        }

        .roster-card:hover {
            transform: translateY(-10px);
            border-color: #06b6d4;
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.9) 0%, rgba(51, 65, 85, 0.6) 100%);
            box-shadow: 0 20px 50px rgba(6, 182, 212, 0.15);
        }

        .card-header {
            display: flex;
            align-items: flex-start;
            gap: 20px;
            margin-bottom: 25px;
            position: relative;
            z-index: 1;
        }

        .card-avatar {
            width: 80px;
            height: 80px;
            border-radius: 12px;
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.2rem;
            font-weight: 700;
            color: #0a0e27;
            flex-shrink: 0;
        }

        .card-title-section h3 {
            color: #06b6d4;
            font-size: 1.4rem;
            margin-bottom: 8px;
            font-weight: 700;
        }

        .card-title-section p {
            color: #94a3b8;
            font-size: 0.95rem;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .card-details {
            margin: 25px 0;
            padding: 20px 0;
            border-top: 1px solid rgba(6, 182, 212, 0.1);
            border-bottom: 1px solid rgba(6, 182, 212, 0.1);
            position: relative;
            z-index: 1;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            font-size: 0.95rem;
        }

        .detail-label {
            color: #94a3b8;
            font-weight: 500;
        }

        .detail-value {
            color: #e2e8f0;
            font-weight: 600;
        }

        .consultation-badge {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-top: 10px;
            letter-spacing: 0.5px;
        }

        .consultation-yes {
            background: linear-gradient(135deg, rgba(6, 182, 212, 0.2) 0%, rgba(6, 182, 212, 0.1) 100%);
            color: #06d6ff;
            border: 1px solid rgba(6, 182, 212, 0.3);
        }

        .consultation-no {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.2) 0%, rgba(239, 68, 68, 0.1) 100%);
            color: #ff6b6b;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .card-actions {
            display: flex;
            gap: 12px;
            margin-top: 20px;
            position: relative;
            z-index: 1;
        }

        .btn {
            flex: 1;
            padding: 12px 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: 600;
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
        }

        .btn-edit {
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            color: #0a0e27;
        }

        .btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(6, 182, 212, 0.3);
        }

        .btn-delete {
            background: rgba(239, 68, 68, 0.2);
            color: #ff6b6b;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .btn-delete:hover {
            background: rgba(239, 68, 68, 0.3);
            border-color: rgba(239, 68, 68, 0.5);
        }

        .pagination {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-top: 50px;
            animation: fadeInUp 0.8s ease 0.4s backwards;
        }

        .pagination button {
            padding: 12px 18px;
            background: rgba(30, 41, 59, 0.6);
            border: 2px solid rgba(6, 182, 212, 0.2);
            color: #e2e8f0;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            backdrop-filter: blur(10px);
        }

        .pagination button:hover,
        .pagination button.active {
            border-color: #06b6d4;
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            color: #0a0e27;
            transform: translateY(-2px);
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

        @media (max-width: 1024px) {
            .controls-wrapper {
                grid-template-columns: 1fr;
            }

            .roster-grid {
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            }
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2.5rem;
            }

            .controls-wrapper {
                grid-template-columns: 1fr;
            }

            .filters {
                grid-template-columns: 1fr;
            }

            .roster-grid {
                grid-template-columns: 1fr;
            }

            .stat-card {
                padding: 20px;
            }

            .stat-number {
                font-size: 2.2rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Cabinet d'Avocats</h1>
            <p class="subtitle">Découvrez nos experts juridiques qualifiés</p>
        </header>

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
        </div>
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-number" id="totalCount">12</div>
                <div class="stat-label">Avocats Disponibles</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" id="consultationCount">8</div>
                <div class="stat-label">Consultations En Ligne</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" id="averageExperience">15</div>
                <div class="stat-label">Années d'Expérience Moyenne</div>
            </div>
        </div>

        <div class="roster-grid" id="rosterGrid"></div>

        <div class="pagination" id="pagination"></div>
    </div>

    <script>
        const avocats = [
            { id: 1, name: 'Marie Dupont', specialite: 'Droit_penal', consultation_en_ligne: 1, annees_dex: 12, ville: 'Paris' },
            { id: 2, name: 'Jean Martin', specialite: 'civil', consultation_en_ligne: 1, annees_dex: 18, ville: 'Lyon' },
            { id: 3, name: 'Sophie Bernard', specialite: 'famille', consultation_en_ligne: 0, annees_dex: 10, ville: 'Marseille' },
            { id: 4, name: 'Pierre Moreau', specialite: 'affaires', consultation_en_ligne: 1, annees_dex: 20, ville: 'Paris' },
            { id: 5, name: 'Claire Laurent', specialite: 'Droit_penal', consultation_en_ligne: 1, annees_dex: 15, ville: 'Toulouse' },
            { id: 6, name: 'Thomas Petit', specialite: 'civil', consultation_en_ligne: 0, annees_dex: 8, ville: 'Nice' },
            { id: 7, name: 'Nathalie Durand', specialite: 'famille', consultation_en_ligne: 1, annees_dex: 14, ville: 'Paris' },
            { id: 8, name: 'Marc Leclerc', specialite: 'affaires', consultation_en_ligne: 1, annees_dex: 22, ville: 'Bordeaux' },
            { id: 9, name: 'Julie Fontaine', specialite: 'Droit_penal', consultation_en_ligne: 1, annees_dex: 11, ville: 'Lille' },
            { id: 10, name: 'David Renard', specialite: 'civil', consultation_en_ligne: 0, annees_dex: 16, ville: 'Paris' },
            { id: 11, name: 'Isabelle Roy', specialite: 'famille', consultation_en_ligne: 1, annees_dex: 13, ville: 'Lyon' },
            { id: 12, name: 'Nicolas Lefevre', specialite: 'affaires', consultation_en_ligne: 1, annees_dex: 19, ville: 'Paris' }
        ];

        let currentPage = 1;
        const itemsPerPage = 6;
        let filteredAvocats = [...avocats];

        function updateStats() {
            document.getElementById('totalCount').textContent = filteredAvocats.length;
            const withConsultation = filteredAvocats.filter(a => a.consultation_en_ligne === 1).length;
            document.getElementById('consultationCount').textContent = withConsultation;
            const avgExp = Math.round(filteredAvocats.reduce((sum, a) => sum + a.annees_dex, 0) / filteredAvocats.length);
            document.getElementById('averageExperience').textContent = avgExp;
        }

        function getInitials(name) {
            return name.split(' ').map(n => n[0]).join('').toUpperCase();
        }

        function renderRoster() {
            const grid = document.getElementById('rosterGrid');
            grid.innerHTML = '';
            
            const start = (currentPage - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            const pageItems = filteredAvocats.slice(start, end);

            pageItems.forEach(avocat => {
                const card = document.createElement('div');
                card.className = 'roster-card';
                card.innerHTML = `
                    <div class="card-header">
                        <div class="card-avatar">${getInitials(avocat.name)}</div>
                        <div class="card-title-section">
                            <h3>${avocat.name}</h3>
                            <p>${avocat.specialite.replace('_', ' ').toUpperCase()}</p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="detail-row">
                            <span class="detail-label">Expérience</span>
                            <span class="detail-value">${avocat.annees_dex} ans</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Localisation</span>
                            <span class="detail-value">${avocat.ville}</span>
                        </div>
                        <span class="consultation-badge ${avocat.consultation_en_ligne ? 'consultation-yes' : 'consultation-no'}">
                            ${avocat.consultation_en_ligne ? '✓ Consultation En Ligne' : '✗ Non Disponible'}
                        </span>
                    </div>
                    <div class="card-actions">
                        <button class="btn btn-edit">Profil</button>
                        <button class="btn btn-delete">Contacter</button>
                    </div>
                `;
                grid.appendChild(card);
            });

            renderPagination();
        }

        function renderPagination() {
            const pagination = document.getElementById('pagination');
            pagination.innerHTML = '';
            const totalPages = Math.ceil(filteredAvocats.length / itemsPerPage);

            for (let i = 1; i <= totalPages; i++) {
                const btn = document.createElement('button');
                btn.textContent = i;
                btn.className = i === currentPage ? 'active' : '';
                btn.onclick = () => {
                    currentPage = i;
                    renderRoster();
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                };
                pagination.appendChild(btn);
            }
        }

        function filterAvocats() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const speciality = document.getElementById('specialityFilter').value;
            const consultation = document.getElementById('consultationFilter').value;

            filteredAvocats = avocats.filter(avocat => {
                const matchSearch = avocat.name.toLowerCase().includes(searchTerm) || avocat.ville.toLowerCase().includes(searchTerm);
                const matchSpeciality = !speciality || avocat.specialite === speciality;
                const matchConsultation = consultation === '' || avocat.consultation_en_ligne.toString() === consultation;
                return matchSearch && matchSpeciality && matchConsultation;
            });

            currentPage = 1;
            updateStats();
            renderRoster();
        }

        document.getElementById('searchInput').addEventListener('input', filterAvocats);
        document.getElementById('specialityFilter').addEventListener('change', filterAvocats);
        document.getElementById('consultationFilter').addEventListener('change', filterAvocats);

        updateStats();
        renderRoster();
    </script>
</body>
</html>
