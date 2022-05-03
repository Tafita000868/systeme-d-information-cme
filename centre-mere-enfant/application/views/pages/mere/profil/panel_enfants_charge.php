    <div id="panel_enfants_charge" class="tab-pane">
      <div class="row">

        <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <div class="row"> 

                  <div class="col-md-7">
                    <h4 class="title-table">
                        <i class="fa fa-angle-right"></i> 
                        Liste des enfants en charges
                      </h4>
                  </div>
                  
                </div>
                  <hr>
                  <thead class="thead-dark">
                    <tr>
                      <th>ID Enfant</th>
                      <th>Nom</th>
                      <th>Prénom</th>
                      <th>Sexe</th>
                      <th>Activite</th>
                      <th>Etat actuel</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($enfants as $enfant) {  ?>
                      <tr>
                        <td>
                              <a href="<?php echo base_url('enfant/profil-'.$enfant['id_enfant'].'.html'); ?>">
                                <?php echo $enfant['num_matricule_enf']; ?>
                              </a>
                          </td>
                          <td>
                              <a href="<?php echo base_url('enfant/profil-'.$enfant['id_enfant'].'.html'); ?>">
                                <?php echo $enfant['nom_enf']; ?>
                              </a>
                          </td>
                          <td>
                              <a href="<?php echo base_url('enfant/profil-'.$enfant['id_enfant'].'.html'); ?>">
                                <?php echo $enfant['prenom_enf']; ?>
                              </a>
                          </td>
                          <td><?php echo $enfant['sexe']; ?></td>
                          <td><?php echo $enfant['activite']; ?></td>
                          <td>

                            <?php if ($enfant['id_etat'] == null || $enfant['id_etat'] >= 2) { ?>
                            <div class="label label-danger">
                              <?php echo isset($enfant['etat'])?$enfant['etat']:'Non autorisé'; ?>
                            </div>
                            <?php } else { ?>
                            <div class="label label-success">
                              <?php echo isset($enfant['etat'])?$enfant['etat']:'Non autorisé'; ?>
                            </div>
                            <?php } ?>

                          </td>
                          
                      </tr>
                      <?php } ?>
                  </tbody>

                </table>

            </div>
            <!-- /content-panel -->
        </div>
        <!-- /col-md-12 -->
      </div>
      <!-- /row -->
    </div>
    <!-- /panel_enfants_charge -->