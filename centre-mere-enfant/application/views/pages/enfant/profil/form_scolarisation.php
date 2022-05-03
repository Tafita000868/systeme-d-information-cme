

          <form class="cmxform form-horizontal style-form" style="border-radius: 30px" id="commentForm" method="post" 
          action="<?php echo base_url('enfant/inserer/scolarisation.html'); ?>">
                <input type="hidden" name="id_enfant" value="<?php echo $enfant['id_enfant']; ?>">
                <input type="hidden" name="id_mere" value="<?php echo $enfant['id_mere']; ?>">
                <!-- N° matricule Nom Prénom -->
                <div class="row">
                  <div class="form-row">
                    <td>
                      <div class="form-group">
                        <select name="id_ecole" class="form-control round-form">
                          <?php foreach ($ecoles as $ecole) { ?>
                              <option value="<?php echo $ecole['id_ecole']; ?>">
                                <?php echo $ecole['nom_ecole']; ?>
                              </option>
                          <?php } ?>
                        </select>
                        <?php if (isset($message['id_ecole'])) { ?>
                          <div class="erreur-form" >
                              <?php echo $message['id_ecole']; ?>
                          </div>
                        <?php } ?>
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <select name="id_classe" class="form-control round-form">
                          <?php foreach ($classes as $classe) { ?>
                              <option value="<?php echo $classe['id_classe']; ?>">
                                <?php echo $classe['nom_classe']; ?>
                              </option>
                          <?php } ?>
                        </select>
                        <?php if (isset($message['id_classe'])) { ?>
                          <div class="erreur-form" >
                              <?php echo $message['id_classe']; ?>
                          </div>
                        <?php } ?>
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <input class="form-control round-form" id="annee_scolaire" type="text" name="annee_scolaire" 
                        value="<?php echo isset($scolarisation['annee_scolaire']) ? $scolarisation['annee_scolaire'] : '2021-2022'; ?>"  />
                        <?php if (isset($message['annee_scolaire'])) { ?>
                          <div class="erreur-form" >
                              <?php echo $message['annee_scolaire']; ?>
                          </div>
                        <?php } ?>
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <input class="form-control round-form" id="moyenne" type="text" name="moyenne" 
                        value="<?php echo isset($scolarisation['moyenne']) ? $scolarisation['moyenne'] : '12.3'; ?>"  />
                        <?php if (isset($message['moyenne'])) { ?>
                          <div class="erreur-form" >
                              <?php echo $message['moyenne']; ?>
                          </div>
                        <?php } ?>
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <input class="form-control round-form" id="evaluation" type="text" name="evaluation" 
                        value="<?php echo isset($scolarisation['evaluation']) ? $scolarisation['evaluation'] : ''; ?>"  />
                        <?php if (isset($message['evaluation'])) { ?>
                          <div class="erreur-form" >
                              <?php echo $message['evaluation']; ?>
                          </div>
                        <?php } ?>
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <input class="form-control round-form" id="annee_ratee" type="text" name="annee_ratee" 
                        value="<?php echo isset($scolarisation['annee_ratee']) ? $scolarisation['annee_ratee'] : ''; ?>"  />
                        <?php if (isset($message['annee_ratee'])) { ?>
                          <div class="erreur-form" >
                              <?php echo $message['annee_ratee']; ?>
                          </div>
                        <?php } ?>
                      </div>
                    </td>
                    <td>
                      <button type="submit" class="btn btn-radius">Insérer</button>
                    </td>
                  </div>
                  <!-- /form-row -->
                </div>
                <!-- /row -->
              </form>