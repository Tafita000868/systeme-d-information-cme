

<?php 
	defined('BASEPATH') OR exit('No direct cript acces allowed');

	require_once APPPATH . '/controllers/Base_controller.php';
	class Statistique_controller extends Base_controller {
		
		public function __construct() {
            parent::__construct();
            $this->load->model('Statistique_model');
            $this->set_title('Statistique');
       	}

       	protected function data_statistique($content, $message=null) {
			$this->set_content_page($content);
			$this->set_message($message);
            $data               = $this->get_init_data();
			return $data;
		}

		public function get_stat_general() {
			$data                  = $this->data_statistique('statistique/stat_general');
			$data['statistique']   = $this->Statistique_model->get_stat_pourcentage();
			$data['statistique_par_activite']= $this->Statistique_model->get_stat_par_activites();
			$activites = array();
			$nb_enfant_par_activite = array();
			foreach ($data['statistique_par_activite'] as $stat) {
				array_push($activites, $stat['activite']['type']);
				array_push($nb_enfant_par_activite, $stat['nb_enfant']['nombre']);
			}
			$data['activites'] = $activites;
			$data['nb_enfant_par_activite'] = $nb_enfant_par_activite;
			$this->load->view('variable_page',$data);
		}

		public function createPdf() {
            try{
                $data = array();
                $data['statistique']   = $this->Statistique_model->get_stat_pourcentage();
				$data['statistique_par_activite']= $this->Statistique_model->get_stat_par_activites();
                $this->load->library('Statistique_pdf',$data);
                $this->statistique_pdf->Output();
            }catch(Exception $e){
                throw new Exception('Il y a une erreur');
            }
        }

		// Pourcentage mensuel de fréquentation des enfants (CANTINE, GARGOTE, etc)
		// Pourcentage mensuel de fréquentation cabinet médical (VISITE MEDICALE)
		// Pourcentage mensuel de fréquentation à l’éducation (Responsable éducation)

		


	}
?>