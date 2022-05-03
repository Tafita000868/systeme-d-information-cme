
<!-- <?php
  // if (isset($mere)) {
  //   echo "<pre>";print_r($mere);echo "</pre>";
  // }
 ?>  -->


<!-- 
[id_mere] => 1
    [nom] => Randert
    [prenom] => Max
    [sexe] => F
    [date_naissance] => 2000-01-01
    [adresse] => Lot IB 21 sjhs
    [statu_pmer] => MERE
    [situation_matrimoniale] => Marie
    [num_tel] => 034 61 598
    [num_tel_ext] => 
    [lien_ext] => 
-->

          <div class="col-lg-12">
            <div class="art-shadow">
                <h3><i class="fa fa-angle-right"></i> PROFIL MERE </h3>
            </div>
            <div class="row content-panel">
              <div class="col-md-4 profile-text mt mb">
                <div class="right-divider hidden-sm hidden-xs">
                  <h3>
                    <?php echo $mere['nom']." ".$mere['prenom']; ?>
                  </h3>
                  <p><strong>Sexe:</strong> <?php echo $mere['sexe']; ?></p>
                  <p><strong>Date de naissance:</strong> <?php echo $mere['date_naissance']; ?></p>
                  <p><strong>Adresse:</strong> <?php echo $mere['adresse']; ?></p>
                  <p><strong>Situation matrimoniale:</strong> <?php echo $mere['situation_matrimoniale']; ?></p>
                  <p><strong>Enfant(s) en charge(s):</strong> <?php echo $mere['nb_enfant']; ?></p>
                </div>
                <!-- /col-md-4 -->
              </div>
              <div class="col-md-4 profile-text mt mb" >
                  <p style="margin-top: 18px;"><strong>Statu :</strong><?php echo $mere['statu_pmer']; ?></p>
                  <p><strong>Validation donnée personnelle:</strong> <?php echo $mere['flDonneesPersonnellesValides']; ?></p>
                  <p><strong>Numero de téléphone:</strong> <?php echo $mere['num_tel']; ?></p>
                  <p><strong>Numero de téléphone exterieur:</strong> <?php echo $mere['num_tel_ext']; ?></p>
                  <p><strong>Lien exterieur:</strong> <?php echo $mere['lien_ext']; ?></p>
                  <p><strong>Revenu éstimé :</strong> <?php echo $mere['revenu_mere']; ?> Ar  / mois</p>
                  <p><strong>Dépense éstimée :</strong> <?php echo $mere['depense_mensuel']; ?> Ar / mois</p>
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 centered">
                <div class="profile-pic">
                  <p><img src="<?php echo base_url('assets/img/ui-divya.jpg'); ?>" class="img-circle"></p>
                  <p>
                    <strong><?php echo $mere['nom']." ".$mere['prenom']; ?></strong>
                  </p>
                  <p>
                    <h2><strong><?php echo $mere['num_matricule']; ?></strong></h2>
                  </p>
                  <p><strong>Etat actuel:</strong> 
                      <?php if ($etat == null || $mere['id_etat'] >= 2) { ?>
                        <span class="label label-danger">
                          <?php echo isset($etat['description'])?$etat['description']:'Non actif'; ?>
                        </span>
                        <?php  } else { ?>
                        <span class="label label-success">
                          <?php echo isset($etat['description'])?$etat['description']:'Non actif'; ?>
                        </span>
                      <?php } ?>
                  </p> 
                </div>
              </div>
              <!-- /col-md-4 -->

            </div>
            <?php if (isset($message)) { if($message!=null) { if ($message['status']!=200) { ?>
              <div class="alert alert-danger">
                  <b>Erreur: </b><?php echo $message['action']; ?>
              </div>
            <?php } else { ?>
              <div class="alert alert-succes">
                  <b>Message: </b><?php echo $message['action']; ?>
              </div>
            <?php } } } ?>
            <!-- /row -->
          </div>

   