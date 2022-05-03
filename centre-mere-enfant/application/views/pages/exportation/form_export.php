

<?php 
    $connected = isset($_SESSION['connected']) ? $_SESSION['connected'] : '';
    // echo  "<pre>";print_r($enfants);echo "</pre>";
?>

<?php $this->load->view('pages/administrateur/menu_admin'); ?>

<section id="main-content">
  <section class="wrapper">

  	<div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">

	           	<div class="art-shadow">
	              <h3><i class="fa fa-angle-right"></i> EXPORTATION DES DONNEES DU SYSTEME</h3>
	            </div>

	            <div class="form-panel">         
	              
	              	<?php if (isset($connected) && $connected['id_metier'] <= 8) { ?>

	              	<!-- <div class="form"> -->

	                  	<h4 class="title-form">
	                    	Exporter en excel les données
	                  	</h4>

	                  	<br>
			            <br>
	                                  
				        <form class="cmxform form-horizontal style-form" id="commentForm" method="post" 
				          action="<?php echo base_url('exporter.html'); ?>">
				                
				            <div class="row">
				                <div class="form-row">
								    <div class="col-md-2 mb-3">
								    </div>
								    <div class="col-md-3 mb-3">
								      	<label for="option">Liste</label>
				                      	<select name="option" id="option" class="form-control">
				                        	<option value="Enfant">Enfant</option>
				                        	<option value="Mere">Mére</option>
				                        	<option value="Sad">Sad</option>
				                      	</select>
								    </div>
								    <div class="col-md-3 mb-3">
								      	<label for="id_etat">Etat</label>
								      	<select name="id_etat" id="id_etat" class="form-control">
				                        	<option value="">Tous</option>
					                          <?php foreach ($etats as $etat) { ?>
					                            <option value="<?php echo $etat['id_etat']; ?>">
					                              <?php echo $etat['description']; ?>
					                            </option>
					                          <?php } ?>
				                        </select>
				                        <?php if (isset($message['id_etat'])) { ?>
				                          <div class="erreur-form" >
				                            <?php echo $message['id_etat']; ?>
				                          </div>
				                        <?php } ?>
								    </div>
								    <div class="col-md-3 mb-3">
								      <br>
								      <div class="input-group">
								       	<button type="submit" class="btn btn-theme">
								       		<i class="fa fa-download"></i> Exporter
								       	</button>
								      </div>
								    </div>
								</div>
							</div>
			                <br>
			                <br>
			                <br>
			            </form>

	                	<?php } else { ?>
	                  		<div class="alert alert-warning">
	                      		Vous n'avez pas l'accés à cette information
	                  		</div>
	                	<?php } ?>

	              	<!-- </div> -->
	              	<!-- /form -->
	            </div>
	            <!-- /form-panel -->

        	</div>
            <!-- /content-panel -->
        </div>
        <!-- /col-md-12 -->
  </section>
</section>



