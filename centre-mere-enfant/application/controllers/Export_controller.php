<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');

// define('FPDF_FONTPATH','./fpdf151/font/');
require_once APPPATH . '/controllers/Base_controller.php';
require_once APPPATH . '/libraries/fpdf17/fpdf.php';

class Export_controller extends Base_controller {
    // construct
    public function __construct() {
        parent::__construct();
        // load model
        $this->load->model('Etat_model');
        $this->load->model('Enfant_model');
        $this->load->model('Sad_model');
        $this->load->model('Mere_model');
    }    

    protected function data_exportation($content, $message=null) {
        $this->set_content_page($content);
        $this->set_message($message);
        $data               = $this->get_init_data();
        $data['etats']      = $this->Etat_model->liste_etats();
        return $data;
    }

    public function exportation() {
        $data = $this->data_exportation('exportation/form_export');
        $this->load->view('variable_page',$data);
    }

    public function exporter() {
        $input              = $this->input->post();
        echo $input;
        if ($input['option'] == 'Enfant') {
            redirect('exportation-de-donnees/enfants/'.$input['id_etat'].'.html');
        } else if ($input['option'] == 'Mere') {
            redirect('exportation-de-donnees/meres/'.$input['id_etat'].'.html');
        } else {
            redirect('exportation-de-donnees/sads/'.$input['id_etat'].'.html');
        }
    } 

    // exporter les donnees des enfants sad par etat actuel
    public function exporter_meres($id_etat) {
        // create file name
        $filename = "Liste des meres ". date("d-m-Y H-i").".xls"; 
        // load excel library
        // $this->load->library('excel');
        $list_meres;
        if ($id_etat == '') {
            $list_meres = $this->Mere_model->liste_toutes_meres();
        } else {
            $list_meres = $this->Mere_model->get_meres_by_etat($id_etat);
        }
        // $objPHPExcel = new PHPExcel();
        // $objPHPExcel->setActiveSheetIndex(0);

        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');

        print '<table class="table table-striped table-advance table-hover"><tr>';
            print "<th>Numero Matricule</th>";
            print "<th>Nom</th>"; 
            print "<th>Prenom</th>"; 
            print "<th>Numero telephone</th>";
            print "<th>Adresse</th>";
            print "<th>Date de naissance</th>";
            print "<th>Situation Matrimoniale</th>";
            print "<th>Enfant en charge</th>";
        print "</tr>";
        // set Row

        foreach ($list_meres as $mere) {
            print "<tr>";   
                print "<td>".$mere['num_matricule']."</td>";
                print "<td>".$mere['nom']."</td>";
                print "<td>".$mere['prenom']."</td>";
                print "<td>".$mere['num_tel']."</td>";
                print "<td>".$mere['adresse']."</td>";
                print "<td>".$mere['date_naissance']."</td>";
                print "<td>".$mere['situation_matrimoniale']."</td>";
                print "<td>".$mere['nb_enfant']."</td>";
            print "</tr>";
        }
        print "</table>";
    }

    // exporter les donnees des enfants sad par etat actuel
    public function exporter_sads($id_etat) {
        // create file name
        $filename = "Liste des sads ". date("d-m-Y H-i").".xls"; 
        // load excel library
        // $this->load->library('excel');
        $list_sads;
        if ($id_etat == '') {
            $list_sads = $this->Sad_model->liste_sads();
        } else {
            $list_sads = $this->Sad_model->get_sads_by_etat($id_etat);
        }
        // $objPHPExcel = new PHPExcel();
        // $objPHPExcel->setActiveSheetIndex(0);

        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');

        print '<table class="table table-striped table-advance table-hover"><tr>';
            print "<th>Matricule Enfant</th>";
            print "<th>Matricule SAD</th>"; 
            print "<th>Nom</th>"; 
            print "<th>Prenom</th>";
            print "<th>Sexe</th>";
            print " <th>Date de Naissance</th>";
            print "<th>Date d'envoye en Italie</th>";
            print "<th>Date d'adhesion</th>";
            print "<th>Frequence de payement</th>";
            print "<th>Adopt Progressive</th>";
            print "<th>Observation</th>";
        print "</tr>";
        // set Row

        foreach ($list_sads as $sad) {
            print "<tr>";
                print "<td>".$sad['num_matricule_enf']."</td>";
                print "<td>".$sad['num_matricule_sad']."</td>";
                print "<td>".$sad['nom']."</td>";
                print "<td>".$sad['prenom']."</td>";
                print "<td>".$sad['sexe']."</td>";
                print "<td>".$sad['date_naissance']."</td>";
                print "<td>".$sad['date_envoye_en_Italie']."</td>";
                print "<td>".$sad['date_adhesion']."</td>";
                print "<td>".$sad['frequence_de_payement']."</td>";
                print "<td>".$sad['adopt_progressive']."</td>";
                print "<td>".$sad['observation']."</td>";
            print "</tr>";
        }
        print "</table>";
    }

