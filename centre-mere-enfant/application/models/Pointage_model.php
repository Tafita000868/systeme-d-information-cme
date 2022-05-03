
<?php
	if ( ! defined('BASEPATH')) exit('No direct srcipt access allowed');
	
	/**
	 * 
	 */
	require_once APPPATH . '/models/Base_model.php';
 	class Pointage_model extends Base_model {
		
		function __construct() {
	        parent::__construct();
	    }

	    
		public function find_pointage($input) {
			return $this->find_multi_column("cme_pointage", $input);
		}

		public function inserer($input) { 
			$check = $this->check_form_pointage($input);
			if($check['status'] == 200) {
				$insert = $this->insert('cme_pointage', $input);
				if ($insert['status'] == 200) {
					$check['id_pointage'] = $insert['insert_id'];
					$check['action'] = "Insertion effectuée avec succes";
				} else {
					$check['action'] = $insert['action'];
				}
			} else {
				$check['action'] = "Il y a une erreur durant l'insertion, veuillez vérifier !";
			}
			return $check;
		}

		public function modifier($input, $id_pointage) {
			$check = $this->check_form_pointage($input);
			if($check['status'] == 200) {
				$update = $this->update('cme_pointage', $input, 'id_pointage', $id_pointage);
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


		public function check_form_pointage ($input) {
			if (empty($input['id_activite'])) {
				return array( 'status' => 402, 
					'id_activite' => "Veuillez l'activité");
			} else if (empty($input['date_pointage'])) {
				return array( 'status' => 402, 
					'date_pointage' => "Veuillez remplir le date du pointage");
			} else {
				if ($this->existe_pointage($input['id_enfant'], $input['id_activite'], $input['date_pointage'])) { 
					// si Oui alors erreurs 
					return array('status' => 402, 
					'date_pointage' => "Cet enfant est déjà pointé aujourd'hui");
				} else {
					return array('status' => 200);
				}
			}
		}


		public function existe_pointage($id_enfant, $id_activite, $date_pointage) {
			// $result = $this->find_column($table_name, $column , $value);
			$sql = "SELECT * FROM cme_pointage WHERE id_enfant=%s AND id_activite=%s AND date_pointage=%s";
			$sql  = sprintf($sql, 
				$this->db->escape($id_enfant),
				$this->db->escape($id_activite),
				$this->db->escape($date_pointage)
	        );
	        $query = $this->db->query($sql);
        	$result = $query->row_array();
        	if ($result != null) {
				return true;
			} else {
				return false;
			}
		}


	}
?>
