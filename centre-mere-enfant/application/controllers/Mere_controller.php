<?php 
	defined('BASEPATH') OR exit('No direct cript acces allowed');

	require_once APPPATH . '/controllers/Base_controller.php';
 	class Mere_controller extends Base_controller {

		public function __construct() {
			parent::__construct();
            $this->load->model('Mere_model');
            $this->load->model('Pagination_model');
            $this->load->model('Enfant_model');
            $this->load->model('Etat_model');

            $this->set_title('Mere');
        }
        
        public function get_profil($id_mere) {
        	$this->set_content_page('mere/profil/profil_mere');
        	$data               = $this->get_init_data();
			$data['mere']       = $this->Mere_model->get_mere($id_mere);
			$data['etat']       = $this->Etat_model->get_etat($data['mere']['id_etat']);
			$data['enfants']    = $this->Enfant_model->get_enfants_mere($id_mere);
			$this->load->view('variable_page',$data);
        }

// N° matricule	Nom	Prénom	Classe	Genre	Actif

		public function liste_meres($n_page=0) {
			$this->set_content_page('mere/liste');
			$limit              = 10;
			$sort               = 'desc';
			$columns            = 'id_mere';
			$nb_mere            = $this->Mere_model->get_count();
			$this->Pagination_model->initialise( 
				base_url('mere/liste.html'), $nb_mere, $limit
			);
            $numero_page        = ($this->uri->segment(3)) ? $this->uri->segment(3):0;
            $data               = $this->get_init_data();
            $data['links']      = $this->Pagination_model->get_links();
            $data['meres']= $this->Mere_model->liste_meres($numero_page, $columns, $sort, $limit);
			$this->load->view('variable_page',$data);
		}

		public function insertion() {
			$this->set_content_page('mere/insertion');
		 	$data = $this->get_init_data();
        	$data['etats']      = $this->Etat_model->liste_etats();
			$this->load->view('variable_page',$data);
		}
		
		public function inserer() {
			$input = $this->input->post();
			$retour_insert = $this->Mere_model->inserer($input);
			if ($retour_insert['status'] == 200) {
				// echo  "<pre> check 1 : ";print_r($retour_insert);echo "</pre>";
				redirect('mere/profil-'.$retour_insert['id_mere'].'.html');
			} else {
				$this->set_content_page('mere/insertion');
				$this->set_message($retour_insert);
				$data               = $this->get_init_data();
				$data['mere'] = $input;
				$data['etats']      = $this->Etat_model->liste_etats();
				$this->load->view('variable_page',$data);
			}
		}

		public function modification($id_mere) {
			$this->set_content_page('mere/modification');
			$data                 = $this->get_init_data();
		 	$data['mere']   = $this->Mere_model->get_mere($id_mere);
		 	$data['etats']      = $this->Etat_model->liste_etats();
			$this->load->view('variable_page',$data);
		}

		public function modifier() {
			$input                = $this->input->post();
			$id_mere               = $input['id_mere'];
			$retour_modif         = $this->Mere_model->modifier($input, $id_mere);
			if ($retour_modif['status'] == 200) {
				redirect('mere/profil-'.$id_mere.'.html');
			} else {
				$this->set_content_page('mere/modification');
				$this->set_message($retour_modif);
				$data               = $this->get_init_data();
				$data['mere'] = $input;
				$data['etats']      = $this->Etat_model->liste_etats();
				$this->load->view('variable_page',$data);
			}
		}
		
		// public function supprimer($id_mere) {                        
		// 	$ens = $this->Mere_model->get_mere($id_mere);
		// 	if ($ens != null) {
		// 		// echo  "<pre>";print_r($ens);echo "</pre>";
		// 		$suppression = array('situation_actuelle' => 'non');
		// 		$this->Mere_model->supprimer($suppression, $id_mere);
		// 	} 
		// 	redirect('mere/profil-'.$id_mere.'.html');
		// }

	}
?>