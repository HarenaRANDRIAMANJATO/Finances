
CREATE DATABASE finance
 
USE finance;

CREATE TABLE type_recette (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) UNIQUE NOT NULL,
    description TEXT
);
CREATE TABLE type_depense (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) UNIQUE NOT NULL,
    description TEXT
);
CREATE TABLE type_deficite (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) UNIQUE NOT NULL,
    description TEXT
);
CREATE TABLE recette (
  id INT AUTO_INCREMENT PRIMARY KEY,
  periode_id INT NOT NULL,
  type_recette_id INT NOT NULL,
  libelle VARCHAR(255),
  montant_milliards DECIMAL(15,3) NOT NULL, 
  source_detail VARCHAR(255),
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (periode_id) REFERENCES periode(id) ON DELETE CASCADE,
  FOREIGN KEY (type_recette_id) REFERENCES type_recette(id) ON DELETE RESTRICT,
  INDEX (periode_id)
);
CREATE TABLE recette_douane (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nature VARCHAR(255) NOT NULL,
    montant_2024 DECIMAL(15,2) NOT NULL,
    montant_2025 DECIMAL(15,2) NOT NULL
);
CREATE TABLE recette_non_fiscale (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nature VARCHAR(255) NOT NULL,
    montant_2024 DECIMAL(15,1) NOT NULL,
    montant_2025 DECIMAL(15,1) NOT NULL
);
CREATE TABLE recette_dons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nature VARCHAR(200),
    montant_2024 DECIMAL(15,1),
    montant_2025 DECIMAL(15,1)
);
CREATE TABLE recette_fiscale (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nature VARCHAR(200),
    montant_2024 DECIMAL(15,1),
    montant_2025 DECIMAL(15,1)
);


CREATE TABLE depense (
  id INT AUTO_INCREMENT PRIMARY KEY,
  periode_id INT NOT NULL,
  type_depense_id INT NOT NULL,
  libelle VARCHAR(255),
  montant_milliards DECIMAL(15,3) NOT NULL,
  commentaire TEXT,
  FOREIGN KEY (periode_id) REFERENCES periode(id) ON DELETE CASCADE,
  FOREIGN KEY (type_depense_id) REFERENCES type_depense(id) ON DELETE RESTRICT,
  INDEX (periode_id)
);
CREATE TABLE depense_rubrique(
     id INT AUTO_INCREMENT PRIMARY KEY,
    nature VARCHAR(200),
    montant_2024 DECIMAL(15,1),
    montant_2025 DECIMAL(15,1)
);
CREATE TABLE depense_libelles(
     id INT AUTO_INCREMENT PRIMARY KEY,
    nature VARCHAR(200),
    montant_2024 DECIMAL(15,1),
    montant_2025 DECIMAL(15,1)
);
CREATE TABLE depense_fonctionnement (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nature VARCHAR(255),
    montant_2024 DECIMAL(10,1),
    montant_2025 DECIMAL(10,1),
    ecart DECIMAL(10,1),
    observation TEXT
);

CREATE TABLE depense_ratachement(
     id INT AUTO_INCREMENT PRIMARY KEY,
    nature VARCHAR(200),
    montant_2024 DECIMAL(15,1),
    montant_2025 DECIMAL(15,1)
);
CREATE TABLE depense_solde (
    id INT AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(255),
    montant_2024 DECIMAL(10,1),
    montant_2025 DECIMAL(10,1),
    ecart DECIMAL(10,1)
);
CREATE TABLE depense_poste (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ministere VARCHAR(255),
    montant_2025 DECIMAL(10,1)
);

CREATE TABLE deficit (
  id INT AUTO_INCREMENT PRIMARY KEY,
  periode_id INT NOT NULL,
  montant_milliards DECIMAL(15,3) NOT NULL,
  pourcentage_pib DECIMAL(5,2),
  financement_exterieur_milliards DECIMAL(15,3),
  financement_interieur_milliards DECIMAL(15,3),
  commentaire TEXT,
  FOREIGN KEY (periode_id) REFERENCES periode(id) ON DELETE CASCADE
);

