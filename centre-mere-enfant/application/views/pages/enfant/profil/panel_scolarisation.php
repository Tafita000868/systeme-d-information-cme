

<?php 
    $connected = isset($_SESSION['connected']) ? $_SESSION['connected'] : '';
     // echo  "<pre>";print_r($message);echo "</pre>";
?>

    <div id="panel_scolarisation" class="tab-pane active">
      		
      	<?php if (isset($connected) && $connected['id_metier'] <= 7) { ?>

      	    <div class="row mt">
              <div class="col-lg-3 col-md-3 col-sm-12"></div>
              <div class="col-lg-6 col-md-6 col-sm-12">
                <!--  BASIC PROGRESS BARS -->
                <div class="showback">

                  <form class="cmxform form-horizontal" id="commentForm" method="post" action="<?php echo base_url('enfant/'.$enfant['id_enfant'].'/ecole/inserer.html'); ?>">
                    <h4 class="title-form">
                        Nouvelle école
                    </h4>
                    <div class="form-group">
                      <label for="nom_ecole" class="marge-form control-label col-lg-3">Nom</label>
                        <div class="col-lg-6">
                        <input class="form-control" id="nom_ecole" type="text" name="nom_ecole" 
                        value="<?php echo isset($ecole['nom_ecole']) ? $ecole['nom_ecole'] : ''; ?>"  />
                        <?php if (isset($message['nom_ecole'])) { ?>
                          <div class="erreur-form" >
                              <?php echo $message['nom_ecole']; ?>
                          </div>
                        <?php } ?>
                      </div>
                      <div class="col-lg-2">
                        <button type="submit" class="btn btn-success  btn-sm" href="javascript:;">Ecole</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!--/showback -->
              </div>
              <!-- /col-lg-6 -->
            </div>
            <!-- /row mt -->
        <?php } ?>

      	<div class="row mt">
	        <div class="col-md-12">
	            <div class="content-panel">
	             	<table class="table table-striped table-advance table-hover">

	                	<div class="row"> 
	             			<div class="col-md-5">
	             				<h4 class="title-table">
			                		<i class="fa fa-angle-right"></i> Scolarisation
			                	</h4>
	             			</div>
	             		</div>
	             		
	                	<hr>

		                <thead class="thead-dark">
		                  <tr>
		                    <th>Ecole</th>
		                    <th>Classe</th>
		                    <th>Année scolaire</th>
		                    <th>moyenne</th>
		                    <th>Evaluation</th>
		                    <th>Année ratée</th>
		                  </tr>
		                </thead>

		                <?php if (isset($connected) && $connected['id_metier'] <= 7) { ?>
		                	<?php $this->load->view('pages/enfant/profil/form_scolarisation'); ?>
		                <?php } ?>

		                <tbody>
		                	<?php foreach ($scolarisations as $scolarisation) {  ?>
				                <tr>
				                    <td><?php echo $scolarisation['nom_ecole']; ?></td>
				                    <td><?php echo $scolarisation['nom_classe']; ?></td>
				                    <td><?php echo $scolarisation['annee_scolaire']; ?></td>
				                    <td><?php echo $scolarisation['moyenne']; ?></td>
				                    <td><?php echo $scolarisation['evaluation']; ?></td>
				                    <td><?php echo $scolarisation['annee_ratee']; ?></td>
				                    
				                    <?php if (isset($connected) && $connected['id_metier'] <= 5) { ?>
				                    	<!-- ACCES UNIQUEMENT POUR LES MEMBRES DE DIRECTION -->
					                    <td> 
					                    	<a href="<?php echo base_url('enfant/'.$enfant['id_enfant'].'/supprimer/scolarisation-'.$scolarisation['id_scolarisation'].'.html'); ?>" 
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
	        <!-- /col-md-12 -->
      	</div>
      	<!-- /row mt -->
    </div>
    <!-- /panel_scolarisation -->