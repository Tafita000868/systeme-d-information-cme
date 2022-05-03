<?php 
    $connected = isset($_SESSION['connected']) ? $_SESSION['connected'] : '';
?>					

    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

          <?php if($connected!='') {  ?>
            <h5 class="centered"><?php echo $connected['nom']." ".$connected['prenom'] ?></h5>
          <?php } ?>
          
          <li class="sub-menu">
            <a href="<?php echo base_url('statistique/nombre/enfant.html'); ?>">
              <i class="fa fa-dashboard"></i>
              <span>Statistique</span>
            </a>
          </li>
          <li class="sub-menu">
            <a href="<?php echo base_url('formulaire/recherche.html'); ?>">
              <i class="fa fa-search"> </i> <span> Recherche </span>
            </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cogs"> </i> <span> Activité </span>
            </a>
            <ul class="sub">
              <li>
                <a href="<?php echo base_url('activite/liste.html'); ?>"> 
                  <i class="fa fa-angle-right"> </i> Liste des activités 
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('activite/insertion.html'); ?>"> 
                  <i class="fa fa-angle-right"> </i> Saisir une nouvelle activité
                </a>
              </li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-sitemap"> </i> <span> Administrateur </span>
            </a>
            <ul class="sub">
              <li>
                <a href="<?php echo base_url('administrateur/liste.html'); ?>"> 
                  <i class="fa fa-angle-right"> </i> Liste des administrateurs 
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('administrateur/insertion.html'); ?>"> 
                  <i class="fa fa-angle-right"> </i> Saisir un administrateur
                </a>
              </li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i  class="fa fa-user"> </i> <span> Mere </span>
            </a>
            <ul class="sub">
              <li>
                <a href="<?php echo base_url('mere/liste.html'); ?>"> 
                  <i class="fa fa-angle-right"> </i> Liste des meres 
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('mere/insertion.html'); ?>"> 
                  <i class="fa fa-angle-right"> </i> Saisir mere
                </a>
              </li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-users"> </i> <span> Enfant </span>
            </a>
            <ul class="sub">
              <li>
                <a href="<?php echo base_url('enfant/liste-admis.html'); ?>"> 
                  <i class="fa fa-angle-right"> </i> Liste admis au programme 
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('enfant/liste-attente.html'); ?>"> 
                  <i class="fa fa-angle-right"> </i> Liste en attente 
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('enfant/insertion.html'); ?>"> 
                  <i class="fa fa-angle-right"> </i> Saisir un enfant
                </a>
              </li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-users"> </i> <span> SAD </span>
            </a>
            <ul class="sub">
              <li>
                <a href="<?php echo base_url('sad/liste.html'); ?>"> 
                  <i class="fa fa-angle-right"> </i> Liste des enfants SAD
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('sad/insertion.html'); ?>"> 
                  <i class="fa fa-angle-right"> </i> Entrer un enfant en SAD
                </a>
              </li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="<?php echo base_url('exportation-de-donnees/formulaire.html'); ?>">
              <i class="fa fa-cloud-download"> </i> <span> Exportation des données </span>
            </a>
          </li>
          
          <?php if (isset($connected) && $connected['id_metier'] <= 3) { ?>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-archive"> </i> <span> Stock </span>
            </a>
            <ul class="sub">
              <li>
                <a href="<?php echo base_url('stock/liste.html'); ?>"> 
                  <i class="fa fa-angle-right"> </i> Liste en stock
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('stock/insertion.html'); ?>"> 
                  <i class="fa fa-angle-right"> </i> Insérer un mouvement
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->


