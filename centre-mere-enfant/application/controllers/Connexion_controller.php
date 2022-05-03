<?php 
    defined('BASEPATH') OR exit('No direct cript acces allowed');

    require_once APPPATH . '/controllers/Base_controller.php';
    class Connexion_controller extends Base_controller {
        
        public function __construct() {
            parent::__construct();
            $this->load->model('Connexion_model');
            $this->set_title('Connexion');
        }

        public function login_form() {
            $this->set_content_page('administrateur/login');
            $data = $this->get_init_data();
            $this->load->view('variable_page',$data);
        }

        public function login() {
            $input          = $this->input->post();
            $Connexion      = $this->Connexion_model->login($input);
            if($Connexion['status'] == 200 ) {
                $_SESSION["connected"] = $Connexion['connected'];
                // echo  "<pre>";print_r($_SESSION["connected"]);echo "</pre>";
                redirect('statistique/nombre/enfant.html');
            }
            else {
                $this->set_content_page('administrateur/login');
                $this->set_message($Connexion);
                $data = $this->get_init_data();
                $this->load->view('variable_page',$data);
            }
        }

        public function logout() {
            session_destroy();
            redirect('connexion/login-form.html');
        }

    }
?>