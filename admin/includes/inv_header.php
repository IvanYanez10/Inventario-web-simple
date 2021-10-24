<?php
  ob_start();
  include "../includes/db.php";
  include "functions.php";
  session_start();
  if(! isLoggedIn())
    header("Location: ../login.php");
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="http://localhost/images/favicon.png">
    <title>Inventario</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Number spinner -->
    <script src="js/jquery/jquery-3.2.1.min.js"></script>
    <script src="js/jquery/bootstrap-input-spinner.js"></script>
    <link rel="stylesheet" href="css/style_popup.css" />

    <link rel="stylesheet" href="css/inventario.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
  </head>

  <body class="text-center">
