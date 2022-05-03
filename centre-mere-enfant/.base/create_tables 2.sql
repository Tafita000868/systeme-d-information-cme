
CREATE TABLE cme_mois (
                id_mois INT AUTO_INCREMENT NOT NULL,
                numero INT NOT NULL,
                nom VARCHAR(20) NOT NULL,
                nb_jour INT NOT NULL,
                PRIMARY KEY (id_mois)
);

CREATE TABLE cme_metier (
                id_metier INT AUTO_INCREMENT NOT NULL,
                titre VARCHAR(50) NOT NULL,
                role VARCHAR(200) NOT NULL,
                PRIMARY KEY (id_metier)
);


CREATE TABLE cme_unite (
                id_unite INT AUTO_INCREMENT NOT NULL,
                unite VARCHAR(50) NOT NULL,
                PRIMARY KEY (id_unite)
);


CREATE TABLE cme_article (
                id_article INT AUTO_INCREMENT NOT NULL,
                designation VARCHAR(50) NOT NULL,
                PRIMARY KEY (id_article)
);


CREATE TABLE cme_stock (
                id_stock INT AUTO_INCREMENT NOT NULL,
                id_article INT NOT NULL,
                description VARCHAR(100) NOT NULL,
                id_unite INT NOT NULL,
                qte_entree DOUBLE PRECISION DEFAULT 0,
                qte_sortie DOUBLE PRECISION DEFAULT 0,
                date_action DATE NOT NULL,
                observation VARCHAR(300),
                PRIMARY KEY (id_stock)
);


CREATE TABLE cme_ecole (
                id_ecole INT AUTO_INCREMENT NOT NULL,
                nom_ecole VARCHAR(50) NOT NULL,
                PRIMARY KEY (id_ecole)
);


CREATE TABLE cme_classe (
                id_classe INT AUTO_INCREMENT NOT NULL,
                nom_classe VARCHAR(20) NOT NULL,
                nom_classe_italien VARCHAR(20) NOT NULL,
                PRIMARY KEY (id_classe)
);


CREATE TABLE cme_etat (
                id_etat INT AUTO_INCREMENT NOT NULL,
                description VARCHAR(20) NOT NULL,
                PRIMARY KEY (id_etat)
);


CREATE TABLE cme_administrateur (
                id_admin INT AUTO_INCREMENT NOT NULL,
                num_matricule VARCHAR(10) UNIQUE NOT NULL,
                nom VARCHAR(100) NOT NULL,
                prenom VARCHAR(100) NOT NULL,
                sexe VARCHAR(1) NOT NULL,
                id_etat INT NOT NULL,
                id_metier INT NOT NULL,
                id_siege INT NOT NULL,
                login VARCHAR(50) NOT NULL,
                mdp VARCHAR(100) NOT NULL,
                PRIMARY KEY (id_admin)
);

CREATE TABLE cme_pointage_admin (
                id_pointage_admin INT AUTO_INCREMENT NOT NULL,
                date_entree DATETIME NOT NULL,
                date_sortie DATETIME,
                id_admin INT NOT NULL,
                PRIMARY KEY (id_pointage_admin)
);


CREATE TABLE cme_activite (
                id_activite INT AUTO_INCREMENT NOT NULL,
                type VARCHAR(30) NOT NULL,
                date_debut DATE NOT NULL,
                date_fin DATE,
                PRIMARY KEY (id_activite)
);

-- ALTER TABLE cme_enfant
  -- ADD id_etat INT NOT NULL 
    -- AFTER flDonneesPersonnellesValides;

CREATE TABLE cme_mere (
                id_mere INT AUTO_INCREMENT NOT NULL,
                num_matricule VARCHAR(10) UNIQUE NOT NULL,
                nom VARCHAR(50) NOT NULL,
                prenom VARCHAR(50) NOT NULL,
                sexe VARCHAR(1) NOT NULL,
                date_naissance DATE,
                flDonneesPersonnellesValides INT NOT NULL,
                id_etat INT NOT NULL,
                adresse VARCHAR(100) NOT NULL,
                statu_pmer VARCHAR(20) NOT NULL,
                situation_matrimoniale VARCHAR(30) NOT NULL,
                num_tel VARCHAR(15),
                num_tel_ext VARCHAR(15),
                lien_ext VARCHAR(15),
                cin_num VARCHAR(20),
                cin_date_delivrance DATE,
                cin_lieu_delivrance VARCHAR(50),
                acte_naissance VARCHAR(20),
                revenu_mere DOUBLE PRECISION DEFAULT 0,
                nom_conjoint VARCHAR(50),
                date_naissance_conjoint DATE,
                poste_conjoint VARCHAR(50),
                revenu_conjoint VARCHAR(100),
                depense_mensuel VARCHAR(20),
                nb_enfant INT DEFAULT 0,
                PRIMARY KEY (id_mere)
);


CREATE TABLE cme_enfant (
                id_enfant INT AUTO_INCREMENT NOT NULL,
                id_mere INT NOT NULL,
                num_matricule VARCHAR(10) UNIQUE NOT NULL,
                nom VARCHAR(50) NOT NULL,
                prenom VARCHAR(50) NOT NULL,
                date_naissance DATE NOT NULL,
                sexe VARCHAR(1) NOT NULL,
                flDonneesPersonnellesValides INT DEFAULT 0,
                id_etat INT NOT NULL,
                id_activite INT NOT NULL,
                enregistre INT DEFAULT 0,
                scolarise INT DEFAULT 0,
                photo VARCHAR(200) NOT NULL,
                PRIMARY KEY (id_enfant, id_mere)
);


