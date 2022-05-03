
<?php
	if ( ! defined('BASEPATH')) exit('No direct srcipt access allowed');
	
	/**
	 * 
	 */
	require_once APPPATH . '/models/Base_model.php';
 	class Etat_model extends Base_model {
		
		function __construct() {
	        parent::__construct();
	    }

	    public function liste_etats() {
			return $this->list("cme_etat");
		}
 

		public function get_etat($id_etat) {
			return $this->find_column("cme_etat", 'id_etat' , $id_etat);
		}

		public function find_etat($input) {
			return $this->find_multi_column("cme_etat", $input);
		}

		public function inserer($input) { 
			$check = $this->check_form_etat($input);
			if($check['status'] == 200) {
				$insert = $this->insert('cme_etat', $input);
				if ($insert['status'] == 200) {
					$check['id_etat'] = $insert['insert_id'];
					$check['action'] = "Insertion effectuée avec succes";
				} else {
					$check['action'] = $insert['action'];
				}
			} else {
				$check['action'] = "Il y a une erreur durant l'insertion, veuillez vérifier !";
			}
			return $check;
		}

		public function modifier($input, $id_etat) {
			$check = $this->check_form_etat($input);
			if($check['status'] == 200) {
				$update = $this->update('cme_etat', $input, 'id_etat', $id_etat);
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

		public function supprimer($id_etat) {
			return $this->delete('cme_etat', 'id_etat', $id_etat);
		}

		public function check_form_etat ($input) {
			if (empty($input['type'])) {
				return array( 'status' => 402, 
					'type' => "Veuillez remplir le nom de l'etat");
			} else if (empty($input['date_debut'])) {
				return array('status' => 402, 
					'date_debut' => "Veuillez remplir la date de debut de cette etat");
			} else {
				return array('status' => 200);
			}
		}
	}
?>
