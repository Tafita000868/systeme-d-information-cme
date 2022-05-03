<?php 
    $connected = isset($_SESSION['connected']) ? $_SESSION['connected'] : '';
    // echo  "<pre>";print_r($statistique);echo "</pre>";
    // echo  "<pre>";print_r($statistique_par_activite);echo "</pre>";
    // echo  "<pre>";print_r($activites);echo "</pre>";
    // echo  "<pre>";print_r($nb_enfant_par_activite);echo "</pre>";

?>

<?php $this->load->view('pages/administrateur/menu_admin'); ?>
<section id="main-content">
  <section class="wrapper">        

        <div class="row">
          <div class="col-lg-9 main-chart">
            
            
            <header class="panel-heading wht-bg">
              <h4 class="title-form">
                Statistique en général de tous les enfants inscrits dans le système
              </h4>
            </header>

            <div class="row mt">
              <!-- SERVER STATUS PANELS -->
              <div class="col-md-4 col-sm-4 mb">
                <div class="grey-panel pn donut-chart">
                  <div class="grey-header">
                    <h5>ADMIS</h5>
                  </div>
                  <canvas id="admis" height="120" width="120" style="width: 120px; height: 120px;"></canvas>
                  <script>
                    var doughnutData = [{
                        value: <?php echo json_encode($statistique['admis']['dessus']); ?>,
                        color: "#04ed00"
                      },
                      {
                        value: <?php echo json_encode($statistique['admis']['dessous']); ?>,
                        color: "#fdfdfd"
                      }
                    ];
                    var myDoughnut = new Chart(document.getElementById("admis").getContext("2d")).Doughnut(doughnutData);
                  </script>
                  <div class="row">
                    <div class="col-sm-6 col-xs-6">
                      <h2 style="color: black;"><?php echo $statistique['admis']['nb']; ?></h2>
                    </div>
                    <div class="col-sm-6 col-xs-6 goleft">
                      <h3><?php echo $statistique['admis']['dessus']; ?> %</h3>
                    </div>
                  </div>
                </div>
                <!-- /grey-panel -->
              </div>
              <!-- /col-md-4-->
              <div class="col-md-4 col-sm-4 mb">
                <div class="grey-panel pn donut-chart">
                  <div class="grey-header">
                    <h5>EN ATTENTE</h5>
                  </div>
                  <canvas id="attente" height="120" width="120" style="width: 120px; height: 120px;"></canvas>
                  <script>
                    var doughnutData = [{
                        value: <?php echo json_encode($statistique['attente']['dessus']); ?>,
                        color: "#4583e5"
                      },
                      {
                        value: <?php echo json_encode($statistique['attente']['dessous']); ?>,
                        color: "#fdfdfd"
                      }
                    ];
                    var myDoughnut = new Chart(document.getElementById("attente").getContext("2d")).Doughnut(doughnutData);
                  </script>
                  <div class="row">
                    <div class="col-sm-6 col-xs-6">
                      <h2 style="color: black;"><?php echo $statistique['attente']['nb']; ?></h2>
                    </div>
                    <div class="col-sm-6 col-xs-6 goleft">
                      <h3><?php echo $statistique['attente']['dessus']; ?> %</h3>
                    </div>
                  </div>
                </div>
                <!-- /grey-panel -->
              </div>
              <!-- /col-md-4-->
              <div class="col-md-4 col-sm-4 mb">
                <div class="grey-panel pn donut-chart">
                  <div class="grey-header">
                    <h5>ABANDONNE</h5>
                  </div>
                  <canvas id="abandonne" height="120" width="120" style="width: 120px; height: 120px;"></canvas>
                  <script>
                    var doughnutData = [{
                        value: <?php echo json_encode($statistique['abandonne']['dessus']); ?>,
                        color: "#FF6B6B"
                      },
                      {
                        value: <?php echo json_encode($statistique['abandonne']['dessous']); ?>,
                        color: "#fdfdfd"
                      }
                    ];
                    var myDoughnut = new Chart(document.getElementById("abandonne").getContext("2d")).Doughnut(doughnutData);
                  </script>
                  <div class="row">
                    <div class="col-sm-6 col-xs-6">
                      <h2 style="color: black;"><?php echo $statistique['abandonne']['nb']; ?></h2>
                    </div>
                    <div class="col-sm-6 col-xs-6 goleft">
                      <h3><?php echo $statistique['abandonne']['dessus']; ?> %</h3>
                    </div>
                  </div>
                </div>
                <!-- /grey-panel -->
              </div>
              <!-- /col-md-4-->
            </div>
            <!-- /row -->

           
            <div class="row mt">
                <!-- SERVER STATUS PANELS -->
                <div class="col-md-4 col-sm-4 mb">
                  <div class="grey-panel pn donut-chart">
                    <div class="grey-header">
                      <h5>SAD ACTIF</h5>
                    </div>
                    <canvas id="sad_actif" height="120" width="120" style="width: 120px; height: 120px;"></canvas>
                    <script>
                      var doughnutData = [{
                          value: <?php echo json_encode($statistique['sad_actif']['dessus']); ?>,
                          color: "#4583e5"
                        },
                        {
                          value: <?php echo json_encode($statistique['sad_actif']['dessous']); ?>,
                          color: "#fdfdfd"
                        }
                      ];
                      var myDoughnut = new Chart(document.getElementById("sad_actif").getContext("2d")).Doughnut(doughnutData);
                    </script>
                    <div class="row">
                      <div class="col-sm-6 col-xs-6">
                        <h2 style="color: black;"><?php echo $statistique['sad_actif']['nb']; ?></h2>
                      </div>
                      <div class="col-sm-6 col-xs-6 goleft">
                        <h3><?php echo $statistique['sad_actif']['dessus']; ?> %</h3>
                      </div>
                    </div>
                  </div>
                  <!-- /grey-panel -->
                </div>
                <!-- /col-md-4-->
                <div class="col-md-4 col-sm-4 mb">
                  <div class="grey-panel pn donut-chart">
                    <div class="grey-header">
                      <h5>SAD NON ACTIF</h5>
                    </div>
                    <canvas id="sad_non_actif" height="120" width="120" style="width: 120px; height: 120px;"></canvas>
                    <script>
                      var doughnutData = [{
                          value: <?php echo json_encode($statistique['sad_non_actif']['dessus']); ?>,
                          color: "#4583e5"
                        },
                        {
                          value: <?php echo json_encode($statistique['sad_non_actif']['dessous']); ?>,
                          color: "#fdfdfd"
                        }
                      ];
                      var myDoughnut = new Chart(document.getElementById("sad_non_actif").getContext("2d")).Doughnut(doughnutData);
                    </script>
                    <div class="row">
                      <div class="col-sm-6 col-xs-6">
                        <h2 style="color: black;"><?php echo $statistique['sad_non_actif']['nb']; ?></h2>
                      </div>
                      <div class="col-sm-6 col-xs-6 goleft">
                        <h3><?php echo $statistique['sad_non_actif']['dessus']; ?> %</h3>
                      </div>
                    </div>
                  </div>
                  <!-- /grey-panel -->
                </div>
                <!-- /col-md-4-->
              
            </div>
            <!-- /row -->
            <br>
            
            
           
            
        </div>
        <!-- /col-lg-9 END SECTION MIDDLE -->
        <!-- **********************************************************************************************************************************************************
            RIGHT SIDEBAR CONTENT
            *********************************************************************************************************************************************************** -->
        <div class="col-lg-3 ds" style="margin-top: 20px">
          <!--COMPLETED ACTIONS DONUTS CHART-->
          
          <!-- CALENDAR-->
          <div id="calendar" class="mb">
            <div class="panel green-panel no-margin">
              <div class="panel-body">
                <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                  <div class="arrow"></div>
                  <h3 class="popover-title" style="disadding: none;"></h3>
                  <div id="date-popover-content" class="popover-content"></div>
                </div>
                <div id="my-calendar"></div>
              </div>
            </div>
          </div>
          <!-- / calendar -->
        </div>
        <!-- /col-lg-3 -->
      </div>


      <div class="row mt">
        <div class="col-lg-12">
          <div class="content-panel">
            <header class="panel-heading wht-bg">
              <h4 class="title-form">
                Statistique par activité des enfants admis au programme
              </h4>
            </header>
            <div class="panel-body text-center">
              <canvas id="stat_activite_Chart" width="900" height="400"></canvas>
              <script>
                var activites = <?php echo json_encode($activites); ?>;
                var nb_enfant_par_act = [];
                var tab = <?php echo json_encode($nb_enfant_par_activite); ?>; 
                console.log(tab);
                for (var i = 0; i < tab.length; i++) {
                  nb_enfant_par_act.push(Number(tab[i]));
                }  

                var ChartData = {
                  labels : activites,
                  datasets : [
                      {
                        fillColor : [
                          'rgba(255, 99, 132, 0.2)',
                          'rgba(255, 159, 64, 0.2)',
                          'rgba(255, 205, 86, 0.2)',
                          'rgba(75, 192, 192, 0.2)',
                          'rgba(54, 162, 235, 0.2)',
                          'rgba(153, 102, 255, 0.2)',
                          'rgba(201, 203, 207, 0.2)'
                        ],
                        strokeColor : [
                          'rgba(255, 99, 132, 0.2)',
                          'rgba(255, 159, 64, 0.2)',
                          'rgba(255, 205, 86, 0.2)',
                          'rgba(75, 192, 192, 0.2)',
                          'rgba(54, 162, 235, 0.2)',
                          'rgba(153, 102, 255, 0.2)',
                          'rgba(201, 203, 207, 0.2)'
                        ],
                        data : nb_enfant_par_act
                      }
                  ]
                };
                // console.log(ChartData);
                new Chart(document.getElementById("stat_activite_Chart").getContext("2d")).Line(ChartData);
              </script>
            </div>
          </div>
        </div>
      </div>


  </section>
</section>
