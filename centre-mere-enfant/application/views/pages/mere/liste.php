

<?php 
    $connected = isset($_SESSION['connected']) ? $_SESSION['connected'] : '';
    // echo  "<pre>";print_r($meres);echo "</pre>";
	
?>
		

<?php $this->load->view('pages/administrateur/menu_admin'); ?>

<section id="main-content">
  <section class="wrapper">

  	
  	<div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
             	<table class="table table-striped table-advance table-hover">
             		<div class="row"> 
             			<div class="col-md-7">
             				<h4 class="title-table">
		                		<i class="fa fa-angle-right"></i>
	                			<strong>
	                				La liste des mères
	                			</strong>
		                	</h4>
             			</div>
             			
             			<?php if (isset($connected) && $connected['id_metier'] <= 7) { ?>
			                <!-- ACCES UNIQUEMENT POUR LES MEMBRES DE DIRECTION -->
	             			<div class="col-md-4">
	             				<h4>
				                	<a href="<?php echo base_url('mere/insertion.html'); ?>"> 
					                  <i class="fa fa-plus-circle"></i>
					                  Inserer une nouvelle mére
					                </a>
					            </h4>
	             			</div>
	             		<?php } ?>

             		</div>
                	<hr>
	                <thead class="thead-dark">
	                  <tr>
	                    <th>Numero Matricule</th>
	                    <th>Nom</th>
	                    <th>Prénom</th>
	                    <th>N° téléphone</th>
	                    <th>Adresse</th>
	                    <th>Date de naissance</th>
	                    <th>Situation Matrimoniale</th>
	                    <th>Etat actuel</th>
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
			                    <td>
			                    	<?php if ($mere['id_etat'] >= 2) { ?>
				                        <span class="label label-danger">
				                          Non actif
				                        </span>
				                        <?php  } else { ?>
				                        <span class="label label-success">
				                          Actif
				                        </span>
				                    <?php } ?>
			                    </td>
			                    
			                </tr>
	                  	<?php } ?>
	                </tbody>

              	</table>
              	<div class="row" >
                	<div style="text-align: center;">
		            	<p><?php echo $links; ?></p>
		            </div>
		        </div>
            </div>
            <!-- /content-panel -->
        </div>

  </section>
</section>