INSERT INTO recette_fiscale(nature, montant_2024, montant_2025) VALUES
   ('Impot sur les revenus', 1179.0, 1411.4),
    ('Impot sur les revenus salariaux et assimilés', 848.2, 889.9),
    ('Impot sur les revenus des capitaux mobiliers', 78.2, 93.7),
    ('Impot sur les plus-values immobilières', 14.0, 18.3),
    ('Impot synthétique', 132.3, 164.7),
    ('Droit d’enregistrement', 49.0, 62.8),
    ('Taxe sur la valeur ajoutée (y compris taxe sur les transactions mobiles)', 1400.2, 1742.2),
    ('Impot sur les marchés publics', 148.7, 250.0),
    ('Droit d’accise (y compris taxe environnementale)', 754.1, 955.4),
    ('Taxes sur les assurances', 17.2, 20.6),
    ('Droit de timbres', 14.1, 16.8),
    ('Autres', 1.5, 2.7);

INSERT INTO recette_dons (nature, montant_2024, montant_2025) VALUES
('Courant', 200.0, 250.0),
('Capital', 150.0, 180.0);


INSERT INTO recette_non_fiscale (nature, montant_2024, montant_2025) VALUES
('Dividendes', 89.5, 120.2),
('Productions immobilières financières', 0.5, 2.1),
('Redevance de pêche', 10.0, 15.0),
('Redevance minières', 84.9, 331.2),
('Autres redevances', 9.7, 10.0),
('Produits des activités et autres', 11.1, 8.1),
('Autres', 140.1, 5.2);

INSERT INTO type_recette (nom) VALUES ('Fiscale'), ('Non fiscale'), ('Douane'), ('Dons');
INSERT INTO type_depense (nom) VALUES ('Investissement'), ('Fonctionnement'), ('Subvention'), ('Salaires');
INSERT INTO type_deficite (nom) VALUES ('Déficit global'), ('Déficit primaire'), ('Solde courant');

-- Recettes
INSERT INTO recette (libelle, montant_milliards, created_at, type_recette_id, source_detail) VALUES
('Impot sur le revenu', 15000000, '2025-01-15', 1, 'Recette fiscale principale'),
('Taxe sur la valeur ajoutée', 12000000, '2025-02-20', 1, 'TVA collectée'),
('Dons internationaux', 5000000, '2025-03-10', 4, 'Aide humanitaire'),
('Droits de douane importations', 3000000, '2025-04-05', 3, 'Taxes sur importations'),
('Revenus non fiscaux divers', 2000000, '2025-05-12', 2, 'Amendes et autres revenus');

-- Dépenses
INSERT INTO depense (libelle, montant_milliards, created_at, type_depense_id, commentaire) VALUES
('Depense par economique', 10000000, '2025-01-25', 1, 'Investissement infrastructure'),
('Solde et pension', 8000000, '2025-02-28', 4, 'Salaires du mois de février'),
('Postes budgetaire', 3000000, '2025-03-15', 3, 'Aide aux PME locales'),
('Dépenses fonctionnement administration publique', 2500000, '2025-04-10', 2, 'Frais de fonctionnement administratifs'),
('Rattachement administratif', 5000000, '2025-05-20', 1, 'Investissement éducation');

INSERT INTO depense_rubrique (nature,montant_2024,montant_2025) VALUES
('Intérêts de la dette', 672.0, 756.5),
('Dépenses courantes de solde (hors indemnités)', 3814.5, 3846.4),
('Dépenses courantes hors solde', 3069.0, 2304.3),
('Indemnités', 244.8, 244.8),
('Biens/Services', 573.2, 504.7),
('Transferts et subventions', 2251.0, 1554.8),
('Dépenses d’investissement', 4836.8, 8537.2),
('PIP sur financement interne', 1262.5, 2377.3),
('PIP sur financement externe', 3574.3, 6159.9),
('Autres opérations nettes du trésor', 390.2, 860.6);

INSERT INTO depense_fonctionnement (nature,montant_2024,montant_2025,ecart,observation) VALUES
('Indemnités', 244.8, 244.8, 0.0, 'Aucune variation constatée.'),
('Biens et Services', 573.2, 504.7, -68.5, 'Rationalisation importante des dépenses hors solde, notamment sur les biens et services.'),
('Transferts', 2251.0, 1554.8, -696.2, 'Réduction des transferts et subventions conformément à la politique de rationalisation.'),
('TOTAL', 3069.0, 2304.3, -764.7, 'Baisse globale de 24,9 % des dépenses de fonctionnement hors solde par rapport à 2024.');

