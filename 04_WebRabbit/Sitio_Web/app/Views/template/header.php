<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Hotel Template">
    <meta name="keywords" content="Hotel, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel Virrey de Mendoza</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Taviraj:300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?= base_url('vendor/template/css/bootstrap.min.css')?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url('vendor/template/css/font-awesome.min.css')?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url('vendor/template/css/flaticon.css')?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url('vendor/template/css/linearicons.css')?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url('vendor/template/css/owl.carousel.min.css')?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url('vendor/template/css/jquery-ui.min.css')?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url('vendor/template/css/nice-select.css')?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url('vendor/template/css/magnific-popup.css')?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url('vendor/template/css/slicknav.min.css')?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url('vendor/template/css/style.css')?>" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="col-xl-2">
                    <div class="logo">
                        <a href="index.php"><img src="<?= base_url('vendor/template/img/logo.png')?>" alt=""></a>
                    </div>
                </div>   
                <div class="container">
                    <div class="row"> 
                    
                        <div class="col-xl-13">
                            <nav class="main-menu mobile-menu">
                                <br>
                                <ul>
                                    <li><a href="index.php">Inicio</a></li>
                                    <li><a href="Conocenos">Conócenos</a></li>
                                    <li><a href="Eventos">Eventos</a></li>
                                    <li><a href="Cuartos">Cuartos</a>
                                         <ul class="drop-menu">
                                            <li><a href="#">Sencillo</a></li>
                                            <li><a href="#">Cuarto doble</a></li>
                                            <li><a href="#">Suit</a></li>
                                            <li><a href="#">Cuarto cuadruple</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="Servicios">Servicios</a>
                                    <li><a href="Contacto">Contacto</a>
                                        <ul class="drop-menu">
                                            <li><a href="Faqs">FAQ</a></li>
                                            <li><a href="Login">Iniciar Sessión</a></li>
                                        </ul>
                                </ul>
                            </nav>
                            <div class="top-info">
                                <img src="<?= base_url('vendor/template/img/placeholder.png')?>" alt="">
                                <span>1525 Boring Lane, Los Angeles, CA</span>
                            </div>
                             <div class="top-info phone-num">
                        <img src="<?= base_url('vendor/template/img/phone.png')?>" alt="">
                        <span>+1 (603)535-4592</span>
                    </div>
                        </div>
                    </div>
                </div>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->