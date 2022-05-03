
            <div class="content-panel">
             	<table class="table table-striped table-advance table-hover">
             		<div class="row"> 
             			<div class="col-md-7">
             				<h4 class="title-table">
		                		<i class="fa fa-angle-right"></i> Resultats de recherches (Enfant)
		                	</h4>
             			</div>
             		</div>
                	<hr>
	                <thead class="thead-dark">
	                  <tr>
	                    <th>ID Enfant</th>
	                    <th>Nom</th>
	                    <th>Prénom</th>
	                    <th>Sexe</th>
	                    <th>Activite</th>
	                    <th>Etat actuel</th>
	                    <th>ID Mère</th>
	                    <th>Nom</th>
	                    <th>Prénom</th>
	                  </tr>
	                </thead>
	                <tbody>
	                	<?php foreach ($enfants as $enfant) {  ?>
			                <tr>
			                	<td>
			                      	<a href="<?php echo base_url('enfant/profil-'.$enfant['id_enfant'].'.html'); ?>">
			                      		<?php echo $enfant['num_matricule_enf']; ?>
			                      	</a>
			                    </td>
			                    <td>
			                      	<a href="<?php echo base_url('enfant/profil-'.$enfant['id_enfant'].'.html'); ?>">
			                      		<?php echo $enfant['nom_enf']; ?>
			                      	</a>
			                    </td>
			                    <td>
			                      	<a href="<?php echo base_url('enfant/profil-'.$enfant['id_enfant'].'.html'); ?>">
			                      		<?php echo $enfant['prenom_enf']; ?>
			                      	</a>
			                    </td>
			                    <td><?php echo $enfant['sexe']; ?></td>
			                    <td><?php echo $enfant['activite']; ?></td>
			                    <td>

			                    	<?php if ($enfant['id_etat'] == null || $enfant['id_etat'] >= 2) { ?>
			                    	<div class="label label-danger">
			                    		<?php echo isset($enfant['etat'])?$enfant['etat']:'Non autorisé'; ?>
			                    	</div>
			                    	<?php } else { ?>
			                    	<div class="label label-success">
			                    		<?php echo isset($enfant['etat'])?$enfant['etat']:'Non autorisé'; ?>
			                    	</div>
			                    	<?php } ?>

			                    </td>
			                    <td>
			                      	<a href="<?php echo base_url('mere/profil-'.$enfant['id_mere'].'.html'); ?>">
			                      		<?php echo $enfant['num_matricule_mer']; ?>
			                      	</a>
			                    </td>
			                    <td>
			                      	<a href="<?php echo base_url('mere/profil-'.$enfant['id_mere'].'.html'); ?>">
			                      		<?php echo $enfant['nom_mere']; ?>
			                      	</a>
			                    </td>
			                    <td>
			                      	<a href="<?php echo base_url('mere/profil-'.$enfant['id_mere'].'.html'); ?>">
			                      		<?php echo $enfant['prenom_mere']; ?>
			                      	</a>
			                    </td>
			                    
			                </tr>
	                  	<?php } ?>
	                </tbody>

              	</table>

              	<!-- <div class="row">
                	<div style="text-align: center;">
		            	<p><?php //echo $links; ?></p>
		            </div>
		        </div> -->
		        <!-- /row -->

            </div>
            <!-- /content-panel -->