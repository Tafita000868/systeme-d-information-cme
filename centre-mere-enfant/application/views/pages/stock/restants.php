

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
		                		<i class="fa fa-angle-right"></i> Stock actuel
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
				                	<a href="<?php echo base_url('stock/liste.html'); ?>">
					                  <i class="fa fa-list-ul"></i>
					                  Liste de stock
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
	                    <th class="numeric">Total Qté entrée</th>
	                    <th class="numeric">Total Qté sortie</th>
	                    <th class="numeric">Qté restante</th>
	                    <th class="numeric">Unité</th>
	                  </tr>
	                </thead>
	                <tbody>
	                	<?php foreach ($stocks as $stock) {  ?>
			                <tr>
			                    <td data-title="Code"><?php echo $stock['article']; ?></td>
			                    <td data-title="Company"><?php echo $stock['description']; ?></td>
			                    <td class="numeric"><?php echo $stock['total_entree']; ?></td>
			                    <td class="numeric"><?php echo $stock['total_sortie']; ?></td>
			                    <td class="numeric"><?php echo $stock['qte_restant']; ?></td>
			                    <td class="numeric"><?php echo $stock['unite']; ?></td>
			                </tr>
	                  	<?php } ?>
	                </tbody>

              	</table>

            </div>
            <!-- /content-panel -->
        </div>

  </section>
</section>


