<?php
       // if (isset($message)) { if($message!=null) { 
        // echo  "<pre>";print_r($stock);echo "</pre>";
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
             id_stock | type | date_debut | date_fin -->
          <div class="tab"> 
            <?php if (isset($stock['id_stock'])) { ?>
              <input type="hidden" name="id_stock" value="<?php echo $stock['id_stock']; ?>">
            <?php } ?>
           

<!-- 
cme_stock.id_article
cme_stock.description 
cme_stock.id_unite
cme_stock.qte_sortie
cme_stock.qte_entree
cme_stock.date_action
cme_stock.observation
 -->
          
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                      <label for="id_article" class="marge-form control-label col-lg-3">Article *</label>
                      <div class="col-lg-8">
                        <select name="id_article" id="id_article" class="form-control">
                          <?php foreach ($articles as $article) { ?>
                              <option value="<?php echo $article['id_article']; ?>">
                                <?php echo $article['designation']; ?>
                              </option>
                          <?php } ?>
                        </select>
                        <?php if (isset($message['id_article'])) { ?>
                            <div class="erreur-form" >
                                <?php echo $message['id_article']; ?>
                            </div>
                          <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="description" class="marge-form control-label col-lg-3">Description *</label>
                        <div class="col-lg-8">
                        <input class="form-control" id="description" type="text" name="description" 
                        value="<?php echo isset($stock['description']) ? $stock['description'] : ''; ?>"  />
                        <?php if (isset($message['description'])) { ?>
                          <div class="erreur-form" >
                              <?php echo $message['description']; ?>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="id_unite" class="marge-form control-label col-lg-5">Unité *</label>
                      <div class="col-lg-6">
                        <select name="id_unite" id="id_unite" class="form-control">
                          <?php foreach ($unites as $unite) { ?>
                              <option value="<?php echo $unite['id_unite']; ?>">
                                <?php echo $unite['unite']; ?>
                              </option>
                          <?php } ?>
                        </select>
                        <?php if (isset($message['id_unite'])) { ?>
                            <div class="erreur-form" >
                                <?php echo $message['id_unite']; ?>
                            </div>
                          <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                        <label for="date_action" class="marge-form control-label col-lg-5">Date du mouvement </label>
                        <div class="col-lg-6">
                          <input class="form-control " id="date_action" type="date"
                            name="date_action" value="<?php echo isset($stock['date_action']) ? $stock['date_action'] : ''; ?>" />
                            <?php if (isset($message['date_action'])) { ?>
                              <div class="erreur-form" >
                                  <?php echo $message['date_action']; ?>
                              </div>
                            <?php } ?>
                        </div>
                    </div>
                    
                    
                </div>
                <!-- /col-lg-6 -->
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="type_mouvement" class="marge-form control-label col-lg-5">Type du mouvement *</label>
                        <div class="col-lg-6">
                          <select name="type_mouvement" id="type_mouvement" class="form-control">
                                <?php if (isset($stock['type_mouvement'])) { ?>
                                  <option value="<?php echo $stock['type_mouvement']; ?>">
                                      <?php echo $stock['type_mouvement']; ?>
                                  </option>
                                <?php } ?>
                                <option value="entree">Entré</option>
                                <option value="sortie">Sortie</option>
                          </select>
                          <?php if (isset($message['type_mouvement'])) { ?>
                            <div class="erreur-form" >
                                <?php echo $message['type_mouvement']; ?>
                            </div>
                          <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="quantite" class="marge-form control-label col-lg-5">Quantité *</label>
                        <div class="col-lg-6">
                          <input class="form-control " id="quantite" type="text" name="quantite" value="<?php echo isset($stock['quantite']) ? $stock['quantite'] : '0'; ?>" />
                          <?php if (isset($message['quantite'])) { ?>
                            <div class="erreur-form" >
                                <?php echo $message['quantite']; ?>
                            </div>
                          <?php } ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="observation" class="marge-form control-label col-lg-5">Observation</label>
                        <div class="col-lg-6">
                            <textarea class="form-control" id="observation" name="observation" rows="5" cols="33"
                          value="<?php echo isset($stock['observation']) ? $stock['observation'] : ''; ?>">
                            </textarea>
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