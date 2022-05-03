
    	
	
	
        <!-- MODAL pointage_admin -->
		<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
			    <div class="modal-content">
			    	<form >

						<!-- S'IL Y A UNE ERREUR -->
						<div id="action">
	                    </div>
	                    <div id="id_admin">
	                    </div>

				      	<div class="modal-header">
					        Pointage des personnels Administratifs
				      	</div>
				      	<div class="modal-body">

					       	<div id="showtime">
					       	</div>

					       	<div class="row" style="text-align: center;">
					       		<div class="col-md-12">
					       			<div class="col-md-6">
										<button type="button" onclick='pointage("entree",
			                        		"<?php echo base_url('administrateur/inserer/pointage.html'); ?>"
			                        		)' class="btn btn-round btn-success">

											<i class="fa fa-sign-in"></i> Entrée

										</button>		
							       	</div>
							       	<div class="col-md-6">
										<button type="button" onclick='pointage("sortie",
			                        		"<?php echo base_url('administrateur/inserer/pointage.html'); ?>"
			                        		)' class="btn btn-round btn-warning">

											<i class="fa fa-sign-out"></i> Sortie

										</button>		
									</div>
						       	</div>
					       	</div>

					       	

							
					    </div>
					    <!-- /modal-body -->
				      	<br>
				      	<br>
				      	<br>
				      	<div class="modal-footer" style="text-align:center;">
					        <button type="button" class="btn btn-round btn-danger" data-dismiss="modal">
					        	<i class="glyphicon glyphicon-ban-circle"></i>
					        	Annuler
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

