

<?php 
    $connected = isset($_SESSION['connected']) ? $_SESSION['connected'] : '';
    // echo  "<pre>";print_r($connected);echo "</pre>";
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
		                		<i class="fa fa-angle-right"></i> Liste des activités
		                	</h4>
             			</div>
             			<?php if (isset($connected) && $connected['id_metier'] <= 3) { ?>
			                    	<!-- ACCES UNIQUEMENT POUR LES MEMBRES DE DIRECTION -->
	             			<div class="col-md-4">
	             				<h4>
				                	<a href="<?php echo base_url('activite/insertion.html'); ?>">
					                  <i class="fa fa-plus-circle"></i>
					                  Ajouter une nouvelle activité
					                </a>
					            </h4>
	             			</div>
             			<?php } ?>    
             		</div>

                	<hr>
	                <thead class="thead-dark">
	                  <tr>
	                    <th>Nom de l'activité</th>
	                    <th>Date de début</th>
	                    <th>Date fin</th>
	                  </tr>
	                </thead>
	                <tbody>
	                	<?php foreach ($activites as $activite) {  ?>
			                <tr>
			                    <td><strong><?php echo $activite['type']; ?></strong></td>
			                    <td><?php echo $activite['date_debut']; ?></td>
			                    <td><?php echo $activite['date_fin']; ?></td>
			                    
			                    <?php if (isset($connected) && $connected['id_metier'] <= 3) { ?>
			                    	<!-- ACCES UNIQUEMENT POUR LES MEMBRES DE DIRECTION -->
				                    <td> 
				                    	<a href="<?php echo base_url('activite/'.$activite['id_activite'].'/modification.html'); ?>" 
					                      	class="btn btn-warning btn-xs">
					                      	<i class="fa fa-pencil"></i>
					                  	</a>
					                  	<a href="<?php echo base_url('activite/supprimer-'.$activite['id_activite'].'.html'); ?>" 
					                      	class="btn btn-danger btn-xs">
					                      	<i class="fa fa-trash-o"></i>
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



