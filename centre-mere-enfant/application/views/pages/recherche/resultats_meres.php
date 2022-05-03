			<div class="content-panel">
             	<table class="table table-striped table-advance table-hover">
             		<div class="row"> 
             			<div class="col-md-7">
             				<h4 class="title-table">
		                		<i class="fa fa-angle-right"></i> Resultats de recherches (Mère)
		                	</h4>
             			</div>
             		</div>
                	<hr>
	                <thead class="thead-dark">
	                  <tr>
	                    <th>Id mere</th>
	                    <th>Nom</th>
	                    <th>Prénom</th>
	                    <th>N° téléphone</th>
	                    <th>Adresse</th>
	                    <th>Date de naissance</th>
	                    <th>Situation Matrimoniale</th>
	                    <th>Enfant en charge</th>
	                  </tr>
	                </thead>
	                <tbody>
	    <!--[id_mere]
			[nom]
			[prenom]
			[num_tel]
			[adresse]
			[date_naissance]
			[situation_matrimoniale]
            [nb_enfant]
 			-->
	                	<?php foreach ($meres as $mere) {  ?>
	                		
			                <tr>
			                    <td>
			                		<a href="<?php echo base_url('mere/profil-'.$mere['id_mere'].'.html'); ?>"><?php echo $mere['num_matricule']; ?>
			                		</a>
			                	</td>
			                	<td>
			                		<a href="<?php echo base_url('mere/profil-'.$mere['id_mere'].'.html'); ?>"><?php echo $mere['nom']; ?>
			                		</a>
			                	</td>
				                <td>
				                	<a href="<?php echo base_url('mere/profil-'.$mere['id_mere'].'.html'); ?>"><?php echo $mere['prenom']; ?>
			                		</a>
			                	</td>
			                    <td><?php echo $mere['num_tel']; ?></td>
			                    <td><?php echo $mere['adresse']; ?></td>
			                    <td><?php echo $mere['date_naissance']; ?></td>
			                    <td><?php echo $mere['situation_matrimoniale']; ?></td>
			                    <td><?php echo $mere['nb_enfant']; ?></td>
			                    
			                </tr>
	                  	<?php } ?>
	                </tbody>

              	</table>
              	
            </div>
            <!-- /content-panel -->