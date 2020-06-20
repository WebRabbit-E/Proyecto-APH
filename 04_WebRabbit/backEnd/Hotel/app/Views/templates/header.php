<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

  <!--//////////////////////////////////////////////////////////////////////////////////
                ////////////////////////////////////////SECCION DEL HEAD?////////////////////////////
                //////////////////////////////////////////////////////////////////////////////////////-->  
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Hotel Virrey de Mendoza</title>
        <link href="../css/styles.css" rel="stylesheet" />


          <!--//////////////////////////////////////////////////////////////////////////////////
                ////////////////////////////////////////BOOTSTAP Y FONTAWESOM?////////////////////////////
                //////////////////////////////////////////////////////////////////////////////////////-->  
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
       
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Hotel Virrey de Mendoza</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
                       <!-- Navbar-->
            
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Personas</div>
                            <a class="nav-link" href="../clientes/index.php"><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>Clientes</a>
                            <a class="nav-link" href="../recepcionistas/index.php"><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>Recepcionistas</a>
                            <div class="sb-sidenav-menu-heading">Cuartos</div>
                            <a class="nav-link" href="../tipoCuarto/index.php"><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>Tipo-Cuarto</a>
                            <a class="nav-link" href="../cuartos/index.php"><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>Cuartos</a>
                            <a class="nav-link" href="../Servicios/index.php"><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>Servicios</a>
                            <div class="sb-sidenav-menu-heading">Reservaciones</div>
                            <a class="nav-link" href="../Reservaciones/index.php"><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>Reservaciones</a>
                            <a class="nav-link" href="../cuenta/index.php"><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>Cuentas</a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">

                        <?php if(isset($_SESSION['nombre'])) {
                                    $usuario_iniciado = $_SESSION['nombre'];
                                    
                        ?>

                        <div class="small">Registrado como: <?php echo "<p>$usuario_iniciado </p>";
                                }   ?>
                          
                        </div> 
                    </div>
                </nav>
            </div>

            <div id="layoutSidenav_content">