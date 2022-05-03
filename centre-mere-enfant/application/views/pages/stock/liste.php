

<?php 
    $connected = isset($_SESSION['connected']) ? $_SESSION['connected'] : '';
    // echo  "<pre>";print_r($stocks);echo "</pre>";
?>

<?php $this->load->view('pages/administrateur/menu_admin'); ?>



<section id="main-content">
  <section class="wrapper">

  	<div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
             	<table class="table table-bordered table-striped table-condensed cf">
                	<div class="row"> 
             			<div class="col-md-5">
             				<h4 class="title-table">
		                		<i class="fa fa-angle-right"></i> Liste des produits en stocks
		                	</h4>
             			</div>
             			<?php if (isset($connected) && $connected['id_metier'] <= 3) { ?>
			                    	<!-- ACCES UNIQUEMENT POUR LES MEMBRES DE DIRECTION -->
	             			<div class="col-md-4">
	             				<h4>
				                	<a href="<?php echo base_url('stock/insertion.html'); ?>">
					                  <i class="fa fa-plus-circle"></i>
					                  Ajouter un mouvement de stock
					                </a>
					            </h4>
	             			</div>
	             			<div class="col-md-3">
	             				<h4>
				                	<a href="<?php echo base_url('stock/restant.html'); ?>">
					                  <i class="fa fa-archive"></i>
					                  Stock actuel
					                </a>
					            </h4>
	             			</div>
             			<?php } ?>    
             		</div>

                	<hr>
                	
	                <thead class="thead-dark">
	                  <tr>
	                    <th>Article</th>
	                    <th>Description</th>
	                    <th class="numeric">Qté entrée</th>
	                    <th class="numeric">Qté sortie</th>
	                    <th class="numeric">Unité</th>
	                    <th class="numeric">Date</th>
	                    <th>Observation</th>
	                  </tr>
	                </thead>
	                <tbody>
	                	<?php foreach ($stocks as $stock) {  ?>
			                <tr>
			                    <td data-title="Code"><?php echo $stock['article']; ?></td>
			                    <td data-title="Company"><?php echo $stock['description']; ?></td>
			                    <td class="numeric"><?php echo $stock['qte_entree']; ?></td>
			                    <td class="numeric"><?php echo $stock['qte_sortie']; ?></td>
			                    <td class="numeric"><?php echo $stock['unite']; ?></td>
			                    <td class="numeric"><?php echo $stock['date_action']; ?></td>
			                    <td><?php echo $stock['observation']; ?></td>
			                    <?php if (isset($connected) && $connected['id_metier'] <= 3) { ?>
			                    	<!-- ACCES UNIQUEMENT POUR LES MEMBRES DE DIRECTION -->
				                    <td class="numeric"> 
				                    	<a href="<?php echo base_url('stock/'.$stock['id_stock'].'/modification.html'); ?>" 
					                      	class="btn btn-warning btn-xs">
					                      	<i class="fa fa-pencil"></i>
					                  	</a>
					                  	<a href="<?php echo base_url('stock/supprimer-'.$stock['id_stock'].'.html'); ?>" 
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


