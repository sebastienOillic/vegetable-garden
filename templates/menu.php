<!DOCTYPE html>
<?php session_start();
// var_dump($_SESSION);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vegetable Garden</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Vegetable Garden</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item <?= $_SERVER['REQUEST_URI']=='/dashboard.php' ? 'active' : ''?> ">
        <a class="nav-link" href="/public/dashboard.php">Dashboard</a>
      </li>
      <li class="nav-item <?= $_SERVER['REQUEST_URI']=='/params.php' ? 'active' : ''?>">
        <a class="nav-link" href="/public/params.php">Params</a>
      </li>
    </ul>
  </div>
</nav>