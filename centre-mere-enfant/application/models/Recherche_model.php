<?php
	if ( ! defined('BASEPATH')) exit('No direct srcipt access allowed');
	
	/**
	 * 
	 */
	require_once APPPATH . '/models/Base_model.php';
 	class Recherche_model extends Base_model {
		
		private $count_result = 0;
		function __construct() {
	        parent::__construct();
	        $this->load->model('Mere_model');
	    }
        
		public function chercher($filtres, $option) {
			unset($filtres['option']);
			// echo  "<pre>";print_r($filtres);echo "</pre>";
			if ($option == 'Enfant') {
				$sql = " SELECT * FROM v_cme_enfant WHERE num_matricule_enf=%s";
				$sql = sprintf($sql,
					$this->db->escape($filtres['num_matricule'])
				);
				// echo  "<pre>";print_r($sql);echo "</pre>";
				$query = $this->db->query($sql);
				return $query->result_array();
			} else if ($option == 'Mere') {
				return $this->find_multi_column('cme_mere', $filtres);
			} else {
				$sql = " SELECT * FROM v_cme_sad WHERE num_matricule_sad=%s";
				$sql = sprintf($sql,
					$this->db->escape($filtres['num_matricule'])
				);
				// echo  "<pre>";print_r($sql);echo "</pre>";
				$query = $this->db->query($sql);
				return $query->result_array();
			}
	    }


	}
?>
