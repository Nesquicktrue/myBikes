<?php require_once '_inc/config.php' ?>

<?php
if (!isset($_SESSION)) {
  session_start();
}
?>

<!DOCTYPE html>
<html lang="cs">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>myBike</title>
  <meta content="mtb evidence" name="description">
  <meta content="mtb" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <link rel="stylesheet" href="_inc/vendor/twbs/bootstrap/dist/css/bootstrap.css">
  <link href="_inc/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="_inc/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.php">myBike</a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link" href="index.php">Domů</a></li>
          <?php
          if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
            echo '
            <li><a class="nav-link" href="login.php">Přihlásit</a></li>
            <li><a class="nav-link" href="register.php">Registrovat</a></li>';
          } else {
            echo '
            <ul>
            <li><a class="nav-link" href="vypis.php">Výpis komponent</a></li>
            <li><a class="nav-link" href="servis.php">Servisní úkony</a></li>
            <li><a href="bikes.php">Moje kola</a></li>
            <li class="dropdown"><a href="#"><span>Můj účet</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="welcome.php">Moje info</a></li>
                <li><a href="_inc/logout.php">Odhlásit se</a></li>
              </ul>
            </li>
          </ul>
            ';
          }
          ?>
        </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header>

  <?php
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
      echo '
      <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container position-relative">
      <h1>Vítejte v myBike!</h1>
      <h2>Webové aplikaci, kde si evidujete stav svých bajků.</h2>
      <a href="login.php" class="btn-get-started">Přihlásit se</a>
    </div>
    </section>
    ' ;} else {
      echo '
      <div style="padding:60px"></div>
      ';
    };
    ?>
  <!-- End Hero -->



  <main id="main">
    <div class="container">