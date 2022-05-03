<?php 
	defined('BASEPATH') OR exit('No direct cript acces allowed');

	require_once APPPATH . '/controllers/Base_controller.php';
	class Historique_controller extends Base_controller {
		
		public function __construct() {
            parent::__construct();
            $this->load->model('Historique_model');
            $this->set_title('Historique');
        }

       	protected function data_historique($content, $message=null) {
			$this->set_content_page($content);
			$this->set_message($message);
            $data               = $this->get_init_data();
			return $data;
		}

		public function liste_historiques() {
			$data               = $this->data_historique('historique/liste');
			$data['historiques']   = $this->Historique_model->liste_historiques();
			$this->load->view('variable_page',$data);
		}

		public function insertion() {
		 	$data = $this->data_historique('historique/insertion');
			$this->load->view('variable_page',$data);
		}

		public function inserer() {
			$input = array(
				'id_enfant' => $this->input->post('id_enfant'),
				'id_mere' => $this->input->post('id_mere'),
				'id_etat' => $this->input->post('id_etat'),
				'nb_statu_miseAjour' => $this->input->post('nb_statu_miseAjour'),
				'observation' => $this->input->post('observation'),
				'date_debut' => $this->input->post('date_debut'),
				'date_fin' => $this->input->post('date_fin')
			);
			$retour;
			$historique = $this->Historique_model->get_histo_if_exist($input);
			// echo  "<pre>";print_r($historique);echo "</pre>";
    		if ($historique != null) {
    			$retour = $this->Historique_model->modifier($input, $historique['id_histo']);
    		} else {
    			$retour = $this->Historique_model->inserer($input);
    		}
			echo json_encode($retour);
		}

		public function modification($id_histo) {
		 	$data = $this->data_historique('historique/modification');
			$data['historique']    = $this->Historique_model->get_historique($id_histo);
			$this->load->view('variable_page',$data);
		}

		public function modifier() {
			$input              = $this->input->post();
			$id_histo             = $input['id_histo'];
			$retour_modif       = $this->Historique_model->modifier($input, $id_histo);
			if ($retour_modif['status'] == 200) {
				redirect('historique/liste.html');
			} else {
				$data = $this->data_historique('historique/insertion', $insert_retour);
				$data['historique']= $input;
				$this->load->view('variable_page',$data);
			}
		}

		public function supprimer($id_histo) {
			$isDeleted          = $this->Historique_model->supprimer($id_histo);
			if ($isDeleted) {
				redirect('historique/liste.html');
			}
		}

	    


	}
?><