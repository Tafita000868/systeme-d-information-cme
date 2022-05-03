

<?php 
    $connected = isset($_SESSION['connected']) ? $_SESSION['connected'] : '';
    // echo  "<pre>";print_r($matieres);echo "</pre>";
?>
              <div class="panel-heading">
                <ul class="nav nav-tabs nav-justified">
                  <li class="active">
                    <a data-toggle="tab" href="#panel_scolarisation"> Scolarisation </a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#panel_pointage"> Pointage</a>
                  </li>
                  <?php if (isset($connected) && $connected['id_metier'] <= 7) { ?>
                  <li>
                    <a data-toggle="tab" href="#panel_suivi_beneficiaire"> Suivi bénéficiaire</a>
                  </li>
                  <li>
                    <a class="alert-warning" href="<?php echo base_url('enfant/modification-'.$enfant['id_enfant'].'.html'); ?>">
                      <i class="fa fa-pencil"></i> Modifier le Profil
                    </a>
                  </li>
                  <?php } ?>
                   
                </ul>
              </div>
              <!-- /panel-heading -->


