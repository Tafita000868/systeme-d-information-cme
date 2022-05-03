<?php 
    $connected = isset($_SESSION['connected']) ? $_SESSION['connected'] : '';
    // echo  "<pre>";print_r($historique);echo "</pre>";
?>




         <div class="col-lg-12">
            <div class="row">
              <div class="col-md-4 profile-text mt mb">
                <div class="right-divider hidden-sm hidden-xs">
                  <h3>
                    Enfant
                  </h3>
                  <p><strong>Nom:</strong>
                    <b style="color: black; font-size: 17px"><?php echo $enfant['nom']." ".$enfant['prenom']; ?></b>
                  </p>
                  <p><strong>Numero matricule de l'enfant:</strong>
                    <b style="color: black; font-size: 17px"><?php echo $enfant['num_matricule']; ?></b>
                  </p>
                  <p><strong>Date de naissance:</strong> <?php echo $enfant['date_naissance']; ?></p>
                  <p><strong>Activité de l'enfant: </strong><b style="color: black; font-size: 17px"><?php echo isset($activite['type'])?$activite['type']:''; ?></b>  </p>
                  <p><strong>Sexe:</strong> <?php echo $enfant['sexe']; ?></p>
                  <p><strong>Enregistré:</strong> <?php echo $enfant['enregistre']; ?></p>
                  <p><strong>Scolarisé:</strong> <?php echo $enfant['scolarise']; ?></p>
                  <p><strong>Validation donnée personnelle:</strong> <?php echo $enfant['flDonneesPersonnellesValides']; ?></p>
                </div>
                <!-- /col-md-4 -->
              </div>
              <div class="col-md-4 profile-text mt mb" >
                <p style="margin-top: 20px;">
                  <h3>
                    Mère
                  </h3>
                </p>
                <p><strong>Nom:</strong>
                  <a href="<?php echo base_url('mere/profil-'.$mere['id_mere'].'.html'); ?>">
                    <b style="color: black; font-size: 17px"><?php echo $mere['nom'].' '.$mere['prenom']; ?></b>
                  </a>
                </p>
                <p><strong>Numero matricule de la mère:</strong>
                  <b style="color: black; font-size: 17px"><?php echo $mere['num_matricule']; ?></b>
                </p>
                <p><strong>Adresse :</strong> <?php echo $mere['adresse']; ?></p>
                <p><strong>Numero de téléphone :</strong> <?php echo $mere['num_tel']; ?></p>
                <p style="margin-top: 20px;">
                  <h3>
                    SAD
                  </h3>
                </p>
                <p><strong>Numero matricule SAD:</strong>
                  <b style="color: black; font-size: 17px">
                    <?php echo isset($sad['num_matricule'])?$sad['num_matricule']:'Non sad'; ; ?>
                  </b>
                </p>
                  

              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 centered">
                <div class="profile-pic">
                  <p><img src="<?php echo base_url('assets/img/ui-sam.jpg'); ?>" class="img-circle"></p>
                  <p>
                    <strong><?php echo $enfant['nom']." ".$enfant['prenom']; ?></strong>
                  </p>
                  <p><strong>Etat actuel de l'enfant:</strong> 

                    <a onclick='get_historique()'>
                      <?php if ($etat == null || $etat['id_etat'] >= 2) { ?>
                        <span class="label label-danger">
                          <?php echo isset($etat['description'])?$etat['description']:'Non actif'; ?>
                        </span>
                        <?php  } else { ?>
                        <span class="label label-success">
                          <?php echo isset($etat['description'])?$etat['description']:'Non actif'; ?>
                        </span>
                      <?php } ?>
                    </a>
                    
                    <?php $this->load->view('pages/enfant/profil/modal_historique'); ?>

                  </p> 
                </div>
              </div>
              <!-- /col-md-4 -->
            </div>
            <!-- /row -->
          </div>

          
          <?php if (isset($message)) { if($message!=null) { if ($message['status']!=200) { ?>
            <div class="col-lg-12">
              <div class="showback">
                <div class="alert alert-danger">
                    <b>Erreur: </b><?php echo $message['action']; ?>
                </div>
              </div>
            </div>  
            <?php } else { ?>
            <!-- <div class="col-lg-12">
              <div class="showback">
                <div class="alert alert-succes">
                    <b>Message: </b><?php// echo $message['action']; ?>
                </div>
              </div>
            </div>  -->
          <?php } } } ?>
            



            