<?php
	if ( ! defined('BASEPATH')) exit('No direct srcipt access allowed');
	
	/**
	 * 
	 */
	require_once APPPATH . '/models/Base_model.php';
 	class Enfant_model extends Base_model {
		
		private $count_result = 0;
		function __construct() {
	        parent::__construct();
	        $this->load->model('Mere_model');
	    }
// CRUD enfant 
	    
	    public function set_count_result($count_result){
            $this->count_result = $count_result;
        }

        public function get_count_result(){
            return $this->count_result;
        }

        public function liste_tous_enfants() {
			return $this->list("v_cme_enfant");
		}
        
        public function get_enfants_by_etat($id_etat) {
			$input = array('id_etat' => $id_etat);
			return $this->find_multi_column("v_cme_enfant", $input);
		}

        public function get_enfants_mere($id_mere) {
        	$input = array('id_mere' => $id_mere);
			return $this->find_multi_column("v_cme_enfant", $input);
		}

		public function get_enfant($id_enfant) {
			return $this->find_column("cme_enfant", 'id_enfant' , $id_enfant);
		}

		public function get_enfant_num_matricule($num_matricule) {
			return $this->find_column("cme_enfant", 'num_matricule' , $num_matricule);
		}

		public function find_enfant($input) {
			return $this->find_multi_column("cme_enfant", $input);
		}
		public function get_count() {
			$result = $this->list('v_cme_enfant');
            return count($result);
		}

		public function liste_enfants($admission, $start, $columns='num_matricule', $sort='asc', $limit=10, $id_annee_scol=-1) {
			if($start > 1) {
				$start = ($start * $limit) - $limit;
			}
			$sql = "SELECT * FROM (
				SELECT * FROM v_cme_enfant ";
					if ($admission=='admis') { $sql .= " WHERE id_etat < 2 "; }
					else { $sql .= " WHERE id_etat >= 2 "; }
					$sql .= " order by num_matricule_enf asc limit %s, %s
				) as result_pagination order by ".$columns." ".$sort;
			$sql = sprintf($sql,
				$this->db->escape($start),
				$this->db->escape($limit)
			);
			// echo  "<pre>";print_r($sql);echo "</pre>";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function info_enfant($input, $mere) {
			$enfant = array(
				'id_mere' => $mere['id_mere'],
				'num_matricule' => $input['num_matricule'],
				'nom' => $input['nom'],
				'prenom' => $input['prenom'],
				'date_naissance' => $input['date_naissance'],
				'sexe' => $input['sexe'],
				'flDonneesPersonnellesValides' => $input['flDonneesPersonnellesValides'],
				'id_activite' => $input['id_activite'],
				'enregistre' => isset($input['enregistre'])?$input['enregistre']:0,
				'scolarise' => $input['scolarise'],
				'id_etat' => $input['id_etat'],
			);
			if( !empty($_FILES['photo']['name']) ) {
				$enfant['photo'] = $_FILES['photo']['tmp_name'];
            } else {
            	$enfant['photo'] = '';
            }
			if (isset($input['id_enfant'])) {
				$enfant['id_enfant'] = $input['id_enfant'];
			}
			return $enfant;
		}

		public function modifier($input, $id_enfant) {
			$check = $this->check_form_enfant($input);
			if($check['status'] == 200) {
				$mere = $this->Mere_model->get_mere_by_num_matr($input['num_matricule_mere']);
				if ($mere!=null) {
					$enfant = $this->info_enfant($input, $mere);
					$update = $this->update('cme_enfant', $enfant, 'id_enfant', $id_enfant);
					if ($update['status'] == 200) {
						$check['action'] = "Modification effectuée avec succes";
					} else {
						$check['action'] = $update['action'];
					}
				} else {
					return array(
						'status' => 402, 
						'action'=>"Il y a une erreur durant l'insertion, veuillez vérifier !",
						'num_matricule_mere' => "Cette numero matricule de la mère (ID Mere) n'existe pas !"
					);
				}
			} else {
				$check['action'] = "Il y a une erreur durant la modification, veuillez vérifier !";
			}
			return $check;
		}
		
		public function inserer($input) {
			$check = $this->check_form_enfant($input);
			// echo  "<pre> SQL : ";print_r($check);echo "</pre>";
			if($check['status'] == 200) {
				// echo  "<pre> SQL : ";print_r($input);echo "</pre>";
				$mere = $this->Mere_model->get_mere_by_num_matr($input['num_matricule_mere']);
				if ($mere!=null) {
					$enfant = $this->info_enfant($input, $mere);
					// echo  "<pre> SQL : ";print_r($enfant);echo "</pre>";
					$insert = $this->insert('cme_enfant', $enfant);
					if ($insert['status'] == 200) {
						$check['id_enfant'] = $insert['insert_id'];
						$this->load->model('Historique_model');
						$input = array(
										'id_enfant' => $check['id_enfant'],
										'id_mere' => $mere['id_mere'],
										'nb_statu_miseAjour' => 0,
										'observation' => '',
										'date_debut' => date('Y-m-d'),
										'date_fin' => null
									);
						$retour = $this->Historique_model->inserer($input);
						$check['action']    = "Insertion effectuée avec succes";
					} else {
						$check['action']    = $insert['action'];
					}
				} else {
					return array(
						'status' => 402, 
						'action'=>"Il y a une erreur durant l'insertion, veuillez vérifier !",
						'num_matricule_mere' => "Cette numero matricule de la mère (ID Mere) n'existe pas !"
					);
				}
			} else {
				$check['action'] = "Il y a une erreur durant l'insertion, veuillez vérifier !";
			}
			// echo  "<pre> SQL : ";print_r($check);echo "</pre>";
			return $check;
		}


