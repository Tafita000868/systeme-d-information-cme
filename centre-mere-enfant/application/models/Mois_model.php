<?php
	if ( ! defined('BASEPATH')) exit('No direct srcipt access allowed');
	
	/**
	 * 
	 */
	require_once APPPATH . '/models/Base_model.php';
 	class Mois_model extends Base_model {
		
		function __construct() {
	        parent::__construct();
	    }

		public function liste_mois() {
			return $this->list("mois");
		}

		public function get_date_actu() {
			return date("Y-m-d H:i:s");
		}

		public function get_mois_actu() {
			$mois_actu = date("m");
			$id_mois = (int)$mois_actu;
			$mois_actu = $this->get_mois($id_mois);
			return $mois_actu;
		}

		public function get_mois($id_mois) {
			return $this->find_column("mois", 'id_mois' , $id_mois);
		}

	}
?>
