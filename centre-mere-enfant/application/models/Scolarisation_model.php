


<?php
	if ( ! defined('BASEPATH')) exit('No direct srcipt access allowed');
	
	/**
	 * 
	 */
	require_once APPPATH . '/models/Base_model.php';
 	class Scolarisation_model extends Base_model {
		
		function __construct() {
	        parent::__construct();
	    }

	    public function liste_scolarisations() {
			return $this->list("cme_scolarisation");
		}
 	
 		public function liste_ecoles() {
			return $this->list("cme_ecole");
		}

		public function liste_classes() {
			return $this->list("cme_classe");
		}

		public function get_scolarisation($id_scolarisation) {
			return $this->find_column("cme_scolarisation", 'id_scolarisation' , $id_scolarisation);
		}

		public function find_scolarisation($input) {
			return $this->find_multi_column("v_cme_scolarisation", $input);
		}

		public function inserer($input) { 
			$check = $this->check_form_scolarisation($input);
			if($check['status'] == 200) {
				$insert = $this->insert('cme_scolarisation', $input);
				if ($insert['status'] == 200) {
					$check['id_scolarisation'] = $insert['insert_id'];
					$check['action'] = "Insertion effectuée avec succes";
				} else {
					$check['action'] = $insert['action'];
				}
			} else {
				$check['action'] = "Il y a une erreur durant l'insertion, veuillez vérifier !";
			}
			return $check;
		}

		public function inserer_ecole($input) { 
			$check = $this->check_form_ecole($input);
			if($check['status'] == 200) {
				$insert = $this->insert('cme_ecole', $input);
				if ($insert['status'] == 200) {
					$check['id_ecole'] = $insert['insert_id'];
					$check['action'] = "Insertion effectuée avec succes";
				} else {
					$check['action'] = $insert['action'];
				}
			} else {
				$check['action'] = "Il y a une erreur durant l'insertion, veuillez vérifier !";
			}
			return $check;
		}

		public function modifier($input, $id_scolarisation) {
			$check = $this->check_form_scolarisation($input);
			if($check['status'] == 200) {
				$update = $this->update('cme_scolarisation', $input, 'id_scolarisation', $id_scolarisation);
				if ($update['status'] == 200) {
					$check['action'] = "Modification effectuée avec succes";
				} else {
					$check['action'] = $update['action'];
				}
				$check['action'] = "Modification effectuée avec succes";
			} else {
				$check['action'] = "Il y a une erreur durant la modification, veuillez vérifier !";
			}
			return $check;
		}

		public function supprimer($id_scolarisation) {
			return $this->delete('cme_scolarisation', 'id_scolarisation', $id_scolarisation);
		}

		public function check_form_scolarisation ($input) {
			if (empty($input['id_ecole'])) {
				return array('status' => 402, 
					'id_ecole' => "Veuillez sélectionner le nom de l'école");
			} else if (empty($input['id_classe'])) {
				return array( 'status' => 402, 
					'id_classe' => "Veuillez sélectionner le nom de la classe");
			} else if (empty($input['annee_scolaire'])) {
				return array('status' => 402, 
					'annee_scolaire' => "Veuillez remplir la date de debut de cette scolarisation");
			} else {
				return array('status' => 200);
			}
		}

		public function check_form_ecole ($input) {
			if (empty($input['nom_ecole'])) {
				return array( 'status' => 402, 
					'nom_ecole' => "Veuillez remplir le nom de l'école");
			} else {
				return array('status' => 200);
			}
		}

	}
?>
