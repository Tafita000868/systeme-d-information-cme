

<?php 
    $connected = isset($_SESSION['connected']) ? $_SESSION['connected'] : '';
    // echo  "<pre>";print_r($sad);echo "</pre>";
?>

<?php $this->load->view('pages/administrateur/menu_admin'); ?>
<section id="main-content">
  <section class="wrapper">

  	<div class="mt">
          <div class="col-lg-12">
            <div class="art-shadow">
              <h3><i class="fa fa-angle-right"></i> MODIFICATION D'UN ENFANT SAD</h3>
            </div>
            
            <div class="form-panel">
              <div class=" form">
                <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="modifier.html">
                  
                  <h4 class="title-form">
                    Modifier l'enfant sad 
                  </h4>

                  <?php if (isset($connected) && $connected['id_metier'] <= 7) { ?>
                    
                    <input type="hidden" name="id_sad" value="<?php echo isset($sad['id_sad']) ? $sad['id_sad'] : '0'; ?>">

                    <?php $this->load->view('pages/sad/form_sad'); ?>

                    <div style="overflow:auto;">
                        <div style="text-align: center;">
                          <button type="submit" class="btn btn-theme">
                            Modifier
                          </button>  
                        </div>
                    </div>

                  <?php } else { ?>
                      <div class="alert alert-warning">
                          Vous n'avez pas l'accés à cette information
                      </div>
                  <?php } ?>
	               

                </form>
              </div>
            </div>
            <!-- /form-panel -->
          </div>
           <!-- /col-lg-12 -->
        </div>


  </section>
</section>

