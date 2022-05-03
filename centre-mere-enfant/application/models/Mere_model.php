
<?php
	if ( ! defined('BASEPATH')) exit('No direct srcipt access allowed');
	
	/**
	 * 
	 */
	require_once APPPATH . '/models/Base_model.php';
 	class Mere_model extends Base_model {
		
		function __construct() {
	        parent::__construct();
	    }

		
		public function liste_classes() { 
			return $this->list("v_classe");
		}

		public function liste_toutes_meres() { 
			return $this->list("cme_mere");
		}

		public function get_meres_by_etat($id_etat) { 
			$input = array('id_etat' => $id_etat);
			return $this->find_multi_column("cme_mere", $input);
		}

		public function get_mere($id_mere) {
			return $this->find_column("cme_mere", 'id_mere' , $id_mere);
		}

		public function get_mere_by_num_matr($num_matricule) {
			return $this->find_column("cme_mere", 'num_matricule' , $num_matricule);
		}

		public function find_mere($input) {
			return $this->find_multi_column("cme_mere", $input);
		}

		public function inserer($input) {
			$check = $this->check_form_mere($input);
			// echo "<pre>";print_r($check);echo "</pre>";
			if($check['status'] == 200) {

				if(isset($input['id_mere'])) { unset($input['id_mere']); }
				$insert = $this->insert('cme_mere', $input);
				if ($insert['status'] == 200) {
					$check['id_mere'] = $insert['insert_id'];
					$check['action'] = "Insertion effectuée avec succes";
				} else {
					$check['status'] = 403;
					$check['action'] = $insert['action'];
				}
			} else {
				$check['action'] = "Il y a une erreur durant l'insertion, veuillez vérifier !";
			}
			return $check;
		}

		public function modifier($input, $id_mere) {
			$check = $this->check_form_mere($input);
			// echo  "<pre>";print_r($check);echo "</pre>";
			if($check['status'] == 200) {
				$update = $this->update('cme_mere', $input, 'id_mere', $id_mere);
				if ($update['status'] == 200) {
					$check['action'] = "Modification effectuée avec succes";
				} else {
					$check['action'] = $update['action'];
				}
			} else {
				$check['action'] = "Il y a une erreur durant la modification, veuillez vérifier !";
			}
			return $check;
		}

		public function supprimer($suppression, $id_mere) {
			return $this->update('cme_mere', $suppression, 'id_mere', $id_mere);
		}
		
		public function liste_tous_meres() {
			return $this->list("cme_mere");
		}

		public function get_count() {
			$sql = "SELECT count(id_mere) as nb FROM cme_mere";
			$query = $this->db->query($sql);
			$row = $query->row_array();
			return $row['nb'];
		}
		
		public function liste_meres($start, $columns='nom', $sort='asc', $limit=10) {
			if($start > 1) {
				$start = ($start * $limit) - $limit;
			}
			$sql = "SELECT * FROM (
					SELECT id_mere, num_matricule, nom, prenom, num_tel, adresse, date_naissance, situation_matrimoniale, nb_enfant, id_etat FROM cme_mere order by id_mere desc limit %s, %s
				) as result_pagination order by ".$columns." ".$sort;
			$sql = sprintf($sql, 
				$this->db->escape($start),
				$this->db->escape($limit)
			);
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function liste_nom() {
			$sql = "SELECT id_mere, nom, prenom FROM cme_mere";
			$query = $this->db->query($sql);
			return $query->result_array($query);
		}

		public function check_form_mere ($input) {
			if (empty($input['num_matricule'])) {
				return array( 'status' => 402, 
					'num_matricule' => "Veuillez remplir le numero matricule de la mere");
			} else if (empty($input['nom'])) {
				return array('status' => 402, 
					'nom' => "Veuillez remplir le nom de la mere");
			} else if (empty($input['prenom'])) {
				return array('status' => 402, 
					'prenom' => "Veuillez remplir le prenom de la mere");
			} else if (empty($input['date_naissance'])) {
				return array('status' => 402, 
					'date_naissance' => "Veuillez remplir la date de naissance de la mere");
			} else if (empty($input['sexe'])) {
				return array('status' => 402, 
					'sexe' => "Veuillez remplir le genre de la mere");
			} else if (empty($input['adresse'])) {
				return array('status' => 402, 
					'adresse' => "Veuillez remplir l'adresse de la mere");
			} else if (empty($input['situation_matrimoniale'])) {
				return array('status' => 402, 
					'situation_matrimoniale' => "Veuillez remplir la date de la délivrance A.E. de la mere");
			} else {
				// Il faut verifier les contraintes uniques
		 		if ($this->existe_unique_index('cme_mere', 'num_matricule', $input['num_matricule'], 'id_mere', $input['id_mere'])) {
		 			echo  "<pre>";print_r(array('status' => 402, 
					'num_matricule' => "Numero matricule déjà existe"));echo "</pre>";
					return array('status' => 402, 
					'num_matricule' => "Numero matricule déjà existe");
				} else if ($this->existe_unique_index('cme_mere', 'num_tel', $input['num_tel'], 'id_mere', $input['id_mere'])) {
		 			echo  "<pre>";print_r(array('status' => 402, 
					'num_tel' => "Numero télephone déjà existe"));echo "</pre>";
					return array('status' => 402, 
					'num_tel' => "Numero télephone déjà existe");
				} else if ($this->existe_unique_index('cme_mere', 'acte_naissance', $input['acte_naissance'], 'id_mere', $input['id_mere'])) {
					// si Oui alors erreurs 
					return array('status' => 402, 
					'acte_naissance' => "Acte de naissance déjà existe");
				} else if ($this->existe_unique_index('cme_mere', 'cin_num', $input['cin_num'], 'id_mere', $input['id_mere'])) {
					// si Oui alors erreurs 
					return array('status' => 402, 
					'cin_num' => "Numero C.I.N. déjà existe");
				} else {
					// Si toutes les informations sont valides, alors, status=200
					return array('status' => 200);
				}
			}
		}





	}
?>








