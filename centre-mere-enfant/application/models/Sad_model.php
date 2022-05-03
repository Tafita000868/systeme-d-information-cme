
<?php
	if ( ! defined('BASEPATH')) exit('No direct srcipt access allowed');
	
	/**
	 * 
	 */
	require_once APPPATH . '/models/Base_model.php';
 	class Sad_model extends Base_model {
		
		function __construct() {
	        parent::__construct();
	    }


	    public function liste_sads() {
			return $this->list("v_cme_sad");
		}

		public function get_sads_by_etat($id_etat) {
			$input = array('id_etat' => $id_etat);
			return $this->find_multi_column("v_cme_sad", $input);
		}
		
		public function get_enfant_sad($id_enfant) {
			return $this->find_column("cme_sad", 'id_enfant' , $id_enfant);
		}

		public function get_sad($id_sad) {
			return $this->find_column("cme_sad", 'id_sad' , $id_sad);
		}

		public function find_sad($input) {
			return $this->find_multi_column("cme_sad", $input);
		}

		public function inverse_info_sad($id_sad) {
			$this->load->model('Enfant_model');
			$this->load->model('Mere_model');
			$sad = $this->get_sad($id_sad);
			$enfant = $this->Enfant_model->get_enfant($sad['id_enfant']);
			$mere = $this->Mere_model->get_mere($sad['id_mere']);
			$sad = array(
				'id_sad' => $sad['id_sad'],
				'id_enfant' => $enfant['id_enfant'],
				'id_mere' => $mere['id_mere'],
				'num_matricule_sad' => $sad['num_matricule'],
				'num_matricule_enf' => $enfant['num_matricule'],
				'date_debut' => $sad['date_debut'],
				'date_fin' => $sad['date_fin'],
				'frequence_de_payement' => $sad['frequence_de_payement'],
				'date_envoye_en_Italie' => $sad['date_envoye_en_Italie'],
				'date_recu_payement' => $sad['date_recu_payement'],
				'date_adhesion' => $sad['date_adhesion'],
				'num_liste' => $sad['num_liste'],
				'observation' => $sad['observation']
			);
			return $sad;
		}

		public function info_sad($input, $enfant) {
			$sad = array(
				'id_enfant' => $enfant['id_enfant'],
				'id_mere' => $enfant['id_mere'],
				'num_matricule' => $input['num_matricule_sad'],
				'date_debut' => $input['date_debut'],
				'date_fin' => $input['date_fin'],
				'frequence_de_payement' => $input['frequence_de_payement'],
				'date_envoye_en_Italie' => $input['date_envoye_en_Italie'],
				'date_recu_payement' => $input['date_recu_payement'],
				'date_adhesion' => $input['date_adhesion'],
				'num_liste' => $input['num_liste'],
				'observation' => $input['observation']
			);
			return $sad;
		}

// [num_matricule_enf] => 1
// [num_matricule_sad] => 1
// [date_debut] => 2022-01-26
// [date_fin] => 
// [frequence_de_payement] => 01/01/2000
// [date_envoye_en_Italie] => 
// [date_recu_payement] => 
// [date_adhesion] => 
// [observation] =>  

		public function inserer($input) { 
			$check = $this->check_form_sad($input);
			if($check['status'] == 200) {
				$this->load->model('Enfant_model');
				$enfant = $this->Enfant_model->get_enfant_num_matricule($input['num_matricule_enf']);
				if ($enfant!=null) {
					$sad = $this->info_sad($input, $enfant);
					// echo  "<pre>";print_r($sad);echo "</pre>";
					$insert = $this->insert('cme_sad', $sad);
					if ($insert['status'] == 200) {
						$check['id_sad'] = $insert['insert_id'];
						$check['action'] = "Insertion effectuée avec succes";
					} else {
						$check['action'] = $insert['action'];
					}
				} else {
					return array(
						'status' => 402, 
						'action'=>"Il y a une erreur durant l'insertion, veuillez vérifier !",
						'num_matricule_enf' => "Ce numero matricule de l'enfant n'existe pas !"
					);
				}
			} else {
				$check['action'] = "Il y a une erreur durant l'insertion, veuillez vérifier !";
			}
			return $check;
		}

		public function modifier($input, $id_sad) {
			$check = $this->check_form_sad($input);
			if($check['status'] == 200) {
				$this->load->model('Enfant_model');
				$enfant = $this->Enfant_model->get_enfant_num_matricule($input['num_matricule_enf']);
				if ($enfant!=null) {
					$sad = $this->info_sad($input, $enfant);
					// echo  "<pre> 1 ";print_r($sad);echo "</pre>";
					// echo  "<pre> 2 ";print_r($input);echo "</pre>";
					$update = $this->update('cme_sad', $sad, 'id_sad', $id_sad);
					if ($update['status'] == 200) {
						$check['action'] = "Modification effectuée avec succes";
					} else {
						$check['action'] = $update['action'];
					}
				} else {
					return array(
						'status' => 402, 
						'action'=>"Il y a une erreur durant l'insertion, veuillez vérifier !",
						'num_matricule_enf' => "Ce numero matricule de l'enfant n'existe pas !"
					);
				}
				$check['action'] = "Modification effectuée avec succes";
			} else {
				$check['action'] = "Il y a une erreur durant la modification, veuillez vérifier !";
			}
			return $check;
		}

		public function supprimer($id_sad) {
			return $this->delete('cme_sad', 'id_sad', $id_sad);
		}

		public function check_form_sad ($input) {
			if (empty($input['num_matricule_sad'])) {
				return array( 'status' => 402, 
					'num_matricule_sad' => "Veuillez remplir le numero matricule de SAD");
			} else if (empty($input['num_matricule_enf'])) {
				return array( 'status' => 402, 
					'num_matricule_enf' => "Veuillez remplir le numero matricule de l'enfant");
			}
			else {
				if (isset($input['id_sad'])) {
					// On doit verifier si le numero matricule de l'enfant est deja existant sauf son num matricule 
					if ($this->existe_unique_index('cme_sad', 'num_matricule', $input['num_matricule_sad'], 'id_sad', $input['id_sad'])) { 
						// si Oui alors erreurs 
						return array('status' => 402, 
						'num_matricule_sad' => "Numero matricule déjà existe");
					} else {
						return array('status' => 200);
					}
				} else {
					// On doit verifier si le numero matricule de l'enfant est deja existant
					if ($this->existe_unique_index('cme_sad', 'num_matricule', $input['num_matricule_sad'])) { 
						// si Oui alors erreurs 
						return array('status' => 402, 
						'num_matricule_sad' => "Numero matricule déjà existe");
					} else {
						return array('status' => 200);
					}
				}
			}
		}


	}
?>
