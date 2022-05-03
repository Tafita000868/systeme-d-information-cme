

<?php 
    $connected = isset($_SESSION['connected']) ? $_SESSION['connected'] : '';
    // echo  "<pre>";print_r($sads);echo "</pre>";
?>



<?php $this->load->view('pages/administrateur/menu_admin'); ?>

<section id="main-content">
  <section class="wrapper">

  	<div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
             	<table class="table table-striped table-advance table-hover">
                	<div class="row"> 
             			<div class="col-md-5">
             				<h4 class="title-table">
		                		<i class="fa fa-angle-right"></i> Liste des sads
		                	</h4>
             			</div>
             			<?php if (isset($connected) && $connected['id_metier'] <= 5) { ?>
			                    	<!-- ACCES UNIQUEMENT POUR LES MEMBRES DE DIRECTION -->
	             			<div class="col-md-4">
	             				<h4>
				                	<a href="<?php echo base_url('sad/insertion.html'); ?>">
					                  <i class="fa fa-plus-circle"></i>
					                  Ajouter un nouveau sad
					                </a>
					            </h4>
	             			</div>
             			<?php } ?>    
             		</div>

                	<hr>
	                <thead class="thead-dark">
	                  <tr>
	                    <th>Matricule Enfant</th>
	                    <th>Matricule SAD</th>
	                    <th>Nom et Prénom</th>
	                    <th>Sexe</th>
	                    <th>Date de Naissance</th>
	                    <th>Date d'envoye en Italie</th>
	                    <th>Date d'adhesion</th>
	                    <th>Frequence de payement</th>
	                    <th>N° Liste</th>
	                    <th>Observation</th>
	                  </tr>
	                </thead>
	                <tbody>
	                	<?php foreach ($sads as $sad) {  ?>
			                <tr>
			                    <td><strong><?php echo $sad['num_matricule_enf']; ?></strong></td>
			                    <td><strong><?php echo $sad['num_matricule_sad']; ?></strong></td>
			                    <td>
			                      	<a href="<?php echo base_url('enfant/profil-'.$sad['id_enfant'].'.html'); ?>">
			                      		<?php echo $sad['nom'].' '.$sad['prenom']; ?>
			                      	</a>
			                    </td>
			                    <td><?php echo $sad['sexe']; ?></td>
			                    <td><?php echo $sad['date_naissance']; ?></td>
			                    <td><?php echo $sad['date_envoye_en_Italie']; ?></td>
			                    <td><?php echo $sad['date_adhesion']; ?></td>
			                    <td><?php echo $sad['frequence_de_payement']; ?></td>
			                    <td><?php echo $sad['num_liste']; ?></td>
			                    <td><?php echo $sad['observation']; ?></td>
			                    
			                    <?php if (isset($connected) && $connected['id_metier'] <= 7) { ?>
			                    	<!-- ACCES UNIQUEMENT POUR LES MEMBRES DE DIRECTION -->
				                    <td> 
				                    	<a href="<?php echo base_url('sad/'.$sad['id_sad'].'/modification.html'); ?>" 
					                      	class="btn btn-warning btn-xs">
					                      	<i class="fa fa-pencil"></i>
					                  	</a>
				                    </td>
				                <?php } ?>    
			                </tr>
	                  	<?php } ?>
	                </tbody>

              	</table>

            </div>
            <!-- /content-panel -->
        </div>

  </section>
</section>



