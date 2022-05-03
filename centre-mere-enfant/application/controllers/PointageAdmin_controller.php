<?php 
	defined('BASEPATH') OR exit('No direct cript acces allowed');

	require_once APPPATH . '/controllers/Base_controller.php';
	class PointageAdmin_controller extends Base_controller {
		
		public function __construct() {
            parent::__construct();
            $this->load->model('PointageAdmin_model');
            $this->set_title('Historique');
        }

       	public function inserer_pointage() {
			$input              = $this->input->post();
			$insert_retour      = $this->PointageAdmin_model->inserer_pointage($input);
			echo json_encode($insert_retour);
		}

	}
?><