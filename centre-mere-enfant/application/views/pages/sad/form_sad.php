
<!-- FORM VALIDATION -->
        <?php if (isset($message)) { if($message!=null) { if ($message['status']!=200) { ?>
          <div class="alert alert-danger">
              <b>Erreur: </b><?php echo $message['action']; ?>
          </div>
        <?php } else { ?>
          <div class="alert alert-succes">
              <b>Message: </b><?php echo $message['action']; ?>
          </div>
        <?php } } } ?>
                  
            <div class="tab"> 
              <div class="row">
                

                <div class="col-lg-6">

<!-- 
    cme_sad.num_matricule
    cme_sad.id_enfant
    cme_sad.id_donateur
    cme_sad.adopt_progressive
    cme_sad.date_debut 
    cme_sad.date_fin
-->
                    <div class="form-group">
                      <label for="num_matricule_enf" class="marge-form control-label col-lg-6">Numero matricule (Enfant) *</label>
                        <div class="col-lg-5">
                        <input class="form-control" id="num_matricule_enf" type="text" name="num_matricule_enf" 
                        value="<?php echo isset($sad['num_matricule_enf']) ? $sad['num_matricule_enf'] : ''; ?>"  />
                        <?php if (isset($message['num_matricule_enf'])) { ?>
                          <div class="erreur-form" >
                              <?php echo $message['num_matricule_enf']; ?>
                          </div>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="num_matricule_sad" class="marge-form control-label col-lg-6">Numero matricule (SAD) *</label>
                        <div class="col-lg-5">
                        <input class="form-control" id="num_matricule_sad" type="text" name="num_matricule_sad" 
                        value="<?php echo isset($sad['num_matricule_sad']) ? $sad['num_matricule_sad'] : ''; ?>"  />
                        <?php if (isset($message['num_matricule_sad'])) { ?>
                          <div class="erreur-form" >
                              <?php echo $message['num_matricule_sad']; ?>
                          </div>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="adopt_progressive" class="marge-form control-label col-lg-6">Adoption progressive</label>
                        <div class="col-lg-5">
                        <input class="form-control" name="adopt_progressive" id="adopt_progressive" type="number" min="0" max="1"
                        value="<?php echo isset($sad['adopt_progressive']) ? $sad['adopt_progressive'] : ''; ?>"  />
                        <?php if (isset($message['adopt_progressive'])) { ?>
                          <div class="erreur-form" >
                              <?php echo $message['adopt_progressive']; ?>
                          </div>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="id_donateur" class="marge-form control-label col-lg-6">Id donateur</label>
                        <div class="col-lg-5">
                        <input class="form-control" name="id_donateur" id="id_donateur" type="number" min="0"
                        value="<?php echo isset($sad['id_donateur']) ? $sad['id_donateur'] : ''; ?>"  />
                        <?php if (isset($message['id_donateur'])) { ?>
                          <div class="erreur-form" >
                              <?php echo $message['id_donateur']; ?>
                          </div>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="date_debut" class="marge-form control-label col-lg-5">Date de début *</label>
                      <div class="col-lg-6">
                        <input class="form-control " id="date_debut" type="date" 
                        name="date_debut" 
                        value="<?php echo isset($sad['date_debut']) ? $sad['date_debut'] : ''; ?>"  />
                          <?php if (isset($message['date_debut'])) { ?>
                            <div class="erreur-form" >
                                <?php echo $message['date_debut']; ?>
                            </div>
                          <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="date_fin" class="marge-form control-label col-lg-5">Date de fin</label>
                      <div class="col-lg-6">
                        <input class="form-control " id="date_fin" type="date" 
                        name="date_fin" 
                        value="<?php echo isset($sad['date_fin']) ? $sad['date_fin'] : ''; ?>"  />
                          <?php if (isset($message['date_fin'])) { ?>
                            <div class="erreur-form" >
                                <?php echo $message['date_fin']; ?>
                            </div>
                          <?php } ?>
                      </div>
                    </div>
                    

                  </div>
                  <!-- row/col-lg-6 -->
<!-- 
    cme_sad.frequence_de_payement
    cme_sad.date_envoye_en_Italie
    cme_sad.date_recu_payement
    cme_sad.observation
    cme_sad.date_adhesion
-->
                  <div class="col-lg-6">

                    <div class="form-group">
                      <label for="frequence_de_payement" class="marge-form control-label col-lg-5">Fréquence de payement</label>
                      <div class="col-lg-6">
                        <input class="form-control " id="frequence_de_payement" type="text" 
                        name="frequence_de_payement" 
                        value="<?php echo isset($sad['frequence_de_payement']) ? $sad['frequence_de_payement'] : ''; ?>"  />
                          <?php if (isset($message['frequence_de_payement'])) { ?>
                            <div class="erreur-form" >
                                <?php echo $message['frequence_de_payement']; ?>
                            </div>
                          <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="date_envoye_en_Italie" class="marge-form control-label col-lg-5">Date d'envoye en Italie</label>
                      <div class="col-lg-6">
                        <input class="form-control " id="date_envoye_en_Italie" type="date" 
                        name="date_envoye_en_Italie" 
                        value="<?php echo isset($sad['date_envoye_en_Italie']) ? $sad['date_envoye_en_Italie'] : '01/01/2000'; ?>"  />
                          <?php if (isset($message['date_envoye_en_Italie'])) { ?>
                            <div class="erreur-form" >
                                <?php echo $message['date_envoye_en_Italie']; ?>
                            </div>
                          <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="date_recu_payement" class="marge-form control-label col-lg-5">Date reçu du payement</label>
                      <div class="col-lg-6">
                        <input class="form-control " id="date_recu_payement" type="date" 
                        name="date_recu_payement" 
                        value="<?php echo isset($sad['date_recu_payement']) ? $sad['date_recu_payement'] : '01/01/2000'; ?>"  />
                          <?php if (isset($message['date_recu_payement'])) { ?>
                            <div class="erreur-form" >
                                <?php echo $message['date_recu_payement']; ?>
                            </div>
                          <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="date_adhesion" class="marge-form control-label col-lg-5">Date d'adhesion</label>
                      <div class="col-lg-6">
                        <input class="form-control " id="date_adhesion" type="date" 
                        name="date_adhesion" 
                        value="<?php echo isset($sad['date_adhesion']) ? $sad['date_adhesion'] : '01/01/2000'; ?>"  />
                          <?php if (isset($message['date_adhesion'])) { ?>
                            <div class="erreur-form" >
                                <?php echo $message['date_adhesion']; ?>
                            </div>
                          <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="num_liste" class="marge-form control-label col-lg-5">Numero de liste</label>
                        <div class="col-lg-6">
                        <input class="form-control" id="num_liste" name="num_liste" type="number" min="1"
                        value="<?php echo isset($sad['num_liste']) ? $sad['num_liste'] : ''; ?>"  />
                        <?php if (isset($message['num_liste'])) { ?>
                          <div class="erreur-form" >
                              <?php echo $message['num_liste']; ?>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="observation" class="marge-form control-label col-lg-2">Observation </label>
                      <div class="col-lg-9">
                        <input class="form-control" id="observation" name="observation" rows="4"
                          value="<?php echo isset($sad['observation']) ? $sad['observation'] : ''; ?>">
                        <?php if (isset($message['observation'])) { ?>
                          <div class="erreur-form" >
                              <?php echo $message['observation']; ?>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                  <!-- /col-lg-6 -->
                </div> 
                <!-- /row -->
              </div>  
              <!-- /tab -->
