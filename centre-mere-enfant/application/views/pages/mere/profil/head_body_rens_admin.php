<?php 
    $connected = isset($_SESSION['connected']) ? $_SESSION['connected'] : '';
    // echo  "<pre>";print_r($connected);echo "</pre>";
?>
              <div class="panel-heading">
                <ul class="nav nav-tabs nav-justified">
                  <li class="active">
                    <a data-toggle="tab" href="#panel_detail">Plus d'information</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#panel_enfants_charge">Enfants en charge</a>
                  </li>

                  <?php if (isset($connected) && $connected['id_metier'] <= 7) { ?>
                  <li>
                    <a class="alert-warning" href="<?php echo base_url('mere/modification-'.$mere['id_mere'].'.html'); ?>">
                      <i class="fa fa-pencil"></i> Modifier le Profil
                    </a>
                  </li>
                  <?php } ?>
                </ul>
              </div>
              <!-- /panel-heading -->
