

-- drop view v_cme_admin;
create view v_cme_admin as 
	select cme_administrateur.*, cme_etat.description, cme_metier.titre, cme_metier.role 
	from cme_administrateur 
	join cme_etat on cme_administrateur.id_etat = cme_etat.id_etat
	join cme_metier on cme_administrateur.id_metier = cme_metier.id_metier
	order by cme_administrateur.num_matricule asc;

-- drop view v_cme_histo;
-- create view v_cme_histo as 
-- 	select cme_historique_enfant.id_histo,
-- 	 cme_historique_enfant.id_enfant,
-- 	 cme_historique_enfant.id_mere,
-- 	 cme_etat.id_etat,
-- 	 cme_etat.description as etat
-- 	from cme_historique_enfant join cme_etat on cme_etat.id_etat=cme_historique_enfant.id_etat
-- 	ORDER BY date_debut ASC ;

-- drop view v_cme_enfant;
create view v_cme_enfant as 
	select 
		enf.id_enfant, enf.num_matricule as num_matricule_enf, enf.nom as nom_enf, enf.prenom as prenom_enf, enf.sexe,
		mere.id_mere, mere.num_matricule as num_matricule_mer, mere.nom as nom_mere, mere.prenom as prenom_mere,
		act.id_activite, act.type as activite,
		etat.id_etat, etat.description as etat,
		sad.id_sad, sad.num_matricule as num_matricule_sad
	from cme_enfant enf 
	join cme_mere mere on mere.id_mere=enf.id_mere
	join cme_activite act on act.id_activite=enf.id_activite
	join cme_etat etat on etat.id_etat=enf.id_etat
	left join cme_historique_enfant histo on histo.id_enfant=enf.id_enfant and histo.id_mere=enf.id_mere
	left join cme_sad sad on sad.id_enfant=enf.id_enfant;

-- drop view v_cme_sad;
create view v_cme_sad as 
	select 
		enf.id_enfant, enf.num_matricule as num_matricule_enf, enf.nom, enf.prenom, enf.sexe, enf.date_naissance, enf.id_etat,
		sad.id_sad, sad.num_matricule as num_matricule_sad, sad.date_envoye_en_Italie, sad.date_adhesion, 
		sad.frequence_de_payement, sad.num_liste, sad.observation, sad.adopt_progressive
	from cme_sad sad
	join cme_enfant enf on enf.id_enfant=sad.id_enfant and enf.id_mere=sad.id_mere;

-- drop view v_cme_scolarisation;
create view v_cme_scolarisation as 
	select 
		scol.id_enfant, scol.id_mere,
		scol.id_scolarisation, scol.annee_scolaire, scol.moyenne,scol.evaluation,scol.annee_ratee, 
		ecole.nom_ecole, classe.nom_classe
	from cme_scolarisation scol
	join cme_ecole ecole on ecole.id_ecole=scol.id_ecole
	join cme_classe classe on classe.id_classe=scol.id_classe;

-- drop view v_cme_administrateur;
create view v_cme_administrateur as 
	select 
		admin.*, 
		etat.description as etat,
		metier.titre, metier.role
	from cme_administrateur admin
	join cme_etat etat on etat.id_etat=admin.id_etat
	join cme_metier metier on metier.id_metier=admin.id_metier;


-- drop view v_cme_stat_nb_enfant;
create view v_cme_stat_nb_enfant as 
	select
		( select count('id_enfant') as admis from v_cme_enfant where id_etat='1') as admis,
		( select count('id_enfant') as attente from v_cme_enfant where id_etat='2') as attente,
		( select count('id_enfant') as abandonne from v_cme_enfant where id_etat='3') as abandonne,
		( select count('id_enfant') as sad_actif from v_cme_enfant where id_etat='1' and id_sad > 0) as sad_actif,
		( select count('id_enfant') as sad_non_actif from v_cme_enfant where id_etat > '1' and id_sad > 0) as sad_non_actif,
		( select count('id_enfant') as total from cme_enfant) as total
	;

