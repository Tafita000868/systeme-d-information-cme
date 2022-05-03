

<?php 
    $connected = isset($_SESSION['connected']) ? $_SESSION['connected'] : '';
    // echo  "<pre>";print_r($links);echo "</pre>";
?>
		

<?php $this->load->view('pages/administrateur/menu_admin'); ?>

<section id="main-content">
  <section class="wrapper">

    <?php $this->load->view('pages/recherche/form_recherche'); ?>
    
  	<div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">

            <?php if (isset($enfants)) { ?>

             	<?php $this->load->view('pages/recherche/resultats_enfants'); ?>

		    <?php } ?>

		    <?php if (isset($meres)) { ?>

             	<?php $this->load->view('pages/recherche/resultats_meres'); ?>

		    <?php } ?>

		    <?php if (isset($sads)) { ?>

             	<?php $this->load->view('pages/recherche/resultats_sad'); ?>

		    <?php } ?>

            </div>
            <!-- /content-panel -->
        </div>

  </section>
</section>



