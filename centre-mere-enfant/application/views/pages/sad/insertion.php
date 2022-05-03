

<?php 
    $connected = isset($_SESSION['connected']) ? $_SESSION['connected'] : '';
    // echo  "<pre>";print_r($connected);echo "</pre>";
?>

<?php $this->load->view('pages/administrateur/menu_admin'); ?>
<section id="main-content">
  <section class="wrapper">

  	<div class="mt">
          <div class="col-lg-12">
            <div class="art-shadow">
              <h3><i class="fa fa-angle-right"></i> INSERTION SAD </h3>
            </div>

            <?php if (isset($connected) && $connected['id_metier'] <= 7) { ?>
            
            <div class="form-panel">         
              
              <div class=" form">
                <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="inserer.html">
                  
                                                          
                    <h4 class="title-form">
                      Ajouter un nouveau SAD
                    </h4>                                                                                                                                                                                        
                    <?php $this->load->view('pages/sad/form_sad'); ?>

                    <div style="overflow:auto;">
                        <div style="text-align: center;">
                          <button type="submit" class="btn btn-theme">
                            Enregistrer
                          </button>  
                        </div>
                    </div>


                </form>
              </div>
            </div>
            <!-- /form-panel -->
            <?php } else { ?>
                <div class="alert alert-warning">
                    Vous n'avez pas l'accés à cette information
                </div>
            <?php } ?>
           
          </div>
           <!-- /col-lg-12 -->
        </div>


  </section>
</section>

