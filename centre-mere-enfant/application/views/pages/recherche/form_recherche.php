      <?php 
      // if (isset($filtre)) {
      //   echo  "<pre>";print_r($filtre);echo "</pre>";
      // }
      ?>



      <div class="mt">
        <div class="col-lg-12">
          <div class="art-shadow">
              <h3><i class="fa fa-angle-right"></i> FORMULAIRE DE RECHERCHE </h3>
          </div>
          
          <!-- <div class="form-panel"> -->
            <div class="form">
              <form class="cmxform form-horizontal style-form" style="border-radius: 30px" id="commentForm" method="post" action="<?php echo base_url('formulaire/chercher.html'); ?>">
                
                <!-- N° matricule Nom Prénom -->
                  <div class="form-row">
                    <div class="form-group form-padding col-md-3">
                      <label for="num_matricule">Numero matricule</label>
                      <input class="form-control round-form" id="num_matricule" 
                        name="num_matricule" 
                        value="<?php echo isset($filtre['num_matricule']) ? $filtre['num_matricule'] : ''; ?>" 
                      />
                    </div>
                    <div class="form-group form-padding col-md-3">
                      <label for="option">Options</label>
                      <select name="option" id="option" class="form-control">
                        <option value="Enfant">Enfant</option>
                        <option value="Mere">Mére</option>
                        <option value="Sad">Sad</option>
                      </select>
                    </div>
                    <div class="form-group col-md-1"></div>
                    <div class="form-group col-md-2">
                      <br>
                      <br>
                      <button type="submit" style="border-radius: 30px" class="btn btn-success">
                        <i class="fa fa-search"></i>
                        Chercher
                      </button>
                    </div>

                  </div>
              </form>
            </div>
            <!-- /form -->
          <!-- </div> -->
          <!-- /form-panel -->
        </div>
        <!-- /col-lg-12 -->
      </div>