// CHECK FORMS
		public function check_form_enfant ($input) {
			if (empty($input['num_matricule'])) {
				return array( 'status' => 402, 
					'num_matricule' => "Veuillez remplir le numero matricule de l'enfant");
			} else if (empty($input['num_matricule_mere'])) {
				return array( 'status' => 402, 
					'num_matricule_mere' => "Veuillez remplir le num_matricule de la mere");
			} else if (empty($input['nom'])) {
				return array( 'status' => 402, 
					'nom' => "Veuillez remplir le nom de l'enfant");
			} else if (empty($input['prenom'])) {
				return array('status' => 402, 
					'prenom' => "Veuillez remplir le prenom de l'enfant");
			} else if (empty($input['sexe'])) {
				return array('status' => 402, 
					'sexe' => "Veuillez remplir le genre de l'enfant");
			} else if (empty($input['date_naissance'])) {
				return array('status' => 402, 
					'date_naissance' => "Veuillez remplir la date de naissance de l'enfant");
			} else if (empty($input['id_etat'])) {
				return array('status' => 402, 
					'id_etat' => "Veuillez remplir l'état'");
			} else if (empty($input['id_activite'])) {
				return array('status' => 402, 
					'id_activite' => "Veuillez remplir l'activité de l'enfant");
			} /*else if (empty($_FILES['photo']['name'])) {
				return array('status' => 402, 
					'photo' => "Veuillez choisir une photo pour l'enfant");
			}*/
			else {
				// echo  "<pre> verifier : ";print_r($input);echo "</pre>";
				if (isset($input['id_enfant'])) {
					// On doit verifier si le numero matricule de l'enfant est deja existant sauf son num matricule 
					if ($this->existe_unique_index('cme_enfant', 'num_matricule', $input['num_matricule'], 'id_enfant', $input['id_enfant'])) { 
						// si Oui alors erreurs 
						return array('status' => 402, 
						'num_matricule' => "Numero matricule déjà existe");
					} else {
						return array('status' => 200);
					}
				} else {
					// On doit verifier si le numero matricule de l'enfant est deja existant
					if ($this->existe_unique_index('cme_enfant', 'num_matricule', $input['num_matricule'])) { 
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
