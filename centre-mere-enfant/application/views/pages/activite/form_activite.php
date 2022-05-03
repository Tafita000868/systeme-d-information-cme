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
             id_activite | type | date_debut | date_fin -->
          <div class="tab"> 
            <?php if (isset($activite['id_activite'])) { ?>
              <input type="hidden" name="id_activite" value="<?php echo $activite['id_activite']; ?>">
            <?php } ?>
            
          
            <div class="row">
                
                    <div class="form-group">
                        <label for="type" class="marge-form control-label col-lg-5">Nom de l'activité *</label>
                        <div class="col-lg-6">
                          <input class="form-control " id="type" type="text" name="type" value="<?php echo isset($activite['type']) ? $activite['type'] : ''; ?>" />
                          <?php if (isset($message['type'])) { ?>
                            <div class="erreur-form" >
                                <?php echo $message['type']; ?>
                            </div>
                          <?php } ?>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label for="date_debut" class="marge-form control-label col-lg-5">Date de début de l'activité *</label>
                        <div class="col-lg-6">
                          <input class="form-control " id="date_debut" type="date"
                            name="date_debut" value="<?php echo isset($activite['date_debut']) ? $activite['date_debut'] : ''; ?>" />
                            <?php if (isset($message['date_debut'])) { ?>
                              <div class="erreur-form" >
                                  <?php echo $message['date_debut']; ?>
                              </div>
                            <?php } ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="date_fin" class="marge-form control-label col-lg-5">Date fin de l'activité </label>
                        <div class="col-lg-6">
                          <input class="form-control " id="date_fin" type="date"
                            name="date_fin" value="<?php echo isset($activite['date_fin']) ? $activite['date_fin'] : ''; ?>" />
                            <?php if (isset($message['date_fin'])) { ?>
                              <div class="erreur-form" >
                                  <?php echo $message['date_fin']; ?>
                              </div>
                            <?php } ?>
                        </div>
                    </div>


                
            </div>
            <!-- /row -->
            

        </div>
        <!-- /tab -->