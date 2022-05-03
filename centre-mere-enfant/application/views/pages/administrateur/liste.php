

<?php 
    $connected = isset($_SESSION['connected']) ? $_SESSION['connected'] : '';
    // echo  "<pre>";print_r($administrateurs);echo "</pre>";
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
		                		<i class="fa fa-angle-right"></i> Liste des personnels administratifs
		                	</h4>
             			</div>
             			<?php if (isset($connected) && $connected['id_metier'] <= 3) { ?>
			                    	<!-- ACCES UNIQUEMENT POUR LES MEMBRES DE DIRECTION -->
	             			<div class="col-md-4">
	             				<h4>
				                	<a href="<?php echo base_url('administrateur/insertion.html'); ?>">
					                  <i class="fa fa-plus-circle"></i>
					                  Ajouter un administrateur
					                </a>
					            </h4>
	             			</div>
             			<?php } ?>    
             		</div>

                	<hr>
                	
	                <thead class="thead-dark">
	                  <tr>
	                    <th>Matricule</th>
	                    <th>Nom et prénom</th>
	                    <th>Pointage</th>
	                    <th>Sexe</th>
	                    <th>Etat</th>
	                    <th>Titre</th>
	                    <th>Role</th>
	                  </tr>
	                </thead>
	                <tbody>
	                	<?php foreach ($administrateurs as $administrateur) {  ?>
			                <tr>
			                    <td><strong><?php echo $administrateur['num_matricule']; ?></strong></td>
			                    <td><?php echo $administrateur['nom'].' '.$administrateur['prenom']; ?></td>
			                    <td>
			                    	<!-- <?php // echo $note['id_etu']; ?>,
				                            "<?php // echo $note['num_matricule_etu']; ?>",
				                            "<?php // echo $note['nom_etu']; ?>",
				                      "<?php // echo $note['prenom_etu']; ?>",
				                            "<?php // echo $note['sexe_etu']; ?>",
				                            <?php // echo $note['id_note']; ?>,
				                            <?php // echo $note['id_mat']; ?>,
				                            <?php // echo $note['id_trim']; ?>,
				                            <?php // echo $note['id_inscri']; ?>,
				                            <?php // echo $note['ds1_note']; ?>,
				                            <?php // echo $note['ds2_note']; ?>,
				                            <?php // echo $note['examen_note']; ?>,
				                            "<?php // echo base_url(''); ?>" -->
			                        <button type="button" onclick='show_modal_pointage(
			                        	<?php echo $administrateur['id_admin']; ?>,
			                        	"<?php echo base_url('administrateur/inserer/pointage.html'); ?>"
			                        	)' 
			                        	class="btn btn-round btn-info btn-xs"> 
				                        Pointage
				                  	</button>
			                    </td>
			                    <td><?php echo $administrateur['sexe']; ?></td>
			                    <td>
			                    	<?php if ($administrateur['id_etat'] == null || $administrateur['id_etat'] >= 2) { ?>
			                    	<div class="label label-danger">
			                    		<?php echo $administrateur['etat']; ?>
			                    	</div>
			                    	<?php } else { ?>
			                    	<div class="label label-success">
			                    		<?php echo $administrateur['etat']; ?>
			                    	</div>
			                    	<?php } ?>
			                    </td>
			                    <td><?php echo $administrateur['titre']; ?></td>
			                    <td><?php echo $administrateur['role']; ?></td>
			                    <?php if (isset($connected) && $connected['id_metier'] <= 2) { ?>
			                    	<!-- ACCES UNIQUEMENT POUR LES MEMBRES DE DIRECTION -->
				                    <td> 
				                    	<a href="<?php echo base_url('administrateur/'.$administrateur['id_admin'].'/modification.html'); ?>" 
					                      	class="btn btn-warning btn-xs">
					                      	<i class="fa fa-pencil"></i>
					                  	</a>
					                  	<a href="<?php echo base_url('administrateur/supprimer-'.$administrateur['id_admin'].'.html'); ?>" 
					                      	class="btn btn-danger btn-xs">
					                      	<i class="fa fa-trash-o"></i>
					                  	</a>
				                    </td>
				                <?php } ?>    
			                </tr>
	                  	<?php } ?>
	                </tbody>

              	</table>

              	<?php $this->load->view('pages/administrateur/pointage/modal_pointage_admin'); ?>

            </div>
            <!-- /content-panel -->
        </div>

  </section>
</section>


