
<?php
  // if (isset($mere)) {
  //   echo "<pre>";print_r($mere);echo "</pre>";
  // }
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
    ** [id_mere] => 1
    [nom] => Randert
    [prenom] => Max
    [sexe] => F
    [date_naissance] => 2000-01-01
       -->

            <!-- <input type="hidden" name="id_mere" value="<?php //echo isset($mere['id_mere']) ? $mere['id_mere'] : ''; ?>"  /> -->

            <div class="tab"> 
              <div class="row">
                <h4 class="title-form">Renseignements sur la mère</h4>
                <div class="col-lg-6">
                    
                    <div class="form-group">
                      <label for="num_matricule" class="marge-form control-label col-lg-6">Numero matricule (ID Mère) *</label>
                        <div class="col-lg-5">
                        <input class="form-control" id="num_matricule" type="text" 
                        name="num_matricule" 
                        value="<?php echo isset($mere['num_matricule']) ? $mere['num_matricule'] : ''; ?>"  />
                        <?php if (isset($message['num_matricule'])) { ?>
                          <div class="erreur-form" >
                              <?php echo $message['num_matricule']; ?>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="nom" class="marge-form control-label col-lg-5">Noms *</label>
                        <div class="col-lg-6">
                        <input class="form-control" id="nom" type="text" name="nom" 
                        value="<?php echo isset($mere['nom']) ? $mere['nom'] : ''; ?>"  />
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
                        <input class="form-control" id="prenom" type="text" 
                        name="prenom" 
                        value="<?php echo isset($mere['prenom']) ? $mere['prenom'] : ''; ?>" />
                        <?php if (isset($message['prenom'])) { ?>
                          <div class="erreur-form">
                              <?php echo $message['prenom']; ?>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="date_naissance" class="marge-form control-label col-lg-5">Date de naissance *</label>
                      <div class="col-lg-6">
                        <input class="form-control " id="date_naissance" type="date" 
                        name="date_naissance" 
                        value="<?php echo isset($mere['date_naissance']) ? $mere['date_naissance'] : ''; ?>" />
                        <?php if (isset($message['date_naissance'])) { ?>
                          <div class="erreur-form" >
                              <?php echo $message['date_naissance']; ?>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="sexe" class="marge-form control-label col-lg-5">Sexe *</label>
                      <div class="col-lg-6">
                        <label>
                          <input type="radio" 
                          name="sexe" id="feminin" value="F" checked> Femme
                        </label>
                      </div>
                    </div>  

                </div>
                <!-- row/col-lg-6 -->
          <!-- 
    [adresse] => Lot IB 21 sjhs
     ** [statu_pmer] => MERE
    [num_tel] => 034 61 598
    [num_tel_ext] => 
    [lien_ext] => 
     -->
                <div class="col-lg-6">

                    <div class="form-group">
                      <label for="Adresse" class="marge-form control-label col-lg-5">Adresse *</label>
                      <div class="col-lg-6">
                        <input class="form-control " id="Adresse" type="text" 
                        name="adresse" 
                        value="<?php echo isset($mere['adresse']) ? $mere['adresse'] : ''; ?>" />
                        <?php if (isset($message['adresse'])) { ?>
                          <div class="erreur-form" >
                              <?php echo $message['adresse']; ?>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="numTel" class="marge-form control-label col-lg-5">Numero de téléphone </label>
                      <div class="col-lg-6">
                        <input class="form-control " id="numTel" type="text" 
                        name="num_tel" 
                        value="<?php echo isset($mere['num_tel']) ? $mere['num_tel'] : ''; ?>"/>
                        <?php if (isset($message['num_tel'])) { ?>
                          <div class="erreur-form" >
                              <?php echo $message['num_tel']; ?>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="numTel" class="marge-form control-label col-lg-5">Numero de téléphone exterieur</label>
                      <div class="col-lg-6">
                        <input class="form-control " id="numTelExt" type="text" 
                        name="num_tel_ext" 
                        value="<?php echo isset($mere['num_tel_ext']) ? $mere['num_tel_ext'] : ''; ?>"/>
                        <?php if (isset($message['num_tel_ext'])) { ?>
                          <div class="erreur-form" >
                              <?php echo $message['num_tel_ext']; ?>
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
                </div>
                <!-- /col-lg-6 -->
              </div> 
              <!-- /row -->
            </div>  
            <!-- /tab -->

            
      <!-- 
    [situation_matrimoniale] => Marie
    [nb_enfant] => 4
    [revenu_mere] => 0
       -->

            <div class="tab"> 
              <div class="row">
                <div class="col-lg-6">
                    
                    <h4 class="title-form">Suite d'information</h4>
                    <div class="form-group">
                      <label for="numTel" class="marge-form control-label col-lg-5">Lien exterieur </label>
                      <div class="col-lg-6">
                        <input class="form-control " id="lien_ext" type="text" 
                        name="lien_ext" 
                        value="<?php echo isset($mere['lien_ext']) ? $mere['lien_ext'] : ''; ?>"/>
                        <?php if (isset($message['lien_ext'])) { ?>
                          <div class="erreur-form" >
                              <?php echo $message['lien_ext']; ?>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="situation_matrimoniale" class="marge-form control-label col-lg-5">Situation matrimoniale * </label>
                      <div class="col-lg-6">
                        <input class="form-control " id="situation_matrimoniale" type="text" 
                        name="situation_matrimoniale" 
                        value="<?php echo isset($mere['situation_matrimoniale']) ? $mere['situation_matrimoniale'] : ''; ?>"/>
                        <?php if (isset($message['situation_matrimoniale'])) { ?>
                          <div class="erreur-form" >
                              <?php echo $message['situation_matrimoniale']; ?>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="enf_charge" class="marge-form control-label col-lg-5">Nombre d'enfant en charge</label>
                      <div class="col-lg-6">
                        <input class="form-control " id="enf_charge" type="number" min="0"
                        name="nb_enfant" 
                        value="<?php echo isset($mere['nb_enfant']) ? $mere['nb_enfant'] : '0'; ?>"/>
                        <?php if (isset($message['nb_enfant'])) { ?>
                          <div class="erreur-form" >
                              <?php echo $message['nb_enfant']; ?>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="revenu_mere" class="marge-form control-label col-lg-5">Revenu de la mere (Ar/mois) </label>
                      <div class="col-lg-6">
                        <input class="form-control " id="revenu_mere" type="text" 
                        name="revenu_mere"
                        value="<?php echo isset($mere['revenu_mere']) ? $mere['revenu_mere'] : ""; ?>"/>
                        <?php if (isset($message['revenu_mere'])) { ?>
                          <div class="erreur-form" >
                              <?php echo $message['revenu_mere']; ?>
                          </div>
                        <?php } ?>
                      </div>
                    </div>

                </div>
                <!-- row/col-lg-6 -->
<!-- 
    [cin_num] => 
    [cin_date_delivrance] => 
    [cin_lieu_delivrance] => 
    [acte_naissance] =>
-->
                <div class="col-lg-6">

                    <h4 class="title-form">Carte d'Identité Nationale (C.I.N.) </h4>
                    <div class="form-group">
                      <label for="cin_num" class="marge-form control-label col-lg-5">Numero (C.I.N.) </label>
                      <div class="col-lg-6">
                        <input class="form-control " id="cin_num" type="text" 
                        name="cin_num" 
                        value="<?php echo isset($mere['cin_num']) ? $mere['cin_num'] : ''; ?>"/>
                        <?php if (isset($message['cin_num'])) { ?>
                          <div class="erreur-form" >
                              <?php echo $message['cin_num']; ?>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="cin_lieu_delivrance" class="marge-form control-label col-lg-5">Lieu de délivrance (C.I.N.)</label>
                      <div class="col-lg-6">
                        <input class="form-control " id="cin_lieu_delivrance" type="text" 
                        name="cin_lieu_delivrance" 
                        value="<?php echo isset($mere['cin_lieu_delivrance']) ? $mere['cin_lieu_delivrance'] : ''; ?>"/>
                        <?php if (isset($message['cin_lieu_delivrance'])) { ?>
                          <div class="erreur-form" >
                              <?php echo $message['cin_lieu_delivrance']; ?>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="cin_date_delivrance" class="marge-form control-label col-lg-5">Date de délivrance (C.I.N.)</label>
                      <div class="col-lg-6">
                        <input class="form-control " id="cin_date_delivrance" type="date" 
                        name="cin_date_delivrance" 
                        value="<?php echo isset($mere['cin_date_delivrance']) ? $mere['cin_date_delivrance'] : ''; ?>" />
                        <?php if (isset($message['cin_date_delivrance'])) { ?>
                          <div class="erreur-form" >
                              <?php echo $message['cin_date_delivrance']; ?>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="acte_naissance" class="marge-form control-label col-lg-5">Acte de naissance</label>
                      <div class="col-lg-6">
                        <input class="form-control " id="acte_naissance" type="text" 
                        name="acte_naissance" 
                        value="<?php echo isset($mere['acte_naissance']) ? $mere['acte_naissance'] : ''; ?>" />
                        <?php if (isset($message['acte_naissance'])) { ?>
                          <div class="erreur-form" >
                              <?php echo $message['acte_naissance']; ?>
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

            <!-- 
    [nom_conjoint] => 
    [date_naissance_conjoint] => 
    [poste_conjoint] => 
    [revenu_conjoint] => 
    [depense_mensuel] => 4212 
            -->

            <div class="tab"> 
              <div class="row">
                <h4 class="title-form">Conjoint </h4>
                <div class="col-lg-6">
                  
                    <div class="form-group">
                      <label for="nom_conjoint" class="marge-form control-label col-lg-5">Nom du conjoint</label>
                      <div class="col-lg-6">
                        <input class="form-control " id="nom_conjoint" type="text" 
                        name="nom_conjoint" 
                        value="<?php echo isset($mere['nom_conjoint']) ? $mere['nom_conjoint'] : ''; ?>"/>
                        <?php if (isset($message['nom_conjoint'])) { ?>
                          <div class="erreur-form" >
                              <?php echo $message['nom_conjoint']; ?>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="date_naissance_conjoint" class="marge-form control-label col-lg-5">Date de naissance</label>
                      <div class="col-lg-6">
                        <input class="form-control " id="date_naissance_conjoint" type="date" 
                        name="date_naissance_conjoint" 
                        value="<?php echo isset($mere['date_naissance_conjoint']) ? $mere['date_naissance_conjoint'] : ''; ?>" />
                        <?php if (isset($message['date_naissance_conjoint'])) { ?>
                          <div class="erreur-form" >
                              <?php echo $message['date_naissance_conjoint']; ?>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="poste_conjoint" class="marge-form control-label col-lg-5"> Poste du conjoint</label>
                      <div class="col-lg-6">
                        <input class="form-control " id="poste_conjoint" type="text" 
                        name="poste_conjoint" 
                        value="<?php echo isset($mere['poste_conjoint']) ? $mere['poste_conjoint'] : ''; ?>"/>
                        <?php if (isset($message['poste_conjoint'])) { ?>
                          <div class="erreur-form" >
                              <?php echo $message['poste_conjoint']; ?>
                          </div>
                        <?php } ?>
                      </div>
                    </div>

                </div>
                <!-- row/col-lg-6 -->
             
                <div class="col-lg-6">
                    <div class="form-group">
                      <label for="revenu_conjoint" class="marge-form control-label col-lg-5">Revenu du conjoint (Ar/mois)</label>
                      <div class="col-lg-6">
                        <input class="form-control " id="revenu_conjoint" type="text" 
                        name="revenu_conjoint" 
                        value="<?php echo isset($mere['revenu_conjoint']) ? $mere['revenu_conjoint'] : ''; ?>"/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="depense_mensuel" class="marge-form control-label col-lg-5">Depense mensuel (Ar/mois)</label>
                      <div class="col-lg-6">
                        <input class="form-control " id="depense_mensuel" type="text" 
                        name="depense_mensuel" 
                        value="<?php echo isset($mere['depense_mensuel']) ? $mere['depense_mensuel'] : ''; ?>"/>
                      </div>
                    </div>
                    

                </div>
                <!-- /col-lg-6 -->
              </div> 
              <!-- /row -->
            </div>  
            <!-- /tab -->
                    
                    
                    
                    
            