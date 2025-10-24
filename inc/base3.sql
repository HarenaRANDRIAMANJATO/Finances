
CREATE DATABASE finance;
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
CREATE TABLE periode (
    id INT AUTO_INCREMENT PRIMARY KEY,
    annee INT NOT NULL UNIQUE,
    description VARCHAR(255)
);

INSERT INTO periode (annee, description) VALUES
(2024, 'Année fiscale 2024'),
(2025, 'Année fiscale 2025'),
(2026, 'Année fiscale 2026');
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

INSERT INTO recette (periode_id, libelle, montant_milliards, created_at, type_recette_id, source_detail) VALUES
(1, 'Impôt sur le revenu', 15000000, '2025-01-15', 1, 'Recette fiscale principale'),
(1, 'Taxe sur la valeur ajoutée', 12000000, '2025-02-20', 1, 'TVA collectée'),
(1, 'Dons internationaux', 5000000, '2025-03-10', 4, 'Aide humanitaire'),
(1, 'Droits de douane importations', 3000000, '2025-04-05', 3, 'Taxes sur importations'),
(1, 'Revenus non fiscaux divers', 2000000, '2025-05-12', 2, 'Amendes et autres revenus');

-- Dépenses
INSERT INTO depense (libelle, montant_milliards, created_at, type_depense_id, commentaire) VALUES
('Construction route nationale', 10000000, '2025-01-25', 1, 'Investissement infrastructure'),
('Paiement salaires fonctionnaires', 8000000, '2025-02-28', 4, 'Salaires du mois de février'),
('Subvention aux entreprises', 3000000, '2025-03-15', 3, 'Aide aux PME locales'),
('Dépenses fonctionnement ministères', 2500000, '2025-04-10', 2, 'Frais de fonctionnement administratifs'),
('Construction école primaire', 5000000, '2025-05-20', 1, 'Investissement éducation');

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