INSERT INTO depense_ratachement (nature,montant_2024,montant_2025) VALUES
    ('Présidence de la République', 177.1, 224.7),
    ('Sénat', 22.1, 21.3),
    ('Assemblée Nationale', 87.4, 85.9),
    ('Haute Cour Constitutionnelle', 11.9, 9.3),
    ('Primature', 278.3, 339.9),
    ('Conseil du Fampihavanana Malagasy', 6.7, 6.3),
    ('Commission Électorale Nationale Indépendante', 113.3, 116.4),
    ('Ministère de la Défense Nationale', 557.0, 543.2),
    ('Ministère des Affaires Étrangères', 99.2, 104.7),
    ('Ministère de la Justice', 199.6, 219.8),
    ('Ministère de l’Intérieur', 150.2, 134.7),
    ('Ministère de l’Économie et des Finances', 2848.0, 2332.7),
    ('Ministère de la Sécurité Publique', 228.3, 229.2),
    ('Ministère de l’Industrialisation et du Commerce', 113.2, 119.6),
    ('Ministère de la Décentralisation et de l’Aménagement du Territoire', 356.8, 568.1),
    ('Ministère du Travail, de l’Emploi et de la Fonction Publique', 31.8, 33.7),
    ('Ministère du Tourisme et de l’Artisanat', 19.2, 43.9),
    ('Ministère de l’Enseignement Supérieur et de la Recherche Scientifique', 284.2, 285.6),
    ('Ministère de l’Environnement et du Développement Durable', 94.4, 188.8),
    ('Ministère de l’Éducation Nationale', 1532.8, 1562.0),
    ('Ministère des Transports et de la Météorologie', 63.9, 216.3),
    ('Ministère de la Santé Publique', 716.6, 921.0),
    ('Ministère de la Communication et de la Culture', 38.4, 32.1),
    ('Ministère des Travaux Publics', 1217.3, 2327.5),
    ('Ministère des Mines et des Ressources Stratégiques', 18.3, 18.1),
    ('Ministère de l’Énergie et des Hydrocarbures', 407.9, 1332.0),
    ('Ministère de l’Eau, de l’Assainissement et de l’Hygiène', 306.1, 600.2),
    ('Ministère de l’Agriculture et de l’Élevage', 469.8, 795.5),
    ('Ministère de la Pêche et de l’Économie Bleue', 29.9, 28.8),
    ('Ministère de l’Enseignement Technique et de la Formation Professionnelle', 103.7, 94.8),
    ('Ministère de l’Artisanat et des Métiers', 2.5, NULL),
    ('Ministère du Développement Numérique, des Postes et des Télécommunications', 8.4, 8.8),
    ('Ministère de la Population et des Solidarités', 99.1, 193.4),
    ('Ministère de la Jeunesse et des Sports', 40.5, 58.1),
    ('Secrétariat d’État en charge des Nouvelles Villes et de l’Habitat', 247.1, 138.8),
    ('Ministère délégué chargé de la Gendarmerie', 414.8, 446.4),
    ('Haut Conseil pour la Défense de la Démocratie et de l’État de Droit (HCDDED)', 2.1, 2.0),
    ('Commission Nationale Indépendante des Droits de l’Homme (CNIDH)', 2.1, 2.0),
    ('Haute Cour de Justice', 3.7, 3.5);

INSERT INTO depense_solde (libelle,montant_2024,montant_2025,ecart) VALUES
('Dépenses de solde', 3814.5, 3846.4, 31.9),
('Solde/PIB Nominal', 4.8, 4.3, -0.5),
('Indicateur', NULL, NULL, NULL),
('Solde/Recettes fiscales nettes', 40.5, NULL, -7.4),
('Solde/Dépenses totales', 29.9, 23.6, -6.3);


INSERT INTO depense_poste (ministere,montant_2025) VALUES
('Ministère des Forces Armées', 1000),
('Ministère de la Santé Publique', 300),
('Ministère de la Sécurité Publique', 1000),
('Ministère de l’Éducation Nationale', 3000),
('Ministère de l’Enseignement Technique et de la Formation Professionnelle', 250.3),
('Ministère de l’Enseignement Supérieur et de la Recherche Scientifique', 100),
('Ministère délégué en charge de la Gendarmerie Nationale', 1000);


-- Déficits (calculés pour l'année 2025)
INSERT INTO deficite (annee, total_recette, total_depense, type_id) VALUES
(2025, 27000000, 28500000, 1),
(2025, 27000000, 28500000, 2),
(2025, 27000000, 28500000, 3);

--douannes
INSERT INTO recette_douane(nature, montant_2024, montant_2025) VALUES
('Droit de douane', 847.5, 1010.7),
('TVA à l’importation', 1768.3, 2148.3),
('Taxe sur les produits pétroliers', 308.0, 326.0),
('TVA sur les produits pétroliers', 842.8, 879.0),
('Droit de navigation', 1.2, 1.9),
('Autres', 0.2, 0.1);
