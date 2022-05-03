<?php 
	defined('BASEPATH') OR exit('No direct cript acces allowed');

	require_once APPPATH . '/controllers/Base_controller.php';
	class Enfant_controller extends Base_controller {
		
		public function __construct() {
            parent::__construct();
            $this->load->model('Enfant_model');
            $this->load->model('Activite_model');
            $this->load->model('Scolarisation_model');
            $this->load->model('Etat_model');
            $this->set_title('Enfant');
        }

        public function data_profil($id_enfant, $message=null) {
        	$this->load->model('Mere_model');
        	$this->load->model('Historique_model');
        	$this->load->model('Sad_model');
        	$this->set_content_page('enfant/profil/profil_eleve');
            $this->set_message($message);
            $data               = $this->get_init_data();
        	$data['enfant']     = $this->Enfant_model->get_enfant($id_enfant);
        	$data['etat']       = $this->Etat_model->get_etat($data['enfant']['id_etat']);
        	$data['historique'] = $this->Historique_model->get_histo_enfant($id_enfant);
        	$data['etats']      = $this->Etat_model->liste_etats();
        	$data['activite']   = $this->Activite_model->get_activite($data['enfant']['id_activite']);
        	$data['mere']       = $this->Mere_model->get_mere($data['enfant']['id_mere']);
        	$filtre             = array('id_enfant' => $data['enfant']['id_enfant'], 
        								'id_mere' => $data['enfant']['id_mere']);
        	$data['scolarisations'] = $this->Scolarisation_model->find_scolarisation($filtre);
        	$data['ecoles']     = $this->Scolarisation_model->liste_ecoles();
        	$data['classes']    = $this->Scolarisation_model->liste_classes();
        	$data['activites']  = $this->Activite_model->liste_activites();
        	$data['sad']        = $this->Sad_model->get_enfant_sad($id_enfant);
			return $data;
        }

        public function frequentation_mensuelle() {
        	$this->load->model('Statistique_model');
			$input              = $this->input->post();
			$stat      			= $this->Statistique_model->get_frequentation_mensuelle($input);
			if ($stat['status'] == 200) {
				$data            = $this->data_profil($input['id_enfant'], $stat);
				$data['mois']	 = $input;
				$data['statistiques'] = $stat;
				$data['detail_mois']  = $this->Statistique_model->get_mois($input['mois']);
				$data['detail_pointages']  = $this->Statistique_model->get_detail_pointage($input['id_enfant'], $input['mois']);
				$this->load->view('variable_page',$data);
			}
		}
		
        public function get_profil($id_enfant) {
        	$data = $this->data_profil($id_enfant);
			$this->load->view('variable_page',$data);
        }

		public function liste_enfants($admission, $n_page=0) {
			$this->load->model('Pagination_model');
			$url_liste = 'enfant/liste-admis.html';
			if ($admission != 'admis') { 
				$url_liste = 'enfant/liste-attente.html';
			}
			$this->set_content_page('enfant/liste');
            $data               = $this->get_init_data();
			$limit              = 10;
			$sort               = 'desc';
			$columns            = 'id_enfant';
			$nb_enfat           = $this->Enfant_model->get_count();
			$this->Pagination_model->initialise( 
				base_url($url_liste), $nb_enfat, $limit
			);
            $numero_page        = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['links']      = $this->Pagination_model->get_links();
            $data['enfants']    = $this->Enfant_model->liste_enfants($admission, $numero_page, $columns, $sort, $limit);
			$this->load->view('variable_page',$data);
		}

		protected function data_insertion($enfant=null, $message=null) {
			$this->set_content_page('enfant/insertion');
			$this->set_message($message);
            $data               = $this->get_init_data();
			$data['enfant']     = $enfant;
			$data['etats']      = $this->Etat_model->liste_etats();
			$data['activites']  = $this->Activite_model->liste_activites();
			// echo  "<pre>";print_r($data['enfant']);echo "</pre>";
			return $data;
		}

		public function insertion() {
		 	$data               = $this->data_insertion();
			$this->load->view('variable_page',$data);
		}

		public function inserer() {
			$input              = $this->input->post();
			$insert_retour      = $this->Enfant_model->inserer($input);
			// echo  "<pre>";print_r($insert_retour);echo "</pre>";
			if ($insert_retour['status'] == 200) {
				redirect('enfant/profil-'.$insert_retour['id_enfant'].'.html');
			} else {
				$data            = $this->data_insertion($input, $insert_retour);
				$this->load->view('variable_page',$data);
			}
		}

		protected function data_modification($enfant, $message=null) {
			$this->set_content_page('enfant/modification');
			$this->set_message($message);
            $data               = $this->get_init_data();
			$data['enfant']     = $enfant;
			$data['etats']      = $this->Etat_model->liste_etats();
			$data['mere']       = $this->Mere_model->get_mere($data['enfant']['id_mere']);
			$data['activites'] = $this->Activite_model->liste_activites();
			return $data;
		}

		public function modification($id_enfant) {
			$enfant             = $this->Enfant_model->get_enfant($id_enfant);
		 	$data               = $this->data_modification($enfant);
			$this->load->view('variable_page',$data);
		}

		public function modifier() {
			$input              = $this->input->post();
			$id_enfant             = $input['id_enfant'];
			$modif_retour       = $this->Enfant_model->modifier($input, $id_enfant);
			if ($modif_retour['status'] == 200) {
				redirect('enfant/profil-'.$id_enfant.'.html');
			} else {
				$enfant         = $input;
		 		$data           = $this->data_modification($enfant, $modif_retour);
				$this->load->view('variable_page',$data);
			}
		}

		public function inserer_scolarisation() {
			$input              = $this->input->post();
			$insert_retour      = $this->Scolarisation_model->inserer($input);
			if ($insert_retour['status'] == 200) {
				redirect('enfant/profil-'.$input['id_enfant'].'.html');
			} else {
				$data            = $this->data_profil($input['id_enfant'], $insert_retour);
				$data['scolarisation'] = $input;
				$this->load->view('variable_page',$data);
			}
		}

		public function inserer_ecole($id_enfant) {
			$input              = $this->input->post();
			$insert_retour      = $this->Scolarisation_model->inserer_ecole($input);
			if ($insert_retour['status'] == 200) {
				redirect('enfant/profil-'.$id_enfant.'.html');
			} else {
				$data           = $this->data_profil($id_enfant, $insert_retour);
				$data['ecole']  = $input;
				$this->load->view('variable_page',$data);
			}
		}

		public function inserer_pointage() {
            $this->load->model('Pointage_model');
			$input              = $this->input->post();
			$insert_retour      = $this->Pointage_model->inserer($input);
			if ($insert_retour['status'] == 200) {
				redirect('enfant/profil-'.$input['id_enfant'].'.html');
			} else {
				$data             = $this->data_profil($input['id_enfant'], $insert_retour);
				$data['pointage'] = $input;
				$this->load->view('variable_page',$data);
			}
		}
		
		public function supprimer_scolarisation($id_enfant, $id_scolarisation) {
			$delete_retour       = $this->Scolarisation_model->supprimer($id_scolarisation);
			if ($delete_retour['status'] == 200) {
				redirect('enfant/profil-'.$id_enfant.'.html');
			} else {
				$data            = $this->data_profil($id_enfant, $delete_retour);
				$this->load->view('variable_page',$data);
			}
		}

		
		

	}
?>