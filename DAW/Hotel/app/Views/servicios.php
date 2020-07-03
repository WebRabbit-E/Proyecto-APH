<?php
include_once('template/header.php');
?>

 <section class="hero-section set-bg" data-setbg="<?= base_url('vendor/template/img/services-bg.jpg')?>">
        <div class="hero-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Servicios</h1>
                    </div>
                </div>
                <div class="page-nav">
                    <a href="Cuartos" class="left-nav"><i class="lnr lnr-arrow-left"></i> Cuartos</a>
                    <a href="Contacto" class="right-nav">Contacto <i class="lnr lnr-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

     <section class="services-section">
        <div class="container-fluid">
            <div class="row">
            <?php foreach ($serv as $el):?>   
                <div class="col-lg-3 col-sm-6">
                    <div class="single-services-item">
                        <div class="services-pic-item">
                            <img src="<?= base_url('vendor/template/img/services/services-1.jpg')?>" alt="">
                        </div>
                        <div class="services-text">
                            <h2><?=$el['nombreServicio']?></h2>
                        </div>
                    </div>
                </div>
            <?php endforeach;?> 
            </div>
        </div>
    </section>

     <section class="services-section">
        <div class="container-fluid">
        </div>
    </section>

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <?php include_once('template/footer.php') ?>
        <div class="copyright-area">
            <div class="container">
                <div class="copyright-text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
                <div class="privacy-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Photo Requests</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
