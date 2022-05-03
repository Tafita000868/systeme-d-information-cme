
<?php 
	defined('BASEPATH') OR exit('No direct cript acces allowed');

	require_once APPPATH . '/controllers/Base_controller.php';
	class Stock_controller extends Base_controller {
		
		public function __construct() {
            parent::__construct();
            $this->load->model('Stock_model');
            $this->set_title('stock');
       	}

       	protected function data_stock($content, $message=null) {
			$this->set_content_page($content);
			$this->set_message($message);
            $data             = $this->get_init_data();
            $data['articles']   = $this->Stock_model->liste_articles();
			$data['unites']   = $this->Stock_model->liste_unites();
			return $data;
		}
		
		public function stocks_restants() {
			$data             = $this->data_stock('stock/restants');
			$data['stocks']   = $this->Stock_model->stocks_restants();
			$this->load->view('variable_page',$data);
		}

		public function liste_stocks() {
			$data             = $this->data_stock('stock/liste');
			$data['stocks']   = $this->Stock_model->liste_stocks();
			$this->load->view('variable_page',$data);
		}

		public function insertion() {
		 	$data = $this->data_stock('stock/insertion');
			$this->load->view('variable_page',$data);
		}

		public function inserer_stock() {
			$input              = $this->input->post();
			$insert_retour      = $this->Stock_model->inserer('cme_stock', $input);
			if ($insert_retour['status'] == 200) {
				redirect('stock/liste.html');
			} else {
				$data = $this->data_stock('stock/insertion', $insert_retour);
				$data['stock']= $input;
				$this->load->view('variable_page',$data);
			}
		}

		public function inserer_article() {
			$input              = $this->input->post();
			$insert_retour      = $this->Stock_model->inserer('cme_article', $input);
			if ($insert_retour['status'] == 200) {
				redirect('stock/insertion.html');
			} else {
				$data = $this->data_stock('stock/insertion', $insert_retour);
				$data['article']= $input;
				$this->load->view('variable_page',$data);
			}
		}

		public function inserer_unite() {
			$input              = $this->input->post();
			$insert_retour      = $this->Stock_model->inserer('cme_unite', $input);
			if ($insert_retour['status'] == 200) {
				redirect('stock/insertion.html');
			} else {
				$data = $this->data_stock('stock/insertion', $insert_retour);
				$data['unite']= $input;
				$this->load->view('variable_page',$data);
			}
		}

		
		public function modification($id_stock) {
		 	$data = $this->data_stock('stock/modification');
			$stock = $this->Stock_model->get_stock($id_stock);
			if ($stock['qte_entree'] == 0) {
				$stock['quantite'] = $stock['qte_sortie'];
				$stock['type_mouvement'] = 'sortie';
			} else {
				$stock['quantite'] = $stock['qte_entree'];
				$stock['type_mouvement'] = 'entree';
			}
			$data['stock']    = $stock;
			$this->load->view('variable_page',$data);
		}

		public function modifier() {
			$input              = $this->input->post();
			$id_stock             = $input['id_stock'];
			$retour_modif       = $this->Stock_model->modifier($input, $id_stock);
			if ($retour_modif['status'] == 200) {
				redirect('stock/liste.html');
			} else {
				$data = $this->data_stock('stock/insertion', $insert_retour);
				$data['stock']= $input;
				$this->load->view('variable_page',$data);
			}
		}

		public function supprimer($id_stock) {
			$isDeleted          = $this->Stock_model->supprimer($id_stock);
			if ($isDeleted) {
				redirect('stock/liste.html');
			}
		}

	}
?>