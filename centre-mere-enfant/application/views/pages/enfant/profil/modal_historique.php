
    	

        <!-- MODAL HISTORIQUE -->
		<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
			    <div class="modal-content">
			    	<form>

			    		<?php if (isset($historique['id_histo'])) { ?>
			              <input type="hidden" id="id_histo" name="id_histo" value="<?php echo $historique['id_histo']; ?>">
			            <?php } ?>
			    		<input type="hidden" id="id_enfant" name="id_enfant" value="<?php echo $enfant['id_enfant']; ?>">	
						<input type="hidden" id="id_mere" name="id_mere" value="<?php echo $mere['id_mere']; ?>">

						<!-- S'IL Y A UNE ERREUR -->
						<div id="action">
	                    </div>

				      	<div class="modal-header">
					        <p class="modal-title" id="modalLabel">Changer l'état actuel de : 
					        	<strong><?php echo $enfant['nom'].' '.$enfant['prenom']; ?></strong>
					        	<span class="label label-warning"><?php echo $enfant['num_matricule']; ?></span>
					        </p>
					        <p class="modal-title" id="modalLabel">Mère : 
					        	<strong><?php echo $mere['nom'].' '.$mere['prenom']; ?></strong>
					        	<span class="label label-danger"><?php echo $mere['num_matricule']; ?></span>
					        </p>
					        <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
				      	</div>
				      	<div class="modal-body">
					       	
					       <br>

					       <!-- 
						  id_enfant
				          id_mere
				          nb_statu_miseAjour
				          observation
				          date_debut
				          date_fin
					        -->

			                <!-- /form-row -->
			                <br><br>

			                <div class="form-row">
			                    <label for="nb_statu_miseAjour" class="marge-form control-label col-lg-5">Nb mise à jour effectué </label>
		                        <div class="col-lg-6">
		                          <input class="form-control " id="nb_statu_miseAjour" type="number" min="1" name="nb_statu_miseAjour" value="<?php echo isset($historique['nb_statu_miseAjour']) ? $historique['nb_statu_miseAjour'] : 0; ?>" />
		                          <?php if (isset($message['nb_statu_miseAjour'])) { ?>
		                            <div class="erreur-form" >
		                                <?php echo $message['nb_statu_miseAjour']; ?>
		                            </div>
		                          <?php } ?>
		                        </div>
			                </div>
			                <!-- /form-row -->
			                <br><br>

			                <div class="form-row">
		                        <label for="date_debut" class="marge-form control-label col-lg-5">Date de début *</label>
		                        <div class="col-lg-6">
		                          <input class="form-control " id="date_debut" type="date"
		                            name="date_debut" value="<?php echo isset($historique['date_debut']) ? $historique['date_debut'] : ''; ?>" />
		                            <?php if (isset($message['date_debut'])) { ?>
		                              <div class="erreur-form" >
		                                  <?php echo $message['date_debut']; ?>
		                              </div>
		                            <?php } ?>
		                        </div>
		                    </div>
		                    <!-- /form-row -->
			                <br><br>

		                    <div class="form-row">
		                        <label for="date_fin" class="marge-form control-label col-lg-5">Date fin </label>
		                        <div class="col-lg-6">
		                          <input class="form-control " id="date_fin" type="date"
		                            name="date_fin" value="<?php echo isset($historique['date_fin']) ? $historique['date_fin'] : ''; ?>" />
		                            <?php if (isset($message['date_fin'])) { ?>
		                              <div class="erreur-form" >
		                                  <?php echo $message['date_fin']; ?>
		                              </div>
		                            <?php } ?>
		                        </div>
		                    </div>
		                    <!-- /form-row -->
			                <br><br>

			                <div class="form-row">
		                        <label for="observation" class="marge-form control-label col-lg-5">Observation</label>
		                        <div class="col-lg-6">
		                        	<textarea class="form-control" id="observation" name="observation" rows="5" cols="33"
		                        	value="<?php echo isset($historique['observation']) ? $historique['observation'] : ''; ?>">
									</textarea>
									<?php if (isset($message['observation'])) { ?>
		                              <div class="erreur-form" >
		                                  <?php echo $message['observation']; ?>
		                              </div>
		                            <?php } ?>
		                        </div>
		                    </div>
		                    <!-- /form-row -->
			                <br><br>
					       
					    </div>
					    <!-- /modal-body -->
				      	<br>
				      	<br>
				      	<br>
				      	<div class="modal-footer">
					        <button type="button" class="btn btn-round btn-success" data-dismiss="modal">
					        	<i class="glyphicon glyphicon-ban-circle"></i>
					        	Annuler
					        </button>
					        <button type="button" onclick='valider_historique("<?php echo base_url('historique/inserer.html'); ?>")' class="btn btn-round btn-info">
					        	<i class="fa fa-pencil"></i>Valider
					        </button>
					    </div>
					    <!-- /modal-footer -->
					</form>
					<!-- /form -->
			    </div>
			    <!-- /modal-content -->
			</div>
			  <!-- /modal-dialog -->
		</div>
		<!-- /modal fade -->

	