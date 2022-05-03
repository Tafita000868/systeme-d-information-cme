

<?php 
	defined('BASEPATH') OR exit('No direct cript acces allowed');

	require_once APPPATH . '/controllers/Base_controller.php';
	class Administrateur_controller extends Base_controller {
		
		public function __construct() {
            parent::__construct();
            $this->load->model('Administrateur_model');
            $this->set_title('administrateur');
       	}

       	protected function data_administrateur($content, $message=null) {
			$this->set_content_page($content);
			$this->set_message($message);
            $data               = $this->get_init_data();
            $data['etats']      = $this->Administrateur_model->liste_etats();
            $data['metiers']    = $this->Administrateur_model->liste_metiers();
			return $data;
		}

		public function liste_administrateurs() {
			$data               = $this->data_administrateur('administrateur/liste');
			$data['administrateurs']   = $this->Administrateur_model->liste_administrateurs();
			$this->load->view('variable_page',$data);
		}

		public function insertion() {
		 	$data = $this->data_administrateur('administrateur/insertion');
			$this->load->view('variable_page',$data);
		}

		public function inserer() {
			$input              = $this->input->post();
			$insert_retour      = $this->Administrateur_model->inserer($input);
			if ($insert_retour['status'] == 200) {
				redirect('administrateur/liste.html');
			} else {
				$data = $this->data_administrateur('administrateur/insertion', $insert_retour);
				$data['administrateur']= $input;
				$this->load->view('variable_page',$data);
			}
		}

		public function modification($id_admin) {
		 	$data = $this->data_administrateur('administrateur/modification');
			$data['administrateur']    = $this->Administrateur_model->get_administrateur($id_admin);
			$this->load->view('variable_page',$data);
		}

		public function modifier() {
			$input              = $this->input->post();
			$id_admin           = $input['id_admin'];
			$retour_modif       = $this->Administrateur_model->modifier($input, $id_admin);
			if ($retour_modif['status'] == 200) {
				redirect('administrateur/liste.html');
			} else {
				$data = $this->data_administrateur('administrateur/insertion', $retour_modif);
				$data['administrateur']= $input;
				$this->load->view('variable_page',$data);
			}
		}

		public function supprimer($id_admin) {
			$isDeleted          = $this->Administrateur_model->supprimer($id_admin);
			if ($isDeleted) {
				redirect('administrateur/liste.html');
			}
		}

	}
?>