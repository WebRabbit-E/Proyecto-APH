<?php
include_once('template/header.php');
?>
    <section class="hero-section set-bg" data-setbg="<?= base_url('vendor/template/img/rooms-bg.jpg')?>">
        <div class="hero-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Cuartos</h1>
                    </div>
                </div>
                <div class="page-nav">
                    <a href="Eventos" class="left-nav"><i class="lnr lnr-arrow-left"></i> Eventos</a>
                    <a href="Servicios" class="right-nav">Servicios<i class="lnr lnr-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
       <section class="room-section spad">
        <div class="container">
            <?php foreach ($cuartos as $el): ?>
            <div class="rooms-page-item">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="single-room-pic">
                        <img src="<?=base_url("vendor/template/img/".$el['imgUrl'])?>" alt="">
                        
                        </div>    
                    </div>
                    <div class="col-lg-6">
                        <div class="room-text">
                            <div class="room-title">
                                <h2><?=$el['tipoCuarto']?></h2>
                                <div class="room-price">
                                    <span>Desde</span>
                                    <h2>$<?=$el['precioCuarto']?></h2>
                                    <sub>/noche</sub>
                                </div>
                            </div>
                            <div class="room-desc">
                                <h3>Descripción: </h3>
                                <p><?=$el['description']?></p>
                            </div>
                            <div class="room-features">
                                <div class="room-info">
                                    <i class="flaticon-019-television"></i>
                                    <span>TV</span>
                                </div>
                                <div class="room-info">
                                    <i class="flaticon-036-parking"></i>
                                    <span>Parking</span>
                                </div>
                            </div>
                            <a href="#" class="primary-btn">Reservar <i class="lnr lnr-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
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
   