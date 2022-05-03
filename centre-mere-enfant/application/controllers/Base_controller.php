<?php 
	defined('BASEPATH') OR exit('No direct cript acces allowed');

	session_start();

	class Base_controller extends CI_Controller {
		private $title          = "";
		private $content_page   = "";
		private $message        = null;
		
		public function __construct() {
            parent::__construct();
            //$this->load->model('Annee_scolaire_model');
            //$annee_scol         = $this->Annee_scolaire_model->get_annee_scol_actu(); 
            //$this->set_annee_scol($annee_scol);
        }

        protected function get_init_data() {
			$data               = array();
			$data['title']      = $this->get_title();
			$data['content']    = $this->get_content_page();
			$data['message']    = $this->get_message();
			return $data;
		}

        public function set_title($title){
            $this->title = $title;
        }
        public function get_title(){
            return $this->title;
        }

        public function set_content_page($content_page){
            $this->content_page = $content_page;
        }
        public function get_content_page(){
            return $this->content_page;
        }

        public function set_message($message){
            $this->message = $message;
        }
        public function get_message(){
            return $this->message;
        }

        


	}
?>