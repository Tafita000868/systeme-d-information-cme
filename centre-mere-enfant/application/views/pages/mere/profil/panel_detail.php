       

   <!--  [cin_num] => 
    [cin_date_delivrance] => 
    [cin_lieu_delivrance] => 
    [acte_naissance] => 
    [nb_enfant] => 4  -->

    <div id="panel_detail" class="tab-pane active">
      <div class="row">
        <div class="col-md-6">
          <div class="detailed mt">
            <div class="recent-activity">
              <div class="activity-icon bg-theme"><i></i>CIN</div>
              <div class="activity-panel">
                <h5 style="color: #4ecdc4; font-size: large; font-family: revert;" >
                  Carte d'Identité Nationale
                </h5>
                <p>
                  <strong>Numero :</strong> <?php echo $mere['cin_num']; ?>
                </p>
                <p>
                  <strong>Date de délivrance :</strong> <?php echo $mere['cin_date_delivrance']; ?>
                </p>
                <p>
                  <strong>Lieu de délivrance :</strong> <?php echo $mere['cin_lieu_delivrance']; ?>
                </p>
                <p>
                  <strong>Acte de naissance :</strong> <?php echo $mere['acte_naissance']; ?>
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- [revenu_mere] => 0
    [nom_conjoint] => 
    [date_naissance_conjoint] => 
    [poste_conjoint] => 
    [revenu_conjoint] => 
    [depense_mensuel] => 4212 -->
        <div class="col-md-6">
          <div class="detailed mt">
            <div class="recent-activity">
              <div class="activity-icon bg-theme04"><i></i>C</div>
                <div class="activity-panel">
                  <h5 style="color: #ed5565; font-size: large; font-family: revert;">
                    Conjoint 
                  </h5>
                  <p>
                    <strong>Nom :</strong> <?php echo $mere['nom_conjoint']; ?>
                  </p>
                  <p>
                    <strong>Date de naissance :</strong> <?php echo $mere['date_naissance_conjoint']; ?>
                  </p>
                  <p>
                    <strong>Poste :</strong> <?php echo $mere['poste_conjoint']; ?>
                  </p>
                  <p>
                    <strong>Revenu éstimé :</strong> <?php echo $mere['revenu_conjoint']; ?> Ar / mois
                  </p>
                </div>
              </div>
              <!-- /recent-activity -->
            </div>
            <!-- /detailed -->
          </div>
          <!-- /col-md-6 -->
      </div>
      <!-- /OVERVIEW -->
    </div>