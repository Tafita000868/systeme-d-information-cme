

<?php 
    $connected = isset($_SESSION['connected']) ? $_SESSION['connected'] : '';
    // echo  "<pre>";print_r($connected);echo "</pre>";
?>

<?php $this->load->view('pages/administrateur/menu_admin'); ?>

<section id="main-content">
  <section class="wrapper">
    
    <div class="row mt">
      
      <?php if (isset($mere)) { ?>
        <!--  entete profil : renseignement sur l'mere -->
        <?php $this->load->view('pages/mere/profil/head_renseignement'); ?>

        <!-- /col-lg-12 -->
          <div class="col-lg-12 mt">
            
            <div class="row content-panel">

              <?php $this->load->view('pages/mere/profil/head_body_rens_admin'); ?>

              <div class="panel-body">
                <div class="tab-content">  

                  <?php $this->load->view('pages/mere/profil/panel_detail'); ?>
                  <!-- tab-pane /panel_detail -->
                  <?php $this->load->view('pages/mere/profil/panel_enfants_charge'); ?>
                  <!-- tab-pane /panel_enfants_charge -->

                </div>
              </div>

            </div>
          </div>

      <?php } else { ?>
          <div class="alert alert-danger">
              Impossible de lire des informations concernant un mere introuvable
          </div>
      <?php } ?>

    </div>

  </section>
</section>

