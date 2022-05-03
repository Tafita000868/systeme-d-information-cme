

<?php 
    $connected = isset($_SESSION['connected']) ? $_SESSION['connected'] : '';
?>


    <div id="panel_pointage" class="tab-pane">
      	
      	<div class="row mt">
	        
      		<div class="tab"> 

              	<div class="row"> 
         			<div class="col-md-5">
         				<h4 class="title-table">
	                		<i class="fa fa-angle-right"></i> Insérer le pointage
	                	</h4>
         			</div>
         		</div>

	            <div class="row">
	              	<form class="cmxform form-horizontal style-form" style="border-radius: 30px" id="commentForm" method="post"
				  	action="<?php echo base_url('enfant/inserer/pointage.html'); ?>">
				        <input type="hidden" name="id_enfant" value="<?php echo $enfant['id_enfant']; ?>">
				        <input type="hidden" name="id_mere" value="<?php echo $enfant['id_mere']; ?>">

				        <div class="col-lg-3"></div>
		                <div class="col-lg-6"  style="text-align: center;">

		                    <div class="form-group">
		                      <label for="date_pointage" class="marge-form control-label col-lg-5">Date du pointage *</label>
		                      <div class="col-lg-6">
		                        <input class="form-control " id="date_pointage" type="date" 
		                        name="date_pointage" 
		                        value="<?php echo isset($enfant['date_pointage']) ? $enfant['date_pointage'] : '01/01/2000'; ?>"  />
		                          <?php if (isset($message['date_pointage'])) { ?>
		                            <div class="erreur-form" >
		                                <?php echo $message['date_pointage']; ?>
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
		                    
		                    <button type="submit" class="btn btn-round btn-primary">Insérer</button>

		                </div>
                 		<!-- /col-lg-6 -->

                 	</form>
                 	<!-- /form -->
                </div> 
                <!-- /row -->
            </div>  
              <!-- /tab -->


      	</div>
      	<!-- /row mt -->
    </div>
    <!-- /panel_scolarisation -->