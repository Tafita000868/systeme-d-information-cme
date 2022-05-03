

<?php 
	defined('BASEPATH') OR exit('No direct cript acces allowed');

	require_once APPPATH . '/controllers/Base_controller.php';
	class Activite_controller extends Base_controller {
		
		public function __construct() {
            parent::__construct();
            $this->load->model('Activite_model');
            $this->set_title('Activite');
       	}

       	protected function data_activite($content, $message=null) {
			$this->set_content_page($content);
			$this->set_message($message);
            $data               = $this->get_init_data();
			return $data;
		}

		public function liste_activites() {
			$data               = $this->data_activite('activite/liste');
			$data['activites']   = $this->Activite_model->liste_activites();
			$this->load->view('variable_page',$data);
		}

		public function insertion() {
		 	$data = $this->data_activite('activite/insertion');
			$this->load->view('variable_page',$data);
		}

		public function inserer() {
			$input              = $this->input->post();
			$insert_retour      = $this->Activite_model->inserer($input);
			if ($insert_retour['status'] == 200) {
				redirect('activite/liste.html');
			} else {
				$data = $this->data_activite('activite/insertion', $insert_retour);
				$data['activite']= $input;
				$this->load->view('variable_page',$data);
			}
		}

		public function modification($id_activite) {
		 	$data = $this->data_activite('activite/modification');
			$data['activite']    = $this->Activite_model->get_activite($id_activite);
			$this->load->view('variable_page',$data);
		}

		public function modifier() {
			$input              = $this->input->post();
			$id_activite             = $input['id_activite'];
			$retour_modif       = $this->Activite_model->modifier($input, $id_activite);
			if ($retour_modif['status'] == 200) {
				redirect('activite/liste.html');
			} else {
				$data = $this->data_activite('activite/insertion', $insert_retour);
				$data['activite']= $input;
				$this->load->view('variable_page',$data);
			}
		}

		public function supprimer($id_activite) {
			$isDeleted          = $this->Activite_model->supprimer($id_activite);
			if ($isDeleted) {
				redirect('activite/liste.html');
			}
		}

	}
?>