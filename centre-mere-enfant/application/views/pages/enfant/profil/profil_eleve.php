

<?php 
    $connected = isset($_SESSION['connected']) ? $_SESSION['connected'] : '';
    // echo  "<pre> enfant : ";print_r($enfant);echo "</pre>";
    // echo  "<pre> historiques: ";print_r($historiques);echo "</pre>";
    // echo  "<pre> activite: ";print_r($activite);echo "</pre>";
    // echo  "<pre> mere: ";print_r($mere);echo "</pre>";
?>

<?php $this->load->view('pages/administrateur/menu_admin'); ?>

<section id="main-content">
  <section class="wrapper">

    <div class="row mt">

      <?php if (isset($enfant)) { ?>
          <!--  entete profil : renseignement sur l'eleve -->
          <?php $this->load->view('pages/enfant/profil/head_renseignement'); ?>

          <!-- /col-lg-12 -->
          <div class="col-lg-12 mt">
            <div class="row content-panel">

              <?php $this->load->view('pages/enfant/profil/head_body_rens_admin'); ?>

              <div class="panel-body">
                <div class="tab-content">  

                  <?php $this->load->view('pages/enfant/profil/panel_scolarisation'); ?>
                  <?php $this->load->view('pages/enfant/profil/panel_pointage'); ?>
                  <?php $this->load->view('pages/enfant/profil/panel_suivi_beneficiaire'); ?>
                  <!-- tab-pane -->

                </div>
              </div>

            </div>
          </div>

      <?php } else { ?>
          <div class="alert alert-warning" role="alert">
              Impossible de lire des informations concernant un enfant introuvable
          </div>
      <?php } ?>

    </div>

  </section>
</section>

