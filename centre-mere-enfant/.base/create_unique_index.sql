
-- CREATE UNIQUE INDEX num_matricule_etu
-- ON etudiant(num_matricule_etu);

-- -- drop index inscription_etudiant cascade;
-- CREATE UNIQUE INDEX inscription_etudiant
-- ON inscription(id_annee_scol, id_etu);


-- CREATE UNIQUE INDEX insc_reinsc_annuelle
-- ON histo_insc_reinsc_annuelle(id_annee_scol);

-- CREATE UNIQUE INDEX frais_scolarite_etu
-- ON frais_scolarite(id_annee_scol, id_mois, id_inscri, designation_frais);


-- ALTER TABLE enseignant ADD CONSTRAINT ae_num_ens UNIQUE(ae_num_ens);
-- ALTER TABLE enseignant ADD CONSTRAINT aex_num_ens UNIQUE(aex_num_ens);


CREATE UNIQUE INDEX sad
ON cme_sad(id_enfant, id_mere);