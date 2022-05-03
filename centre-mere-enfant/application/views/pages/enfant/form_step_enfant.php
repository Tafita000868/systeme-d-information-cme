
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
              <h4 class="title-form">Renseignements sur l'enfant</h4>

              <div class="row">
                <div class="col-lg-6">

                    <div class="form-group">
                      <label for="num_matricule" class="marge-form control-label col-lg-6">Numero matricule (ID Enfant) *</label>
                        <div class="col-lg-5">
                        <input class="form-control" id="num_matricule" type="text" name="num_matricule" 
                        value="<?php echo isset($enfant['num_matricule']) ? $enfant['num_matricule'] : ''; ?>"  />
                        <?php if (isset($message['num_matricule'])) { ?>
                          <div class="erreur-form" >
                              <?php echo $message['num_matricule']; ?>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="num_matricule_mere" class="marge-form control-label col-lg-6">Numero matricule (ID Mere) *</label>
                        <div class="col-lg-5">
                        <input class="form-control" id="num_matricule_mere" type="text" name="num_matricule_mere" 
                        value="<?php echo isset($mere['num_matricule']) ? $mere['num_matricule'] : ''; ?>"  />
                        <?php if (isset($message['num_matricule_mere'])) { ?>
                          <div class="erreur-form" >
                              <?php echo $message['num_matricule_mere']; ?>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="nom" class="marge-form control-label col-lg-5">Noms *</label>
                      <div class="col-lg-6">
                        <input class="form-control" id="nom" type="text" 
                        name="nom" 
                        value="<?php echo isset($enfant['nom']) ? $enfant['nom'] : ''; ?>"  />
                          <?php if (isset($message['nom'])) { ?>
                            <div class="erreur-form" >
                                <?php echo $message['nom']; ?>
                            </div>
                          <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="prenom" class="marge-form control-label col-lg-5">Prenoms *</label>
                      <div class="col-lg-6">
                        <input class="form-control " id="prenom" type="text" 
                        name="prenom" 
                        value="<?php echo isset($enfant['prenom']) ? $enfant['prenom'] : ''; ?>"  />
                          <?php if (isset($message['prenom'])) { ?>
                            <div class="erreur-form" >
                                <?php echo $message['prenom']; ?>
                            </div>
                          <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="photo" class="marge-form control-label col-lg-2">Photo </label>
                      <div class="col-lg-9">
                        <input type="file" name="photo" class="form-control" id="photo">
                          <?php if (isset($message['photo'])) { ?>
                            <div class="erreur-form" >
                                <?php echo $message['photo']; ?>
                            </div>
                          <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="sexe" class="marge-form control-label col-lg-5">Sexe *</label>
                      <div class="col-lg-6">
                        <label>
                          <input type="radio" 
                          name="sexe" id="masculin" value="H" checked> Homme
                        </label>
                        <label>
                          <input type="radio" 
                          name="sexe" id="feminin" value="F"> Femme
                        </label>
                      </div>
                    </div>  

                  </div>
                  <!-- row/col-lg-6 -->
                  <!-- 
        id_enfant,
        id_mere,
        num_matricule,
        nom,
        prenom,
        date_naissance,
        sexe,
        flDonneesPersonnellesValides,
        id_activite,
        enregistre,
        scolarise,
        photo,
         -->
                  <div class="col-lg-6">

                    <div class="form-group">
                      <label for="date_naissance" class="marge-form control-label col-lg-5">Date de naissance *</label>
                      <div class="col-lg-6">
                        <input class="form-control " id="date_naissance" type="date" 
                        name="date_naissance" 
                        value="<?php echo isset($enfant['date_naissance']) ? $enfant['date_naissance'] : ''; ?>"  />
                          <?php if (isset($message['date_naissance'])) { ?>
                            <div class="erreur-form" >
                                <?php echo $message['date_naissance']; ?>
                            </div>
                          <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="id_activite" class="marge-form control-label col-lg-5">Activité *</label>
                      <div class="col-lg-6">
                        <select name="id_activite" id="id_activite" class="form-control">
                          <?php foreach ($activites as $activite) { ?>
                              <option value="<?php echo $activite['id_activite']; ?>">
                                <?php echo $activite['type']; ?>
                              </option>
                          <?php } ?>
                        </select>
                        <?php if (isset($message['id_activite'])) { ?>
                            <div class="erreur-form" >
                                <?php echo $message['id_activite']; ?>
                            </div>
                          <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="flDonneesPersonnellesValides" class="marge-form control-label col-lg-5">Validation de donnée </label>
                      <div class="col-lg-6">
                        <input class="form-control " id="flDonneesPersonnellesValides" type="number" min="0" max="1" 
                        name="flDonneesPersonnellesValides" 
                        value="<?php echo isset($enfant['flDonneesPersonnellesValides']) ? $enfant['flDonneesPersonnellesValides'] : 0; ?>"  />
                          <?php if (isset($message['flDonneesPersonnellesValides'])) { ?>
                            <div class="erreur-form" >
                                <?php echo $message['flDonneesPersonnellesValides']; ?>
                            </div>
                          <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="id_etat" class="marge-form control-label col-lg-5">Etat actuel *</label>
                      <div class="col-lg-6">
                        <select name="id_etat" id="id_etat" class="form-control">
                          <?php foreach ($etats as $etat) { ?>
                            <option value="<?php echo $etat['id_etat']; ?>">
                              <?php echo $etat['description']; ?>
                            </option>
                          <?php } ?>
                        </select>
                        <?php if (isset($message['id_etat'])) { ?>
                          <div class="erreur-form" >
                            <?php echo $message['id_etat']; ?>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="scolarise" class="marge-form control-label col-lg-5">Scolarié </label>
                      <div class="col-lg-6">
                        <input class="form-control " id="scolarise" type="number" min="0" max="1" 
                        name="scolarise" 
                        value="<?php echo isset($enfant['scolarise']) ? $enfant['scolarise'] : ''; ?>"  />
                          <?php if (isset($message['scolarise'])) { ?>
                            <div class="erreur-form" >
                                <?php echo $message['scolarise']; ?>
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
