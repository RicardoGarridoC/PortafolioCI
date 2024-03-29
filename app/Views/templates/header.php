<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Los Alces</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <style>
        body {
            background-color: #333;
            color: #fff;
        }

        .navbar {
            background-color: #11151C;
            top: 0;
            z-index: 100;
        }

        .navbar-brand {
            color: #fff !important;
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            color: #fff;
        }

        .navbar-logo {
            max-width: 100px;
            align-self: center;
            margin-right: 10px;
            margin-left: 10px;
        }

        .navbar-nav {
            align-items: center;
        }

        .navbar-toggler-icon {
            color: rgb(255, 255, 255);
        }

        @media (max-width: 768px) {
            .logo-desktop {
                display: none;
            }
            .logo-mobile {
                display: inline-block;
            }
        }
        @media (min-width: 769px) {
            .logo-mobile {
                display: none;
            }
        }

    </style>

</head>

<body>

    <!-- Navbar (ADD fixed-top a nav class para arreglar panel socios)-->
    <nav class="navbar navbar-dark navbar-expand-lg">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand logo-mobile" href="#">
                <img src="<?= base_url() ?>/public/images/losalces.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                Los Alces F.C
            </a>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('Home'); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('ActividadesEspeciales'); ?>">Actividades especiales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('VentaEntradas'); ?>">Comprar entradas</a>
                    </li>
                    <li class="nav-item logo-desktop">
                        <img src="<?= base_url() ?>/public/images/losalces.png" class="navbar-logo" alt="Image description">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('IniciarSesion'); ?>">Iniciar sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('ProximoPartido'); ?>">Próximos partidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('TiendaOficial'); ?>">Tienda oficial</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>