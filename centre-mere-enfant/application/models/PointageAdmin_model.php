<?php
	if ( ! defined('BASEPATH')) exit('No direct srcipt access allowed');
	
	/*
	 * 
	 */
	require_once APPPATH . '/models/Base_model.php';
 	class PointageAdmin_model extends Base_model {
		
		function __construct() {
	        parent::__construct();
	    }

		public function liste_pointages() {
			return $this->list("cme_pointage_admin");
		}

		public function get_pointage($id_pointage_admin) {
			return $this->find_column("cme_pointage_admin", 'id_pointage_admin' , $id_pointage_admin);
		}

		public function get_pointage_entree($id_admin) {
			$sql = 'SELECT * FROM cme_pointage_admin WHERE id_admin=%s ORDER BY id_pointage_admin DESC LIMIT 1';
			$sql  = sprintf($sql, 
				$this->db->escape($id_admin)
	        );
	        $query = $this->db->query($sql);
        	$result = $query->row_array();
        	return $result;
		}

		public function deja_quitte($id_admin) {
			$sql = 'SELECT * FROM cme_pointage_admin WHERE id_admin=%s ORDER BY id_pointage_admin DESC LIMIT 1';
			$sql  = sprintf($sql, 
				$this->db->escape($id_admin)
	        );
	        $query = $this->db->query($sql);
        	$result = $query->row_array();
        	if ($result == null) {
        		return true;
        	} else if ($result['date_sortie'] == null) {
				return false;
			} else {
				return true;
			}
		}

		public function inserer_pointage($input) { 
			$date_actu = date('Y-m-d H:i:s');
			$pointage = array('id_admin' => $input['id_admin']);
			$retour;
			$deja_quitte = $this->deja_quitte($input['id_admin']);
			if ($input['action'] == "entree") {
				if($deja_quitte) {
					$pointage['date_entree'] = $date_actu;
					$retour = $this->inserer($pointage);
				} else {
					$retour['status'] = 401 ;
					$retour['act'] = 'On ne peut pas entrer sans avoir sortir' ;
				}
			} else {
				if(!$deja_quitte) {
					$pointage['date_sortie'] = $date_actu;
					$pointage_entree = $this->get_pointage_entree($input['id_admin']);
					$retour = $this->modifier($pointage, $pointage_entree['id_pointage_admin']);
				} else {
					$retour['status'] = 401 ;
					$retour['act'] = 'On ne peut pas sortir sans avoir entrer' ;
				}
			}
			return $retour;
		}

		public function inserer($input) { 
			$insert = $this->insert('cme_pointage_admin', $input);
			if ($insert['status'] == 200) {
				$insert['id_pointage_admin'] = $insert['insert_id'];
				$insert['act'] = "Pointage effectué avec succes";
			} 
			return $insert;
		}

		public function modifier($input, $id_pointage_admin) {
			$update = $this->update('cme_pointage_admin', $input, 'id_pointage_admin', $id_pointage_admin);
			if ($update['status'] == 200) {
				$update['act'] = "Pointage effectué avec succes";
			} 
			return $update;
		}

	}
?>
