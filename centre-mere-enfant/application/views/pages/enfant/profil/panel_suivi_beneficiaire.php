<?php 
    $connected = isset($_SESSION['connected']) ? $_SESSION['connected'] : '';
    // echo  "<pre>";print_r($statistiques);echo "</pre>";
    // 

?>

    <div id="panel_suivi_beneficiaire" class="tab-pane">
      <div class="row">
        
        <div class="row mt">
			<div class="col-lg-3 col-md-3 col-sm-12"></div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="showback">

		          <form class="cmxform form-horizontal" id="commentForm" method="post" action="<?php echo base_url('enfant/statistique/frequentation_monsuelle.html'); ?>">
				        
				    <input type="hidden" name="id_enfant" value="<?php echo $enfant['id_enfant']; ?>">

		            <h4 class="title-form">
		                Fréquentation mensuelle par activité
		            </h4>
		            <div class="form-group">
	                  	<label for="mois" class="marge-form control-label col-lg-3">Mois</label>
	                  	<div class="col-md-6 col-xs-11">
	                    	<div class="input-append date dpMonths">
	                      		<input type="month" id="mois" name="mois" value="<?php echo isset($mois['mois']) ? $mois['mois'] : ''; ?>" class="form-control">
	                    	</div>
	                  	</div>
	                  	<div class="col-lg-2">
	                        <button type="submit" class="btn btn-success  btn-sm" href="javascript:;">Voir</button>
	                    </div>
	                </div>
		          </form>

		        </div>
			</div>
	        <!-- /col-lg-6 -->
	    </div>
	    <!-- /row mt -->

	    <?php 
	    if (isset($statistiques)) {
	    ?>
	    
	    	<br>

	    	<table class="table table-bordered table-striped table-condensed" style="text-align: center;">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col"><?php echo $detail_mois['nom']; ?></th>
			      <?php for ($i=1; $i<=$detail_mois['nb_jour']; $i++ ) { ?>
			      	<th scope="col"><?php echo $i; ?></th>
			      <?php } ?>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($activites as $activite) { ?>
			    <tr>
			      <th scope="row"><?php echo $activite['type']; ?></th>
			      <?php for ($i=1; $i<=$detail_mois['nb_jour']; $i++ ) { ?>
		      			<?php if(in_array(array('date_pointage' => $i, 'id_activite' => $activite['id_activite']), $detail_pointages)) { ?>
		      				<td> <i class="fa fa-times"></i> </td>
		      			<?php } else { ?>
		      				<td></td>
			      		<?php } ?>
			      <?php } ?>
			    </tr>
			    <?php } ?>
			  </tbody>
			</table>
			
			<br>
	    	
		    <?php foreach ($statistiques['statistiques'] as $statistique) { ?>
		    
			    <div class="row mt">
					<div class="col-lg-3 col-md-3 col-sm-12"></div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="showback">
					      	<h4><i class="fa fa-angle-right"></i> <?php echo $statistique['activite']['type']; ?></h4>
					      	<div class="row">
					      		<div class="col-lg-12">
					      			<div class="col-lg-1">
						      			<span class="badge bg-primary"><?php echo $statistique['nb_pointage']['nb_pointage']; ?></span>
					      			</div>
					      			<div class="col-lg-10">
					      				<div class="progress progress-striped active">
						      				<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $statistique['pourcentage']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $statistique['pourcentage']; ?>%">
								        	</div>
							        	</div>
					      			</div>
						        	<div class="col-lg-1">
						        		<span class="badge bg-inverse"><?php echo $statistique['pourcentage']; ?>%</span>
						        	</div>
						        </div>
						    </div>
					    </div>
					</div>
			        <!-- /col-lg-6 -->
			    </div>
			    <!-- /row mt -->

		    <?php }  
		} ?>
        
        
      </div>
      <!-- /row -->
    </div>
    <!-- /panel_suivi_beneficiaire -->