-- drop view v_cme_stock;
create view v_cme_stock as 
	select 
		stock.id_stock, stock.description, stock.qte_entree, stock.qte_sortie, stock.date_action, stock.observation,
		article.designation as article, unite.unite
	from cme_stock stock
	join cme_article article on article.id_article=stock.id_article
	join cme_unite unite on unite.id_unite=stock.id_unite
	order by article.designation, stock.description, stock.date_action asc

-- drop view v_cme_stock_restant;
create view v_cme_stock_restant as 
	select 
		stock.description, stock.article, stock.unite, 
		coalesce(sum(stock.qte_entree) ,0) as total_entree,
		coalesce(sum(stock.qte_sortie) ,0) as total_sortie,
		round(coalesce(sum(stock.qte_entree) - sum(stock.qte_sortie) ,0), 2) as qte_restant
	from v_cme_stock stock
	group by stock.description, stock.article, stock.unite;



















-- ALTER TABLE stock_central 
-- ALTER COLUMN qte_sortie TYPE REAL;
-- ALTER TABLE stock_central ALTER COLUMN qte_sortie SET DEFAULT 0;
-- ALTER TABLE stock_central 
-- ALTER COLUMN qte_entree TYPE REAL;
-- ALTER TABLE stock_central ALTER COLUMN qte_entree SET DEFAULT 0;

-- ALTER TABLE produit_central 
-- ALTER COLUMN prix_vente TYPE REAL;
-- ALTER TABLE produit_central ALTER COLUMN prix_vente SET DEFAULT 0;
-- ALTER TABLE produit_central 
-- ALTER COLUMN prix_revient TYPE REAL;
-- ALTER TABLE produit_central ALTER COLUMN prix_revient SET DEFAULT 0;

-- create view v_stock_produit_date_central as
-- 	select 
-- 		produit_central.id_produit, produit_central.nom, produit_central.prix_revient, 
-- 		produit_central.prix_vente, produit_central.pource_evaporation_jour,
-- 		Station.id_station, Station.nom_station,
-- 		stock_central.date_stock,
-- 		coalesce(sum(stock_central.qte_entree) ,0) as qte_entree,
-- 		coalesce(sum(stock_central.qte_sortie) ,0) as qte_sortie,
-- 		coalesce(sum(stock_central.vente) ,0) as vente,
-- 		coalesce(sum(stock_central.qte_entree) - sum(stock_central.qte_sortie) ,0) as qte_restant
-- 	from stock_central
-- 		join produit_central on produit_central.id_produit=stock_central.id_produit
-- 		join Station on Station.id_station=stock_central.id_station
-- 		group by produit_central.id_produit, produit_central.nom, produit_central.prix_revient, 
-- 		produit_central.prix_vente, produit_central.pource_evaporation_jour,
-- 		Station.id_station, Station.nom_station,
-- 		stock_central.date_stock;

-- create view v_stock_produit_central as
-- 	select 
-- 		id_produit, nom, prix_revient, 
-- 		prix_vente, pource_evaporation_jour,
-- 		id_station, nom_station,
-- 		sum(qte_entree) as qte_entree, 
-- 		sum(qte_sortie) as qte_sortie,
-- 		sum(qte_entree) - sum(qte_sortie) as qte_restant,
-- 		sum(vente) as vente
-- 	from v_stock_produit_date_central
-- 		group by id_produit, nom, prix_revient, 
-- 		prix_vente, pource_evaporation_jour,
-- 		id_station, nom_station;




-- create view v_benefice_produit as
-- 	select 
-- 		id_produit, nom, prix_revient, 
-- 		prix_vente, pource_evaporation_jour,
-- 		sum(qte_entree) as qte_entree, 
-- 		sum(qte_sortie) as qte_sortie,
-- 		sum(vente) as vente_produit,
-- 		sum(qte_sortie*prix_revient) as revient_produit,
-- 		sum(vente - qte_sortie*prix_revient) as benefice_produit
-- 	from v_stock_produit_date_central
-- 		group by id_produit, nom, prix_revient, 
-- 		prix_vente, pource_evaporation_jour;

-- create view v_benefice_total as
-- 	select sum(benefice_produit) as benefice_total
-- 	from v_benefice_produit;