CREATE TABLE cme_sad (
                id_sad INT AUTO_INCREMENT NOT NULL,
                id_enfant INT NOT NULL,
                id_mere INT NOT NULL,
                num_matricule VARCHAR(10) UNIQUE NOT NULL,
                id_donateur INT,
                adopt_progressive INT,
                date_debut DATE NOT NULL,
                date_fin DATE,
                date_envoye_en_Italie DATE,
                date_adhesion DATE,
                frequence_de_payement VARCHAR(50),
                date_recu_payement DATE,
                observation VARCHAR(100),
                PRIMARY KEY (id_sad, id_enfant, id_mere)
);
-- ALTER TABLE cme_sad
--   ADD num_liste INT NOT NULL 
--     AFTER date_recu_payement;


CREATE TABLE cme_pointage (
                id_pointage INT AUTO_INCREMENT NOT NULL,
                id_enfant INT NOT NULL,
                id_mere INT NOT NULL,
                id_activite INT NOT NULL,
                date_pointage DATE NOT NULL,
                PRIMARY KEY (id_pointage)
);


CREATE TABLE cme_scolarisation (
                id_scolarisation INT AUTO_INCREMENT NOT NULL,
                id_enfant INT NOT NULL,
                id_mere INT NOT NULL,
                id_ecole INT NOT NULL,
                id_classe INT NOT NULL,
                annee_scolaire VARCHAR(10) NOT NULL,
                moyenne DECIMAL DEFAULT 0,
                evaluation VARCHAR(50),
                annee_ratee VARCHAR(10),
                PRIMARY KEY (id_scolarisation)
);


CREATE TABLE cme_historique_enfant (
                id_histo INT AUTO_INCREMENT NOT NULL,
                id_enfant INT NOT NULL,
                id_mere INT NOT NULL,
                nb_statu_miseAjour INT DEFAULT 0,
                observation VARCHAR(100),
                date_debut DATE NOT NULL,
                date_fin DATE,
                PRIMARY KEY (id_histo)
);

-- ALTER TABLE cme_historique_enfant
-- DROP FOREIGN KEY cme_etat_cme_historique_enfant_fk;


ALTER TABLE cme_administrateur ADD CONSTRAINT cme_titre_cme_administrateur_fk
FOREIGN KEY (id_metier)
REFERENCES cme_metier (id_metier)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE cme_stock ADD CONSTRAINT unite_cme_stock_fk
FOREIGN KEY (id_unite)
REFERENCES cme_unite (id_unite)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE cme_stock ADD CONSTRAINT cme_article_cme_stock_fk
FOREIGN KEY (id_article)
REFERENCES cme_article (id_article)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE cme_scolarisation ADD CONSTRAINT cme_ecole_cme_scolarisation_fk
FOREIGN KEY (id_ecole)
REFERENCES cme_ecole (id_ecole)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE cme_scolarisation ADD CONSTRAINT cme_classe_cme_scolarisation_fk
FOREIGN KEY (id_classe)
REFERENCES cme_classe (id_classe)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE cme_administrateur ADD CONSTRAINT cme_etat_cme_administrateur_fk
FOREIGN KEY (id_etat)
REFERENCES cme_etat (id_etat)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE cme_mere ADD CONSTRAINT cme_etat_cme_mere_fk
FOREIGN KEY (id_etat)
REFERENCES cme_etat (id_etat)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE cme_pointage_admin ADD CONSTRAINT cme_administrateur_cme_pointage_admin_fk
FOREIGN KEY (id_admin)
REFERENCES cme_administrateur (id_admin)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE cme_enfant ADD CONSTRAINT cme_activite_cme_enfant_fk
FOREIGN KEY (id_activite)
REFERENCES cme_activite (id_activite)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE cme_pointage ADD CONSTRAINT cme_activite_cme_pointage_fk
FOREIGN KEY (id_activite)
REFERENCES cme_activite (id_activite)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE cme_enfant ADD CONSTRAINT cme_mere_cme_utilisateur_fk
FOREIGN KEY (id_mere)
REFERENCES cme_mere (id_mere)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE cme_historique_enfant ADD CONSTRAINT cme_enfant_cme_historique_enfant_fk
FOREIGN KEY (id_enfant, id_mere)
REFERENCES cme_enfant (id_enfant, id_mere)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE cme_scolarisation ADD CONSTRAINT cme_enfant_cme_scolarisation_fk
FOREIGN KEY (id_enfant, id_mere)
REFERENCES cme_enfant (id_enfant, id_mere)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE cme_pointage ADD CONSTRAINT cme_enfant_cme_pointage_fk
FOREIGN KEY (id_enfant, id_mere)
REFERENCES cme_enfant (id_enfant, id_mere)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE cme_sad ADD CONSTRAINT cme_enfant_cme_sad_fk
FOREIGN KEY (id_enfant, id_mere)
REFERENCES cme_enfant (id_enfant, id_mere)
ON DELETE NO ACTION
ON UPDATE NO ACTION;