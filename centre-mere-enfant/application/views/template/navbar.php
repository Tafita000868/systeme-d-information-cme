<?php 
    $connected = isset($_SESSION['connected']) ? $_SESSION['connected'] : '';
?>  
<!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="" class="logo"><b>CENTRE MERE ENFANT</b></a>
      <!--logo end-->
      
      

      <?php if ($connected!='') {  ?>
        <div class="top-menu">
          <ul class="nav pull-right top-menu">
            <li>
              <a class="logout" href="<?php echo base_url('connexion/logout.html'); ?>">
                <i class="fa fa-sign-out"></i> Deconnexion
              </a>
            </li>
          </ul>
        </div>
      <?php } ?>
      
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->            

