<?php require '_inc/config.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Moje kola</title>

	<link rel="stylesheet" href="_inc/vendor/twbs/bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">myBikes</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Domů</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="vypis.php">Výpis komponent</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Můj účet
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Přihlásit</a></li>
            <li><a class="dropdown-item" href="#">Moje údaje</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>

<main>
	<div class="container">

