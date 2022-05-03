<?php
	if ( ! defined('BASEPATH')) exit('No direct srcipt access allowed');
	/**
	 * 
	 */
	require_once APPPATH . '/models/Base_model.php';
 	class Connexion_model extends Base_model {

		function __construct() {
	        parent::__construct();
	    }

		public function login($datas){
			$check = $this->check_form_login($datas); 
			if($check['status'] == 201) {
				$sql  = "SELECT * FROM v_cme_admin WHERE login=%s AND mdp=md5(%s) AND id_etat=1";
				$sql  = sprintf($sql, 
					$this->db->escape($datas['login_util']), $this->db->escape($datas['mdp_util'])
		        );
		        // echo $sql;
		        $query = $this->db->query($sql);
            	$check['connected'] = $query->row_array();
            	if ($check['connected'] != null) {
            		$check['status'] = 200;
            		$check['action'] = "Connexion valide !";
            	} else {
            		$check['action'] = "Login ou mot de passe incorrect !";
            	}
			} else {
				$check['action'] = "Veuillez vérifier les champs !";
			}
			return $check;
        }

		public function check_form_login ($input) {
			if (empty($input['login_util'])) {
				return array( 'status' => 402, 
					'login_util' => "Veuillez remplir le champ de login");
			} else if (empty($input['mdp_util'])) {
				return array('status' => 402,
					'mdp_util' => "Veuillez saisir le mot de passe");
			} else {
				return array('status' => 201);
			}
		}
	}
?>
