

<?php 
    $connected = isset($_SESSION['connected']) ? $_SESSION['connected'] : '';
    // echo  "<pre>";print_r($connected);echo "</pre>";
?>

<?php $this->load->view('pages/administrateur/menu_admin'); ?>
<section id="main-content">
  <section class="wrapper">

  	<div class="mt">
          <div class="col-lg-12">

            <div class="row mt">
              <div class="col-lg-6 col-md-6 col-sm-12">
                <!--  BASIC PROGRESS BARS -->
                <div class="showback">

                  <form class="cmxform form-horizontal" id="commentForm" method="post" action="<?php echo base_url('stock/article/inserer.html'); ?>">
                    <h4 class="title-form">
                        Nouvel article
                    </h4>
                    <div class="form-group">
                      <label for="designation" class="marge-form control-label col-lg-2">Article</label>
                        <div class="col-lg-6">
                        <input class="form-control" id="designation" type="text" name="designation" 
                        value="<?php echo isset($article['designation']) ? $article['designation'] : ''; ?>"  />
                        <?php if (isset($message['designation'])) { ?>
                          <div class="erreur-form" >
                              <?php echo $message['designation']; ?>
                          </div>
                        <?php } ?>
                      </div>
                      <div class="col-lg-3">
                        <button type="submit" class="btn btn-success  btn-sm" href="javascript:;">Inserer l'article</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!--/showback -->
              </div>
              <!-- /col-lg-6 -->
              <div class="col-lg-6 col-md-6 col-sm-12">
                <!--  ALERTS EXAMPLES -->
                <div class="showback">
                  <form class="cmxform form-horizontal" id="commentForm" method="post" action="<?php echo base_url('stock/unite/inserer.html'); ?>">
                    <h4 class="title-form">
                        Nouvelle unité
                    </h4>
                    <div class="form-group">
                      <label for="unite" class="marge-form control-label col-lg-2">Unité</label>
                        <div class="col-lg-6">
                        <input class="form-control" id="unite" type="text" name="unite" 
                        value="<?php echo isset($unite['unite']) ? $unite['unite'] : ''; ?>"  />
                        <?php if (isset($message['unite'])) { ?>
                          <div class="erreur-form" >
                              <?php echo $message['unite']; ?>
                          </div>
                        <?php } ?>
                      </div>
                      <div class="col-lg-3">
                        <button type="submit" class="btn btn-success  btn-sm" href="javascript:;">Inserer l'unité</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /showback -->
                
              </div>
              <!-- /col-lg-6 -->
            </div>
            <!-- /row mt -->
            
            <div class="art-shadow">
              <h3><i class="fa fa-angle-right"></i> MOUVEMENT DU STOCK </h3>
            </div>

            <?php if (isset($connected) && $connected['id_metier'] <= 3) { ?>
            
            <div class="form-panel">         
              
              <div class=" form">
                <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="<?php echo base_url('stock/inserer.html'); ?>">
                  
                  <h4 class="title-form">
                      Créer un mouvement de stock
                  </h4>

                                                                                                                                                                                                                                                  
                    <?php $this->load->view('pages/stock/form_stock'); ?>

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
                <div class="alert alert-danger">
                    Vous n'avez pas accés à cette information
                </div>
            <?php } ?>
            
          </div>
           <!-- /col-lg-12 -->
        </div>


  </section>
</section>

