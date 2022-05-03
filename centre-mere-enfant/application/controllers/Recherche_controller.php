
<?php 
	defined('BASEPATH') OR exit('No direct cript acces allowed');

	require_once APPPATH . '/controllers/Base_controller.php';
	class Recherche_controller extends Base_controller {
		
		public function __construct() {
            parent::__construct();
            $this->load->model('Recherche_model');
            $this->set_title('Recherche');
       	}

       	public function recherche_form() {
		 	$this->set_content_page('recherche/resultats');
            $data               = $this->get_init_data();
			// $data['enfant']     = $this->Enfant_model->get_enfant($id_enfant);
			$this->load->view('variable_page',$data);
		}

		public function chercher() {
			$this->set_content_page('recherche/resultats');
            $data               = $this->get_init_data();
			$filtres            = $this->input->post();
			$data['filtre']     = $filtres;
			if ($filtres['option'] == 'Enfant') {
				$data['enfants'] = $this->Recherche_model->chercher($filtres, 'Enfant');
			} else if ($filtres['option'] == 'Mere') {
				$data['meres'] = $this->Recherche_model->chercher($filtres, 'Mere');
			} else {
				$data['sads'] = $this->Recherche_model->chercher($filtres, 'Sad');
			}
			$this->load->view('variable_page',$data);
		}


	}
?>