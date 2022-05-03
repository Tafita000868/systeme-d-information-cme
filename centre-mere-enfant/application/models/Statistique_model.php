
<?php
	if ( ! defined('BASEPATH')) exit('No direct srcipt access allowed');
	
	/**
	 * 
	 */
	require_once APPPATH . '/models/Base_model.php';
 	class Statistique_model extends Base_model {
		
		function __construct() {
	        parent::__construct();
	    }

	    public function get_stat_nb_enfants() {
			return $this->list("v_cme_stat_nb_enfant");
		}
		
		public function get_tous_les_mois() {
			return $this->list("cme_mois");
		}

 		// Pourcentage mensuel de fréquentation des enfants (CANTINE, GARGOTE, etc)
		// Pourcentage mensuel de fréquentation cabinet médical (VISITE MEDICALE)
		// Pourcentage mensuel de fréquentation à l’éducation (Responsable éducation)

		public function get_liste_activites() {
 			$sql = "SELECT id_activite, type FROM cme_activite";
	        $query = $this->db->query($sql);
        	return $query->result_array();
 		}
 		
 		public function get_mois($mois) {
 			$sql = "SELECT * FROM cme_mois WHERE numero=%s";
 			$mois = explode("-", $mois);
 			// $mois = split($mois, '-');
 			$numero_mois = $mois[1];
 			$sql  = sprintf($sql, 
				$this->db->escape($numero_mois)
	        );
	        $query = $this->db->query($sql);
        	return $query->row_array();
 		}

 		public function get_detail_pointage($id_enfant, $mois) {
 			$sql = "SELECT CAST(date_format(date_pointage, %s) AS INT) as date_pointage, id_activite FROM cme_pointage WHERE id_enfant=%s
 								AND date_format(date_pointage, %s) = %s";
 			$sql  = sprintf($sql, 
				$this->db->escape('%d'),
				$this->db->escape($id_enfant),
				$this->db->escape('%Y-%m'),
				$this->db->escape($mois)
	        );
	        // echo $sql;
	        $query = $this->db->query($sql);
        	return $query->result_array();
 		}


		public function get_nb_point_mois_par_activite($id_enfant, $id_activite, $mois) {
 			$sql = "SELECT count(id_pointage) as nb_pointage FROM cme_pointage WHERE id_enfant=%s AND id_activite=%s 
 								AND date_format(date_pointage, %s) = %s";
			$sql  = sprintf($sql, 
				$this->db->escape($id_enfant),
				$this->db->escape($id_activite),
				$this->db->escape('%Y-%m'),
				$this->db->escape($mois)
	        );
	        // echo $sql;
	        $query = $this->db->query($sql);
        	return $query->row_array();
 		}

 		public function get_point_mois($id_enfant, $id_activite, $mois) {
 			$sql = "SELECT * FROM cme_pointage WHERE id_enfant=%s AND id_activite=%s 
 								AND date_format(date_pointage, %s) = %s";
			$sql  = sprintf($sql, 
				$this->db->escape($id_enfant),
				$this->db->escape($id_activite),
				$this->db->escape('%Y-%m'),
				$this->db->escape($mois)
	        );
	        // echo $sql;
	        $query = $this->db->query($sql);
        	return $query->row_array();
 		}

 		public function get_pourcentage_frequentation($nb_pointage, $nb_jour_Dactivite_ParMois) {
 			// le moyenne de jour ouvre pendant un mois, on prend 20 jours
 			return round($nb_pointage * 100 / $nb_jour_Dactivite_ParMois,2);
 		}

 		public function get_frequentation_mensuelle($input) {
 			// echo  "<pre>";print_r($input);echo "</pre>";
 			$this->load->model('Activite_model');
 			$check = $this->check_form_mois($input);
 			$statistiques = array();
			if($check['status'] == 200) {
				$activites = $this->get_liste_activites();
				foreach ($activites as $activite) {
					$nb_pointage = $this->get_nb_point_mois_par_activite($input['id_enfant'], $activite['id_activite'], $input['mois']);
					$nb_jour_Dactivite_ParMois = 20;
					if ($activite['type'] == 'Visite médicale' || $activite['type'] == 'Clube ado') {
						$nb_jour_Dactivite_ParMois = 4;
					}
					$pourcentage = $this->get_pourcentage_frequentation($nb_pointage['nb_pointage'], $nb_jour_Dactivite_ParMois);
					$statistique = array('activite'=>$activite, 'nb_pointage'=>$nb_pointage, 'pourcentage'=>$pourcentage);
					array_push($statistiques, $statistique);
				}
				$check['statistiques'] = $statistiques;
				// echo  "<pre>";print_r($statistiques);echo "</pre>";
			} else {
				$check['action'] = "Il y a une erreur durant la validation du mois de fréquentation !";
			}
			return $check;
 		}

 		public function check_form_mois ($input) {
			if (empty($input['mois'])) {
				return array( 'status' => 402, 
					'mois' => "Veuillez remplir le mois");
			} else {
				return array('status' => 200);
			}
		}



		public function get_stat_par_activites() {
 			// echo  "<pre>";print_r($input);echo "</pre>";
 			$this->load->model('Activite_model');
 			$statistiques_par_activites = array();
			$activites = $this->get_liste_activites();
			$donnee_brute = $this->db->get("v_cme_stat_nb_enfant")->row_array();

			foreach ($activites as $activite) {
				$nombre_enfant_admis_par_activite = $this->get_nb_par_activite($activite['id_activite']);
				$detail = $this->get_detail_stat($nombre_enfant_admis_par_activite['nombre'], $donnee_brute['admis']);
				$statistique = array('activite'=>$activite, 'nb_enfant'=>$nombre_enfant_admis_par_activite, 'detail'=>$detail);
				array_push($statistiques_par_activites, $statistique);
			}
			// echo  "<pre>";print_r($statistiques_par_activites);echo "</pre>";
			return $statistiques_par_activites;
 		}

 		public function get_nb_par_activite($id_activite, $id_etat=1) {
 			$sql = "SELECT count('id_enfant') as nombre from v_cme_enfant where id_activite=%s and id_etat=%s";
			$sql = sprintf($sql, 
				$this->db->escape($id_activite),
				$this->db->escape($id_etat)
	        );
	        $query = $this->db->query($sql);
        	return $query->row_array();
 		}

 		public function get_detail_stat($nombre_reel, $total) {
 			if ($total>0) {
 				$pourcentage_au_dessus = round($nombre_reel * 100 / $total, 2);
	 			$pourcentage_au_dessous = 100 - $pourcentage_au_dessus;
	 			$value = array();
	 			$value['nb'] = $nombre_reel;
	 			$value['dessus'] = $pourcentage_au_dessus;
	 			$value['dessous'] = $pourcentage_au_dessous;
	 			return $value;
 			} else {
 				$value = array();
	 			$value['nb'] = 0;
	 			$value['dessus'] = 0;
	 			$value['dessous'] = 0;
	 			return $value;
 			}
 			
 		}

		public function get_stat_pourcentage() {
			$donnee_brute = $this->db->get("v_cme_stat_nb_enfant")->row_array();

			// echo  "<pre>";print_r($donnee_brute);echo "</pre>";

			$admis = $this->get_detail_stat($donnee_brute['admis'], $donnee_brute['total']);
			$attente = $this->get_detail_stat($donnee_brute['attente'], $donnee_brute['total']);
			$abandonne = $this->get_detail_stat($donnee_brute['abandonne'], $donnee_brute['total']);
			$total = $this->get_detail_stat($donnee_brute['total'], $donnee_brute['total']);
			
			$sad_actif = $this->get_detail_stat($donnee_brute['sad_actif'], $donnee_brute['total']);
			$sad_non_actif = $this->get_detail_stat($donnee_brute['sad_non_actif'], $donnee_brute['total']);
			
			$values = array(
				'admis'=>$admis, 
				'attente'=>$attente,
				'abandonne'=>$abandonne,
				'total'=>$total,
				'sad_actif'=>$sad_actif,
				'sad_non_actif'=>$sad_non_actif
			);

			// echo  "<pre>";print_r($values['admis']);echo "</pre>";

			return $values;
		}

		

	}
?>
