<?php 
    $this->load->helper('url');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title><?php echo $title; ?></title>

  <!-- Favicons -->
  <link href="<?php echo base_url('assets/img/apple-touch-icon.png'); ?>" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('assets/lib/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

  <!--external css-->
  <link href="<?php echo base_url('assets/lib/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/zabuto_calendar.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/formStep.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lib/gritter/css/jquery.gritter.css'); ?>" />
  <!-- Custom styles for this template -->
  <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/form-padding.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/style-responsive.css'); ?>" rel="stylesheet">
  <script src="<?php echo base_url('assets/lib/chart-master/Chart.js'); ?>"></script>
  <script src="<?php echo base_url('assets/javascript/modal_historique.js'); ?>"></script>
  <script src="<?php echo base_url('assets/javascript/modal_pointage_admin.js'); ?>"></script>
  
</head>

<body onload="getTime()">
  <section id="container">
           