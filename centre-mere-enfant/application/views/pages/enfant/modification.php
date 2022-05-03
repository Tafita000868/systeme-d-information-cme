

<?php 
    $connected = isset($_SESSION['connected']) ? $_SESSION['connected'] : '';
    // echo  "<pre>";print_r($enfant);echo "</pre>";
?>

<?php $this->load->view('pages/administrateur/menu_admin'); ?>
<section id="main-content">
  <section class="wrapper">

  	<div class="mt">
          <div class="col-lg-12">
            <div class="art-shadow">
              <h3><i class="fa fa-angle-right"></i> MODIFICATION ENFANT </h3>
            </div>

            <?php if (isset($connected) && $connected['id_metier'] <= 7) { ?>

              <div class="form-panel">
                <div class="form">
                  <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="modifier.html">
                    
                    <?php if (isset($enfant)) { ?>
                      
                      <input type="hidden" 
                      name="id_enfant" 
                      value="<?php echo isset($enfant['id_enfant']) ? $enfant['id_enfant'] : '0'; ?>">
                      <input type="hidden" 
                      name="id_mere" 
                      value="<?php echo isset($enfant['id_mere']) ? $enfant['id_mere'] : '0'; ?>">
                      
                      <?php $this->load->view('pages/enfant/form_step_enfant'); ?>

                      <div style="overflow:auto;">
                          <div style="text-align: center;">
                            <button type="button" class="btn btn-theme" id="prevBtn" onclick="nextPrev(-1)" >    Retour
                            </button>
                            <button type="button" class="btn btn-theme04" id="nextBtn" onclick="nextPrev(1)" style="margin-left: 20px">    Suivant
                            </button>
                          </div>
                      </div>
                    <?php } else { ?>
                        <div class="alert alert-danger">
                            Impossible de modifier des informations d'un élève introuvable
                        </div>
                    <?php } ?>

   					        <!-- Circles which indicates the steps of the form: -->
  	                <!-- <div style="text-align:center;margin-top:40px;"> -->
  	                    <!-- <span class="step"></span> -->
  	                    <!-- <span class="step"></span> -->
  	                    <!-- <span class="step"></span> -->
  	                    <!-- <span class="step"></span> -->
  	                    <!-- <span class="step"></span> -->
  	                <!-- </div> -->

                  </form>
                </div>
              </div>
              <!-- /form-panel -->

            <?php } ?>


          </div>
           <!-- /col-lg-12 -->
        </div>


  </section>
</section>

