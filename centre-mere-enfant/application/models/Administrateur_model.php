
<?php
	if ( ! defined('BASEPATH')) exit('No direct srcipt access allowed');
	
	/**
	 * 
	 */
	require_once APPPATH . '/models/Base_model.php';
 	class Administrateur_model extends Base_model {
		
		function __construct() {
	        parent::__construct();
	    }

	    public function liste_administrateurs() {
			return $this->list("v_cme_administrateur");
		}
 	
 		public function liste_metiers() {
			return $this->list("cme_metier");
		}

		public function liste_etats() {
			return $this->list("cme_etat");
		}

		public function get_administrateur($id_admin) {
			return $this->find_column("cme_administrateur", 'id_admin' , $id_admin);
		}

		public function find_administrateur($input) {
			return $this->find_multi_column("cme_administrateur", $input);
		}

		
		public function inserer($input) { 
			$check = $this->check_form_administrateur($input);
			if($check['status'] == 200) {
				$input['mdp'] = md5($input['mdp']);
				$insert = $this->insert('cme_administrateur', $input);
				if ($insert['status'] == 200) {
					$check['id_admin'] = $insert['insert_id'];
					$check['action'] = "Insertion effectuée avec succes";
				} else {
					$check['action'] = $insert['action'];
				}
			} else {
				$check['action'] = "Il y a une erreur durant l'insertion, veuillez vérifier !";
			}
			return $check;
		}

		public function modifier($input, $id_admin) {
			$check = $this->check_form_administrateur($input);
			if($check['status'] == 200) {
				$input['mdp'] = md5($input['mdp']);
				$update = $this->update('cme_administrateur', $input, 'id_admin', $id_admin);
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

		public function supprimer($id_admin) {
			return $this->delete('cme_administrateur', 'id_admin', $id_admin);
		}

		public function check_form_administrateur ($input) {
			if (empty($input['num_matricule'])) {
				return array( 'status' => 402, 
					'num_matricule' => "Veuillez remplir le numero matricule de l'administrateur");
			} else if (empty($input['nom'])) {
				return array( 'status' => 402, 
					'nom' => "Veuillez remplir le nom de l'administrateur");
			} else if (empty($input['prenom'])) {
				return array('status' => 402, 
					'prenom' => "Veuillez remplir le prenom de l'administrateur");
			} else if (empty($input['sexe'])) {
				return array('status' => 402, 
					'sexe' => "Veuillez remplir le genre de l'administrateur");
			} else if (empty($input['id_etat'])) {
				return array('status' => 402, 
					'id_etat' => "Veuillez remplir l'etat de l'administrateur");
			} else if (empty($input['id_metier'])) {
				return array('status' => 402, 
					'id_metier' => "Veuillez remplir le métier de l'administrateur");
			} else if (empty($input['id_siege'])) {
				return array('status' => 402, 
					'id_siege' => "Veuillez remplir le numero de siège de l'administrateur");
			} else if (empty($input['login'])) {
				return array( 'status' => 402, 
					'login' => "Veuillez remplir le login ou mail de l'administrateur");
			} else if (empty($input['mdp'])) {
				return array('status' => 402, 
					'mdp' => "Veuillez remplir le mot de passe de l'administrateur");
			} else {
				if (isset($input['id_admin'])) {
					// On doit verifier si le numero matricule de l'enfant est deja existant sauf son num matricule 
					if ($this->existe_unique_index('cme_administrateur', 'num_matricule', $input['num_matricule'], 'id_admin', $input['id_admin'])) { 
						// si Oui alors erreurs 
						return array('status' => 402, 
						'num_matricule' => "Numero matricule déjà existe");
					} else {
						return array('status' => 200);
					}
				} else {
					// On doit verifier si le numero matricule de l'enfant est deja existant
					if ($this->existe_unique_index('cme_administrateur', 'num_matricule', $input['num_matricule'])) { 
						// si Oui alors erreurs 
						return array('status' => 402, 
						'num_matricule' => "Numero matricule déjà existe");
					} else {
						return array('status' => 200);
					}
				}
			}
		}
	}
?>
