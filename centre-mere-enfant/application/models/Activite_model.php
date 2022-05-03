
<?php
	if ( ! defined('BASEPATH')) exit('No direct srcipt access allowed');
	
	/**
	 * 
	 */
	require_once APPPATH . '/models/Base_model.php';
 	class Activite_model extends Base_model {
		
		function __construct() {
	        parent::__construct();
	    }

	    public function liste_activites() {
			return $this->list("cme_activite");
		}

		public function get_activite($id_activite) {
			return $this->find_column("cme_activite", 'id_activite' , $id_activite);
		}

		public function find_activite($input) {
			return $this->find_multi_column("cme_activite", $input);
		}

		public function inserer($input) { 
			$check = $this->check_form_activite($input);
			if($check['status'] == 200) {
				$insert = $this->insert('cme_activite', $input);
				if ($insert['status'] == 200) {
					$check['id_activite'] = $insert['insert_id'];
					$check['action'] = "Insertion effectuée avec succes";
				} else {
					$check['action'] = $insert['action'];
				}
			} else {
				$check['action'] = "Il y a une erreur durant l'insertion, veuillez vérifier !";
			}
			return $check;
		}

		public function modifier($input, $id_activite) {
			$check = $this->check_form_activite($input);
			if($check['status'] == 200) {
				$update = $this->update('cme_activite', $input, 'id_activite', $id_activite);
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

		public function supprimer($id_activite) {
			return $this->delete('cme_activite', 'id_activite', $id_activite);
		}

		public function check_form_activite ($input) {
			if (empty($input['type'])) {
				return array( 'status' => 402, 
					'type' => "Veuillez remplir le nom de l'activite");
			} else if (empty($input['date_debut'])) {
				return array('status' => 402, 
					'date_debut' => "Veuillez remplir la date de debut de cette activite");
			} else {
				return array('status' => 200);
			}
		}
	}
?>
