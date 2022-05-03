<?php
	if ( ! defined('BASEPATH')) exit('No direct srcipt access allowed');
	
	/*
	 * 
	 */
	require_once APPPATH . '/models/Base_model.php';
 	class Historique_model extends Base_model {
		
		function __construct() {
	        parent::__construct();
	    }

		public function liste_histos() {
			return $this->list("v_cme_histo");
		}

		public function get_histo($id_histo) {
			return $this->find_column("v_cme_histo", 'id_histo' , $id_histo);
		}

		public function find_histo($input) {
			return $this->find_multi_column("v_cme_histo", $input);
		}

		public function get_histo_enfant($id_enfant) {
			$sql = "SELECT * FROM cme_historique_enfant
			 WHERE id_enfant=%s ORDER BY date_debut ASC ";
			$sql  = sprintf($sql, 
				$this->db->escape($id_enfant)
	        );
	        $query = $this->db->query($sql);
        	return $query->row_array();
		}

		public function get_histo_if_exist ($historique) {
	    	// Si l'eleve a deja une historisé, alors, on va juste modifier son historique
	    	// Si non, on va inserer un note pour l'eleve
	    	$check = array(
    			'id_enfant' => $historique['id_enfant'],
				'id_mere'    => $historique['id_mere']
    		);
	    	return $this->find_multi_column_return_row('cme_historique_enfant', $check);
	    } 

		public function inserer($input) { 
			$check = $this->check_form_histo($input);
			// echo "<pre>";print_r($check);echo "</pre>";
			if($check['status'] == 200) {
				$insert = $this->insert('cme_historique_enfant', $input);
				if ($insert['status'] == 200) {
					$check['id_histo'] = $insert['insert_id'];
					$check['action'] = "Insertion effectuée avec succes";
				} else {
					$check['action'] = $insert['action'];
				}
			} else {
				$check['action'] = "Il y a une erreur durant l'insertion, veuillez vérifier !";
			}
			return $check;
		}

		public function modifier($input, $id_histo) {
			$check = $this->check_form_histo($input);
			if($check['status'] == 200) {
				$update = $this->update('cme_historique_enfant', $input, 'id_histo', $id_histo);
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

		public function supprimer($id_histo) {
			return $this->delete('cme_historique_enfant', 'id_histo', $id_histo);
		}

		public function check_form_histo($input) {
			if (empty($input['id_enfant'])) {
				return array( 'status' => 402, 
					'id_enfant' => "De quel enfant");
			} else if (empty($input['id_mere'])) {
				return array('status' => 402, 
					'id_mere' => "Quelle mère");
			} else if (empty($input['date_debut'])) {
				return array('status' => 402, 
					'date_debut' => "Veuillez remplir la date de debut de cette historique");
			} else {
				return array('status' => 200);
			}
		}


	}
?>
