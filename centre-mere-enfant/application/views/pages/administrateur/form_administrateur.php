<?php
      //  if (isset($message)) { if($message!=null) { 
      //   echo  "<pre>";print_r($message);echo "</pre>";
      // } }
?>


          <?php if (isset($message)) { if($message!=null) { if ($message['status']!=200) { ?>
            <div class="alert alert-danger">
                <b>Erreur: </b><?php echo $message['action']; ?>
            </div>
          <?php } else { ?>
            <div class="alert alert-succes">
                <b>Message: </b><?php echo $message['action']; ?>
            </div>
          <?php } } } ?>
            <!-- 
             id_admin | type | date_debut | date_fin -->
          <div class="tab"> 
            <?php if (isset($administrateur['id_admin'])) { ?>
              <input type="hidden" name="id_admin" value="<?php echo $administrateur['id_admin']; ?>">
            <?php } ?>
            
          
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                      <label for="num_matricule" class="marge-form control-label col-lg-6">Numero matricule Admin *</label>
                        <div class="col-lg-5">
                        <input class="form-control" id="num_matricule" type="text" name="num_matricule" 
                        value="<?php echo isset($administrateur['num_matricule']) ? $administrateur['num_matricule'] : ''; ?>"  />
                        <?php if (isset($message['num_matricule'])) { ?>
                          <div class="erreur-form" >
                              <?php echo $message['num_matricule']; ?>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="nom" class="marge-form control-label col-lg-5">Nom *</label>
                        <div class="col-lg-6">
                          <input class="form-control " id="nom" type="text" name="nom" value="<?php echo isset($administrateur['nom']) ? $administrateur['nom'] : ''; ?>" />
                          <?php if (isset($message['nom'])) { ?>
                            <div class="erreur-form" >
                                <?php echo $message['nom']; ?>
                            </div>
                          <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="prenom" class="marge-form control-label col-lg-5">Prénom *</label>
                        <div class="col-lg-6">
                          <input class="form-control " id="prenom" type="text" name="prenom" value="<?php echo isset($administrateur['prenom']) ? $administrateur['prenom'] : ''; ?>" />
                          <?php if (isset($message['prenom'])) { ?>
                            <div class="erreur-form" >
                                <?php echo $message['prenom']; ?>
                            </div>
                          <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="id_metier" class="marge-form control-label col-lg-3">Métier *</label>
                      <div class="col-lg-8">
                        <select name="id_metier" id="id_metier" class="form-control">
                          <?php foreach ($metiers as $metier) { ?>
                              <option value="<?php echo $metier['id_metier']; ?>">
                                <?php echo $metier['titre'].' => '.$metier['role']; ?>
                              </option>
                          <?php } ?>
                        </select>
                        <?php if (isset($message['id_metier'])) { ?>
                            <div class="erreur-form" >
                                <?php echo $message['id_metier']; ?>
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
                <!-- /col-lg-6 -->
                <div class="col-lg-6">
                    <div class="form-group">
                      <label for="id_etat" class="marge-form control-label col-lg-5">Etat *</label>
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
                        <label for="id_siege" class="marge-form control-label col-lg-5">Numero de siège *</label>
                        <div class="col-lg-6">
                          <input class="form-control " id="id_siege" type="number" min="0" name="id_siege" value="<?php echo isset($administrateur['id_siege']) ? $administrateur['id_siege'] : ''; ?>" />
                          <?php if (isset($message['id_siege'])) { ?>
                            <div class="erreur-form" >
                                <?php echo $message['id_siege']; ?>
                            </div>
                          <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="login" class="marge-form control-label col-lg-5">Email *</label>
                        <div class="col-lg-6">
                          <input class="form-control " id="login" type="text" name="login" value="<?php echo isset($administrateur['login']) ? $administrateur['login'] : ''; ?>" />
                          <?php if (isset($message['login'])) { ?>
                            <div class="erreur-form" >
                                <?php echo $message['login']; ?>
                            </div>
                          <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mdp" class="marge-form control-label col-lg-5">Mot de passe *</label>
                        <div class="col-lg-6">
                          <input class="form-control " id="mdp" type="text" name="mdp" value="<?php echo isset($administrateur['mdp']) ? $administrateur['mdp'] : ''; ?>" />
                          <?php if (isset($message['mdp'])) { ?>
                            <div class="erreur-form" >
                                <?php echo $message['mdp']; ?>
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