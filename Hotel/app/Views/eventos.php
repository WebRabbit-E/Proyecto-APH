<?php
include_once('template/header.php');
?>
    <section class="hero-section set-bg" data-setbg="<?= base_url('vendor/template/img/services-bg.jpg')?>">
        <div class="hero-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Eventos</h1>
                    </div>
                </div>
                <div class="page-nav">
                    <a href="Conocenos" class="left-nav"><i class="lnr lnr-arrow-left"></i>Conócenos</a>
                    <a href="Cuartos" class="right-nav">Cuartos <i class="lnr lnr-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

     <section class="staff-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <br>
                        <h2>Lista de eventos</h2>
                    <hr>  
                    </div>
                </div>
            </div>
           
            <div class="row">
            <?php foreach ($eve as $el):?>
                <div class="col-lg-4 col-md-6">
                    <div class="single-staff-item">
                        <div class="staff-img">
                            <img  src="<?=base_url("vendor/template/img/".$el['imgEve'])?>" alt="">
                        </div>
                        <div class="staff-text">
                            <h5><?=$el['nombreEvento']?></h5>
                            <span><?=$el['descEvento']?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?> 
            </div>
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
    