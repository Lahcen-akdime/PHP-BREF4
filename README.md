✅ Contexte du projet :

Cette phase se concentre sur l'authentification des utilisateurs, la gestion des flux de travail et l'automatisation des consultations.

Système d'Authentification et Inscription
Clients : Inscription standard (Nom, Email, Mot de passe).
Professionnels (Avocats/Huissiers) : Inscription par étapes (Multi-step form) :
Informations personnelles : Profil, spécialité et tarifs.
Documents : Téléchargement des justificatifs (Carte professionnelle, diplômes).
Révision (Review) : Mise en attente pour validation par l'administrateur.
Fonctionnalités par Profil
Pour les Avocats & Huissiers :
Gestion de disponibilité : Configuration d'un emploi du temps hebdomadaire (jours et créneaux horaires).
Gestion des demandes : Interface pour accepter ou refuser les demandes de consultation entrantes.
Tableau de bord (Statistiques personnelles) : Chiffre d'affaires total généré via l'application, Nombre total de demandes reçues, Nombre de clients uniques, Cumul des heures de travail effectuées.
Compteur de visibilité : Calcul du nombre de visites uniques sur leur profil public.
Pour les Clients :
Prise de rendez-vous : Recherche avancée et consultation des créneaux disponibles en temps réel.
Consultation en ligne : Possibilité de solliciter une consultation à distance via un lien de visioconférence (Google Meet ou Zoom).
Pour l'Administrateur :
Modération : Interface de validation des comptes professionnels après vérification des documents fournis lors de l'inscription.

✨ Bonus
Intégration Zoom/Meet : Utilisation d'un package Composer (ex: zoom-php-wrapper) pour générer automatiquement un lien de réunion dès qu'une consultation est validée par le professionnel.
Suivi d'audience : Implémentation d'un système de log dans la base de données pour évitant les inscriptions doublons par IP.
L'utilisation de FullCalendar pour un UI/UX
