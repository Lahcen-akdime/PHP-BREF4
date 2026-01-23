📌 Contexte du Projet

Cette phase du projet est dédiée à la gestion de l’authentification, à l’organisation des flux de travail et à l’automatisation des consultations entre les différents profils de la plateforme.

L’objectif principal est d’assurer une expérience fluide, sécurisée et adaptée à chaque type d’utilisateur : Clients, Professionnels (Avocats & Huissiers) et Administrateur.

🔐 Système d’Authentification & d’Inscription
👤 Clients

Inscription standard :

Nom

Email

Mot de passe

Accès immédiat à la plateforme après inscription

⚖️ Professionnels (Avocats / Huissiers)

Inscription via un formulaire multi-étapes (Multi-step Form) :

Informations personnelles

Profil professionnel

Spécialité

Tarifs de consultation

Documents justificatifs

Carte professionnelle

Diplômes ou attestations

Révision & Validation

Mise en attente du compte

Validation manuelle par l’administrateur

🧩 Fonctionnalités par Profil
👨‍⚖️ Avocats & Huissiers

Gestion de la disponibilité

Configuration d’un emploi du temps hebdomadaire

Définition des jours et créneaux horaires disponibles

Gestion des demandes

Interface pour accepter ou refuser les demandes de consultation

Tableau de bord (Statistiques personnelles)

Chiffre d’affaires total généré via la plateforme

Nombre total de demandes reçues

Nombre de clients uniques

Cumul des heures de travail effectuées

Compteur de visibilité

Calcul du nombre de visites uniques sur le profil public

👥 Clients

Prise de rendez-vous

Recherche avancée des professionnels

Consultation des créneaux disponibles en temps réel

Consultation en ligne

Possibilité de demander une consultation à distance

Utilisation d’un lien de visioconférence (Google Meet ou Zoom)

🛠️ Administrateur

Modération & Validation

Interface dédiée à la vérification des comptes professionnels

Validation ou refus des inscriptions après contrôle des documents

✨ Bonus

Intégration Zoom / Google Meet

Utilisation d’un package Composer (ex : zoom-php-wrapper)

Génération automatique d’un lien de réunion après validation d’une consultation par le professionnel

Suivi d’audience

Implémentation d’un système de logs en base de données

Détection et prévention des inscriptions multiples à partir d’une même adresse IP

Interface UI/UX

Utilisation de FullCalendar pour la gestion et l’affichage des disponibilités et rendez-vous