    // exporter les donnees des enfants par etat actuel
    public function exporter_enfants($id_etat) {
        // create file name
        $filename = "Liste des enfants ". date("d-m-Y H-i").".xls"; 
        // load excel library
        // $this->load->library('excel');
        $list_enfants;
        if ($id_etat == '') {
            $list_enfants = $this->Enfant_model->liste_tous_enfants();
        } else {
            $list_enfants = $this->Enfant_model->get_enfants_by_etat($id_etat);
        }
        // $objPHPExcel = new PHPExcel();
        // $objPHPExcel->setActiveSheetIndex(0);

        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');

        print '<table class="table table-striped table-advance table-hover"><tr>';
            print "<td>MATRICULE ENFANT</td>";
            print "<td>NOM</td>"; 
            print "<td>PRENOM</td>"; 
            print "<td>SEXE</td>";
            print "<td>ACTIVIT&Eacute;</td>";
            print "<td>MATRICULE MERE</td>";
            print "<td>NOM MERE</td>";
            print "<td>PR&Eacute;NOM MERE</td>";
            print "<td>&Eacute;TAT ACTU</td>";
            print "<td>MATRICULE SAD</td>";
        print "</tr>";
        // set Row

        foreach ($list_enfants as $list) {
            print "<tr>";
                print "<td>".$list['num_matricule_enf']."</td>";
                print "<td>".$list['nom_enf']."</td>";
                print "<td>".$list['prenom_enf']."</td>";
                print "<td>".$list['sexe']."</td>";
                print "<td>".$list['activite']."</td>";
                print "<td>".$list['num_matricule_mer']."</td>";
                print "<td>".$list['nom_mere']."</td>";
                print "<td>".$list['prenom_mere']."</td>";
                print "<td>".$list['etat']."</td>";
                print "<td>".$list['num_matricule_sad']."</td>";
            print "</tr>";
        }
        print "</table>";
    }
    












     // create xlsx
    // public function exporter_enfants() {
    //     // create file name
    //     $filename = "Liste des enfants ". date("d-m-Y H-i").".csv"; 
    //     // load excel library
    //     $this->load->library('excel');

    //     $list_enfants = $this->Enfant_model->liste_tous_enfants();
    //     $objPHPExcel = new PHPExcel();
    //     $objPHPExcel->setActiveSheetIndex(0);

    //     // set Header
    //     $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Matricule Enfant');
    //     $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Nom');
    //     $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Prenom');
    //     $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Sexe');
    //     $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Activite');       
    //     $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Matricule Mere');       
    //     $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Nom Mere');       
    //     $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Prenom Mere');       
    //     $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Etat actuel');       
    //     $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Matricule SAD');       
    //     // set Row

    //     // echo  "<pre> objPHPExcel : ";print_r($objPHPExcel);echo "</pre>";

    //     $rowCount = 2;
    //     foreach ($list_enfants as $list) {
    //         $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list['num_matricule_enf']);
    //         $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list['nom_enf']);
    //         $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list['prenom_enf']);
    //         $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list['sexe']);
    //         $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list['activite']);
    //         $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $list['num_matricule_mer']);
    //         $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $list['nom_mere']);
    //         $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $list['prenom_mere']);
    //         $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $list['etat']);
    //         $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $list['num_matricule_sad']);
    //         $rowCount++;
    //     }
        
    //     header('Content-Type: application/vnd.ms-excel'); 
    //     header('Content-Disposition: attachment;filename="'.$filename.'"');
    //     header('Cache-Control: max-age=0'); 
    //     $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
    //     $objWriter->save('php://output'); 
    // }
}
?>