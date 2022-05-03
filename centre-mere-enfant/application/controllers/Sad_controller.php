

<?php 
	defined('BASEPATH') OR exit('No direct cript acces allowed');

	require_once APPPATH . '/controllers/Base_controller.php';
	class Sad_controller extends Base_controller {
		
		public function __construct() {
            parent::__construct();
            $this->load->model('Sad_model');
            $this->set_title('Sad');
       	}

       	protected function data_sad($content, $message=null) {
			$this->set_content_page($content);
			$this->set_message($message);
            $data               = $this->get_init_data();
			return $data;
		}

		public function liste_sads() {
			$data               = $this->data_sad('sad/liste');
			$data['sads']       = $this->Sad_model->liste_sads();
			$this->load->view('variable_page',$data);
		}

		public function insertion() {
		 	$data = $this->data_sad('sad/insertion');
			$this->load->view('variable_page',$data);
		}

		public function inserer() {
			$input              = $this->input->post();
			$insert_retour      = $this->Sad_model->inserer($input);
			if ($insert_retour['status'] == 200) {
				redirect('sad/liste.html');
			} else {
				$data = $this->data_sad('sad/insertion', $insert_retour);
				$data['sad']= $input;
				$this->load->view('variable_page',$data);
			}
		}

		public function modification($id_sad) {
		 	$data = $this->data_sad('sad/modification');
			$data['sad'] = $this->Sad_model->inverse_info_sad($id_sad);
			// echo  "<pre>";print_r($data['sad']);echo "</pre>";
			$this->load->view('variable_page',$data);
		}

		public function modifier() {
			$input              = $this->input->post();
			// echo  "<pre>";print_r($input);echo "</pre>";
			$id_sad             = $input['id_sad'];
			$retour_modif       = $this->Sad_model->modifier($input, $id_sad);
			if ($retour_modif['status'] == 200) {
				redirect('sad/liste.html');
			} else {
				$data = $this->data_sad('sad/insertion', $insert_retour);
				$data['sad']= $input;
				$this->load->view('variable_page',$data);
			}
		}

		public function supprimer($id_sad) {
			$isDeleted          = $this->Sad_model->supprimer($id_sad);
			if ($isDeleted) {
				redirect('sad/liste.html');
			}
		}

	}
?>



