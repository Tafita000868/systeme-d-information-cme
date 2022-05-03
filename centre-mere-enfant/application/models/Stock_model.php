

<?php
	if ( ! defined('BASEPATH')) exit('No direct srcipt access allowed');
	
	/**
	 * 
	 */
	require_once APPPATH . '/models/Base_model.php';
 	class Stock_model extends Base_model {
		
		function __construct() {
	        parent::__construct();
	    }

	    public function liste_stocks() {
			return $this->list("v_cme_stock");
		}

		public function stocks_restants() {
			return $this->list("v_cme_stock_restant");
		}

		public function liste_articles() {
			return $this->list("cme_article");
		}

		public function liste_unites() {
			return $this->list("cme_unite");
		}
 
		public function get_stock($id_stock) {
			return $this->find_column("cme_stock", 'id_stock' , $id_stock);
		}

		public function get_article($id_article) {
			return $this->find_column("cme_article", 'id_article' , $id_article);
		}

		public function get_unite($id_unite) {
			return $this->find_column("cme_unite", 'id_unite' , $id_unite);
		}

		public function find_stock($input) {
			return $this->find_multi_column("cme_stock", $input);
		}

		public function find_stock_restant($input) {
			return $this->find_multi_column_return_row("v_cme_stock_restant", $input);
		}

		public function get_structure_original_stock($input) {
			$stock = array();
			$stock['id_article']  = $input['id_article'];
			$stock['description'] = $input['description'];
			$stock['id_unite']    = $input['id_unite'];
			$stock['date_action'] = $input['date_action'];
			$stock['observation'] = $input['observation'];
			if ($input['type_mouvement'] == 'entree') {
				$stock['qte_entree'] = $input['quantite'];
			} else {
				$stock['qte_sortie'] = $input['quantite'];
			}
			return $stock;
		}

		public function get_stock_restant($produit_stock) {
			$article = $this->get_article($produit_stock['id_article']);
			$unite   = $this->get_unite($produit_stock['id_unite']);
			$filtre  = array(
				'description' => $produit_stock['description'], 
				'article' => $article['designation'], 
				'unite' => $unite['unite'] 
			);
			$restant = $this->find_stock_restant($filtre);
			return $restant;
		}

		public function inserer($nom_table, $input) { 
			$check;
			if ($nom_table == 'cme_article') {
				$check = $this->check_form_article($input);
			} else if ($nom_table == 'cme_unite') {
				$check = $this->check_form_unite($input);
			} else {
				$check = $this->check_form_stock($input);
				$stock = $this->get_structure_original_stock($input);
				if ($input['type_mouvement'] == 'sortie') {
					// AVANT D'INSERER UN STOCK avec un type_mouvement SORTIE, Il faut d'abord verifier si le quantité restant en stock et encore assez si non, on ne peut pas réaliser le mouvement
					$stock_restant = $this->get_stock_restant($stock);
					// echo  "<pre>";print_r($stock_restant);echo "</pre>";
					$stock['qte_sortie'] = $input['quantite'];
					if ($stock['qte_sortie'] > $stock_restant['qte_restant']) {
						$check['status'] = 300;
					}
				}
				$input = $stock;
			}
			if($check['status'] == 200) {
				$insert = $this->insert($nom_table, $input);
				if ($insert['status'] == 200) {
					$check['id_stock'] = $insert['insert_id'];
					$check['action'] = "Insertion effectuée avec succes";
				} else {
					$check['action'] = $insert['action'];
				}
			} else if($check['status'] == 300){
				$check['action'] = " Stock insuffisant !";
			} else {
				$check['action'] = "Il y a une erreur durant l'insertion, veuillez vérifier !";
			}
			return $check;
		}

		public function modifier($input, $id_stock) {
			$check = $this->check_form_stock($input);
			$stock = $this->get_structure_original_stock($input);
			$input = $stock;
			if($check['status'] == 200) {
				$update = $this->update('cme_stock', $input, 'id_stock', $id_stock);
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

		public function supprimer($id_stock) {
			return $this->delete('cme_stock', 'id_stock', $id_stock);
		}

		public function check_form_stock ($input) {
			if (empty($input['id_article'])) {
				return array( 'status' => 402, 
					'id_article' => "Veuillez séléctionner un article ou insérer un nouvel article");
			} else if (empty($input['description'])) {
				return array('status' => 402, 
					'description' => "Veuillez remplir la description");
			} else if (empty($input['id_unite'])) {
				return array('status' => 402, 
					'id_unite' => "Veuillez séléctionner une unité ou insérer un nouvelle unité");
			} else if (empty($input['date_action'])) {
				return array('status' => 402, 
					'date_action' => "Veuillez séléctionner la date du mouvement");
			} else if (empty($input['quantite'])) {
				return array('status' => 402, 
					'quantite' => "Veuillez insérer la quantité");
			} else {
				return array('status' => 200);
			}
		}


		public function check_form_article ($input) {
			if (empty($input['designation'])) {
				return array( 'status' => 402, 
					'designation' => "Veuillez remplir la désignation de l'article");
			} else {
				return array('status' => 200);
			}
		}

		public function check_form_unite ($input) {
			if (empty($input['unite'])) {
				return array( 'status' => 402, 
					'unite' => "Veuillez remplir le nom de l'unité");
			} else {
				return array('status' => 200);
			}
		}


	}
?>
